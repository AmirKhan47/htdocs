<?php
class Services_model extends CI_Model{

	function get_services(){
		$query=$this->db->query("select p.* , CONCAT( 'F-', LPAD(p.invoice_id,7,'0') ) as virtual_invoice from services p");
		return $query->result();
	}
	function get_detail($id){
		$query=$this->db->query("select p.* , CONCAT( 'Sr-',p.invoice_id ) as virtual_invoice from services p where service_id=$id ");
		return $query->row();
	}
	function get_serviceForInvoice($id){
		$query=$this->db->query("select distinct p.* , CONCAT( 'Sr-',p.invoice_id ) as virtual_invoice from services p where p.invoice_id=$id ");
		return $query->row();
	}

	function get_servicesDetailForInvoice($id){
		$query=$this->db->query("select p.* , s.prd_name from services_detail p left join store s on s.prd_id=p.prd_id where p.invoice_id=$id");
		return $query->result();
	}
	function get_services_detail($id){
		$query=$this->db->query("select p.* , s.prd_name from services_detail p left join store s on s.prd_id=p.prd_id where p.service_id=$id");
		return $query->result_array();
	}

	public function addServices()
	{
		date_default_timezone_set("Asia/karachi");
	 	// echo date("Y-m-d h:i A");

	 	// do transaction.........
		$data = array(
			'status' => 0,
			'trans_date' =>  date("Y-m-d h:i"),
			);

	 	// SELECT DATE_FORMAT(NOW(), '%Y-%m-%d %h:%i %p');
		$this->db->insert('transactions',$data);
		$invoice_id = $this->db->insert_id();

		$data = array(
			'date'  => $this->input->post('date'), 
			'time'  => $this->input->post('time'), 
			'invoice_id'  => $invoice_id, 
			'cust_name' => $this->input->post('cust_name'), 
			'contact_no' => $this->input->post('contact_number'), 
			'estimated_charges' => $this->input->post('charges'), 
			'problems' => $this->input->post('comments')
			);

		$this->db->insert('services',$data);
		$service_id=$this->db->insert_id();

	 	//Start of loop.......
		for($i=0;$i<sizeof($this->input->post('productname'));$i++){ 		
		  if($this->input->post('productname')[$i]!=''){
			$data = array(
				'service_id' => $service_id,
				'invoice_id' =>$invoice_id,
				'prd_id' => $this->input->post('productname')[$i],
	 			// 'prd_unique_id' => $this->input->post('productunique')[$i],
				'prd_qty' => $this->input->post('qty')[$i],
				'prd_price' => $this->input->post('price')[$i],
				'prd_vat' => $this->input->post('vatamount')[$i],
				'prd_total' => $this->input->post('totalprice')[$i]
				);
			
			$this->db->query("update store set status=1 , prd_qty=prd_qty-".$this->input->post('qty')[$i]."  where prd_id ='".$this->input->post('productname')[$i]."' ");
			$this->db->insert('services_detail',$data);
			}else{
				$data = array(
		        'sup_id'  => '1', 
		        'prd_name'  => $this->input->post('newProduct')[$i], 
		        'prd_qty' => $this->input->post('qty')[$i], 
		        'prd_category' => 'sale', 
		        'prd_sale_price' => $this->input->post('price')[$i], 
		        );
				$this->db->insert('store',$data);
				$prd_id=$this->db->insert_id();

				$data = array(
				'service_id' => $service_id,
				'invoice_id' =>$invoice_id,
				'prd_id' => $prd_id,
				'prd_qty' => $this->input->post('qty')[$i],
				'prd_price' => $this->input->post('price')[$i],
				'prd_vat' => $this->input->post('vatamount')[$i],
				'prd_total' => $this->input->post('totalprice')[$i]
				);
			
				$this->db->insert('services_detail',$data);
			}
		}//end of loop........

		return true;
	}
	public function updateServices()
	{
		
		$data = array(
			'date'  => $this->input->post('date'), 
			'time'  => $this->input->post('time'), 
			'invoice_id'  => $this->input->post('invoice_id'), 
			'cust_name' => $this->input->post('cust_name'), 
			'contact_no' => $this->input->post('contact_number'), 
			'estimated_charges' => $this->input->post('charges'), 
			'problems' => $this->input->post('comments') 
			);
		$this->db->where('service_id', $this->input->post('service_id'));
		$this->db->update('services',$data);

		//Quantity of exisiting invioice.......
		$query=$this->db->query("select prd_id, prd_qty from services_detail where service_id ='".$this->input->post('service_id')."' ");
	 	// $result=$query->result_array();
	 	foreach ($query->result_array() as $qty) {
		$this->db->query("update store set status=1, prd_qty=prd_qty+".$qty['prd_qty']." where prd_id ='".$qty['prd_id']."' ");
	 	}

	 	$this->db->where('service_id', $this->input->post('service_id'));
		$this->db->delete('services_detail');

	 	//Start of loop.......
		for($i=0;$i<sizeof($this->input->post('price'));$i++){ 		
		  if($this->input->post('productname')[$i]!=''){
			$data = array(
				'service_id' => $this->input->post('service_id'),
				'invoice_id' =>$this->input->post('invoice_id'),
				'prd_id' => $this->input->post('productname')[$i],
				'prd_qty' => $this->input->post('qty')[$i],
				'prd_price' => $this->input->post('price')[$i],
				'prd_vat' => $this->input->post('vatamount')[$i],
				'prd_total' => $this->input->post('totalprice')[$i]
				);
			
			$this->db->query("update store set status=1 , prd_qty=prd_qty-".$this->input->post('qty')[$i]."  where prd_id ='".$this->input->post('productname')[$i]."' ");
			$this->db->insert('services_detail',$data);
			}else{
				$data = array(
		        'sup_id'  => '1', 
		        'prd_name'  => $this->input->post('newProduct')[$i], 
		        'prd_qty' => $this->input->post('qty')[$i], 
		        'prd_category' => 'sale', 
		        'prd_sale_price' => $this->input->post('price')[$i], 
		        );
				$this->db->insert('store',$data);
				$prd_id=$this->db->insert_id();

				$data = array(
				'service_id' => $this->input->post('service_id'),
				'invoice_id' =>$this->input->post('invoice_id'),
				'prd_id' => $prd_id,
				'prd_qty' => $this->input->post('qty')[$i],
				'prd_price' => $this->input->post('price')[$i],
				'prd_vat' => $this->input->post('vatamount')[$i],
				'prd_total' => $this->input->post('totalprice')[$i]
				);
			
				$this->db->insert('services_detail',$data);
			}
		}//end of loop........

		return true;
	}
}
?>