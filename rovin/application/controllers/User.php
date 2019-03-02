<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/admin/user_model','user',true);
    }
    public function dashboard()
    {
        $data['active']='dashboard';
        $data['page']='users/dashboard';
        $this->load->view('backend/admin/layout/default',$data);
    }
    public function index()
    {
        if($this->input->post('submit'))
        {
            $users=array(
                'fullname'=>$this->input->post('fullname'),
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password'),
                'email'=>$this->input->post('email'),
                'phone_no'=>$this->input->post('phone_no'),
                'cnic'=>$this->input->post('cnic'),
                'address'=>$this->input->post('address'),
                'gender'=>$this->input->post('gender'),
                'date_of_birth'=>$this->input->post('date_of_birth'),
                'created_by'=>$this->session->userdata('user_id')
            );
            $user_id=$this->common->insert_into_table('users',$users);
            $users_roles=array(
                'user_id'=>$user_id,
                'role_id'=>$this->input->post('role_id'),
                'created_by'=>$this->session->userdata('user_id')
            );
            $user_role_id=$this->common->insert_into_table('users_roles',$users_roles);
            if($user_role_id)
            {
                $this->session->set_flashdata('ok_message', 'User Added!');
            }
            else
            {
                $this->session->set_flashdata('error_message', 'User Not Added!');
            }
            redirect(AURL.'user/');
        }
        $data['roles']=$this->common->select_array_records('roles',array('role_id !='=>3));
    	$data['active']='add_user';
        $data['page']='users/add_user';
        $this->load->view('backend/admin/layout/default',$data);
    }
    public function username_check()
    {
        $result=$this->common->field_check('users','username',$this->input->post('username'));
        echo $result;
    }
    public function email_check()
    {
        $result=$this->common->field_check('users','email',$this->input->post('email'));
        echo $result;
    }
    public function cnic_check()
    {
        $result=$this->common->field_check('users','cnic',$this->input->post('cnic'));
        echo $result;
    }
    public function list_of_admin()
    {
        $data['active']='list_of_admin';
        $data['page']='users/list_of_admin';
        $this->load->view('backend/admin/layout/default',$data);
    }
    public function get_list_of_admin()
    {
        $list = $this->user->get_list_of_admin();
        $data = array();
        $no = $_POST['start'];
        // $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            // $row[] = $i;
            $row[] = $value['fullname'];
            $row[] = $value['phone_no'];
            $row[] = $value['cnic'];
            $row[] = $value['address'];
            $row[] = '<a class="btn btn-primary btn-sm" href="'.AURL.'user/update_user/'.$value['user_id'].'/'.$value['role_id'].'">Edit</a>';
            $data[] = $row;
            // $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->user->list_of_admin_count(),
            "recordsFiltered" => $this->user->list_of_admin_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function list_of_so()
    {
        $data['active']='list_of_so';
        $data['page']='users/list_of_so';
        $this->load->view('backend/admin/layout/default',$data);
    }
    public function get_list_of_so()
    {
        $list = $this->user->get_list_of_so();
        $data = array();
        $no = $_POST['start'];
        // $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            // $row[] = $i;
            $row[] = $value['fullname'];
            $row[] = $value['phone_no'];
            $row[] = $value['cnic'];
            $row[] = $value['address'];
            $row[] = '<a class="btn btn-primary btn-sm" href="'.AURL.'user/update_user/'.$value['user_id'].'/'.$value['role_id'].'">Edit</a>';
            $data[] = $row;
            // $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->user->list_of_so_count(),
            "recordsFiltered" => $this->user->list_of_so_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function update_user($user_id='',$role_id='')
    {
        if($this->input->post('submit'))
        {
            $data=array(
                'fullname'=>$this->input->post('fullname'),
                // 'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password'),
                'email'=>$this->input->post('email'),
                'phone_no'=>$this->input->post('phone_no'),
                'cnic'=>$this->input->post('cnic'),
                'address'=>$this->input->post('address'),
                'gender'=>$this->input->post('gender'),
                'date_of_birth'=>$this->input->post('date_of_birth')
            );
            $result=$this->common->update_table('users',array('user_id'=>$user_id),$data);
            if($result)
            {
                $this->session->set_flashdata('ok_message', 'User Updated!');
            }
            else
            {
                $this->session->set_flashdata('error_message', 'User Not Updated!');
            }
            if($role_id==1)
            {
                // redirect(AURL.'user/list_of_admin/');
                $url=$_SERVER['HTTP_REFERER'];
                redirect($url);
            }
            else
            if($role_id==2)
            {
                // redirect(AURL.'user/list_of_so/');
                $url=$_SERVER['HTTP_REFERER'];
                redirect($url);
            }
        }
        else
        {
            $data['user']=$this->user->get_update_user($user_id,$role_id);
            $data['roles']=$this->common->select_array_records('roles',array('role_id !='=>3));
            if($role_id==1)
            {
                $data['active']='list_of_admin';
            }
            else
            if($role_id==2)
            {
                $data['active']='list_of_so'; 
            }
            $data['page']='users/update_user';
            $this->load->view('backend/admin/layout/default',$data);
        }
    }
}