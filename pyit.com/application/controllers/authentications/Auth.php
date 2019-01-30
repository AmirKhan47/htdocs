<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('authentication/login.php');
	}

	public function validate_login(){
		if($this->input->post('submit')){
			$table_name = 'pyit_users';
			$where = array(
				'user_username' => $this->input->post('input_username'), 
				'user_password' => $this->input->post('input_password')
			);
			$this->load->model('Login_Mod');
			$user_status = $this->validate_user_status($table_name, $this->input->post('input_username'), $this->input->post('input_username'));

			if ($user_status) {
				$is_validated = $this->Login_Mod->validate_user_login($table_name, $where);
				if($is_validated){
					$session_data = array(
						'session_user_name' => $this->input->post('input_username')
					);
					
					$this->session->set_userdata('session_data', $session_data);
					redirect(URL.'admin');
				}else{
					$this->session->set_flashdata('login_error', 'Incorrect Username or Password!');
					redirect(URL.'authentication/login');
				}

			}
			else{
				$this->session->set_flashdata('user_status_error', 'User is not authorized to sign in!');
				redirect(URL.'authentication/login');
			}
		}
	}

	public function logout_user(){
		$this->session->unset_userdata('session_data');
		redirect(URL);
	}

	public function validate_user_status($table_name, $username, $password){
		$where = array('user_username' => $username);
		$or_where = array('user_password' => $password);
		$user_status = $this->Login_Mod->check_user_status($table_name, $where, $or_where);
		return $user_status;
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/admin/authentications/Auth.php */