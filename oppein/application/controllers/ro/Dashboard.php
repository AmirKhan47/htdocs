<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Auth_model');
		//Do your magic here
	}

	public function index(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			if($this->session->userdata('role')==2){
				$data['sublayout']='ro/dashboard/dashboard';
				$data['active']='dashboard';
				$this->load->view('ro/ro_layout',$data);
			}else{
				$this->session->set_flashdata('err_message','- Unauthorized page');
				redirect(URL.'Auth/');
			}
		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(URL.'Auth/');
		}
		
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/bdm/Dashboard.php */

?>