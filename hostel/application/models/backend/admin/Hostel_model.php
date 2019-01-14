<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hostel_model extends CI_Model
{
	public function get_cities($country_id)
	{
		$this->db->where('country_id', $country_id);
		$this->db->order_by('city_name', 'ASC');
		$query = $this->db->get('cities');
		$output = '<option value="">Select City</option>';
		foreach($query->result() as $row)
		{
			$output .= '<option value="'.$row->city_id.'">'.$row->city_name.'</option>';
		}
		return $output;
	}
	public function get_cities1($country_id)
	{
		$this->db->where('country_id', $country_id);
		$this->db->order_by('city_name', 'ASC');
		$query = $this->db->get('cities');
		return $query->result_array();
		// $output = '<option value="">Select City</option>';
		// foreach($query->result() as $row)
		// {
		// 	$output .= '<option value="'.$row->city_id.'">'.$row->city_name.'</option>';
		// }
		// return $output;
	}
	public function get_areas($city_id)
	{
		$this->db->where('city_id', $city_id);
		$this->db->order_by('area_name', 'ASC');
		$query = $this->db->get('areas');
		$output = '<option value="">Select Area</option>';
		foreach($query->result() as $row)
		{
			$output .= '<option value="'.$row->area_id.'">'.$row->area_name.'</option>';
		}
		return $output;
	}
	public function get_areas1($city_id)
	{
		$this->db->where('city_id', $city_id);
		$this->db->order_by('area_name', 'ASC');
		$query = $this->db->get('areas');
		return $query->result_array();
		// $output = '<option value="">Select Area</option>';
		// foreach($query->result() as $row)
		// {
		// 	$output .= '<option value="'.$row->area_id.'">'.$row->area_name.'</option>';
		// }
		// return $output;
	}
	public function new_hostels_count()
	{
		$this->db->select('*');
		$this->db->from('hostels as h');
		$this->db->join('categories as c','c.category_id=h.category_id','left');
		$this->db->join('areas as a','a.area_id=h.area_id','left');
		$this->db->join('hostels_statuses as hs','hs.hostel_status_id=h.last_hostel_status_id','left');
		$this->db->where('hs.status_id',1);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function get_new_hostels($id=0)
	{
		$column_order = array('h.hostel_name','h.owner_name','h.contact','c.category_name','h.single_person_room_rent','h.shared_room_rent','a.area_name'); //set column field database for datatable orderable
		$column_search = array('h.hostel_name','h.owner_name','h.contact','c.category_name','h.single_person_room_rent','h.shared_room_rent','a.area_name'); //set column field database for datatable searchable 
		$order = array('h.hostel_id' => 'desc'); // default order 
		$this->db->select('*');
		$this->db->from('hostels as h');
		$this->db->join('categories as c','c.category_id=h.category_id','left');
		$this->db->join('areas as a','a.area_id=h.area_id','left');
		$this->db->join('hostels_statuses as hs','hs.hostel_status_id=h.last_hostel_status_id','left');
		$this->db->where('hs.status_id',1);
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
	public function approved_hostels_count()
	{
		$this->db->select('*');
		$this->db->from('hostels as h');
		$this->db->join('categories as c','c.category_id=h.category_id','left');
		$this->db->join('areas as a','a.area_id=h.area_id','left');
		$this->db->join('hostels_statuses as hs','hs.hostel_status_id=h.last_hostel_status_id','left');
		$this->db->where('hs.status_id',2);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function get_approved_hostels($id=0)
	{
		$column_order = array('h.hostel_name','h.owner_name','h.contact','c.category_name','h.single_person_room_rent','h.shared_room_rent','a.area_name'); //set column field database for datatable orderable
		$column_search = array('h.hostel_name','h.owner_name','h.contact','c.category_name','h.single_person_room_rent','h.shared_room_rent','a.area_name'); //set column field database for datatable searchable 
		$order = array('h.hostel_id' => 'desc'); // default order 
		$this->db->select('*');
		$this->db->from('hostels as h');
		$this->db->join('categories as c','c.category_id=h.category_id','left');
		$this->db->join('areas as a','a.area_id=h.area_id','left');
		$this->db->join('hostels_statuses as hs','hs.hostel_status_id=h.last_hostel_status_id','left');
		$this->db->where('hs.status_id',2);
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
	public function payment_pending_count()
	{
		$this->db->select('*');
		$this->db->from('hostels as h');
		$this->db->join('categories as c','c.category_id=h.category_id','left');
		$this->db->join('areas as a','a.area_id=h.area_id','left');
		$this->db->join('hostels_statuses as hs','hs.hostel_status_id=h.last_hostel_status_id','left');
		$this->db->where('hs.status_id',3);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function get_payment_pending($id=0)
	{
		$column_order = array('h.hostel_name','h.owner_name','h.contact','c.category_name','h.single_person_room_rent','h.shared_room_rent','a.area_name'); //set column field database for datatable orderable
		$column_search = array('h.hostel_name','h.owner_name','h.contact','c.category_name','h.single_person_room_rent','h.shared_room_rent','a.area_name'); //set column field database for datatable searchable 
		$order = array('h.hostel_id' => 'desc'); // default order 
		$this->db->select('*');
		$this->db->from('hostels as h');
		$this->db->join('categories as c','c.category_id=h.category_id','left');
		$this->db->join('areas as a','a.area_id=h.area_id','left');
		$this->db->join('hostels_statuses as hs','hs.hostel_status_id=h.last_hostel_status_id','left');
		$this->db->where('hs.status_id',3);
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
	public function all_hostels_count()
	{
		$this->db->select('*');
		$this->db->from('hostels as h');
		$this->db->join('categories as c','c.category_id=h.category_id','left');
		$this->db->join('areas as a','a.area_id=h.area_id','left');
		$this->db->join('hostels_statuses as hs','hs.hostel_status_id=h.last_hostel_status_id','left');
		// $this->db->where('hs.status_id',1);
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function get_all_hostels($id=0)
	{
		$column_order = array('h.hostel_name','h.owner_name','h.contact','c.category_name','h.single_person_room_rent','h.shared_room_rent','a.area_name','s.status_name'); //set column field database for datatable orderable
		$column_search = array('h.hostel_name','h.owner_name','h.contact','c.category_name','h.single_person_room_rent','h.shared_room_rent','a.area_name','s.status_name'); //set column field database for datatable searchable 
		$order = array('h.hostel_id' => 'desc'); // default order 
		$this->db->select('*');
		$this->db->from('hostels as h');
		$this->db->join('categories as c','c.category_id=h.category_id','left');
		$this->db->join('areas as a','a.area_id=h.area_id','left');
		$this->db->join('hostels_statuses as hs','hs.hostel_status_id=h.last_hostel_status_id','left');
		$this->db->join('statuses as s','s.status_id=hs.status_id','left');
		// $this->db->where('hs.status_id',1);
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
	public function get_hostel_detail($hostel_id='',$last_hostel_status_id='')
	{
		$this->db->select('*');
		$this->db->from('hostels as h');
		$this->db->join('categories as c','c.category_id=h.category_id','left');
		$this->db->join('types as t','t.type_id=h.type_id','left');
		$this->db->join('countries as co','co.country_id=h.country_id','left');
		$this->db->join('cities as ci','ci.city_id=h.city_id','left');
		$this->db->join('areas as a','a.area_id=h.area_id','left');
		// $this->db->join('hostels_facilities as hf','hf.hostel_id=h.hostel_id','left');
		$this->db->join('hostels_statuses as hs','hs.hostel_status_id=h.last_hostel_status_id','left');
		$this->db->join('statuses as s','s.status_id=hs.status_id','left');
		$this->db->where(array('h.hostel_id'=>$hostel_id));
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_hostels_facilities($hostel_id='')
	{
		$this->db->select('*');
		$this->db->from('hostels_facilities as hf');
		$this->db->join('facilities as f','f.facility_id=hf.facility_id','left');
		$this->db->where(array('hf.hostel_id'=>$hostel_id));
		$query = $this->db->get();
		return $query->result_array();
	}
}