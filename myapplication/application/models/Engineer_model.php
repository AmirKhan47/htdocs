<?php
class Engineer_model extends CI_Model{


	public function addStaff($data){
		$this->db->insert('engineer', $data);
        $prd_id = $this->db->insert_id();
        return $prd_id;
	}

	function deleteFile($id){
		$ids = explode(',', $id);
		
		for($i=0;$i<sizeof($ids);$i++){

			$query = $this->db->query("DELETE FROM engineer_documents WHERE doc_id='".$ids[$i]."'");
			if($this->db->affected_rows() > 0)
			{
				continue;
			}
			else
			{
				return false;
			}
		}

		return $id;	
	}

	public function get_staff($id)
    {
        $this->db->from('engineer');
        $this->db->where('engineer_id',$id);
        $query = $this->db->get();

        return $query->row();
    }

	function getAllengineer(){
		
		$query = $this->db->query("select * from engineer");
		// $query = $this->db->get("engineer");
		$row = array();
		if($query->num_rows() > 0){
			// $row = $query->result_array();
			// return $row;
        return $query->result();
		}else{
			return false;
		}
		
	}
public function updateStaff($where, $data)
    {
    	$id=(int)($where);
        $this->db->where('engineer_id',$id);
        $this->db->update('engineer', $data);
        $rows= $this->db->affected_rows();
        return $rows;
    }

    public function delete_staff($id)
    {
        $this->db->where('engineer_id', $id);
        $this->db->delete('engineer');
        $this->db->where('engineer_id', $id);
        $this->db->delete('engineer_documents');

    }

	function getEngineerfiles($id){
		
		$this->db->select("*");
		$this->db->where('engineer_id',$id);
		$query = $this->db->get("engineer_documents");
		//$row = array();
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		
	}

	function download($file_name){
		echo $file_name;
		$file = getcwd()."\\uploaded\\".$file_name; 
		echo $file;
		// if (file_exists($file)) {
		// 	header('Content-Description: File Transfer');
		// 	header('Content-Type: application/octet-stream');
		// 	header('Content-Disposition: attachment; filename="'.basename($file).'"');
		// 	header('Expires: 0');
		// 	header('Cache-Control: must-revalidate');
		// 	header('Pragma: public');
		// 	header('Content-Length: ' . filesize($file));
		// 	readfile($file);
		// 	//return true;
		// }else{
		// 	//return false;
		// }
		
	}
	function upload($id){
		
		global $file_names;

		if($_FILES['files']['name']!=""){
        //Loop through each file
			// for($i=0; $i<count($_FILES['files']['name']); $i++) {
          //Get the temp file path
			$tmpFilePath = $_FILES['files']['tmp_name'];

            //Make sure we have a filepath
			if($tmpFilePath != ""){

                //save the filename
				$shortname = $_FILES['files']['name'];

                //save the url and the file
				$filePath = "uploaded/".$_FILES['files']['name'];

                //Upload the file into the temp dir
				if(move_uploaded_file($tmpFilePath, $filePath)) {

					$files_name = $shortname;

					$data = array(
						'engineer_id' =>$id,
						'type' => $this->input->post('type') ,
						'name' => $files_name,
						'expiry_date' => $this->input->post('date') ,
						);

					$this->db->insert('engineer_documents',$data);
					if($this->db->affected_rows() >0) {
						return true;
					}else{
						return false;
					}
				}
			}
			
		}
	}
	function update(){

		$query = $this->db->query("UPDATE engineer set engineer_name = '".$this->input->post('name')."' , basic_salary = '".$this->input->post('salary')."' ,  ini_salary = '".$this->input->post('ini_salary')."' , total_salary = '".$this->input->post('total_salary')."'  WHERE engineer_id='".$this->input->post('id')."' ");
		if($this->db->affected_rows() >0) {
			return true ;
		}else{
			return false ;
		}
		
	}
	//vocation details........
	public function add_vocations($id){
		$data = array(
			'engineer_id' => $id ,
			'date' => $this->input->post('date') ,
			'type' => 'Vocation',
			'description' => $this->input->post('description')
			
			);

		$this->db->insert('engineer_details',$data);
		if($this->db->affected_rows() >0) {
			return true;
		}else{
			return false ;
		}
	}
		//adnavce Money........
	public function add_advanceMoney($data){
		$arr = explode('_', $data);

		if($this->input->post('type')=="paid"){

			$result = ($this->It_model->getBankBalance('9'));

			if($result[0]['account_balance']==$this->input->post('amount') || 
				$result[0]['account_balance']>$this->input->post('amount')){

				$balance_paid = array();
			$balance_paid["account_balance"]=(int)$result[0]['account_balance']-(int)$this->input->post('amount');

			$this->db->where(['id' => '9' ]);
			$this->db->update('bank_account',$balance_paid);
			if($this->db->affected_rows() > 0){

				$data = array(
					'bank_id' => '9' ,
					'from_id_column' => 'engineer_id',
					'from_name' =>$arr[1],
					'other_id' => $arr[0],
					'trans_type' => 'Advance Money' ,			
					'payment_type' => 'Paid	',
					'paid_method' => 'cash',
					'transffer_amount' =>$this->input->post('amount'),
					'transffer_date' => $this->input->post('date')  
					);
				$this->db->insert('bank_transfer',$data);
				if($this->db->affected_rows() > 0){

					$data = array(
						'engineer_id' => $arr[0] ,
						'date' => $this->input->post('date') ,
						'type' => 'Advance Money Paid',
						'amount' => $this->input->post('amount')

						);
					$this->db->insert('engineer_details',$data);
					if($this->db->affected_rows() >0) {

						$query = $this->db->query("UPDATE engineer set  advance_money = advance_money + '".$this->input->post('amount')."' WHERE engineer_id='".$arr[0]."' ");
						if($this->db->affected_rows() >0) {
							return true ;
						}else{
							return false ;
						}

					}else{
						return false ;
					}


				}else{
					return false ;
				}

			}else{
				return false ;
			}



		}else{
			return false ;
		}

	 }// end of paid if.......
	 else{
	 	$query = $this->db->query("update bank_account set account_balance = account_balance + ".$this->input->post('amount')." where id = '9'");
	 	if($this->db->affected_rows() >0) {

	 		$data = array(
	 			'bank_id' => '9' ,
	 			'from_id_column' => 'engineer_id',
	 			'from_name' =>$arr[1],
	 			'other_id' => $arr[0],
	 			'trans_type' => 'Advance Money' ,			
	 			'payment_type' => 'Received	',
	 			'paid_method' => 'cash',
	 			'transffer_amount' =>$this->input->post('amount'),
	 			'transffer_date' => $this->input->post('date')  
	 			);
	 		$this->db->insert('bank_transfer',$data);
	 		if($this->db->affected_rows() > 0){

	 			$data = array(
	 				'engineer_id' => $arr[0] ,
	 				'date' => $this->input->post('date') ,
	 				'type' => 'Advance Money Received',
	 				'amount' => $this->input->post('amount')

	 				);
	 			$this->db->insert('engineer_details',$data);
	 			if($this->db->affected_rows() >0) {

	 				$query = $this->db->query("UPDATE engineer set  advance_money =advance_money - '".$this->input->post('amount')."' WHERE engineer_id='".$arr[0]."' ");
	 				if($this->db->affected_rows() >0) {
	 					return true ;
	 				}else{
	 					return false ;
	 				}

	 			}else{
	 				return false ;
	 			}


	 		}else{
	 			return false ;
	 		}

	 	}else{
	 		return false ;
	 	}
	 }
	}
}
?>