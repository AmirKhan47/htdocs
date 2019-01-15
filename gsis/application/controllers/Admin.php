<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Admin extends CI_Controller
	{
			private $datetime_today,$date_today;
			function __construct()
			{
				parent :: __construct();
				$this->load->helper(array('form', 'url'));
				$this->load->model('registration_model');
				$this->load->model('mod_common');
				date_default_timezone_set("Asia/Karachi");
				$this->datetime_today= date('Y-m-d h:i:s');
				$this->date_today= date('Y-m-d');
			}
		public function index()
		{
			if($this->session->userdata('id'))
			{
				$data['active']='dashboard';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/dashboard');
			}
			else
			{
				redirect('login/');
			}
		}
		public function portal()
		{
			if($this->session->userdata('id'))
			{
				$data['branches'] = $this->registration_model->branches_contact();
				$data['active']='portal';
				$this->load->view('admin/header',$data);
				$this->load->view('registration/registration_list',$data);
				$this->load->view('admin/footer');
			}
			else
			{
				redirect('login/');
			}
		}
		public function get_data()
		{
			$branch_id=$this->session->userdata('branch_id');
			if($this->session->userdata('role')==1)
			{
				$list=$this->registration_model->get_data1($status='pending');
			}
			else
			{
				$list=$this->registration_model->get_data($status='pending',$branch_id);
			}
			$data = array();
			$output=array();
			$no = $_POST['start'];
			foreach ($list as $key => $value)
			{
				$no++;
				$row = array();
				$row[] = $value['student_roll_no'];
				$row[] = '<div style="text-transform: uppercase">'.$value['student_name'].'
							<input type="hidden" id="student_id" value="'.$value['student_id'].'">
						</div>';
				$row[] = $value['pending_date'];
				$row[] = $value['contact_cell'];
				// foreach ($branches as $branch) 
    //             {
    //                 if($branch['id']==$value['branch_id'])
    //                 {
                        $row[]=$value['branch_name'];
                    // }   
            		// }
				$row[] = $value['student_national_id'];
				$row[] = '<div class="text-uppercase">'.$value['registration_status'].'</div>';
				if($value['email_count']!=0)
						{
                        	$action = '<span class="badge badge-success" onclick="getStudentMessages('.$value['student_id'].');">'.$value['email_count'].'</span>';
                        }
                        else
                        {
                        	$action = '<span class="badge badge-danger">'.$value['email_count'].'</span>';
                        }
                        $action .= '<button type="button" class="btn btn-circle btn-danger btn-xs" onclick="addStudentDataToModal(\''.$value['student_id'].'\',\''.$value['student_name'].'\',\''.$value['contact_email'].'\',\''.$value['class_name'].'\')" data-toggle="modal" data-target="#exampleModal1">Send Test Date
                                    </button>
                                    <a href="'.base_url().'admin/getStudentMeetings/'.$value['student_id'].'">
                                        <button type="button" class="btn btn-circle btn-info btn-xs">
                                            Email History
                                        </button>
                                    </a>';
                $row[] = $action;
                if($value['email_count']>0)
                {
	                $row[] = '<a href="'.base_url().'admin/student_detail/'.$value['student_id'].'">
	                            <button id="test_result" type="button" class="btn btn-circle blue btn-xs">
	                                Enter Test Results
	                            </button>
	                        </a>
	                        <a style="display:none;" href="'.SURL.'admin/delete_student/'.$value['student_id'].'" class="btn btn-danger" onclick="return confirm(\'Are You sure you want to delete the User?\');"><i class="fa fa-trash"></i>
	                        </a>';
                }
                else
                {
	                $row[] = '<a href="'.base_url().'admin/student_detail/'.$value['student_id'].'">
			                    <button id="test_result" type="button" class="btn btn-circle blue btn-xs" disabled>
			                        Enter Test Results
			                    </button>
	                		</a>
	                		<a style="display:none;" href="'.SURL.'admin/delete_student/'.$value['student_id'].'" class="btn btn-danger" onclick="return confirm(\'Are You sure you want to delete the User?\');"><i class="fa fa-trash"></i>
	                		</a>';
	            }
				$data[] = $row;
			}
			if($this->session->userdata('role')==1)
			{
				$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->registration_model->user_count11('pending'),
					"recordsFiltered" => $this->registration_model->user_count11('pending'),
					"data" => $data,
				);
			}
			else
			{
				$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->registration_model->user_count('pending',$branch_id),
					"recordsFiltered" => $this->registration_model->user_count('pending',$branch_id),
					"data" => $data,
				);
			}
			echo json_encode($output);
		}
		public function registeredStudents()
		{
			if($this->session->userdata('id'))
			{
				$data['active']='registeredStudents';
				$this->load->view('admin/header',$data);
				$this->load->view('registration/registered_list');
				$this->load->view('admin/footer');
			}
			else
			{
				redirect('login/');
			}
		}
		public function get_data1()
		{
			$branch_id=$this->session->userdata('branch_id');
			if($this->session->userdata('role')==1)
			{
				$list=$this->registration_model->get_data11($status='payment pending');
			}
			else
			{
				$list=$this->registration_model->get_data22($status='payment pending',$branch_id);
			}
			$data = array();
			$output=array();
			$no = $_POST['start'];
			foreach ($list as $key => $value)
			{
				$no++;
				$row = array();
				$row[] = $value['student_roll_no'];
				$row[] = '<div style="text-transform: uppercase">'.$value['student_name'].'</div>';
				$row[] = $value['student_national_id'];
				$row[] = $value['contact_cell'];
				$row[] = $value['branch_name'];
                $row[] = $value['registration_test'];
				$row[] = $value['registration_fee'];
				$row[] = '<div class="text-uppercase">'.$value['registration_status'].'</div>';
				$row[] = '<a style="color:white;" href="'.base_url().'admin/registered_student_details/'.$value['student_id'].'">
                                                    <button type="button" class="btn btn-circle blue btn-xs">Detail
                                                    </button>
                                                  </a>';
                $row[] = '<a style="color:white;" href="'.base_url().'challan/index/'.$value['student_id'].'">
                                                    <button type="button" class="btn btn-circle green btn-xs">Challan
                                                    </button>
                                                    </a>';
				
                // $row[] = '<a style="display:none;" href="'.SURL.'admin/delete_student/'.$value['student_id'].'" class="btn btn-danger" onclick="return confirm(\'Are You sure you want to delete the User?\');"><i class="fa fa-trash"></i></a>';
				$data[] = $row;
			}
			if($this->session->userdata('role')==1)
			{
				$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->registration_model->user_count22($status='payment pending'),
					"recordsFiltered" => $this->registration_model->user_count22($status='payment pending'),
					"data" => $data,
				);
			}
			else
			{
				$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->registration_model->user_count1($status='payment pending',$branch_id),
					"recordsFiltered" => $this->registration_model->user_count1($status='payment pending',$branch_id),
					"data" => $data,
				);
			}
			echo json_encode($output);
		}
		public function registered_students()
		{
			if($this->session->userdata('id'))
			{
				$data['branches'] = $this->registration_model->branches_contact();
				$data['active']='registered_students';
				$this->load->view('admin/header',$data);
				$this->load->view('registration/registered_students',$data);
				$this->load->view('admin/footer');
			}
			else
			{
				redirect('login/');
			}
		}
		public function get_registered_students()
		{
			$branch_id=$this->session->userdata('branch_id');
			if($this->session->userdata('role')==1)
			{
				$list=$this->registration_model->get_registered_students($status='registered');
			}
			else
			{
				$list=$this->registration_model->get_registered_students1($status='registered',$branch_id);
			}
			$data = array();
			$output=array();
			$no = $_POST['start'];
			foreach ($list as $key => $value)
			{
				// if(empty($value['student_registration_no']))
				// {
				// }
				$no++;
				$row = array();
				$row[] = $value['student_roll_no'];
				$row[] = $value['student_registration_no'];
				$row[] = '<div style="text-transform: uppercase">'.$value['student_name'].'</div>';
				$row[] = $value['student_national_id'];
				$row[] = $value['guardian_national_id'];
				$row[] = $value['contact_cell'];
                $row[] = $value['branch_name'];
				$row[] = '<div class="text-uppercase">'.$value['registration_status'].'</div>';
				$row[] = '<a style="color:white;" href="'.base_url().'admin/registered_student_details/'.$value['student_id'].'">
                                                    <button type="button" class="btn btn-circle blue btn-xs">Detail
                                                    </button>
                                                  </a>';
                $row[] = '<a href="'.base_url().'file/index/'.$value['student_id'].'">
                                                    <button type="button" class="btn btn-circle green btn-xs">File Completion
                                                    </button>
                                                    </a>';
     //                if($value['email_count']!=0)
					// {
     //                	$action = '<span class="badge badge-success" onclick="getStudentMessages2('.$value['student_id'].');">'.$value['email_count'].'</span>';
     //                }
     //                else
     //                {
     //                	$action = '<span class="badge badge-danger">'.$value['email_count'].'</span>';
     //                }
            		$action = '<button type="button" class="btn btn-circle btn-danger btn-xs" onclick="addStudentDataToModal2(\''.$value['student_id'].'\',\''.$value['student_name'].'\',\''.$value['contact_email'].'\',\''.$value['class_name'].'\',\''.$value['branch_name'].'\',\''.$value['student_roll_no'].'\',\''.$value['pending_date'].'\',\''.$value['registration_date'].'\',\''.$value['branch_id'].'\')" data-toggle="modal" data-target="#exampleModal2">Send Email</button><a style="display:none;" href="'.SURL.'admin/delete_student/'.$value['student_id'].'" class="btn btn-danger" onclick="return confirm(\'Are You sure you want to delete the User?\');"><i class="fa fa-trash"></i></a>';
                $row[] = $action;

				$data[] = $row;
			}
			if($this->session->userdata('role')==1)
			{
				$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->registration_model->registered_students_count($status='registered'),
					"recordsFiltered" => $this->registration_model->registered_students_count($status='registered'),
					"data" => $data,
				);
			}
			else
			{
				$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->registration_model->registered_students_count1($status='registered',$branch_id),
					"recordsFiltered" => $this->registration_model->registered_students_count1($status='registered',$branch_id),
					"data" => $data,
				);
			}
			echo json_encode($output);
		}
		public function file_completion_students()
		{
			if($this->session->userdata('id'))
			{
				$data['branches'] = $this->registration_model->branches_contact();
				$data['active']='file_completion_students';
				$this->load->view('admin/header',$data);
				$this->load->view('registration/file_completion_students',$data);
				$this->load->view('admin/footer');
			}
			else
			{
				redirect('login/');
			}
		}
		public function get_file_completion_students()
		{
			$branch_id=$this->session->userdata('branch_id');
			if($this->session->userdata('role')==1)
			{
				$list=$this->registration_model->get_file_completion_students($status='registered');
				// echo $this->db->last_query();exit();
			}
			else
			{
				$list=$this->registration_model->get_file_completion_students1($status='registered',$branch_id);
			}
			$data = array();
			$output=array();
			$no = $_POST['start'];
			foreach ($list as $key => $value)
			{
				$no++;
				$row = array();
				$row[] = $value['student_roll_no'];
				$row[] = $value['student_registration_no'];
				$row[] = '<div style="text-transform: uppercase">'.$value['student_name'].'</div>';
				$row[] = $value['student_national_id'];
				$row[] = $value['guardian_national_id'];
				$row[] = $value['contact_cell'];
                $row[] = $value['branch_name'];
				$row[] = '<div class="text-uppercase">'.$value['registration_status'].'</div>';
				$row[] = '<a style="color:white;" href="'.base_url().'admin/registered_student_details/'.$value['student_id'].'">
                                                    <button type="button" class="btn btn-circle blue btn-xs">Detail
                                                    </button>
                                                  </a>';
                $row[] = '<a href="'.base_url().'file/index/'.$value['student_id'].'">
                                                    <button type="button" class="btn btn-circle green btn-xs">File Completion
                                                    </button>
                                                    </a>';
     //                if($value['email_count']!=0)
					// {
     //                	$action = '<span class="badge badge-success" onclick="getStudentMessages2('.$value['student_id'].');">'.$value['email_count'].'</span>';
     //                }
     //                else
     //                {
     //                	$action = '<span class="badge badge-danger">'.$value['email_count'].'</span>';
     //                }
            		$action = '<button type="button" class="btn btn-circle btn-danger btn-xs" onclick="addStudentDataToModal2(\''.$value['student_id'].'\',\''.$value['student_name'].'\',\''.$value['contact_email'].'\',\''.$value['class_name'].'\',\''.$value['branch_name'].'\',\''.$value['student_roll_no'].'\',\''.$value['pending_date'].'\',\''.$value['registration_date'].'\',\''.$value['branch_id'].'\')" data-toggle="modal" data-target="#exampleModal2">Send Email</button><a style="display:none;" href="'.SURL.'admin/delete_student/'.$value['student_id'].'" class="btn btn-danger" onclick="return confirm(\'Are You sure you want to delete the User?\');"><i class="fa fa-trash"></i></a>';
                $row[] = $action;

				$data[] = $row;
			}
			if($this->session->userdata('role')==1)
			{
				$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->registration_model->file_completion_students_count($status='registered'),
					"recordsFiltered" => $this->registration_model->file_completion_students_count($status='registered'),
					"data" => $data,
				);
			}
			else
			{
				$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->registration_model->file_completion_students_count1($status='registered',$branch_id),
					"recordsFiltered" => $this->registration_model->file_completion_students_count1($status='registered',$branch_id),
					"data" => $data,
				);
			}
			echo json_encode($output);
		}
		public function all_students()
		{
			if($this->session->userdata('id'))
			{
				$data['branches'] = $this->registration_model->branches_contact();
				$data['active']='all_students';
				$this->load->view('admin/header',$data);
				$this->load->view('registration/all_students',$data);
				$this->load->view('admin/footer');
			}
			else
			{
				redirect('login/');
			}
		}
		public function get_all_students()
		{
			$branch_id=$this->session->userdata('branch_id');
			// if($this->session->userdata('role')==1)
			// {
				$list=$this->registration_model->get_all_students1();
				// echo($this->db->last_query());
				// echo "<pre>";
				// print_r ($list);
				// echo "</pre>";
				// exit();
			// }
			// else
			// {
			// 	$list=$this->registration_model->get_all_students($branch_id);
			// }
			$data = array();
			$output=array();
			$no = $_POST['start'];
			foreach ($list as $key => $value)
			{
				$no++;
				$row = array();
				$row[] = $value['student_roll_no'];
				$row[] = $value['student_registration_no'];
				$row[] = '<div class="text-uppercase">'.$value['registration_status'].'</div>';
				$row[] = '<div style="text-transform: uppercase">'.$value['student_name'].'</div>';
				$row[] = $value['student_national_id'];
				$row[] = $value['guardian_national_id'];
				$row[] = $value['contact_cell'];
                $row[] = $value['branch_name'];
				$row[] = '<div class="text-uppercase">'.$value['registration_test'].'</div>';
				// $row[] = '<a style="color:white;" href="'.base_url().'admin/registered_student_details/'.$value['student_id'].'">
    //                                                 <button type="button" class="btn btn-circle blue btn-xs">Detail
    //                                                 </button>
    //                                               </a>';
    //             $row[] = '<a href="'.base_url().'file/index/'.$value['student_id'].'">
    //                                                 <button type="button" class="btn btn-circle green btn-xs">File Completion
    //                                                 </button>
    //                                                 </a>';
    //         		$action = '<button type="button" class="btn btn-circle btn-danger btn-xs" onclick="addStudentDataToModal2(\''.$value['student_id'].'\',\''.$value['student_name'].'\',\''.$value['contact_email'].'\',\''.$value['class_name'].'\',\''.$value['branch_name'].'\',\''.$value['student_roll_no'].'\',\''.$value['pending_date'].'\',\''.$value['registration_date'].'\',\''.$value['branch_id'].'\')" data-toggle="modal" data-target="#exampleModal2">Send Email</button><a style="display:none;" href="'.SURL.'admin/delete_student/'.$value['student_id'].'" class="btn btn-danger" onclick="return confirm(\'Are You sure you want to delete the User?\');"><i class="fa fa-trash"></i></a>';
    //             $row[] = $action;
				$data[] = $row;
			}
			// if($this->session->userdata('role')==1)
			// {
				$output = array(
					"draw" => $_POST['draw'],
					"recordsTotal" => $this->registration_model->all_students_count1(),
					"recordsFiltered" => $this->registration_model->all_students_count1(),
					"data" => $data,
				);
			// }
			// else
			// {
			// 	$output = array(
			// 		"draw" => $_POST['draw'],
			// 		"recordsTotal" => $this->registration_model->all_students_count($branch_id),
			// 		"recordsFiltered" => $this->registration_model->all_students_count($branch_id),
			// 		"data" => $data,
			// 	);
			// }
			echo json_encode($output);
		}
		public function registered_student_details($student_id)
		{
			if($this->session->userdata('id'))
			{
				$data['student'] 				= $this->registration_model->get_student($student_id);
				$data['father'] 				= $this->registration_model->get_student_guardian_single($student_id,"father");
				$data['mother'] 				= $this->registration_model->get_student_guardian_single($student_id,"mother");
				$data['guardians'] 				= $this->registration_model->get_all_guardians($student_id);
				$data['siblings'] 				= $this->registration_model->get_all_siblings($data['father']['guardian_national_id']);
				$data['branches'] 				= $this->registration_model->get_all_branches();
				$data['classes'] 				= $this->registration_model->get_all_classes_in_branch($data['student']['branch_id']);
				$data['registered_subjects'] 	= $this->registration_model->get_registered_subjects($student_id);
				// $data['students'] = $this->registration_model->get_all_students('registered');
				$data['active']='registeredStudents';
				$this->load->view('admin/header',$data);
				$data['registered_student_details']=$this->registration_model->get_registered_student_details($student_id);
				$this->load->view('registration/registered_student_detail',$data);
				// $this->load->view('admin/footer');
			}
			else
			{
				redirect('login/');
			}
		}
		public function sendMessage()
		{
			if($this->session->userdata('id'))
			{
				$branch_id=$this->input->post('branch');
				// echo($branch_id);
				$branch=$this->registration_model->read_data_from_table('branch',array('id'=>$branch_id));
				// $data['branches'] = $this->registration_model->branches_contact();
				$branch_contact=$this->registration_model->get_branch_contact($branch_id);
				$result=$this->registration_model->get_student($this->input->post('student_id'));
				$test_date=date_format(date_create($this->input->post('test_day').'-'.$this->input->post('test_month').'-'.$this->input->post('test_year')),"d-M-Y");
				if(!$result)
				{
					echo '<div class="alert alert-warning text-center">Student Not Found</div>';
				}
				else
				{
					$db_time=$this->input->post('time');
					$time=date('h:i a', strtotime($db_time));
					$header="From: no-reply@gsis.edu.pk\r\n";
					// Always set content-type when sending HTML email
					$header .= "MIME-Version: 1.0\r\n";
					$header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$message='<div style="max-width:600px;margin:0 auto;background-color:#e7e7e7;">
						<h2 style="background-color:#3498db;color:white;padding:20px 10px;text-align:center;margin-bottom:0px;">
							GSIS Registration
						</h2>
						<p style="margin-top:0px;background-color:#ecf0f1;padding:30px 10px;">
							<b style="float: left;">
								Dear Student/Parent/Guardian,
							</b>
							<br>
							Test of 
							<b style="text-transform: uppercase;">
								'.$result['student_name'].'
							</b>
							 for Class  
							<b>
							 	'.$result['class_name'].' 
							</b> is schedule on 
							<b>
								'.$time.' '.$test_date.'
							</b> 
							at <b>'.$branch[0]['branch_name'].', '.$branch_contact['address_local'].'</b>.
						</p>
				        <p style="font-size:smaller;padding:20px;">For Queries<br>';

				    $message .='Phone: ';
				    $message .=$branch_contact['contact_cell'].'<br>Email: '.$branch_contact['contact_email'].'</p></div>';
				    $mail_to = $result['contact_email'];
				    $mail_to_cc = $branch_contact['contact_email'];
				    // $email_to = $result['contact_email'],$branch_contact['contact_email'];
				    $to = $mail_to.", ".$mail_to_cc;
				    // $to="ballers999@gmail.com, sufian.rizvi41@gmail.com";
					$mail_sent = mail($to, 'GSIS Registration', $message,$header);
					$status='not sent';
					if($mail_sent)
					{
						$status='sent';
					}
					$data['email']= array(	'email_from_user_id' => 0,
											'student_id' => $this->input->post('student_id'),
											'email_to' => $result['contact_email'],
											'email_subject' => 'GSIS Registration',
											'email_message' => $message,
											'email_datetime' => $this->datetime_today,									
											'email_status' => $status
										);
					$data['meeting']= array('student_id' => $this->input->post('student_id'),
											'meeting_from_date' => $test_date,
											'meeting_from_time' => $time,
											'branch_id' => $branch_id,
											'meeting_subject' => 'GSIS Registration'
										);
					$this->registration_model->create_data_in_table('email',$data['email']);
					$this->registration_model->create_data_in_table('meeting',$data['meeting']);
					echo '<div class="alert alert-success text-center">Email Sent</div>';	
				}
			}
			else
			{
				redirect('login/');
			}
		}
		public function sendMessage2()
		{
			if($this->session->userdata('id'))
			{
				//Modal Posted Data
				$student_id=$this->input->post('student_id');
				$branch_id=$this->input->post('branch_id');
				$student_email=$this->input->post('student_email');
				$student_name=$this->input->post('student_name');
				$student_class=$this->input->post('student_class');
				$branch_name=$this->input->post('branch_name');
				$student_roll_no=$this->input->post('student_roll_no');
				$pending_date=$this->input->post('pending_date');
				$registration_date=$this->input->post('registration_date');

				$branch=$this->registration_model->read_data_from_table('branch',array('id'=>$branch_id));
				$branch_contact=$this->registration_model->get_branch_contact($branch_id);
				$result=$this->registration_model->get_student($this->input->post('student_id'));
				if(!$result)
				{
					echo '<div class="alert alert-warning text-center">Student Not Found</div>';
				}
				else
				{
					// $db_time=$this->input->post('time');
					// $time=date('h:i a', strtotime($db_time));
					$header="From:'GSIS Head Office' <no-reply@gsis.edu.pk>\r\n";
					// Always set content-type when sending HTML email
					$header .= "MIME-Version: 1.0\r\n";
					$header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					//Begin: Email Body Message
					$message='<div style="max-width:600px;margin:0 auto;background-color:#e7e7e7;">
						<h2 style="background-color:#3498db;color:white;padding:20px 10px;text-align:center;margin-bottom:0px;">
							GSIS Admission Confirmation
						</h2>
						<p style="margin-top:0px;background-color:#ecf0f1;padding:30px 10px;">
							<b style="float: left;">
								Dear Student/Parent/Guardian,<br>
							</b>
							<br>
							 Congratulations, 
							<b style="text-transform: uppercase;">
								'.$student_name.'
							</b>
							has been registered successfully in class 
							<b>
							 	'.$student_class.' 
							</b> at branch 
							<b>
								<b>'.$branch_name.''.$branch_contact['address_local'].'</b>.
							</b> 
							and his/her roll number is 
							<b>'.$student_roll_no.'</b>.<br><br>
							Please find admission order attached.<br><br>
                            Registration Date: <b>'.$pending_date.'</b><br>
                            Fee Challan Submission Date: <b>'.$registration_date.'</b><br><br>
                            Please visit <b>GSIS Aviceena Branch</b> to fullfil following requirements for <b>File Completion</b>.<br>
                            1. Undertaking By Guardian<input type="checkbox" name="" value="" checked><br>
                            2. Copy of Paid Fee Challan<input type="checkbox" name="" value="" checked><br>
                            3. Copy of Paid Registration Slip<input type="checkbox" name="" value=""><br>
                            4. Photographs<input type="checkbox" name="" value=""><br>
                            5. Copy of Form-B<input type="checkbox" name="" value=""><br>
                            6. Copy of Guardian Cnic<input type="checkbox" name="" value=""><br>
                            7. School Leaving Certificate<input type="checkbox" name="" value=""><br>
                            8. Record of Results<input type="checkbox" name="" value=""><br>
                            9. Merit Certificates<input type="checkbox" name="" value=""><br>
                            10. Gap Certificate<input type="checkbox" name="" value=""><br>
                            11. Character Certificate<input type="checkbox" name="" value=""><br>
                            12. Migration Certificate<input type="checkbox" name="" value=""><br>
                            13. Registration Card<input type="checkbox" name="" value=""><br>
                            14. Equivalence Certificate<input type="checkbox" name="" value=""><br>
                            15. Cancelation of Result<input type="checkbox" name="" value=""><br>
						</p>
				        <p style="font-size:smaller;padding:20px;">For Queries<br>';
				    $message .='Phone: ';
				    $message .=$branch_contact['contact_line'].'<br>Email: '.$branch_contact['contact_email'].'</p></div>';
				    $mail_to = $student_email;
				    $mail_to_cc = $branch_contact['contact_email'];
				    // $email_to = $result['contact_email'],$branch_contact['contact_email'];
				    $to = $mail_to.", ".$mail_to_cc;
				    // $to="ballers999@gmail.com, sufian.rizvi41@gmail.com";
					$mail_sent = mail($to, 'GSIS Admission Confirmation', $message,$header);
					$status='not sent';
					if($mail_sent)
					{
						$status='sent';
					}
					$data['email']= array(	'email_from_user_id' => 0,
											'student_id' => $this->input->post('student_id'),
											'email_to' => $result['contact_email'],
											'email_subject' => 'GSIS Registration',
											'email_message' => $message,
											'email_datetime' => $this->datetime_today,									
											'email_status' => $status
										);
					$data['meeting']= array('student_id' => $this->input->post('student_id'),
											'meeting_from_date' => date('Y-m-d'),
											'meeting_from_time' => time('h:i:s'),
											'meeting_subject' => 'GSIS Admission Confirmation'
										);
					$this->registration_model->create_data_in_table('email',$data['email']);
					$this->registration_model->create_data_in_table('meeting',$data['meeting']);
					echo '<div class="alert alert-success text-center">Email Sent</div>';	
				}
			}
			else
			{
				redirect('login/');
			}
		}
		public function getStudentMeetings($student_id)
		{
			if($this->session->userdata('id'))
			{
				$data['meetings'] = $this->registration_model->get_student_meetings($student_id);
				$data['emails'] = $this->registration_model->read_data_from_table('email',array('student_id'=>$student_id));
				$data['active']='portal';
				$this->load->view('admin/header',$data);
				$this->load->view('registration/email_history', $data);
			}
			else
			{
				redirect('login/');
			}
		}
		public function cancelStudentMeeting($meeting_id)
		{
			if($this->session->userdata('id'))
			{
				$meeting=array('meeting_status'=>'cancelled');
				$data['meetings'] = $this->registration_model->update_data_in_table('meeting',$meeting,array('id'=>$meeting_id));
				$this->load->view('email_history', $data);
			}
			else
			{
				redirect('login/');
			}
		}
		public function getBranchesInClass($class_id)
		{
			if($this->session->userdata('id'))
			{
				$branches = $this->registration_model->get_all_branches_in_class($class_id);
				if(!$branches)
				{
					echo json_encode(array('response'=>'fail'));
				}
				else
				{
					$response='';
					foreach ($branches as $key => $value) 
					{
						$response .= '<option value="'.$value['id'].'">'.$value['branch_name'].'</option>';
					}
					echo json_encode(array('response'=>'success','data'=>$response));
				}
			}
			else
			{
				redirect('login/');
			}
		}
		public function getClassesInBranch($branch_id)
		{
			if($this->session->userdata('id'))
			{
				$classes = $this->registration_model->get_all_classes_in_branch($branch_id);
				if(!$classes)
				{
					echo json_encode(array('response'=>'fail'));
				}
				else
				{
					echo json_encode(array('response'=>'success','classes'=>$classes));
				}
			}
			else
			{
				redirect('login/');
			}
		}
		public function getSubjectInClasses($class_id,$student_id)
		{
			if($this->session->userdata('id'))
			{

				$data['subjects'] 			= $this->registration_model->get_all_subject_in_classes($class_id);
				$data['student_subjects']	=$this->common->select_array_records('student_subject',array('student_id' => $student_id));
				if(!$data['subjects'])
				{
					echo json_encode(array('response'=>'fail'));
				}
				else
				{
					$html=$this->load->view('admin/subjects/ajax_subject_list',$data,true);
					echo json_encode(array('response'=>'success','subjects'=>$html));
				}
			}
			else
			{
				redirect('login/');
			}
		}
		public function student_detail($student_id)
		{
			if($this->session->userdata('id'))
			{
				$data['student'] = $this->registration_model->get_student($student_id);
				$data['classes']=$this->registration_model->read_data_from_table('classes');
				$data['father'] = $this->registration_model->get_student_guardian_single($student_id,"father");
				$data['mother'] = $this->registration_model->get_student_guardian_single($student_id,"mother");
				$data['siblings'] = $this->registration_model->get_all_siblings($data['father']['guardian_national_id']);
				$data['branches'] = $this->registration_model->get_all_branches();
				$data['student_date_of_birth_day']=date('d',strtotime($data['student']['student_date_of_birth']));
				$data['student_date_of_birth_month']=date('M',strtotime($data['student']['student_date_of_birth']));
				$data['student_date_of_birth_year']=date('Y',strtotime($data['student']['student_date_of_birth']));
				$data['registration_required_from_day']=date('d',strtotime($data['student']['registration_required_from']));
				$data['registration_required_from_month']=date('M',strtotime($data['student']['registration_required_from']));
				$data['registration_required_from_year']=date('Y',strtotime($data['student']['registration_required_from']));
				$data['registration_last_school_from_day']=date('d',strtotime($data['student']['registration_last_school_from']));
				$data['registration_last_school_from_month']=date('M',strtotime($data['student']['registration_last_school_from']));
				$data['registration_last_school_from_year']=date('Y',strtotime($data['student']['registration_last_school_from']));
				$data['registration_last_school_to_day']=date('d',strtotime($data['student']['registration_last_school_to']));
				$data['registration_last_school_to_month']=date('M',strtotime($data['student']['registration_last_school_to']));
				$data['registration_last_school_to_year']=date('Y',strtotime($data['student']['registration_last_school_to']));
				$data['active']='portal';
				$this->load->view('admin/header',$data);
				$this->load->view('header');
				$this->load->view('registration/view_form', $data);
			}
			else
			{
				redirect('login/');
			}
		}
		public function registered_student_detail($student_id)
		{
			if($this->session->userdata('id'))
			{
				$data['student'] = $this->registration_model->get_student($student_id);
				$data['father'] = $this->registration_model->get_student_guardian_single($student_id,"father");
				$data['mother'] = $this->registration_model->get_student_guardian_single($student_id,"mother");
				$data['guardians'] = $this->registration_model->get_all_guardians($student_id);
				$data['siblings'] = $this->registration_model->get_all_siblings($data['father']['guardian_national_id']);
				$data['branches'] = $this->registration_model->get_all_branches();
				$data['classes'] = $this->registration_model->get_all_classes_in_branch($data['student']['branch_id']);
				$data['registeredSubjects'] = $this->registration_model->get_registered_subjects($student_id);
				$data['active']='registeredStudents';
				$this->load->view('admin/header',$data);
				$this->load->view('registration/detailed_view', $data);
			}
			else
			{
				redirect('login/');
			}
		}
		public function updateStudent()
		{
			if($this->session->userdata('id'))
			{
				$student_id=$this->input->post('student_id');
				$student_date_of_birth=date_format(date_create($this->input->post('student_date_of_birth_year').'-'.$this->input->post('student_date_of_birth_month').'-'.$this->input->post('student_date_of_birth_day')),"Y-m-d");
				$data['student'] = array('s.student_name' =>  $this->input->post('student_name')
						,'s.student_national_id' =>  $this->input->post('student_national_id')
						,'s.student_gender' =>  $this->input->post('student_gender')
						,'s.student_date_of_birth' =>  $student_date_of_birth
						,'s.student_place_of_birth' =>  $this->input->post('student_place_of_birth')
						,'s.student_religion' =>  $this->input->post('student_religion')
						,'s.student_nationality' =>  $this->input->post('student_nationality')
				);
				$this->registration_model->update_data_in_table('student s',$data['student'],array('id' => $student_id ));
				date_default_timezone_set('Asia/Karachi');
				$data['registration'] = array('branch_id' =>  $this->input->post('branch_name')
						,'class_id' =>  $this->input->post('class_name')
						,'r.registration_status' => 'Payment Pending'
						,'r.payment_pending_date'=> date("Y-m-d h:i:s")
						,'r.registration_last_school_name' =>  $this->input->post('registration_last_school_name')
						,'r.registration_test' =>  $this->input->post('registration_test')
						,'r.registration_test_remarks' =>  $this->input->post('registration_test_remarks')
						//,'r.registration_last_school_from' =>  $this->input->post('registration_last_school_from')
						,'r.registration_fee' =>  $this->input->post('registration_fee')
						//,'r.registration_last_school_to' =>  $this->input->post('registration_last_school_to')
						,'r.registration_last_school_reason_for_leaving' =>  $this->input->post('registration_reason_for_leaving')
				);
				if($this->input->post('registration_required_from_year')>0 && $this->input->post('registration_required_from_month')>0 && $this->input->post('registration_required_from_day')>0){
							$registration_required_from=date_format(date_create($this->input->post('registration_required_from_year').'-'.$this->input->post('registration_required_from_month').'-'.$this->input->post('registration_required_from_day')),"Y-m-d");
							$temp=array('registration_required_from' => $registration_required_from);
							$data['registration']=array_merge($data['registration'], $temp);
						}
				if($this->input->post('registration_last_school_from_year')>0 && $this->input->post('registration_last_school_from_month')>0 && $this->input->post('registration_last_school_from_day')>0){
							$registration_last_school_from=date_format(date_create($this->input->post('registration_last_school_from_year').'-'.$this->input->post('registration_last_school_from_month').'-'.$this->input->post('registration_last_school_from_day')),"Y-m-d");
							$temp=array('registration_last_school_from' => $registration_last_school_from);
							$data['registration']=array_merge($data['registration'], $temp);
						}
				if($this->input->post('registration_last_school_to_year')>0 && $this->input->post('registration_last_school_to_month')>0 && $this->input->post('registration_last_school_to_day')>0){
							$registration_last_school_to=date_format(date_create($this->input->post('registration_last_school_to_year').'-'.$this->input->post('registration_last_school_to_month').'-'.$this->input->post('registration_last_school_to_day')),"Y-m-d");
							$temp=array('registration_last_school_to' => $registration_last_school_from);
							$data['registration']=array_merge($data['registration'], $temp);
						}
				$temp=$this->registration_model->read_data_from_table('registration',array('student_id' => $student_id ));
				$this->registration_model->update_data_in_table('registration r',$data['registration'],array('id' => $temp[0]['id'] ));
				
				$data['guardian'] = array(
										'g.guardian_name' =>  $this->input->post('guardian_name'),
										'g.guardian_national_id' =>  $this->input->post('guardian_national_id')
				);
				$data['guardian1'] = array(
										'g.guardian_name' 			=> $this->input->post('guardian_name1'),
										'g.guardian_national_id'	=> $this->input->post('guardian_national_id1')
									);
				$temp2=$this->registration_model->read_data_from_table('student_guardian',array('student_id' => $student_id ));

				$temp=$this->registration_model->read_data_from_table('guardian',array('id' => $temp2[0]['guardian_id'] ));

				$temp3=$this->registration_model->read_data_from_table('guardian',array('id' => $temp2[1]['guardian_id'] ));

				$this->registration_model->update_data_in_table('guardian g',$data['guardian'],array('id' => $temp2[0]['guardian_id'] ));
				$this->registration_model->update_data_in_table('guardian g',$data['guardian1'],array('id' => $temp2[1]['guardian_id'] ));
				
				//$this->registration_model->update_data_in_table('guardian',$data['guardian']);
				$data['contact'] = array('c.contact_cell' =>  $this->input->post('contact_cell')
						,'c.contact_line' =>  $this->input->post('contact_line')
						,'c.contact_email' =>  $this->input->post('contact_email')
				);
				$temp=$this->registration_model->read_data_from_table('student_contact',array('student_id' => $student_id ));
				$this->registration_model->update_data_in_table('contact c',$data['contact'],array('id'=>$temp[0]['contact_id']));
				//$this->registration_model->update_data_in_table('contact',$data['contact']);
				$data['address'] = array(
					'a.address_local'	=>  $this->input->post('address_local'),
					'a.address_sector'	=>  $this->input->post('address_sector'),
					'a.address_city'	=>  $this->input->post('address_city')
				);
				$temp=$this->registration_model->read_data_from_table('address',array('contact_id' => $temp[0]['contact_id'] ));
				$this->registration_model->update_data_in_table('address a',$data['address'],array('id' => $temp[0]['id'] ));
				//$this->registration_model->update_data_in_table('address',$data['address']);
				redirect('admin/registeredStudents/');
			}
			else
			{
				redirect('login/');
			}
		}
		public function update_Student()
		{
			if($this->session->userdata('id'))
			{
				$student_id=$this->input->post('student_id');
				$student_date_of_birth=date_format(date_create($this->input->post('student_date_of_birth_year').'-'.$this->input->post('student_date_of_birth_month').'-'.$this->input->post('student_date_of_birth_day')),"Y-m-d");
				$data['student'] = array('s.student_name' =>  $this->input->post('student_name')
						,'s.student_national_id' =>  $this->input->post('student_national_id')
						,'s.student_gender' =>  $this->input->post('student_gender')
						,'s.student_date_of_birth' =>  $student_date_of_birth
						,'s.student_place_of_birth' =>  $this->input->post('student_place_of_birth')
						,'s.student_religion' =>  $this->input->post('student_religion')
						,'s.student_nationality' =>  $this->input->post('student_nationality')
				);
				$this->registration_model->update_data_in_table('student s',$data['student'],array('id' => $student_id ));
				date_default_timezone_set('Asia/Karachi');
				$data['registration'] = array('branch_id' =>  $this->input->post('branch_name')
						,'class_id' =>  $this->input->post('class_name')
						// ,'r.registration_status' => 'Payment Pending'
						// ,'r.payment_pending_date'=> date("Y-m-d h:i:s")
						,'r.registration_last_school_name' =>  $this->input->post('registration_last_school_name')
						,'r.registration_test' =>  $this->input->post('registration_test')
						,'r.registration_test_remarks' =>  $this->input->post('registration_test_remarks')
						//,'r.registration_last_school_from' =>  $this->input->post('registration_last_school_from')
						,'r.registration_fee' =>  $this->input->post('registration_fee')
						//,'r.registration_last_school_to' =>  $this->input->post('registration_last_school_to')
						,'r.registration_last_school_reason_for_leaving' =>  $this->input->post('registration_reason_for_leaving')
				);
				if($this->input->post('registration_required_from_year')>0 && $this->input->post('registration_required_from_month')>0 && $this->input->post('registration_required_from_day')>0){
							$registration_required_from=date_format(date_create($this->input->post('registration_required_from_year').'-'.$this->input->post('registration_required_from_month').'-'.$this->input->post('registration_required_from_day')),"Y-m-d");
							$temp=array('registration_required_from' => $registration_required_from);
							$data['registration']=array_merge($data['registration'], $temp);
						}
				if($this->input->post('registration_last_school_from_year')>0 && $this->input->post('registration_last_school_from_month')>0 && $this->input->post('registration_last_school_from_day')>0){
							$registration_last_school_from=date_format(date_create($this->input->post('registration_last_school_from_year').'-'.$this->input->post('registration_last_school_from_month').'-'.$this->input->post('registration_last_school_from_day')),"Y-m-d");
							$temp=array('registration_last_school_from' => $registration_last_school_from);
							$data['registration']=array_merge($data['registration'], $temp);
						}
				if($this->input->post('registration_last_school_to_year')>0 && $this->input->post('registration_last_school_to_month')>0 && $this->input->post('registration_last_school_to_day')>0){
							$registration_last_school_to=date_format(date_create($this->input->post('registration_last_school_to_year').'-'.$this->input->post('registration_last_school_to_month').'-'.$this->input->post('registration_last_school_to_day')),"Y-m-d");
							$temp=array('registration_last_school_to' => $registration_last_school_from);
							$data['registration']=array_merge($data['registration'], $temp);
						}
				$temp=$this->registration_model->read_data_from_table('registration',array('student_id' => $student_id ));
				$this->registration_model->update_data_in_table('registration r',$data['registration'],array('id' => $temp[0]['id'] ));
				//print_r($registration);
				
				$data['guardian'] = array(
										'g.guardian_name' =>  $this->input->post('guardian_name'),
										'g.guardian_national_id' =>  $this->input->post('guardian_national_id')
				);
				$data['guardian1'] = array(
										'g.guardian_name' 			=> $this->input->post('guardian_name1'),
										'g.guardian_national_id'	=> $this->input->post('guardian_national_id1')
									);
				$temp2=$this->registration_model->read_data_from_table('student_guardian',array('student_id' => $student_id ));
				$temp=$this->registration_model->read_data_from_table('guardian',array('id' => $temp2[0]['guardian_id'] ));
				$temp3=$this->registration_model->read_data_from_table('guardian',array('id' => $temp2[1]['guardian_id'] ));

				$result=$this->registration_model->update_data_in_table('guardian g',$data['guardian'],array('id' => $temp2[0]['guardian_id'] ));
				$result1=$this->registration_model->update_data_in_table('guardian g',$data['guardian1'],array('id' => $temp2[1]['guardian_id'] ));
				$data['contact'] = array('c.contact_cell' =>  $this->input->post('contact_cell')
						,'c.contact_line' =>  $this->input->post('contact_line')
						,'c.contact_email' =>  $this->input->post('contact_email')
				);
				$temp=$this->registration_model->read_data_from_table('student_contact',array('student_id' => $student_id ));
				$this->registration_model->update_data_in_table('contact c',$data['contact'],array('id'=>$temp[0]['contact_id']));
				$data['address'] = array(
					'a.address_local' =>  $this->input->post('address_local'),
					'a.address_sector' =>  $this->input->post('address_sector'),
					'a.address_city' =>  $this->input->post('address_city')
				);
				$temp=$this->registration_model->read_data_from_table('address',array('contact_id' => $temp[0]['contact_id'] ));
				$result=$this->registration_model->update_data_in_table('address a',$data['address'],array('id' => $temp[0]['id'] ));
				if($result)
				{
					redirect('admin/student_detail/'.$student_id);
				}
			}
			else
			{
				redirect('login/');
			}
		}
		public function insertStudentSubjects()
		{
			if($this->session->userdata('id'))
			{
				$student_id=$this->input->post('student_id');
				$subjects = $this->input->post('subjects');
				
				foreach($subjects as $value)
				{
					$data['student_subject'] = array('student_id' =>  $student_id
							,'subject_id' =>  $value
					);
					$result=$this->registration_model->create_data_in_table('student_subject',$data['student_subject']);
					
				}
				if($result){
					$data['registered_subjects'] = $this->registration_model->get_registered_subjects($student_id);
					$html=$this->load->view('admin/subjects/ajax_subject_table',$data,true);
					echo json_encode(array('response'=>'success','subject_table' =>$html));
				}else{
					echo json_encode(array('response'=>'fail'));

				}
				
			}
			else
			{
				redirect('login/');
			}
		}
		public function isGuardianNationalIdRegistered($guardian_national_id)
		{
			if($this->session->userdata('id'))
			{
				if($this->registration_model->is_table_has_column('guardian',array('guardian_national_id' =>$guardian_national_id)))
				{
						$guardian=$this->registration_model->read_data_from_table('guardian',array('guardian_national_id'=>$guardian_national_id));
						echo json_encode(array('response'=>'success','guardian'=>$guardian));
				}
				else
				{
					echo json_encode(array('response'=>'not registered'));
				}
			}
			else
			{
				redirect('login/');
			}
		}
		public function addGuardian()
		{
			if($this->session->userdata('id'))
			{
				$student_id=$this->input->post('student_id');
				$guardian_national_id=$this->input->post('guardian_national_id');
				//if already registered
				if($this->registration_model->is_table_has_column('guardian',array('guardian_national_id' =>$guardian_national_id)))
				{
					$guardian=$this->registration_model->read_data_from_table('guardian',array('guardian_national_id'=>$guardian_national_id));
					//if already guardian
					if($this->registration_model->is_table_has_column('student_guardian',array('guardian_id' =>$guardian[0]['id'],'student_id' =>$student_id)))
					{
						echo json_encode(array('response'=>'already guardian'));
						//if not guardian
					}
					else
					{
						$data['student_guardian'] = array('student_guardian_relationship' => $this->input->post('student_guardian_relationship')
							,'student_id' =>  $student_id
							,'guardian_id' =>  $guardian[0]['id']
						);
						$this->registration_model->create_data_in_table('student_guardian',$data['student_guardian']);
						echo json_encode(array('response'=>'success'));
					}
				//if not registered
				}
				else
				{
					$data['guardian'] = array(
						'guardian_name' 		=>  $this->input->post('guardian_name'),
						'guardian_national_id' 	=>  $this->input->post('guardian_national_id'),
						'guardian_occupation' 	=>  $this->input->post('guardian_occupation'),
						'guardian_designation' 	=>  $this->input->post('guardian_designation'),
						'guardian_organization' =>  $this->input->post('guardian_organization')
					);
					$guardian_id=$this->common->insert_into_table('guardian',$data['guardian']);
					// ------------------------------------------------------------------------
					$data = array(
						'contact_cell' =>  $this->input->post('contact_cell')
					);
					$contact_id=$this->common->insert_into_table('contact',$data);
					// ------------------------------------------------------------------------
					$data = array(
						'guardian_id' =>  $guardian_id,
						'contact_id' =>  $contact_id
					);
					$guardian_contact_id=$this->common->insert_into_table('guardian_contacts',$data);
					// ------------------------------------------------------------------------
					$guardian=$this->registration_model->read_data_from_table('guardian',array('guardian_national_id'=>$guardian_national_id));

					$data['student_guardian'] = array('student_guardian_relationship' => $this->input->post('student_guardian_relationship')
						,'student_id' =>  $student_id
						,'guardian_id' =>  $guardian[0]['id']
					);
					$this->registration_model->create_data_in_table('student_guardian',$data['student_guardian']);
					echo json_encode(array('response'=>'success'));
				}
			}
			else
			{
				redirect('login/');
			}
		}
		public function submission_details($id)
		{
			if($this->session->userdata('id'))
			{	
				$data['active']='registeredStudents';
				$this->load->view('admin/header',$data);
				$data['student_id']=$id;;
				$this->load->view('registration/submission_details', $data);
			}
			else
			{
				redirect('login/');
			}
		}
		public function submission_details_submit($student_id,$challan_id)
		{
			if($this->session->userdata('id'))
			{	
				$data['active']='registeredStudents';
				$this->load->view('admin/header',$data);
				$table = 'challan';
				$where = array('challan_id' => $challan_id);
				$data = array(
								'challan_bank_submitted' 		=> $this->input->post('bank_name'),
								'challan_date_submitted' 		=> $this->input->post('date_of_payment'),
								'challan_amount_submitted' 		=> $this->input->post('amount')
				 			);
				$result['challan_fee']=$this->registration_model->update_data_in_table($table,$data,$where);
				if ($result)
				{
					echo 'Amount Submitted';
					redirect('admin/registeredStudents');
				}
				else
				{
					echo "Failed!";
				}
			}
			else
			{
				redirect('login/');
			}
		}
		public function submission_details_edit($challan_id, $student_id)
		{
			if($this->session->userdata('id'))
			{
				$data['challan_id']=($challan_id);
				$data['student_id']=($student_id);
				$data['result']=$this->registration_model->read_data_from_table('challan',array('id'=>$challan_id));
				$data['challan_day_submitted']=date('d',strtotime($data['result'][0]['challan_date_submitted']));
				$data['challan_month_submitted']=date('M',strtotime($data['result'][0]['challan_date_submitted']));
				$data['challan_year_submitted']=date('Y',strtotime($data['result'][0]['challan_date_submitted']));
				$data['history']=$this->registration_model->read_data_from_table('challan_submit_archive',array('challan_id'=>$challan_id));
				$data['active']='registeredStudents';
				$this->load->view('admin/header',$data);
				$data['error']='';
				$this->load->view('registration/submission_details_edit', $data);
			}
			else
			{
				redirect('login/');
			}
		}
		public function submission_details_update($challan_id,$student_id)
		{
			if($this->session->userdata('id'))
			{
				$data['active']='registeredStudents';
				$this->load->view('admin/header',$data);
				// File Uploading 1
				// ------------------------------------------------------------------------
               	$config['upload_path']          = './assets/uploads/';
                $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                $config['max_size']             = 2048;
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('undertaking'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    // The uploaded file exceeds the maximum allowed size in your PHP configuration file.
                    $this->session->set_flashdata('err_message', $error['error']);
                    redirect('admin/submission_details_edit/'.$challan_id.'/'.$student_id);
                }
                else
                {
                	$data = array('upload_data' => $this->upload->data());
                	$undertaking_file_name=$data['upload_data']['file_name'];
                }
               // File Uploading 2
                $config['upload_path']          = './assets/uploads/';
                $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                $config['max_size']             = 2048;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('copy_of_paid_fee_challan'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    // The uploaded file exceeds the maximum allowed size in your PHP configuration file.
                    $this->session->set_flashdata('err_message', $error['error']);
                    redirect('admin/submission_details_edit/'.$challan_id.'/'.$student_id);
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                	$challan_file_name=$data['upload_data']['file_name'];
                	$this->mod_common->insert_into_table(
                		'uploads',$data = array('student_id' => $student_id, 
                		'undertaking' => $undertaking_file_name,
                		'copy_of_paid_fee_challan' => $challan_file_name,
                	));
					$table = 'challan';
					$where = array('id' => $challan_id);
					$student_date_of_birth=date_format(date_create($this->input->post('challan_year_submitted').'-'.$this->input->post('challan_month_submitted').'-'.$this->input->post('challan_day_submitted')),"Y-m-d");
					$data = array(
									'challan_bank_submitted' 	=> $this->input->post('bank_name'),
									'challan_date_submitted' 	=> $student_date_of_birth,
									'challan_amount_submitted' 	=> $this->input->post('amount')
					 			);
					$result['challan_fee']=$this->registration_model->update_data_in_table($table,$data,$where);
					$data['challan_data']=$this->registration_model->read_data_from_table('challan',array('id'=>$challan_id));
					$table1 = 'registration';
					$where1 = array('student_id' => $student_id);
					//Generating Roll Number
					// ------------------------------------------------------------------------
					$registration=$this->common->get_all_records_nums('registration','student_registration_no',array('student_registration_no >'=>0));
					if($registration>0)
					{
						$max_roll_no=$this->common->select_max('registration','student_registration_no');
						$data1 = array(
							'student_registration_no'	=> $max_roll_no['student_registration_no']+1
					 	);
					}
					else
					{
						$data1 = array(
							'student_registration_no' 	=> 7401
					 	);
					}
					// ------------------------------------------------------------------------
					$result['student_roll_no_update']=$this->registration_model->update_data_in_table($table1,$data1,$where1);
					//update registration status to registered
					$table = 'registration';
					$data = array('registration_status' => 'registered',
						'registration_date' => $this->datetime_today
					);
					$where = array('student_id' => $student_id );
					$student_registered=$this->registration_model->update_data_in_table($table,$data,$where);
					if ($student_registered)
					{
						$this->session->flashdata('ok_message','Amount Updated');
						redirect(SURL.'admin/registered_students/');
					}
					else
					{
						$this->session->flashdata('err_message','Amount Updation Failed');
						redirect(SURL.'admin/registered_students/');
					}
				}
			}
			else
			{
				redirect('login/');
			}
		}
		public function submission_details_view($id)
		{
			if($this->session->userdata('id'))
			{
				$data['result']=$this->registration_model->read_data_from_table('challan',array('student_id'=>$id));
				$data['active']='registeredStudents';
				$this->load->view('admin/header',$data);
				$this->load->view('registration/submission_details_view', $data);
			}
			else
			{
				redirect('login/');
			}
		}
		// load branch update view
		public function branch_update()
		{
			if($this->session->userdata('id'))
			{
				$data['branches'] = $this->registration_model->get_all_branches();
				$data['active']='branch_update';
				$this->load->view('admin/header',$data);
				$this->load->view('registration/branch_update', $data);
				$this->load->view('admin/footer');
			}
			else
			{
				redirect('login/');
			}
		}
		// update branch details
		public function add_branch_contact()
		{
			if($this->session->userdata('id'))
			{
				//update in contact
				$branch_id=$this->input->post('branch_name');
				$branch_phone=$this->input->post('branch_phone');
				$branch_email=$this->input->post('branch_email');
				$branch_address=$this->input->post('branch_address');
				$contact=array(
								'contact_email' 	=> $this->input->post('branch_email'),
								'contact_line' 		=> $this->input->post('branch_phone')
				 			);
				$this->registration_model->update_data_in_table('contact',$contact,$where=array('id'=>$branch_id));
				//update in branch_contact
				// $contact_id=$this->registration_model->read_last_insert_id();
				// $branch_contact=array(
				// 	'branch_id'=>$branch_id
				// );
				// $this->registration_model->create_data_in_table('branch_contact',$branch_contact,$branch_id);
				//update in address
				$table='address';
				$data=array(
					'address_local'=>$branch_address
				);
				$where=array(
					'id'=>$branch_id
				);
				$this->registration_model->update_data_in_table($table,$data,$where);
				// $data['branches'] = $this->registration_model->get_all_branches();
				$data['active']='branch_update';
				$this->load->view('admin/header',$data);
				$this->session->set_flashdata('ok_message', '- Record Updated successfully!');
				redirect('admin/branch_update');
			}
			else
			{
				redirect('login/');
			}
		}
		public function edit_guardian($id)
		{
			// echo($id);
			$data['guardians']=$this->registration_model->read_data_from_table('student_guardian',array('guardian_id'=>$id));
			$data['guardian']=$this->registration_model->read_data_from_table('guardian',array('id'=>$data['guardians'][0]['guardian_id']));
			$data['guardian_contacts']=$this->registration_model->read_data_from_table('guardian_contacts',array('guardian_id'=>$id));
			$data['contacts']=$this->registration_model->read_data_from_table('contact',array('id'=>$data['guardian_contacts'][0]['contact_id']));
			$data['active']='registeredStudents';
			$this->load->view('admin/header',$data);
			$this->load->view('registration/edit_guardian', $data);
		}
		public function update_guardian($id)
		{
			$where = array('id' => $id);
			$data = array(
				'guardian_national_id' 	=> $this->input->post('guardian_national_id'),
				'guardian_name' 		=> $this->input->post('guardian_name'),
				'guardian_occupation' 	=> $this->input->post('guardian_occupation'),
				'guardian_designation' 	=> $this->input->post('guardian_designation'),
				'guardian_organization' => $this->input->post('guardian_organization')
 			);
			$result['guardian']=$this->registration_model->update_data_in_table('guardian',$data,$where);
			// ------------------------------------------------------------------------
			$where1 = array('guardian_id' => $id);
			$guard=$this->common->select_single_records('student_guardian',$where1);
			// ------------------------------------------------------------------------
 			$result=$this->common->select_single_records('guardian_contacts',array('guardian_id'=>$id));
 			// ------------------------------------------------------------------------
 			$data2=$this->common->update_table('contact',array('id'=>$result['contact_id']),array('contact_cell'=>$this->input->post('contact_cell')));
 			// relationship------------------------------------------------------------------------
			$data1 = array(
				'student_guardian_relationship' => $this->input->post('student_guardian_relationship'),
	 		);
			$result['student_guardian']=$this->registration_model->update_data_in_table('student_guardian',$data1,$where1);
			// ------------------------------------------------------------------------
			if($result['student_guardian'])
			{
				redirect('admin/registered_student_details/'.$guard['student_id']);
			}
		}
		public function delete_guardian()
		{
			$deleted=$this->common->delete_record('guardian',array('id'=>$this->input->post('id')));
			$deleted1=$this->common->delete_record('student_guardian',array('guardian_id'=>$this->input->post('id')));
			$guardian_contacts=$this->common->select_single_records('guardian_contacts',$where=array('guardian_id'=>$this->input->post('id')));
			$deleted2=$this->common->delete_record('guardian_contacts',array('guardian_id'=>$this->input->post('id')));
			$deleted3=$this->common->delete_record('contact',$where=array('id'=>$guardian_contacts['contact_id']));
			if ($deleted3)
			{
				echo "1";
			}
			else
			{
				echo "2";
			}
		}
		public function delete_subject()
		{
			$student_subject_id=$this->input->post('id');
			$where = array(
				'id' => $student_subject_id,
			);
			$deleted=$this->common->delete_record('student_subject',$where);
			if($deleted)
			{
				echo "1";
			}
			else
			{
				echo "2";
			}
		}
		public function undertaking_print($student_id)
		{
			if($this->session->userdata('id'))
			{
				$data['student'] = $this->registration_model->get_student($student_id);
				$data['classes']=$this->registration_model->read_data_from_table('classes');
				$data['father'] = $this->registration_model->get_student_guardian_single($student_id,"father");
				$data['mother'] = $this->registration_model->get_student_guardian_single($student_id,"mother");
				$data['siblings'] = $this->registration_model->get_all_siblings($data['father']['guardian_national_id']);
				$data['branches'] = $this->registration_model->get_all_branches();
				$data['student_date_of_birth_day']=date('d',strtotime($data['student']['student_date_of_birth']));
				$data['student_date_of_birth_month']=date('M',strtotime($data['student']['student_date_of_birth']));
				$data['student_date_of_birth_year']=date('Y',strtotime($data['student']['student_date_of_birth']));
				$data['registration_required_from_day']=date('d',strtotime($data['student']['registration_required_from']));
				$data['registration_required_from_month']=date('M',strtotime($data['student']['registration_required_from']));
				$data['registration_required_from_year']=date('Y',strtotime($data['student']['registration_required_from']));
				$data['registration_last_school_from_day']=date('d',strtotime($data['student']['registration_last_school_from']));
				$data['registration_last_school_from_month']=date('M',strtotime($data['student']['registration_last_school_from']));
				$data['registration_last_school_from_year']=date('Y',strtotime($data['student']['registration_last_school_from']));
				$data['registration_last_school_to_day']=date('d',strtotime($data['student']['registration_last_school_to']));
				$data['registration_last_school_to_month']=date('M',strtotime($data['student']['registration_last_school_to']));
				$data['registration_last_school_to_year']=date('Y',strtotime($data['student']['registration_last_school_to']));
				$this->load->view('registration/undertaking_print',$data);
			}
			else
			{
				redirect('login/');
			}
		}	
		public function delete_student($student_id)
		{
			$table='student';
			$data = array('student_status' => 0);
			$where = array('id' => $student_id);
			$result['deleted']=$this->registration_model->update_data_in_table($table, $data, $where);
			if($result['deleted'])
			{
				$this->session->set_flashdata('ok_message', '- Record deleted successfully!');
				redirect(SURL . 'admin/portal');
			}
			else
			{
				$this->session->set_flashdata('err_message', '- Error in deleteting  please try again!');
				redirect(SURL . 'admin/portal');
			}
		}
	}
?>