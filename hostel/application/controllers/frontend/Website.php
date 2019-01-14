<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Website extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('frontend/Index_model','index');
	}
	public function index()
	{
		$data['products']=$this->index->get_products();
		// $data['new_products']=$this->common->select_array_records('product_types',$where=array('type_id'=>1));
		// $data['products']=$this->common->select_array_records('products',$where=array('product_id'=>$data['new_products'][0]['product_id']));
		// $data['product_images']=$this->common->select_array_records('product_images',$where=array('product_id'=>$data['new_products'][0]['product_id']));
		// $data['product_prices']=$this->common->select_array_records('product_prices',$where=array('product_id'=>$data['new_products'][0]['product_id']));

		// $data['feature_products']=$this->common->select_array_records('product_types',$where=array('type_id'=>2));

		// $data['popular_products']=$this->common->select_array_records('product_types',$where=array('type_id'=>3));

		// $data['used_products']=$this->common->select_array_records('product_types',$where=array('type_id'=>4));

		echo "<pre>";
		print_r ($data);
		echo "</pre>";
		// exit();
		$data['active']='index';
		$data['content_for_layout']='frontend/index';
		$this->load->view('frontend/layout/default',$data);
	}
	public function about()
	{
		$data['active']='about';
		$data['content_for_layout']='frontend/about';
		$this->load->view('frontend/layout/default',$data);
	}
	public function contact()
	{
		$data['active']='contact';
		$data['content_for_layout']='frontend/contact';
		$this->load->view('frontend/layout/default',$data);
	}
	public function delivery()
	{
		$data['active']='delivery';
		$data['content_for_layout']='frontend/delivery';
		$this->load->view('frontend/layout/default',$data);
	}
	public function news()
	{
		$data['active']='news';
		$data['content_for_layout']='frontend/news';
		$this->load->view('frontend/layout/default',$data);
	}
	public function preview($product_id='')
	{
		$data['products']=$this->common->select_single_records('products',$where=array('product_id'=>$product_id));
		$data['product_details']=$this->common->select_single_records('product_details',$where=array('product_id'=>$product_id));
		$data['product_images']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
		$data['active']='preview';
		$data['content_for_layout']='frontend/preview';
		$this->load->view('frontend/layout/default',$data);
	}
}