<?php
class Receipts_model extends CI_Model{
	
	function get_custRentinInvoice($id){
		//This wrong syntax generated alot of mess. spend 3 hours on this shit
		//$query = $this->db->query("select invoice_id,total_amount from rentin ri,customer c where c.cust_id=ri.cust_id and ri.status=0 and ri.cust_id="+$id);
		//-------------------------------------------------
		$query = $this->db->query("select CONCAT( 'RI-', invoice_id ) as virtual_invoice ,invoice_id ,total_amount , in_date , 'Rent-in' as type from rentin ri,customer c where c.cust_id=ri.cust_id and ri.status=0 and ri.cust_id=".$id."
		union
		select CONCAT( 'S-', invoice_id ) as virtual_invoice ,invoice_id ,total_amount , date , 'Sale' as type from sale s ,customer c where c.cust_id=s.customer_id and s.status=0 and s.customer_id=".$id." ");
	 	// if($query->num_rows() > 0){
        //     // $row = $query->result_array();
	 	// }
		return $query->result();
	}

		function getSupInvoices($id){
		//This wrong syntax generated alot of mess. spend 3 hours on this shit
		//$query = $this->db->query("select invoice_id,total_amount from rentin ri,customer c where c.cust_id=ri.cust_id and ri.status=0 and ri.cust_id="+$id);
		//-------------------------------------------------
		$query = $this->db->query("select CONCAT( 'P-', invoice_id ) as virtual_invoice ,invoice_id ,total_amount , date , 'Purchase' as type from purchase p,supplier s where s.sup_id=p.sup_id and p.status=0 and p.sup_id=".$id." ");
		return $query->result();
	}

	public function updateRentIn()
	{
		$actual_invoices=explode(',', $this->input->post('actual_Invoices'));
		$actual_types=explode(',', $this->input->post('actual_types'));

		// if($this->input->post('trans_type')=='customer'){
		
		if($this->input->post('By')=='ref'){

		$query = $this->db->query("update customer set cust_received_amount = ".$this->input->post('received_amount')." where cust_id = ".$this->input->post('cust_name')." ");
        $rows= $this->db->affected_rows();
        
        for ($i=0; $i < sizeof($actual_invoices); $i++) { 
	 		echo $actual_types[$i];
			//updating status ......
			if($actual_types[$i]=='Rent-in'){
			$this->db->query("update rentin set status=1 where invoice_id ='".$actual_invoices[$i]."' ");
			}else{
			$this->db->query("update sale set status=1 where invoice_id ='".$actual_invoices[$i]."' ");
			}
	 	}

		}else{

		$data = array(
			// 'invoice_id' => $actual_invoices[$i], 
			// 'type' => 'rentIn',
			'payment_type' => 'Received',
			'tr_date' => $this->input->post('date'),
			'bank_id' => $this->input->post('banks'),
			'description' => $this->input->post('description'),
			'total_amount' => $this->input->post('total_amount')
			);
		if($this->input->post('receipt_mode')=='cash'){
			$data['tr_type']='cash';
	 	}else{
			$data['tr_type']='cheque';
			$data['cheque_no']=$this->input->post('cheque_no');
			$data['cheque_date']=$this->input->post('cheque_date');
	 	}

		$this->db->insert('bank_transactions',$data);
		$bt_id = $this->db->insert_id();

	 for ($i=0; $i < sizeof($actual_invoices); $i++) { 
	 		# code...
	 		$data = array(
			'bt_id' => $bt_id,
			'cust_id' => $this->input->post('cust_name'),
			'type' => $this->input->post('type')[$i],
			'invoice_id' => $actual_invoices[$i],
			'account_id' => $this->input->post('accounts'),
			'discount' => $this->input->post('discount')

			);
			$this->db->insert('bank_transactions_detail',$data);
			//updating status ......
			if($this->input->post('type')[$i]=='Rent-in'){
			$this->db->query("update rentin set status=1 where invoice_id ='".$actual_invoices[$i]."' ");
			}else{
			$this->db->query("update sale set status=1 where invoice_id ='".$actual_invoices[$i]."' ");
			}
	 	}
	 		if($this->input->post('receipt_mode')=='cash'){
			//updating bank balance......
			$this->db->query("update banks set bank_balance=bank_balance +".$this->input->post('total_amount')."  where bank_id ='".$this->input->post('banks')."' ");
			}
	 }
	
	// }else{
	// 		$data = array(
	// 		// 'invoice_id' => $actual_invoices[$i], 
	// 		// 'type' => 'rentIn',
	// 		'payment_type' => 'Paid',
	// 		'tr_date' => $this->input->post('date'),
	// 		'bank_id' => $this->input->post('banks'),
	// 		'description' => $this->input->post('description'),
	// 		'total_amount' => $this->input->post('total_amount')
	// 		);
	// 	if($this->input->post('receipt_mode')=='cash'){
	// 		$data['tr_type']='cash';
	//  	}else{
	// 		$data['tr_type']='cheque';
	// 		$data['cheque_no']=$this->input->post('cheque_no');
	// 		$data['cheque_date']=$this->input->post('cheque_date');
	//  	}

	// 	$this->db->insert('bank_transactions',$data);
	// 	$bt_id = $this->db->insert_id();

	//  for ($i=0; $i < sizeof($actual_invoices); $i++) { 
	//  		# code...
	//  		$data = array(
	// 		'bt_id' => $bt_id,
	// 		'sup_id' => $this->input->post('suppliers'),
	// 		'type' => $this->input->post('type')[$i],
	// 		'invoice_id' => $actual_invoices[$i],
	// 		'account_id' => $this->input->post('accounts'),
	// 		'discount' => $this->input->post('discount')

	// 		);
	// 		$this->db->insert('bank_transactions_detail',$data);
	// 		//updating status ......
	// 		// if($this->input->post('type')[$i]=='Rent-in'){
	// 		$this->db->query("update purchase set status=1 where invoice_id ='".$actual_invoices[$i]."' ");
	// 		// }else{
	// 		// $this->db->query("update sale set status=1 where invoice_id ='".$actual_invoices[$i]."' ");
	// 		// }
	//  	}

	// }

	return true; 		
	}

	public function receivedAmount()
	{
		
		$data = array(
		'status' => 0,
		'trans_date' =>  date("Y-m-d h:i"),
		);

	 	// SELECT DATE_FORMAT(NOW(), '%Y-%m-%d %h:%i %p');
		$this->db->insert('transactions',$data);
		$invoice_id = $this->db->insert_id();
		# code...
		$data = array(
		'payment_type' => 'Received',
		'tr_date' => $this->input->post('received_date'),
		'bank_id' => $this->input->post('bank_id'),
		// 'description' => $this->input->post('description'),
		'total_amount' => $this->input->post('cust_received_amount')
		);

		$this->db->insert('bank_transactions',$data);
		$bt_id = $this->db->insert_id();

		$data = array(
		'bt_id' => $bt_id,
		'cust_id' => $this->input->post('cust_id'),
		'type' => 'General',
		'invoice_id' => $invoice_id,
		'account_id' => $this->input->post('account_id')
		// 'discount' => $this->input->post('discount')
		);
		$this->db->insert('bank_transactions_detail',$data);

		$query = $this->db->query("update customer set total_credit = total_credit - ".$this->input->post('cust_received_amount').", cust_received_amount = cust_received_amount + ".$this->input->post('cust_received_amount')." where cust_id = ".$this->input->post('cust_id')." ");

        // $this->db->where('cust_id',$this->input->post('cust_id'));
        // $this->db->update('customer', $data);
        $rows= $this->db->affected_rows();
        return $invoice_id;
	}

	function get_detail($id){

		$query=$this->db->query("select * from bank_transactions_detail where invoice_id=".$id. " ");
		$result=$query->row();

		$query=$this->db->query("select bt.* , CONCAT( 'G-', ".$id." ) as virtual_invoice from bank_transactions bt  where bt_id=".$result->bt_id. " ");
		$result2=$query->row();

		$query=$this->db->query("select * from customer where cust_id=".$result->cust_id. " ");
		$result3=$query->row();

		$data = array(
			'virtual_invoice' => $result2->virtual_invoice, 
			'amount' => $result2->total_amount, 
			'credit' => $result3->total_credit, 
			'name' => $result3->cust_name, 
			'address' => $result3->cust_location, 
			'contact_no' => $result3->cust_contact, 
			'tr_no' => $result3->trn_no
			);
		return $data;
	}
}
?>