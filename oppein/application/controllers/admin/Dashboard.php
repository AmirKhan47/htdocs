<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Auth_model');
		//Do your magic here
	}

	public function index(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){

			$where=array('role' => 2,);
			$data['ro']=$this->Mod_common->select_array_records('users',$where);
			//overall lead detail
			$data['overall_leads']=array(
				'assign_lead' => $assign=$this->Mod_common->get_all_records_nums('assign'),
				'lead_process' => $this->Mod_common->get_all_records_nums_group('stage',array('result' => 1,),'count(lead_id)','lead_id'),
				'success_leads'=> $success=$this->Mod_common->get_all_records_nums('stage',array('stage_name_id' => 7,'result' => 2, )),
				'fail_leads' =>  $fail=$this->Mod_common->get_all_records_nums('stage',array('stage_name_id' => 8,'result' => 3, )), 
				'rate_success' => 	($assign != 0) ? round($success*100/$assign).'%' : '0'.'%',
				'rate_fail' => 		($assign != 0 ) ? round($fail*100/$assign).'%' : '0'.'%',
			);
			// printme($data['overall_leads']);exit;
			$data['sublayout']='admin/dashboard/dashboard';
			$data['active']='dashboard';
			$this->load->view('admin/admin_layout',$data);
			
		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(AURL.'auth/');
		}
		
	}

	public function overall(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$from=$this->input->post('from_date');
			$to=$this->input->post('to_date');

			$where=array(
				'created_date >=' => date('Y-m-d',strtotime($from)),
				'created_date <=' => date('Y-m-d',strtotime($to)),
			);

			$output=array(
				'assign_lead' => $assign=$this->Mod_common->get_all_records_nums(
					'assign',
					$where
				),
				'lead_process' => $this->Mod_common->get_all_records_nums_group(
					'stage',
					array(
						'result' => 1,
						'created_date >=' => date('Y-m-d',strtotime($from)),
						'created_date <=' => date('Y-m-d',strtotime($to)),
					),
					'count(lead_id)',
					'lead_id'
				),
				'success_leads'=> $success=$this->Mod_common->get_all_records_nums(
					'stage',
					array(
						'stage_name_id' => 7,
						'result' => 2, 
						'created_date >=' => date('Y-m-d',strtotime($from)),
						'created_date <=' => date('Y-m-d',strtotime($to)),
					)
				),
				'fail_leads' =>  $fail=$this->Mod_common->get_all_records_nums(
					'stage',
					array(
						'stage_name_id' => 8,
						'result' => 3,
						'created_date >=' => date('Y-m-d',strtotime($from)),
						'created_date <=' => date('Y-m-d',strtotime($to)), 
					)
				), 
				'rate_success' => ($assign != 0) ? round($success*100/$assign).'%' : '0'.'%',
				'rate_fail' => ($assign != 0 ) ? round($fail*100/$assign).'%' : '0'.'%',
			);
			// printme()
			

			echo json_encode($output);
			


		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			$r=3;
			echo json_encode($r);
		}

	}



}

/* End of file Dashboard.php */
/* Location: ./application/controllers/bdm/Dashboard.php */

?>