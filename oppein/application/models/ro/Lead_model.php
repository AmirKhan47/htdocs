<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead_model extends CI_Model {

	public function newlead_count(){
        $this->db->select('l.id,c.name,c.phone,c.address,u.Name');
		$this->db->from('customer c');
        $this->db->join('customer_leads l','l.customer_id=c.id','left');
        $this->db->join('assign a','a.lead_id=l.id','left');
        $this->db->join('users u','u.id=l.user_id','left');
        $this->db->join('stage s', 's.assign_id=a.id','left');
        $where=array(
            'a.assign_ro'=>$this->session->userdata('user_id'),
            'a.is_read' => 0,
        );
        $this->db->where($where);
        $get=$this->db->get();
		return $get->num_rows();
	}

	public function get_newleads($id=0){
     $column_order = array('l.id','c.name','c.phone','c.address','u.Name'); //set column field database for datatable orderable
        $column_search = array('l.id','c.name','c.phone','c.address','u.Name'); //set column field database for datatable searchable 
        $order = array('l.id' => 'desc'); // default order 
        $this->db->select('c.id,a.id as assign,s.id as stage_id,c.name,c.phone,c.address,u.Name as bdm');
        $this->db->from('customer c');
        $this->db->join('customer_leads l','l.customer_id=c.id','left');
        $this->db->join('assign a','a.lead_id=l.id','left');
        $this->db->join('users u','u.id=l.user_id','left');
        $this->db->join('stage s', 's.assign_id=a.id','left');
        $where=array(
            'a.assign_ro'=>$this->session->userdata('user_id'),
            'a.is_read' => 0,
        );
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

    public function lead_detail($where){
        $this->db->select('l.id,c.name,c.id as customer_id,d.name as designation,c.address,r.Name as ro,b.Name as bdm,l.priority,sn.stage_name as status,a.created_date,st.id as stage_id,a.id as assign_id');
        $this->db->from('customer c');
        $this->db->join('designation d','d.id=c.designation_id','left');
        $this->db->join('customer_leads l','l.customer_id=c.id','left');
        $this->db->join('assign a','a.lead_id=l.id','left');
        $this->db->join('users r','r.id=a.assign_ro','left');
        $this->db->join('users b','b.id=l.user_id','left');
        $this->db->join('stage st','st.id=l.stage_id','left');
        $this->db->join('stage_name sn','sn.id=st.stage_name_id','left');
        $this->db->where($where);

        $get=$this->db->get();
        return $get->row_array();
    }


    public function lead_progress_count($where){
        $this->db->select('l.id,c.name,c.id as customer_id,d.name as designation,c.phone,b.Name as bdm,a.created_date');
        $this->db->from('customer c');
        $this->db->join('designation d','d.id=c.designation_id','left');
        $this->db->join('customer_leads l','l.customer_id=c.id','left');
        $this->db->join('assign a','a.lead_id=l.id','left');
        $this->db->join('users r','r.id=a.assign_ro','left');
        $this->db->join('users b','b.id=l.user_id','left');
        $this->db->join('stage st','st.id=l.stage_id','left');
        $this->db->where($where);
        $get=$this->db->get();
        return $get->num_rows();
    }

    public function get_lead_progress($where,$id=0){
     $column_order = array('l.id','c.name','c.phone','d.name','b.Name'); //set column field database for datatable orderable
        $column_search = array('l.id','c.name','c.phone','d.name','b.Name'); //set column field database for datatable searchable 
        $order = array('l.id' => 'desc'); // default order 
        $this->db->select(  'l.id,
                            c.name,c.id as customer_id,
                            d.name as designation,
                            c.phone,
                            b.Name as bdm,
                            a.created_date'
                        );
        $this->db->from('customer c');
        $this->db->join('designation d','d.id=c.designation_id','left');
        $this->db->join('customer_leads l','l.customer_id=c.id','left');
        $this->db->join('assign a','a.lead_id=l.id','left');
        $this->db->join('users r','r.id=a.assign_ro','left');
        $this->db->join('users b','b.id=l.user_id','left');
        $this->db->join('stage st','st.id=l.stage_id','left');
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