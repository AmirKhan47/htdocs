<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Mod extends CI_Model {

	public function add_user($table_name, $data){
		$query = $this->db->insert($table_name, $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_all_users($table_name){
		$this->db->order_by('user_created_at', 'desc');
		$this->db->select('user_id, user_username, user_role, user_status, user_created_by, user_created_at');
		// $this->db->where($where);
		$query = $this->db->get($table_name);
		$result = $query->result_array();
		return $result;
	}

	public function get_user_details($table_name, $where){
		$this->db->select('user_username, user_password, user_full_name, user_email, user_role');
		$this->db->where($where);
		$query = $this->db->get($table_name);
		return $query->row_array();
	}

	public function update_profile($table_name, $where, $data){
		$this->db->where($where);
		$query = $this->db->update($table_name, $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function check_old_password($table_name, $where){
		$this->db->where($where);
		$query = $this->db->get($table_name);
		$count = $query->num_rows();
		if($count == 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function update_password($table_name, $where, $data){
		$this->db->where($where);
		$query = $this->db->update($table_name, $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function change_user_status($table_name, $where, $data){
		$this->db->where($where);
		$query = $this->db->update($table_name, $data);
		if($query){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_users_num($table_name, $where){
		$this->db->where($where);
		$query = $this->db->get($table_name);
		return $query->num_rows();
	}

}

/* End of file Users_Mod.php */
/* Location: ./application/models/Users_Mod.php */