<?php
class Rental_model extends CI_Model{


	 /*
     * Get Customers     */
	 function get_rentoutsummary()
	 {
	 	$query = $this->db->query("select ro.*,CONCAT( 'RO-', ro.invoice_id ) as virtual_invoice,c.cust_name , c.cust_business_name from rentout ro left join customer c on c.cust_id=ro.cust_id ORDER BY ro.invoice_id");	 	
	 	$row = array();
	 	if($query->num_rows() > 0){
            // $row = $query->result_array();
	 	}
	 	return $query->result();

	 }	

	 function getRentInProductsList($where){
		$query = $this->db->query("select s.prd_name,rod.prd_unique_id,rod.prd_qty,rod.prd_price,rod.status from rentout ro,rentout_detail rod,store s where ro.invoice_id=rod.invoice_id and rod.prd_id=s.prd_id and ro.invoice_id='".$where."' ");
	 	$row = array();
	 	if($query->num_rows() > 0){
            // $row = $query->result_array();
	 	}
	 	return $query->result();
	 }

	 function get_rentinsummary()
	 {
	 	$query = $this->db->query("select ro.*,CONCAT( 'RO-', ro.invoice_id) as virtual_invoice ,r.out_date, r.temp_name ,r.cust_id, r.address , r.contact_no , r.id_card , s.prd_name ,(ps.prd_unique_id ) unique_id , c.cust_business_name
		from rentout_detail ro left join productuniqueids ps on ps.pu_id=ro.prd_unique_id, rentout r left join customer c  on c.cust_id=r.cust_id  , store s   where ro.invoice_id=r.invoice_id and s.prd_id=ro.prd_id and ro.status!=1 ");
	 	// $query = $this->db->query("select ro.*,CONCAT( 'F-', LPAD(ro.invoice_id,7,'0') ) as virtual_invoice ,c.cust_name from rentout ro left join customer c on c.cust_id=ro.cust_id ");
	 	$row = array();
	 	if($query->num_rows() > 0){
            // $row = $query->result_array();
	 	}
	 	return $query->result();

	 }
	  function get_rentincompleted()
	 {
	 	$query = $this->db->query("select ri.*,CONCAT( 'RI-', ri.invoice_id) as virtual_invoice from rentin ri");
	 	// $query = $this->db->query("select ro.*,CONCAT( 'F-', LPAD(ro.invoice_id,7,'0') ) as virtual_invoice ,c.cust_name from rentout ro left join customer c on c.cust_id=ro.cust_id ");
	 	$row = array();
	 	if($query->num_rows() > 0){
            // $row = $query->result_array();
	 	}
	 	return $query->result();

	 }
	 function get_invoice_no()
	 {
	 	$query = $this->db->query("select ro.*,c.cust_name from rentout ro left join customer c on c.cust_id=ro.cust_id");
	 	$row = array();
	 	if($query->num_rows() > 0){
            // $row = $query->result_array();
	 	}
	 	return $query->result();

	 }

	 public function addRentOut()
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
	 	$totAmount=0;
	 	//Start of loop.......
	 	for($i=0;$i<sizeof($this->input->post('price'));$i++){ 		
			$data = array(
	 			'invoice_id' =>$invoice_id,
	 			'prd_id' => $this->input->post('productname')[$i],
	 			// 'prd_unique_id' => $this->input->post('productunique')[$i],
	 			'prd_qty' => $this->input->post('qty')[$i],
	 			'original_qty' => $this->input->post('qty')[$i],
	 			'prd_price' => $this->input->post('price')[$i],
	 			'site_name' => $this->input->post('site_name')[$i],
	 			'rental_unit' => $this->input->post('rental_unit')[$i]
	 			);
			
			if($this->input->post('productunique')[$i]!=""){
				$data['prd_unique_id']=$this->input->post('productunique')[$i];
	 		    $this->db->query("update productuniqueids set status=0 where pu_id ='".$this->input->post('productunique')[$i]."' ");
			}

			// if($this->input->post('qty')[$i]!=""){
				// $data['prd_qty']=$this->input->post('qty')[$i];
	 		    $this->db->query("update store set prd_qty=prd_qty-".$this->input->post('qty')[$i]." where prd_id ='".$this->input->post('productname')[$i]."' ");
			// }else{
			// 	$data['prd_qty']=1;
	 	// 	    // $this->db->query("update store set prd_qty=prd_qty-1,  status =case WHEN prd_qty ='0' THEN 0 End   where prd_id ='".$this->input->post('productname')[$i]."' ");
			// 	$this->db->query("update store set prd_qty=prd_qty-1 where prd_id ='".$this->input->post('productname')[$i]."' ");
	 		    // $this->db->query("update store set status=case WHEN prd_qty=0 THEN 0 End where prd_id ='".$this->input->post('productname')[$i]."' ");
	 		    
			// }

	 		$this->db->insert('rentout_detail',$data);
	 		$query=$this->db->query("select prd_qty from store where prd_id ='".$this->input->post('productname')[$i]."' ");
	 		$result=$query->row();
	 		if($result->prd_qty==0){
				$this->db->query("update store set status=0 where prd_id ='".$this->input->post('productname')[$i]."' ");

	 		}
	 		
	 		// $totAmount=$totAmount+($this->input->post('price')[$i]*$this->input->post('qty')[$i]);
		}//end of loop........

		$data = array(
			'out_date'  => $this->input->post('out_date'), 
			'out_time'  => $this->input->post('out_time'), 
			'invoice_id'  => $invoice_id, 
			'tr_no' => $this->input->post('tr_no'), 
			'cust_type' => $this->input->post('cust_type'), 
			// 'cust_id' => $this->input->post('cust_id'), 
			'temp_name' => $this->input->post('cust_name'), 
			'person_id' => $this->input->post('autorized_person'), 
			'salesman' => $this->input->post('salesman'), 
			// 'site_name' => $this->input->post('site_name'),
			// 'rental_unit' => $this->input->post('rental_unit'), 
			'advance' => $this->input->post('advance'), 
			'address' => $this->input->post('address'), 
			'note' => $this->input->post('note'),
			'id_card' => $this->input->post('id_card'),
			'contact_no' => $this->input->post('contact_number'),
			'B_N' => $this->input->post('B_N')
			
			);
			// 'total_amount' => $totAmount
			if($this->input->post('checkCustomer')=='1'){
			$data['cust_id'] = $this->input->post('test_cust_id');
			}else{
				$data['cust_id'] = 0;
					
			}
		$this->db->insert('rentout',$data);
		return true;
	}

