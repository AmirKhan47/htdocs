<?php

class Login extends CI_Controller{

	public function index()
	{
		
		$data['login'] = TRUE;

		$data['title'] = "login";  	 	
		$data['sub_title'] = "Login Page";

		// $data['error_message'] = '<strong>Warning !</strong> An error has occurred.';
		
		$this->load->view('LoginHome/user_login',$data);
	}

public function admin()
	{
		$data['login'] = TRUE;
        $data['title'] = "login";
        $data['sub_title'] = "Login Page";
       
		// $data['error_message'] = '<strong>Warning !</strong> An error has occurred.';
		
		$this->load->view('LoginHome/admin_login',$data);
	}	
function create_login()
    {

          if ($result = $this->Login_model->create_login()) {

             $this->session->set_flashdata('success',"User Added successfully");
             redirect('Login/admin');

         }else{
             $this->session->set_flashdata('error',"User Not Added successfully");
             redirect('Login/admin');

         }
    
  }
function forget_login()
{

      if ($result = $this->Login_model->forget_login()) {

         $this->session->set_flashdata('success',"Password Details sent successfully");
         redirect('Login');

     }else{
         $this->session->set_flashdata('error',"Password Details not sent successfully");
         redirect('Login');

     }

}
function admin_forget_login()
{

      if ($result = $this->Login_model->forget_login()) {

         $this->session->set_flashdata('success',"Password Details sent successfully");
         redirect('Login/admin');

     }else{
         $this->session->set_flashdata('error',"Password Details not sent successfully");
         redirect('Login/admin');

     }

}
public function admin_login(){

	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$stat=0;
	$user_id = $this->Login_model->user_login($username,$password);

		if($user_id){
			$stat=1;
			$user_data = array(

				'user_id'=>	$user_id[0]['user_id'],
				'user_name'=>$user_id[0]['user_name'],
				'logged_in'=>$stat,
				'user_type'=>$user_id[0]['user_type']

				);
			
			$this->session->set_userdata($user_data);
			$this->session->set_flashdata('login_success',"Welcome to this");
			
			if(trim($user_id[0]['user_type'])=='admin') {
				// echo 'hh';
				redirect('Home');
			
			}else{
				// echo "string";
				redirect('Home/homeSecond');
			}

		}else{


			$this->session->set_flashdata('login_failed',"Username and password are incorrect");
			redirect('Login/admin');

		}
	
}  
public function do_login(){

	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$stat=0;
	$user_id = $this->Login_model->user_login($username,$password);

		if($user_id){
			$stat=1;
			$user_data = array(

				'user_id'=>	$user_id[0]['user_id'],
				'user_name'=>$user_id[0]['user_name'],
				'logged_in'=>$stat,
				'user_type'=>$user_id[0]['user_type']

				);
			
			$this->session->set_userdata($user_data);
			$this->session->set_flashdata('login_success',"Welcome to this");
			
			if(trim($user_id[0]['user_type'])=='admin') {
				// echo 'hh';
				redirect('index.php/Home/');
			
			}else{
				// echo "string";
				redirect('Home/homeSecond');
			}

		}else{


			$this->session->set_flashdata('login_failed',"Username and password are incorrect");
			redirect('login');

		}
	
}	

public function logout() {

		$this->session->sess_destroy();
		redirect('home');
	}

public function checkAuth($password) {

	$status= $this->Login_model->checkAuth($password);
		echo json_encode($status);
	}	

}

?>