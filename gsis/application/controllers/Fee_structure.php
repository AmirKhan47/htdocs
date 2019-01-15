<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Fee_structure extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Fee_structure_model','fee_structure',true);
	}
	public function index()
	{
		if($this->session->userdata('id'))
		{
			$data['active']='manage_fee_structure';
			$this->load->view('admin/header',$data);
			$this->load->view('admin/fee_structure/manage_fee_structure',$data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function get_fee_structure()
    {
        $list = $this->fee_structure->get_fee_structure();
        $data = array();
        $no = $_POST['start'];
        $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            $row[] = $i;
            $row[] = $value['class_name'];
            $row[] = $value['created_at'];
            $row[] = '<a class="btn btn-primary btn-sm" href="'.SURL.'fee_structure/edit_fee_structure/'.$value['fee_structure_id'].'">Edit</a>
            		';
            $data[] = $row;
            $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->fee_structure->fee_structure_count(),
            "recordsFiltered" => $this->fee_structure->fee_structure_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
	public function add_fee_structure()
	{
		if($this->session->userdata('id'))
		{
			if($this->input->post('submit'))
			{
				$check=$this->common->checkfield_in_table('fee_structure','class_id',$this->input->post('class_id'));
				if($check)
				{
					echo '<h1>Fee Structure for this Class already exist!</h1>';
					exit();
				}
				$fee_structure = array(
					'class_id' => $this->input->post('class_id'),
					'admission_fee' => $this->input->post('admission_fee'),
					'security' => $this->input->post('security'),
					'tution_fee' => $this->input->post('tution_fee'),
					'computer_charges' => $this->input->post('computer_charges'),
					'annual_fund' => $this->input->post('annual_fund'),
					'lab_charges' => $this->input->post('lab_charges'),
					'monthly_security' => $this->input->post('monthly_security'),
					'stationary_fund' => $this->input->post('stationary_fund'),
					'exam_charges' => $this->input->post('exam_charges'),
					'registration_charges' => $this->input->post('registration_charges'),
					'deferred' => $this->input->post('deferred'),
					'house_shirt' => $this->input->post('house_shirt'),
					'received' => $this->input->post('received'),
					'created_by' => $this->session->userdata('id')
				);
				$result=$this->common->insert_into_table('fee_structure',$fee_structure);
				if ($result)
				{
					$this->session->set_flashdata('ok_message', '- Record inserted successfully!');
					redirect('fee_structure/add_fee_structure/');
				}
				else
				{
					$this->session->set_flashdata('err_message', '- Failed to insert record!');
					redirect('fee_structure/add_fee_structure/');
				}
			}
			else
			{
				$data['active']='manage_fee_structure';
				$this->load->view('admin/header',$data);
				$data['classes']=$this->common->get_all_records('classes');
				$this->load->view('admin/fee_structure/add_fee_structure',$data);
				$this->load->view('admin/footer');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function edit_fee_structure( $id = NULL )
	{
		if($this->session->userdata('id'))
		{
			if($this->input->post('submit'))
			{
				$fee_structure = array(
					'admission_fee' => $this->input->post('admission_fee'),
					'security' => $this->input->post('security'),
					'tution_fee' => $this->input->post('tution_fee'),
					'computer_charges' => $this->input->post('computer_charges'),
					'annual_fund' => $this->input->post('annual_fund'),
					'lab_charges' => $this->input->post('lab_charges'),
					'monthly_security' => $this->input->post('monthly_security'),
					'stationary_fund' => $this->input->post('stationary_fund'),
					'exam_charges' => $this->input->post('exam_charges'),
					'registration_charges' => $this->input->post('registration_charges'),
					'deferred' => $this->input->post('deferred'),
					'house_shirt' => $this->input->post('house_shirt'),
					'received' => $this->input->post('received'),
					'updated_by' => $this->session->userdata('id')
				);
				$result=$this->common->update_table('fee_structure',array('fee_structure_id'=>$id),$fee_structure);
				if ($result)
				{
					$this->session->set_flashdata('ok_message', '- Record updated successfully!');
					redirect('fee_structure/');
				}
				else
				{
					$this->session->set_flashdata('err_message', '- Failed to update record!');
					redirect('fee_structure/edit_fee_structure/');
				}
			}
			else
			{
				$data['active']='manage_fee_structure';
				$this->load->view('admin/header',$data);
				$data['classes']=$this->common->get_all_records('classes');
				$data['fee_structure']=$this->common->select_single_records('fee_structure',array('fee_structure_id'=>$id));
				$data['class']=$this->common->select_single_records('classes',array('id'=>$data['fee_structure']['class_id']));
				$this->load->view('admin/fee_structure/edit_fee_structure',$data);
				$this->load->view('admin/footer');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	// public function delete( $id = NULL )
	// {

	// }
}