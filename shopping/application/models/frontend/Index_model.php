<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Index_model extends CI_Model
{
	public function get_products()
	{
		$this->db->select('*');
		$this->db->from('products');
		$get=$this->db->get();
		$row=$get->result_array();
		foreach ($row as $key => $value)
		{
			$row[$key]['product_image_name']=$this->product_images($value['product_id']);
			$row[$key]['type_name']=$this->product_types($value['product_id']);
			$row[$key]['category_name']=$this->product_categories($value['product_id']);
			$row[$key]['product_price']=$this->product_prices($value['product_id']);
		}
		return $row;
	}
	public function product_images($id)
	{
		$this->db->select('product_image_name');
		$this->db->from('product_images');
		$this->db->where('product_id', $id);
		$get=$this->db->get();
		$row=$get->row_array();
		return $row['product_image_name'];

	}
	public function product_types($id)
	{
		$this->db->select('t.type_name');
		$this->db->from('product_types pt');
		$this->db->join('types t', 't.type_id = pt.type_id', 'left');
		$this->db->where('pt.product_id', $id);
		$get=$this->db->get();
		$row=$get->row_array();
		return $row['type_name'];
	
	}public function product_categories($id)
	{
		$this->db->select('c.category_name');
		$this->db->from('product_categories pc');
		$this->db->join('categories c', 'c.category_id = pc.category_id', 'left');
		$this->db->where('pc.product_id', $id);
		$get=$this->db->get();
		$row=$get->row_array();
		return $row['category_name'];
	}
	public function product_prices($id)
	{
		$this->db->select('product_price');
		$this->db->from('product_prices');
		$this->db->where('product_id', $id);
		$get=$this->db->get();
		$row=$get->row_array();
		return $row['product_price'];
	}
}