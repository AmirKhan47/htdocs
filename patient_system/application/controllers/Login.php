<?php
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Mod_common');
		

	}

 public function register()
{

	if($this->input->post('submit_reg'))
	{ 
       
		
       $ins_array=array(
       "name" => $this->input->post('name'),
       "email" => $this->input->post('email'),
     "password" => $this->input->post('password'),
     "type" => $this->input->post('type'),
       );
       $table = 'register';
        if($this->input->post('type')== 1){
                $table = 'doctor';
              
                
               }
             else if($this->input->post('type')== 2){
                $table = 'assistant';
               
               }
       
       $add_user =  $this->Mod_common->insert_user($table,$ins_array);
      $add_user =  $this->Mod_common->insert_user('register',$ins_array);
        if($add_user == true)
       {
       
        redirect(SURL.'Login/validate_user');
       }  
       else
       {
       	return false;
           redirect(SURL.'Login/register');
       } 

	}
	$this->load->view('register.php');
}



public function email_aviliable()
{
	if($this->Mod_common->email_check($_POST["email"]))
        {
           
       	// echo'<label class="text-danger"><span class="glyphicon glyphicon-remove">Email Already exsits</span></label>';
      echo 'yes';
      return false;
       }
       else
       {
       		
       		// return  true;
       }
}
public function cnic_aviliable()
{
  if($this->Mod_common->cnic_check($_POST["cnic"]))
        {
           
        // echo'<label class="text-danger"><span class="glyphicon glyphicon-remove">Email Already exsits</span></label>';
      echo 'yes';
      return false;
       }
       else
       {
          echo 'no';
          // return  true;
       }
}





	public function validate_user()
    {
    	 $email = ($this->input->post('email'));
        $password = ($this->input->post('password'));
        if ($email != '' && $password != '') {
           $isvalid_user = $this->Mod_common->login_process($email, $password);

           
            if ($isvalid_user) {
                
                $login_sess_array = array(
                    'logged_in' => true,
                    'id' => $isvalid_user['id'],
                      "name" => $isvalid_user['name'],
                      "email" => $this->input->post('email'),
                       "password" => $this->input->post('password'),
                       "type" => $isvalid_user['type'],
                     );

                $this->session->set_userdata($login_sess_array);
                  $type = $isvalid_user['type'];

             if  ($this->session->has_userdata('id'))
              {
              
               echo $type;

                }
                else{
                   echo 'no';
                }
            } 
            else {

               echo 'no';
                // redirect(SURL . 'Login/validate_user');

            }
            // end if($chk_isvalid_user) 

           
            // redirect(SURL . 'Symtoms/symtoms');
        }else{
          $this->load->view('login.php');

        }

       
    	
    }
      public function logout() {

        $sess_items = array(
            'logged_in' => false,
            'id' => "",
             'name' => "",
            'email' => "",
            
        );
        $this->session->unset_userdata($sess_items);
        $this->session->sess_destroy();
        
        redirect(SURL . 'Login/validate_user');
    }
    



}
?>