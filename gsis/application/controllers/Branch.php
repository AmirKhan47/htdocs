<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Branch extends CI_Controller
{
	public function __construct()
	{
		parent :: __construct();
		$this->load->model('Branch_model','branch',true);
	}
	public function index()
	{
		if($this->session->userdata('id'))
		{
			$data['branches']=$this->common->select_array_records('branch');
			$data['active']='manage_branches';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/branches/add_branch', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function manage_branches()
	{
		if($this->session->userdata('id'))
		{
			// $data['branches']=$this->common->select_array_records('branch');
			$data['active']='manage_branches';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/branches/manage_branches', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('login/');
		}
	}
	public function get_branches()
    {
        $list = $this->branch->get_branches();
        $data = array();
        $no = $_POST['start'];
        $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            $row[] = $i;
            $row[] = $value['branch_code'];
            $row[] = $value['branch_name'];
            $row[] = $value['contact_cell'];
            $row[] = $value['contact_email'];
            $row[] = $value['address_local'];
            $row[] = $value['created_at'];
            $row[] = '<a class="btn btn-primary btn-sm" href="'.SURL.'branch/edit_branch/'.$value['id'].'">Edit</a>
					<a class="btn btn-danger btn-sm" href="'.SURL.'branch/delete_branch/'.$value['id'].'" onclick="return confirm(\'Are you sure you want to delete this item?\');">Delete</a>
            		';
            $data[] = $row;
            $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->branch->branches_count(),
            "recordsFiltered" => $this->branch->branches_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
	public function add_branch()
	{
		if($this->session->userdata('id'))
		{
			$branch_name=array(
				'branch_name' 		=> $this->input->post('branch_name')
			);
			$branch_id=$this->common->insert_into_table('branch', $branch_name);
			$branch_code=array(
				'branch_code' 		=> $branch_id
			);
			$result=$this->common->update_table('branch',$where=array('id'=>$branch_id),$branch_code);
			// ------------------------------------------------------------------------
			$contact=array(
				'contact_cell' 		=> $this->input->post('contact_cell'),
				'contact_email' 	=> $this->input->post('contact_email')
			);
			$contact_id=$this->common->insert_into_table('contact', $contact);
			// ------------------------------------------------------------------------
			$branch_contact=array(
				'branch_id' 		=> $branch_id,
				'contact_id' 		=> $contact_id
			);
			$branch_contact_id=$this->common->insert_into_table('branch_contact', $branch_contact);
			// ------------------------------------------------------------------------
			$address=array(
				'contact_id' 		=> $contact_id,
				'address_local' 	=> $this->input->post('address_local')
			);
			$address_id=$this->common->insert_into_table('address', $address);
			// ------------------------------------------------------------------------
			if($address_id)
			{
				$this->session->set_flashdata('ok_message', '- Record Added successfully!');
				redirect('branch/manage_branches/');
			}
			else
			{
				$this->session->set_flashdata('err_message', '- Record Insertion Failed!');
				redirect('branch/manage_branches/');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function branch_name_check()
	{
		$branch_name=$this->input->post('branch_name');
		$where= array('branch_name'=>$branch_name,);
		$result=$this->common->select_array_records('branch',$where);
		if(count($result)>0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	public function edit_branch($id='')
	{
		if($this->session->userdata('id'))
		{
			if ($this->input->post('submit'))
			{
				$branch_name=$this->input->post('branch_name');
				$contact_cell=$this->input->post('contact_cell');
				$contact_email=$this->input->post('contact_email');
				$address_local=$this->input->post('address_local');
				$data['branch_contact']=$this->common->select_single_records('branch_contact',array('branch_id'=>$id));
				$updated=$this->common->update_table('branch',array('id'=>$id),array('branch_name'=>$branch_name));
				$updated1=$this->common->update_table('address',array('contact_id'=>$data['branch_contact']['contact_id']),array('address_local'=>$address_local));
				$updated2=$this->common->update_table('contact',array('id'=>$data['branch_contact']['contact_id']),array('contact_email'=>$contact_email,'contact_cell'=>$contact_cell));
				if($updated2) 
				{
					$this->session->set_flashdata('ok_message', '- Record Updated successfully!');
					redirect('branch/manage_branches/');
				} 
				else 
				{
					$this->session->set_flashdata('err_message', '- Record Cannot Updated!');
					redirect('branch/manage_branches/');
				}
			}
			else
			{
				$data['branch']=$this->common->select_single_records('branch',array('id'=>$id));
				$data['branch_contact']=$this->common->select_single_records('branch_contact',array('branch_id'=>$id));
				$data['contact']=$this->common->select_single_records('contact',array('id'=>$data['branch_contact']['contact_id']));
				$data['address']=$this->common->select_single_records('address',array('contact_id'=>$data['branch_contact']['contact_id']));
				$data['active']='manage_branches';
				$this->load->view('admin/header',$data);
				$this->load->view('admin/branches/edit_branch', $data);
				$this->load->view('admin/footer');
			}
		}
		else
		{
			redirect('login/');
		}
	}
	public function delete_branch($id)
	{
		if($this->session->userdata('id'))
		{
			$branch=$this->common->select_single_records('branch_contact',array('branch_id'=>$id));
			$result1=$this->common->delete_record('branch',array('id'=>$id));
			$result2=$this->common->delete_record('class_branch',array('branch_id'=>$id));
			$result3=$this->common->delete_record('branch_contact',array('branch_id'=>$id));
			$result4=$this->common->delete_record('contact',array('id'=>$branch['contact_id']));
			$result5=$this->common->delete_record('address',array('contact_id'=>$branch['contact_id']));
			if($result5) 
			{
				$this->session->set_flashdata('ok_message', '- Record Deleted successfully!');
				redirect('branch/manage_branches/');
			} 
			else 
			{
				$this->session->set_flashdata('err_message', '- Record Cannot Deleted!');
				redirect('branch/manage_branches/');
			}
		}
		else
		{
			redirect('login/');
		}
	}
}