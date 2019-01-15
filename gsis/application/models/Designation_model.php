<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Designation_model extends CI_Model
{
	public function designation_count()
	{
		$query = $this->db->get('positions');
		return $query->num_rows();
	}
	public function get_designations($id=0)
	{
		$column_order = array('position_name','created_at'); //set column field database for datatable orderable
		$column_search = array('position_name','created_at'); //set column field database for datatable searchable 
		$order = array('position_id' => 'desc'); // default order 
		$this->db->select('*');
		$this->db->from('positions');
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
	public function department_designations_count()
	{
		$query = $this->db->get('department_positions');
		return $query->num_rows();
	}
	public function get_department_designations($id=0)
	{
		$column_order = array('D.department_name,P.position_name','DP.created_at'); //set column field database for datatable orderable
		$column_search = array('D.department_name,P.position_name','DP.created_at'); //set column field database for datatable searchable 
		$order = array('department_position_id' => 'desc'); // default order 
		$this->db->select('DP.department_position_id,D.department_name,P.position_name,DP.created_at');
		$this->db->from('department_positions AS DP');
		$this->db->join('departments AS D', 'D.department_id = DP.department_id', 'left');
		$this->db->join('positions AS P', 'P.position_id = DP.position_id', 'left');
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
	public function employee_email_history_count($employee_id=0)
	{
		$this->db->select('*');
		$this->db->from('employee_emails AS EE');
		$this->db->join('branch AS B',		'B.id = EE.branch_id', 'left');
		$this->db->where('EE.employee_id',$employee_id);
		$query=$this->db->get();
		return $query->num_rows();
	}
	public function get_employee_email_history($id=0,$employee_id=0)
	{
		$column_order = array('EE.send_to','EE.subject','EE.test_datetime','B.branch_name','EE.message','EE.created_at'); //set column field database for datatable orderable
		$column_search = array('EE.send_to','EE.subject','EE.test_datetime','B.branch_name','EE.message','EE.created_at'); //set column field database for datatable searchable 
		$order = array('employee_email_id' => 'desc'); // default order 
		$this->db->select('*');
		$this->db->from('employee_emails AS EE');
		$this->db->join('branch AS B',		'B.id = EE.branch_id', 'left');
		$this->db->where('EE.employee_id',$employee_id);
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