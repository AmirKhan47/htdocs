<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('lead_model','lead',true);
    }
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function add()
	{
		$result=$this->common->insert_into_table('daily_lead',array(
			'date'=>$this->input->post('date'),
			'lead_origin'=>$this->input->post('lead_origin'),
			'lead_area'=>$this->input->post('lead_area'),
			'city'=>$this->input->post('city'),
			'query'=>$this->input->post('query'),
			'client_name'=>$this->input->post('client_name'),
			'contact'=>$this->input->post('contact'),
			'note'=>$this->input->post('note'),
		));
		if($result)
		{
			echo 1;
		}
	}
	public function view()
    {
        $this->load->view('view');
    }
    public function get_list_of_lead()
    {
        $list = $this->lead->get_list_of_lead();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            $row[] = $value['date'];
            $row[] = $value['lead_origin'];
            $row[] = $value['lead_area'];
            $row[] = $value['city'];
            $row[] = $value['query'];
            $row[] = $value['client_name'];
            $row[] = $value['contact'];
            $row[] = $value['note'];
            $row[] = $value['created_at'];
            $row[] = '<button type="button" class="btn btn-success btn-sm" onclick="update('.$value['daily_lead_id'].');">
                                    Update
                                </button>';
            $data[] = $row;
            // $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->lead->list_of_lead_count(),
            "recordsFiltered" => $this->lead->list_of_lead_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
}
