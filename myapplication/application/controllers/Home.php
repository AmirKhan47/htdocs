<?php

class Home extends CI_Controller{

    function Home() {
    parent::__construct();

    if ($this->session->logged_in != 1) {
      redirect('login');
    }
    }


public function index()
	{
   if ($this->session->user_type =='staff') {
       redirect('Login');
    }
		$data['dashboard'] = TRUE;
    $data['title'] = "Admin Dashboard";
    $data['sub_title'] = "Statistics, charts, recent events and reports";
    //$data['dataChart'] = $this->Home_model->getFirstData();
		$this->load->view('LoginHome/home',$data);
	}

  public function homeSecond()
  {
    if ($this->session->user_type =='admin') {
       redirect('Login');
    }
    $data['dashboard'] = TRUE;
    $data['title'] = "Employee Dashboard";
    $data['sub_title'] = "Statistics, charts, recent events and reports";
    //$data['dataChart'] = $this->Home_model->getFirstData();
    $this->load->view('LoginHome/homeSecond',$data);
  }

function getFirstData(){
      
      if ($result = $this->Home_model->getFirstData()) {

       echo json_encode($result);

     }else{

      echo json_encode($result);
    }
  
}

function getData(){

      if ($this->input->post('year')) {
      
      if ($result = $this->Home_model->getData($this->input->post('year'))) {

       echo json_encode($result);

     }else{

      echo json_encode($result);
    }
  }
} 

  public function ratingResult(){
      if ($this->input->post('year')) {
        
          if ($result = $this->Home_model->showRating($this->input->post('year'),$this->input->post('month'))) {

             echo json_encode($result);

          }else{

              echo json_encode($result);
          }
      }else{

         echo json_encode(false);
      }
  }   

}
?>