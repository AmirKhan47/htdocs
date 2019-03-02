<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','user',true);
	}

	public function index()
	{
		$this->load->view('manage_headers');
	}

	public function get_list()
    {
        $list = $this->user->get_list();
        // echo "<pre>";
        // print_r ($list);
        // echo "</pre>";
        // exit();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            // $row[] = $value['image_name'];
            $row[] = $value['first_name'];
            $row[] = $value['last_name'];
            $row[] = $value['company'];
            $row[] = $value['job_title'];
            $row[] = $value['category'];
            $row[] = $value['email'];
            $row[] = $value['bussiness_phone'];
            $row[] = $value['home_phone'];
            $row[] = $value['created_at'];
            $row[] = '<button class="btn btn-primary btn-sm" onclick="delete_lead('.$value['id'].');">Delete</button>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->user->list_count(),
            "recordsFiltered" => $this->user->list_count(),
            "data" => $data
        );
        echo json_encode($output);
    }

	public function add()
	{
		// echo "<pre>";
		// print_r ($this->input->post());
		// echo "</pre>";
		// exit();
		// if ($this->input->post('first_name'))
		// {
			// echo 'agaya';
			// exit();
			$config['upload_path']="./uploads";
	        $config['allowed_types']='gif|jpg|png';
	        $this->load->library('upload',$config);
	        $this->upload->initialize($config);
	        if($this->upload->do_upload("image_name"))
	        {
		        $data1 = array('upload_data' => $this->upload->data());
				$data = array(
					'image_name'=>$data1['upload_data']['file_name'],
					'first_name'=>$this->input->post('first_name'),
					'last_name'=>$this->input->post('last_name'),
					'company'=>$this->input->post('company'),
					'job_title'=>$this->input->post('job_title'),
					'category'=>$this->input->post('category'),
					'email'=>$this->input->post('email'),
					'bussiness_phone'=>$this->input->post('bussiness_phone'),
					'home_phone'=>$this->input->post('home_phone'),
				);
				$id=$this->common->insert_into_table('contacts',$data);
				if($id)
	            {
	            	echo 1;
	                // $this->session->set_flashdata('ok_message', 'Record Added!');
	                // redirect(URL.'header/');
	            }
	            else
	            {
	            	echo 0;
	                // $this->session->set_flashdata('error_message', 'Record Not Added!');
	                // redirect(URL.'header/add_header/');
	            }
	        }
	        else
	        {
	        	$error = array('error' => $this->upload->display_errors());
                // $this->load->view('upload_form', $error);
              	echo "<pre>";
              	print_r ($error);
              	exit();
              	echo "</pre>";
                echo 0;
	        	// $this->session->set_flashdata('error_message', 'Invalid Image Error! Please Try Again');
	         //    redirect(URL.'header/add_header/');
	        }
		// }
		// $this->load->view('add_headers');
	}
	public function delete($id)
    {
    	$result=$this->common->delete_record('contacts',array('id'=>$id));
		if($result)
		{
			echo 1;
		}
    }
}