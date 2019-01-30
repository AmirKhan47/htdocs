<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_Settings extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Profile Settings';
		$data['active'] = 'profile';
		$data['sublayout'] = 'admin/user_profile_settings';
		$data['user_details'] = $this->user_details();
 		$this->load->view('admin/base_layout', $data);
	}

	public function user_details(){
		$table_name = 'pyit_users';
		$where = array('user_username' => $this->session->userdata('session_data')['session_user_name']);
		$this->load->model('Users_Mod');
		$user_details = $this->Users_Mod->get_user_details($table_name, $where);
		return $user_details;
	}

	public function update_user_profile(){
		if($this->input->post('submit')){
			$table_name = 'pyit_users';
			$where = array('user_username' => $this->session->userdata('session_data')['session_user_name']);
			$data = array(
				'user_full_name' => $this->input->post('user_upd_fullname'),
				'user_email'	 => $this->input->post('user_upd_email') 
			);
			$this->load->model('Users_Mod');
			$is_updated = $this->Users_Mod->update_profile($table_name, $where, $data);

			if($is_updated){
				$this->session->set_flashdata('update_success', 'Your Profile is successfully updated!');
				redirect(AURL.'Profile_Settings');
			}else{
				$this->session->set_flashdata('update_error', 'Error Uploading Your Profile!');
				redirect(AURL.'Profile_Settings');
			}
		}
	}

	public function change_user_password(){
		if ($this->input->post('submit')) {
			$table_name = 'pyit_users';
			$old_password = $this->input->post('user_old_password');

			$where = array(
				'user_username' => $this->session->userdata('session_data')['session_user_name'], 
				'user_password' => $old_password
			);
			$this->load->model('Users_Mod');
			$is_checked = $this->Users_Mod->check_old_password($table_name, $where);
			// echo $is_checked;exit();
			// echo $this->input->post('user_new_password');
			// echo $this->input->post('user_new_password_conf');exit;
			if ($is_checked) {

				$this->load->helper(array('form', 'url'));
	            $this->load->library('form_validation');

	            $this->form_validation->set_rules(
					'user_new_password', 
					'New Password', 
					'required'
				);
				
	            $this->form_validation->set_rules(
					'user_new_password_conf', 
					'Confirm New Password', 
					'matches[user_new_password]',
					array(
						'matches' => 'The passwords do not match!'
					)
				);

				if($this->form_validation->run() == FALSE) {
					$password_match_error = form_error('user_new_password_conf');
					$this->session->set_flashdata('password_match_error', $password_match_error);
					redirect(AURL.'Profile_Settings');
				}else{
					$where = array(
						'user_username' => $this->session->userdata('session_data')['session_user_name']
					);
					$data = array(
						'user_password' => $this->input->post('user_new_password_conf') 
					);
					$is_updated = $this->Users_Mod->update_password($table_name, $where, $data);
					if ($is_updated) {
						$this->session->set_flashdata('pass_update_success', 'Your Password is successfully updated!');
						redirect(AURL.'Profile_Settings');
					}else{
						$this->session->set_flashdata('pass_update_error', 'Error Updating Your Password!');
						redirect(AURL.'Profile_Settings');
					}
				}

			}
			else{
				$this->session->set_flashdata('old_pass_error', 'Your Old Password is Incorrect!');
				redirect(AURL.'Profile_Settings');
			}
		}
	}

}

/* End of file Profile_Settings.php */
/* Location: ./application/controllers/admin/Profile_Settings.php */