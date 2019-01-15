<?php
class Report_model extends CI_Model{
	
	// public function getCustomerName(){
	// 	// $query = $this->db->query("select ro.*,CONCAT( 'F-', LPAD(ro.invoice_id,7,'0') ) as virtual_invoice,c.cust_name from rentout ro left join customer c on c.cust_id=ro.cust_id");
	//  	// $row = array();
	//  	// if($query->num_rows() > 0){
    //     //     // $row = $query->result_array();
	//  	// }
	// 	 // return $query->result();
	// 	$this->db->select('cust_id,cust_name');
	// 	$query = $this->db->get("customer");
	// 	$row = array();
	// 	if($query->num_rows() > 0){
	// 		$row = $query->result();
	// 	}
	// 	return $row;
	// }
	function get_rentoutReport($from,$to,$cust,$type){	
		if($cust != 'null' && $to != 'null' && $from != 'null'){
			if($type == "cust_name"){
				$query = $this->db->query("select distinct ro.*,rod.original_qty from rentout ro,rentout_detail rod where ro.invoice_id=rod.invoice_id and ro.out_date >= str_to_date('".$from."', '%Y-%m-%d') and ro.out_date <= str_to_date('".$to."', '%Y-%m-%d') and ro.temp_name = '".urldecode($cust)."'");
			}else if($type == "contact_no"){
				$query = $this->db->query("select distinct ro.*,rod.original_qty from rentout ro,rentout_detail rod where ro.invoice_id=rod.invoice_id and ro.out_date >= str_to_date('".$from."', '%Y-%m-%d') and ro.out_date <= str_to_date('".$to."', '%Y-%m-%d') and ro.contact_no = '".$cust."'");
			}else if($type == "business_name"){
				$query = $this->db->query("select distinct ro.*,rod.original_qty from rentout ro,rentout_detail rod where ro.invoice_id=rod.invoice_id and ro.out_date >= str_to_date('".$from."', '%Y-%m-%d') and ro.out_date <= str_to_date('".$to."', '%Y-%m-%d') and ro.cust_id =".$cust);
			}else if($type == "prd_class"){
				$query = $this->db->query("select distinct ro.*,rod.original_qty from rentout ro left join rentout_detail rod on ro.invoice_id=rod.invoice_id left join store s on s.prd_id = rod.prd_id where ro.out_date >= str_to_date('".$from."', '%Y-%m-%d') and ro.out_date <= str_to_date('".$to."', '%Y-%m-%d') and s.prd_class ='".urldecode($cust)."'");
			}
		}else if($to != 'null' && $from != 'null' && $cust == 'null'){
			$query = $this->db->query("select distinct ro.*,rod.original_qty from rentout ro,rentout_detail rod where ro.invoice_id=rod.invoice_id and ro.out_date >= str_to_date('".$from."', '%Y-%m-%d') and ro.out_date <= str_to_date('".$to."', '%Y-%m-%d')");
		}else if(($to == 'null' || $from == 'null') && $cust != 'null'){	// }else if($to == null && $from == null && $cust){
			if($type == "cust_name"){
				$query = $this->db->query("select distinct ro.*,rod.original_qty from rentout ro,rentout_detail rod where ro.invoice_id=rod.invoice_id and ro.temp_name = '".urldecode($cust)."' ");
			}else if($type == "contact_no"){
				$query = $this->db->query("select distinct ro.*,rod.original_qty from rentout ro,rentout_detail rod where ro.invoice_id=rod.invoice_id and ro.contact_no = '".$cust."' ");
			}else if($type == "business_name"){
				$query = $this->db->query("select distinct ro.*,rod.original_qty from rentout ro,rentout_detail rod where ro.invoice_id=rod.invoice_id and ro.cust_id =".$cust);
			}else if($type == "prd_class"){
				$query = $this->db->query("select distinct ro.*,rod.original_qty from rentout ro left join rentout_detail rod on ro.invoice_id=rod.invoice_id left join store s on s.prd_id = rod.prd_id where s.prd_class ='".urldecode($cust)."'");
			}
		}else{	//all null
			$query = $this->db->query("select distinct ro.*,rod.original_qty from rentout ro,rentout_detail rod where ro.invoice_id=rod.invoice_id");
		}
		return $query->result();
		//This wrong syntax generated alot of mess. spend 3 hours on this shit
		//$query = $this->db->query("select invoice_id,total_amount from rentin ri,customer c where c.cust_id=ri.cust_id and ri.status=0 and ri.cust_id="+$id);
		//-------------------------------------------------
		// $query = $this->db->query("select * from rentout ro,rentout_detail rod,customer c where ro.invoice_id=rod.invoice_id and ro.cust_id=c.cust_id and ro.out_date >= str_to_date('".$from."', '%Y-%m-%d') and ro.out_date < str_to_date('".$to."', '%Y-%m-%d')");
		// $query = $this->db->query("select * from rentout ro,rentout_detail rod where ro.invoice_id=rod.invoice_id and ro.out_date >= str_to_date('".$from."', '%Y-%m-%d') and ro.out_date <= str_to_date('".$to."', '%Y-%m-%d')");
	 	// $row = array();
	 	// if($query->num_rows() > 0){
        //     // $row = $query->result_array();
	 	// }
		// return $query->result();
	}
	function get_rentInReport($from,$to,$cust,$type){
		if($cust != 'null' && $to != 'null' && $from != 'null'){
			if($type == "cust_name"){
				$query = $this->db->query("select distinct ri.*,rid.prd_qty,rid.rid_id from rentin ri,rentin_detail rid where ri.invoice_id=rid.invoice_id and ri.in_date >= str_to_date('".$from."', '%Y-%m-%d') and ri.in_date <= str_to_date('".$to."', '%Y-%m-%d') and ri.cust_name = '".urldecode($cust)."'");
			}else if($type == "contact_no"){
				$query = $this->db->query("select distinct ri.*,rid.prd_qty,rid.rid_id from rentin ri,rentin_detail rid where ri.invoice_id=rid.invoice_id and ri.in_date >= str_to_date('".$from."', '%Y-%m-%d') and ri.in_date <= str_to_date('".$to."', '%Y-%m-%d') and ri.contact_no = '".$cust."'");
			}else if($type == "business_name"){
				$query = $this->db->query("select distinct ri.*,rid.prd_qty,rid.rid_id from rentin ri,rentin_detail rid where ri.invoice_id=rid.invoice_id and ri.in_date >= str_to_date('".$from."', '%Y-%m-%d') and ri.in_date <= str_to_date('".$to."', '%Y-%m-%d') and ri.cust_id =".$cust);
			}else if($type == "prd_class"){
				$query = $this->db->query("select distinct ri.*,rid.prd_qty,rid.rid_id from rentin ri inner join rentin_detail rid on ri.invoice_id=rid.invoice_id left join store s on s.prd_id = rid.prd_id where ri.in_date >= str_to_date('".$from."', '%Y-%m-%d') and ri.in_date <= str_to_date('".$to."', '%Y-%m-%d') and s.prd_class ='".urldecode($cust)."'");
			}
		}else if($to != 'null' && $from != 'null' && $cust == 'null'){
			$query = $this->db->query("select distinct ri.*,rid.prd_qty,rid.rid_id from rentin ri,rentin_detail rid where ri.invoice_id=rid.invoice_id and ri.in_date >= str_to_date('".$from."', '%Y-%m-%d') and ri.in_date <= str_to_date('".$to."', '%Y-%m-%d')");
		}else if(($to == 'null' || $from == 'null') && $cust != 'null'){	// }else if($to == null && $from == null && $cust){
			if($type == "cust_name"){
				$query = $this->db->query("select distinct ri.*,rid.prd_qty,rid.rid_id from rentin ri,rentin_detail rid where ri.invoice_id=rid.invoice_id and ri.cust_name = '".urldecode($cust)."' ");
			}else if($type == "contact_no"){
				$query = $this->db->query("select distinct ri.*,rid.prd_qty,rid.rid_id from rentin ri,rentin_detail rid where ri.invoice_id=rid.invoice_id and ri.contact_no = '".$cust."' ");
			}else if($type == "business_name"){
				$query = $this->db->query("select distinct ri.*,rid.prd_qty,rid.rid_id from rentin ri,rentin_detail rid where ri.invoice_id=rid.invoice_id and ri.cust_id =".$cust);
			}else if($type == "prd_class"){
				$query = $this->db->query("select distinct ri.*,rid.prd_qty,rid.rid_id from rentin ri inner join rentin_detail rid on ri.invoice_id=rid.invoice_id left join store s on s.prd_id = rid.prd_id where s.prd_class ='".urldecode($cust)."'");
			}
		}else{	//all null
			$query = $this->db->query("select distinct ri.*,rid.prd_qty,rid.rid_id from rentin ri,rentin_detail rid where ri.invoice_id=rid.invoice_id");
		}
		return $query->result();
		// $query = $this->db->query("select * from rentin ri,rentin_detail rid where ri.invoice_id=rid.invoice_id and ri.in_date >= str_to_date('".$from."', '%Y-%m-%d') and ri.in_date <= str_to_date('".$to."', '%Y-%m-%d')");
		// return $query->result();
	}
	function getAllCustomers(){	
		$query = $this->db->query("select distinct cust_id,temp_name from rentout");
		return $query->result();
	}
	function getAllAccounts(){	
		$query = $this->db->query("select id,account_name from bank_account");
		return $query->result();
	}
	function getTransactionTypes(){	
		$query = $this->db->query("select DISTINCT type from bank_transactions");
		return $query->result();
	}
	function get_CustomerAccountsReport($from , $to){	
		//yet to be done.
		$query = $this->db->query("select * from bank_account");
		return $query->result();
	}
	function get_TotalExpenseReport($from , $to){	
		if($from != 'null' && $to != 'null'){
			$query = $this->db->query("select distinct ba.account_name,b.bank_name,bt.tr_type,(select sum(x.total_amount) from bank_transactions x,bank_transactions_detail y where x.bt_id = y.bt_id and x.bank_id = bt.bank_id and x.tr_type = bt.tr_type and y.account_id = btd.account_id and x.type = 'expense') as sum from banks b inner join bank_transactions bt on b.bank_id = bt.bank_id inner join bank_transactions_detail btd on bt.bt_id = btd.bt_id inner join bank_account ba on ba.id = btd.account_id where bt.type = 'expense' and bt.tr_date >= str_to_date('".$from."', '%Y-%m-%d') and bt.tr_date <= str_to_date('".$to."', '%Y-%m-%d')");
			//select distinct ba.account_name,b.bank_name,bt.tr_type,(select sum(total_amount) from bank_transactions x,bank_transactions_detail y where x.bt_id = y.bt_id and x.bank_id = bt.bank_id and x.tr_type = bt.tr_type and y.account_id = ba.id) as sum from banks b inner join bank_transactions bt on b.bank_id = bt.bank_id inner join bank_transactions_detail btd on bt.bt_id = btd.bt_id inner join bank_account ba on ba.id = btd.account_id where bt.type = 'expense'
		}else{
			$query = $this->db->query("select distinct ba.account_name,b.bank_name,bt.tr_type,(select sum(x.total_amount) from bank_transactions x,bank_transactions_detail y where x.bt_id = y.bt_id and x.bank_id = bt.bank_id and x.tr_type = bt.tr_type and y.account_id = btd.account_id and x.type = 'expense') as sum from banks b inner join bank_transactions bt on b.bank_id = bt.bank_id inner join bank_transactions_detail btd on bt.bt_id = btd.bt_id inner join bank_account ba on ba.id = btd.account_id where bt.type = 'expense'");
		}
		return $query->result();
	}
	function get_ChequeReport($from,$to){	
		if($from == null || $to == null){
			//have a look here again on 'distinct'
			$query = $this->db->query("select distinct bt.cheque_date,bt.cheque_no,b.bank_name,bt.description,ba.account_name,bt.total_amount,bt.cheque_status from banks b,bank_account ba, bank_transactions bt, bank_transactions_detail btd where b.bank_id = bt.bank_id and ba.id = btd.account_id and bt.bt_id = btd.bt_id and bt.tr_type = 'cheque' ");
		}else{
			$query = $this->db->query("select distinct bt.cheque_date,bt.cheque_no,b.bank_name,bt.description,ba.account_name,bt.total_amount,bt.cheque_status from banks b,bank_account ba, bank_transactions bt, bank_transactions_detail btd where b.bank_id = bt.bank_id and ba.id = btd.account_id and bt.bt_id = btd.bt_id and bt.tr_type = 'cheque' and bt.cheque_date >= str_to_date('".$from."', '%Y-%m-%d') and bt.cheque_date <= str_to_date('".$to."', '%Y-%m-%d')");
		}
		return $query->result();
	}
	function get_accountsReport($from,$to,$account){	
		//have a look here again on 'distinct'
		$query = $this->db->query("select distinct bt.tr_date,bt.bt_id,bt.tr_type,bt.description,(case when bt.payment_type = 'Received' then total_amount else 0 end) as dr,(case when bt.payment_type = 'Paid' then total_amount else 0 end) as cr,('???Balance???') as balance from banks b,bank_account ba, bank_transactions bt, bank_transactions_detail btd where b.bank_id = bt.bank_id and ba.id = btd.account_id and bt.bt_id = btd.bt_id and bt.tr_date >= str_to_date('".$from."', '%Y-%m-%d') and bt.tr_date <= str_to_date('".$to."', '%Y-%m-%d') and ba.id = ".$account."");
		//$query = $this->db->query("select bt.tr_date,bt.bt_id,bt.tr_type,bt.description,(case when bt.payment_type = 'Received' then total_amount else 0 end) as dr,(case when bt.payment_type = 'Paid' then total_amount else 0 end) as cr,('???Balance???') as balance from banks b,bank_account ba, bank_transactions bt, bank_transactions_detail btd where b.bank_id = bt.bank_id and ba.id = btd.account_id and bt.bt_id = btd.bt_id and bt.tr_date >= str_to_date('".$from."', '%Y-%m-%d') and bt.tr_date <= str_to_date('".$to."', '%Y-%m-%d') and ba.id = ".$account."");
		return $query->result();
	}
	function get_dailyReport($from,$to,$type){	
		//have a look here again on 'distinct'
		if($from != 'null' && $to != 'null' && $type != 'null'){
			$query = $this->db->query("select distinct bt.tr_date,bt.bt_id,bt.type,bt.description,(case when bt.payment_type = 'Received' then total_amount else 0 end) as dr,(case when bt.payment_type = 'Paid' then total_amount else 0 end) as cr,c.cust_name  from banks b inner join bank_transactions bt on b.bank_id = bt.bank_id inner join bank_transactions_detail btd on bt.bt_id = btd.bt_id inner join bank_account ba on ba.id = btd.account_id left join customer c on btd.cust_id = c.cust_id where b.bank_name = 'Cash' and bt.tr_date >= str_to_date('".$from."', '%Y-%m-%d') and bt.tr_date <= str_to_date('".$to."', '%Y-%m-%d') and bt.type = '".urldecode($type)."'");
		}else if(($from == 'null' || $to == 'null') && $type != 'null'){
			$query = $this->db->query("select distinct bt.tr_date,bt.bt_id,bt.type,bt.description,(case when bt.payment_type = 'Received' then total_amount else 0 end) as dr,(case when bt.payment_type = 'Paid' then total_amount else 0 end) as cr,c.cust_name  from banks b inner join bank_transactions bt on b.bank_id = bt.bank_id inner join bank_transactions_detail btd on bt.bt_id = btd.bt_id inner join bank_account ba on ba.id = btd.account_id left join customer c on btd.cust_id = c.cust_id where b.bank_name = 'Cash' and bt.type = '".urldecode($type)."'");
		}else if($from != 'null' || $to != 'null' && $type == 'null'){
			$query = $this->db->query("select distinct bt.tr_date,bt.bt_id,bt.type,bt.description,(case when bt.payment_type = 'Received' then total_amount else 0 end) as dr,(case when bt.payment_type = 'Paid' then total_amount else 0 end) as cr,c.cust_name  from banks b inner join bank_transactions bt on b.bank_id = bt.bank_id inner join bank_transactions_detail btd on bt.bt_id = btd.bt_id inner join bank_account ba on ba.id = btd.account_id left join customer c on btd.cust_id = c.cust_id where b.bank_name = 'Cash' and bt.tr_date >= str_to_date('".$from."', '%Y-%m-%d') and bt.tr_date <= str_to_date('".$to."', '%Y-%m-%d')");
		}else{
			$query = $this->db->query("select distinct bt.tr_date,bt.bt_id,bt.type,bt.description,(case when bt.payment_type = 'Received' then total_amount else 0 end) as dr,(case when bt.payment_type = 'Paid' then total_amount else 0 end) as cr,c.cust_name  from banks b inner join bank_transactions bt on b.bank_id = bt.bank_id inner join bank_transactions_detail btd on bt.bt_id = btd.bt_id inner join bank_account ba on ba.id = btd.account_id left join customer c on btd.cust_id = c.cust_id where b.bank_name = 'Cash'");
		}
		//$query = $this->db->query("select bt.tr_date,bt.bt_id,bt.type,bt.description,(case when bt.payment_type = 'Received' then total_amount else 0 end) as dr,(case when bt.payment_type = 'Paid' then total_amount else 0 end) as cr,('???Balance???') as balance from banks b,bank_account ba, bank_transactions bt, bank_transactions_detail btd where b.bank_id = bt.bank_id and ba.id = btd.account_id and bt.bt_id = btd.bt_id and bt.tr_date >= str_to_date('".$from."', '%Y-%m-%d') and bt.tr_date <= str_to_date('".$to."', '%Y-%m-%d') and ba.id = ".$account."");
		return $query->result();
	}
	function get_monthlyReport($from,$to){	
		//have a look here again on 'distinct'
		if($from == 'null' || $to == 'null'){
			$query = $this->db->query("select DISTINCT ba.id,IFNULL(Case when ba.account_type='credit' then ba.account_name end , 'N/A') as expense,IFNULL(Case when ba.account_type='credit' then sum(bt.total_amount) end , 'N/A') as expense_balance,IFNULL(Case when ba.account_type='debit' then sum(bt.total_amount) end , 'N/A') as debit,IFNULL(Case when ba.account_type='debit' then ba.account_balance end , 'N/A') as debit_balance from bank_account ba left join bank_transactions_detail btd on btd.account_id = ba.id left join bank_transactions bt on  bt.bt_id = btd.bt_id group by ba.id");
		}else{
			$query = $this->db->query("select DISTINCT ba.id,IFNULL(Case when ba.account_type='credit' then ba.account_name end , 'N/A') as expense,IFNULL(Case when ba.account_type='credit' then sum(bt.total_amount) end , 'N/A') as expense_balance,IFNULL(Case when ba.account_type='debit' then sum(bt.total_amount) end , 'N/A') as debit,IFNULL(Case when ba.account_type='debit' then ba.account_balance end , 'N/A') as debit_balance from bank_account ba left join bank_transactions_detail btd on btd.account_id = ba.id left join bank_transactions bt on  bt.bt_id = btd.bt_id where bt.tr_date >= str_to_date('".$from."', '%Y-%m-%d') and bt.tr_date <= str_to_date('".$to."', '%Y-%m-%d') group by ba.id");
		}
		// $query = $this->db->query("select distinct t1.id as ID,
		// 	IFNULL((Select account_name from bank_account As T3 where T3.id=t1.id and T3.account_type='credit') ,'N/A') as expense,
		// 	IFNULL((Select account_name from bank_account As T4 where T4.id=t1.id and T4.account_type='debit'),'N/A') as income
		// 	from bank_account as T1");
		//$query = $this->db->query("select bt.tr_date,bt.bt_id,bt.tr_type,bt.description,(case when bt.payment_type = 'Received' then total_amount else 0 end) as dr,(case when bt.payment_type = 'Paid' then total_amount else 0 end) as cr,('???Balance???') as balance from banks b,bank_account ba, bank_transactions bt, bank_transactions_detail btd where b.bank_id = bt.bank_id and ba.id = btd.account_id and bt.bt_id = btd.bt_id and bt.tr_date >= str_to_date('".$from."', '%Y-%m-%d') and bt.tr_date <= str_to_date('".$to."', '%Y-%m-%d') and ba.id = ".$account."");
		return $query->result();
	}
	function get_rentalProducts(){	
		$query = $this->db->query("SELECT s.prd_name,(s.prd_qty + rod.original_qty) as prd_qty,(rod.original_qty - rod.prd_qty) as rentOut,
		((s.prd_qty + rod.original_qty) - (rod.original_qty - rod.prd_qty)) as remain FROM store s inner join rentout_detail rod on s.prd_id = rod.prd_id");
		return $query->result();
	}
	function get_saleStockReport(){	
		$query = $this->db->query("select s.*,sp.sup_name from store s left join supplier sp on s.sup_id = sp.sup_id where status=1 and prd_category='sale'");
		return $query->result();
	}
	function get_rentalStockReport(){	
		$query = $this->db->query("select s.*,sp.sup_name from store s left join supplier sp on s.sup_id = sp.sup_id where status=1 and prd_category='rent'");
		return $query->result();
	}
	function get_customerProductsReport($from,$to,$type,$cust){	
		if($type == "rentOut"){
			// 'NASIR BHAI' yaani jb string comparison ki baari ati ha to koi record ni ata
				$query = $this->db->query("select cast(concat(ro.out_date, ' ', ro.out_time) as datetime) as rentOut_dateTime ,s.prd_name,ro.invoice_id,rod.original_qty,cast(concat(ri.in_date, ' ', ri.in_time) as datetime) as rentIn_dateTime,rod.prd_qty,(s.prd_qty + rod.prd_qty) as balance_qty,(case when ro.rental_unit = 'daily' then concat(concat((ri.in_date - ro.out_date) , ' Day X '),s.prd_rent_per_day) when ro.rental_unit = 'monthly' then concat(concat(TIMESTAMPDIFF(MONTH, ri.in_date, ro.out_date) , ' Month X '),s.prd_rent_per_month) end) as rate,ri.net_amount,ro.site_name from 
			rentout ro inner join rentout_detail rod on ro.invoice_id = rod.invoice_id inner join store s on rod.prd_id = s.prd_id
			left join (rentin ri inner join rentin_detail rid on ri.invoice_id = rid.invoice_id) on ro.invoice_id = ri.invoice_id where ro.out_date >= str_to_date('".$from."', '%Y-%m-%d') and ro.out_date <= str_to_date('".$to."', '%Y-%m-%d')
			 and ro.temp_name = '".urldecode($cust)."'");
		}else{
				$query = $this->db->query("select cast(concat(ro.out_date, ' ', ro.out_time) as datetime) as rentOut_dateTime ,s.prd_name,ro.invoice_id,rod.original_qty,cast(concat(ri.in_date, ' ', ri.in_time) as datetime) as rentIn_dateTime,rod.prd_qty,(s.prd_qty + rod.prd_qty) as balance_qty,(case when ro.rental_unit = 'daily' then concat(concat((ri.in_date - ro.out_date) , ' Day X '),s.prd_rent_per_day) when ro.rental_unit = 'monthly' then concat(concat(TIMESTAMPDIFF(MONTH, ri.in_date, ro.out_date) , ' Month X '),s.prd_rent_per_month) end) as rate,ri.net_amount,ro.site_name from 
			rentout ro inner join rentout_detail rod on ro.invoice_id = rod.invoice_id inner join store s on rod.prd_id = s.prd_id
			left join (rentin ri inner join rentin_detail rid on ri.invoice_id = rid.invoice_id) on ro.invoice_id = ri.invoice_id where ri.in_date >= str_to_date('".$from."', '%Y-%m-%d') and ri.in_date <= str_to_date('".$to."', '%Y-%m-%d')
			and ro.temp_name = '".urldecode($cust)."'");
		}
		return $query->result();
	}
	function get_rentInRentOutReport($from,$to,$cust,$type){	
		if($cust != 'null' && $cust != 'junk' && $to != 'null' && $from != 'null'){
			if($type == "rentOut"){
				if($type == "cust_name"){
					$query = $this->db->query("select cast(concat(ro.out_date, ' ', ro.out_time) as datetime) as rentOut_dateTime ,s.prd_name,rod.original_qty,cast(concat(ri.in_date, ' ', ri.in_time) as datetime) as rentIn_dateTime,rid.prd_qty,rid.prd_price,ri.discount,ri.total_amount,(case when rod.status = 0 then 'Pending' else 'Completed' end) as Status from 
					rentout ro inner join rentout_detail rod on ro.invoice_id = rod.invoice_id inner join store s on rod.prd_id = s.prd_id
					left join (rentin ri inner join rentin_detail rid on ri.invoice_id = rid.invoice_id) on ro.invoice_id = rid.out_invoice_id where ro.out_date >= str_to_date('".$from."', '%Y-%m-%d') and ro.out_date <= str_to_date('".$to."', '%Y-%m-%d') and ro.temp_name = '".urldecode($cust)."'");
				}else if($type == "contact_no"){
					$query = $this->db->query("select cast(concat(ro.out_date, ' ', ro.out_time) as datetime) as rentOut_dateTime ,s.prd_name,rod.original_qty,cast(concat(ri.in_date, ' ', ri.in_time) as datetime) as rentIn_dateTime,rid.prd_qty,rid.prd_price,ri.discount,ri.total_amount,(case when rod.status = 0 then 'Pending' else 'Completed' end) as Status from 
					rentout ro inner join rentout_detail rod on ro.invoice_id = rod.invoice_id inner join store s on rod.prd_id = s.prd_id
					left join (rentin ri inner join rentin_detail rid on ri.invoice_id = rid.invoice_id) on ro.invoice_id = rid.out_invoice_id where ro.out_date >= str_to_date('".$from."', '%Y-%m-%d') and ro.out_date <= str_to_date('".$to."', '%Y-%m-%d') and ro.contact_no='".$cust."'");
				}else if($type == "business_name"){
					$query = $this->db->query("select cast(concat(ro.out_date, ' ', ro.out_time) as datetime) as rentOut_dateTime ,s.prd_name,rod.original_qty,cast(concat(ri.in_date, ' ', ri.in_time) as datetime) as rentIn_dateTime,rid.prd_qty,rid.prd_price,ri.discount,ri.total_amount,(case when rod.status = 0 then 'Pending' else 'Completed' end) as Status from 
					rentout ro inner join rentout_detail rod on ro.invoice_id = rod.invoice_id inner join store s on rod.prd_id = s.prd_id
					left join (rentin ri inner join rentin_detail rid on ri.invoice_id = rid.invoice_id) on ro.invoice_id = rid.out_invoice_id where ro.out_date >= str_to_date('".$from."', '%Y-%m-%d') and ro.out_date <= str_to_date('".$to."', '%Y-%m-%d') and ro.cust_id =".$cust);
				}else if($type == "prd_class"){
					$query = $this->db->query("select cast(concat(ro.out_date, ' ', ro.out_time) as datetime) as rentOut_dateTime ,s.prd_name,rod.original_qty,cast(concat(ri.in_date, ' ', ri.in_time) as datetime) as rentIn_dateTime,rid.prd_qty,rid.prd_price,ri.discount,ri.total_amount,(case when rod.status = 0 then 'Pending' else 'Completed' end) as Status from 
					rentout ro inner join rentout_detail rod on ro.invoice_id = rod.invoice_id inner join store s on rod.prd_id = s.prd_id
					left join (rentin ri inner join rentin_detail rid on ri.invoice_id = rid.invoice_id) on ro.invoice_id = rid.out_invoice_id where ro.out_date >= str_to_date('".$from."', '%Y-%m-%d') and ro.out_date <= str_to_date('".$to."', '%Y-%m-%d') and s.prd_class = '".urldecode($cust)."'");
				}
			}else if($type == "rentIn"){
				if($type == "cust_name"){
					$query = $this->db->query("select cast(concat(ro.out_date, ' ', ro.out_time) as datetime) as rentOut_dateTime ,s.prd_name,rod.original_qty,cast(concat(ri.in_date, ' ', ri.in_time) as datetime) as rentIn_dateTime,rid.prd_qty,rid.prd_price,ri.discount,ri.total_amount,(case when rod.status = 0 then 'Pending' else 'Completed' end) as Status from 
					rentout ro inner join rentout_detail rod on ro.invoice_id = rod.invoice_id inner join store s on rod.prd_id = s.prd_id
					left join (rentin ri inner join rentin_detail rid on ri.invoice_id = rid.invoice_id) on ro.invoice_id = rid.out_invoice_id where ri.in_date >= str_to_date('".$from."', '%Y-%m-%d') and ri.in_date <= str_to_date('".$to."', '%Y-%m-%d') and ro.temp_name = '".urldecode($cust)."'");
				}else if($type == "contact_no"){
					$query = $this->db->query("select cast(concat(ro.out_date, ' ', ro.out_time) as datetime) as rentOut_dateTime ,s.prd_name,rod.original_qty,cast(concat(ri.in_date, ' ', ri.in_time) as datetime) as rentIn_dateTime,rid.prd_qty,rid.prd_price,ri.discount,ri.total_amount,(case when rod.status = 0 then 'Pending' else 'Completed' end) as Status from 
					rentout ro inner join rentout_detail rod on ro.invoice_id = rod.invoice_id inner join store s on rod.prd_id = s.prd_id
					left join (rentin ri inner join rentin_detail rid on ri.invoice_id = rid.invoice_id) on ro.invoice_id = rid.out_invoice_id where ri.in_date >= str_to_date('".$from."', '%Y-%m-%d') and ri.in_date <= str_to_date('".$to."', '%Y-%m-%d') and ro.contact_no='".$cust."'");
				}else if($type == "business_name"){
					$query = $this->db->query("select cast(concat(ro.out_date, ' ', ro.out_time) as datetime) as rentOut_dateTime ,s.prd_name,rod.original_qty,cast(concat(ri.in_date, ' ', ri.in_time) as datetime) as rentIn_dateTime,rid.prd_qty,rid.prd_price,ri.discount,ri.total_amount,(case when rod.status = 0 then 'Pending' else 'Completed' end) as Status from 
					rentout ro inner join rentout_detail rod on ro.invoice_id = rod.invoice_id inner join store s on rod.prd_id = s.prd_id
					left join (rentin ri inner join rentin_detail rid on ri.invoice_id = rid.invoice_id) on ro.invoice_id = rid.out_invoice_id where ri.in_date >= str_to_date('".$from."', '%Y-%m-%d') and ri.in_date <= str_to_date('".$to."', '%Y-%m-%d') and ro.cust_id =".$cust);
				}else if($type == "prd_class"){
					$query = $this->db->query("select cast(concat(ro.out_date, ' ', ro.out_time) as datetime) as rentOut_dateTime ,s.prd_name,rod.original_qty,cast(concat(ri.in_date, ' ', ri.in_time) as datetime) as rentIn_dateTime,rid.prd_qty,rid.prd_price,ri.discount,ri.total_amount,(case when rod.status = 0 then 'Pending' else 'Completed' end) as Status from 
					rentout ro inner join rentout_detail rod on ro.invoice_id = rod.invoice_id inner join store s on rod.prd_id = s.prd_id
					left join (rentin ri inner join rentin_detail rid on ri.invoice_id = rid.invoice_id) on ro.invoice_id = rid.out_invoice_id where ri.in_date >= str_to_date('".$from."', '%Y-%m-%d') and ri.in_date <= str_to_date('".$to."', '%Y-%m-%d') and s.prd_class = '".urldecode($cust)."'");
				}
			}
		}else if($to != 'null' && $from != 'null' && $cust == 'junk'){
			if($type == "rentOut"){
				$query = $this->db->query("select cast(concat(ro.out_date, ' ', ro.out_time) as datetime) as rentOut_dateTime ,s.prd_name,rod.original_qty,cast(concat(ri.in_date, ' ', ri.in_time) as datetime) as rentIn_dateTime,rid.prd_qty,rid.prd_price,ri.discount,ri.total_amount,(case when rod.status = 0 then 'Pending' else 'Completed' end) as Status from 
				rentout ro inner join rentout_detail rod on ro.invoice_id = rod.invoice_id inner join store s on rod.prd_id = s.prd_id
				left join (rentin ri inner join rentin_detail rid on ri.invoice_id = rid.invoice_id) on ro.invoice_id = rid.out_invoice_id where ro.out_date >= str_to_date('".$from."', '%Y-%m-%d') and ro.out_date <= str_to_date('".$to."', '%Y-%m-%d')");
			}else if($type == "rentIn"){
				$query = $this->db->query("select cast(concat(ro.out_date, ' ', ro.out_time) as datetime) as rentOut_dateTime ,s.prd_name,rod.original_qty,cast(concat(ri.in_date, ' ', ri.in_time) as datetime) as rentIn_dateTime,rid.prd_qty,rid.prd_price,ri.discount,ri.total_amount,(case when rod.status = 0 then 'Pending' else 'Completed' end) as Status from 
				rentout ro inner join rentout_detail rod on ro.invoice_id = rod.invoice_id inner join store s on rod.prd_id = s.prd_id
				left join (rentin ri inner join rentin_detail rid on ri.invoice_id = rid.invoice_id) on ro.invoice_id = rid.out_invoice_id where ri.in_date >= str_to_date('".$from."', '%Y-%m-%d') and ri.in_date <= str_to_date('".$to."', '%Y-%m-%d')");
			}
		}else if(($to == 'null' || $from == 'null') && $cust != 'null'){	// }else if($to == null && $from == null && $cust){
			if($type == "cust_name"){
					$query = $this->db->query("select cast(concat(ro.out_date, ' ', ro.out_time) as datetime) as rentOut_dateTime ,s.prd_name,rod.original_qty,cast(concat(ri.in_date, ' ', ri.in_time) as datetime) as rentIn_dateTime,rid.prd_qty,rid.prd_price,ri.discount,ri.total_amount,(case when rod.status = 0 then 'Pending' else 'Completed' end) as Status from 
					rentout ro inner join rentout_detail rod on ro.invoice_id = rod.invoice_id inner join store s on rod.prd_id = s.prd_id
					left join (rentin ri inner join rentin_detail rid on ri.invoice_id = rid.invoice_id) on ro.invoice_id = rid.out_invoice_id where ro.temp_name = '".urldecode($cust)."'");
				}else if($type == "contact_no"){
					$query = $this->db->query("select cast(concat(ro.out_date, ' ', ro.out_time) as datetime) as rentOut_dateTime ,s.prd_name,rod.original_qty,cast(concat(ri.in_date, ' ', ri.in_time) as datetime) as rentIn_dateTime,rid.prd_qty,rid.prd_price,ri.discount,ri.total_amount,(case when rod.status = 0 then 'Pending' else 'Completed' end) as Status from 
					rentout ro inner join rentout_detail rod on ro.invoice_id = rod.invoice_id inner join store s on rod.prd_id = s.prd_id
					left join (rentin ri inner join rentin_detail rid on ri.invoice_id = rid.invoice_id) on ro.invoice_id = rid.out_invoice_id where ro.contact_no='".$cust."'");
				}else if($type == "business_name"){
					$query = $this->db->query("select cast(concat(ro.out_date, ' ', ro.out_time) as datetime) as rentOut_dateTime ,s.prd_name,rod.original_qty,cast(concat(ri.in_date, ' ', ri.in_time) as datetime) as rentIn_dateTime,rid.prd_qty,rid.prd_price,ri.discount,ri.total_amount,(case when rod.status = 0 then 'Pending' else 'Completed' end) as Status from 
					rentout ro inner join rentout_detail rod on ro.invoice_id = rod.invoice_id inner join store s on rod.prd_id = s.prd_id
					left join (rentin ri inner join rentin_detail rid on ri.invoice_id = rid.invoice_id) on ro.invoice_id = rid.out_invoice_id where ro.cust_id =".$cust);
				}else if($type == "prd_class"){
					$query = $this->db->query("select cast(concat(ro.out_date, ' ', ro.out_time) as datetime) as rentOut_dateTime ,s.prd_name,rod.original_qty,cast(concat(ri.in_date, ' ', ri.in_time) as datetime) as rentIn_dateTime,rid.prd_qty,rid.prd_price,ri.discount,ri.total_amount,(case when rod.status = 0 then 'Pending' else 'Completed' end) as Status from 
					rentout ro inner join rentout_detail rod on ro.invoice_id = rod.invoice_id inner join store s on rod.prd_id = s.prd_id
					left join (rentin ri inner join rentin_detail rid on ri.invoice_id = rid.invoice_id) on ro.invoice_id = rid.out_invoice_id where s.prd_class = '".urldecode($cust)."'");
				}
		}else{	//all null
			$query = $this->db->query("select cast(concat(ro.out_date, ' ', ro.out_time) as datetime) as rentOut_dateTime ,s.prd_name,rod.original_qty,cast(concat(ri.in_date, ' ', ri.in_time) as datetime) as rentIn_dateTime,rid.prd_qty,rid.prd_price,ri.discount,ri.total_amount,(case when rod.status = 0 then 'Pending' else 'Completed' end) as Status from 
			rentout ro inner join rentout_detail rod on ro.invoice_id = rod.invoice_id inner join store s on rod.prd_id = s.prd_id
			left join (rentin ri inner join rentin_detail rid on ri.invoice_id = rid.invoice_id) on ro.invoice_id = rid.out_invoice_id");
		}
		return $query->result();
	}
	function get_saleReport($from,$to,$cust,$type){
		if($cust != 'null' && $to != 'null' && $from != 'null'){
			if($type == "cust_name"){
				$query = $this->db->query("select s.*,c.*,CONCAT( 'S-', s.invoice_id ) as virtual_invoice from sale s left join customer c on s.customer_id = c.cust_id where s.date >= str_to_date('".$from."', '%Y-%m-%d') and s.date <= str_to_date('".$to."', '%Y-%m-%d') and s.temp_name = '".urldecode($cust)."'");
			}else if($type == "contact_no"){
				$query = $this->db->query("select s.*,c.*,CONCAT( 'S-', s.invoice_id ) as virtual_invoice from sale s left join customer c on s.customer_id = c.cust_id where s.date >= str_to_date('".$from."', '%Y-%m-%d') and s.date <= str_to_date('".$to."', '%Y-%m-%d') and s.contact_no = '".$cust."'");
			}else if($type == "business_name"){
				$query = $this->db->query("select s.*,c.*,CONCAT( 'S-', s.invoice_id ) as virtual_invoice from sale s left join customer c on s.customer_id = c.cust_id where s.date >= str_to_date('".$from."', '%Y-%m-%d') and s.date <= str_to_date('".$to."', '%Y-%m-%d') and s.customer_id =".$cust);
			}else if($type == "prd_class"){
				$query = $this->db->query("select s.*,c.*,CONCAT( 'S-', s.invoice_id ) as virtual_invoice from sale s left join sale_detail sd on s.invoice_id = sd.invoice_id left join customer c on s.customer_id = c.cust_id left join store st on st.prd_id = sd.prd_id where s.date >= str_to_date('".$from."', '%Y-%m-%d') and s.date <= str_to_date('".$to."', '%Y-%m-%d') and st.prd_class ='".urldecode($cust)."'");
			}
		}else if($to != 'null' && $from != 'null' && $cust == 'null'){
			$query = $this->db->query("select s.*,c.*,CONCAT( 'S-', s.invoice_id ) as virtual_invoice from sale s left join customer c on s.customer_id = c.cust_id where s.date >= str_to_date('".$from."', '%Y-%m-%d') and s.date <= str_to_date('".$to."', '%Y-%m-%d')");
		}else if(($to == 'null' || $from == 'null') && $cust != 'null'){	// }else if($to == null && $from == null && $cust){
			if($type == "cust_name"){
				$query = $this->db->query("select s.*,c.*,CONCAT( 'S-', s.invoice_id ) as virtual_invoice from sale s left join customer c on s.customer_id = c.cust_id where s.temp_name = '".urldecode($cust)."' ");
			}else if($type == "contact_no"){
				$query = $this->db->query("select s.*,c.*,CONCAT( 'S-', s.invoice_id ) as virtual_invoice from sale s left join customer c on s.customer_id = c.cust_id where s.contact_no = '".$cust."' ");
			}else if($type == "business_name"){
				$query = $this->db->query("select s.*,c.*,CONCAT( 'S-', s.invoice_id ) as virtual_invoice from sale s left join customer c on s.customer_id = c.cust_id where s.customer_id =".$cust);
			}else if($type == "prd_class"){
				$query = $this->db->query("select s.*,c.*,CONCAT( 'S-', s.invoice_id ) as virtual_invoice from sale s left join sale_detail sd on s.invoice_id = sd.invoice_id left join customer c on s.customer_id = c.cust_id left join store st on st.prd_id = sd.prd_id where st.prd_class ='".urldecode($cust)."'");
			}
		}else{	//all null
			$query = $this->db->query("select s.*,c.*,CONCAT( 'S-', s.invoice_id ) as virtual_invoice from sale s left join customer c on s.customer_id = c.cust_id");
		}
		return $query->result();
	}
	function get_purchaseReport($from,$to,$sup){
		if($sup != 'null' && $to != 'null' && $from != 'null'){
			$query = $this->db->query("select p.*,s.*,CONCAT( 'P-', p.invoice_id ) as virtual_invoice from purchase p left join supplier s on p.sup_id = s.sup_id where p.date >= str_to_date('".$from."', '%Y-%m-%d') and p.date <= str_to_date('".$to."', '%Y-%m-%d') and p.sup_id =".$sup);
		}else if($to != 'null' && $from != 'null' && $sup == 'null'){
			$query = $this->db->query("select p.*,s.*,CONCAT( 'P-', p.invoice_id ) as virtual_invoice from purchase p left join supplier s on p.sup_id = s.sup_id where p.date >= str_to_date('".$from."', '%Y-%m-%d') and p.date <= str_to_date('".$to."', '%Y-%m-%d')");
		}else if(($to == 'null' || $from == 'null') && $sup != 'null'){	// }else if($to == null && $from == null && $cust){
			$query = $this->db->query("select p.*,s.*,CONCAT( 'P-', p.invoice_id ) as virtual_invoice from purchase p left join supplier s on p.sup_id = s.sup_id where p.sup_id =".$sup);
		}else{	//all null
			$query = $this->db->query("select p.*,s.*,CONCAT( 'P-', p.invoice_id ) as virtual_invoice from purchase p left join supplier s on p.sup_id = s.sup_id");
		}
		return $query->result();
	}
	function get_supplierReport($from,$to,$sup){
		if($sup != 'null' && $to != 'null' && $from != 'null'){
			$query = $this->db->query("select p.*,s.*,CONCAT( 'SP-', p.invoice_id ) as virtual_invoice from purchase p left join supplier s on p.sup_id = s.sup_id where p.date >= str_to_date('".$from."', '%Y-%m-%d') and p.date <= str_to_date('".$to."', '%Y-%m-%d') and p.sup_id =".$sup);
		}else if($to != 'null' && $from != 'null' && $sup == 'null'){
			$query = $this->db->query("select p.*,s.*,CONCAT( 'SP-', p.invoice_id ) as virtual_invoice from purchase p left join supplier s on p.sup_id = s.sup_id where p.date >= str_to_date('".$from."', '%Y-%m-%d') and p.date <= str_to_date('".$to."', '%Y-%m-%d')");
		}else if(($to == 'null' || $from == 'null') && $sup != 'null'){	// }else if($to == null && $from == null && $cust){
			$query = $this->db->query("select p.*,s.*,CONCAT( 'SP-', p.invoice_id ) as virtual_invoice from purchase p left join supplier s on p.sup_id = s.sup_id where p.sup_id =".$sup);
		}else{	//all null
			$query = $this->db->query("select p.*,s.*,CONCAT( 'SP-', p.invoice_id ) as virtual_invoice from purchase p left join supplier s on p.sup_id = s.sup_id");
		}
		return $query->result();
	}
	function get_damageReport($from,$to){
		$query = $this->db->query("select dp.*,s.prd_name from damageproducts dp left join store s on s.prd_id = dp.prd_id where dp.date >= str_to_date('".$from."', '%Y-%m-%d') and dp.date <= str_to_date('".$to."', '%Y-%m-%d') and dp.status=1");
		return $query->result();
	}
	function get_serviceReport($from,$to){
		$query = $this->db->query("select distinct s.* from services s,services_detail sd where s.invoice_id = sd.invoice_id and s.date >= str_to_date('".$from."', '%Y-%m-%d') and s.date <= str_to_date('".$to."', '%Y-%m-%d')");
		return $query->result();
	}
}
?>