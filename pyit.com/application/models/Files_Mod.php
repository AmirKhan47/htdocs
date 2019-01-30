<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files_Mod extends CI_Model {

	public function add_new_file($table_name, $data){
		$query = $this->db->insert($table_name, $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_all_files($table_name, $where){
		$this->db->order_by('file_created_at', 'desc');
		$this->db->select('file_id, file_name, file_category, file_description, file_attachment, file_created_by, file_created_at');
		$this->db->where($where);
		$query = $this->db->get($table_name);
		$result = $query->result_array();
		return $result;
	}

	public function file_deactivate($table_name, $where, $update_data){
		$this->db->where($where);
		$query = $this->db->update($table_name, $update_data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_files_num($table_name, $where){
		$this->db->where($where);
		$query = $this->db->get($table_name);
		return $query->num_rows();
	}

}

/* End of file Files_Mod.php */
/* Location: ./application/models/Files_Mod.php */