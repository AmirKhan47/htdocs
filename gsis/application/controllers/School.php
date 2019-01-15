<?php
	class School extends CI_Controller
	{
		function __construct()
		{
			parent:: __construct();
			
		}

	  	public function index()
	  	{
	  		$data['active']='';
	  		$this->load->view('header');
	  		$this->load->view('registration/registration_form');
	  		 // $this->load->view('footer');
	  	}

		  // public function login()
		  // {
		  // 	$this->load->view('registration/school');
		  // }
		public function user()
		{
			$this->load->view('registration/user_form');
		}
		public function form()
		{
			$this->load->view('registration/form');
		}
		public function view()
		{
			$this->load->view('registration/view_form');
		}
		public function portal()
		{
			$this->load->view('registration/portal');
		}
		public function challan()
		{
			$this->load->view('registration/challan');
		}
		public function voucher()
		{
			$this->load->view('registration/voucher');
		}
		public function admin_dashboard()
		{
			if($this->session->userdata('id'))
			{
				// ------------------------------------------------------------------------
				$data['total_students']				=count($this->common->select_array_records('student'));
				$data['total_registered_students']	=count($this->common->select_array_records('registration',array('registration_status'=>'registered')));
				$data['total_applicants']			=count($this->common->select_array_records('registration',array('registration_status !='=>'registered')));
				// ------------------------------------------------------------------------
				$data['total_employees']			=count($this->common->select_array_records('employees'));
				$data['total_new_employees']		=count($this->common->select_array_records('employees',array('employee_last_status_id'=>'1')));
				$data['total_registered_employees']	=count($this->common->select_array_records('employees',array('employee_last_status_id'=>'5')));
				// ------------------------------------------------------------------------
				$data['active']='dashboard';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/dashboard');
			}
			else
			{
				redirect('login/');
			}
		}
		public function admin_portal()
		{
			if($this->session->userdata('id'))
			{
				$this->load->view('admin/header');
				$this->load->view('admin/admin_portal');
			}
			else
			{
				redirect('login/');
			}
		}
		public function login()
		{
			$this->load->view('registration/login_form');
		}
		public function detail()
		{
			if($this->session->userdata('id'))
			{
				$this->load->view('registration/detailed_view');
			}
			else
			{
				redirect('login/');
			}
		}
	}
?>