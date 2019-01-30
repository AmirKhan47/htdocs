<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Strengths extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Strengths';
		$data['sublayout'] = 'website/strengths';
		$this->load->view('website/base_layout', $data);
	}

}

/* End of file Strengths.php */
/* Location: ./application/controllers/Strengths.php */