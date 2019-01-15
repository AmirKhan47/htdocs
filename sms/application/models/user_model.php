<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct()
	{
		parent:: __construct();
	}
	
	public function check_user($username, $password)
	{
		/*
			check user if its exist or valid user
			SELECT * FROM user WHERE username = ? AND userpass = ?;
		*/
		$password = md5($password);
		$this->db->select('username', 'userpass');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('userpass', $password);
		$query = $this->db->get();
		return $query->num_rows() == 1 ? true:false;
	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */