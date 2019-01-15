<?php
class Bank_model extends CI_Model{

	public function show_banks(){

		$query= $this->db->get('banks');
		return $query->result();
	}

	public function addBank($data){

		$this->db->insert('banks', $data);
		$bank_id = $this->db->insert_id();
		return $bank_id;
		
	}
	
	public function updateBank($where, $data)
	{
		$id=(int)($where);
		$this->db->where('bank_id',$id);
		$this->db->update('banks', $data);
		$rows= $this->db->affected_rows();
		return $rows;
	}
	
	public function delete_bank($id)
	{
		$this->db->where('bank_id', $id);
		$this->db->delete('banks');
	}

	function get_banks(){
		$this->db->select('*');
		$query = $this->db->get("banks");
		$row = array();
		if($query->num_rows() > 0){
			$row = $query->result();
		}
		return $row;
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

	function get_bankResult($min,$max,$id){
		$query = $this->db->query("select bt.*,btd.invoice_id,btd.cust_id,c.cust_name from bank_transactions bt left join bank_transactions_detail btd on bt.bt_id = btd.bt_id left join customer c on btd.cust_id = c.cust_id where bt.bank_id=".$id." and bt.tr_date >= str_to_date('".$min."', '%Y-%m-%d') and bt.tr_date <= str_to_date('".$max."', '%Y-%m-%d')");
		return $query->result_array();
	}

	function bank_transactions($id){
		$query = $this->db->query("select btd.*,bt.tr_date,bt.payment_type,btd.invoice_id,btd.cust_id,c.cust_name from bank_transactions_detail btd left join bank_transactions bt on bt.bt_id = btd.bt_id left join customer c on btd.cust_id = c.cust_id where bt.bank_id=".$id);
		return $query->result_array();
	}

	function account_transactions($id){
		$query = $this->db->query("select btd.* , (select tr_date from bank_transactions where btd.bt_id=bt_id) as tr_date from bank_transactions_detail btd where btd.account_id=$id");
		return $query->result_array();
	}
	function account_transactionsWithDate($id,$from,$to){
		$query = $this->db->query("select btd.* , bt.tr_date from bank_transactions_detail btd inner join bank_transactions bt on btd.bt_id=bt.bt_id where btd.account_id=$id and bt.tr_date >= str_to_date('".$from."', '%Y-%m-%d') and bt.tr_date <= str_to_date('".$to."', '%Y-%m-%d')");
		return $query->result();
	}

	function bank_transaction_detail($id){
		$query = $this->db->query("select b.*,c.cust_name , CONCAT( 'F-', LPAD(b.invoice_id,7,'0') ) as virtual_invoice from bank_transactions_detail b left join customer c on c.cust_id=b.cust_id");
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