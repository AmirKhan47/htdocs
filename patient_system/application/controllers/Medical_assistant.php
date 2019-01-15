<?php
class Medical_assistant extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Mod_common');
	}

public function assistant_view()
{
	
     $table='medical_assistant';

     $data['doctor_view'] = $this->Mod_common->get_record($table);
     $this->load->view('assistant/manage_assistant',$data);
}
public function edit_assistant($id)
   {
    // echo $id;
    
     // $id = $this->input->post('id');
     $table='medical_assistant';
      $where = array(
           'id'=> $id,
         );
       $data['disease'] = $this->Mod_common->select_record($table,$where);
       $this->load->view('assistant/view_assistant',$data);
   
     }


}
?>