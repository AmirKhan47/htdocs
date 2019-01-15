<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class User extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('User_model', 'user', true);
			$this->load->model('Common_model', 'common', true);
		}
		public function dashboard()
		{
			$data['active']='dashboard';
			$this->load->view('admin/header',$data);
			$this->load->view('admin/users/dashboard');
			$this->load->view('admin/footer');
		}
		public function index()
		{
			$data['active']='manage_user';
			$this->load->view('admin/header',$data);
			$data['result']=$this->user->user_count();
			$this->load->view('admin/users/manage_user');
			$this->load->view('admin/footer');
		}
		public function get_data()
		{
			$list = $this->user->get_data();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $key => $value)
			{
				$no++;
				$row = array();
				$row[] = $value['name'];
				$row[] = $value['email'];
				$row[] = $value['username'];
				$row[] = $value['password'];
				$row[] = $value['branch_name'];
				$row[] = $value['created_at'];
				$row[] = '<a href="'.SURL.'user/edit/'.$value['id'].'/'.$value['role'].'" class="btn btn-success"><i class="fa fa-pencil"></i></a><a href="'.SURL.'user/delete/'.$value['id'].'/'.$value['role'].'" class="btn btn-danger" onclick="return confirm(\'Are You sure you want to delete the User?\');"><i class="fa fa-trash"></i></a>';
				$data[] = $row;
			}
			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->user->user_count(),
				"recordsFiltered" => $this->user->user_count(),
				"data" => $data
			);
			echo json_encode($output);
		}
		public function add()
		{
			if($this->input->post('submit'))
			{
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('username', 'User name', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				if ($this->form_validation->run() == FALSE)
				{
					$this->session->set_flashdata('err_message', '- Something Error in Registration');
					redirect(SURL.'user/add');
				}
				else
				{
					$name=$this->input->post('name');
					$email=$this->input->post('email');
					$password=$this->input->post('password');
					$username=$this->input->post('username');
					$role=$this->input->post('role');
					$branch_id=$this->input->post('branch_id');
					$insert= array(
						'Name' => $name, 
						'email' => $email,
						'username' => $username,
						'password' => crypt($password,md5($password)),
						'role' => $role,
						'branch_id' => $branch_id,
						'status' => 1
					);
					$result=$this->common->insert_into_table('users',$insert);
					if($result)
					{
						$url=base_url();
						$header="From: no-reply@gsis.edu.pk\r\n";
						$header.= "MIME-Version: 1.0\r\n";
						$header.= "Content-type:text/html;charset=UTF-8"."\r\n";
						$message='<div style="max-width:600px;margin:0 auto;background-color:#e7e7e7;">
									<h2 style="background-color:#3498db;color:white;padding:20px 10px;text-align:center;margin-bottom:0px;">
										GSIS Registration
									</h2>
									<p style="margin-top:0px;background-color:#ecf0f1;padding:30px 10px;">
										<b style="float: left;">
											Dear '.$name.',
										</b>
										<br>
										Your username and password for GSIS are below:- <br>
										<b>
											Username: '.$username.' <br>
											Password: '.$password.' <br>
										</b>
										click on this link to login:-<br>
										'.$url.'login <br>
									</p>
							        <p style="font-size:smaller;padding:20px;">
							        For Queries<br>
					    				Phone: 051-4939263 <br>
					    				Email: info@gsis.edu.pk</p>
					    		</div>';
					    $mail_to = $email;
						$mail_sent = mail($mail_to, 'GSIS Registration', $message,$header);
						$status='not sent';
						if($mail_sent)
						{
							$status='sent';
						}
						$this->session->set_flashdata('ok_message', '- Record insert successfully');
						redirect(SURL.'user/');
					}
					else
					{
						$this->session->set_flashdata('err_message', '- Error in inserting');
						redirect(SURL.'user/add');
					}
				}	
			}
			$data['active']='manage_user';
			$this->load->view('admin/header',$data);
			$data['roles']=$this->common->select_array_records('roles');
			$data['branches']=$this->common->select_array_records('branch');
			$this->load->view('admin/users/add_user',$data);
			$this->load->view('admin/footer');
		}
		public function edit($id, $role)
		{
			$table = "users";
	        $where =array('id'=>$id);
	        $data['user'] = $this->common->select_single_records($table, $where);
	        $data['role']=$role;
	        if(count($data['user'])==0)
	        {
	        	$this->session->set_flashdata('err_message', '- Error in updating  please try again!');
		        redirect(SURL . 'user/');
	        }
	        else
	        {
	        	$data['active']='manage_user';
				$this->load->view('admin/header',$data);
	        	$data['roles']=$this->common->select_array_records('roles');
	        	$data['branches']=$this->common->select_array_records('branch');
			    $this->load->view('admin/users/edit_user',$data);
			    $this->load->view('admin/footer');
	        }
		}
		public function update($id, $role)
		{
			$name=$this->input->post('name');
			// $role=$this->input->post('role');
			$where =array('id'=>$id);
			$update_array=array(
				'name' =>  $name,
				// 'role' => $role, 
			);
			$update=$this->common->update_table('users',$where,$update_array);
			if($update)
			{
				$this->session->set_flashdata('ok_message', '- Record updated successfully!');
		        redirect(SURL . 'user/');

			}
			else
			{
				$this->session->set_flashdata('err_message', '- Error in updating  please try again!');
		        redirect(SURL . 'user/');

			}
		}
		public function delete($id, $role)
		{
			$table = "users";
	        $where =array('id'=>$id);
	        $delete_attribute = $this->common->delete_record($table, $where);
	        if ($delete_attribute)
	        {
	        	$this->session->set_flashdata('ok_message', '- Record deleted successfully!');
		        redirect(SURL . 'user/');
	        }
	        else
	        {
	            $this->session->set_flashdata('err_message', '- Error in deleteting  please try again!');
		        redirect(SURL . 'user/');
	        }
		}
		public function usernamechecker()
		{
			$username=$this->input->post('username');
			$where= array('username' => $username,);
			$result=$this->common->select_single_records('users',$where);
			if(count($result)>0)
			{
				echo 1;
			}
			else
			{
				echo 0;
			}
		}
		public function emailchecker()
		{
			$email=$this->input->post('email');
			$where= array('email' => $email,);
			$result=$this->common->select_single_records('users',$where);
			if(count($result)>0)
			{
				echo 1;
			}
			else
			{
				echo 0;
			}
		}
	}
?>