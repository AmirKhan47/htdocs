<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Designation extends CI_Controller
{
	public function __construct()
	{
		parent :: __construct();
		$this->load->model('Designation_model','designation',true);
	}
	public function index()
	{
		if($this->session->userdata('id'))
		{
			$data['departments']=$this->common->select_array_records('departments');
			$data['active']='manage_designations';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/designations/add_designation', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function manage_designations()
	{
		if($this->session->userdata('id'))
		{
			// $data['designations']=$this->common->select_array_records('designations');
			$data['active']='manage_designations';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/designations/manage_designations', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function get_designations()
    {
        $list = $this->designation->get_designations();
        $data = array();
        $no = $_POST['start'];
        $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            $row[] = $i;
            $row[] = $value['position_name'];
            $row[] = $value['created_at'];
            $row[] ='<a class="btn btn-primary btn-sm" href="'.SURL.'designation/edit_designation/'.$value['position_id'].'">Edit</a>
            		<a class="btn btn-danger btn-sm" href="'.SURL.'designation/delete_designation/'.$value['position_id'].'" onclick="return confirm(\'Are you sure you want to delete this item?\');">Delete</a>
            		';
            $data[] = $row;
            $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->designation->designation_count(),
            "recordsFiltered" => $this->designation->designation_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function manage_department_designations()
	{
		if($this->session->userdata('id'))
		{
			// $data['designations']=$this->common->select_array_records('designations');
			$data['active']='manage_department_designations';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/designations/manage_department_designations', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function get_department_designations()
    {
        $list = $this->designation->get_department_designations();
        $data = array();
        $no = $_POST['start'];
        $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            $row[] = $i;
            $row[] = $value['department_name'];
            $row[] = $value['position_name'];
            $row[] = $value['created_at'];
            $row[] = '<a class="btn btn-primary btn-sm" href="'.SURL.'designation/edit_department_designation/'.$value['department_position_id'].'">Edit</a>
            		<a class="btn btn-danger btn-sm" href="'.SURL.'designation/delete_department_designation/'.$value['department_position_id'].'" onclick="return confirm(\'Are you sure you want to delete this item?\');">Delete</a>
            		';
            $data[] = $row;
            $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->designation->department_designations_count(),
            "recordsFiltered" => $this->designation->department_designations_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
	public function add_designation()
	{
		if($this->session->userdata('id'))
		{
			$designation=array(
				'position_name' 		=> $this->input->post('designation_name')
			);
			$designation_id=$this->common->insert_into_table('positions', $designation);
			if($designation_id)
			{
				$this->session->set_flashdata('ok_message', '- Record Added successfully!');
				redirect('designation/');
			}
			else
			{
				$this->session->set_flashdata('ok_message', '- Record Cannot Added!');
				redirect('designation/');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function designation_name_check()
	{
		$position_name=$this->input->post('designation_name');
		$where= array('position_name'=>$position_name,);
		$result=$this->common->select_array_records('positions',$where);
		if(count($result)>0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	public function assign_department_designation()
	{
		if($this->session->userdata('id'))
		{
			if ($this->input->post('submit'))
			{
				$department_designation=array(
					'department_id' 	=> $this->input->post('department_id'),
					'position_id' 		=> $this->input->post('designation_id')
				);
				$department_designation_id=$this->common->insert_into_table('department_positions', $department_designation);
				if($department_designation_id)
				{
					$this->session->set_flashdata('ok_message', '- Record Added successfully!');
					redirect('designation/assign_department_designation');
				}
				else
				{
					$this->session->set_flashdata('ok_message', '- Record Cannot Added!');
					redirect('designation/assign_department_designation');
				}
			}
			else
			{
				$data['departments']=$this->common->select_array_records('departments');
				$data['designations']=$this->common->select_array_records('positions');
				$data['active']='manage_department_designations';
				$this->load->view('admin/header', $data);
				$this->load->view('admin/designations/assign_department_designation', $data);
				$this->load->view('admin/footer');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function department_designation_check()
	{
		$department_id=$this->input->post('department_id');
		$designation_id=$this->input->post('designation_id');
		$where= array(
			'department_id'=>$department_id,
			'position_id'=>$designation_id,
		);
		$result=$this->common->select_array_records('department_positions',$where);
		if(count($result)>0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	public function delete_designation($id)
	{
		if($this->session->userdata('id'))
		{
			$result=$this->common->delete_record('positions',array('position_id'=>$id));
			$result1=$this->common->delete_record('department_positions',array('position_id'=>$id));
			$result2=$this->common->delete_record('employee_positions',array('position_id'=>$id));
			if($result2) 
			{
				$this->session->set_flashdata('ok_message', '- Record Deleted successfully!');
				redirect('designation/manage_designations/');
			}
			else 
			{
				$this->session->set_flashdata('err_message', '- Record Cannot Deleted!');
				redirect('designation/manage_designations/');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function edit_designation($id='')
	{
		if($this->session->userdata('id'))
		{
			if($this->input->post('submit'))
			{
				$position_name=$this->input->post('designation_name');
				$updated=$this->common->update_table('positions',array('position_id'=>$id),array('position_name'=>$position_name));
				if($updated) 
				{
					$this->session->set_flashdata('ok_message', '- Record Updated successfully!');
					redirect('designation/manage_designations/');
				} 
				else 
				{
					$this->session->set_flashdata('err_message', '- Record Cannot Updated!');
					redirect('designation/manage_designations/');
				}
			}
			else
			{
				$data['position']=$this->common->select_single_records('positions',array('position_id'=>$id));
				$data['active']='manage_designations';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/designations/edit_designation', $data);
				$this->load->view('admin/footer');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function delete_department_designation($id)
	{
		if($this->session->userdata('id'))
		{
			$result=$this->common->delete_record('department_positions',array('department_position_id'=>$id));
			if($result) 
			{
				$this->session->set_flashdata('ok_message', '- Record Deleted successfully!');
				redirect('designation/manage_department_designations/');
			}
			else 
			{
				$this->session->set_flashdata('err_message', '- Record Cannot Deleted!');
				redirect('designation/manage_department_designations/');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function edit_department_designation($id='')
	{
		if($this->session->userdata('id'))
		{
			if($this->input->post('submit'))
			{
				$department_id=$this->input->post('department_id');
				$position_id=$this->input->post('designation_id');
				$updated=$this->common->update_table('department_positions',array('department_position_id'=>$id),array('department_id'=>$department_id,'position_id'=>$position_id));
				if($updated) 
				{
					$this->session->set_flashdata('ok_message', '- Record Updated successfully!');
					redirect('designation/manage_department_designations/');
				} 
				else 
				{
					$this->session->set_flashdata('err_message', '- Record Cannot Updated!');
					redirect('designation/manage_department_designations/');
				}
			}
			else
			{
				$data['department_positions']=$this->common->select_single_records('department_positions',array('department_position_id'=>$id));
				$data['department']=$this->common->select_single_records('departments',array('department_id'=>$data['department_positions']['department_id']));
				$data['position']=$this->common->select_single_records('positions',array('position_id'=>$data['department_positions']['position_id']));
				$data['departments']=$this->common->select_array_records('departments');
				$data['positions']=$this->common->select_array_records('positions');
				$data['active']='manage_department_designations';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/designations/edit_department_designation',$data);
				$this->load->view('admin/footer');
			}
		}
		else
		{
			redirect('login/');
		}
	}
}