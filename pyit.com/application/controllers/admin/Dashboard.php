<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Stats';
		$data['sublayout'] = 'admin/dashboard';
		$data['active'] = 'dash';

		$data['files_num'] = $this->get_total_files_num();
		$data['news_num'] = $this->get_total_news_num();
		$data['users_num'] = $this->get_total_users_num();
		$data['images_num'] = $this->get_total_images_num();

		$this->load->view('admin/base_layout', $data);
	}

	public function get_total_files_num(){
		$table_name = 'pyit_files';
		$where = array('file_status' => 1);
		$this->load->model('Files_Mod');
		$files_num = $this->Files_Mod->get_files_num($table_name, $where);
		return $files_num;
	}

	public function get_total_news_num(){
		$table_name = 'pyit_news';
		$where = array('news_status' => 1);
		$this->load->model('News_Mod');
		$news_num = $this->News_Mod->get_news_num($table_name, $where);
		return $news_num;
	}

	public function get_total_users_num(){
		$table_name = 'pyit_users';
		$where = array('user_status' => 1);
		$this->load->model('Users_Mod');
		$users_num = $this->Users_Mod->get_users_num($table_name, $where);
		return $users_num;
	}

	public function get_total_images_num(){
		$table_name = 'pyit_slider_images';
		$this->load->model('Slider_Mod');
		$images_num = $this->Slider_Mod->get_slider_images_no($table_name);
		return $images_num;
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */