<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_Images extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        	$this->load->model('Slider_Mod');
    }

	public function index()
	{
		$data['title'] = 'Slider Images';
		$data['sublayout'] = 'admin/slider_images';
		$data['active'] = 'slider';
		$data['images'] = $this->all_slider_images();
		$data['images_no'] = $this->slider_images_no();
		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";exit();
		$this->load->view('admin/base_layout', $data);
	}

	public function upload_slider_image($file_name, $image_id){
		// echo 'uploaded';
		// echo $image_id;exit();
		$config['upload_path'] = './uploads/slider_images/';
		$config['allowed_types'] = 'jpg|png|jpeg'; 

        $this->load->library('upload', $config);

        if (! $this->upload->do_upload($file_name))
        {		
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('upload_error', $error);
            redirect(AURL.'Slider_Images');
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $image_name = $data['upload_data']['file_name'];
            // if($file_name == 'file_slide_one'){
            // 	$upload_data = array(
	           //  	'image_one_name' => $image_name,
	           //  	'image_created_by' => $this->session->userdata('session_data')['session_user_name']
            // 	);
            // }
            // elseif ($file_name == 'file_slide_two') {
            // 	$upload_data = array(
	           //  	'image_two_name' => $image_name,
	           //  	'image_created_by' => $this->session->userdata('session_data')['session_user_name']
            // 	);
            // }

            // elseif ($file_name == 'file_slide_three') {
            // 	$upload_data = array(
	           //  	'image_three_name' => $image_name,
	           //  	'image_created_by' => $this->session->userdata('session_data')['session_user_name']
            // 	);
            // }

            $upload_data = array(
            	'image_name' => $image_name,
            	'image_created_by' => $this->session->userdata('session_data')['session_user_name']
            );

            $where = array('image_id' => $image_id);

            $table_name = 'pyit_slider_images';
            $is_uploaded = $this->Slider_Mod->upload_image($table_name, $where, $upload_data);
            if($is_uploaded){
				echo 'uploaded';
			}else{
				echo 'error';
			}
		}
		
	}

	public function all_slider_images(){
		$table_name = 'pyit_slider_images';
		$slider_images = $this->Slider_Mod->get_slider_images($table_name);
		return $slider_images;
	}

	public function slider_images_no(){
		$table_name = 'pyit_slider_images';
		$images_no = $this->Slider_Mod->get_slider_images_no($table_name);
		return $images_no;
	}

}

/* End of file Slider_Images.php */
/* Location: ./application/controllers/admin/Slider_Images.php */