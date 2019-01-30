<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function index()
	{
		$data['title'] = 'News';
		$data['sublayout'] = 'admin/news';
		$data['active'] = 'news';
		$data['news_list'] = $this->all_news();
		$this->load->view('admin/base_layout', $data);
	}

	public function add_new_news(){
		if($this->input->post('submit')){
			$table_name = 'pyit_news';
			$data = array(
				'news_headline' 	=> $this->input->post('news_headline'), 
				'news_description'	=> $this->input->post('news_description'),
				'news_created_by'	=> $this->session->userdata('session_data')['session_user_name']
			);

			$this->load->model('News_Mod');
			$is_added = $this->News_Mod->add_news($table_name, $data);
			if($is_added){
				$this->session->set_flashdata('news_success', 'News Added Successfully!');
				redirect(AURL.'News');
			}else{
				$this->session->set_flashdata('news_error', 'Error Adding News!');
				redirect(AURL.'News');
			}
		}
	}

	public function all_news(){
		$table_name = 'pyit_news';
		$where = array('news_status' => 1);
		$this->load->model('News_Mod');
		$news = $this->News_Mod->get_all_news($table_name, $where);
		return $news;
	}

	public function edit_news($news_id){
		$table_name = 'pyit_news';
		$where = array('news_id' => $news_id);
		$this->load->model('News_Mod');
		$news_details = $this->News_Mod->get_news_detail($table_name, $where);
		echo json_encode($news_details);
	}

	public function update_news(){
		$table_name = 'pyit_news';
		$where = array('news_id' => $this->input->post('news_upd_id'));
		$update_data = array(
			'news_headline' => $this->input->post('news_upd_headline'),
			'news_description' => $this->input->post('news_upd_description')
		);
		$this->load->model('News_Mod');
		$is_updated = $this->News_Mod->news_update($table_name, $where, $update_data);
		if($is_updated){
			$this->session->set_flashdata('update_success', 'News Updated Successfully!');
			redirect(AURL.'News');
		}else{
			$this->session->set_flashdata('update_error', 'Error Updating News!');
			redirect(AURL.'News');
		}
		
	}

	public function deactivate_news($news_id){
		$table_name = 'pyit_news';
		$where = array('news_id' => $news_id);
		$update_data = array('news_status' => 0);
		$this->load->model('News_Mod');
		$is_deactivated = $this->News_Mod->news_deactivate($table_name, $where, $update_data);
		if($is_deactivated){
			$this->session->set_flashdata('delete_success', 'The News is successfully deleted!');
			redirect(AURL.'News');
		}else{
			$this->session->set_flashdata('delete_error', 'Error Deleting The News!');
			redirect(AURL.'News');
		}
	}

}

/* End of file News.php */
/* Location: ./application/controllers/admin/News.php */