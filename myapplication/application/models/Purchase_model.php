<?php
class Purchase_model extends CI_Model{

	function get_purchases(){
		$query=$this->db->query("select p.* , CONCAT( 'P-', p.invoice_id ) as virtual_invoice , s.sup_name from purchase p left join supplier s on p.sup_id=s.sup_id");
		return $query->result();
	}

	function get_detail($id){
		$query=$this->db->query("select p.*,s.*, CONCAT( 'P-', p.invoice_id ) as virtual_invoice,u.user_name from purchase p left join supplier s on p.sup_id = s.sup_id left join users u on p.saleman = u.user_id where p.invoice_id=$id ");
		return $query->row();
	}

	function get_purchase_detail($id){
		$query=$this->db->query("select p.* , s.prd_name from purchase_detail p left join store s on s.prd_id=p.prd_id where p.invoice_id=$id");
		return $query->result_array();
	}

	public function addPurchase()
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
			'sup_id' => $this->input->post('sup_name'), 
			'saleman' => $this->input->post('salesman'), 
			'address' => $this->input->post('address'), 
			// 'sup_business_name' => $this->input->post('sup_business_name'), 
			'contact_no' => $this->input->post('cust_contact'),
			'payment_type' => $this->input->post('payment_type'),
			'net_amount' => $this->input->post('net_amount'),
			'discount' => $this->input->post('discount'),
			'total_amount' => $this->input->post('total_amount'),
			'vat_amount' => $this->input->post('vat_amount'),
			'sup_invoice_no' => $this->input->post('sup_invoice_no'), 
			// 'amountReceived' => $this->input->post('amountReceived'), 
			'remarks' => $this->input->post('remarks')
			// 'amountReturned' => $this->input->post('amountReturned') 
			);

		if($this->input->post('payment_type')!='credit'){
			$data['bank_id']=$this->input->post('banks');
		}
		$this->db->insert('purchase',$data);
		$purchase_id=$this->db->insert_id();

	 	//Start of loop.......
		for($i=0;$i<sizeof($this->input->post('price'));$i++){ 		
		  if($this->input->post('productname')[$i]!=''){
			$data = array(
				'purchase_id' => $purchase_id,
				'invoice_id' =>$invoice_id,
				'prd_id' => $this->input->post('productname')[$i],
	 			// 'prd_unique_id' => $this->input->post('productunique')[$i],
				'prd_qty' => $this->input->post('qty')[$i],
	 			// 'original_qty' => $this->input->post('qty')[$i],
				'prd_price' => $this->input->post('price')[$i],
				'prd_vat' => $this->input->post('vatamount')[$i],
				'prd_total' => $this->input->post('totalprice')[$i]
				);
			
			$this->db->query("update store set status=1 , prd_qty=prd_qty+".$this->input->post('qty')[$i]." , prd_sale_price=".$this->input->post('price')[$i]." where prd_id ='".$this->input->post('productname')[$i]."' ");
			$this->db->insert('purchase_detail',$data);
			}else{
				$data = array(
		        'sup_id'  => $this->input->post('sup_name'), 
		        'prd_name'  => $this->input->post('newProduct')[$i], 
		        'prd_qty' => $this->input->post('qty')[$i], 
		        'prd_category' => 'sale', 
		        'prd_sale_price' => $this->input->post('price')[$i], 
		        );
				$this->db->insert('store',$data);
				$prd_id=$this->db->insert_id();

				$data = array(
				'purchase_id' => $purchase_id,
				'invoice_id' =>$invoice_id,
				'prd_id' => $prd_id,
				'prd_qty' => $this->input->post('qty')[$i],
				'prd_price' => $this->input->post('price')[$i],
				'prd_vat' => $this->input->post('vatamount')[$i],
				'prd_total' => $this->input->post('totalprice')[$i]
				);
			
				$this->db->insert('purchase_detail',$data);
			}
		}//end of loop........

		if($this->input->post('payment_type')!='credit'){
			$data = array(
				'type' => 'sale',
				'payment_type' => 'Paid',
				'tr_date' => date("Y-m-d"),
				'tr_type' => 'cash',
				'bank_id' => $this->input->post('banks'),
				'total_amount' => $this->input->post('total_amount')
				);

			$this->db->insert('bank_transactions',$data);
			$bt_id = $this->db->insert_id();

		 		# code...
			$data = array(
				'bt_id' => $bt_id,
				'sup_id' => $this->input->post('sup_name'),
				'invoice_id' => $invoice_id,
				);
			$this->db->insert('bank_transactions_detail',$data);
				//updating bank balance......
			$this->db->query("update banks set bank_balance=bank_balance -".$this->input->post('total_amount')."  where bank_id ='".$this->input->post('banks')."' ");
			$this->db->query("update supplier set total_credit=total_credit - ".$this->input->post('old_balance')." where sup_id ='".$this->input->post('sup_name')."' ");
			// $this->db->query("update supplier set total_credit=0 where sup_id ='".$this->input->post('sup_name')."' ");
		}else{
			// $totaal=$this->input->post('total_amount')-$this->input->post('old_balance');
			$this->db->query("update supplier set total_credit= total_credit + ".$this->input->post('total_amount')." where sup_id ='".$this->input->post('sup_name')."' ");
			// $this->db->query("update supplier set total_credit=".$this->input->post('total_amount')." where sup_id ='".$this->input->post('sup_name')."' ");
		}

		return true;
	}

	function getAllSuppliers(){	
		$query = $this->db->query("select distinct p.sup_id,s.sup_name from purchase p left join supplier s on p.sup_id=s.sup_id");
		return $query->result();
	}

	public function updatePurchase()
	{
		
		$data = array(
			'date'  => $this->input->post('date'), 
			'time'  => $this->input->post('time'), 
			'invoice_id'  => $invoice_id, 
			'sup_id' => $this->input->post('sup_name'), 
			'saleman' => $this->input->post('salesman'), 
			'address' => $this->input->post('address'), 
			'contact_no' => $this->input->post('cust_contact'),
			'payment_type' => $this->input->post('payment_type'),
			'net_amount' => $this->input->post('net_amount'),
			'discount' => $this->input->post('discount'),
			'total_amount' => $this->input->post('total_amount'),
			'vat_amount' => $this->input->post('vat_amount'),
			'sup_invoice_no' => $this->input->post('sup_invoice_no'), 
			'amountReceived' => $this->input->post('amountReceived'), 
			'remarks' => $this->input->post('remarks'), 
			'amountReturned' => $this->input->post('amountReturned') 
			);

		if($this->input->post('payment_type')!='credit'){
			$data['bank_id']=$this->input->post('banks');
		}

		$this->db->where('purchase_id', $this->input->post('purchase_id'));
		$this->db->update('purchase',$data);
		// $this->db->insert('purchase',$data);
		// $purchase_id=$this->db->insert_id();

		//Quantity of exisiting invioice.......
		$query=$this->db->query("select prd_id, prd_qty from purchase_detail where purchase_id ='".$this->input->post('purchase_id')."' ");
	 	// $result=$query->result_array();
	 	foreach ($query->result_array() as $qty) {
		$this->db->query("update store set status=1, prd_qty=prd_qty+".$qty['prd_qty']." where prd_id ='".$qty['prd_id']."' ");
	 	}

	 	$this->db->where('purchase_id', $this->input->post('purchase_id'));
		$this->db->delete('purchase_detail');

	 	//Start of loop.......
		for($i=0;$i<sizeof($this->input->post('price'));$i++){ 		
		  if($this->input->post('productname')[$i]!=''){
			$data = array(
				'purchase_id' => $this->input->post('purchase_id'),
				'invoice_id' =>$this->input->post('invoice_id'),
				'prd_id' => $this->input->post('productname')[$i],
	 			// 'prd_unique_id' => $this->input->post('productunique')[$i],
				'prd_qty' => $this->input->post('qty')[$i],
	 			// 'original_qty' => $this->input->post('qty')[$i],
				'prd_price' => $this->input->post('price')[$i],
				'prd_vat' => $this->input->post('vatamount')[$i],
				'prd_total' => $this->input->post('totalprice')[$i]
				);
			
			$this->db->query("update store set status=1 , prd_qty=prd_qty+".$this->input->post('qty')[$i]." , prd_sale_price=".$this->input->post('price')[$i]." where prd_id ='".$this->input->post('productname')[$i]."' ");
			$this->db->insert('purchase_detail',$data);
			}else{
				$data = array(
		        'sup_id'  => $this->input->post('sup_name'), 
		        'prd_name'  => $this->input->post('newProduct')[$i], 
		        'prd_qty' => $this->input->post('qty')[$i], 
		        'prd_category' => 'sale', 
		        'prd_sale_price' => $this->input->post('price')[$i], 
		        );
				$this->db->insert('store',$data);
				$prd_id=$this->db->insert_id();

				$data = array(
				'purchase_id' => $this->input->post('purchase_id'),
				'invoice_id' =>$this->input->post('invoice_id'),
				'prd_id' => $prd_id,
				'prd_qty' => $this->input->post('qty')[$i],
				'prd_price' => $this->input->post('price')[$i],
				'prd_vat' => $this->input->post('vatamount')[$i],
				'prd_total' => $this->input->post('totalprice')[$i]
				);
			
				$this->db->insert('purchase_detail',$data);
			}
		}//end of loop........


		$query=$this->db->query("select bt_id from bank_transactions_detail where invoice_id ='".$this->input->post('invoice_id')."' ");
		$temp=$query->row();
		$this->db->where('bt_id', $temp->bt_id);
		$this->db->delete('bank_transactions_detail');
		//bank_trans.........
		$query=$this->db->query("select * from bank_transactions where bt_id ='".$temp->bt_id."' ");
		$temp2=$query->row();
		if($temp2->tr_type=='cash'){
		$this->db->query("update banks set bank_balance=bank_balance +".$temp2->total_amount."  where bank_id ='".$temp2->bank_id."' ");
		}
		$this->db->where('bt_id', $temp->bt_id);
		$this->db->delete('bank_transactions');


		if($this->input->post('payment_type')!='credit'){
			$data = array(
				'type' => 'sale',
				'payment_type' => 'Paid',
				'tr_date' => date("Y-m-d"),
				'tr_type' => 'cash',
				'bank_id' => $this->input->post('banks'),
				'total_amount' => $this->input->post('total_amount')
				);

			$this->db->insert('bank_transactions',$data);
			$bt_id = $this->db->insert_id();

		 		# code...
			$data = array(
				'bt_id' => $bt_id,
				'sup_id' => $this->input->post('sup_name'),
				'invoice_id' => $invoice_id,
				);
			$this->db->insert('bank_transactions_detail',$data);
				//updating bank balance......
			$this->db->query("update banks set bank_balance=bank_balance -".$this->input->post('total_amount')."  where bank_id ='".$this->input->post('banks')."' ");
			$this->db->query("update supplier set total_credit=total_credit - ".$this->input->post('old_balance')." where sup_id ='".$this->input->post('sup_name')."' ");
			// $this->db->query("update supplier set total_credit=0 where sup_id ='".$this->input->post('sup_name')."' ");
		}else{
			$this->db->query("update supplier set total_credit= total_credit + ".$this->input->post('total_amount')." where sup_id ='".$this->input->post('sup_name')."' ");
			// $this->db->query("update supplier set total_credit=".$this->input->post('total_amount')." where sup_id ='".$this->input->post('sup_name')."' ");
			// $totaal=$this->input->post('total_amount')-$this->input->post('old_balance');
			// $this->db->query("update supplier set total_credit=total_credit+".$totaal." where sup_id ='".$this->input->post('sup_name')."' ");
		}

		return true;
	}
	
	public function delete_purchase($id)
	{
		$query=$this->db->query("select * from purchase_detail where invoice_id ='".$id."' ");
		$result=$query->result();
		foreach ($result as $value) {
			# code...
			$this->db->query("update store set prd_qty=prd_qty-".$value->prd_qty." where prd_id ='".$value->prd_id."' ");
		}

		$query=$this->db->query("select * from purchase where invoice_id ='".$id."' ");
		$result=$query->row();
		$type= $result->payment_type ;

		if($type=='cash'){
		$query=$this->db->query("select * from bank_transactions_detail where invoice_id ='".$id."' ");
		$temp=$query->row();

		$query=$this->db->query("select * from bank_transactions where bt_id ='".$temp->bt_id."' ");
		$temp2=$query->row();

		$this->db->query("update banks set bank_balance=bank_balance + ".$temp2->total_amount."  where bank_id ='".$temp2->bank_id."' ");
			$this->db->where('invoice_id', $id);
			$this->db->delete('bank_transactions_detail');
			$this->db->where('bt_id', $temp2->bt_id);
			$this->db->delete('bank_transactions');
		}else{
			// echo 'gerere';
			$this->db->query("update supplier set total_credit=total_credit - ".$result->total_amount." where sup_id ='".$result->sup_id."' ");
		}

		//sale deletion.......
		$this->db->where('invoice_id', $id);
		$this->db->delete('purchase');
		$this->db->where('invoice_id', $id);
		$this->db->delete('purchase_detail');
		return ;
	}



	function get_bank($id){
		$this->db->select('*');
		$this->db->where('bank_id',$id);
		$query = $this->db->get("banks");
		$row = array();
		if($query->num_rows() > 0){
			$row = $query->row_array();
		}
		return $row;
	}

	function bank_transactions($id){
		$this->db->select('*');
		$this->db->where('bank_id',$id);
		$query = $this->db->get("bank_transactions");
		$row = array();
		if($query->num_rows() > 0){
			$row = $query->result_array();
		}
		return $row;
	}

	function account_transactions($id){
		$query = $this->db->query("select btd.* , (select tr_date from bank_transactions where btd.bt_id=bt_id) as tr_date from bank_transactions_detail btd where btd.account_id=$id");
		return $query->result_array();
	}

	function get_accounts(){
		$this->db->select('*');
		$query = $this->db->get("bank_account");
		$row = array();
		if($query->num_rows() > 0){
			$row = $query->result();
		}
		return $row;
	}

	function get_account($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get("bank_account");
		$row = array();
		if($query->num_rows() > 0){
			$row = $query->row_array();
		}
		return $row;
	}

	public function addAccount($data)
	{
		$this->db->insert('bank_account', $data);
		$bank_id = $this->db->insert_id();
		return $bank_id;

	}

	public function updateAccount($where, $data)
	{
		$id=(int)($where);
		$this->db->where('id',$id);
		$this->db->update('bank_account', $data);
		$rows= $this->db->affected_rows();
		return $rows;
	}

	public function delete_account($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('bank_account');
	}
	
	public function deleteCheque($id)
	{
		$this->db->where('cheque_no', $id);
		$this->db->delete('bank_transactions');
	}

	public function incomingCheques(){
		$query = $this->db->query("select cheque_status,cheque_no,cheque_date from bank_transactions where payment_type='Received' and cheque_status!=1 ");
		return $query->result_array();
	}

	public function outgoingCheques(){
		$query = $this->db->query("select cheque_status,cheque_no,cheque_date from bank_transactions where payment_type='Paid' and cheque_status!=1 ");
		return $query->result_array();
	}

	public function clearCheck(){

		if($this->input->post('cheque_status')=='Received'){
			$data = array(
				'type' => 'cheque',
				'payment_type' => 'Received',
				'tr_date' => date("Y-m-d"),
				'bank_id' => $this->input->post('banks'),
				'tr_type' => 'cash',
				'total_amount' => $this->input->post('cheque_amount')
				);

			$this->db->insert('bank_transactions',$data);
			$query = $this->db->query("update banks set bank_balance=bank_balance + ".$this->input->post('cheque_amount')." where bank_id='".$this->input->post('banks')."' ");
			$query = $this->db->query("update bank_transactions set cheque_status=1 where cheque_no='".$this->input->post('cheque_no')."' ");
			return true;
		}else{

			$data = array(
				'type' => 'cheque',
				'payment_type' => 'Paid',
				'tr_date' => date("Y-m-d"),
				'bank_id' => $this->input->post('banks'),
				'tr_type' => 'cash',
				'total_amount' => $this->input->post('cheque_amount')
				);

			$this->db->insert('bank_transactions',$data);
			$query = $this->db->query("update banks set bank_balance=bank_balance - ".$this->input->post('cheque_amount')." where bank_id='".$this->input->post('banks')."' ");
			$query = $this->db->query("update bank_transactions set cheque_status=1 where cheque_no='".$this->input->post('cheque_no')."' ");
			return true;
		}

	}

	function bank_transfer(){

		$bank_id=$this->input->post('paid_bank');
		$bank_id_into=$this->input->post('receive_bank');
		$payment=$this->input->post('transfer_amount');
		
		$this->db->select('account_balance,account_name');
		$this->db->where('id =',$bank_id);
		$query = $this->db->get('bank_account');
		if($this->db->affected_rows() > 0){

			$row = $query->row();
			$bank_balance=$row->account_balance;
			$bank_paid=$row->account_name;

			if($bank_balance>$payment||$bank_balance==$payment){

				$this->db->select('account_balance,account_name');
				$this->db->where('id =',$bank_id_into);
				$query = $this->db->get('bank_account');
				$row = $query->row();
				$bank_balance_into=$row->account_balance;
				$bank_into=$row->account_name;

				$balance["account_balance"]=$bank_balance_into+$payment;
				$this->db->where(['id' => $bank_id_into ]);
				$this->db->update('bank_account',$balance);

				if($this->db->affected_rows() > 0){

					$balance_paid["account_balance"]=$bank_balance-$payment;
					$this->db->where(['id' => $bank_id ]);
					$this->db->update('bank_account',$balance_paid);

					if($this->db->affected_rows() > 0){

						$data_paid = array(
							
							'trans_type' => 'Bank'	 ,
							'paid_from' => $this->input->post('paid_bank') ,
							'paid_into' => $this->input->post('receive_bank') ,

							'paid_from_account' => $bank_paid,
							'paid_into_account' => $bank_into,

							'paid_method' => $this->input->post('method'),
							'transffer_amount' => $this->input->post('transfer_amount'),
							'transffer_date' => $this->input->post('date_transfer')

							);

						$this->db->insert('bank_transfer',$data_paid);
						if($this->db->affected_rows() > 0){
							return true;

						}else{
							return false;

						}
					}else{
						return false;
					}

				}else{
					return false;
				}

			}else{
				return false;
			}
		}else{
			return false;
		}

		return ;
	}

}
?>