	// SELECT id, CONCAT( 'F-', LPAD(id,7,'0') ) FROM invoice;
	
	public function updateRentOut($id)
	{

		//Quantity of exisiting invioice.......
		$query=$this->db->query("select prd_id, prd_qty,prd_unique_id from rentout_detail where invoice_id ='".$id."' ");
	 	// $result=$query->result_array();
	 	foreach ($query->result_array() as $qty) {
	 		# code...
		$this->db->query("update store set status=1, prd_qty=prd_qty+".$qty['prd_qty']." where prd_id ='".$qty['prd_id']."' ");
	 	// if($qty['prd_unique_id']!=""){
		$this->db->query("update productuniqueids set status=1 where pu_id ='".$qty['prd_unique_id']."' ");	
	 	// }

	 	}

		$this->db->where('invoice_id', $id);
		$this->db->delete('rentout_detail');

			 	//Start of loop.......
	 	for($i=0;$i<sizeof($this->input->post('price'));$i++){ 		
			$data = array(
	 			'invoice_id' =>$id,
	 			'prd_id' => $this->input->post('productname')[$i],
	 			// 'prd_unique_id' => $this->input->post('productunique')[$i],
	 			'prd_qty' => $this->input->post('qty')[$i],
	 			'original_qty' => $this->input->post('qty')[$i],
	 			'prd_price' => $this->input->post('price')[$i],
	 			'site_name' => $this->input->post('site_name')[$i],
	 			'rental_unit' => $this->input->post('rental_unit')[$i]

	 			
	 			);
			
			if($this->input->post('productunique')[$i]!=""){
				$data['prd_unique_id']=$this->input->post('productunique')[$i];
	 		    $this->db->query("update productuniqueids set status=0 where pu_id ='".$this->input->post('productunique')[$i]."' ");

			}

			// if($this->input->post('qty')[$i]!=""){
				// $data['prd_qty']=$this->input->post('qty')[$i];
	 		    $this->db->query("update store set prd_qty=prd_qty-".$this->input->post('qty')[$i]." where prd_id ='".$this->input->post('productname')[$i]."' ");
			// }else{
			// 	$data['prd_qty']=1;
	 	// 	    // $this->db->query("update store set prd_qty=prd_qty-1,  status =case WHEN prd_qty ='0' THEN 0 End   where prd_id ='".$this->input->post('productname')[$i]."' ");
			// 	$this->db->query("update store set prd_qty=prd_qty-1 where prd_id ='".$this->input->post('productname')[$i]."' ");
	 		    // $this->db->query("update store set status=case WHEN prd_qty=0 THEN 0 End where prd_id ='".$this->input->post('productname')[$i]."' ");
	 		    
			// }

	 		$this->db->insert('rentout_detail',$data);
	 		$query=$this->db->query("select prd_qty from store where prd_id ='".$this->input->post('productname')[$i]."' ");
	 		$result=$query->row();
	 		if($result->prd_qty==0){
				$this->db->query("update store set status=0 where prd_id ='".$this->input->post('productname')[$i]."' ");

	 		}
	 		
	 		// $totAmount=$totAmount+($this->input->post('price')[$i]*$this->input->post('qty')[$i]);
		}//end of loop........

		$data = array(
			'out_date'  => $this->input->post('out_date'), 
			'out_time'  => $this->input->post('out_time'), 
			'invoice_id'  => $id, 
			'tr_no' => $this->input->post('tr_no'), 
			'cust_type' => $this->input->post('cust_type'), 
			'temp_name' => $this->input->post('cust_name'), 
			'person_id' => $this->input->post('autorized_person'), 
			'salesman' => $this->input->post('salesman'), 
			// 'site_name' => $this->input->post('site_name'),
			// 'rental_unit' => $this->input->post('rental_unit'), 
			'advance' => $this->input->post('advance'), 
			'address' => $this->input->post('address'), 
			'note' => $this->input->post('note'),
			'id_card' => $this->input->post('id_card'),
			'contact_no' => $this->input->post('contact_number'),
			'B_N' => $this->input->post('B_N')
			);
		if($this->input->post('checkCustomer')=='1'){
			$data['cust_id'] = $this->input->post('cust_id');
		}else{
			$data['cust_id'] = 0;
				
		}

		$this->db->where('invoice_id', $id);
		$this->db->update('rentout',$data);
		return true;
	}

	public function rentoutInvoice($where)
	{
		$query = $this->db->query("select r.*,ap.person_name,CONCAT( 'RO-', r.invoice_id ) as virtual_invoice, u.name from rentout r left join customer c on r.cust_id=c.cust_id left join users u on r.salesman = u.user_id left join authorize_persons ap on r.person_id = ap.ap_id where r.invoice_id='".$where."'");
		// $query = $this->db->query("select r.* ,CONCAT( 'F-', LPAD(r.invoice_id,7,'0') ) as virtual_invoice,(select cust_name from customer where (cust_id) in (select cust_id from rentout where invoice_id='".$where."'))as cust_name ,(select cust_contact from customer where (cust_id) in (select cust_id from rentout where invoice_id='".$where."'))as cust_contact , u.name from rentout r , users u where r.invoice_id='".$where."' and r.salesman=u.user_id");
		return $query->row();
	}
	public function rentinInvoice($where)
	{
		$query = $this->db->query("select r.* ,CONCAT( 'RI-', r.invoice_id ) as virtual_invoice, u.name from rentin r left join customer c on r.cust_id=c.cust_id left join users u on r.sale_man = u.user_id where r.sale_man=u.user_id and r.invoice_id='".$where."'");
		return $query->row();
	}

	function getProductClassRO(){
		$query=$this->db->query("select distinct p.prd_id , p.prd_class from rentout_detail rod left join store p on p.prd_id=rod.prd_id");
		return $query->result();
	}
	function getProductClassRI(){
		$query=$this->db->query("select distinct p.prd_id , p.prd_class from rentin_detail rid left join store p on p.prd_id=rid.prd_id");
		return $query->result();
	}

	public function getLatestInvoiceNo()
	{
		$query = $this->db->query("select CONCAT( 'RO-', (invoice_id+1) ) as virtual_invoice from transactions order by invoice_id desc limit 1");
		return $query->row();
	}

	function getAllCustomers(){	
		$query = $this->db->query("select distinct cust_id,temp_name,contact_no from rentout");
		return $query->result();
	}
	function getAllCustomersBussinessNames(){	
		$query = $this->db->query("select distinct r.cust_id,c.cust_business_name from rentout r,customer c where r.cust_id = c.cust_id");
		return $query->result();
	}
	function getAllCustomersRI(){	
		$query = $this->db->query("select distinct cust_id,cust_name,contact_no from rentin");
		return $query->result();
	}
	function getAllCustomersBussinessNamesRI(){	
		$query = $this->db->query("select distinct r.cust_id,c.cust_business_name from rentin r,customer c where r.cust_id = c.cust_id");
		return $query->result();
	}

	public function getLatestPaymentInvoiceNo()
	{
		$query = $this->db->query("select CONCAT( 'PE-', (invoice_id+1) ) as virtual_invoice from transactions order by invoice_id desc limit 1");
		return $query->row();
	}

	public function getLatestReceiptInvoiceNo()
	{
		$query = $this->db->query("select CONCAT( 'RE-', (invoice_id+1) ) as virtual_invoice from transactions order by invoice_id desc limit 1");
		return $query->row();
	}

	public function getLatestSaleInvoiceNo()
	{
		$query = $this->db->query("select CONCAT( 'S-', (invoice_id+1) ) as virtual_invoice from transactions order by invoice_id desc limit 1");
		return $query->row();
	}

	public function getLatestPurchaseInvoiceNo()
	{
		$query = $this->db->query("select CONCAT( 'P-', (invoice_id+1) ) as virtual_invoice from transactions order by invoice_id desc limit 1");
		return $query->row();
	}

	public function getLatestInvoiceNoRentIn()
	{
		$query = $this->db->query("select CONCAT( 'RI-', (invoice_id+1) ) as virtual_invoice from transactions order by invoice_id desc limit 1");
		return $query->row();
	}
	
	public function updateRentIn()
	{
		date_default_timezone_set("Asia/karachi");
	 	$data = array(
	 		// 'status' => 0,
	 		'trans_date' =>  date("Y-m-d h:i")
	 		);
	 	
	 	// SELECT DATE_FORMAT(NOW(), '%Y-%m-%d %h:%i %p');
	 	$this->db->insert('transactions',$data);
	 	$invoice_id = $this->db->insert_id();
		//Start of loop.......
	 	for($i=0;$i<sizeof($this->input->post('price'));$i++){ 		
			 		   	
	 		//rentin detail invoices......
			$data = array(
	 			'out_date' =>$this->input->post('outdate')[$i],
	 			'invoice_id' =>$invoice_id,
	 			'out_invoice_id' => $this->input->post('invoice')[$i],
	 			'prd_id' => $this->input->post('productsIds')[$i],
	 			'prd_qty' => $this->input->post('qty')[$i],
	 			'prd_price' => $this->input->post('price')[$i],
	 			'hours' => $this->input->post('hours')[$i],
	 			'dayMonth' => $this->input->post('daysMonth')[$i],
	 			'rental_unit' => $this->input->post('rental_unit')[$i],
	 			'site_name' => $this->input->post('site_name')[$i]
	 			);
			
			if($this->input->post('productunique')[$i]!=""){
				$data['prd_unique_id']=$this->input->post('productunique')[$i];
			}

	 		$this->db->insert('rentin_detail',$data);
	 		//updating data in outDetail.............
 		   	if($this->input->post('productunique')[$i]!=""){
 		    	$this->db->query("update rentout_detail set prd_qty=prd_qty-".$this->input->post('qty')[$i]." where prd_unique_id ='".$this->input->post('productunique')[$i]."' and invoice_id='".$this->input->post('invoice')[$i]."' ");
 		    	// echo $this->db->affected_rows();
 		    	$this->db->query("update store set prd_qty=prd_qty+".$this->input->post('qty')[$i]." where prd_id ='".$this->input->post('productsIds')[$i]."' ");	
 		    	// echo $this->db->affected_rows();
 		    	
 		    	$this->db->query("update store set status=1 where prd_id ='".$this->input->post('productsIds')[$i]."' ");	
 		    	// echo $this->db->affected_rows();
 		     	
 		     	$this->db->query("update productuniqueids set status=1 where pu_id ='".$this->input->post('productunique')[$i]."' ");
 		    	// echo $this->db->affected_rows();
				
				$query = $this->db->query("select prd_qty from rentout_detail where prd_unique_id ='".$this->input->post('productunique')[$i]."' and invoice_id='".$this->input->post('invoice')[$i]."' ");
 		    	// echo $this->db->affected_rows();
				
				$result=$query->row();
					if($result->prd_qty==0){
 		     			$this->db->query("update rentout_detail set status=1 where prd_unique_id ='".$this->input->post('productunique')[$i]."' and invoice_id='".$this->input->post('invoice')[$i]."' ");
 		    	// echo $this->db->affected_rows();
					
					}

				}//end of unque ids....

				else{
 		    	$this->db->query("update rentout_detail set prd_qty=prd_qty-".$this->input->post('qty')[$i]." where prd_id ='".$this->input->post('productsIds')[$i]."' and invoice_id='".$this->input->post('invoice')[$i]."' ");
 		    	$this->db->query("update store set prd_qty=prd_qty+".$this->input->post('qty')[$i]." where prd_id ='".$this->input->post('productsIds')[$i]."' ");	
 		    	$this->db->query("update store set status=1 where prd_id ='".$this->input->post('productsIds')[$i]."' ");	
				$query = $this->db->query("select prd_qty from rentout_detail where prd_id ='".$this->input->post('productsIds')[$i]."' and invoice_id='".$this->input->post('invoice')[$i]."' ");
				$result=$query->row();
					if($result->prd_qty==0){
 		     			$this->db->query("update rentout_detail set status=1 where prd_id ='".$this->input->post('productsIds')[$i]."' and invoice_id='".$this->input->post('invoice')[$i]."' ");
					}

				}

		}//end of loop........
		
	 	for($i=0;$i<sizeof($this->input->post('price'));$i++){ 	

			$query = $this->db->query("select * from rentout_detail where invoice_id ='".$this->input->post('invoice')[$i]."' and status=0 ");
			if($this->db->affected_rows()==0){
	 		    $this->db->query("update rentout  set status=1 where invoice_id ='".$this->input->post('invoice')[$i]."' ");	
			}
		}

		// //rent in invoices......
			$data = array(
	 			// 'in_date' =>date("Y-m-d h:i"),
	 			'in_date'  => $this->input->post('in_date'), 
				'in_time'  => $this->input->post('in_time'), 
	 			'invoice_id' =>$invoice_id,
	 			'cust_id' => $this->input->post('cust_id'),
	 			'cust_name' => $this->input->post('cust_name'),
	 			'contact_no' => $this->input->post('contact_no'),
				'payment_type' => $this->input->post('payment_type'),
	 			'id_card' => $this->input->post('id_card'),
	 			'address' => $this->input->post('address'),
	 			'sale_man' => $this->input->post('salesman'),
	 			'remarks' => $this->input->post('remarks'),
	 			'rent_in_remarks' => $this->input->post('rent_in_remarks'),
	 			'damage' => $this->input->post('damage'),
	 			'advance' => $this->input->post('advance'),
	 			'net_amount' => $this->input->post('net_amount'),
	 			'discount' => $this->input->post('discount'),
	 			'total_amount' => $this->input->post('total_amount'),
	 			'vat_amount' => $this->input->post('vat_amount'),
	 			);
				
				if($this->input->post('payment_type')!='credit'){
				$data['bank_id']=$this->input->post('banks');
				}

	 		$this->db->insert('rentin',$data);

		if($this->input->post('payment_type')!='credit'){
		$data = array(
			'type' => 'rentin',
			'payment_type' => 'Received',
			'tr_type' => 'cash',
			'tr_date' => date("Y-m-d"),
			'bank_id' => $this->input->post('banks'),
			'total_amount' => $this->input->post('total_amount')
			);

		$this->db->insert('bank_transactions',$data);
		$bt_id = $this->db->insert_id();

	 		# code...
		$data = array(
			'bt_id' => $bt_id,
			// 'cust_id' => $this->input->post('cust_name'),
			'invoice_id' => $invoice_id,
			);
		
		if($this->input->post('cust_id')!='0'){
		$this->db->query("update customer set total_credit=total_credit - ".$this->input->post('old_balance')." where cust_id ='".$this->input->post('cust_id')."' ");
		$data['cust_id'] = $this->input->post('cust_id');
		}

		$this->db->insert('bank_transactions_detail',$data);
			//updating bank balance......
		$this->db->query("update banks set bank_balance=bank_balance +".$this->input->post('total_amount')."  where bank_id ='".$this->input->post('banks')."' ");
		$this->db->query("update rentin set status=1 where invoice_id ='".$invoice_id."' ");

		}else{
			// $totaal=$this->input->post('total_amount')-$this->input->post('old_balance');
			$this->db->query("update customer set total_credit= total_credit + ".$this->input->post('total_amount')." where cust_id ='".$this->input->post('cust_id')."' ");
		}
	 		return true;
	}

