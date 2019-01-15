<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lead extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//Do your magic here
		$this->load->model('bdm/Lead_model','lead_model');
		$this->load->model('Auth_model');
	}

	public function index(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			if($this->session->userdata('role')==1){
				$data['sublayout']='bdm/leads/all_leads';
				$data['active']='all_leads';
				$this->load->view('bdm/bdm_layout',$data);
			}else{
				$this->session->set_flashdata('err_message','- Unauthorized page');
				redirect(URL.'Auth/');
			}
		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(URL.'Auth/');
		}
		
	}

	public function registration_form(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			if($this->input->post('submit')){
				//$this->form_validation->set_rules('designation', 'Designation', 'required');
				//$this->form_validation->set_rules('title', 'Title', 'required');
				$this->form_validation->set_rules('name', 'Customer Name', 'required');
				$this->form_validation->set_rules('phone', 'Contact no', 'required');
				// $this->form_validation->set_rules('date', 'Date', 'required');
				$this->form_validation->set_rules('address', 'Address', 'required');
			    //$this->form_validation->set_rules('category', 'Category', 'required');
			    if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('err_message', '- Something Error in Registration ');
					redirect(BURL . 'lead/registration_form');
					
				}else{
					
					$filename=array();
					if(count($_FILES['cu_image']['name'])>0 && $_FILES['cu_image']['name'][0] != ''){
						// printme($_FILES);exit;
	                			
				               $files = $_FILES['cu_image'];
				               $count = count($_FILES['cu_image']['name']);
				               // echo $count;exit();
				               
				               //echo $_FILES['cu_image']['name'];exit();
				               for($i=0; $i<$count;$i++){  
				            
				                   $config = array();
				                   $projects_folder_path = './upload/customer/';
				                   $thumb = $projects_folder_path . 'thumb';

				                   $_FILES['cu_image']['name']= $files['name'][$i];
                				   $_FILES['cu_image']['type']= $files['type'][$i];
                				   $_FILES['cu_image']['tmp_name']= $files['tmp_name'][$i];
                				   $_FILES['cu_image']['error']= $files['error'][$i];
                				   $_FILES['cu_image']['size']= $files['size'][$i];
				                                      
				                   
				                   $file_ext  = ltrim(strtolower(strrchr($_FILES['cu_image']['name'],'.')),'.');  
				                   $file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;
				                
				                   $config['upload_path']         = $projects_folder_path;
				                   $config['allowed_types']       = '*';
				                   $config['encrypt_name']        = TRUE;
				                   $config['overwrite'] = TRUE;
				                   $config['file_name'] = $file_name;
				                   $this->load->library('upload', $config);
				                   $this->upload->initialize($config);

				                   if(!$this->upload->do_upload('cu_image')){
				                    
				 
				                     $error_file_arr = array('error' => $this->upload->display_errors());
				                    
				                     $this->session->set_flashdata('err_message', $error_file_arr['error']);
				                     // printme($_FILES);exit;
				                     redirect(BURL . 'lead/registration_form');
				                     
				  
				                   }else {

				                     $data_image_upload = array('upload_image_data' => $this->upload->data());
				                     $image_name =$data_image_upload['upload_image_data']['file_name'];  
				                     $full_path = $data_image_upload['upload_image_data']['full_path'];
				                     create_transparent_thumb($image_name, $full_path, $thumb,162,89);
				                     create_thumbnail($image_name, $full_path, $projects_folder_path,307,307);
				                     
				                    
				                    }  
				            $filename[] = $image_name;

				        } // end for loop
				                
				    }

					$designation=$this->input->post('designation');
					$title=$this->input->post('title');
					$name=$this->input->post('name');
					$phone=$this->input->post('phone');
					$date=$this->input->post('date');
					$address=$this->input->post('address');
					$category=$this->input->post('category');
					$created_date = date("Y-m-d G:i:s");
					
					$ins_array=array(
						'name' => $name,
						'phone' => $phone,
						'title' => $title,
						'address' => $address,
						'created_date' => $created_date,
						'designation_id' => $designation,
					);
					$result=$this->Mod_common->insert_into_table('customer',$ins_array);
					if($result){
						$customer_id=$this->db->insert_id();
						$lead_array=array(
	                		'customer_id' => $customer_id,
	                		'user_id' => $this->session->userdata('user_id'),
	                		'priority' =>$category,
	                		'created_date' => $created_date,
	                	);
	                	$lead_result=$this->Mod_common->insert_into_table('customer_leads',$lead_array);
	                	if($lead_result){
	                		$lead_id=$this->db->insert_id();
	                		$stage_array=array(
	                			'lead_id' => $lead_id,
	                			'stage_name_id' => 1,
	                			'created_date' => $created_date,
	                			'result' => 1,
	                		);

	                		$stage_result=$this->Mod_common->insert_into_table('stage',$stage_array);
	                		if($stage_result){
	                			$stage_id=$this->db->insert_id();
	                			$lead_update=array(
	                				'stage_id' => $stage_id,
	                				'updated_date' => $created_date,
	                			);
	                			$where=array('id' => $customer_id);

	                			$this->Mod_common->update_table('customer_leads',$where,$lead_update);
	                		}
	                		
	                		
				            foreach ($filename as $key => $value) {
				                $insert_image=array(
				                    'image'=> $value,
				                    'customer_id' => $customer_id,
				                    'created_date' => $created_date
				                );
				                $add_image = $this->Mod_common->insert_into_table('customer_images', $insert_image);
				                    
				            }
				            
	                		$this->session->set_flashdata('ok_message','- Record inserted successfully');
	                		redirect(BURL.'lead/');
	                	}else{
	                		$this->session->set_flashdata('ok_message','- Error in inserting');
	                		redirect(BRUL.'lead/registration_form');

	                	}
					}
				}

			}else{
				if($this->session->userdata('role')==1){
					$data['designation']=$this->Mod_common->select_array_records('designation');
					$data['sublayout']='bdm/leads/registration_form';
					$data['active']='registration_form';
					$this->load->view('bdm/bdm_layout',$data);
				}else{
					$this->session->set_flashdata('err_message','- Unauthorized page');
					redirect(URL.'Auth/');
				}

			}

		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(URL.'Auth/');
		}		
	}

	public function get_leads(){
		$list = $this->lead_model->get_leads();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $key => $value) {
			$no++;
			$row = array();
			$action='<a href="#" class="btn btn-success"><i class="fa fa-comments"></i></a>';
			
			$row[] = $value['id'];
			$row[] = $value['name'];
			$row[] = $value['phone'];
			$row[] = $value['address'];
			$row[] = $value['Name'];
			$row[] = $action;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->lead_model->lead_count(),
			"recordsFiltered" => $this->lead_model->lead_count(),
			"data" => $data,
		);
        //output to json format
		echo json_encode($output);

	}


	

}

/* End of file Lead.php */
/* Location: ./application/controllers/bdm/Lead.php */
?>