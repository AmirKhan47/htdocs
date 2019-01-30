<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_Mod extends CI_Model {

		public function validate_user_login($table_name, $where){
			$this->db->where($where);
			$query = $this->db->get($table_name);
			$count = $query->num_rows();
			if($count == 1){
				return TRUE;
			}else{
				return FALSE;
			}
		}

		public function check_user_status($table_name, $where, $or_where){
			$this->db->select('user_status');
			$this->db->where($where);
			$this->db->or_where($or_where);
			$query = $this->db->get($table_name);
			$result = $query->row_array();
			return $result['user_status'];
		}
	}

	

/* End of file Login_Mod.php */
/* Location: ./application/models/Login_Mod.php */