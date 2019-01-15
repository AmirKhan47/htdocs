<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Recruitment extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Recruitment_model','recruitment');
	}
	public function index()
	{
		$this->load->view('header');
		$data['error']='';
		$data['positions']=$this->common->get_all_records('positions');
		$data['levels']=$this->common->get_all_records('levels');
		// $data['classes']=$this->common->get_all_records('classes');
		// $data['subjects']=$this->common->get_all_records('subject');
		// $data['branches']=$this->common->get_all_records('branch');
		$this->load->view('admin/human_resources/recruitment_form',$data);
	}
	public function manage_applicants()
	{
        if($this->session->userdata('id'))
		{
			$data['active']='manage_applicants';
			$this->load->view('admin/header',$data);
			$this->load->view('admin/human_resources/manage_applicants',$data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function get_applicants()
    {
        $list = $this->recruitment->get_applicants();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            $row[] = $value['employee_no'];
            $row[] = $value['employee_name'];
            $row[] = $value['employee_cnic'];
            $row[] = $value['contact_cell'];
            $row[] = $value['position_name'];
            if($value['status_name']=='Applicant')
            {
                $row[] = 'Pending';
            }
            // ------------------------------------------------------------------------
            $this->db->where('employee_cnic', $value['employee_cnic']);
    		$query=$this->db->get('employees');
    		$count_row=$query->num_rows();
            if($count_row>1)
            {
            	$row[]='Yes';
            }
            else
            {
            	$row[]='No';
            }
            // ------------------------------------------------------------------------
            $row[] = '<a class="btn btn-primary btn-sm" href="'.SURL.'recruitment/applicant_details/'.$value['employee_id'].'">Detail</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->recruitment->user_count(),
            "recordsFiltered" => $this->recruitment->user_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function manage_test_applicants()
	{
        if($this->session->userdata('id'))
		{
			$data['active']='manage_test_applicants';
			$this->load->view('admin/header',$data);
			$this->load->view('admin/human_resources/manage_test_applicants',$data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function test_applicants()
    {
        $list = $this->recruitment->test_applicants();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            $row[] = $value['employee_no'];
            $row[] = $value['employee_name'];
            $row[] = $value['employee_cnic'];
            $row[] = $value['contact_cell'];
            $row[] = $value['position_name'];
            if($value['status_name']=='Test')
            {
                $row[] = 'Pending';
            }
            // ------------------------------------------------------------------------
            $this->db->where('employee_cnic', $value['employee_cnic']);
    		$query=$this->db->get('employees');
    		$count_row=$query->num_rows();
            if($count_row>1)
            {
            	$row[]='Yes';
            }
            else
            {
            	$row[]='No';
            }
            // ------------------------------------------------------------------------
            $row[] = '<a class="btn btn-primary btn-sm" href="'.SURL.'recruitment/applicant_details/'.$value['employee_id'].'">Detail</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->recruitment->test_applicants_count(),
            "recordsFiltered" => $this->recruitment->test_applicants_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
	public function manage_file_completion_applicants()
	{
        if($this->session->userdata('id'))
		{
			$data['active']='manage_file_completion_applicants';
			$this->load->view('admin/header',$data);
			$this->load->view('admin/human_resources/manage_file_completion_applicants',$data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function file_completion_applicants()
    {
        $list = $this->recruitment->file_completion_applicants();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            $row[] = $value['employee_no'];
            $row[] = $value['employee_name'];
            $row[] = $value['employee_cnic'];
            $row[] = $value['contact_cell'];
            $row[] = $value['position_name'];
            if($value['status_name']=='File Completion')
            {
                $row[] = 'Pending';
            }
            // ------------------------------------------------------------------------
            $this->db->where('employee_cnic', $value['employee_cnic']);
    		$query=$this->db->get('employees');
    		$count_row=$query->num_rows();
            if($count_row>1)
            {
            	$row[]='Yes';
            }
            else
            {
            	$row[]='No';
            }
            // ------------------------------------------------------------------------
            $row[] = '<a class="btn btn-primary btn-sm" href="'.SURL.'recruitment/applicant_details/'.$value['employee_id'].'">Detail</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->recruitment->file_completion_applicants_count(),
            "recordsFiltered" => $this->recruitment->file_completion_applicants_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
	public function manage_registered_applicants()
	{
        if($this->session->userdata('id'))
		{
			$data['active']='manage_registered_applicants';
			$this->load->view('admin/header',$data);
			$this->load->view('admin/human_resources/manage_registered_applicants',$data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function registered_applicants()
    {
        $list = $this->recruitment->registered_applicants();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            $row[] = $value['employee_no'];
            $row[] = $value['employee_name'];
            $row[] = $value['employee_cnic'];
            $row[] = $value['contact_cell'];
            $row[] = $value['position_name'];
            $row[] = $value['status_name'];
            // ------------------------------------------------------------------------
            $this->db->where('employee_cnic', $value['employee_cnic']);
    		$query=$this->db->get('employees');
    		$count_row=$query->num_rows();
            if($count_row>1)
            {
            	$row[]='Yes';
            }
            else
            {
            	$row[]='No';
            }
            // ------------------------------------------------------------------------
            $row[] = '<a class="btn btn-primary btn-sm" href="'.SURL.'recruitment/applicant_details/'.$value['employee_id'].'">Detail</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->recruitment->registered_applicants_count(),
            "recordsFiltered" => $this->recruitment->registered_applicants_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
	public function manage_all_applicants()
	{
        if($this->session->userdata('id'))
		{
			$data['active']='manage_all_applicants';
			$this->load->view('admin/header',$data);
			$this->load->view('admin/human_resources/manage_all_applicants',$data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function all_applicants()
    {
        $list = $this->recruitment->all_applicants();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            $row[] = $value['employee_no'];
            $row[] = $value['employee_name'];
            $row[] = $value['employee_cnic'];
            $row[] = $value['contact_cell'];
            $row[] = $value['position_name'];
            $row[] = $value['status_name'];
            // ------------------------------------------------------------------------
            $this->db->where('employee_cnic', $value['employee_cnic']);
    		$query=$this->db->get('employees');
    		$count_row=$query->num_rows();
            if($count_row>1)
            {
            	$row[]='Yes';
            }
            else
            {
            	$row[]='No';
            }
            // ------------------------------------------------------------------------
            $row[] = '<a class="btn btn-primary btn-sm" href="'.SURL.'recruitment/applicant_details/'.$value['employee_id'].'">Detail</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->recruitment->all_applicants_count(),
            "recordsFiltered" => $this->recruitment->all_applicants_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function applicant_details($employee_id)
	{
        if($this->session->userdata('id'))
		{
			// ------------------------------------------------------------------------
			$data['positions']=$this->common->get_all_records('positions');
			$data['levels']=$this->common->get_all_records('levels');
			$data['classes']=$this->common->get_all_records('classes');
			$data['subjects']=$this->common->get_all_records('subject');
			$data['branches']=$this->common->get_all_records('branch');
			// ------------------------------------------------------------------------
			$data['employees']=$this->common->select_single_records('employees',$where=array('employee_id'=>$employee_id));
			// ------------------------------------------------------------------------
			$this->db->where('employee_cnic', $data['employees']['employee_cnic']);
    		$query=$this->db->get('employees');
    		$count_row=$query->num_rows();
            if($count_row>1)
            {
            	$data['already_registered']='Yes';
            }
            else
            {
            	$data['already_registered']='No';
            }
			// ------------------------------------------------------------------------
			$employee_level=$this->common->select_single_records('employee_levels',array('employee_id'=>$employee_id));
			$data['employee_level']=$this->common->select_single_records('levels',array('level_id'=>$employee_level['level_id']));
			// ------------------------------------------------------------------------
			$employee_positions=$this->common->select_single_records('employee_positions',$where=array('employee_id'=>$employee_id));
			$data['class']=$this->common->select_single_records('classes',$where=array('id'=>$employee_positions['class_id']));
			$data['position']=$this->common->select_single_records('positions',$where=array('position_id'=>$employee_positions['position_id']));
			$data['subject']=$this->common->select_single_records('subject',$where=array('id'=>$employee_positions['subject_id']));
			$data['branch']=$this->common->select_single_records('branch',$where=array('id'=>$employee_positions['branch_id']));
			// ------------------------------------------------------------------------
			$data['current_status']=$this->common->select_single_records('statuses',array('status_id'=>$data['employees']['employee_last_status_id']));
			// ------------------------------------------------------------------------
			$data['employee_statuses']=$this->recruitment->get_employee_statuses($employee_id);
			// echo "<pre>";
			// print_r ($data['employee_statuses']);
			// echo "</pre>";
			// exit();
			$data['employee_last_status_name']=$this->common->select_single_records('statuses',$where=array('status_id'=>$data['employees']['employee_last_status_id']));
			$data['employee_last_status_remarks']=$this->common->select_single_records('status_remarks',$where=array('status_id'=>$data['employees']['employee_last_status_id']));
			// $employee_statuses=$this->common->select_array_records('employee_statuses',$where=array('employee_id'=>$employee_id));
			// $data['statuses']=$this->common->select_single_records('statuses',$where=array('status_id'=>$employee_statuses['status_id']));
			// ------------------------------------------------------------------------
			// $data['status_remarks']=$this->common->select_single_records('status_remarks',$where=array('status_id'=>$data['statuses']['status_id']));
			// ------------------------------------------------------------------------
			$employee_contacts=$this->common->select_single_records('employee_contacts',$where=array('employee_id'=>$employee_id));
			$data['contacts']=$this->common->select_single_records('contact',$where=array('id'=>$employee_contacts['contact_id']));
			// ------------------------------------------------------------------------
			$data['addresses']=$this->common->select_array_records('address',$where=array('contact_id'=>$employee_contacts['contact_id']));
			// ------------------------------------------------------------------------//
			$data['children_details']=$this->common->select_array_records('children_details',$where=array('employee_id'=>$employee_id));
			// ------------------------------------------------------------------------
			$data['departments']=$this->common->select_array_records('departments');
			// ------------------------------------------------------------------------
			$data['documents']=$this->common->select_single_records('documents',array('employee_id'=>$employee_id));			
			// ------------------------------------------------------------------------
			// echo "<pre>";
			// print_r ($data);
			// echo "</pre>";
			// exit();
			$data['active']='manage_applicants';
			$this->load->view('admin/header',$data);
			$this->load->view('admin/human_resources/applicant_details',$data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function applying_for_update()
	{
		$employee_id=$this->input->post('employee_id');
		$where=array('employee_id'=>$employee_id);
		$data=array(
			'position_id'	=>$this->input->post('position_id'),
			'class_id'		=>$this->input->post('class_id'),
			'subject_id'	=>$this->input->post('subject_id'),
			'branch_id'		=>$this->input->post('branch_id')
		);
		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";exit();
		$result=$this->common->update_table('employee_positions',$where,$data);
		$result=$this->common->update_table('employee_levels',$where,array('level_id'=>$this->input->post('level_id')));
		echo $result;
	}
	public function personal_details_update()
	{
		$employees=array(
				'employee_name'					=>$this->input->post('employee_name'),
				'employee_cnic'					=>$this->input->post('employee_cnic'),
				'employee_father_name'			=>$this->input->post('employee_father_name'),
				'employee_father_cnic'			=>$this->input->post('employee_father_cnic'),
				'employee_gender'				=>$this->input->post('employee_gender'),
				'employee_martial_status'		=>$this->input->post('employee_martial_status'),
				'employee_husband_wife_cnic'	=>$this->input->post('employee_husband_wife_cnic')
			);
		$result=$this->common->update_table('employees',$where=array('employee_id'=>$this->input->post('employee_id')),$employees);
		// ------------------------------------------------------------------------
		$contact_id=$this->common->select_single_records('employee_contacts',$where=array('employee_id'=>$this->input->post('employee_id')));
		$contact=array(
			'contact_email'						=>$this->input->post('contact_email'),
			'contact_cell'						=>$this->input->post('contact_cell'),
			'contact_line'						=>$this->input->post('contact_line'),
			'contact_line_ext'					=>$this->input->post('contact_line_ext')
		);
		$result=$this->common->update_table('contact',$where=array('id'=>$contact_id['contact_id']),$contact);
		// ------------------------------------------------------------------------
		$address=array(
			'address_type'	=>'Residential',
			'address_local'	=>$this->input->post('address_local'),
			'address_city'	=>$this->input->post('address_city')	
		);
		$address1=array(
			'address_type'	=>'Permanent',
			'address_local'	=>$this->input->post('address_local1'),
			'address_city'	=>$this->input->post('address_city1')
		);
		$result=$this->common->update_table('address',$where=array('contact_id'=>$contact_id['contact_id']),$address);
		$result=$this->common->update_table('address',$where=array('contact_id'=>$contact_id['contact_id']),$address1);
		echo $result;
	}
	public function children_details_add()
	{
		$data=array(
			'employee_id'			=>$this->input->post('employee_id'),
			'children_name'			=>$this->input->post('children_name'),
			'children_class'		=>$this->input->post('children_class'),
			'children_school'		=>$this->input->post('children_school')
		);
		$children_detail_id=$this->common->insert_into_table('children_details',$data);
		$data['children_details']=$this->common->select_array_records('children_details',$where=array('employee_id'=>$this->input->post('employee_id')));
		$tbody=$this->load->view('admin/human_resources/children_details_ajax_table', $data, TRUE);
		echo $tbody;
	}
	public function children_details_update($id)
	{
		$update_arr=array(
			'children_name'			=>$this->input->post('child_name'),
			'children_class'		=>$this->input->post('class_name'),
			'children_school'		=>$this->input->post('school_name')
		);
		$where = array('children_detail_id' => $id,);
		$update=$this->common->update_table('children_details',$where,$update_arr);
		if($update){
			echo "1";
		}else{
			echo "2";
		}
	}
	public function children_details_delete()
	{
		
		$result=$this->common->delete_record('children_details',$where=array('children_detail_id'=>$this->input->post('children_detail_id')));
		
			$data['children_details']=$this->common->select_array_records('children_details',$where=array('employee_id'=>$this->input->post('employee_id')));
			$tbody=$this->load->view('admin/human_resources/children_details_ajax_table', $data, TRUE);
		
		// $tbody='<table class="table table-hover">
		//             <thead>
		//                 <tr>
		//                     <th> Sr. # </th>
		//                     <th> Name </th>
		//                     <th> Class </th>
		//                     <th> School </th>
		//                     <th> Status </th>
		//                 </tr>
		//             </thead>
		//             <tbody>';
	 //    $i=1; 
	 //    foreach($data['children_details'] as $key => $value)
	 //    {
	 //        $tbody.='<tr>
	 //                    <td>'.$i.'</td>
	 //                    <td>'.$value['children_name'].'</td>
	 //                    <td>'.$value['children_class'].'</td>
	 //                    <td>'.$value['children_school'].'</td>
	 //                    <td>
	 //                        <div class="btn-group">
	 //                            <button type="button" class="btn btn-info">Edit</button>
	 //                            <a onclick="return confirm(\'Are You sure you want to delete the Data?\');" id="children_details_delete_btn" class="btn btn-danger">Delete</a>
	 //                        </div>
	 //                    </td>
	 //                </tr>';
	 //        $i++;
	 //    }
	 //    $tbody.='</tbody>
	 //    	</table>';
		echo $tbody;
	}
	public function test_demo_result_update()
	{
		echo "<pre>";
		print_r ($this->input->post());
		echo "</pre>";exit();
		$employee_statuses=$this->common->select_array_records('employee_statuses',$where=array('employee_id'=>$this->input->post('employee_id')));
		if(count($employee_statuses)>1)
		{
			$data=array(
				'status_result'	=>$this->input->post('status_result'),
				'status_remark'	=>$this->input->post('status_remark')
			);
			$result=$this->common->update_table('status_remarks',$where=array('employee_id'=>$this->input->post('employee_id'),'status_id'=>2),$data);
			$data1=array(
			'employee_id'		=>$this->input->post('employee_id'),
			'branch_id'			=>$this->input->post('employee_id'),
			'position_id'		=>2,
			'department_id'		=>$this->input->post('department_id'),
			'employee_salary'	=>$this->input->post('branch_id'),
		);
			$result=$this->common->update_table('employee_positions',$where=array('employee_id'=>$this->input->post('employee_id')),$data);
		}
		$employee_statuses=array(
			'employee_id'		=>$this->input->post('employee_id'),
			'status_id'			=>2
		);
		$employee_status_id=$this->common->insert_into_table('employee_statuses',$employee_statuses);
		$status_remarks=array(
			'employee_id'		=>$this->input->post('employee_id'),
			'status_id'			=>2,
			'status_result'		=>$this->input->post('status_result'),
			'status_remark'		=>$this->input->post('status_remark')
		);
		$status_remark_id=$this->common->insert_into_table('status_remarks',$status_remarks);
		$data1=array(
			'employee_id'		=>$this->input->post('employee_id'),
			'branch_id'			=>$this->input->post('employee_id'),
			'position_id'		=>2,
			'department_id'		=>$this->input->post('department_id'),
			'employee_salary'	=>$this->input->post('branch_id'),
		);
		$result=$this->common->update_table('employee_positions',$where=array('employee_id'=>$this->input->post('employee_id')),$data);
		echo $result;
	}
	public function send_email($id='')
	{
        if($this->session->userdata('id'))
		{
			$branch_contact_id=$this->common->select_single_records('branch_contact',array('branch_id',$this->input->post('branch_id')));
			$data['branch_address']=$this->common->select_single_records('address',array('contact_id',$branch_contact_id['contact_id']));
			$data['branch_contact']=$this->common->select_single_records('contact',array('id',$branch_contact_id['contact_id']));
			// ------------------------------------------------------------------------
			$to=$this->input->post('send_to');
			$message='<div style="max-width:600px;margin:0 auto;background-color:#e7e7e7;">
						<h2 style="background-color:#3498db;color:white;padding:20px 10px;text-align:center;margin-bottom:0px;">
							GSIS Registration
						</h2>
						<p style="margin-top:0px;background-color:#ecf0f1;padding:30px 10px;">'
							.$this->input->post('message').'<br>Location : '.$data['branch_address']['address_local'].
						'</p>
						<p style="font-size:smaller;padding:20px;">
				        	*Please do not reply to this email. This is a computer generated email.<br>
                            *For any queries related to the program, please email us@ info@gsis.edu.pk
				        </p>
				    </div>';
			// ------------------------------------------------------------------------
			$header="From: no-reply@gsis.edu.pk\r\n";
			$header.="MIME-Version: 1.0\r\n";
			$header.="Content-type:text/html;charset=UTF-8"."\r\n";
			$mail_sent=mail($to, 'GSIS Test/Demo Date', $message,$header);
			if($mail_sent)
			{
				$email_data=array(
					'employee_id' 	=> $this->input->post('employee_id'),
					'send_to' 		=> $this->input->post('send_to'),
					'subject' 		=> $this->input->post('subject'),
					'test_datetime' => $this->input->post('test_datetime'),
					'branch_id' 	=> $this->input->post('branch_id'),
					'message' 		=> $this->input->post('message')
				);
				$this->common->insert_into_table('employee_emails',$email_data);
				$this->session->set_flashdata('ok_message', '- Email Sent successfully!');
				redirect('recruitment/email_history/'.$this->input->post('employee_id'));
			}
			else
			{
				$this->session->set_flashdata('err_message', '- Email Sending Failed!');
				redirect('recruitment/email_history/'.$this->input->post('employee_id'));
				// redirect('recruitment/applicant_details/'.$this->input->post('employee_id'));
			}
		}
		else
		{
			redirect('login/');
		}
	}
    public function email_history($id='')
	{
        if($this->session->userdata('id'))
		{
			$data['active']='manage_applicants';
			$this->load->view('admin/header',$data);
			$data['employee_id']=$id;
			$this->load->view('admin/human_resources/email_history',$data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function add_employee()
	{
        $this->load->view('header');
		$config['upload_path']			= './assets/documents/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 2048;
        $this->upload->initialize($config);
        if(!$this->upload->do_upload('employee_cv'))
        {
            $this->load->view('header');
            $data['error']=$this->upload->display_errors();
            $this->load->view('admin/human_resources/recruitment_form',$data);
        }
        else
        {
        	$data = array('upload_data' => $this->upload->data());
        	$employee_cv_file_name=$data['upload_data']['file_name'];
        }
        // ------------------------------------------------------------------------
		$config['upload_path']			= './assets/documents/';
        $config['allowed_types']        = 'png|jpg|jpeg';
        $config['max_size']             = 256;
        $this->upload->initialize($config);
        if(!$this->upload->do_upload('employee_picture_name'))
        {
            $this->load->view('header');
            $data['error']=$this->upload->display_errors();
            $this->load->view('admin/human_resources/recruitment_form',$data);
        }
        else
        {
            $data=array('upload_data' => $this->upload->data());
            $employee_picture_name=$data['upload_data']['file_name'];
			// ------------------------------------------------------------------------
			$employees=array(
				'employee_name'					=>$this->input->post('employee_name'),
				'employee_cnic'					=>$this->input->post('employee_cnic'),
				'employee_picture_name'			=>$employee_picture_name,
				'employee_father_name'			=>$this->input->post('employee_father_name'),
				'employee_father_cnic'			=>$this->input->post('employee_father_cnic'),
				'employee_gender'				=>$this->input->post('employee_gender'),
				'employee_martial_status'		=>$this->input->post('employee_martial_status'),
				'employee_husband_wife_cnic'	=>$this->input->post('employee_husband_wife_cnic')
			);
			$employee_id=$this->common->insert_into_table('employees', $employees);
			$employee_no=array(
				'employee_no'					=>$employee_id
			);
			$result=$this->common->update_table('employees', $where=array('employee_id'=>$employee_id), $employee_no);
			// ------------------------------------------------------------------------
			$documents=array(
				'employee_id'					=>$employee_id,
				'document_type'					=>'employee_cv',
				'document_name'					=>$employee_cv_file_name
			);
			$document_id=$this->common->insert_into_table('documents', $documents);
			// ------------------------------------------------------------------------
			$contact=array(
				'contact_email'					=>$this->input->post('contact_email'),
				'contact_cell'					=>$this->input->post('contact_cell'),
				'contact_line'					=>$this->input->post('contact_line'),
				'contact_line_ext'				=>$this->input->post('contact_line_ext')
			);
			$contact_id=$this->common->insert_into_table('contact', $contact);
			// ------------------------------------------------------------------------
			$employee_contacts=array(
				'employee_id'					=>$employee_id,
				'contact_id'					=>$contact_id
			);
			$employee_contact_id=$this->common->insert_into_table('employee_contacts', $employee_contacts);
			// ------------------------------------------------------------------------
			$address=array(
							array(
									'contact_id'	=>$contact_id,
									'address_type'	=>'Residential',
									'address_local'	=>$this->input->post('address_local'),
									'address_city'	=>$this->input->post('address_city')
								),
							array(
									'contact_id'	=>$contact_id,
									'address_type'	=>'Permanent',
									'address_local'	=>$this->input->post('address_local1'),
									'address_city'	=>$this->input->post('address_city1')
								),
			);
			$address=$this->db->insert_batch('address', $address);
			// ------------------------------------------------------------------------
			$employee_positions=array(
				'employee_id'					=>$employee_id,
				'position_id'					=>$this->input->post('position_id')
				// 'class_id'					=>$this->input->post('class_id'),
				// 'subject_id'					=>$this->input->post('subject_id'),
				// 'branch_id'					=>$this->input->post('branch_id')
			);
			$result=$this->common->insert_into_table('employee_positions', $employee_positions);
			// ------------------------------------------------------------------------	// ------------------------------------------------------------------------
			$employee_levels=array(
				'employee_id'					=>$employee_id,
				'level_id'						=>$this->input->post('level_id')
			);
			$result=$this->common->insert_into_table('employee_levels', $employee_levels);
			// ------------------------------------------------------------------------
			$employee_statuses=array(
				'employee_id'					=>$employee_id,
				'status_id'						=>1
			);
			$result=$this->common->insert_into_table('employee_statuses', $employee_statuses);
			// ------------------------------------------------------------------------
			$employee_status_remarks=array(
				'employee_id'					=>$employee_id,
				'status_id'						=>1,
				'status_result'					=>'',
				'status_result'					=>''
			);
			$result=$this->common->insert_into_table('status_remarks', $employee_status_remarks);
			// ------------------------------------------------------------------------
			if($result)
			{
                // $this->load->view('header');
				echo '<div class="container" style="margin-top:50px;">
					  	<div class="jumbotron">
						    <h1>Thank you for registering with GSIS!</h1> 
						    <p>Your registration form is under process.In case you did not get notify within 24 hours,directly visit the seeked campus.</p> 
					  	</div>
					  	<a href="'.SURL.'recruitment/"><button class="btn btn-primary btn-block"> Go Back</button></a>
					</div>';
			}
			else
			{
				echo 'Something is wrong please try again';
			}
		}
	}
	public function get_employee_email_history()
    {
        $list = $this->recruitment->get_employee_email_history(0,$this->input->post('employee_id'));
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            $row[] = $value['send_to'];
            $row[] = $value['subject'];
            $row[] = $value['test_datetime'];
            $row[] = $value['branch_name'];
            $row[] = $value['message'];
            $row[] = $value['created_at'];
            // $row[] = '<a class="btn btn-primary btn-sm" href="'.SURL.'recruitment/applicant_details/'.$value['employee_id'].'">Detail</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->recruitment->employee_email_history_count($this->input->post('employee_id')),
            "recordsFiltered" => $this->recruitment->employee_email_history_count($this->input->post('employee_id')),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function update_employee_status($employee_id='',$status_id='')
    {
    	if($this->session->userdata('id'))
		{
	    	$updated=$this->common->update_table('employees',array('employee_id'=>$employee_id),array('employee_last_status_id'=>$status_id+1));
	    	$updated1=$this->common->insert_into_table('employee_statuses',array('employee_id'=>$employee_id,'status_id'=>$status_id+1));
	    	$updated2=$this->common->insert_into_table('status_remarks',array('employee_id'=>$employee_id,'status_id'=>$status_id+1));
	    	if($updated2)
	    	{
	    		redirect('recruitment/applicant_details/'.$employee_id);
	    	}
	    }
	    else
		{
			redirect('login/');
		}
    }
}