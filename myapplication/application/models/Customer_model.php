<?php

class Customer_Model extends CI_Model 
{

    
    /*
     * Get Customers     */
    function get_customers()
    {
        $query = $this->db->query("select * from customer");
        $row = array();
        if($query->num_rows() > 0){
            // $row = $query->result_array();
        }
        return $query->result();

    }

    /*
     * Get Customers     */
    function customerDetail($id)
    {
        $query = $this->db->query("select * from customer where cust_id='".$id."'");
        $row = array();
        if($query->num_rows() > 0){
            // $row = $query->result_array();
        }
        return $query->row();

    }

        function get_persons($id)
    {
        $query = $this->db->query("select * from authorize_persons where cust_id='".$id."'");
        $row = array();
        if($query->num_rows() > 0){
            // $row = $query->result_array();
        }
        return $query->result();

    }

    /*
     * Get Damage Material List
    */
    function get_material_list($id)
    {
        $query = $this->db->query("select ddp.*,s.prd_name  from 
                detail_damage_product ddp 
                left join store s on s.prd_id = ddp.mat_id where ddp.dp_id='".$id."' ");
        $row = array();
        if($query->num_rows() > 0){
            // $row = $query->result_array();
        }
        return $query->result();

    }

        function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    //for damage products.....
    function count_filtered_damage()
    {
        $this->_get_datatables_query_damage();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_damage()
    {
        $this->db->from('damageproducts');
        return $this->db->count_all_results();
    }

    public function get_customer($id)
    {
        $this->db->from('customer');
        $this->db->where('cust_id',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_authorizePerson($id)
    {
        $this->db->from('authorize_persons');
        $this->db->where('ap_id',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_agrement($id)
    {
        $this->db->from('customer_agrement');
        $this->db->where('cust_id',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_equipments($id)
    {
        $this->db->from('equipment_agrement');
        $this->db->where('cust_id',$id);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_product_uniqueids($id)
    {
        $this->db->from('productuniqueids');
        $this->db->where('prd_id',$id);
        $query = $this->db->get();

        return $query->result_array();
    }
     public function get_product_qty($id)
    {   
        $this->db->select('prd_qty,prd_cost_price,prd_sale_price');
        $this->db->from('store');
        $this->db->where('prd_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function addCustomer($data)
    {
        $this->db->insert('customer', $data);
        $prd_id = $this->db->insert_id();
        $data2 = array(
        'cust_id'  => $prd_id, 
        );
        $this->db->insert('customer_agrement',$data2);
        return $prd_id;
        
    }

    public function addPerson($data)
    {
        $this->db->insert('authorize_persons', $data);
        $prd_id = $this->db->insert_id();
        return $prd_id;
        
    }

    public function updateCustomer($where, $data)
    {
    	$id=(int)($where);
        $this->db->where('cust_id',$id);
        $this->db->update('customer', $data);
        $rows= $this->db->affected_rows();
        return $rows;
    }
    public function updatePerson($where, $data)
    {
        $id=(int)($where);
        $this->db->where('ap_id',$id);
        $this->db->update('authorize_persons', $data);
        $rows= $this->db->affected_rows();
        return $rows;
    }
    //update agrement detail.......
    public function customerAgrement($where, $data)
    {
        $id=(int)($where);
        $this->db->where('cust_id',$id);
        $this->db->update('customer_agrement', $data);
        $rows= $this->db->affected_rows();
        $this->db->where('cust_id', $id);
        $this->db->delete('equipment_agrement');

       for ($i=0; $i < sizeof($this->input->post('equipment')) ; $i++) { 
           # code...
        $data = array(
        'cust_id'  => $where, 
        'equipment_name'  => $this->input->post('equipment')[$i], 
        'rent_per_day'  => $this->input->post('rent_per_day')[$i], 
        'rent_per_month'  => $this->input->post('rent_per_month')[$i]
        );
        $this->db->insert('equipment_agrement', $data);
       }
        return $rows;
    }

    public function delete_customer($id)
    {
        $this->db->where('cust_id', $id);
        $this->db->delete('customer');
    }

    public function delete_person($id)
    {
        $this->db->where('ap_id', $id);
        $this->db->delete('authorize_persons');
    }

    public function delete_damage_product_detail($id)
    {
        $ddp=(int)($id);
        $this->db->where('ddp_id', $ddp);
        $this->db->delete('detail_damage_product');
    }

}
?>