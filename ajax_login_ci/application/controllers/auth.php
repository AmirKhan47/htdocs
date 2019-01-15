<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->Model('Auth_model');
        }

        public function index()
	{
            $this->load->view('login');
	}
        
        public function logout(){
            $this->session->sess_destroy();
            redirect('/' ,'refresh');
            exit;
        }
        
        public function login(){
            $username =  $this->input->post('username');
            $password =  $this->input->post('password');
            
            //call the model for auth
            if($this->Auth_model->login($username, $password)){
            }
            else{
                echo'something went wrong';
            }
        }
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */