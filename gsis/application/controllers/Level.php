<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Level extends CI_Controller
{
	public function __construct()
	{
		parent :: __construct();
		$this->load->model('Level_model','level',true);
	}
	public function index()
	{
		if($this->session->userdata('id'))
		{
			$data['classes']=$this->common->select_array_records('classes');
			$data['active']='manage_levels';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/levels/add_level', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function add_level()
	{
		if($this->session->userdata('id'))
		{
			$data=array(
				'level_name' 		=> $this->input->post('level_name')
			);
			$level_id=$this->common->insert_into_table('levels', $data);
			if($level_id)
			{
				$this->session->set_flashdata('ok_message', '- Record Added successfully!');
				redirect('level/');
			}
			else
			{
				$this->session->set_flashdata('ok_message', '- Record Cannot Added!');
				redirect('level/');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function level_name_check()
	{
		$level_name=$this->input->post('level_name');
		$where= array('level_name'=>$level_name,);
		$result=$this->common->select_array_records('levels',$where);
		if(count($result)>0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	public function manage_levels()
	{
		if($this->session->userdata('id'))
		{
			$data['active']='manage_levels';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/levels/manage_levels',$data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function get_levels()
    {
        $list = $this->level->get_levels();
        $data = array();
        $no = $_POST['start'];
        $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            $row[] = $i;
            $row[] = $value['level_name'];
            $row[] = $value['created_at'];
            $row[] ='<a class="btn btn-primary btn-sm" href="'.SURL.'level/edit_level/'.$value['level_id'].'">Edit</a>
            		<a class="btn btn-danger btn-sm" href="'.SURL.'level/delete_level/'.$value['level_id'].'" onclick="return confirm(\'Are you sure you want to delete this item?\');">Delete</a>
            		';
            $data[] = $row;
            $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->level->level_count(),
            "recordsFiltered" => $this->level->level_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function delete_level($id)
	{
		if($this->session->userdata('id'))
		{
			$result=$this->common->delete_record('levels',array('level_id'=>$id));
			$result=$this->common->delete_record('employee_levels',array('level_id'=>$id));
			if($result) 
			{
				$this->session->set_flashdata('ok_message', '- Record Deleted successfully!');
				redirect('level/manage_levels/');
			}
			else 
			{
				$this->session->set_flashdata('err_message', '- Record Cannot Deleted!');
				redirect('level/manage_levels/');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function edit_level($id='')
	{
		if($this->session->userdata('id'))
		{
			if($this->input->post('submit'))
			{
				$level_name=$this->input->post('level_name');
				$updated=$this->common->update_table('levels',array('level_id'=>$id),array('level_name'=>$level_name));
				if($updated) 
				{
					$this->session->set_flashdata('ok_message', '- Record Updated successfully!');
					redirect('level/manage_levels/');
				} 
				else 
				{
					$this->session->set_flashdata('err_message', '- Record Cannot Updated!');
					redirect('level/manage_levels/');
				}
			}
			else
			{
				$data['levels']=$this->common->select_single_records('levels',array('level_id'=>$id));
				$data['active']='manage_levels';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/levels/edit_level',$data);
				$this->load->view('admin/footer');
			}
		}
		else
		{
			redirect('login/');
		}
	}
}