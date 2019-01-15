<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Department extends CI_Controller
{
	public function __construct()
	{
		parent :: __construct();
		$this->load->model('Department_model','department',true);
	}
	public function index()
	{
		if($this->session->userdata('id'))
		{
			$data['active']='manage_departments';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/departments/add_department', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function manage_departments()
	{
		if($this->session->userdata('id'))
		{
		// 	$data['departments']=$this->common->select_array_records('departments');
			$data['active']='manage_departments';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/departments/manage_departments', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function get_departments()
    {
        $list = $this->department->get_departments();
        $data = array();
        $no = $_POST['start'];
        $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            $row[] = $i;
            $row[] = $value['department_name'];
            $row[] = $value['created_at'];
            $row[] = '<a class="btn btn-primary btn-sm" href="'.SURL.'department/edit_department/'.$value['department_id'].'">Edit</a>
            		<a class="btn btn-danger btn-sm" href="'.SURL.'department/delete_department/'.$value['department_id'].'" onclick="return confirm(\'Are you sure you want to delete this item?\');">Delete</a>
            		';
            $data[] = $row;
            $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->department->department_count(),
            "recordsFiltered" => $this->department->department_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
	public function add_department()
	{
		if($this->session->userdata('id'))
		{
			$department=array(
				'department_name' 		=> $this->input->post('department_name')
			);
			$department_id=$this->common->insert_into_table('departments', $department);
			if($department_id)
			{
				$this->session->set_flashdata('ok_message', '- Record Added successfully!');
				redirect('department/');
			}
			else
			{
				$this->session->set_flashdata('ok_message', '- Record Cannot Added!');
				redirect('department/');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function department_name_check()
	{
		$department_name=$this->input->post('department_name');
		$where= array('department_name'=>$department_name,);
		$result=$this->common->select_array_records('departments',$where);
		if(count($result)>0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	public function delete_department($id)
	{
		if($this->session->userdata('id'))
		{
			$result=$this->common->delete_record('departments',array('department_id'=>$id));
			$result1=$this->common->delete_record('department_positions',array('department_id'=>$id));
			if($result1) 
			{
				$this->session->set_flashdata('ok_message', '- Record Deleted successfully!');
				redirect('department/manage_departments/');
			} 
			else 
			{
				$this->session->set_flashdata('err_message', '- Record Cannot Deleted!');
				redirect('department/manage_departments/');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function edit_department($id='')
	{
		if($this->session->userdata('id'))
		{
			if($this->input->post('submit'))
			{
				$department_name=$this->input->post('department_name');
				$updated=$this->common->update_table('departments',array('department_id'=>$id),array('department_name'=>$department_name));
				if($updated) 
				{
					$this->session->set_flashdata('ok_message', '- Record Updated successfully!');
					redirect('department/manage_departments/');
				} 
				else 
				{
					$this->session->set_flashdata('err_message', '- Record Cannot Updated!');
					redirect('department/manage_departments/');
				}
			}
			else
			{
				$data['department']=$this->common->select_single_records('departments',array('department_id'=>$id));
				$data['active']='manage_departments';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/departments/edit_department', $data);
				$this->load->view('admin/footer');
			}
		}
		else
		{
			redirect('login/');
		}
	}
}