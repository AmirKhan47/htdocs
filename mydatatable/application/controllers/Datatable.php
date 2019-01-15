<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Datatable extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function import()
		{
			if($this->input->post('submit'))
			{
				echo "<pre>";
				print_r ($_FILES['myfile']);
				echo "</pre>";
				// exit();
				$this->db->query(file_get_contents($_FILES['myfile']['tmp_name']));

			}
			else
			{
				$this->load->view('import');
			}
		}
		public function index()
		{
			$data['result']=$this->datatable_model->user_count();
			$this->load->view('datatable');
		}
		public function get_data()
		{
			$list = $this->datatable_model->get_data();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $key => $value)
			{
				$no++;
				$row = array();
				$row[] = $value['user_id'];
				$row[] = $value['full_name'];
				$row[] = $value['username'];
				$row[] = $value['email'];
				$row[] = $value['password'];
				$row[] = $value['created_date'];
				$data[] = $row;
			}
			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->datatable_model->user_count(),
				"recordsFiltered" => $this->datatable_model->user_count(),
				"data" => $data
			);
			echo json_encode($output);
		}
	}
?>