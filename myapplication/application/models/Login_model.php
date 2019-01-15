<?php
class Login_model extends CI_Model{

public function create_login(){

	$query = $this->db->query("SELECT * from users where user_name='".$this->input->post('admin_name')."' and user_password='".$this->input->post('admin_password')."' and user_type='admin' ");
		if($this->db->affected_rows() >0) {
			
	$data = array(
			'user_name' => $this->input->post('username'),
			'user_password' => $this->input->post('password'),
			'name' => $this->input->post('fullname'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'user_type' => 'staff' ,
			);
	$this->db->insert('users',$data);
		if($this->db->affected_rows() >0) {
			return true;
		}else{
			return false;
		}
 }else{
 	return false;
 }		

}

public function forget_login(){

	$query = $this->db->query("SELECT email from users ");
	if($this->db->affected_rows() >0) {
		return $query->result_row();
	}else{
		return false;
	}
 	

}
public function user_login($username,$password){

		$query = $this->db->query("SELECT * from users where user_name='".$username."' and user_password='".$password."' and user_type='admin' ");
		if($this->db->affected_rows() >0) {
			
			return $query->result_array();
			
		}
		else{
		
		$query = $this->db->query("SELECT * from users where user_name='".$username."' and user_password='".$password."' and user_type='staff' ");
		
			if($this->db->affected_rows() >0) {
				
				return $query->result_array();
				
			}else{

				return false ;
			}
			
		}
	
}
public function checkAuth($password){

	// $query = $this->db->query("SELECT * from users where user_password='".$password."' ");
	// if($this->db->affected_rows() >0) {
	// 	return true;
	// 	// return $query->result_row();
	// }else{
	// 	return false;
	// }

	if($password=='CheckAuth123'){
		return true;
	}else{
		return false;
	}
 	

}

}
?>