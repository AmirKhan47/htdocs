<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Location extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/admin/location_model','location',true);
    }
    public function index()
    {
        $data['countries']=$this->common->select_array_records('countries');
        $data['cities']=$this->common->select_array_records('cities');
    	$data['active']='location_settings';
        $data['page']='locations/add_location';
        $this->load->view('backend/admin/layout/default',$data);
    }
    public function add_country()
    {
        $result=$this->common->insert_into_table('countries',array('country_name'=>$this->input->post('country_name')));
        if($result)
        {
            echo 1;
        }
        // $this->session->set_flashdata('ok_message', 'Country Added!');
        // redirect(AURL.'location/');
    }
    public function get_countries()
    {
        $data['countries']=$this->common->select_array_records('countries');
        $html='';
        foreach ($data['countries'] as $key => $value)
        {
            $html.='<option value="'.$value['country_id'].'">'.$value['country_name'].'</option>';
        }
        echo $html;
        // $this->session->set_flashdata('ok_message', 'Country Added!');
        // redirect(AURL.'location/');
    }
    public function country_name_check()
    {
        $result=$this->common->field_check('countries','country_name',$this->input->post('country_name'));
        echo $result;
    }
    public function add_city()
    {
        $result=$this->common->insert_into_table('cities',array('country_id'=>$this->input->post('country_id'),'city_name'=>$this->input->post('city_name')));
        // $this->session->set_flashdata('ok_message', 'City Added!');
        // redirect(AURL.'location/');
        if($result)
        {
            echo 1;
        }
    }
    public function city_name_check()
    {
        $query=$this->db->get_where('cities',array('country_id'=>$this->input->post('country_id'),'city_name'=>$this->input->post('city_name')));
        $result=$query->num_rows();
        if($result>0)
        {
            echo 1;
        }
    }
    public function add_area()
    {
        $result=$this->common->insert_into_table('areas',array('city_id'=>$this->input->post('city_id'),'area_name'=>$this->input->post('area_name')));
        // $this->session->set_flashdata('ok_message', 'Area Added!');
        // redirect(AURL.'location/');
        if($result)
        {
            echo 1;
        }
    }
    public function area_name_check()
    {
        $query=$this->db->get_where('areas',array('city_id'=>$this->input->post('city_id'),'area_name'=>$this->input->post('area_name')));
        $result=$query->num_rows();
        if($result>0)
        {
            echo 1;
        }
    }
    // public function area_name_check()
    // {
    //     $result=$this->common->field_check('areas','area_name',$this->input->post('area_name'));
    //     echo $result;
    // }
    public function list_of_locations()
    {
        $data['active']='list_of_locations';
        $data['page']='locations/list_of_locations';
        $this->load->view('backend/admin/layout/default',$data);
    }
    public function get_list_of_locations()
    {
        $list = $this->location->get_list_of_locations();
        $data = array();
        $no = $_POST['start'];
        // $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            // $row[] = $i;
            $row[] = $value['country_name'];
            $row[] = $value['city_name'];
            $row[] = $value['area_name'];
            // $row[] = '<a class="btn btn-primary btn-sm" href="'.SURL.'location/status/'.$value['area_id'].'">Edit</a>';
            $data[] = $row;
            // $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->location->list_of_locations_count(),
            "recordsFiltered" => $this->location->list_of_locations_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
}