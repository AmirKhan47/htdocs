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
        // $data['no_of_records']=$this->common->get_all_records_nums('daily_lead','*',array('date'=>'2019-12-31'));
        // echo "<pre>";
        // print_r ($data);
        // echo "</pre>";
        // exit();
        $data = $this->lead->chart_data()->result();
        // echo "<pre>";
        // print_r ($data);
        // echo "</pre>";
        // exit();
        // $result = array();
        // foreach($data as $value)
        // {
        //     echo $value->date;
        //     if(in_array($value->date))
        // }
        // exit();
        $x['data'] = json_encode($data);
        // echo "<pre>";
        // print_r ($x);
        // echo "</pre>";
        // exit();
		$this->load->view('view',$x);
	}
	public function add()
	{
        $data=$this->common->get_all_records_nums('daily_lead','*',array('date'=>$this->input->post('date')));
        if($data>0)
        {
            $this->db->where('date',$this->input->post('date'));
            $this->db->set('count','count+1',FALSE);
            $this->db->update('lead_count');
        }
        else
        {
            $result1=$this->common->insert_into_table('lead_count',array(
            'date'=>$this->input->post('date'),
            'count'=>1
        ));
        }
		$result=$this->common->insert_into_table('daily_lead',array(
            'date'=>$this->input->post('date'),
			// 'no_of_leads_against_date'=>1,
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
	// public function view()
 //    {
 //        $this->load->view('view');
 //    }
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
            $row[] = '<button type="button" class="btn btn-primary btn-sm" onclick="update('.$value['daily_lead_id'].');">Update</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="delete_lead('.$value['daily_lead_id'].');">Delete</button>';
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
    public function edit($daily_lead_id)
    {
    	$data=$this->common->select_single_records('daily_lead',array('daily_lead_id'=>$daily_lead_id));
    	echo json_encode($data);
    }
    public function update()
    {
        // echo "<pre>";
        // print_r ($this->input->post());
        // echo "</pre>";
        // exit();
        $result=$this->common->update_table('daily_lead',array('daily_lead_id'=>$this->input->post('daily_lead_id')),array(
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
    public function delete($daily_lead_id)
    {
    	$result=$this->common->delete_record('daily_lead',array('daily_lead_id'=>$daily_lead_id));
		if($result)
		{
			echo 1;
		}
    }
}
