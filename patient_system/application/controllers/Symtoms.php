<?php
class Symtoms extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Mod_common');
	}
	
		 public function symtoms()	 
        {
        	
 
     if($this->input->post('submit'))
     {
     	 $check_symtoms = array(

      
    $this->input->post('symtom_1'),
  
     $this->input->post('symtom_2'),
   
     $this->input->post('symtom_3'),
   
     $this->input->post('symtom_4'),
    
      $this->input->post('symtom_5'),
   
     $this->input->post('symtom_6'),
     
       $this->input->post('symtom_7'),
      
       $this->input->post('emergency'),
       
   );

      $table='disease_symtoms';
      $where = $check_symtoms;
      $data['check_disease'] = $this->Mod_common->select_records($table,$where);
       $where= array('disease_id' => $data['check_disease']['disease_id'],);
       $data['disease']=$this->Mod_common->select_record('diseases',$where);
      $ins_array = array(
         'illness' => $this->input->post('illness'),
      'reporting_date' => date('y/m/d'),
      'patient_id' => $this->input->post('patient_id'), 
        );
        $table ="medical_history";
        $add_data = $this->Mod_common->insert_user($table,$ins_array);
        $data['patient'] = $this->input->post('patient_id'); 
        $data['emergency'] = $this->input->post('emergency');
        $data['history'] = $this->input->post('medical_id');
         $table = 'medical_history';
          $where = array('id' => $add_data);
         $data['history'] = $this->Mod_common->select_record($table,$where);
       // redirect(SURL.'Patient/patient_reg');
     }
     $this->load->view('symptoms/disease_receipt',$data); 


   }

  

		
	



}

?>