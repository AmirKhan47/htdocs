<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class login extends CI_Controller
	{
		function __construct()
		{
			parent :: __construct();
			$this->load->model('login_model');
			$this->load->model('Mod_common');
		}

		public function index()
		{
			$this->load->view('prelogin');
		}
		public function student()
		{
			$this->load->view('login');
		}

		public function studentlogin()
		{
			$this->form_validation->set_rules('username','Username','trim|required');
			$this->form_validation->set_rules('password','Password','trim|required');
			// $this->form_validation->set_rules('g-recaptcha-response','Captcha','required');
			// $g_recaptcha_response=$this->input->post('g-recaptcha-response');
			
			if ($this->form_validation->run() == FALSE)
			{
				echo validation_errors();
			}
			else
			{
				// if(!helper_isCaptchaCorrect($g_recaptcha_response))
				// {
				// 	echo "wrong captcha";
				// }
				// else
				// {
					$password=$this->input->post('password');
					$login = array(
						'username' =>  $this->input->post('username'),
						'password' => crypt($password,md5($password)),
					);
					if($this->login_model->is_username_exist($login['username']))
					{
						$isvalid_user=$this->login_model->is_login_correct($login);
						if($isvalid_user)
						{
							$login_session_array = array(
								'loggin_in' => TRUE,
								'role'		=> $isvalid_user['role'],
								'id' 		=> $isvalid_user['id'],
								'username' 	=> $isvalid_user['username'],
								'password' 	=> $isvalid_user['password'],
								'name' 		=> $isvalid_user['name'],
								'branch_id' => $isvalid_user['branch_id'],
							);
							$this->session->set_userdata($login_session_array);
							if($this->session->has_userdata('id'))
							{
								$role=$isvalid_user['role'];
								if ($role==1) 
								{
									echo "Success Admin";
								}
								else
								if ($role==2) 
								{
									echo "Success User";
								}
							}
						}
						else
						{
							echo "Wrong Password";
						}
					}
					else
					{
						echo "Username Not Registered";
					}
				// }
			}
		}
		public function change_password()
		{
			if($this->input->post('submit'))
			{
				$this->form_validation->set_rules('old_password', 'Old Password', 'required');
			    $this->form_validation->set_rules('new_password', 'New Password', 'required');
			    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
			    //$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
			    if ($this->form_validation->run() == FALSE)
			    {
					if($this->input->post('new_password')!=$this->input->post('confirm_password'))
					{
						$this->session->set_flashdata('err_message', '- Password doesn\'t match');
					}
					else
					{
						$this->session->set_flashdata('err_message', '- Something Error in Change Password');
					}
					redirect(SURL . 'login/change_password');
				}
				else
				{
					$old_password=$this->input->post('old_password');
					$new_password=$this->input->post('new_password');
					$confirm_password=$this->input->post('confirm_password');
					$where= array(
						'id' => $this->session->userdata('id'),
						'password' => crypt($old_password,md5($old_password))
					);
					$result=$this->Mod_common->select_single_records('users',$where);
					if($result!='')
					{
						$where=array('id' => $this->session->userdata('id'),);
						$update_password=array('password' =>  crypt($new_password,md5($new_password)),);
						$result=$this->Mod_common->update_table('users',$where,$update_password);
						if($result)
						{
							$this->session->set_flashdata('ok_message', '- Password updated successfully');
						    redirect(SURL . 'login/change_password');
						}
						else
						{
							$this->session->set_flashdata('err_message', '- Error in updating password');
						    redirect(SURL . 'login/change_password');
						}	
					}
					else
					{
						$this->session->set_flashdata('err_message', '- Old Password is incorrect');
						redirect(SURL . 'login/change_password');
					}
				}
			}
			else
			{
				$data['active']='';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/change_password',$data);
				$this->load->view('admin/footer',$data);
			}
		}
		public function logout()
		{
			$login_session_array = array(
				'loggin_in' => FALSE,
				'role'		=> '',
				'id' 		=> '',
				'username' 	=> '',
				'password' 	=> ''
			);
			$this->session->unset_userdata($login_session_array);
			$this->session->sess_destroy();
			redirect(SURL.'login/student');
		}
	}
?>