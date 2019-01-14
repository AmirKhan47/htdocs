<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Location_model extends CI_Model
{
	public function list_of_locations_count()
	{
		$this->db->select('*');
		$this->db->from('areas as a');
		$this->db->join('cities as ci','ci.city_id=a.city_id','left');
		$this->db->join('countries as c','c.country_id=ci.country_id','left');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function get_list_of_locations($id=0)
	{
		$column_order = array('c.country_name','ci.city_name','a.area_name'); //set column field database for datatable orderable
		$column_search = array('c.country_name','ci.city_name','a.area_name'); //set column field database for datatable searchable 
		$order = array('a.area_id' => 'desc'); // default order 
		$this->db->select('*');
		$this->db->from('areas as a');
		$this->db->join('cities as ci','ci.city_id=a.city_id','left');
		$this->db->join('countries as c','c.country_id=ci.country_id','left');
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
}