	public function get_invoice($where)
	{
		$query = $this->db->query("select r.* , CONCAT( 'RO-', (invoice_id) ) as virtual_invoice , (select person_name from authorize_persons where (ap_id) in (select person_id from rentout where invoice_id=$where))as person_name from rentout r where r.invoice_id=$where ");
			// select r.* , CONCAT( 'O-', LPAD((invoice_id),7,'0') ) as virtual_invoice , (select cust_name from customer where (cust_id) in (select cust_id from rentout where invoice_id='".$where."'))as cust_name from rentout r where r.invoice_id='".$where."'");
		return $query->row();
	}

	public function get_rentin_invoice($where)
	{
		$query = $this->db->query("select r.* ,(select person_name from authorize_persons where (ap_id) in (select person_id from rentout where invoice_id='".$where."'))as personal_name,(select cust_name from customer where (cust_id) in (select cust_id from rentout where invoice_id='".$where."'))as cust_name, (u.user_name) as sales_man from rentout r,users u where u.user_id = r.salesman and r.invoice_id='".$where."'");
		return $query->row();
	}

	public function get_invoiceProducts($where)
	{
		$query = $this->db->query(" select d.* , s.prd_name , (pds.prd_unique_id) as uniqueid from rentout_detail d left join productuniqueids pds on pds.pu_id=d.prd_unique_id left join store s on d.prd_id=s.prd_id where d.invoice_id='".$where."'");
		// $query = $this->db->query("select d.* ,s.prd_name from rentout_detail d join store s on s.prd_id=d.prd_id and d.invoice_id='".$where."'");
		return $query->result_array();
	}
	//editing rentin products........
	public function updatingRentinProducts(){
		$row = array();
		
		$invoices=explode(',',$this->input->post('invoices') );
		$prd_id=explode(',',$this->input->post('product_ids') );
		$prd_unique_id=explode(',',$this->input->post('product_unique_ids') );
		
		// print_r($invoices);
		// print_r($prd_id);
		// print_r($prd_unique_id);

		for ($i=0; $i <sizeof($invoices) ; $i++) { 
		# code...
		if($prd_unique_id[$i]!=''){
		$query = $this->db->query(" select d.prd_unique_id , d.invoice_id ,  d.rental_unit, d.prd_id, d.prd_qty ,d.original_qty, d.site_name , d.prd_price,CONCAT( 'RI-', d.invoice_id ) as virtual_invoice, s.prd_name , r.out_date , r.out_time , (pds.prd_unique_id) as uniqueid from rentout_detail d left join productuniqueids pds on pds.pu_id=d.prd_unique_id left join store s on d.prd_id=s.prd_id , rentout r where r.invoice_id=d.invoice_id and d.invoice_id='".$invoices[$i]."' and d.status=0 and d.prd_unique_id='".$prd_unique_id[$i]."'");
		// $query = $this->db->query(" select d.* , s.prd_name , (pds.prd_unique_id) as uniqueid from rentout_detail d left join productuniqueids pds on pds.pu_id=d.prd_unique_id left join store s on d.prd_id=s.prd_id where d.invoice_id='".$invoices[$i]."' and d.status=0 and d.prd_unique_id='".$prd_unique_id[$i]."'");
		$row[$i]=$query->result();
		}else{
		$query = $this->db->query(" select d.prd_unique_id ,  d.invoice_id , d.rental_unit, d.prd_id, d.prd_qty , d.original_qty, d.site_name , d.prd_price,CONCAT( 'RI-', d.invoice_id ) as virtual_invoice , s.prd_name , r.out_date , r.out_time , (pds.prd_unique_id) as uniqueid from rentout_detail d left join productuniqueids pds on pds.pu_id=d.prd_unique_id left join store s on d.prd_id=s.prd_id , rentout r where r.invoice_id=d.invoice_id and d.invoice_id='".$invoices[$i]."' and d.status=0 and d.prd_id='".$prd_id[$i]."'");
		$row[$i]=$query->result();
		}

		}
		// $query = $this->db->query("select d.* ,s.prd_name from rentout_detail d join store s on s.prd_id=d.prd_id and d.invoice_id='".$where."'");
		return $row;
	}

