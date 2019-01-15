<?php
class supplier_model extends CI_Model{


	 /*
     * Get Customers     */
	 function get_suppliers()
	 {
	 	$query = $this->db->query("select * from supplier");
	 	$row = array();
	 	if($query->num_rows() > 0){
            // $row = $query->result_array();
	 	}
	 	return $query->result();

	 }

	 public function get_supplier($id)
	 {
	 	$this->db->from('supplier');
	 	$this->db->where('sup_id',$id);
	 	$query = $this->db->get();

	 	return $query->row();
	 }

	 public function addSupplier($data)
	 {
	 	$this->db->insert('supplier', $data);
	 	$prd_id = $this->db->insert_id();
	 	return $prd_id;

	 }

	 public function updateSupplier($where, $data)
	 {
	 	$id=(int)($where);
	 	$this->db->where('sup_id',$id);
	 	$this->db->update('supplier', $data);
	 	$rows= $this->db->affected_rows();
	 	return $rows;
	 }

	 public function delete_supplier($id)
	 {
	 	$this->db->where('sup_id', $id);
	 	$this->db->delete('supplier');
	 }

	//Transaction.................................................
	 public function supplier_transaction($id)
	 {
	 	$this->db->from('transactions');
	 	$this->db->where('trans_id',$id);
	 	$query = $this->db->get();

	 	return $query->row();
	 }

	}
	?>