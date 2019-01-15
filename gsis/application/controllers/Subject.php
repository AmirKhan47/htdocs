<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subject extends CI_Controller
{
	public function __construct()
	{
		parent :: __construct();
		$this->load->model('Subject_model','subject',true);
	}
	public function index()
	{
		if($this->session->userdata('id'))
		{
			$data['active']='manage_subjects';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/subjects/add_subject', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function manage_subjects()
	{
		if($this->session->userdata('id'))
		{
			$data['active']='manage_subjects';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/subjects/manage_subjects', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function get_subjects()
    {
        $list = $this->subject->get_subjects();
        $data = array();
        $no = $_POST['start'];
        $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            $row[] = $i;
            $row[] = $value['subject_name'];
            $row[] = $value['created_at'];
            $row[] = '<a class="btn btn-primary btn-sm" href="'.SURL.'subject/edit_subject/'.$value['id'].'">Edit</a>
					<a class="btn btn-danger btn-sm" href="'.SURL.'subject/delete_subject/'.$value['id'].'" onclick="return confirm(\'Are you sure you want to delete this item?\');">Delete</a>
            		';
            $data[] = $row;
            $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->subject->subject_count(),
            "recordsFiltered" => $this->subject->subject_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
	public function add_subject()
	{
		if($this->session->userdata('id'))
		{
			$data=array(
				'subject_name' 		=> $this->input->post('subject_name')
			);
			$subject_id=$this->common->insert_into_table('subject', $data);
			if($subject_id)
			{
				$this->session->set_flashdata('ok_message', '- Record Added successfully!');
				redirect('subject/manage_subjects');
			}
			else
			{
				$this->session->set_flashdata('ok_message', '- Record Cannot Added!');
				redirect('subject/manage_subjects');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function subject_name_check()
	{
		$subject_name=$this->input->post('subject_name');
		$where= array('subject_name'=>$subject_name,);
		$result=$this->common->select_array_records('subject',$where);
		if(count($result)>0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	public function class_subject_check()
	{
		$subject_id=$this->input->post('subject_id');
		$class_id=$this->input->post('class_id');
		$where= array(
			'class_id'=>$class_id,
			'subject_id'=>$subject_id,
		);
		$result=$this->common->select_array_records('class_subjects',$where);
		if(count($result)>0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	public function edit_subject($id='')
	{
		if($this->session->userdata('id'))
		{
			if ($this->input->post('submit'))
			{
				$subject_name=$this->input->post('subject_name');
				$updated=$this->common->update_table('subject',array('id'=>$id),array('subject_name'=>$subject_name));
				if($updated) 
				{
					$this->session->set_flashdata('ok_message', '- Record Updated successfully!');
					redirect('subject/manage_subjects/');
				} 
				else 
				{
					$this->session->set_flashdata('err_message', '- Record Cannot Updated!');
					redirect('subject/manage_subjects/');
				}
			}
			else
			{
				$data['subject']=$this->common->select_single_records('subject',array('id'=>$id));
				$data['active']='manage_subjects';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/subjects/edit_subject', $data);
				$this->load->view('admin/footer');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function delete_subject($id)
	{
		if($this->session->userdata('id'))
		{
			$result=$this->common->delete_record('subject',array('id'=>$id));
			$result1=$this->common->delete_record('class_subjects',array('subject_id'=>$id));
			$result2=$this->common->delete_record('student_subject',array('subject_id'=>$id));
			if($result2) 
			{
				$this->session->set_flashdata('ok_message', '- Record Deleted successfully!');
				redirect('subject/manage_subjects/');
			} 
			else 
			{
				$this->session->set_flashdata('err_message', '- Record Cannot Deleted!');
				redirect('subject/manage_subjects/');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function assign_subject_class()
	{
		if($this->session->userdata('id'))
		{
			if ($this->input->post('submit'))
			{
				$class_subject=array(
					'class_id' 			=> $this->input->post('class_id'),
					'subject_id' 		=> $this->input->post('subject_id')
				);
				$class_subject_id=$this->common->insert_into_table('class_subjects', $class_subject);
				if($class_subject_id)
				{
					$this->session->set_flashdata('ok_message', '- Record Added successfully!');
					redirect('subject/assign_subject_class');
				}
				else
				{
					$this->session->set_flashdata('ok_message', '- Record Cannot Added!');
					redirect('subject/assign_subject_class');
				}
			}
			else
			{
				$data['subjects']=$this->common->select_array_records('subject');
				$data['classes']=$this->common->select_array_records('classes');
				$data['active']='manage_classes_subjects';
				$this->load->view('admin/header', $data);
				$this->load->view('admin/subjects/assign_subject_class', $data);
				$this->load->view('admin/footer');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function manage_classes_subjects()
	{
		if($this->session->userdata('id'))
		{
			$data['active']='manage_classes_subjects';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/subjects/manage_classes_subjects', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function get_classes_subjects()
    {
        $list = $this->subject->get_classes_subjects();
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
            $row[] = $value['subject_name'];
            $row[] = $value['created_at'];
            $row[] = '<a class="btn btn-primary btn-sm" href="'.SURL.'subject/edit_class_subject/'.$value['class_subject_id'].'">Edit</a>
					<a class="btn btn-danger btn-sm" href="'.SURL.'subject/delete_class_subject/'.$value['class_subject_id'].'" onclick="return confirm(\'Are you sure you want to delete this item?\');">Delete</a>
            		';
            $data[] = $row;
            $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->subject->classes_subjects_count(),
            "recordsFiltered" => $this->subject->classes_subjects_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function delete_class_subject($id)
	{
		if($this->session->userdata('id'))
		{
			$result=$this->common->delete_record('class_subjects',array('class_subject_id'=>$id));
			if($result) 
			{
				$this->session->set_flashdata('ok_message', '- Record Deleted successfully!');
				redirect('subject/manage_classes_subjects/');
			} 
			else 
			{
				$this->session->set_flashdata('err_message', '- Record Cannot Deleted!');
				redirect('subject/manage_classes_subjects/');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function edit_class_subject($id='')
	{
		if($this->session->userdata('id'))
		{
			if ($this->input->post('submit'))
			{
				$updated=$this->common->update_table('class_subjects',array('class_subject_id'=>$id),array('class_id'=>$this->input->post('class_id'),'subject_id'=>$this->input->post('subject_id')));
				if($updated) 
				{
					$this->session->set_flashdata('ok_message', '- Record Updated successfully!');
					redirect('subject/manage_classes_subjects/');
				} 
				else 
				{
					$this->session->set_flashdata('err_message', '- Record Cannot Updated!');
					redirect('subject/manage_classes_subjects/');
				}
			}
			else
			{
				$data['class_subject']=$this->common->select_single_records('class_subjects',array('class_subject_id'=>$id));
				$data['subject']=$this->common->select_single_records('subject',array('id'=>$data['class_subject']['subject_id']));
				$data['class']=$this->common->select_single_records('classes',array('id'=>$data['class_subject']['class_id']));
				$data['subjects']=$this->common->select_array_records('subject');
				$data['classes']=$this->common->select_array_records('classes');
				$data['active']='manage_classes_subjects';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/subjects/edit_class_subject', $data);
				$this->load->view('admin/footer');
			}
		}
		else
		{
			redirect('login/');
		}
	}
}