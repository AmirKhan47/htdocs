<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Target extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Auth_model');
		$this->load->model('admin/Target_model');
		//Do your magic here
	}

	public function index(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$data['sublayout']='admin/target/target_allotment';
			
			$data['active'] ='allotment';
			$this->load->view('admin/admin_layout',$data);
		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(AURL.'auth/');
		}

	}

	public function get_target(){
		$list=$this->Target_model->get_target();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $key => $value) {
			$no++;
			$row = array();
			
			
			$action ='<a onclick="assigntarget('.$value['id'].')" class="btn btn-success"><i class="fa fa-check-square-o"></i></a>';

			$fields='<input type="hidden" id="target_'.$value['id'].'" value="'.$value['id'].'"/>
			         <input type="hidden" id="ro_'.$value['id'].'" value="'.$value['Name'].'"/>';
			
			
			$row[] = $value['Name'].$fields;
			$row[] = $value['target_assign'];
			$row[] = $action;
			$data[] = $row;

		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Target_model->target_count(),
			"recordsFiltered" => $this->Target_model->target_count(),
			"data" => $data,
		);
        //output to json format
		echo json_encode($output);


	}

	public function assign_target(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			if($this->input->post('submit')){
				
				$where=array('id' =>$this->input->post('target_id'));
				$update_array=array('target_assign' => $this->input->post('target'),);

				$update=$this->Mod_common->update_table('target',$where,$update_array);
				if($update){
					$this->session->set_flashdata('ok_message','- Assign Target Successfully');
					redirect(AURL.'target/');
				}else{
					$this->session->set_flashdata('err_message','- Error in assigning target');
					redirect(AURL.'target/');
				}


			}

		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(AURL.'auth/');
		}
	}

	
	

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/bdm/Dashboard.php */

?>