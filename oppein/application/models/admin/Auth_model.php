<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function login($username,$password){
		$where=array(
			'username' => $username,
			'password' => crypt($password,md5($password)),
		);
		$q  = $this->db->select('password,id,username')->from('admin')->where($where)->get()->row();
		if($q == ""){
            return array('status' => 204,'message' => '- Username and password doesn\'t match');
        }else{

        	$hashed_password = $q->password;
            $id              = $q->id;
            $username= $q->username;
            $role =$q->role;
            if (hash_equals($hashed_password, crypt($password,md5($password)))) {
               $created_date = date('Y-m-d H:i:s');
               $token = crypt(substr( md5(rand()), 0, 7));
               $expired_at = date("Y-m-d H:i:s", strtotime('+20 minutes'));
               $this->db->trans_start();
               //$this->db->where('id',$id)->update('users',array('last_login' => $last_login));
               $this->db->insert('admin_authentication',array('user_id' => $id,'token' => $token,'expired_at' => $expired_at,'created_date'=>$created_date));
               if ($this->db->trans_status() === FALSE){
                  $this->db->trans_rollback();
                  return array('status' => 500,'message' => '- Internal server error.');
               } else {

                  $this->db->trans_commit();
                  
                  return array('status' => 200,'message' => '- Successfully login.','id' => $id, 'token' => $token,'username' => $username);
               }
            } else {
               return array('status' => 204,'message' => '- Wrong password.');
            }
        }
	}

	public function logout(){
        $users_id  =  $this->session->userdata('user_id');
        $token     = $this->session->userdata('token');
        $this->db->where('user_id',$users_id)->where('token',$token)->delete('admin_authentication');
        return array('status' => 200,'message' => '- Successfully logout.');
    }

    public function auth(){
    	$users_id  = $this->session->userdata('user_id');
        $token     = $this->session->userdata('token');
        $q  = $this->db->select('expired_at')->from('admin_authentication')->where('user_id',$users_id)->where('token',$token)->get()->row();
        if($q == ""){
            return array('status' => 401,'message' => '- Unauthorized.');
        } else {
            if($q->expired_at < date('Y-m-d H:i:s')){
                return array('status' => 401,'message' => '- Your session has been expired.');
            } else {
                $updated_date = date('Y-m-d H:i:s');
                $expired_at = date("Y-m-d H:i:s", strtotime('+20 minutes'));
                $this->db->where('user_id',$users_id)->where('token',$token)->update('admin_authentication',array('expired_at' => $expired_at,'updated_date' => $updated_date));
                return array('status' => 200,'message' => '- Authorized.');
            }
        }

    }

	

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */