<?php
class Payments_model extends CI_Model{
	
	function get_custRentinInvoice($id){
		//This wrong syntax generated alot of mess. spend 3 hours on this shit
		//$query = $this->db->query("select invoice_id,total_amount from rentin ri,customer c where c.cust_id=ri.cust_id and ri.status=0 and ri.cust_id="+$id);
		//-------------------------------------------------
		$query = $this->db->query("select CONCAT( 'F-', LPAD(invoice_id,7,'0') ) as virtual_invoice ,invoice_id ,total_amount from rentin ri,customer c where c.cust_id=ri.cust_id and ri.status=0 and ri.cust_id='".$id."'");
	 	// $row = array();
	 	// if($query->num_rows() > 0){
        //     // $row = $query->result_array();
	 	// }
		return $query->result();
	}

	public function addExpense()
	{
		if($this->input->post('trans_type')=='expense'){

		$data = array(
			// 'type' => 'expense',
			'payment_type' => 'Paid',
			'tr_date' => $this->input->post('date'),
			'tr_time'  => $this->input->post('tr_time'), 
			'bank_id' => $this->input->post('banks'),
			'description' => $this->input->post('remarks'),
			'total_amount' => $this->input->post('total_amount')
			);
		if($this->input->post('payment_mode')=='cash'){
			$data['tr_type']='cash';
			$this->db->query("update banks set bank_balance=bank_balance -".$this->input->post('total_amount')."  where bank_id ='".$this->input->post('banks')."' ");
	 	}else{
			$data['tr_type']='cheque';
			$data['cheque_no']=$this->input->post('cheque_no');
			$data['cheque_date']=$this->input->post('cheque_date');

	 	}

		$this->db->insert('bank_transactions',$data);
		$bt_id = $this->db->insert_id();

	 for ($i=0; $i < sizeof($this->input->post('amount')); $i++) { 
	 		# code...
	 		$data = array(
			'bt_id' => $bt_id,
			'type' => 'Expense',			
			'account_id' => $this->input->post('accounts')[$i],
			'description' => $this->input->post('description')[$i],
			'amount' => $this->input->post('amount')[$i],
			);
			$this->db->insert('bank_transactions_detail',$data);
			//updating status in rentin......
			// $this->db->query("update rentin set status=1 where invoice_id ='".$this->input->post('getInvoices')[$i]."' ");
	 	}
	 //End of Expense..........
	 	
	 }else{

		$actual_invoices=explode(',', $this->input->post('actual_Invoices'));
		// print_r($actual_invoices[0]);

	 	$data = array(
			'payment_type' => 'Paid',
			'tr_date' => $this->input->post('date'),
			'bank_id' => $this->input->post('banks'),
			'description' => $this->input->post('remarks'),
			'total_amount' => $this->input->post('total_amount')
			);

		if($this->input->post('payment_mode')=='cash'){
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
			'sup_id' => $this->input->post('suppliers'),
			'type' => 'Purchase',
			'invoice_id' => $actual_invoices[$i],
			'account_id' => $this->input->post('account_id')
			// 'discount' => $this->input->post('discount')

			);
			$this->db->insert('bank_transactions_detail',$data);
			//updating status ......
			// if($this->input->post('type')[$i]=='Rent-in'){
			$this->db->query("update purchase set status=1 where invoice_id ='".$actual_invoices[$i]."' ");
			// }else{
			// $this->db->query("update sale set status=1 where invoice_id ='".$actual_invoices[$i]."' ");
			// }
	 	}
	 }
	return true; 		
	}
}
?>