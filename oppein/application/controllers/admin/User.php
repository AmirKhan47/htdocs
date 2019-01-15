<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Auth_model');
		$this->load->model('admin/User_model');
		//Do your magic here
	}
	public function registration(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('username', 'User name', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('err_message', '- Something Error in Registration');
					redirect(AURL.'User/registration');
				}else{
					$name=$this->input->post('name');
					$email=$this->input->post('email');
					$password=$this->input->post('password');
					$username=$this->input->post('username');
					$role=$this->input->post('role');

					$insert= array(
						'Name' => $name, 
						'email' => $email,
						'username' => $username,
						'password' => crypt($password,md5($password)),
						'role' => $role,
						'status' => 1,
						'created_date' => date('Y-m-d H:i:s'),
					);

					$result=$this->Mod_common->insert_into_table('users',$insert);
					if($result){
						if($role==2){
							$user_id=$this->db->insert_id();
							$insert_target=array(
								'user_id'=>$user_id,
							);

							$this->Mod_common->insert_into_table('target',$insert_target);
						}
						$this->session->set_flashdata('ok_message', '- Record insert successfully');
					    redirect(AURL.'user/registration');

					}else{
						$this->session->set_flashdata('err_message', '- Error in inserting');
						redirect(AURL.'user/registration');
					}

				}

			}else{
				$data['roles']=$this->Mod_common->select_array_records('roles');
				$data['sublayout']='admin/users/registration';
				$data['active']='registration';
				$this->load->view('admin/admin_layout',$data);
			}

		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(AURL.'auth/');
		}

	}

	public function usernamechecker(){
		$username=$this->input->post('username');
		$where= array('username' => $username,);
		$result=$this->Mod_common->select_single_records('users',$where);
		if(count($result)>0){
			echo 1;
		}else{
			echo 0;
		}
	}

	public function emailchecker(){
		$email=$this->input->post('email');
		$where= array('email' => $email,);
		$result=$this->Mod_common->select_single_records('users',$where);
		if(count($result)>0){
			echo 1;
		}else{
			echo 0;
		}
	}

	public function bdm(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$data['sublayout']='admin/users/bdm_list';
			$data['active']='bdm';
			$this->load->view('admin/admin_layout',$data);
		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(AURL.'auth/');
		}
	}

	public function ro(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$data['sublayout']='admin/users/ro_list';
			$data['active']='ro';
			$this->load->view('admin/admin_layout',$data);
		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(AURL.'auth/');
		}
	}

	public function get_bdm(){
		$list = $this->User_model->get_bdm();
		$data = array();
		$no = $_POST['start'];
		$role=1;
		foreach ($list as $key => $value) {
			$no++;
			$row = array();

			$action='<a href="'.AURL.'User/edit/'.$value['id'].'/'.$role.'" class="btn btn-success"><i class="fa fa-pencil"></i></a><a href="'.AURL.'User/delete/'.$value['id'].'/'.$role.'" class="btn btn-danger" onclick="return confirm(\'Are You sure you want to delete the User?\');"><i class="fa fa-trash"></i></a>';
			$row[] = $value['id'];
			$row[] = $value['Name'];
			$row[] = $value['email'];
			$row[] = $value['username'];
			$row[] = $value['created_date'];
			$row[] = $action;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->User_model->bdm_count(),
			"recordsFiltered" => $this->User_model->bdm_count(),
			"data" => $data,
		);
        //output to json format
		echo json_encode($output);

	}

	public function get_ro(){
		$list = $this->User_model->get_ro();
		$data = array();
		$no = $_POST['start'];
		$role=2;
		foreach ($list as $key => $value) {
			$no++;
			$row = array();

			$action='<a href="'.AURL.'User/edit/'.$value['id'].'/'.$role.'" class="btn btn-success"><i class="fa fa-pencil"></i></a><a href="'.AURL.'User/delete/'.$value['id'].'/'.$role.'" class="btn btn-danger" onclick="return confirm(\'Are You sure you want to delete the User?\');"><i class="fa fa-trash"></i></a>';
			$row[] = $value['id'];
			$row[] = $value['Name'];
			$row[] = $value['email'];
			$row[] = $value['username'];
			$row[] = $value['created_date'];
			$row[] = $action;
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->User_model->ro_count(),
			"recordsFiltered" => $this->User_model->ro_count(),
			"data" => $data,
		);
        //output to json format
		echo json_encode($output);

	}

	public function delete($id,$role){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$table = "users";
	        $where =array('id'=>$id);
	        $delete_attribute = $this->Mod_common->delete_record($table, $where);

	        if ($delete_attribute) {
	        	$this->session->set_flashdata('ok_message', '- Record deleted successfully!');
	        	if($role==1){
		            redirect(AURL . 'user/bdm');
		        }elseif ($role==2) {
		        	redirect(AURL . 'user/ro');
		        }
	        } else {
	            $this->session->set_flashdata('err_message', '- Error in deleteting  please try again!');
	            if($role==1){
		            redirect(AURL . 'user/bdm');
		        }elseif ($role==2) {
		        	redirect(AURL . 'user/ro');
		        }
	        }
	    }else{
	    	$this->session->set_flashdata('err_message',$check['message']);
			redirect(AURL.'Auth/');
	    }
	}

	public function edit($id,$role){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$table = "users";
	        $where =array('id'=>$id);
	        $data['user'] = $this->Mod_common->select_single_records($table, $where);
	        $data['role']=$role;
	        if(count($data['user'])==0){
	        	$this->session->set_flashdata('err_message', '- Error in updating  please try again!');
	        	if($role==1){
		            redirect(AURL . 'user/bdm');
		        }elseif ($role==2) {
		        	redirect(AURL . 'user/ro');
		        }
	        }else{
	        	$data['roles']=$this->Mod_common->select_array_records('roles');
	        	$data['sublayout']='admin/users/edit';
			    $data['active']='ro';
			    $this->load->view('admin/admin_layout',$data);

	        }


		}else{
	    	$this->session->set_flashdata('err_message',$check['message']);
			redirect(AURL.'auth/');
	    }

	}

	public function update($id,$role){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$name=$this->input->post('name');
			// $role=$this->input->post('role');
			$where =array('id'=>$id);
			$update_array=array(
				'Name' =>  $name,
				// 'role' => $role,  
			);
			

			$update=$this->Mod_common->update_table('users',$where,$update_array);
			if($update){
				$this->session->set_flashdata('ok_message', '- Record updated successfully!');
	        	if($role==1){
		            redirect(AURL . 'user/bdm');
		        }elseif ($role==2) {
		        	redirect(AURL . 'user/ro');
		        }

			}else{
				$this->session->set_flashdata('err_message', '- Error in updating  please try again!');
	        	if($role==1){
		            redirect(AURL . 'user/bdm');
		        }elseif ($role==2) {
		        	redirect(AURL . 'user/ro');
		        }

			}


		}else{
	    	$this->session->set_flashdata('err_message',$check['message']);
			redirect(AURL.'auth/');
	    }

	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/bdm/Dashboard.php */

?>