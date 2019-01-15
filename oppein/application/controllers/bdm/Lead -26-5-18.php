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
				redirect(URL.'Auth/');
			}
		}else{
			redirect(URL.'Auth/');
		}
		
	}

	public function registration_form(){
		
		if($this->input->post('submit')){
			//$this->form_validation->set_rules('designation', 'Designation', 'required');
			//$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('name', 'Customer Name', 'required');
			$this->form_validation->set_rules('phone', 'Contact no', 'required');
			$this->form_validation->set_rules('date', 'Date', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			//$this->form_validation->set_rules('category', 'Category', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('err_message', '-Something Error in Registration ');
				redirect(BURL . 'lead/registration_form');
				
			}else{
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
				//printme($_FILES);exit;

				$result=$this->Mod_common->insert_into_table('customer',$ins_array);
				if($result){
					$id=$this->db->insert_id();
					if(count($_FILES['cu_image']['name']) > 0){
		               $files = $_FILES['cu_image'];
		               $count = count($_FILES['cu_image']['name']);
		               
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
		            foreach ($filename as $key => $value) {
	                    $insert_image=array(
	                        'image'=> $value,
	                        'customer_id' => $id,
	                        'created_date' => $created_date
	                     );
	                    $add_image = $this->Mod_common->insert_into_table('customer_images', $insert_image);
	                    
	                }

	                if ($add_image) {
	                	$ins_array=array(
	                		'customer_id' => $id,
	                		'user_id' => 1,
	                		'priority' =>$category,
	                	);
	                	$result=$this->Mod_common->insert_into_table('customer_leads',$ins_array);
	                	if($result){
	                		echo "record is added successfully";
	                	}
	                }

				}


			}



		}else{
			$data['designation']=$this->Mod_common->select_array_records('designation');
			$data['sublayout']='bdm/leads/registration_form';
			$data['active']='registration_form';
			$this->load->view('bdm/bdm_layout',$data);
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
			$row[] = $value['created_date'];
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