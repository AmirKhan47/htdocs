<?php
class Patient extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Mod_common');
	}

public function patient_reg()
{

	if($this->input->post('patient_reg'))
	{ 
       
		
       $ins_array=array(

       "name" => $this->input->post('name'),
       "address" => $this->input->post('address'),
     "cnic" => $this->input->post('cnic'),
     "gender" => $this->input->post('gender'),
     "phone" => $this->input->post('phone'),
       );
        $table = 'patient';
     
       $add_user =  $this->Mod_common->insert_user($table,$ins_array);
       $where = array('id' => $add_user );
       $data['result'] = $this->Mod_common->select_record($table,$where);
       // echo "<pre>";
       // print_r ($data['result']);
       // echo "</pre>";
       // exit();
        if(!empty($data['result']))
       {

       	$data['symtoms']=$this->Mod_common->get_symtoms();
        $this->load->view('symptoms/symtoms',$data);
       }  
       else
       {
       	
           // redirect(SURL.'Patient/patient_reg');
       } 

	}
	else{
	$this->load->view('patient/patient_reg');
}
 
}



}
?>