		public function get_rentin_invoiceProducts($where)
	{
		$query = $this->db->query(" select d.* , s.prd_name , (pds.prd_unique_id) as uniqueid from rentout_detail d left join productuniqueids pds on pds.pu_id=d.prd_unique_id left join store s on d.prd_id=s.prd_id where d.invoice_id='".$where."' and d.status=1");
		// $query = $this->db->query("select d.* ,s.prd_name from rentout_detail d join store s on s.prd_id=d.prd_id and d.invoice_id='".$where."'");
		return $query->result_array();
	}

	public function get_rentin_Products($where)
	{
		$query = $this->db->query(" select d.* , s.prd_name , (pds.prd_unique_id) as uniqueid from rentin_detail d left join productuniqueids pds on pds.pu_id=d.prd_unique_id left join store s on d.prd_id=s.prd_id where d.invoice_id='".$where."'");
		// $query = $this->db->query("select d.* ,s.prd_name from rentout_detail d join store s on s.prd_id=d.prd_id and d.invoice_id='".$where."'");
		return $query->result_array();
	}

	// public function unitPrices($where)
	// {
	// 	$id=(int)($where);
	// 	$this->db->where('sup_id',$id);
	// 	$this->db->update('supplier', $data);
	// 	$rows= $this->db->affected_rows();
	// 	return $rows;
	// }

	public function delete_rentin($id)
	{
		$query = $this->db->query("select * from rentin_detail where invoice_id ='".$id."' ");
		$result=$query->result_array();
		//Start of loop.......
	 	foreach ($result as $data) {	
			
			if($data['prd_unique_id']!="0"){
 		    	//Updating Store......
 		    	$this->db->query("update productuniqueids set status=0 where prd_unique_id ='".$data['prd_unique_id']."' and prd_id='".$data['prd_id']."' ");
 		    	$this->db->query("update store set prd_qty=prd_qty-1 where prd_id ='".$data['prd_id']."' ");	
 		    	$this->db->query("update store set status=0 where prd_id ='".$data['prd_id']."' ");	
 		    	//Updating Rentout......
 		    	$this->db->query("update rentout_detail set status=0 , prd_qty=prd_qty+".$data['prd_qty']." where prd_unique_id ='".$data['prd_unique_id']."' and invoice_id='".$data['out_invoice_id']."' ");
 		    	$this->db->query("update rentout set status=0 where invoice_id='".$data['out_invoice_id']."' ");
							
			}else{
			//Updating Store......
 		    	$this->db->query("update store set prd_qty=prd_qty-".$data['prd_qty']." where prd_id ='".$data['prd_id']."' ");	
 		    	$this->db->query("update store set status=0 where prd_id ='".$data['prd_id']."' ");	
 		    	//Updating Rentout......
 		    	$this->db->query("update rentout_detail set status=0 , prd_qty=prd_qty+".$data['prd_qty']." where prd_id ='".$data['prd_id']."' and invoice_id='".$data['out_invoice_id']."' ");
 		    	$this->db->query("update rentout set status=0 where invoice_id='".$data['out_invoice_id']."' ");
			}

		}//end of loop........
		
		$query = $this->db->query("select * from rentin where invoice_id ='".$id."' ");
		$result=$query->row();
		$total_amount=$result->total_amount;
		$cust_id=$result->cust_id;
		
		if($result->payment_type=='cash'){
		//updating bank...
		$this->db->query("update banks set bank_balance=bank_balance - ".$result->total_amount."  where bank_id ='".$result->bank_id."' ");
		$query = $this->db->query("select bt_id from bank_transactions_detail where invoice_id ='".$id."' limit 1 ");
		$result=$query->row();
		$this->db->where('bt_id', $result->bt_id);
		$this->db->delete('bank_transactions');
		$this->db->where('invoice_id', $id);
		$this->db->delete('bank_transactions_detail');
		
		}else{
		$this->db->query("update customer set total_credit=total_credit - ".$total_amount." where cust_id ='".$cust_id."' ");
		}

		$this->db->where('invoice_id', $id);
		$this->db->delete('rentin');

		$this->db->where('invoice_id', $id);
		$this->db->delete('rentin_detail');

	 		return true;
	}

	//Salesman.................................................
	public function get_salesman()
	{
		$this->db->from('users');
		$this->db->where('user_type=','staff');
		$query = $this->db->get();

		return $query->result_array();
	}

}
?>