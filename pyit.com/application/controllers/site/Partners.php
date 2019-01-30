<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Partners';
		$data['sublayout'] = 'website/partners';
		$this->load->view('website/base_layout', $data);
	}

}

/* End of file Partners.php */
/* Location: ./application/controllers/Partners.php */