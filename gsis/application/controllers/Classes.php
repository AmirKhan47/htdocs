<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Classes extends CI_Controller
{
	public function __construct()
	{
		parent :: __construct();
		$this->load->model('Class_model','class',true);
	}
	public function index()
	{
		if($this->session->userdata('id'))
		{
			$data['branches']=$this->common->select_array_records('branch');
			$data['active']='manage_classes';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/classes/add_class', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function manage_classes()
	{
		if($this->session->userdata('id'))
		{
			// $data['classes']=$this->common->select_array_records('branch');
			$data['active']='manage_classes';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/classes/manage_classes', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function get_classes()
    {
        $list = $this->class->get_classes();
        $data = array();
        $no = $_POST['start'];
        $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            $row[] = $i;
            $row[] = $value['class_code'];
            $row[] = $value['class_name'];
            $row[] = $value['created_at'];
            $row[] = '<a class="btn btn-primary btn-sm" href="'.SURL.'classes/edit_class/'.$value['id'].'">Edit</a>
					<a class="btn btn-danger btn-sm" href="'.SURL.'classes/delete_class/'.$value['id'].'" onclick="return confirm(\'Are you sure you want to delete this item?\');">Delete</a>
            		';
            $data[] = $row;
            $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->class->classes_count(),
            "recordsFiltered" => $this->class->classes_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
	public function add_class()
	{
		if($this->session->userdata('id'))
		{
			$data=array(
				'class_name' 		=> $this->input->post('class_name')
			);
			$class_id=$this->common->insert_into_table('classes', $data);
			$data=array(
				'class_code' 		=> $class_id
			);
			$result=$this->common->update_table('classes',$where=array('id'=>$class_id),$data);
			if($result)
			{
				$this->session->set_flashdata('ok_message', '- Record Added successfully!');
				redirect('classes/manage_classes');
			}
			else
			{
				$this->session->set_flashdata('ok_message', '- Record Cannot Added!');
				redirect('classes/manage_classes');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function assign_class_branch()
	{
		if($this->session->userdata('id'))
		{
			if ($this->input->post('submit'))
			{
				$class_branch=array(
					'class_id' 			=> $this->input->post('class_id'),
					'branch_id' 		=> $this->input->post('branch_id')
				);
				$class_branch_id=$this->common->insert_into_table('class_branch', $class_branch);
				if($class_branch_id)
				{
					$this->session->set_flashdata('ok_message', '- Record Added successfully!');
					redirect('classes/manage_branches_classes');
				}
				else
				{
					$this->session->set_flashdata('ok_message', '- Record Cannot Added!');
					redirect('classes/manage_branches_classes');
				}
			}
			else
			{
				$data['branches']=$this->common->select_array_records('branch');
				$data['classes']=$this->common->select_array_records('classes');
				$data['active']='manage_branches_classes';
				$this->load->view('admin/header', $data);
				$this->load->view('admin/classes/assign_class_branch', $data);
				$this->load->view('admin/footer');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function class_name_check()
	{
		$class_name=$this->input->post('class_name');
		$where= array('class_name'=>$class_name,);
		$result=$this->common->select_array_records('classes',$where);
		if(count($result)>0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	public function class_branch_check()
	{
		$branch_id=$this->input->post('branch_id');
		$class_id=$this->input->post('class_id');
		$where= array(
			'class_id'=>$class_id,
			'branch_id'=>$branch_id,
		);
		$result=$this->common->select_array_records('class_branch',$where);
		if(count($result)>0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	public function edit_class($id='')
	{
		if($this->session->userdata('id'))
		{
			if ($this->input->post('submit'))
			{
				$class_name=$this->input->post('class_name');
				$updated=$this->common->update_table('classes',array('id'=>$id),array('class_name'=>$class_name));
				if($updated) 
				{
					$this->session->set_flashdata('ok_message', '- Record Updated successfully!');
					redirect('classes/manage_classes/');
				} 
				else 
				{
					$this->session->set_flashdata('err_message', '- Record Cannot Updated!');
					redirect('classes/manage_classes/');
				}
			}
			else
			{
				$data['class']=$this->common->select_single_records('classes',array('id'=>$id));
				$data['active']='manage_classes';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/classes/edit_class', $data);
				$this->load->view('admin/footer');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function delete_class($id)
	{
		if($this->session->userdata('id'))
		{
			$result=$this->common->delete_record('classes',array('id'=>$id));
			$result1=$this->common->delete_record('class_branch',array('class_id'=>$id));
			$result2=$this->common->delete_record('class_subjects',array('class_id'=>$id));
			if($result2) 
			{
				$this->session->set_flashdata('ok_message', '- Record Deleted successfully!');
				redirect('classes/manage_classes/');
			} 
			else 
			{
				$this->session->set_flashdata('err_message', '- Record Cannot Deleted!');
				redirect('classes/manage_classes/');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function manage_branches_classes()
	{
		if($this->session->userdata('id'))
		{
			// $data['classes']=$this->common->select_array_records('branch');
			$data['active']='manage_branches_classes';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/classes/manage_branches_classes', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function get_branches_classes()
    {
        $list = $this->class->get_branches_classes();
        $data = array();
        $no = $_POST['start'];
        $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            $row[] = $i;
            $row[] = $value['class_code'];
            $row[] = $value['class_name'];
            $row[] = $value['branch_code'];
            $row[] = $value['branch_name'];
            $row[] = $value['created_at'];
            $row[] = '<a class="btn btn-primary btn-sm" href="'.SURL.'classes/edit_branch_class/'.$value['id'].'">Edit</a>
					<a class="btn btn-danger btn-sm" href="'.SURL.'classes/delete_branch_class/'.$value['id'].'" onclick="return confirm(\'Are you sure you want to delete this item?\');">Delete</a>
            		';
            $data[] = $row;
            $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->class->branches_classes_count(),
            "recordsFiltered" => $this->class->branches_classes_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function delete_branch_class($id)
	{
		if($this->session->userdata('id'))
		{
			$result=$this->common->delete_record('class_branch',array('id'=>$id));
			if($result) 
			{
				$this->session->set_flashdata('ok_message', '- Record Deleted successfully!');
				redirect('classes/manage_branches_classes/');
			} 
			else 
			{
				$this->session->set_flashdata('err_message', '- Record Cannot Deleted!');
				redirect('classes/manage_branches_classes/');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function edit_branch_class($id='')
	{
		if($this->session->userdata('id'))
		{
			if ($this->input->post('submit'))
			{
				// echo($id);
				$branch_id=$this->input->post('branch_id');
				$class_id=$this->input->post('class_id');
				// echo "<pre>";
				// print_r ($this->input->post());
				// echo "</pre>";exit();
				$updated=$this->common->update_table('class_branch',array('id'=>$id),array('branch_id'=>$branch_id,'class_id'=>$class_id));
				if($updated) 
				{
					$this->session->set_flashdata('ok_message', '- Record Updated successfully!');
					redirect('classes/manage_branches_classes/');
				} 
				else 
				{
					$this->session->set_flashdata('err_message', '- Record Cannot Updated!');
					redirect('classes/manage_branches_classes/');
				}
			}
			else
			{
				$data['class_branch']=$this->common->select_single_records('class_branch',array('id'=>$id));
				$data['branch']=$this->common->select_single_records('branch',array('id'=>$data['class_branch']['branch_id']));
				$data['class']=$this->common->select_single_records('classes',array('id'=>$data['class_branch']['class_id']));
				$data['branches']=$this->common->select_array_records('branch');
				$data['classes']=$this->common->select_array_records('classes');
				$data['active']='manage_branches_classes';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/classes/edit_branch_class',$data);
				$this->load->view('admin/footer');
			}
		}
		else
		{
			redirect('login/');
		}
	}
}