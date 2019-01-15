<?php

class Store_Model extends CI_Model 
{

    var $table = 'store';
    var $column_order = array('prd_name','prd_category','prd_brand','prd_qty',null); //set column field database for datatable orderable
    var $column_search = array('prd_name','prd_category','prd_brand'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('prd_id' => 'desc'); // default order 
    //for damage....
    var $column_order_damage = array('prd_name','prd_unique_id','date','prd_qty',null); //set column field database for datatable orderable
    var $column_search_damage = array('prd_name','prd_unique_id','date'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order_damage = array('prd_id' => 'desc'); // default order 
    /*
     * Briliant functioanlity for live ajax search
    */
    private function _get_datatables_query()
    {

        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
                }
                $i++;
            }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    /*
     * Get Products
     */
    function get_products()
    {
        // $this->_get_datatables_query();
        // if($_POST['length'] != -1)
        //     $this->db->limit($_POST['length'], $_POST['start']);
        // $query = $this->db->get();
        $query =  $this->db->query('SELECT s.*,su.sup_name FROM store s left join supplier su on s.sup_id=su.sup_id where s.status=1 ');
        return $query->result();
    }

    function get_sale_products()
    {
        $query =  $this->db->query('SELECT s.*,su.sup_name FROM store s left join supplier su on s.sup_id=su.sup_id where s.status=1 and s.prd_category="sale" ');
        return $query->result();
    
    }

        function get_all_products()
    {
        $query =  $this->db->query('SELECT s.*,su.sup_name FROM store s left join supplier su on s.sup_id=su.sup_id where s.prd_category="sale"');
        return $query->result();
    
    }

        function get_rent_products()
    {
        $query =  $this->db->query('SELECT s.*,su.sup_name FROM store s left join supplier su on s.sup_id=su.sup_id where s.status=1 and s.prd_category="rent" ');
        return $query->result();
    }

    function getProductDetail($id)
    {
        
        // $this->db->from($this->table);
        // $this->db->where('prd_id',$id);
        // $query = $this->db->get();
        $query =  $this->db->query('SELECT s.*,(select count(*) from productuniqueids where prd_id='.$id.' limit 1) as idExisit FROM store s where prd_id='.$id.' ');
        return $query->row();

    }    /*
     * Get Damage Products
     */
    function get_damage_products()
    {
        $query = $this->db->query("select dp.*,s.prd_name from damageproducts dp 
                left join store s on s.prd_id = dp.prd_id where dp.status=0");
        $row = array();
        if($query->num_rows() > 0){
            // $row = $query->result_array();
        }
        return $query->result();

    }
    function get_damage_products_with_id($id)
    {
        $query = $this->db->query("select dp.*,s.prd_name,(case when prd_unique_id = '' then 'none' else prd_unique_id end) as uniq from damageproducts dp 
                left join store s on s.prd_id = dp.prd_id where dp.dp_id=".$id);
        return $query->row();

    }

    /*
     * Get Damage Material List
    */
    function get_material_list($id)
    {
        $query = $this->db->query("select ddp.*,s.prd_name,CONCAT( 'DP-', ddp.dp_id ) as virtual_id  from 
                detail_damage_product ddp 
                left join store s on s.prd_id = ddp.mat_id where ddp.dp_id='".$id."' ");
        $row = array();
        if($query->num_rows() > 0){
            // $row = $query->result_array();
        }
        return $query->result_array();

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

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('prd_id',$id);
        $query = $this->db->get();

        return $query->row();
    }
    // public function get_detail_damage_product($id)
    // {
    //     $query = $this->db->query("select ddp.*,s.prd_name  from 
    //             detail_damage_product ddp 
    //             left join store s on s.prd_id = ddp.mat_id where ddp.dp_id='".$id."' ");

    //     return $query->result_array();
    // }
    public function get_by_id_damage($id)
    {
        $query = $this->db->query("select dp.*,s.prd_name from damageproducts dp 
                left join store s on s.prd_id = dp.prd_id where dp_id='".$id."' ");
        // $row = array();
        if($query->num_rows() > 0){
            // $row = $query->result_array();
        }
        // return $query->result();
        // $this->db->from('damageproducts');
        // $this->db->where('dp_id',$id);
        // $query = $this->db->get();

        return $query->row();
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

    public function addProduct($data)
    {
        $this->db->insert($this->table, $data);
        $prd_id = $this->db->insert_id();
        if($this->db->affected_rows() >0) {
        $ids = explode(',', $this->input->post('uniqueIdValue'));
        if($ids[0]!=''){
        foreach ($ids as $value) {
            # code...
            $data = array(
            'prd_id' => $prd_id,
            'prd_unique_id'=>$value
            );
            $this->db->insert('productuniqueids', $data);
        }

        }
        }else{

        }
        return $prd_id;
        
    }

    public function addDamageProduct($data,$qty,$id)
    {
        $this->db->insert('damageproducts', $data);
        $prd_id = $this->db->insert_id();
        
        if($this->input->post('unique_id')!="" ){
            $query = $this->db->query("update store set prd_qty=prd_qty-1 where prd_id='".$id."' ");
            $query = $this->db->query("update productuniqueids set status=0 where prd_unique_id='".$this->input->post('unique_id')."' ");            
        }else{
            $query = $this->db->query("update store set prd_qty=prd_qty-".$qty." where prd_id='".$id."' ");            
        }

        $query = $this->db->query("select * from store where prd_id='".$id."' ");
        $data=$query->row();
            if($data->prd_qty==0){
            $query = $this->db->query("update store set status=0 where prd_id='".$id."' ");    
            }

        return $prd_id;
        
    }
    public function damage_product_update()
    {
        $query = $this->db->query("update damageproducts set status=1 where dp_id='".$this->input->post('dp_id')."' ");            
        
        if($this->input->post('dunique_id')!="" ){
            $query = $this->db->query("update store set prd_qty=prd_qty+1 where prd_id='".$this->input->post('dprd_id')."' ");            
            $query = $this->db->query("update productuniqueids set status=1 where prd_unique_id='".$this->input->post('dunique_id')."' ");            
            
        }else{
            $query = $this->db->query("update store set prd_qty=prd_qty+".$this->input->post('dprd_qty')." where prd_id='".$this->input->post('dprd_id')."' ");            
        }
        
        $query = $this->db->query("update store set status=1 where prd_id='".$this->input->post('dprd_id')."' ");    

        return true;
        
    }

    public function addDamageProductMaterial($data,$price,$id,$qty)
    {
        $this->db->insert('detail_damage_product', $data);
        $prd_id = $this->db->insert_id();
        $query = $this->db->query("update store set prd_qty=prd_qty-".$qty." where prd_id='".$id."' ");
        return $prd_id;
        
    }
    public function updateProduct($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        $rows= $this->db->affected_rows();

        $this->db->delete('productuniqueids', $where);

        $ids = explode(',', $this->input->post('uniqueIdValue'));
        if($ids[0]!=''){
        foreach ($ids as $value) {
            # code...
            $data = array(
            'prd_id' => $where['prd_id'],
            'prd_unique_id'=>$value
            );
            $this->db->insert('productuniqueids', $data);
        }
        }else{

        }
        return $rows;
    }

    public function updateDamageProduct($where, $data)
    {
        $id=(int)($where);
        $this->db->where('dp_id=', $id);
        $this->db->update('damageproducts', $data);
        $rows= $this->db->affected_rows();
        return $rows;
    }

    public function delete_by_id($id)
    {
        $this->db->where('prd_id', $id);
        $this->db->delete($this->table);
    }

    public function delete_damage_product_detail($id)
    {
        $ddp=(int)($id);
        $this->db->where('ddp_id', $ddp);
        $this->db->delete('detail_damage_product');
    }

    /*
     * Get get Class
     */
    public function get_class()
    {

        $query = $this->db->query("select Distinct prd_class from store ");
        // $query = $this->db->get("general_directory");
        //$row = array();
        // if($query->num_rows() > 0){
            return $query->result_array();
        // }
        // return $this->result_array();
    }

    /*
     * Get Rental Products
     */
    public function get_rental_products()
    {

        $this->db->select('prd_id,prd_name,prd_qty');
        $this->db->where('prd_category', 'rent');
        $query = $this->db->get($this->table);
        // $query = $this->db->get("general_directory");
        //$row = array();
        // if($query->num_rows() > 0){
            return $query->result_array();
        // }
        // return $this->result_array();
    }

    /*
     * Get Sale Products
     */
    // public function get_sale_products()
    // {

    //     $this->db->select('prd_id,prd_name,prd_qty,prd_cost_price,prd_sale_price');
    //     $this->db->where('prd_category', 'sale');
    //     $query = $this->db->get($this->table);
    //     // $query = $this->db->get("general_directory");
    //     //$row = array();
    //     // if($query->num_rows() > 0){
    //         return $query->result_array();
    //     // }
    //     // return $this->result_array();
    // }

}
?>