<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Auth_model');
		$this->load->model('admin/Log_model');
		//Do your magic here
	}

	public function index(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			
			$data['sublayout']='admin/activity/activity_log';
			$where=array('role' => 2,);
			$data['ro']=$this->Mod_common->select_array_records('users',$where);
			$data['active']='ro_activity';
			$this->load->view('admin/admin_layout',$data);
			
		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(AURL.'auth/');
		}
		
	}

	public function get_ro($pagenumber=1){
		$date=$this->input->post('date1');
		$ro=$this->input->post('ro1');
		$where=array(
			'user_id' => $ro,
			'login_date' => date('Y-m-d',strtotime($date)),
		);
		// printme($where);exit;

		$this->load->library("pagination");
		$config = array();

		$config["base_url"] = "#";
        $config["total_rows"] = $this->Mod_common->get_all_records_nums("users_log",$where);
        $ppage = $config["per_page"] = 10;
        $config['use_page_numbers'] = TRUE;
        $config["uri_segment"] = 4;

		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li>';
		$config["first_tag_close"] = '</li>';
		$config["last_tag_open"] = '<li>';
		$config["last_tag_close"] = '</li>';
		$config['next_link'] = '&gt;';
		$config["next_tag_open"] = '<li>';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "&lt;";
		$config["prev_tag_open"] = "<li>";
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='active'><a href='#'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li>";
		$config["num_tag_close"] = "</li>";

        $this->pagination->initialize($config);
        $data['numcounter'] = 1;
        if ($pagenumber > 0) {
            $pagenumber = $pagenumber - 1;
            $data['numcounter'] = ($pagenumber * ITEMS_PER_PAGE) + 1;
            $llimit = ($ppage * $pagenumber);
            $ulimit = ($ppage * $pagenumber) + $ppage;
        }
        if ($pagenumber == 0) {
            $llimit = 0;
            $ulimit = $ppage;
        }

        $data['logs']=$this->Mod_common->get_all_records("users_log","*",$llimit,$ppage,$where);
        
        $html = $this->load->view('admin/activity/ajax_log',$data,true);

        $output = array(
		   'pagination_link'  => $this->pagination->create_links(),
		   'log_table'   => $html,
		  );
		echo json_encode($output);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/bdm/Dashboard.php */

?>