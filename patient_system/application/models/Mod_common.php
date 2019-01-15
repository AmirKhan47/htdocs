<?php
class Mod_common extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}
public function insert_user($table,$data)
  {

  	 $insert = $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        
        if ($insert) {
            return $insert_id;
        } else {
            return false;
        }
  }
  public function email_check($email)
  {
    $this->db->where('email',$email);
    $query = $this->db->get('register');
  
   if($query->num_rows() > 0)
   {
      return true;
   }
   else
   {
        return false;
   }

  }
public function cnic_check($cnic)
  {
    $this->db->where('cnic',$cnic);
    $query = $this->db->get('patient');
  
   if($query->num_rows() > 0)
   {
      return true;
   }
   else
   {
        return false;
   }

  }
public function login_process()
{
   $email = $this->input->post('email');
  $password = $this->input->post('password');
  
  $this->db->where('email',$email);
  $this->db->where('password',$password);
    $query = $this->db->get('register');
  return $query->row_array();
}

 public  function select_record($table = "", $where = "", $fields = "*") {

        $this->db->select($fields);
        if ($where != "") {
            $this->db->where($where);
        }
        $get = $this->db->get($table);
        return $get->row_array();
    }
    // public  function select_records($table = "", $where = "", $fields = "*") {

    //     $this->db->select($fields);
    //     if ($where != "") {
    //       for ($i=0; $i < count($where); $i++) { 
    //        // $query = $this->db->or_where('symtoms_id',$where[$i]);
    //        $get = $this->db->query('SELECT a as disease_id,MAX(b) as timeoccur from ( SELECT disease_id as a,count(disease_id) as b FROM `disease_symtoms` WHERE `symtoms_id`,$where[$i] group by disease_id) as itable');
    //          // $counts= array_count_values ($query);
    //       }
            
    //     }
    //     $this->db->get($table);
    //     return $get->result_array();
    // }

    public  function select_records($table = "", $where = "", $fields = "*") {

        //$this->db->select("disease_id as disease,count(disease_id) as total");
        $this->db->select_max("disease_id");
        $this->db->from("disease_symtoms");
        foreach ($where as $key => $value) {
          $this->db->or_where("symtoms_id",$value);
        }
        $this->db->order_by("count(disease_id)","desc");
        $this->db->group_by("disease_id");
        $get=$this->db->get();
       // echo $this->db->last_query();
        return $get->row_array();
        exit();
    }

    public function get_symtoms()
    {
      $query=$this->db->get('symtoms');
      return $query->result_array();
    }
     public  function update_user($table, $data, $where) {
        $this->db->where($where);
        $update = $this->db->update($table, $data);

        
        if ($update) {
            return true;
        } else {
            return false;
        }


    }

    public function delete_record($table = "", $where = "" ,$where1 = "")
     {

       $this->db->where($where);
        $delete = $this->db->delete($table);
        if ($delete)
            return true;
        else
            return false;
    }
public function get_record($table = "", $fields = "*")
  {
         $this->db->select($fields);
        $get = $this->db->get($table);
        return $get->result_array();
    }


}
?>