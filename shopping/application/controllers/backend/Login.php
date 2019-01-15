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
		$result=$this->common->select_single_records('users',$where=array('username'=>$this->input->post('username'),'password'=>$this->input->post('password')));
		// echo $this->db->last_query();
		// echo "<pre>";
		// print_r ($result);
		// echo "</pre>";
		// exit();
		// $this->load->view('backend/admin/layout/default');
		if($result)
		{
			redirect(AURL.'dashboard','refresh');
		}
		else
		{
			redirect(URL.'backend/login','refresh');
		}
	}
	public function profile()
	{
		// $this->load->view('backend/admin/layout/default');
	}
	public function change_password()
	{
		// $this->load->view('backend/admin/layout/default');
	}
	public function logout()
	{
		// $this->load->view('backend/admin/layout/default');
	}
}