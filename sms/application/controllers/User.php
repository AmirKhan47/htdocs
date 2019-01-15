<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	public function index()
	{
		$this->load->library('session');
		if($this->session->userdata('logged_in')){
			redirect('admin/home');
		}else{
			$this->login_page();
		}
	}

	public function login_page()
	{
		$data = array(
			'title' => 'Login', 
		);
		$this->load->view('layout/header', $data);
		$this->load->view('login_view');
		$this->load->view('layout/footer');
	}

	public function check_user()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$this->load->model('user_model', 'user');
		$result['status'] = $this->user->check_user($username,$password);
		if($result){
			/*set session and save name and uid*/
			$this->load->library('session');
			$userData = array(
					'logged_in' => true 
			);
			$this->session->set_userdata($userData);
		}
		echo json_encode($result);
	}

	public function user_logout()
	{
		/*destroy user session for logout*/
		$this->load->library('session');
		$this->session->unset_userdata('logged_in');
		redirect();
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */


/*
	
*/