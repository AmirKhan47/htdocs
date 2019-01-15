<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->home();
	}

	public function home()
	{
		$this->check_session();
		$data = array(
			'title' => 'Admin', 
		);
		$this->load->view('layout/header', $data);	
		$this->load->view('admin/home');		
		$this->load->view('layout/footer');		
	}

	public function check_session()
	{
		$this->load->library('session');
		if(!$this->session->has_userdata('logged_in')){
			redirect('User/user_logout');
		}
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */