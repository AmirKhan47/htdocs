<?php
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Mod_common');
	}
	// public function admin_panel()
	// {
	// 	$this->load->view('admin/admin');
	// }
	 public function manage_doctor()
   {
    
     $table='doctor';

     $data['user_list'] = $this->Mod_common->get_record($table);
     $table='assistant';

     $data['assistant'] = $this->Mod_common->get_record($table);

     $this->load->view('admin/admin',$data);


    

   }
    public function delete_doctor($id)
   {
       $table = "doctor";
       $where = array ( "id" => $id );

       $delete_user = $this->Mod_common->delete_record($table,$where);
       if($delete_user)
       {
        redirect(SURL.'Admin/manage_doctor');
       }
       else
       {
        echo "something went wrong";
       }

   }
   public function view_doctor()
   {
   	$this->load->view('admin/add_doctor');
   }
   public function add_doctor()
   {
     
     if($this->input->post('add_doctor'))
     {
                    $ins_array=array(
                     "name"=> $this->input->post('name'),
                     "email" => $this->input->post('email'),
                     "password" => $this->input->post('password'),
                     "type" => 1,
                    
                      );
       $table = 'doctor';
       
       $add_user = $this->Mod_common->insert_user($table,$ins_array);
       $add_user = $this->Mod_common->insert_user('register',$ins_array);
       if($add_user)
       {
        redirect(SURL.'Admin/manage_doctor');
       }  
       else
       {
           redirect(SURL.'Admin/add_doctor');
       } 
 }
     else
     {
      echo "invalid";
     }
   
    

   }
   //  public function manage_assistant()
   // {
    
   //   $table='assistant';

   //   $data['user_list'] = $this->Mod_common->get_record($table);

   //    echo "<pre>";
   //    print_r ($data['user_list']);
   //    echo "</pre>";
   //    exit();
   //   $this->load->view('admin/admin',$data);
    

   // }
    public function delete_assistant($id)
   {
       $table = "assistant";
       $where = array ( "id" => $id );

       $delete_user = $this->Mod_common->delete_record($table,$where);
       if($delete_user)
       {
        redirect(SURL.'Admin/manage_doctor');
       }
       else
       {
        echo "something went wrong";
       }

   }
   public function view_assistant()
   {
   	$this->load->view('admin/add_assistant');
   }
   public function add_assistant()
   {
     
     if($this->input->post('add_doctor'))
     {
                    $ins_array=array(
                     "name"=> $this->input->post('name'),
                     "email" => $this->input->post('email'),
                     "password" => $this->input->post('password'),
                     "type" => 1,
                    
                      );
       $table = 'assistant';
       
       $add_user = $this->Mod_common->insert_user($table,$ins_array);
       $add_user = $this->Mod_common->insert_user('register',$ins_array);
       if($add_user)
       {
        redirect(SURL.'Admin/manage_doctor');
       }  
       else
       {
           redirect(SURL.'Admin/add_assistant');
       } 
 }
     else
     {
      echo "invalid";
     }
   
    

   }
}
?>