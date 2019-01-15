<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student extends CI_Controller
{
	function __construct()
	{
		parent :: __construct();
		$this->load->model('registration_model');
	}
	public function index()
	{
		$data['classes']=$this->registration_model->read_data_from_table('classes');
		$this->load->view('header');
		$this->load->view('registration/registration_form',$data);
	}
	public function getBranchesInClass($class_id)
	{
		$branches = $this->registration_model->get_all_branches_in_class($class_id);
		if(!$branches)
		{
			echo json_encode(array('response'=>'fail'));
		}
		else
		{
			$response='';
			foreach ($branches as $key => $value) 
			{
				$response .= '<option value="'.$value['id'].'">'.$value['branch_name'].'</option>';
			}
			echo json_encode(array('response'=>'success','data'=>$response));
		}
	}
	public function isAlreadyRegistered($student_national_id='0')
	{
		if($this->registration_model->is_student_national_id_registered($student_national_id))
		{
			echo "true";
		}
		else
		{
			echo "false";
		}
	}
	public function add()
	{
		$form_response=$this->input->post('g-recaptcha-response');
		$url="https://www.google.com/recaptcha/api/siteverify";
		$secret="6LfTe1IUAAAAAHEjl6jJRfJTcNFmPcMVscbvIkpL";
		// $response=file_get_contents($url."?secret=".$secret."&response=".$form_response."&remoteip=".$_SERVER["REMOTE_ADDR"]);
		// ------------------------------------------------------------------------
		$response="true";//for localhost
		if ($response)
		// ------------------------------------------------------------------------
		// $data=json_decode($response);
		// if(isset($data->success)&& $data->success=="true")
		{
			$student_name=$this->input->post('student_name');
			$student_date_of_birth=date_format(date_create($this->input->post('student_date_of_birth_year').'-'.$this->input->post('student_date_of_birth_month').'-'.$this->input->post('student_date_of_birth_day')),"Y-m-d");
			$student = array('student_name' =>  $student_name
					,'student_national_id' =>  $this->input->post('student_national_id')
					,'student_gender' =>  $this->input->post('student_gender')
					,'student_date_of_birth' =>  $student_date_of_birth
					,'student_place_of_birth' =>  $this->input->post('student_place_of_birth')
					,'student_religion' =>  $this->input->post('student_religion')
					,'student_nationality' =>  $this->input->post('student_nationality')
					,'student_status' =>  1
			);
			if(!empty($this->input->post('student_national_id')))
			{
				if($this->registration_model->is_student_national_id_registered($student['student_national_id']))
				{
					echo "CNIC/B.Form Already Registered...!!";
					exit();
				}
			}
			
			// else
			// {
				//last attended school from
				$registration_last_school_from=$this->input->post('registration_last_school_from_year').'-'.$this->input->post('registration_last_school_from_month').'-'.$this->input->post('registration_last_school_from_day');

				$registration_last_school_to=$this->input->post('registration_last_school_to_year').'-'.$this->input->post('registration_last_school_to_month').'-'.$this->input->post('registration_last_school_to_day');

				$registration = array('branch_id' =>  $this->input->post('branch_name')
						,'class_id' =>  $this->input->post('class_name')
						,'registration_last_school_name'	=>  $this->input->post('registration_last_school_name')
						,'registration_last_school_from'	=>  $registration_last_school_from
						,'registration_last_school_to'		=>  $registration_last_school_to
						,'registration_last_school_reason_for_leaving' =>  $this->input->post('registration_reason_for_leaving')
						
				);
				if($this->input->post('registration_required_from_year')>0 && $this->input->post('registration_required_from_month')>0 && $this->input->post('registration_required_from_day')>0)
				{
					$registration_required_from=date_format(date_create($this->input->post('registration_required_from_year').'-'.$this->input->post('registration_required_from_month').'-'.$this->input->post('registration_required_from_day')),"Y-m-d");
					$temp=array('registration_required_from' => $registration_required_from);
					$registration=array_merge($registration, $temp);
				}
				$guardian = array(
									'guardian_name' 		=> $this->input->post('guardian_name'),
									'guardian_national_id'	=> $this->input->post('guardian_national_id')
								);
				$guardian1 = array(
									'guardian_name' 		=> $this->input->post('guardian_name1'),
									'guardian_national_id'	=> $this->input->post('guardian_national_id1')
								);
				$contact = array('contact_cell' =>  $this->input->post('contact_cell')
						,'contact_line' =>  $this->input->post('contact_line')
						,'contact_email' =>  $this->input->post('contact_email')
				);
				// ------------------------------------------------------------------------
				$address = array(
					'address_local' 	=>  $this->input->post('address_local'),
					'address_sector'	=>  $this->input->post('address_sector'),
					'address_city'		=>  $this->input->post('address_city')
				);
				// ------------------------------------------------------------------------
				$student_contact = array('student_contact_name' =>  'father'
				);
				//print_r($student_contact);
				$response= $this->registration_model->register_new_student($student,$registration,$guardian,$guardian1,$contact,$address,$student_contact);
				if($response=="success")
				{
					if($this->session->userdata('id'))
					{
						redirect('admin/portal');
					}
						$this->load->view('header');
						echo '<div class="container" style="margin-top:50px;">
							  <div class="jumbotron">
							    <h1>Thank you for registering with GSIS!</h1> 
							    <p>Your registration form is under process.In case you did not get notify within 24 hours,directly visit the seeked campus.</p> 
							  </div>
							  <a href="'.base_url().'"><button class="btn btn-primary btn-block"> Go Back</button></a>
							</div>';
				}
				else
				{
					echo $response;
				}	
			// }
		}
		else
		{
			echo "Wrong Captcha!";
		}
	}
}
?>