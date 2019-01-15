<?php
	class Login_model extends CI_Model
	{
		function __construct()
		{
			$this->load->database();
		}
		public function is_username_exist($username)
		{
			$query = $this->db->get_where('users', array('username'=>$username));
			$rowcount = $query->num_rows();
			return $rowcount>0?true:false;
		}
		public function is_login_correct($login)
		{
			$query = $this->db->get_where('users', $login);
			if($query->num_rows() > 0)
	        {
	        	return $query->row_array();
	        }
	        else
	        {
	        	return false;
	        }
		}
	}
?>