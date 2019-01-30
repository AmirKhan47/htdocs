<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_Mod extends CI_Model {

	public function upload_image($table_name, $where, $data){
		$this->db->where($where);
		$query = $this->db->update($table_name, $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_slider_images($table_name){
		$this->db->select('image_id, image_name');
		$query = $this->db->get($table_name);
		return $query->result_array();
	}

	public function get_slider_images_no($table_name){
		$query = $this->db->get($table_name);
		return $query->num_rows();
	}

}

/* End of file Slider_Mod.php */
/* Location: ./application/models/Slider_Mod.php */