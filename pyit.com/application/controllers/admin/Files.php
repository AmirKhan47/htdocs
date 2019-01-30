<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Files';
		$data['sublayout'] = 'admin/files';
		$data['active'] = 'files';
		$data['files'] = $this->all_files();
		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";exit(); 
		$this->load->view('admin/base_layout', $data);
	}

	public function add_new_file(){
		if($this->input->post('submit')){
			$table_name = 'pyit_files';
			
			$config['upload_path']          = './uploads/files/';
            $config['allowed_types']        = 'pdf|doc|docx|jpg|png';
            $config['max_size']             = 20480;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('file_attachment'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('upload_error', $error);
                redirect(AURL.'Files/index');
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $file_name = $data['upload_data']['file_name'];

                $data = array(
					'file_name' 		=> $this->input->post('file_name'),
					'file_category' 	=> $this->input->post('file_category'),
					'file_description'  => $this->input->post('file_description'),
					'file_attachment'	=> $file_name,
					'file_created_by'	=> $this->session->userdata('session_data')['session_user_name']
				);

				$this->load->model('Files_Mod');
				$is_added = $this->Files_Mod->add_new_file($table_name, $data);

				if($is_added){
					$this->session->set_flashdata('file_upload_success', '<div class="alert alert-success">File has been added successfully!</div>');
					redirect(AURL.'Files/index');
				}else{
					$this->session->set_flashdata('file_upload_error', '<div class="alert alert-danger">Error Adding File!</div>');
					redirect(AURL.'Files/index');
				}
            }
		}
	}

	public function all_files(){
		$table_name = 'pyit_files';
		$where = array('file_status' => 1);
		$this->load->model('Files_Mod');
		$files = $this->Files_Mod->get_all_files($table_name, $where);
		return $files;
	}

	public function deactivate_file($file_id){
		$table_name = 'pyit_files';
		$where = array('file_id' => $file_id);
		$update_data = array('file_status' => 0);
		$this->load->model('Files_Mod');
		$is_deactivated = $this->Files_Mod->file_deactivate($table_name, $where, $update_data);
		if($is_deactivated){
			$this->session->set_flashdata('delete_success', 'The File is successfully deleted!');
			redirect(AURL.'Files');
		}else{
			$this->session->set_flashdata('delete_error', 'Error Deleting The File!');
			redirect(AURL.'Files');
		}
	}

}

/* End of file Files.php */
/* Location: ./application/controllers/admin/Files.php */