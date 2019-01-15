<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'libraries/spreadsheet/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Reader\IReader;
class Challan extends CI_Controller
{
	private $dateToday,$dateTimeToday;
	function __construct()
	{
		parent :: __construct();
		$this->load->model('registration_model');
		date_default_timezone_set("Asia/Karachi");
		$this->dateTimeToday = date("Y-m-d H:i:s");
		$this->dateToday = date('Y-m-d');
	}
	public function index($student_id=0)
	{
		if($this->session->userdata('id'))
		{
			if($student_id>0)
			{
				$data['due_date']=date('Y-m-d',strtotime($this->dateToday . "+10 days"));
				$data['date_today']=$this->dateToday;
				$data['student_id']=$student_id;
				$data['challans']=$this->registration_model->read_data_from_table('challan',array('student_id' => $student_id ));
				$data['registration']=$this->common->select_single_records('registration',array('student_id'=>$student_id));
				$data['fee_structure']=$this->common->select_single_records('fee_structure',array('class_id'=>$data['registration']['class_id']));
				$data['active']='registeredStudents';
				$this->load->view('admin/header',$data);
				$this->load->view('registration/data_entry',$data);
			}
			else
			{
				show_404();
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function voucher()
	{
		if($this->session->userdata('id'))
		{
			$this->load->view('registration/voucher');
		}
		else
		{
			redirect('login/');
		}
	}
	public function excel()
	{
		if($this->session->userdata('id'))
		{
			$data['students']=$this->common->all_registered_students_data();
			if(empty($data['students']))
			{
				echo 'No Record Found!';
				exit();
			}
			// echo "<pre>";
			// print_r ($data);
			// echo "</pre>";
			// exit();
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$styleArray = array(
								'borders' => array(
			        								'outline' => array(
			            												'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
			            												'color' => array('argb' => 'FF111111'),
			        												),
			    								),
								);
			// $styleArray_roll = array(
			//     						'fill' => array(
			//     											'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
			//     											'color' => array('rgb' => ''),
			//    											 ),
			// 						);
			$i=1;
			$sheet->setCellValue('A1', 'Registration No');
			$sheet->setCellValue('B1', 'Roll No');
			$sheet->setCellValue('C1', 'Name');
			$sheet->setCellValue('D1', 'Gender');
			$sheet->setCellValue('E1', 'Registration Date');
			$sheet->setCellValue('F1', 'Status');
			$sheet->setCellValue('G1', 'Registration Fee');
			$sheet->setCellValue('H1', 'Last School');
			$sheet->setCellValue('I1', 'Reason For Leaving');
			$sheet->setCellValue('J1', 'Father Name');
			$sheet->setCellValue('K1', 'Father CNIC');
			$sheet->setCellValue('L1', 'Father Occupation');
			$sheet->setCellValue('M1', 'Father Designation');
			$sheet->setCellValue('N1', 'Father Organization');
			$sheet->setCellValue('O1', 'Mother Name');
			$sheet->setCellValue('P1', 'Mother CNIC');
			$sheet->setCellValue('Q1', 'Mother Occupation');
			$sheet->setCellValue('R1', 'Mother Designation');
			$sheet->setCellValue('S1', 'Mother Organization');
			$sheet->setCellValue('T1', 'Issue Date');
			$sheet->setCellValue('U1', 'Due Date');
			$sheet->setCellValue('V1', 'Fee Month');

			$sheet->setCellValue('W1', 'Admission Fee');
			$sheet->setCellValue('X1', 'Admission Fee Discount %');
			$sheet->setCellValue('Y1', 'Admission Fee Discounted Amount ');

			$sheet->setCellValue('Z1', 'Security (Refundable)');
			$sheet->setCellValue('AA1', 'Security Discount %');
			$sheet->setCellValue('AB1', 'Security Discounted Amount');

			$sheet->setCellValue('AC1', 'Tution Fee');
			$sheet->setCellValue('AD1', 'Tution Fee Discount %');
			$sheet->setCellValue('AE1', 'Tution Fee Discounted Amount');

			$sheet->setCellValue('AF1', 'Annual Stationary Fund');
			$sheet->setCellValue('AG1', 'Annual Stationary Fund Discount %');
			$sheet->setCellValue('AH1', 'Annual Stationary Fund Discounted Amount');

			$sheet->setCellValue('AI1', 'Annual Fund');
			$sheet->setCellValue('AJ1', 'Annual Fund Discount %');
			$sheet->setCellValue('AK1', 'Annual Fund Discounted Amount');

			$sheet->setCellValue('AL1', 'Monthly lab Charges');
			$sheet->setCellValue('AM1', 'Exam Charges');
			$sheet->setCellValue('AN1', 'Registration Charges');
			$sheet->setCellValue('AO1', 'Less: DEFERRED (IF ANY)');
			$sheet->setCellValue('AP1', 'House Shirt Charges');
			$sheet->setCellValue('AQ1', 'Less: Received (IF ANY)');
			$sheet->setCellValue('AR1', 'Monthly Security');
			$sheet->setCellValue('AS1', 'Monthly Computer Charges');
			$sheet->setCellValue('AT1', 'Remarks');
			$sheet->getStyle('A1:AT1')->applyFromArray($styleArray);
			$totalStudents=(int)(count($data['students']))+1;
			// $sheet->getStyle('A2:A'.$totalStudents)->applyFromArray($styleArray_roll);
			foreach ($data['students'] as $student)
			{
				$i++;
				// echo "<pre>";
				// print_r ($student);
				// echo "</pre>";
				// exit();
				$father=$this->registration_model->get_student_guardian_single($student['student_id'],'Father');
				$mother=$this->registration_model->get_student_guardian_single($student['student_id'],'Mother');
				// echo "<pre>";
				// print_r ($father);
				// print_r ($mother);
				// echo "</pre>";
				// exit();
				// $challan=$this->registration_model->read_data_from_table('challan',array('student_id'=>$student['id']));
				// $discount=$this->registration_model->read_data_from_table('student_fees_discounts',array('student_id'=>$student['id']));
				// $fee_structure=$this->registration_model->read_data_from_table('fee_structure',array('class_id'=>$registration[0]['class_id']));

				$sheet->setCellValue('A'.$i, $student['student_roll_no']);
				$sheet->setCellValue('B'.$i, $student['student_registration_no']);
				$sheet->setCellValue('C'.$i, $student['student_name']);
				$sheet->setCellValue('D'.$i, $student['student_gender']);
				$sheet->setCellValue('E'.$i, $student['pending_date']);
				$sheet->setCellValue('F'.$i, $student['registration_status']);
				$sheet->setCellValue('G'.$i, $student['registration_fee']);
				$sheet->setCellValue('H'.$i, $student['registration_last_school_name']);
				$sheet->setCellValue('I'.$i, $student['registration_last_school_reason_for_leaving']);
				$sheet->setCellValue('J'.$i, $father['guardian_name']);
				$sheet->setCellValue('K'.$i, $father['guardian_national_id']);
				$sheet->setCellValue('L'.$i, $father['guardian_occupation']);
				$sheet->setCellValue('M'.$i, $father['guardian_designation']);
				$sheet->setCellValue('N'.$i, $father['guardian_organization']);
				$sheet->setCellValue('O'.$i, $mother['guardian_name']);
				$sheet->setCellValue('P'.$i, $mother['guardian_national_id']);
				$sheet->setCellValue('Q'.$i, $mother['guardian_occupation']);
				$sheet->setCellValue('R'.$i, $mother['guardian_designation']);
				$sheet->setCellValue('S'.$i, $mother['guardian_organization']);
				$sheet->setCellValue('T'.$i, $student['challan_date_created']);
				$sheet->setCellValue('U'.$i, $student['challan_due_date']);
				$sheet->setCellValue('V'.$i, $student['challan_fee_month']);
				$sheet->setCellValue('W'.$i, $student['admission_fee']);
				$sheet->setCellValue('X'.$i, $student['admission_fee_discount']);
				$sheet->setCellValue('Y'.$i, $student['challan_admission_fee']);
				$sheet->setCellValue('Z'.$i, $student['security']);
				$sheet->setCellValue('AA'.$i, $student['security_discount']);
				$sheet->setCellValue('AB'.$i, $student['challan_security_fee']);
				$sheet->setCellValue('AC'.$i, $student['tution_fee']);
				$sheet->setCellValue('AD'.$i, $student['tution_fee_discount']);
				$sheet->setCellValue('AE'.$i, $student['challan_monthly_fee']);
				$sheet->setCellValue('AF'.$i, $student['stationary_fund']);
				$sheet->setCellValue('AG'.$i, $student['stationary_fund_discount']);
				$sheet->setCellValue('AH'.$i, $student['challan_annual_stationary_fee']);
				$sheet->setCellValue('AI'.$i, $student['annual_fund']);
				$sheet->setCellValue('AJ'.$i, $student['annual_fund_discount']);
				$sheet->setCellValue('AK'.$i, $student['challan_annual_fee']);
				$sheet->setCellValue('AL'.$i, $student['challan_monthly_lab_fee']);
				$sheet->setCellValue('AM'.$i, $student['challan_exam_fee']);
				$sheet->setCellValue('AN'.$i, $student['challan_registration_fee']);
				$sheet->setCellValue('AO'.$i, $student['challan_deferred']);
				$sheet->setCellValue('AP'.$i, $student['challan_house_shirt_fee']);
				$sheet->setCellValue('AQ'.$i, $student['challan_less_received']);
				$sheet->setCellValue('AR'.$i, $student['challan_monthly_security_fee']);
				$sheet->setCellValue('AS'.$i, $student['challan_monthly_computer_fee']);
				$sheet->setCellValue('AT'.$i, $student['challan_remarks']);
			}
			// exit();
			$writer = new Xlsx($spreadsheet);
			// ob_end_clean();
			//var_dump(extension_loaded('zip'));
			// redirect output to client browser
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="myfile.xlsx"');
			header('Cache-Control: max-age=0');
			//$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
			//$writer->save('hello world.xlsx');
			//$this->load->view('export_excel');
		}
		else
		{
			redirect('login/');
		}
	}
	public function create()
	{
		if($this->session->userdata('id'))
		{
			$challan_due_date=date_format(date_create($this->input->post('challan_due_year').'-'.$this->input->post('challan_due_month').'-'.$this->input->post('challan_due_day')),"Y-m-d");
			$challan_fee_month=date_format(date_create($this->input->post('challan_fee_year').'-'.$this->input->post('challan_fee_month').'-'.'01'),"Y-m-d");
			$challan = array(
						'student_id' 						=>  $this->input->post('student_id')
						,'challan_fee_month' 				=>  $challan_fee_month
						,'challan_date_created' 			=>  $this->dateToday
						,'challan_due_date' 				=>  $challan_due_date
						,'challan_admission_fee' 			=>  $this->input->post('admission_fee_total')
						,'challan_registration_fee' 		=>  $this->input->post('registration_charges')
						,'challan_security_fee' 			=>  $this->input->post('security_total')
						,'challan_annual_fee' 				=>  $this->input->post('annual_fund_total')
						,'challan_annual_stationary_fee'	=>  $this->input->post('stationary_fund_total')
						,'challan_house_shirt_fee' 			=>  $this->input->post('house_shirt')
						,'challan_monthly_lab_fee' 			=>  $this->input->post('lab_ch')
						,'challan_monthly_computer_fee' 	=>  $this->input->post('comp_ch')
						,'challan_monthly_security_fee' 	=>  $this->input->post('monthly_security')
						,'challan_monthly_fee' 				=>  $this->input->post('tution_fee_total')
						,'challan_exam_fee' 				=>  $this->input->post('exam_charges')
						,'challan_deferred' 				=>  $this->input->post('deferred')
						,'challan_less_received' 			=>  $this->input->post('received')
						,'challan_remarks' 					=>  $this->input->post('remarks')
						,'created_by'						=>  $this->session->userdata('id')
				);
			$result=$this->registration_model->create_data_in_table('challan',$challan);
			$challanId=$this->registration_model->read_last_insert_id();
			$student_fees_discounts = array(
						'student_id' 						=>  $this->input->post('student_id')
						,'challan_id' 						=>  $challanId
						,'admission_fee_discount' 			=>  $this->input->post('admission_fee_discount')
						,'security_discount' 				=>  $this->input->post('security_discount')
						,'tution_fee_discount' 				=>  $this->input->post('tution_fee_discount')
						,'annual_fund_discount' 			=>  $this->input->post('annual_fund_discount')
						,'stationary_fund_discount' 		=>  $this->input->post('stationary_fund_discount')
						,'created_by'						=>  $this->session->userdata('id')
				);
			$result=$this->registration_model->create_data_in_table('student_fees_discounts',$student_fees_discounts);
			redirect('challan/view/'.$challanId);
		}
		else
		{
			redirect('login/');
		}
	}
	public function edit($challan_id=0)
	{
		if($this->session->userdata('id'))
		{
			if($challan_id>0)
			{
				$data['student']=$this->common->select_single_records('challan',array('id'=>$challan_id));
				$data['registration']=$this->common->select_single_records('registration',array('student_id'=>$data['student']['student_id']));
				$data['fee_structure']=$this->common->select_single_records('fee_structure',array('class_id'=>$data['registration']['class_id']));
				$data['challan']=$this->common->select_single_records('challan',array('id'=>$challan_id));
				$data['student_fees_discounts']=$this->common->select_single_records('student_fees_discounts',array('challan_id'=>$data['challan']['id']));
				$data['challan_due_day']=date('d',strtotime($data['challan']['challan_due_date']));
				$data['challan_due_month']=date('M',strtotime($data['challan']['challan_due_date']));
				$data['challan_due_year']=date('Y',strtotime($data['challan']['challan_due_date']));
				$data['challan_fee_month']=date('M',strtotime($data['challan']['challan_fee_month']));
				$data['challan_fee_year']=date('Y',strtotime($data['challan']['challan_fee_month']));
				$data['student_id']=$data['challan']['student_id'];
				$data['active']='registeredStudents';
				$this->load->view('admin/header',$data);
				$this->load->view('registration/data_entry_update',$data);
			}
			else
			{
				show_404();
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function update()
	{
		if($this->session->userdata('id'))
		{
			$challan_due_date=date_format(date_create($this->input->post('challan_due_year').'-'.$this->input->post('challan_due_month').'-'.$this->input->post('challan_due_day')),"Y-m-d");
			$challan_fee_month=date_format(date_create($this->input->post('challan_fee_year').'-'.$this->input->post('challan_fee_month').'-'.'01'),"Y-m-d");
			$challan_id=$this->input->post('challan_id');
			$challan = array(
						'challan_due_date' =>  $challan_due_date
						,'challan_fee_month' =>  $challan_fee_month
						,'challan_admission_fee' 			=>  $this->input->post('admission_fee_total')
						,'challan_registration_fee' 		=>  $this->input->post('registration_charges')
						,'challan_security_fee' 			=>  $this->input->post('security_total')
						,'challan_annual_fee' 				=>  $this->input->post('annual_fund_total')
						,'challan_annual_stationary_fee'	=>  $this->input->post('stationary_fund_total')
						,'challan_house_shirt_fee' 			=>  $this->input->post('house_shirt')
						,'challan_monthly_lab_fee' 			=>  $this->input->post('lab_ch')
						,'challan_monthly_computer_fee' 	=>  $this->input->post('comp_ch')
						,'challan_monthly_security_fee' 	=>  $this->input->post('monthly_security')
						,'challan_monthly_fee' 				=>  $this->input->post('tution_fee_total')
						,'challan_exam_fee' 				=>  $this->input->post('exam_charges')
						,'challan_deferred' 				=>  $this->input->post('deferred')
						,'challan_less_received' 			=>  $this->input->post('received')
						,'challan_remarks' 					=>  $this->input->post('remarks')
						,'updated_by'						=>  $this->session->userdata('id')
				);
			$result=$this->registration_model->update_data_in_table('challan',$challan,array('id'=>$challan_id));
			$student_fees_discounts = array(
						'admission_fee_discount' 			=>  $this->input->post('admission_fee_discount')
						,'security_discount' 				=>  $this->input->post('security_discount')
						,'tution_fee_discount' 				=>  $this->input->post('tution_fee_discount')
						,'annual_fund_discount' 			=>  $this->input->post('annual_fund_discount')
						,'stationary_fund_discount' 		=>  $this->input->post('stationary_fund_discount')
						,'updated_by'						=>  $this->session->userdata('id')
				);
			$result=$this->registration_model->update_data_in_table('student_fees_discounts',$student_fees_discounts,array('challan_id'=>$challan_id));
			redirect('challan/view/'.$challan_id);
		}
		else
		{
			redirect('login/');
		}
	}
	public function view($id='')
	{
		if($this->session->userdata('id'))
		{
			$data['challan']=$this->registration_model->read_data_from_table('challan',array('id' => $id ));
			$data['student']=$this->registration_model->read_data_from_table('student',array('id' => $data['challan'][0]['student_id'] ));
			
			$temp=$this->registration_model->read_data_from_table('registration',array('student_id' => $data['student'][0]['id'] ));
			
			$class=$this->registration_model->read_data_from_table('classes',array('id' => $temp[0]['class_id'] ));
			$data['class']=$class[0]['class_name'];
			
			$branch=$this->registration_model->read_data_from_table('branch',array('id' => $temp[0]['branch_id'] ));
			$data['branch']=$branch[0]['branch_name'];

			$data['user']=$this->common->select_single_records('users',array('id'=>$data['challan'][0]['created_by']));
			
			$data['title']=ucfirst('challan');
			$this->load->view('registration/challan', $data);
		}
		else
		{
			redirect('login/');
		}
	}
	public function search()
	{
		if($this->session->userdata('id'))
		{
			$student_roll_no=$this->input->post('search');
			$data['student']=$this->registration_model->read_data_from_table('student',array('student_roll_no' => $student_roll_no ));
			$data['challan']=$this->registration_model->read_data_from_table('challan',array('student_id' => $data['student'][0]['id'] ));
			$temp=$this->registration_model->read_data_from_table('registration',array('student_id' => $data['challan'][0]['id'] ));
			$class=$this->registration_model->read_data_from_table('classes',array('id' => $temp[0]['class_id'] ));
			$data['class']=$class[0]['class_name'];
			$branch=$this->registration_model->read_data_from_table('branch',array('id' => $temp[0]['branch_id'] ));
			$data['branch']=$branch[0]['branch_name'];
			$data['title']=ucfirst('challan');
			$data['user']=$this->common->select_single_records('users',array('id'=>$data['challan'][0]['created_by']));
			$this->load->view('registration/challan', $data);
		}
		else
		{
			redirect('login/');
		}
	}
	public function viewByRoll($roll=4)
	{
		if($this->session->userdata('id'))
		{
			$data['student']=$this->registration_model->read_data_from_table('student',array('student_roll_no' => $roll ));
			$data['challan']=$this->registration_model->read_data_from_table('challan',array('id' => $data['student'][0]['id'] ));
			$data['title']=ucfirst('challan');
			$this->load->view('registration/challan', $data);
		}
		else
		{
			redirect('login/');
		}
	}
	public function import_excel()
	{
		if($this->session->userdata('id'))
		{
			if($this->input->post('submit'))
			{
				// echo "<pre>";
				// print_r ($_FILES);
				// echo "</pre>";
				// exit();
				$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes))
				{
				    $arr_file = explode('.', $_FILES['file']['name']);
				    $extension = end($arr_file);
				 
				    if('csv' == $extension)
				    {
				        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
				    }
				    else
				    {
				        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				    }
				    $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
				    $sheetData = $spreadsheet->getActiveSheet()->toArray(NULL,true,true,true);
				    foreach ( $sheetData as $k=>$v )
					{
					  $sheetData[$k] ['name'] = $sheetData[$k] ['A'];
					  $sheetData[$k] ['class'] = $sheetData[$k] ['B'];
					  $sheetData[$k] ['address'] = $sheetData[$k] ['C'];
					  unset($sheetData[$k]['A']);
					  unset($sheetData[$k]['B']);
					  unset($sheetData[$k]['C']);
					}
				    echo "<pre>";
				    print_r ($sheetData);
				    echo "</pre>";
				    exit();
				    $result=$this->common->import($sheetData);
				 	echo($result);
				 	exit();
				    echo "<pre>";
				    print_r ($sheetData);
				    echo "</pre>";
				    exit();
				}
				// $data['format']=$this->common->select_array_records('excel');
				// $data['students']=$this->registration_model->all_registered_students();
				// $spreadsheet = new Spreadsheet();
    //     		$sheet = $spreadsheet->getActiveSheet();

        		// for($i=0;$i<5;$i++)
        		// {
        		// 	for($j=1;$j<394;$j++)
        		// 	{
        		// 		$sheet->setCellValue('A'.$i, $data['format'][$i]['COL '.$j]);
        		// 	}
        		// }
        		// exit();
        		// echo "<pre>";
        		// print_r ($data['format'][0]['COL 1']);
        		// print_r ($data['students']);
        		// echo "</pre>";
        		// for($i=1; $i<$len;$i++)
        		// {
        		// 	echo "<pre>";
        		// 	print_r ($data['format'][0]['COL '.$i]);
        		// 	echo "</pre>";
        			// $len = $len+1;
        		// }
        		// for ($i=1; $i < $len; $i++)
        		// { 
        		// 	echo "<pre>";
        		// 	print_r ($data['format'][1]['COL '.$i]);
        		// 	echo "</pre>";
        		// }
        		// exit();
    //     		$i=0;
    //     		$col=1;
    //     		foreach ($data['format'] as $row => $value)
				// {
				// 	$i++;
				// 	$sheet->setCellValue('A'.$i, $value['COL '.$i]);
					// $sheet->setCellValue('A'.$i, $value['COL 1']);
					// $sheet->setCellValue('B'.$i, $value['COL 2']);
					// $sheet->setCellValue('C'.$i, $value['COL 3']);
					// $sheet->setCellValue('D'.$i, $value['COL 4']);
					// $sheet->setCellValue('E'.$i, $value['COL 5']);
					// $sheet->setCellValue('G'.$i, $value['COL 7']);
					// $sheet->setCellValue('J'.$i, $value['COL 10']);
					// $sheet->setCellValue('K'.$i, $value['COL 11']);
					// $sheet->setCellValue('L'.$i, $value['COL 12']);
					// $sheet->setCellValue('N'.$i, $value['COL 14']);
					// $col++;
				// }
    //     		foreach ($data['students'] as $row => $student)
				// {
				// 	$i++;
				// 	$sheet->setCellValue('A'.$i, $student['student_registration_no']);
				// 	$sheet->setCellValue('B'.$i, $student['student_name']);
				// 	$sheet->setCellValue('C'.$i, '');
				// 	$sheet->setCellValue('D'.$i, '');
				// 	$sheet->setCellValue('E'.$i, $student['class_name']);
				// 	$sheet->setCellValue('G'.$i, $student['branch_name']);
				// 	$sheet->setCellValue('J'.$i, $student['challan_admission_fee']);
				// 	$sheet->setCellValue('K'.$i, $student['challan_monthly_lab_fee']);
				// 	$sheet->setCellValue('L'.$i, $student['challan_monthly_computer_fee']);
				// 	$sheet->setCellValue('N'.$i, $student['challan_fee_month']);
				// }
        		// $writer = new Xlsx($spreadsheet);
		        // $filename = 'test';
		        // header('Content-Type: application/vnd.ms-excel');
		        // header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		        // header('Cache-Control: max-age=0');
		        // $writer->save('php://output'); // download file 
				// ------------------------------------------------------------------------
				// $result=$this->common->import($data);
				// echo $result;
				// exit();
			}
			else
			{
				// $data['active']='import_excel';
				// $this->load->view('admin/header',$data);
				$this->load->view('admin/import/import_excel');
				// $this->load->view('admin/footer');
			}
		}
		else
		{
			redirect('login/');
		}

	}
}
?>