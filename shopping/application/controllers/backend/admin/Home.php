<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
    	$data['active']='home';
        $data['page']='pages/home';
        $this->load->view('backend/admin/layout/default',$data);
    }
}