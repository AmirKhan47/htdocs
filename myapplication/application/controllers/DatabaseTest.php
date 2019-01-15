<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//A controller to test the using of the CodeIgniter database class (not required)
class DatabaseTest extends CI_Controller {

	public function index()
	{	
		// $this->load->model('S');
		
		$data = $this->Store_model->getStaffMember(5);
		
		//Show the retrieved data to prove the CodeIgniter database class can be used without problem.
		var_dump($data); 
	}
}
