<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subject_model extends CI_Model
{
	public function subject_count()
	{
		$query = $this->db->get('subject');
		return $query->num_rows();
	}
	public function get_subjects($id=0)
	{
		$column_order = array('subject_name','created_at'); //set column field database for datatable orderable
		$column_search = array('subject_name','created_at'); //set column field database for datatable searchable 
		$order = array('id' => 'desc'); // default order 
		$this->db->select('*');
		$this->db->from('subject');
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
	public function branches_classes_count()
	{
		$query = $this->db->get('class_branch');
		return $query->num_rows();
	}
	public function get_branches_classes($id=0)
	{
		$column_order = array('c.class_code','c.class_name','b.branch_code','b.branch_name','cb.created_at'); //set column field database for datatable orderable
		$column_search = array('c.class_code','c.class_name','b.branch_code','b.branch_name','cb.created_at'); //set column field database for datatable searchable 
		$order = array('cb.id' => 'desc'); // default order 
		$this->db->select('cb.*,c.class_code,c.class_name,b.branch_code,b.branch_name');
		$this->db->from('class_branch as cb');
		$this->db->join('branch as b', 'b.id = cb.branch_id', 'left');
		$this->db->join('classes as c', 'c.id = cb.class_id', 'left');
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
	public function classes_subjects_count()
	{
		$query = $this->db->get('class_subjects');
		return $query->num_rows();
	}
	public function get_classes_subjects($id=0)
	{
		$column_order = array('c.class_code','c.class_name','s.subject_name','cs.created_at'); //set column field database for datatable orderable
		$column_search = array('c.class_code','c.class_name','s.subject_name','cs.created_at'); //set column field database for datatable searchable 
		$order = array('cs.class_subject_id' => 'desc'); // default order 
		$this->db->select('cs.*,c.class_code,c.class_name,s.subject_name');
		$this->db->from('class_subjects as cs');
		$this->db->join('classes as c', 'c.id = cs.class_id', 'left');
		$this->db->join('subject as s', 's.id = cs.subject_id', 'left');
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
		$column_order = array('D.department_name','P.position_name','DP.created_at'); //set column field database for datatable orderable
		$column_search = array('D.department_name','P.position_name','DP.created_at'); //set column field database for datatable searchable 
		$order = array('department_position_id' => 'desc'); // default order 
		$this->db->select('D.department_name,P.position_name,DP.created_at');
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