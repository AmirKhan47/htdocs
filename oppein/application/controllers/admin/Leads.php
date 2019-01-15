<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Auth_model');
		$this->load->model('admin/Leads_model');
		//Do your magic here
	}

	public function new_lead(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$data['sublayout']='admin/leads/new_leads';
			$where=array('role' => 2,);
			$data['ro'] = $this->Mod_common->select_array_records('users',$where);
			
			$data['active'] ='new_lead';
			$this->load->view('admin/admin_layout',$data);
		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(AURL.'auth/');
		}

	}

	public function review(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$data['sublayout']='admin/leads/review';
			$where=array('role' => 2,);
			$data['ro'] = $this->Mod_common->select_array_records('users',$where);
			
			$data['active'] ='review';
			$this->load->view('admin/admin_layout',$data);
		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(AURL.'auth/');
		}

	}

	public function get_newlead(){
		$list=$this->Leads_model->get_newlead();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $key => $value) {
			$no++;
			$row = array();
			$color='';
			if($value['Name'] !=''){
				$action ='<a href="'.AURL.'leads/full_detail/'.$value['id'].'" class="btn btn-info"><i class="fa fa-eye"></i>
				</a>';

			}else{
				$action ='<a href="'.AURL.'leads/full_detail/'.$value['id'].'" class="btn btn-info"><i class="fa fa-eye"></i></a>
			          <a onclick="assignmodal('.$value['id'].')" class="btn btn-success"><i class="fa fa-check-square-o"></i></a>';
			}

			

			$fields='<input type="hidden" id="lead_'.$value['id'].'" value="'.$value['id'].'"/>
			         <input type="hidden" id="name_'.$value['id'].'" value="'.$value['name'].'"/>
			         <input type="hidden" id="designation_'.$value['id'].'" value="'.$value['designation'].'"/>
			         <input type="hidden" id="phone_'.$value['id'].'" value="'.$value['phone'].'"/>';
			
			if($value['priority']==1){
				//red
				$color='<div class="col-md-2"><div style="width: 2vw; height: 2vw; border: 1.5px solid black; border-radius: 60%; background: #ff4d4d;left:25%;position: relative;"></div></div>';
			}elseif ($value['priority']==2) { 
				//green
				$color='<div class="col-md-2"><div style="width: 2vw; height: 2vw; border: 1.5px solid black; border-radius: 50%; background: #00b300;left:25%;position: relative;"></div></div>';
			}elseif ($value['priority']==3) {
				//blue
				$color='<div class="col-md-2"><div style="width: 2vw; height: 2vw; border: 1.5px solid black; border-radius: 50%; background: #6666ff;left:25%;position: relative;"></div></div>';
			}elseif ($value['priority']==4) {
				//white
				$color='<div class="col-md-2"><div style="width: 2vw; height: 2vw; border: 1.5px solid black; border-radius: 50%;left:25%;position: relative;"></div></div>';
			}
			//status
			if($value['stage_name']=='Registered'){
				$status='<span class="label label-default">'.$value['stage_name'].'</span>';
			}elseif ($value['stage_name']=='Unchecked') {
				$status='<span class="label label-warning">'.$value['stage_name'].'</span>';
			}elseif ($value['stage_name']=='Visit') {
				$status='<span class="label label-info">'.$value['stage_name'].'</span>';
			}elseif ($value['stage_name']=='Work in progress') {
				$status='<span class="label label-info">'.$value['stage_name'].'</span>';
			}elseif ($value['stage_name']=='Review') {
				$status='<span class="label label-info">'.$value['stage_name'].'</span>';
			}elseif ($value['stage_name']=='Presentation') {
				$status='<span class="label label-info">'.$value['stage_name'].'</span>';
			}elseif ($value['stage_name']=='Success') {
				$status='<span class="label label-success">'.$value['stage_name'].'</span>';
			}elseif ($value['stage_name']=='Fail') {
				$status='<span class="label label-danger">'.$value['stage_name'].'</span>';
			}


			$row[] = $value['id'].$fields;
			$row[] = $value['name'];
			$row[] = $value['designation'];
			$row[] = $value['phone'];
			$row[] = $value['Name'];
			$row[] = $color;
			$row[] = $status;
			$row[] = $action;
			$data[] = $row;

		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Leads_model->newlead_count(),
			"recordsFiltered" => $this->Leads_model->newlead_count(),
			"data" => $data,
		);
        //output to json format
		echo json_encode($output);


	}

	public function assign_ro(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			if($this->input->post('submit')){
				$lead_id=$this->input->post('lead_id');
				$assign_ro=$this->input->post('ro_list');
				$created_date=date('Y-m-d H:i:s');
				$created_by=$this->session->userdata('user_id');

				$insert_array=array(
					'lead_id' => $lead_id,
					'assign_ro' => $assign_ro,
					'created_date' => $created_date,
					'created_by' => $created_by,
					'is_read' => 0,
				);
				$insert=$this->Mod_common->insert_into_table('assign',$insert_array);
				if($insert){
					$assign_id=$this->db->insert_id();
					$where=array('id'=>$lead_id);
					$search=$this->Mod_common->select_single_records('customer_leads',$where);
					if($search){
						$where=array('id'=> $search['stage_id'],);
						$update_array=array(
							'end_date' => $created_date,
							'result' =>1,
						);

						$update=$this->Mod_common->update_table('stage',$where,$update_array);
						if($update){
							$insert_array=array(
								'lead_id' => $lead_id,
								'assign_id' => $assign_id,
								'stage_name_id' => 2,
								'created_date' => $created_date,
								'result' => 1,
								
							);
							$insert=$this->Mod_common->insert_into_table('stage',$insert_array);
							if($insert){
								$stage_id=$this->db->insert_id();
								$update_array=array('stage_id' => $stage_id,);
								$where=array('id' =>$lead_id);
								$update=$this->Mod_common->update_table('customer_leads',$where,$update_array);
								if($update){
									$this->session->set_flashdata('ok_message', '- RO Assign successfully');
									redirect(AURL.'leads/new_lead');
								}else{
									$this->session->set_flashdata('err_message', '- Error in assigning RO');
									redirect(AURL.'leads/new_lead');
								}

							}

						}
					}
				}

			}

		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(AURL.'auth/');
		}
	}

	public function all_leads(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$data['sublayout']='admin/leads/all_leads';		
			$data['active'] ='all_leads';
			$this->load->view('admin/admin_layout',$data);
		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(AURL.'auth/');
		}
		
	}

	public function get_allleads(){
		$list=$this->Leads_model->get_allleads();
		// printme($list);exit;
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $key => $value) {
			$no++;
			$row = array();

			$action ='<a href="'.AURL.'leads/full_detail/'.$value['id'].'" class="btn btn-info"><i class="fa fa-eye"></i>
				</a>';
			$row[] = $value['id'];
			$row[] = $value['name'];
			$row[] = $value['designation'];
			$row[] = $value['phone'];
			$row[] = $value['ro'];
			$row[] = $value['bdm'];
			//status
			if($value['status']=='Registered'){
				$status='<span class="label label-default">'.$value['status'].'</span>';
			}elseif ($value['status']=='Unchecked') {
				$status='<span class="label label-warning">'.$value['status'].'</span>';
			}elseif ($value['status']=='Visit') {
				$status='<span class="label label-info">'.$value['status'].'</span>';
			}elseif ($value['status']=='Work in progress') {
				$status='<span class="label label-info">'.$value['status'].'</span>';
			}elseif ($value['status']=='Review') {
				$status='<span class="label label-info">'.$value['status'].'</span>';
			}elseif ($value['status']=='Presentation') {
				$status='<span class="label label-info">'.$value['status'].'</span>';
			}elseif ($value['status']=='Success') {
				$status='<span class="label label-success">'.$value['status'].'</span>';
			}elseif ($value['status']=='Fail') {
				$status='<span class="label label-danger">'.$value['status'].'</span>';
			}

			//final status
			$final_status='';
			if($value['final_status']==1){
				$final_status = '<span class="label label-primary">Pending</span>';
			}elseif ($value['final_status']==2) {
				$final_status = '<span class="label label-success">Close</span>';
			}elseif ($value['final_status']==3) {
				$final_status = '<span class="label label-danger">Failure</span>';
			}

			$row[]=$status;
			$row[]=$final_status;
			$row[] = $action;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Leads_model->alllead_count(),
			"recordsFiltered" => $this->Leads_model->alllead_count(),
			"data" => $data,
		);
        //output to json format
		echo json_encode($output);

	}

	public function detail($id){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$where= array(
				'l.id' => $id, 
			);

			$data['leads']=$this->Leads_model->lead_detail($where);
			$where_customer=array('customer_id' => $data['leads']['customer_id']);
			$data['bdm_data']=$this->Mod_common->select_array_records('customer_images',$where_customer);

			$data['sublayout']="admin/leads/detail";
			$data['active']='';
			$this->load->view('admin/admin_layout',$data);
		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(AURL.'auth/');
		}

	}

	public function full_detail($id){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$where= array(
				'l.id' => $id, 
			);
			$data['leads']=$this->Leads_model->lead_detail1($where);
			//printme($data['leads']);exit;

			$where=array(
				'lead_id' => $id, 
				'assign_id' => $data['leads']['assign_id'],
				'stage_name_id' => 3, 
			);
			
			$stage=$this->Mod_common->select_single_records('stage',$where);
			if(count($stage)==0){
				$data['visit']='';
			}else{
				$data['visit']=1;
			}
			$where=array(
				'lead_id' => $id,
				'stage_id' =>  $stage['id'],
			);
			//printme($stage['id']);exit;
			$fields='category_status';
			$data['visit_doc']=$this->Mod_common->select_single_records('lead_documents',$where,$fields);
			

			$where=array(
				'lead_id' => $id, 
				'assign_id' => $data['leads']['assign_id'],
				 
			);
			$data['lead_stages']=$this->Mod_common->select_array_records('stage',$where);
			$data['lead_detail']=1;
			// printme($data['lead_stages']);exit();
			

			$where_customer=array('customer_id' => $data['leads']['customer_id']);
			$data['bdm_data']=$this->Mod_common->select_array_records('customer_images',$where_customer);
			$data['sublayout']='admin/leads/detail1';
			$data['active']='';
			$this->load->view('admin/admin_layout',$data);

		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(AURL.'auth/');
		}
	}

	public function review_detail($id){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$where= array(
				'l.id' => $id, 
			);
			$data['leads']=$this->Leads_model->lead_detail1($where);
			// printme($data['leads']);exit;

			$where=array(
				'lead_id' => $id, 
				'assign_id' => $data['leads']['assign_id'],
				'stage_name_id' => 3, 
			);
			
			$stage=$this->Mod_common->select_single_records('stage',$where);
			$where=array(
				'lead_id' => $id,
				'stage_id' =>  $stage['id'],
			);
			//printme($stage['id']);exit;
			$fields='category_status';
			$data['visit_doc']=$this->Mod_common->select_single_records('lead_documents',$where,$fields);
			// printme($data['visit_doc']);exit;

			$where=array(
				'lead_id' => $id, 
				'assign_id' => $data['leads']['assign_id'],
				 
			);
			$data['lead_stages']=$this->Mod_common->select_array_records('stage',$where);
			$data['lead_detail']=1;
			// printme($data['lead_stages']);exit();
			

			$where_customer=array('customer_id' => $data['leads']['customer_id']);
			$data['bdm_data']=$this->Mod_common->select_array_records('customer_images',$where_customer);
			$data['sublayout']='admin/leads/review_detail';
			$data['active']='';
			$this->load->view('admin/admin_layout',$data);

		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(AURL.'auth/');
		}
	}

	public function get_reviews(){
		$list=$this->Leads_model->get_review();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $key => $value) {
			$no++;
			$row = array();
			$action ='<a href="'.AURL.'leads/review_detail/'.$value['id'].'" class="btn btn-info"><i class="fa fa-eye"></i>
				</a>';
			$row[] = $value['id'];
			$row[] = $value['name'];
			$row[] = $value['designation'];
			$row[] = $value['phone'];
			$row[] = $value['ro'];
			$row[] = date('d-m-Y',strtotime($value['created_date']));
			$row[] = $action;
			$data[] = $row;	
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Leads_model->review_count(),
			"recordsFiltered" => $this->Leads_model->review_count(),
			"data" => $data,
		);
        //output to json format
		echo json_encode($output);

	}

	public function get_resubmitted(){
		$list=$this->Leads_model->get_resubmitted();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $key => $value) {
			$no++;
			$row = array();
			$action ='<a href="'.AURL.'leads/review_detail/'.$value['id'].'" class="btn btn-info"><i class="fa fa-eye"></i>
				</a>';
			$row[] = $value['id'];
			$row[] = $value['name'];
			$row[] = $value['designation'];
			$row[] = $value['phone'];
			$row[] = $value['ro'];
			$row[] = $value['submitted_count'];
			$row[] = $action;
			$data[] = $row;	
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Leads_model->resubmitted_count(),
			"recordsFiltered" => $this->Leads_model->resubmitted_count(),
			"data" => $data,
		);
        //output to json format
		echo json_encode($output);

	}


	public function visit_table($pagenumber=1){

		$where=array(
			'lead_id' => $this->input->post('lead_id1'),
			'stage_name_id' =>$this->input->post('stage_id'),
			'assign_id' =>$this->input->post('assign_id1'), 
		);
		$result=$this->Mod_common->select_single_records('stage',$where);

		// printme($result);exit;

		$where=array(
			'lead_id' => $this->input->post('lead_id1'),
			'stage_id' => $result['id'],
		);

		
		$this->load->library("pagination");
		$config = array();

		$config["base_url"] = "#";
        $config["total_rows"] = $this->Mod_common->get_all_records_nums("lead_documents",$where);
        $ppage = $config["per_page"] = 10;
        $config['use_page_numbers'] = TRUE;
        $config["uri_segment"] = 4;

        $config["full_tag_open"] = '<ul class="pagination" id="visit1">';
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

        $data['visit']=$this->Mod_common->get_all_records("lead_documents","*",$llimit,$ppage,$where);

        $html = $this->load->view('ro/leads/ajax_visit',$data,true);
        $date='';
        if($result['end_date']==0){
        	$date='';
        }else{
        	$date=date('d-m-Y',strtotime($result['end_date']));
        }

        $output = array(
		   'pagination_link'  => $this->pagination->create_links(),
		   'visit_table'   => $html,
		   'completion_date' =>$date,
		  );
		echo json_encode($output);
	}

	public function wip_table($pagenumber=1){

		$where=array(
			'lead_id' => $this->input->post('lead_id'),
			'stage_name_id' =>$this->input->post('stagename'),
			'assign_id' =>$this->input->post('assign_id'), 
		);
		$result=$this->Mod_common->select_single_records('stage',$where);
		// printme($result);exit;

		$where=array(
			'lead_id' => $this->input->post('lead_id'),
			'stage_id' => $result['id'],
		);

		
		$this->load->library("pagination");
		$config = array();

		$config["base_url"] = "#";
        $config["total_rows"] = $this->Mod_common->get_all_records_nums("lead_documents",$where);
        $ppage = $config["per_page"] = 10;
        $config['use_page_numbers'] = TRUE;
        $config["uri_segment"] = 4;

        $config["full_tag_open"] = '<ul class="pagination" id="wip1">';
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

        $data['wip']=$this->Mod_common->get_all_records("lead_documents","*",$llimit,$ppage,$where);

        $html = $this->load->view('ro/leads/ajax_wip',$data,true);
        $date='';
        if($result['end_date']==0){
        	$date='';
        }else{
        	$date=date('d-m-Y',strtotime($result['end_date']));
        }

        $output = array(
		   'pagination_link'  => $this->pagination->create_links(),
		   'wip_table'   => $html,
		   'completion_date' =>$date,
		  );
		echo json_encode($output);
	}


	public function submit_lead_progress(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			
			$lead_id=$this->input->post('lead_id1');
			$stage_id=$this->input->post('stage_id1');
			$assign_id=$this->input->post('assign_id1');
			$stage=$this->input->post('stage');
			// printme($this->input->post());exit;

			if($stage==4){// fail
				$assign=8;
				$result=3;

				$where=array('id' => $stage_id,);
				$update_array=array(
					'end_date' =>  date('Y-m-d H:i:s'), 
					// 'result' =>$result,
				);
				$update=$this->Mod_common->update_table('stage',$where,$update_array);
				if($update){
					$insert_array=array(
						'lead_id' => $lead_id,
						'assign_id' => $assign_id,
						'stage_name_id' => $assign,
						'created_date' => date('Y-m-d H:i:s'),
						'result' => $result,
					);

					$insert=$this->Mod_common->insert_into_table('stage',$insert_array);
					if($insert){
						$stage_id=$this->db->insert_id();
						$update_array=array('stage_id' => $stage_id,);
						$where=array('id' =>$lead_id);
						$update=$this->Mod_common->update_table('customer_leads',$where,$update_array);
						if($update){
							echo "1";
						}
					}
				}
				//end of fail
			}elseif ($stage==5) {
				$where=array(
					'id' => $stage_id,
				);
				$result=$this->Mod_common->select_single_records('stage',$where);
				// printme($result['submitted_count']);
				$count=$result['submitted_count']+1;

				$update_array=array(
					'end_date' => 0,
					'submitted_count' => $count,
				);

				$result=$this->Mod_common->update_table('stage',$where,$update_array);
				if($result){
					$where=array(
						'lead_id' => $lead_id,
						'assign_id' => $assign_id,
						'stage_name_id' => 4,
					);
					$result=$this->Mod_common->select_single_records('stage',$where);
					if($result){
						$where=array(
							'id' => $result['id'],
						);
						$update_array=array(
							'end_date' => 0,
							'submitted_count' => $count,
						);
						$update= $this->Mod_common->update_table('stage',$where,$update_array);
						if($update){
							$update_array=array('stage_id' => $result['id'],);
							$where=array('id' =>$lead_id);
							$update=$this->Mod_common->update_table('customer_leads',$where,$update_array);
							if($update){
								echo "1";
							}

						}
					}
				}
				//end of review

			}elseif ($stage==6) {
				$assign=6;
				$result=1;
				$where=array('id' => $stage_id,);
				$update_array=array(
					'end_date' =>  date('Y-m-d H:i:s'), 
					'result' =>$result,
				);
				$update=$this->Mod_common->update_table('stage',$where,$update_array);
				if($update){
					$insert_array=array(
						'lead_id' => $lead_id,
						'assign_id' => $assign_id,
						'stage_name_id' => $assign,
						'created_date' => date('Y-m-d H:i:s'),
						'result' => $result,
					);

					$insert=$this->Mod_common->insert_into_table('stage',$insert_array);
					if($insert){
						$stage_id=$this->db->insert_id();
						$update_array=array('stage_id' => $stage_id,);
						$where=array('id' =>$lead_id);
						$update=$this->Mod_common->update_table('customer_leads',$where,$update_array);
						if($update){
							echo "1";
						}else{
							echo "2";
						}
					}
				}

				
			}
			
		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			echo "3";
		}
	}

	public function pre_table($pagenumber=1){

		$where=array(
			'lead_id' => $this->input->post('lead_id'),
			'stage_name_id' =>$this->input->post('stagename'),
			'assign_id' =>$this->input->post('assign_id'), 
		);
		$result=$this->Mod_common->select_single_records('stage',$where);
		// printme($result);exit;

		$where=array(
			'lead_id' => $this->input->post('lead_id'),
			'stage_id' => $result['id'],
			// 'user_id' => $this->session->userdata('user_id'),
		);

		
		$this->load->library("pagination");
		$config = array();

		$config["base_url"] = "#";
        $config["total_rows"] = $this->Mod_common->get_all_records_nums("lead_documents",$where);
        $ppage = $config["per_page"] = 10;
        $config['use_page_numbers'] = TRUE;
        $config["uri_segment"] = 4;

        $config["full_tag_open"] = '<ul class="pagination" id="pre1">';
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

        $data['wip']=$this->Mod_common->get_all_records("lead_documents","*",$llimit,$ppage,$where);

        $html = $this->load->view('ro/leads/ajax_pre',$data,true);
        $date='';
        if($result['end_date']==0){
        	$date='';
        }else{
        	$date=date('d-m-Y',strtotime($result['end_date']));
        }

        $output = array(
		   'pagination_link'  => $this->pagination->create_links(),
		   'pre_table'   => $html,
		   'completion_date' =>$date,
		  );
		echo json_encode($output);
	}
	

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/bdm/Dashboard.php */

?>