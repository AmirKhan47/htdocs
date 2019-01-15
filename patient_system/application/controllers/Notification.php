<?php
class Notification extends CI_Controller{
	
	function __construct(){

		parent:: __construct();
		$this->load->model('Mod_common');
	}

  public function update_status($id){
    $where=array('id'=> $id);
    $update_array= array('admin_read_status' => 1,);
    $update=$this->Mod_common->update_user('notifications',$update_array,$where);
    if($update){
      $get_data=$this->Mod_common->select_record('notifications',$where);
      if($get_data){
        redirect(SURL.'Notification/checked/'.$get_data['assitant_id']);
      }
    }

  }

  public function checked($id){

    $query="SELECT mh.illness, p.name,p.cnic, d.disease_name, d.disease_description, d.disease_remedy, d.medicine_name, d.medicine_usage FROM patient_disease pd LEFT JOIN patient p ON p.id = pd.patient_id LEFT JOIN diseases d ON d.disease_id = pd.disease_id LEFT JOIN medical_history mh ON mh.patient_id = p.id WHERE pd.id =$id";
    $get=$this->db->query($query);
    $data['disease']=$get->row_array();
   // echo "<pre>";
   // print_r ($data['disease']);
   // echo "</pre>";
   // exit();
   
     
    $this->load->view('symptoms/notification_receipt',$data);
     // echo "<pre>";
     // print_r ($update);
     // echo "</pre>";
     // exit();
  // print_r($data['disease']);exit;
    

  }
  public function message_review()
  {
     if($this->input->post('review'))
     {
      $message_view = array(

      
  'name' => $this->input->post('name'),
  'cnic' => $this->input->post('cnic'),
  
 'disease_name' =>   $this->input->post('disease_name'),
   
  'disease_description' =>  $this->input->post('disease_description'),
   
  'disease_remedy' =>  $this->input->post('disease_remedy'),
    
   'medicine_name' =>  $this->input->post('medicine_name'),
   
   'medicine_usage' => $this->input->post('medicine_usage'),
     
     'doctor_message' => $this->input->post('doctor_message'),
     'illness' => $this->input->post('illness'),
       
   );
  }
    $table = 'medical_assistant';
     
       $add_user =  $this->Mod_common->insert_user($table,$message_view);
     
       if($add_user)
       {
           redirect(SURL.'Doctor/doctor_review');
       }

}

}

?>