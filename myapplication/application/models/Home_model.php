<?php
ob_start();
class Home_model extends CI_Model{

public function getFirstData(){	

$query = $this->db->query('select (case when 
        sum( case when payment_type ="Paid	" then transffer_amount end) is null then 0 
        else sum( case when payment_type ="Paid	" then transffer_amount end) end
       ) as paid_Amount,
	(case when 
 	sum( case when payment_type ="Received	" then transffer_amount end) is null then 0
	else sum( case when payment_type ="Received	" then transffer_amount end) end 
	) as Received_Amount , MONTH(STR_TO_DATE(transffer_date, "%d/%m/%Y")) as month
 from bank_transfer where YEAR(STR_TO_DATE(transffer_date, "%d/%m/%Y"))=YEAR(CURDATE())
group by YEAR(STR_TO_DATE(transffer_date, "%d/%m/%Y")), 
MONTH(STR_TO_DATE(transffer_date, "%d/%m/%Y"))');

		$row = array();
		if($query->num_rows() > 0){
			$row = $query->result_array();
			
		}
		//var_dump($row);
		return $row;

}



public function getData($year){	

$query = $this->db->query('select (case when 
        sum( case when payment_type ="Paid	" then transffer_amount end) is null then 0 
        else sum( case when payment_type ="Paid	" then transffer_amount end) end
       ) as paid_Amount,
	(case when 
 	sum( case when payment_type ="Received	" then transffer_amount end) is null then 0
	else sum( case when payment_type ="Received	" then transffer_amount end) end 
	) as Received_Amount , MONTH(STR_TO_DATE(transffer_date, "%d/%m/%Y")) as month
from bank_transfer where YEAR(STR_TO_DATE(transffer_date, "%d/%m/%Y"))="'.$year.'"
group by YEAR(STR_TO_DATE(transffer_date, "%d/%m/%Y")), 
MONTH(STR_TO_DATE(transffer_date, "%d/%m/%Y"))');

		$row = array();
		if($query->num_rows() > 0){
			$row = $query->result_array();
			
		}
		return $row;

}

	function showRating($year,$month){
		$query = $this->db->query("select l.labour_name,
(select r.overall from rating r where r.engineer_id=4 AND YEAR(STR_TO_DATE(date, '%Y-%m')) ='".$year."' And MONTH(STR_TO_DATE(date, '%Y-%m')) ='".$month."' and r.labour_id=l.labour_id) as tauheed,
(select r.overall from rating r where r.engineer_id=8 AND YEAR(STR_TO_DATE(date, '%Y-%m')) ='".$year."' And MONTH(STR_TO_DATE(date, '%Y-%m')) ='".$month."' and r.labour_id=l.labour_id) as saad,
(select r.overall from rating r where r.engineer_id=5 AND YEAR(STR_TO_DATE(date, '%Y-%m')) ='".$year."' And MONTH(STR_TO_DATE(date, '%Y-%m')) ='".$month."' and r.labour_id=l.labour_id) as parsad,
(select r.overall from rating r where r.engineer_id=6 AND YEAR(STR_TO_DATE(date, '%Y-%m')) ='".$year."' And MONTH(STR_TO_DATE(date, '%Y-%m')) ='".$month."' and r.labour_id=l.labour_id) as yousef from labour l");
		$row = array();
		if($query->num_rows() > 0){

			$row = $query->result_array();
			return $row;
		}
		else
		{
			return false;
		}

	}

}
?>	