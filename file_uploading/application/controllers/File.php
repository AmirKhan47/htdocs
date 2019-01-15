<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class File extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Common_model');
	}
	public function index()
	{
		$this->load->view('file_view');
	}
	public function do_upload()
	{
        $config['upload_path']="./assets/uploads";
        $config['allowed_types']='gif|jpg|png';
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        if($this->upload->do_upload("file"))
        {
	        $data = array('upload_data' => $this->upload->data());

	        $data1 = array(
	        'document_name'=> $data['upload_data']['file_name']
	        );  
	        $result= $this->Common_model->insert_into_table('uploads', $data1); 
	        if ($result == TRUE) 
	        {
	            echo "true";
	        }
	        else
	        {
	        	echo "fail";
	        }
        }
        else
        {
        	echo "string";
        }
    }
}