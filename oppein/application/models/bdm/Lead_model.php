<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead_model extends CI_Model {

	public function lead_count(){
        $this->db->select('c.id,c.name,c.phone,c.address,u.Name');
		$this->db->from('customer c');
        $this->db->join('customer_leads l','l.customer_id=c.id','left');
        $this->db->join('assign a','a.lead_id=l.id','left');
        $this->db->join('users u','u.id=a.assign_ro','left');
        $where=array('l.user_id' => $this->session->userdata('user_id'),);
        $this->db->where($where);
        $get=$this->db->get();
		return $get->num_rows();
	}

	public function get_leads($id=0){
     $column_order = array('c.id','c.name','c.phone','c.address','u.Name'); //set column field database for datatable orderable
        $column_search = array('c.id','c.name','c.phone','c.address','u.Name'); //set column field database for datatable searchable 
        $order = array('c.id' => 'desc'); // default order 
        $this->db->select('c.id,c.name,c.phone,c.address,u.Name');
        $this->db->from('customer c');
        $this->db->join('customer_leads l','l.customer_id=c.id','left');
        $this->db->join('assign a','a.lead_id=l.id','left');
        $this->db->join('users u','u.id=a.assign_ro','left');
        $where=array('l.user_id' => $this->session->userdata('user_id'),);
        $this->db->where($where);
        $i = 0;
        if($id==0){
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
                }elseif($_POST['columns']) // if datatable send POST for coulumn search
                {

                 $search_value = $_POST['columns'][$key]['search']['value'];               

                 $search_text = $search_value;


                 if($search_text!='')
                 {
                    $this->db->where($item, $search_text);
                }

               /* if(count($column_search) - 1 == $i) //last loop
               $this->db->group_end(); //close bracket*/
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
        //echo $this->db->get_compiled_select();exit;
        $query = $this->db->get();
        return $query->result_array();
    }

}

	

}

/* End of file Lead_model.php */
/* Location: ./application/models/bdm/Lead_model.php */
?>