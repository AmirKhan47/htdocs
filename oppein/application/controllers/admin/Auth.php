<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array(
			'admin/Auth_model',
		));
		
	}

	public function index(){
		
		$this->load->view('admin/login');
	}

    public function login_process(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('err_message', '-Something Error in login');
				redirect(AURL . 'auth/');

			}else{
				$username=$this->input->post('username');
				$password=$this->input->post('password');
				$response=$this->Auth_model->login($username,$password);
				if($response['status']==200){
					$login_data= array(
                     'username' => $response['username'],
                     'token' => $response['token'],
                     'user_id' => $response['id'], 
                     // 'role' => $response['role']
                  );
                  $this->session->set_userdata($login_data);
				  redirect(AURL.'dashboard/');	
				}else{
					$this->session->set_flashdata('err_message', $response['message']);
			        redirect(AURL.'auth/');
				}

			}

		}
	}

	public function logout(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$response=$this->Auth_model->logout();
			if($response['status']==200){
				$this->session->set_flashdata('ok_message', $response['message']);
				redirect(AURL.'auth/');
			}
		}else{
			$this->session->set_flashdata('err_message', $check['message']);
			redirect(AURL.'auth/');
		}
	}

	public function test(){
		$value=123123;
		echo md5($value);
		echo "<br>";
		echo crypt($value,md5($value));

		echo $this->session->userdata('user_id');
		echo "<br>";
		echo $this->session->userdata('token');
		echo "<br>";
		echo $this->session->userdata('username');
		echo "<br>";
		echo $this->session->userdata('role');
	}

	public function change_password(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('old_password', 'Old Password', 'required');
			    $this->form_validation->set_rules('new_password', 'New Password', 'required');
			    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
			    if ($this->form_validation->run() == FALSE){
					if($this->input->post('new_password')!=$this->input->post('confirm_password')){
						$this->session->set_flashdata('err_message', '- Password doesn\'t match');
					}else{
						$this->session->set_flashdata('err_message', '- Something Error in Change Password');
					}
					redirect(AURL . 'auth/change_password');

				}else{
					$old_password=$this->input->post('old_password');
					$new_password=$this->input->post('new_password');
					$confirm_password=$this->input->post('confirm_password');

					$where= array(
						'id' => $this->session->userdata('user_id'),
						'password' => crypt($old_password,md5($old_password))
					);
					$q=$this->Mod_common->select_single_records('admin',$where);
					
					if($q !=''){
						$where=array('id' => $this->session->userdata('user_id'),);
						$update_password=array('password' =>  crypt($new_password,md5($new_password)),);
						$result=$this->Mod_common->update_table('admin',$where,$update_password);
						if($result){
							$this->session->set_flashdata('ok_message', '- Password updated successfully');
						    redirect(AURL . 'auth/change_password');
						}else{
							$this->session->set_flashdata('err_message', '- Error in updating password');
						    redirect(AURL . 'auth/change_password');
						}
						
					}else{
						$this->session->set_flashdata('err_message', '- Old Password is incorrect');
						redirect(AURL . 'auth/change_password');
					}

				}
			}else{
				$data['sublayout']='admin/change/change_password';
				$data['active']='';
				$this->load->view('admin/admin_layout',$data);
			}

		}else{
			$this->session->set_flashdata('err_message', $check['message']);
			redirect(AURL.'auth/');

		}

	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
?>