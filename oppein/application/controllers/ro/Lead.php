<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lead extends CI_Controller {

	public $lead_status=1;

	public function __construct(){
		parent::__construct();
		//Do your magic here
		$this->load->model('ro/Lead_model','lead_model');
		$this->load->model('Auth_model');
	}

	public function new_leads(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$data['sublayout']='ro/leads/new_leads';
			$data['active']='new_leads';
			$this->load->view('ro/ro_layout',$data);


		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(URL.'auth/');
		}

	}

	public function get_newlead(){
		$list=$this->lead_model->get_newleads();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $key => $value) {
			$no++;
			$row = array();

			$action='<a href="'.RURL.'lead/accept_lead/'.$value['assign'].'/'.$value['stage_id'].'/'.$value['id'].'" class="btn btn-success"><i class="fa fa-check"></i></a>';
			
			$row[] = $value['id'];
			$row[] = $value['name'];
			$row[] = $value['phone'];
			$row[] = $value['address'];
			$row[] = $value['bdm'];
			$row[] = $action;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->lead_model->newlead_count(),
			"recordsFiltered" => $this->lead_model->newlead_count(),
			"data" => $data,
		);
        //output to json format
		echo json_encode($output);
	}

	public function accept_lead($assign_id,$stage_id,$lead_id){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$where=array('id' => $assign_id,);
			$update_array=array('is_read' => 1);
			$update=$this->Mod_common->update_table('assign',$where,$update_array);
			if($update){
				$where=array('id' => $stage_id,);
				$update_array=array(
					'end_date' =>  date('Y-m-d H:i:s'), 
					'result' =>1,
				);
				$update=$this->Mod_common->update_table('stage',$where,$update_array);
				if($update){
					$insert_array=array(
						'lead_id' => $lead_id,
						'assign_id' => $assign_id,
						'stage_name_id' => 3,
						'created_date' => date('Y-m-d H:i:s'),
						'result' => 1,
					);
					$insert=$this->Mod_common->insert_into_table('stage',$insert_array);
					if($insert){
						$stage_id=$this->db->insert_id();
						$update_array=array('stage_id' => $stage_id,);
						$where=array('id' =>$lead_id);
						$update=$this->Mod_common->update_table('customer_leads',$where,$update_array);
						if($update){
							$this->lead_status=1;//visit status
							$this->session->set_flashdata('ok_message', '- Status updated Successfully');
							redirect(RURL.'lead/detail/'.$lead_id);
						}else{
							$this->session->set_flashdata('err_message', '- Error in updating status');
							redirect(RUL.'lead/new_leads');
						}
					}
				}
			}
		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(URL.'auth/');
		}

	}

	public function detail($id){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$where= array(
				'l.id' => $id, 
			);
			$data['leads']=$this->lead_model->lead_detail($where);
			//printme($data['leads']);exit;

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
			$fields='category_status';
			$data['visit_doc']=$this->Mod_common->select_single_records('lead_documents',$where,$fields);

			$where=array(
				'lead_id' => $id, 
				'assign_id' => $data['leads']['assign_id'],
				 
			);
			$data['lead_stages']=$this->Mod_common->select_array_records('stage',$where);
			// printme($data['lead_stages']);exit();
			

			$where_customer=array('customer_id' => $data['leads']['customer_id']);
			$data['bdm_data']=$this->Mod_common->select_array_records('customer_images',$where_customer);
			$data['sublayout']='ro/leads/detail';
			$data['active']='';
			$this->load->view('ro/ro_layout',$data);

		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(URL.'auth/');
		}
	}

	public function lead_in_progress(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$data['sublayout']='ro/leads/lead_progress';
			$data['active']='progress';
			$this->load->view('ro/ro_layout',$data);

		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			redirect(URL.'auth/');
		}

	}

	public function get_visit(){
		$where=array(
	        'a.assign_ro' => $this->session->userdata('user_id'),
	        'st.stage_name_id' => 3, 
	    );

	    $list=$this->lead_model->get_lead_progress($where);
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $key => $value) {
			$no++;
			$row = array();
			$days='';

			if($value['created_date'] !=''){
                $now = time(); // or your date as well
                $your_date = strtotime($value['created_date']);
                $datediff = $now - $your_date;
                $days=round($datediff / (60 * 60 * 24));
            }

            $action='<a href="'.RURL.'lead/detail/'.$value['id'].'" class="btn btn-info"><i class="fa fa-eye"></i></a>';

            $row[] = $value['id'];
            $row[] = $value['name'];
            $row[] = $value['designation'];
            $row[] = $value['phone'];
            $row[] = $value['bdm'];
            $row[] = $days;
            $row[] = $action;
            $data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->lead_model->lead_progress_count($where),
			"recordsFiltered" => $this->lead_model->lead_progress_count($where),
			"data" => $data,
		);
        //output to json format
		echo json_encode($output);

	}

	public function get_wip(){
		$where=array(
	        'a.assign_ro' => $this->session->userdata('user_id'),
	        'st.stage_name_id' => 4, 
	    );

	    $list=$this->lead_model->get_lead_progress($where);
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $key => $value) {
			$no++;
			$row = array();
			$days='';

			if($value['created_date'] !=''){
                $now = time(); // or your date as well
                $your_date = strtotime($value['created_date']);
                $datediff = $now - $your_date;
                $days=round($datediff / (60 * 60 * 24));
            }

            $action='<a href="'.RURL.'lead/detail/'.$value['id'].'" class="btn btn-info"><i class="fa fa-eye"></i></a>';

            $row[] = $value['id'];
            $row[] = $value['name'];
            $row[] = $value['designation'];
            $row[] = $value['phone'];
            $row[] = $value['bdm'];
            $row[] = $days;
            $row[] = $action;
            $data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->lead_model->lead_progress_count($where),
			"recordsFiltered" => $this->lead_model->lead_progress_count($where),
			"data" => $data,
		);
        //output to json format
		echo json_encode($output);

	}

	public function get_presentation(){
		$where=array(
	        'a.assign_ro' => $this->session->userdata('user_id'),
	        'st.stage_name_id' => 6, 
	    );

	    $list=$this->lead_model->get_lead_progress($where);
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $key => $value) {
			$no++;
			$row = array();
			$days='';

			if($value['created_date'] !=''){
                $now = time(); // or your date as well
                $your_date = strtotime($value['created_date']);
                $datediff = $now - $your_date;
                $days=round($datediff / (60 * 60 * 24));
            }

            $action='<a href="'.RURL.'lead/detail/'.$value['id'].'" class="btn btn-info"><i class="fa fa-eye"></i></a>';

            $row[] = $value['id'];
            $row[] = $value['name'];
            $row[] = $value['designation'];
            $row[] = $value['phone'];
            $row[] = $value['bdm'];
            $row[] = $days;
            $row[] = $action;
            $data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->lead_model->lead_progress_count($where),
			"recordsFiltered" => $this->lead_model->lead_progress_count($where),
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
			'user_id' => $this->session->userdata('user_id'),
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
			'user_id' => $this->session->userdata('user_id'),
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
			'user_id' => $this->session->userdata('user_id'),
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

	public function upload_visit(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){

			$lead_id=$this->input->post('lead_id');
			$stage_id=$this->input->post('stage_id');
			$where=array(
				'lead_id' => $lead_id,
				'stage_id' => $stage_id,	
				'user_id' =>$this->session->userdata('user_id'),
			);
			$delete=$this->Mod_common->delete_record('lead_documents',$where);
			$status='';
			$filename=array();

			if(count($this->input->post('visit'))>0){
				foreach ($this->input->post('visit') as $key => $value) {
					$status.=$value.'-';
				}
			}
			if(count($_FILES['measurement']['name']) > 0 && $_FILES['measurement']['name'] !=''){
		                			
			    $files = $_FILES['measurement'];
				$count = count($_FILES['measurement']['name']);
				//echo $_FILES['measurement']['name'];exit();
				for($i=0; $i<$count;$i++){  
					            
					$config = array();
					$projects_folder_path = './upload/document/';
					$thumb = $projects_folder_path . 'thumb';

					$_FILES['measurement']['name']= $files['name'][$i];
	                $_FILES['measurement']['type']= $files['type'][$i];
	                $_FILES['measurement']['tmp_name']= $files['tmp_name'][$i];
	                $_FILES['measurement']['error']= $files['error'][$i];
	                $_FILES['measurement']['size']= $files['size'][$i];
					                                      
					                   
					$file_ext  = ltrim(strtolower(strrchr($_FILES['measurement']['name'],'.')),'.');  
					$file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;
					                
					$config['upload_path']         = $projects_folder_path;
					$config['allowed_types']       = '*';
					$config['encrypt_name']        = TRUE;
					$config['overwrite'] = TRUE;
					$config['file_name'] = $file_name;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if(!$this->upload->do_upload('measurement')){
					    $error_file_arr = array('error' => $this->upload->display_errors());
					                    
					    $this->session->set_flashdata('err_message', $error_file_arr['error']);
					    echo "2"; 
					}else {
					    $data_image_upload = array('upload_image_data' => $this->upload->data());
					    $image_name =$data_image_upload['upload_image_data']['file_name'];  
					    $full_path = $data_image_upload['upload_image_data']['full_path'];                 
					}  
					$filename[] = $image_name;

				} // end for loop
					                
			}

			foreach ($filename as $key => $value) {
				$insert_image=array(
					'document_name'=> $value,
					'lead_id' => $lead_id,
					'stage_id' => $stage_id,
					'created_date' => date("Y-m-d G:i:s"),
					'category_status' => $status,
					'user_id' =>$this->session->userdata('user_id'),
				);
				$add_image = $this->Mod_common->insert_into_table('lead_documents', $insert_image);
					                    
			}

			if($add_image){
				echo "1";
			}else{
				echo "2";
			}

		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			echo "3";

		}
	}

	public function upload_pre(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$lead_id=$this->input->post('pre_lead_id');
			$stage_id=$this->input->post('pre_stage_id');
			$filename=array();
			if(count($_FILES['quotation_pre']['name']) > 0 && $_FILES['quotation_pre']['name'] !=''){
		                			
			    $files = $_FILES['quotation_pre'];
				$count = count($_FILES['quotation_pre']['name']);
				//echo $_FILES['quotation_pre']['name'];exit();
				for($i=0; $i<$count;$i++){  
					            
					$config = array();
					$projects_folder_path = './upload/document/';
					$thumb = $projects_folder_path . 'thumb';

					$_FILES['quotation_pre']['name']= $files['name'][$i];
	                $_FILES['quotation_pre']['type']= $files['type'][$i];
	                $_FILES['quotation_pre']['tmp_name']= $files['tmp_name'][$i];
	                $_FILES['quotation_pre']['error']= $files['error'][$i];
	                $_FILES['quotation_pre']['size']= $files['size'][$i];
					                                      
					                   
					$file_ext  = ltrim(strtolower(strrchr($_FILES['quotation_pre']['name'],'.')),'.');  
					$file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;
					                
					$config['upload_path']         = $projects_folder_path;
					$config['allowed_types']       = '*';
					$config['encrypt_name']        = TRUE;
					$config['overwrite'] = TRUE;
					$config['file_name'] = $file_name;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if(!$this->upload->do_upload('quotation_pre')){
					    $error_file_arr = array('error' => $this->upload->display_errors());
					                    
					    $this->session->set_flashdata('err_message', $error_file_arr['error']);
					    echo "2"; 
					}else {
					    $data_image_upload = array('upload_image_data' => $this->upload->data());
					    $image_name =$data_image_upload['upload_image_data']['file_name'];  
					    $full_path = $data_image_upload['upload_image_data']['full_path'];                 
					}  
					$filename[] = $image_name;

				} // end for loop

					                
			}

			foreach ($filename as $key => $value) {
				$insert_image=array(
					'document_name'=> $value,
					'lead_id' => $lead_id,
					'stage_id' => $stage_id,
					'created_date' => date("Y-m-d G:i:s"),
					'category_status' => 1,
					'user_id' =>$this->session->userdata('user_id'),
				);
				$add_image = $this->Mod_common->insert_into_table('lead_documents', $insert_image);
					                    
			}

			if($add_image){
				echo "1";
			}else{
				echo "2";
			}

		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			echo "3";
		}

	}

	public function upload_wip(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$lead_id=$this->input->post('wip_lead_id');
			$stage_id=$this->input->post('wip_stage_id');

			$where=array(
				'lead_id' => $lead_id,
				'stage_id' => $stage_id,	
				'user_id' =>$this->session->userdata('user_id'),
			);
			$delete=$this->Mod_common->delete_record('lead_documents',$where);
			$filename_design=array();

			//upload 3d design
			if(count($_FILES['design']['name']) > 0 && $_FILES['design']['name'] !=''){
			                			
				$files = $_FILES['design'];
				$count = count($_FILES['design']['name']);
				//echo $_FILES['design']['name'];exit();
				for($i=0; $i<$count;$i++){  
						            
					$config = array();
					$projects_folder_path = './upload/document/';
					$thumb = $projects_folder_path . 'thumb';

					$_FILES['design']['name']= $files['name'][$i];
		            $_FILES['design']['type']= $files['type'][$i];
		            $_FILES['design']['tmp_name']= $files['tmp_name'][$i];
		            $_FILES['design']['error']= $files['error'][$i];
		            $_FILES['design']['size']= $files['size'][$i];
						                                      
						                   
					$file_ext  = ltrim(strtolower(strrchr($_FILES['design']['name'],'.')),'.');  
					$file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;
						                
					$config['upload_path']         = $projects_folder_path;
					$config['allowed_types']       = '*';
					$config['encrypt_name']        = TRUE;
					$config['overwrite'] = TRUE;
					$config['file_name'] = $file_name;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if(!$this->upload->do_upload('design')){
						$error_file_arr = array('error' => $this->upload->display_errors());
						                    
						$this->session->set_flashdata('err_message', $error_file_arr['error']);
						    echo "2"; 
					}else {
						$data_image_upload = array('upload_image_data' => $this->upload->data());
						$image_name =$data_image_upload['upload_image_data']['file_name'];  
						$full_path = $data_image_upload['upload_image_data']['full_path'];                 
					}

					$filename_design[] = $image_name;

				} // end for loop
						                
			}

			foreach ($filename_design as $key => $value) {
				$insert_image=array(
					'document_name'=> $value,
					'lead_id' => $lead_id,
					'stage_id' => $stage_id,
					'created_date' => date("Y-m-d G:i:s"),
					'category_status' => 1,
					'user_id' =>$this->session->userdata('user_id'),
				);
				$add_image = $this->Mod_common->insert_into_table('lead_documents', $insert_image);
						                    
			}
			$filename_layout=array();

			// upload layout
			if(count($_FILES['layout']['name']) > 0 && $_FILES['layout']['name'] !=''){
			                			
				$files = $_FILES['layout'];
				$count = count($_FILES['layout']['name']);
				//echo $_FILES['layout']['name'];exit();
				for($i=0; $i<$count;$i++){  
						            
					$config = array();
					$projects_folder_path = './upload/document/';
					$thumb = $projects_folder_path . 'thumb';

					$_FILES['layout']['name']= $files['name'][$i];
		            $_FILES['layout']['type']= $files['type'][$i];
		            $_FILES['layout']['tmp_name']= $files['tmp_name'][$i];
		            $_FILES['layout']['error']= $files['error'][$i];
		            $_FILES['layout']['size']= $files['size'][$i];
						                                      
						                   
					$file_ext  = ltrim(strtolower(strrchr($_FILES['layout']['name'],'.')),'.');  
					$file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;
						                
					$config['upload_path']         = $projects_folder_path;
					$config['allowed_types']       = '*';
					$config['encrypt_name']        = TRUE;
					$config['overwrite'] = TRUE;
					$config['file_name'] = $file_name;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if(!$this->upload->do_upload('layout')){
						$error_file_arr = array('error' => $this->upload->display_errors());
						                    
						$this->session->set_flashdata('err_message', $error_file_arr['error']);
						    echo "2"; 
					}else {
						$data_image_upload = array('upload_image_data' => $this->upload->data());
						$image_name =$data_image_upload['upload_image_data']['file_name'];  
						$full_path = $data_image_upload['upload_image_data']['full_path'];                 
					}

					$filename_layout[] = $image_name;

				} // end for loop
						                
			}

			foreach ($filename_layout as $key => $value) {
				$insert_image=array(
					'document_name'=> $value,
					'lead_id' => $lead_id,
					'stage_id' => $stage_id,
					'created_date' => date("Y-m-d G:i:s"),
					'category_status' => 2,
					'user_id' =>$this->session->userdata('user_id'),
				);
				$add_image = $this->Mod_common->insert_into_table('lead_documents', $insert_image);
						                    
			}
			$filename=array();

			//upload quatation
			if(count($_FILES['quotation_wip']['name']) > 0 && $_FILES['quotation_wip']['name'] !=''){
			                			
				$files = $_FILES['quotation_wip'];
				$count = count($_FILES['quotation_wip']['name']);
				//echo $_FILES['quotation_wip']['name'];exit();
				for($i=0; $i<$count;$i++){  
						            
					$config = array();
					$projects_folder_path = './upload/document/';
					$thumb = $projects_folder_path . 'thumb';

					$_FILES['quotation_wip']['name']= $files['name'][$i];
		            $_FILES['quotation_wip']['type']= $files['type'][$i];
		            $_FILES['quotation_wip']['tmp_name']= $files['tmp_name'][$i];
		            $_FILES['quotation_wip']['error']= $files['error'][$i];
		            $_FILES['quotation_wip']['size']= $files['size'][$i];
						                                      
						                   
					$file_ext  = ltrim(strtolower(strrchr($_FILES['quotation_wip']['name'],'.')),'.');  
					$file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;
						                
					$config['upload_path']         = $projects_folder_path;
					$config['allowed_types']       = '*';
					$config['encrypt_name']        = TRUE;
					$config['overwrite'] = TRUE;
					$config['file_name'] = $file_name;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if(!$this->upload->do_upload('quotation_wip')){
						$error_file_arr = array('error' => $this->upload->display_errors());
						                    
						$this->session->set_flashdata('err_message', $error_file_arr['error']);
						    echo "2"; 
					}else {
						$data_image_upload = array('upload_image_data' => $this->upload->data());
						$image_name =$data_image_upload['upload_image_data']['file_name'];  
						$full_path = $data_image_upload['upload_image_data']['full_path'];                 
					}

					$filename[] = $image_name;

				} // end for loop
						                
			}

			foreach ($filename as $key => $value) {
				$insert_image=array(
					'document_name'=> $value,
					'lead_id' => $lead_id,
					'stage_id' => $stage_id,
					'created_date' => date("Y-m-d G:i:s"),
					'category_status' => 3,
					'user_id' =>$this->session->userdata('user_id'),
				);
				$add_image = $this->Mod_common->insert_into_table('lead_documents', $insert_image);
						                    
			}

			if($add_image){
				echo "1";
			}else{
				echo "2";
			}

		}else{
			$this->session->set_flashdata('err_message',$check['message']);
			echo "3";
		}
		
	}

	public function submit_lead_progress(){
		$check=$this->Auth_model->Auth();
		if($check['status']==200){
			$lead_id=$this->input->post('lead_id1');
			$stage_id=$this->input->post('stage_id1');
			$assign_id=$this->input->post('assign_id1');
			$stage=$this->input->post('stage');

			if($stage==1){//visit to wip
				$assign=4;
				$result=1;
			}elseif ($stage==3) {//presentation to success
				$assign=7;
				$result=2;
			}elseif($stage==4){//fail
				$assign=8;
				$result=3;
			}

			if($stage==2){
				$where=array('id' => $stage_id,);
				$result=$this->Mod_common->select_single_records('stage',$where);
				if($result['submitted_count']>0){
					$update_array=array(
						'end_date' =>  date('Y-m-d H:i:s'),
					);
					$update=$this->Mod_common->update_table('stage',$where,$update_array);
					if($update){
						$where=array(
							'lead_id' => $lead_id,
							'assign_id' => $assign_id,
							'stage_name_id' => 5,
						);
						$result=$this->Mod_common->select_single_records('stage',$where);
						if($result){
							$update_array=array('stage_id' => $result['id'],);
							$where=array('id' =>$lead_id);
							$update=$this->Mod_common->update_table('customer_leads',$where,$update_array);
							if($update){
								echo "1";
							}else{
								echo "2";
							}
						}
					}

					
				}else{
					$assign=5;
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
							'submitted_count' => 0,
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
}

/* End of file Lead.php */
/* Location: ./application/controllers/bdm/Lead.php */
?>