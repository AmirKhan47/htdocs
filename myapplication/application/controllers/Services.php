<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {
	function Services() {
		parent::__construct();

		if ($this->session->logged_in != 1) {
			redirect('login');
		}
		$this->load->library('form_validation');
		$this->load->helper('form');
	}


    function index() {
  	$data['store'] = TRUE;
  	$data['title'] = "Services";
  	$data['sub_title'] = "Manage Your Services Records";
    
  	$this->load->view('Services/servicesSummary', $data);
  }

  function addNewServices() {
  	$data['store'] = TRUE;
  	$data['title'] = "Services";
  	$data['sub_title'] = "Manage Your Services Records";
    
    $data['tr_no'] = $this->Rental_model->getLatestInvoiceNo();
    $data['customers'] = $this->Customer_model->get_customers();
  	$this->load->view('Services/services', $data);
  }

   function EditservicesProduct($id) {
    $data['store'] = TRUE;
    $data['title'] = "Services";
    $data['sub_title'] = "Manage Your Services Records";
    
    $data['tr_no'] = $this->Rental_model->getLatestInvoiceNo();
    $data['salesman'] = $this->Rental_model->get_salesman();
    $data['banks'] = $this->Bank_model->get_banks();
    $data['supplier']=$this->Supplier_model->get_suppliers();
    
    // $data['customer'] = $this->Customer_model->get_customers();
    $data['products'] = $this->Store_model->get_sale_products();

    $data['detail'] = $this->Services_model->get_detail($id);
    $data['servicesDetail'] = $this->Services_model->get_services_detail($id);

    // $data['prdoduct_class'] = $this->Store_model->get_class();
    $this->load->view('Services/services', $data);
  }

  public function addServices()
  {

  	if ($result = $this->Services_model->addServices()) {

  		$this->session->set_flashdata('success',"Services Added successfully");
  		redirect('Services');
  	}else{
  		$this->session->set_flashdata('error',"Services not Added successfully");
  		redirect('Services');
  	}

  }

  public function updateServices()
  {

    if ($result = $this->Services_model->updateServices()) {

      $this->session->set_flashdata('success',"Services Updated successfully");
      redirect('Services');
    }else{
      $this->session->set_flashdata('error',"Services not Updated successfully");
      redirect('Services');
    }

  }


    public function services_list()
    {
    	$list = $this->Services_model->get_services();
    	$data = array();
    	$no = 0;
    	foreach ($list as $services) {
    		$no++;
    		$row = array();
    		$row[] = $no;
    		$row[] = $services->date;
    		$row[] = $services->virtual_invoice;
    		$row[] = $services->cust_name;
    		$row[] = $services->estimated_charges;

      //add html for action
    		$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_purchase('."'".$services->service_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
    		<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_purchase('."'".$services->invoice_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

    		$data[] = $row;
    	}
    	$output = array(
    		"data" => $data,
    		);
    	echo json_encode($output);

    }


}
?>
