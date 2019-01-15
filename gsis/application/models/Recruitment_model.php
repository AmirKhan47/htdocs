<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Recruitment_model extends CI_Model
{
	public function user_count()
	{
		$query = $this->db->get('employees');
		return $query->num_rows();
	}
	public function get_applicants($id=0)
	{
		$column_order = array('E.employee_no','E.employee_name','E.employee_cnic','C.contact_cell','P.position_name','S.status_name'); //set column field database for datatable orderable
		$column_search = array('E.employee_no','E.employee_name','E.employee_cnic','C.contact_cell','P.position_name','S.status_name'); //set column field database for datatable searchable 
		$order = array('E.employee_id' => 'desc'); // default order 
		$this->db->select('*');
		$this->db->from('employees AS E');
		$this->db->join('employee_contacts AS EC',		'EC.employee_id = E.employee_id', 'left');
		$this->db->join('contact AS C',					'C.id = EC.contact_id', 'left');
		$this->db->join('employee_positions AS EP',		'EP.employee_id = E.employee_id', 'left');
		$this->db->join('positions AS P',				'P.position_id = EP.position_id', 'left');
		// $this->db->join('employee_statuses AS ES',		'ES.employee_id = E.employee_id', 'left');
		$this->db->join('statuses AS S',				'S.status_id = E.employee_last_status_id', 'left');
		$this->db->where('E.employee_last_status_id',1);
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
	public function test_applicants_count()
	{
		$query = $this->db->get('employees');
		return $query->num_rows();
	}
	public function test_applicants($id=0)
	{
		$column_order = array('E.employee_no','E.employee_name','E.employee_cnic','C.contact_cell','P.position_name','S.status_name'); //set column field database for datatable orderable
		$column_search = array('E.employee_no','E.employee_name','E.employee_cnic','C.contact_cell','P.position_name','S.status_name'); //set column field database for datatable searchable 
		$order = array('E.employee_id' => 'desc'); // default order 
		$this->db->select('*');
		$this->db->from('employees AS E');
		$this->db->join('employee_contacts AS EC',		'EC.employee_id = E.employee_id', 'left');
		$this->db->join('contact AS C',					'C.id = EC.contact_id', 'left');
		$this->db->join('employee_positions AS EP',		'EP.employee_id = E.employee_id', 'left');
		$this->db->join('positions AS P',				'P.position_id = EP.position_id', 'left');
		// $this->db->join('employee_statuses AS ES',		'ES.employee_id = E.employee_id', 'left');
		$this->db->join('statuses AS S',				'S.status_id = E.employee_last_status_id', 'left');
		$this->db->where('E.employee_last_status_id',2);
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
	public function file_completion_applicants_count()
	{
		$query = $this->db->get('employees');
		return $query->num_rows();
	}
	public function file_completion_applicants($id=0)
	{
		$column_order = array('E.employee_no','E.employee_name','E.employee_cnic','C.contact_cell','P.position_name','S.status_name'); //set column field database for datatable orderable
		$column_search = array('E.employee_no','E.employee_name','E.employee_cnic','C.contact_cell','P.position_name','S.status_name'); //set column field database for datatable searchable 
		$order = array('E.employee_id' => 'desc'); // default order 
		$this->db->select('*');
		$this->db->from('employees AS E');
		$this->db->join('employee_contacts AS EC',		'EC.employee_id = E.employee_id', 'left');
		$this->db->join('contact AS C',					'C.id = EC.contact_id', 'left');
		$this->db->join('employee_positions AS EP',		'EP.employee_id = E.employee_id', 'left');
		$this->db->join('positions AS P',				'P.position_id = EP.position_id', 'left');
		// $this->db->join('employee_statuses AS ES',		'ES.employee_id = E.employee_id', 'left');
		$this->db->join('statuses AS S',				'S.status_id = E.employee_last_status_id', 'left');
		$this->db->where('E.employee_last_status_id',3);
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
	public function registered_applicants_count()
	{
		$query = $this->db->get('employees');
		return $query->num_rows();
	}
	public function registered_applicants($id=0)
	{
		$column_order = array('E.employee_no','E.employee_name','E.employee_cnic','C.contact_cell','P.position_name','S.status_name'); //set column field database for datatable orderable
		$column_search = array('E.employee_no','E.employee_name','E.employee_cnic','C.contact_cell','P.position_name','S.status_name'); //set column field database for datatable searchable 
		$order = array('E.employee_id' => 'desc'); // default order 
		$this->db->select('*');
		$this->db->from('employees AS E');
		$this->db->join('employee_contacts AS EC',		'EC.employee_id = E.employee_id', 'left');
		$this->db->join('contact AS C',					'C.id = EC.contact_id', 'left');
		$this->db->join('employee_positions AS EP',		'EP.employee_id = E.employee_id', 'left');
		$this->db->join('positions AS P',				'P.position_id = EP.position_id', 'left');
		// $this->db->join('employee_statuses AS ES',		'ES.employee_id = E.employee_id', 'left');
		$this->db->join('statuses AS S',				'S.status_id = E.employee_last_status_id', 'left');
		$this->db->where('E.employee_last_status_id',4);
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
	public function all_applicants_count()
	{
		$query = $this->db->get('employees');
		return $query->num_rows();
	}
	public function all_applicants($id=0)
	{
		$column_order = array('E.employee_no','E.employee_name','E.employee_cnic','C.contact_cell','P.position_name','S.status_name'); //set column field database for datatable orderable
		$column_search = array('E.employee_no','E.employee_name','E.employee_cnic','C.contact_cell','P.position_name','S.status_name'); //set column field database for datatable searchable 
		$order = array('E.employee_id' => 'desc'); // default order 
		$this->db->select('*');
		$this->db->from('employees AS E');
		$this->db->join('employee_contacts AS EC',		'EC.employee_id = E.employee_id', 'left');
		$this->db->join('contact AS C',					'C.id = EC.contact_id', 'left');
		$this->db->join('employee_positions AS EP',		'EP.employee_id = E.employee_id', 'left');
		$this->db->join('positions AS P',				'P.position_id = EP.position_id', 'left');
		// $this->db->join('employee_statuses AS ES',		'ES.employee_id = E.employee_id', 'left');
		$this->db->join('statuses AS S',				'S.status_id = E.employee_last_status_id', 'left');
		$this->db->where('E.employee_last_status_id !=',5);
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
	public function get_employee_statuses($employee_id='')
	{
		$this->db->select('s.status_name,es.created_at,sr.status_result,sr.status_remark');
		$this->db->from('employee_statuses as es');
		$this->db->join('statuses as s', 's.status_id = es.status_id', 'left');
		$this->db->join('status_remarks as sr', 'sr.status_id = es.status_id', 'left');
		$where=array(
			'es.employee_id' => $employee_id,
			'sr.employee_id' => $employee_id,
		);
		$this->db->where($where);
		$query = $this->db->get();
	    return $query->result_array();
	}
}