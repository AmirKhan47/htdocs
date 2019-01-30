<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->helper('text');
		$data['title'] = 'Home';
		$data['sublayout'] = 'website/index';
		$data['images'] = $this->get_slider_images();
		$data['news_list'] = $this->get_news();
		// echo "<pre>";
		// print_r ($data);
		// echo "</pre>";exit();
		$this->load->view('website/base_layout', $data);
	}

	public function get_slider_images(){
		$table_name = 'pyit_slider_images';
		$this->load->model('Slider_Mod');
		$images = $this->Slider_Mod->get_slider_images($table_name);
		return $images;
	}

	public function get_news(){
		$table_name = 'pyit_news';
		$where = array('news_status' => 1);
		$this->load->model('News_Mod');
		$news = $this->News_Mod->get_all_news($table_name, $where);
		return $news;
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */