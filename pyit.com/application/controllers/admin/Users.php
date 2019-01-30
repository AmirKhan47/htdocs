<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Users';
		$data['sublayout'] = 'admin/users';
		$data['active'] = 'users';
		$data['users'] = $this->all_users();
		$this->load->view('admin/base_layout', $data);
	}

	public function add_new_user(){
		if ($this->input->post('submit')) {

			$this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $this->form_validation->set_rules(
				'user_username', 
				'Username', 
				'trim|min_length[3]|max_length[12]|is_unique[pyit_users.user_username]',
				array(
					'is_unique' => 'This %s already exists'
				)
			);

			$this->form_validation->set_rules(
				'user_email', 
				'User Email', 
				'valid_email|is_unique[pyit_users.user_email]',
				array(
					'is_unique' => 'This %s already exists'
				)
			);

			if($this->form_validation->run() == FALSE) {
				$usernameError = form_error('user_username');
				$emailError = form_error('user_email');
				$validation_errors = array(
					'username_error' => $usernameError,
					'email_error'	=> $emailError
				);
				$this->session->set_flashdata('validation_errors', $validation_errors);
				redirect(AURL.'Users');
			}else{
				$table_name = 'pyit_users';
				$data = array(
					'user_username' 	=> $this->input->post('user_username'), 
					'user_password'		=> $this->input->post('user_password'),
					'user_email'		=> $this->input->post('user_email'),
					'user_role'			=> $this->input->post('user_role'),
					'user_status'		=> 1,
					'user_created_by' 	=> $this->session->userdata('session_data')['session_user_name']
				);
				$this->load->model('Users_Mod');
				$is_added = $this->Users_Mod->add_user($table_name, $data);
				if($is_added){
					$this->session->set_flashdata('user_success', 'New User Added Successfully!');
					redirect(AURL.'Users');
				}else{
					$this->session->set_flashdata('user_error', 'Error Adding New User!');
					redirect(AURL.'Users');
				}
			}
		}
	}

	public function all_users(){
		$table_name = 'pyit_users';
		// $where = array('file_status' => 1);
		$this->load->model('Users_Mod');
		$users = $this->Users_Mod->get_all_users($table_name);
		return $users;
	}

	public function activate_user($user_id){
		$table_name = 'pyit_users';
		$where = array('user_id' => $user_id);
		$update_data = array('user_status' => 1);
		$this->load->model('Users_Mod');
		$is_updated = $this->Users_Mod->change_user_status($table_name, $where, $update_data);
		if($is_updated){
			$this->session->set_flashdata('activate_success', 'User has been activated successfully!');
			redirect(AURL.'Users');
		}else{
			$this->session->set_flashdata('activate_error', 'Error activating user!');
			redirect(AURL.'Users');
		}
	}

	public function deactivate_user($user_id){
		$table_name = 'pyit_users';
		$where = array('user_id' => $user_id);
		$update_data = array('user_status' => 0);
		$this->load->model('Users_Mod');
		$is_updated = $this->Users_Mod->change_user_status($table_name, $where, $update_data);
		if($is_updated){
			$this->session->set_flashdata('deactivate_success', 'User has been deactivated successfully!');
			redirect(AURL.'Users');
		}else{
			$this->session->set_flashdata('deactivate_error', 'Error deactivating user!');
			redirect(AURL.'Users');
		}
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/admin/Users.php */