<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('backend/login');
	}
	public function login()
	{
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$user_data=$this->common->select_single_records('users',array('username'=>$this->input->post('username'),'password'=>$this->input->post('password')));
			$user_roles=$this->common->select_single_records('users_roles',array('user_id'=>$user_data['user_id']));
			if($user_data)
			{
				$session_data=array(
					'user_id'=>$user_data['user_id'],
					'fullname'=>$user_data['fullname'],
					'email'=>$user_data['email'],
					'role_id'=>$user_roles['role_id']
				);
				$this->session->set_userdata($session_data);
				if($user_roles['role_id']==1)
				{
					redirect(AURL.'dashboard');
				}
				else
				if($user_roles['role_id']==2)
				{
					redirect(AURL.'user/dashboard');
				}
			}
			else
			{
				$this->session->set_flashdata('error_message', 'Incorrect Username or Password ! Please try again.');
				redirect(URL.'backend/login');
			}
		}
	}
	public function update_profile()
	{
		if($this->input->post('submit'))
		{
			$data=array(
				'fullname'=>$this->input->post('fullname'),
				'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password'),
				'email'=>$this->input->post('email'),
				'phone_no'=>$this->input->post('phone_no'),
				'cnic'=>$this->input->post('cnic'),
				'address'=>$this->input->post('address'),
				'gender'=>$this->input->post('gender'),
				'date_of_birth'=>$this->input->post('date_of_birth')
			);
			$result=$this->common->update_table('users',array('user_id'=>$this->session->userdata('user_id')),$data);
			if($result)
			{
				$this->session->set_flashdata('ok_message', 'Profile Updated!');
			}
			else
			{
				$this->session->set_flashdata('error_message', 'Profile Not Updated!');
			}
			redirect('backend/login/update_profile');
		}
		else
		{
			$data['user']=$this->common->select_single_records('users',array('user_id'=>$this->session->userdata('user_id')));
			$data['active']='';
			$data['page']='profile/update';
	        $this->load->view('backend/admin/layout/default',$data);
		}
	}
	public function change_password()
	{
		$data['active']='';
		$data['page']='profile/change_password';
        $this->load->view('backend/admin/layout/default',$data);
	}
	public function logout()
	{
		$session_data=array(
				'user_id'=>'',
				'fullname'=>'',
				'email'=>''
			);
		$this->session->unset_userdata($session_data);
		$this->session->sess_destroy();
		redirect(URL.'backend/login');
	}
	public function update_user_picture()
    {
    	// if($this->input->post('old_profile_picture')!='')
    	// {
	    // 	$projects_folder_path='./assets/uploads/hostel_pictures/';
	    //     $path=$projects_folder_path.$this->input->post('old_profile_picture');
	    //     unlink($path);
	    // }
        // Profile Picture
        // ------------------------------------------------------------------------
        $config['upload_path']          = './assets/uploads/profile_pictures';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 512;
        // $config['max_width']            = 300;
        // $config['max_height']           = 300;
        $this->upload->initialize($config);
        if(!$this->upload->do_upload('profile_picture'))
        {
            $error_file_arr = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error_message', $error_file_arr['error']);
            redirect('backend/login/update_profile');
                // The uploaded file exceeds the maximum allowed size in your PHP configuration file.
                // $this->session->set_flashdata('err_message', $error['error']);
                // redirect('admin/submission_details_edit/'.$challan_id.'/'.$student_id);
        }
        else
        {
            $data=array('upload_data'=>$this->upload->data());
            $profile_picture=$data['upload_data']['file_name'];
            $result=$this->common->update_table('users',array('user_id'=>$this->session->userdata('user_id')),array('profile_picture'=>$profile_picture));
            if($result)
            {
                $this->session->set_flashdata('ok_message', 'Picture Updated!');
            }
            else
            {
                $this->session->set_flashdata('error_message', 'Picture Not Updated!');
            }
        }
        redirect('backend/login/update_profile');
    }
}