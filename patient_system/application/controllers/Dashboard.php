<?php
class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
	}

	public function hospital()
	{
		$this->load->view('hospital_dashboard.php');
	}
	
}
?>