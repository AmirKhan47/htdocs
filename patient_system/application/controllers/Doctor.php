<?php
class Doctor extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Mod_common');
	}
	public function doctor_review()
	{
		if($this->session->has_userdata('id'))
		{
			if($this->input->post('send_to_doctor'))
			{
              $ins_array= array(
              'patient_id' => $this->input->post('patient_id'),
              'disease_id' => $this->input->post('disease_id')
             
              );
              if($this->input->post('emergency')=='')
              {
              	$emergency = 0;
              }
              else
              {
              	$emergency = $this->input->post('emergency');
              }
             // $add_user =  $this->Mod_common->insert_user('patient',$ins_array);
              $add_user =  $this->Mod_common->insert_user('patient_disease',$ins_array);
              if($add_user)
              {
              	$ins_array= array(
              		'title' => 'New Patient Check',
              		'message' => "New Patient Checked",
              		'assitant_id' => $this->db->insert_id(),
              		'admin_read_status' => 0,
              		'emergency' => $emergency,
              		'created_date' => date('y/m/d'),

              	);
              	$add_user =  $this->Mod_common->insert_user('notifications',$ins_array);
                
              	redirect(SURL.'Patient/patient_reg');

              }


			}
			else{
			 $table='medical_assistant';
			

     $data['doctor_view'] = $this->Mod_common->get_record($table);
         }

     $this->load->view('doctor/doctor',$data);
	  
	}
	else
	{
		redirect(SURL.'Login/validate_user');
	}
	}
   public function edit_notification($id)
   {
    // echo $id;
    
     // $id = $this->input->post('id');
     $table='medical_assistant';
      $where = array(
           'id'=> $id,
         );
       $data['disease'] = $this->Mod_common->select_record($table,$where);
       $this->load->view('symptoms/edit_notification_receipt',$data);
   
     }
      public function update_notification($id)
    {
     
      

     if($this->input->post('update'))
    {
      $message_view = array(

      
  'name' => $this->input->post('name'),
  
 'disease_name' =>   $this->input->post('disease_name'),
   
  'disease_description' =>  $this->input->post('disease_description'),
   
  'disease_remedy' =>  $this->input->post('disease_remedy'),
    
   'medicine_name' =>  $this->input->post('medicine_name'),
   
   'medicine_usage' => $this->input->post('medicine_usage'),
     
     'doctor_message' => $this->input->post('doctor_message'),
       
   );
  
       $table = 'medical_assistant';
         $where = array ( "id" => $id  ) ;
        
       $update_user = $this->Mod_common->update_user($table,$message_view,$where);
       if($update_user )
       {
        redirect(SURL.'Doctor/doctor_review');
       }
       else
       {
          
          redirect(SURL.'Doctor/edit_notification');
       }
     
    }
    }

	

   

}
?>