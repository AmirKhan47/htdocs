<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
    	$data['active']='dashboard';
        $data['page']='layout/dashboard';
        $this->load->view('backend/admin/layout/default',$data);
    }
}