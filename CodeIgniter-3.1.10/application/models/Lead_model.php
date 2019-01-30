<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lead_model extends CI_Model
{
	function chart_data()
	{
      	$this->db->select('date,count');
      	$this->db->from('lead_count');
      	// $this->db->join('daily_lead as dl','dl.date=lc.date','left');
      	$result = $this->db->get();
      	return $result;
  	}
	public function list_of_lead_count()
	{
		$this->db->select('*');
		$this->db->from('daily_lead as l');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function get_list_of_lead($id=0)
	{
		$column_order = array('l.date','l.lead_origin','l.lead_area','l.city','l.query','l.client_name','l.contact','l.note','created_at'); //set column field database for datatable orderable
		$column_search = array('l.date','l.lead_origin','l.lead_area','l.city','l.query','l.client_name','l.contact','l.note','created_at'); //set column field database for datatable searchable 
		$order = array('l.daily_lead_id'=>'desc'); // default order 
		$this->db->select('*');
		$this->db->from('daily_lead as l');
        $i = 0;
        if($id==0)
        {
	        foreach ($column_search as $key=>$item) // loop column 
	        {
	            if($_POST['search']['value']) // if datatable send POST for search
	            {
	            	$search_value = $_POST['search']['value'];
	            	$search_text = $search_value;
	                if($i===0) // first loop
	                {
	                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
	                    $this->db->like($item, $search_text);
	                }
	                else
	                {
	                    $this->db->or_like($item, $search_text);
	                }
	                if(count($column_search) - 1 == $i) //last loop
	                    $this->db->group_end(); //close bracket
	            }
                else
                if($_POST['columns']) // if datatable send POST for coulumn search
                {
                	$search_value = $_POST['columns'][$key]['search']['value'];
                	$search_text = $search_value;
	                if($search_text!='')
	                {
	                    $this->db->where($item, $search_text);
	                }
	           }
	           $i++;
	       	}
	        if(isset($_POST['order'])) // here order processing
	        {
	            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	        } 
	        else if(isset($order))
	        {
	            $order = $order;
	            $this->db->order_by(key($order), $order[key($order)]);
	        }
	        if($_POST['length'] != -1)
	            $this->db->limit($_POST['length'], $_POST['start']);
	        $query = $this->db->get();
	        return $query->result_array();
	    }
	}
	public function list_of_so_count()
	{
		$this->db->select('*');
		$this->db->from('users as u');
		$this->db->join('users_roles as ur','ur.user_id=u.user_id','left');
		$this->db->join('roles as r','r.role_id=ur.role_id','left');
		$this->db->where('ur.role_id',2);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function get_list_of_so($id=0)
	{
		$column_order = array('u.fullname','u.phone_no','u.cnic','u.address'); //set column field database for datatable orderable
		$column_search = array('u.fullname','u.phone_no','u.cnic','u.address'); //set column field database for datatable searchable 
		$order = array('u.user_id' => 'desc'); // default order 
		$this->db->select('*');
		$this->db->from('users as u');
		$this->db->join('users_roles as ur','ur.user_id=u.user_id','left');
		$this->db->join('roles as r','r.role_id=ur.role_id','left');
		$this->db->where('ur.role_id',2);
        $i = 0;
        if($id==0)
        {
	        foreach ($column_search as $key=>$item) // loop column 
	        {
	            if($_POST['search']['value']) // if datatable send POST for search
	            {
	            	$search_value = $_POST['search']['value'];
	            	$search_text = $search_value;
	                if($i===0) // first loop
	                {
	                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
	                    $this->db->like($item, $search_text);
	                }
	                else
	                {
	                    $this->db->or_like($item, $search_text);
	                }
	                if(count($column_search) - 1 == $i) //last loop
	                    $this->db->group_end(); //close bracket
	            }
                else
                if($_POST['columns']) // if datatable send POST for coulumn search
                {
                	$search_value = $_POST['columns'][$key]['search']['value'];
                	$search_text = $search_value;
	                if($search_text!='')
	                {
	                    $this->db->where($item, $search_text);
	                }
	           }
	           $i++;
	       	}
	        if(isset($_POST['order'])) // here order processing
	        {
	            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	        } 
	        else if(isset($order))
	        {
	            $order = $order;
	            $this->db->order_by(key($order), $order[key($order)]);
	        }
	        if($_POST['length'] != -1)
	            $this->db->limit($_POST['length'], $_POST['start']);
	        $query = $this->db->get();
	        return $query->result_array();
	    }
	}
	public function get_update_user($user_id='',$role_id='')
	{
		$this->db->select('*');
		$this->db->from('users as u');
		$this->db->join('users_roles as ur','ur.user_id=u.user_id','left');
		$this->db->join('roles as r','r.role_id=ur.role_id','left');
		$this->db->where(array('u.user_id'=>$user_id,'ur.role_id'=>$role_id));
		$query = $this->db->get();
		return $query->row_array();
	}
}