<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array(
			'Auth_model',
		));
		
	}

	public function index(){
		
		$this->load->view('login');
	}

    public function login_process(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('ok_message', '-Something Error in login');
				redirect(URL . 'Auth/');

			}else{
				$username=$this->input->post('username');
				$password=$this->input->post('password');
				$response=$this->Auth_model->login($username,$password);
				if($response['status']==200){
					if($this->input->post('remember')=='1'){
	                    $hour = time() + 3600 * 24 * 30;
	                    $user=array(
	                    	'name' => 'username',
	                    	'value' => $username,
	                    	'expire' => $hour,
	                    	'secure' => True,
	                    );
	                    $pass=array(
	                    	'name' => 'password',
	                    	'value' => $password,
	                    	'expire' => $hour,
	                    	'secure' => True,
	                    );
	                    $remember=array(
	                    	'name' => 'remember_me',
	                    	'value' => 1,
	                    	'expire' => $hour,
	                    	'secure' => True,
	                    );
	                    $this->input->set_cookie($user);
	                    $this->input->set_cookie($pass);
	                    $this->input->set_cookie($remember);
	                }
	                if($response['role']==2){
	                	date_default_timezone_set("Asia/Karachi");
	                	$log_array=array(
		                	'user_id' => $response['id'],
		                	'login_time' => date("h:i:sa"),
		                	'login_date' => date("Y-m-d"),
		                );
		                $log_insert=$this->Mod_common->insert_into_table('users_log',$log_array);
		                if($log_insert){
		                	$log_id=$this->db->insert_id();
		                }
						$login_data= array(
		                    'username' => $response['username'],
		                    'token' => $response['token'],
		                    'user_id' => $response['id'], 
		                    'role' => $response['role'],
		                    'log_id' => $log_id,
		                );
	                }elseif ($response['role']==1) {
	                	$login_data= array(
		                    'username' => $response['username'],
		                    'token' => $response['token'],
		                    'user_id' => $response['id'], 
		                    'role' => $response['role'],
		                );
	                }
	                
                  $this->session->set_userdata($login_data);
					if($this->session->userdata('role')==1){
						redirect(BURL.'dashboard/');
					}elseif ($this->session->userdata('role')==2) {
						redirect(RURL.'dashboard/');
					}
				}else{
					$this->session->set_flashdata('err_message', $response['message']);
			        redirect(URL.'auth/');
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
				redirect(URL.'auth/');
			}
		}else{
			$this->session->set_flashdata('err_message', $check['message']);
			redirect(URL.'auth/');
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
			    //$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
			    if ($this->form_validation->run() == FALSE){
					if($this->input->post('new_password')!=$this->input->post('confirm_password')){
						$this->session->set_flashdata('err_message', '- Password doesn\'t match');
					}else{
						$this->session->set_flashdata('err_message', '- Something Error in Change Password');
					}
					redirect(URL . 'auth/change_password');

				}else{
					$old_password=$this->input->post('old_password');
					$new_password=$this->input->post('new_password');
					$confirm_password=$this->input->post('confirm_password');

					$where= array(
						'id' => $this->session->userdata('user_id'),
						'password' => crypt($old_password,md5($old_password))
					);
					$q=$this->Mod_common->select_single_records('users',$where);
					
					if($q !=''){
						$where=array('id' => $this->session->userdata('user_id'),);
						$update_password=array('password' =>  crypt($new_password,md5($new_password)),);
						$result=$this->Mod_common->update_table('users',$where,$update_password);
						if($result){
							$this->session->set_flashdata('ok_message', '- Password updated successfully');
						    redirect(URL . 'auth/change_password');
						}else{
							$this->session->set_flashdata('err_message', '- Error in updating password');
						    redirect(URL . 'auth/change_password');
						}
						
					}else{
						$this->session->set_flashdata('err_message', '- Old Password is incorrect');
						redirect(URL . 'auth/change_password');
					}

				}



			}else{
				if($this->session->userdata('role')==1){
					$data['sublayout']='bdm/change/change_password';
					$data['active']='';
					$this->load->view('bdm/bdm_layout',$data);
				}elseif ($this->session->userdata('role')==2) {
					$data['sublayout']='ro/change/change_password';
					$data['active']='';
					$this->load->view('ro/ro_layout',$data);
				}
			}

		}else{
			$this->session->set_flashdata('err_message', $check['message']);
			redirect(URL.'auth/');

		}

	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
?>