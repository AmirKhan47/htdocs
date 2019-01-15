<?php
class Engineer extends CI_Controller {
  function Engineer() {
    parent::__construct();

    if ($this->session->logged_in != 1) {
      redirect('login');
    }
  }

  function index() {
    $data['customer'] = TRUE;
    $data['title'] = "Staff ";
    $data['sub_title'] = "Manage Your Staff Details";

    // $data['engineer'] = $this->Engineer_model->getAllengineer();

    $this->load->view('Engineer/engineer', $data);
  }

    public function staff_list()
    {
      $list = $this->Engineer_model->getAllengineer();
      $data = array();
      $no = 0;
      foreach ($list as $staff) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = $staff->engineer_name;
        $row[] = $staff->total_salary;

      //add html for action
        $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_staff('."'".$staff->engineer_id."'".')"><i class="glyphicon glyphicon-pencil"></i> </a>
        <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_staff('."'".$staff->engineer_id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>
        <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Hapus" onclick="view_files('."'".$staff->engineer_id."'".')"><i class="glyphicon glyphicon-eye-open"></i> </a>';

        $data[] = $row;
      }

      $output = array(
        "data" => $data,
        );
    //output to json format
      echo json_encode($output);
    }
    
    public function staff_add()
    {
      $this->_validate();
      $data = array(
        'engineer_name'  => $this->input->post('engineer_name'), 
        'total_salary' => $this->input->post('total_salary'), 
        'engineer_contactno'  => $this->input->post('engineer_contactno'), 
        
        );

      $insert = $this->Engineer_model->addStaff($data);

      echo json_encode(array("status" => TRUE));
    } 
   
   public function staff_edit($id)
     {
      $data = $this->Engineer_model->get_staff($id);
      // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
      echo json_encode($data);
     }

     public function staff_update(){

      $this->_validate();
      $data = array(
        'engineer_name'  => $this->input->post('engineer_name'), 
        'total_salary' => $this->input->post('total_salary'), 
        'engineer_contactno'  => $this->input->post('engineer_contactno'), 
        
        );

      $this->Engineer_model->updateStaff($this->input->post('engineer_id'), $data);
      echo json_encode(array("status" => TRUE));
     }

      public function staff_delete($id)
  {
    $this->Engineer_model->delete_staff($id);
    echo json_encode(array("status" => TRUE));
  }


public function deleteFile(){

    if ($this->input->post('emp_id')) {
        $emp_id = trim($_POST['emp_id']);
      
        if ($result = $this->Engineer_model->deleteFile($emp_id)) {

           echo json_encode($result);

        }else{

            echo json_encode($result);
        }
    }
}
      private function _validate()
    {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;

      if($this->input->post('engineer_name') == '')
      {
        $data['inputerror'][] = 'engineer_name';
        $data['error_string'][] = 'Person Name is required';
        $data['status'] = FALSE;
      }

      if($this->input->post('total_salary') == '')
      {
        $data['inputerror'][] = 'total_salary';
        $data['error_string'][] = 'Salary is required';
        $data['status'] = FALSE;
      }

      if($data['status'] === FALSE)
      {
        echo json_encode($data);
        exit();
      }
    } 

  function staff_files($id)
  {
    $data['Files'] = TRUE;
    $data['title'] = "Staff File Directory";
    $data['sub_title'] = "";
    $data['files']= $this->Engineer_model->getEngineerfiles($id);
    $this->load->view('Engineer/engineer_file', $data);

  }

function downloadFile()
{
  //echo $this->uri->segment(3);
   if ($result = $this->Engineer_model->download($this->uri->segment(3))){

  //  // $this->session->set_flashdata('success',"File downloaded successfully");
  //   // redirect('Engineer/engineerFiles/'.$arr[1]);

   }else{
  //   //$this->session->set_flashdata('error',"Not File downloaded successfully");
  //     // redirect('Engineer/engineerFiles/'.$arr[1]);

   }
  
}

  function uploadFiles(){

   if ($this->input->post('submit')) {

    if ($result = $this->Engineer_model->upload($this->uri->segment(3))) {

     $this->session->set_flashdata('success',"File Uploaded successfully");
     redirect('Engineer/staff_files/'.$this->uri->segment(3));
   }else{

     $this->session->set_flashdata('error',"File Not Uploaded successfully");
     redirect('Engineer/staff_files/'.$this->uri->segment(3));

   }

 }

}
}
?>
