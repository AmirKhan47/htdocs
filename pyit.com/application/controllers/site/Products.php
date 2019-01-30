<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Products';
		$data['sublayout'] = 'website/products';
		$this->load->view('website/base_layout', $data);
	}

}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */