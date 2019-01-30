<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_Mod extends CI_Model {

	public function add_news($table_name, $data){
		$query = $this->db->insert($table_name, $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_all_news($table_name, $where){
		$this->db->order_by('news_created_at', 'desc');
		$this->db->select('news_id, news_headline, news_description, news_created_by, news_created_at');
		$this->db->where($where);
		$query = $this->db->get($table_name);
		$result = $query->result_array();
		return $result;
	}

	public function news_deactivate($table_name, $where, $update_data){
		$this->db->where($where);
		$query = $this->db->update($table_name, $update_data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_news_detail($table_name, $where){
		$this->db->select('news_id, news_headline, news_description');
		$this->db->where($where);
		$query = $this->db->get($table_name);
		return $query->row_array();
	}

	public function news_update($table_name, $where, $data){
		$this->db->where($where);
		$query = $this->db->update($table_name, $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_news_num($table_name, $where){
		$this->db->where($where);
		$query = $this->db->get($table_name);
		return $query->num_rows();
	}

}

/* End of file News_Mod.php */
/* Location: ./application/models/News_Mod.php */