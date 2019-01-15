<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('users_model');
		// load form and url helpers
        $this->load->helper(array('form', 'url'));
        // load form_validation library
        $this->load->library('form_validation');
	}
	
	public function index(){
		$this->load->view('register_form');		
	}

    public function fetch(){
        $data = $this->users_model->getAllUsers();
        foreach($data as $row){
            ?>
            <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->password; ?></td>
                <td><?php echo $row->fname; ?></td>
            </tr>
            <?php
        }
    }

	public function register(){
        $output = array('error' => false);

		/* Set validation rule for name field in the form */ 
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[30]');
        $this->form_validation->set_rules('fname', 'Full Name', 'required');
			
        if ($this->form_validation->run() == FALSE) { 
        	$output['error'] = true;
            $output['message'] = validation_errors();
        } 
        else { 
            $user['email'] = $_POST['email'];
            $user['password'] = $_POST['password'];
            $user['fname'] = $_POST['fname'];

            $query = $this->users_model->register($user);

            if($query){
            	$output['message'] = 'User registered successfully';
            }
            else{
                $output['error'] = true;
            	$output['message'] = 'User registered successfully';
            }
        }

        echo json_encode($output);
	}

}
