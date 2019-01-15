<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {
	function Sale() {
		parent::__construct();

		if ($this->session->logged_in != 1) {
			redirect('login');
		}
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
  /*
     * Sales.
     */

    function index() {
  	$data['store'] = TRUE;
  	$data['title'] = "Sales";
  	$data['sub_title'] = "Manage Your Sale Records";
    
  	$this->load->view('SalePurchase/saleSummary', $data);
  }

  function addSaleProduct() {
  	$data['store'] = TRUE;
  	$data['title'] = "Sales";
  	$data['sub_title'] = "Manage Your Sale Records";
    $data['tr_no'] = $this->Rental_model->getLatestSaleInvoiceNo();
    $data['salesman'] = $this->Rental_model->get_salesman();
    $data['banks'] = $this->Bank_model->get_banks();
    $data['customers'] = $this->Customer_model->get_customers();

  	// $data['prdoduct_class'] = $this->Store_model->get_class();
  	$this->load->view('SalePurchase/sale', $data);
  }

   function editSaleProduct($id) {
  	$data['store'] = TRUE;
  	$data['title'] = "Sales";
  	$data['sub_title'] = "Manage Your Sale Records";
    $data['tr_no'] = $this->Rental_model->getLatestInvoiceNo();
    $data['salesman'] = $this->Rental_model->get_salesman();
    $data['banks'] = $this->Bank_model->get_banks();
    $data['customers'] = $this->Customer_model->get_customers();
    $data['products'] = $this->Store_model->get_all_products();

    $data['detail'] = $this->Sale_model->get_detail($id);
    $data['saleDetail'] = $this->Sale_model->get_sale_detail($id);
    // print_r($data['customers']);
  	// $data['prdoduct_class'] = $this->Store_model->get_class();
  	$this->load->view('SalePurchase/sale', $data);
  }

  public function addSale()
  {

  	if ($result = $this->Sale_model->addSale()) {

      $invoices=explode('-',$this->input->post('slip_no') );
      $this->session->set_flashdata('success',"Sale Added successfully");
      redirect('Invoice/saleInvoice/'.$invoices[1]);
      // redirect('Sale');
  	}else{
  		$this->session->set_flashdata('error',"Sale not Added successfully");
  		redirect('Sale');
  	}

  }

  public function updateSale()
  {

  	if ($result = $this->Sale_model->updateSale()) {

  		$this->session->set_flashdata('success',"Sale Updated successfully");
  		redirect('Sale');
  	}else{
  		$this->session->set_flashdata('error',"Sale not Updated successfully");
  		redirect('Sale');
  	}

  }
    public function sale_list()
    {
    	$list = $this->Sale_model->get_sales();
    	$data = array();
    	$no = 0;
    	foreach ($list as $sale) {
    		$no++;
    		$row = array();
    		$row[] = $no;
    		$row[] = $sale->date;
    		$row[] = $sale->virtual_invoice;
        $row[] = $sale->temp_name;
        $row[] = $sale->cust_business_name;
    		$row[] = $sale->contact_no;
    		$row[] = $sale->total_amount;

      //add html for action
    		$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_sale('."'".$sale->invoice_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
    		<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_sale('."'".$sale->invoice_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

    		$data[] = $row;
    	}
    	$output = array(
    		"data" => $data,
    		);
    	echo json_encode($output);

    }

  /*
     * Delete Product
   */
  public function sale_delete($id)
  {
  	$this->Sale_model->delete_sale($id);
  	echo json_encode(array("status" => TRUE));
  }

  /*
     * Delete Product
   */
  public function person_delete($id)
  {
    $this->Customer_model->delete_person($id);
    echo json_encode(array("status" => TRUE));
  }

  /*
    Validation 
   */
    private function _validate()
    {
    	$data = array();
    	$data['error_string'] = array();
    	$data['inputerror'] = array();
    	$data['status'] = TRUE;

    	if($this->input->post('cust_name') == '')
    	{
    		$data['inputerror'][] = 'cust_name';
    		$data['error_string'][] = 'Customer Name is required';
    		$data['status'] = FALSE;
    	}

    	if($this->input->post('cust_contact') == '')
    	{
    		$data['inputerror'][] = 'cust_contact';
    		$data['error_string'][] = 'Contact Number is required';
    		$data['status'] = FALSE;
    	}

    	if($data['status'] === FALSE)
    	{
    		echo json_encode($data);
    		exit();
    	}
    } 

    // private function person_validate()
    // {
    //   $data = array();
    //   $data['error_string'] = array();
    //   $data['inputerror'] = array();
    //   $data['status'] = TRUE;

    //   if($this->input->post('person_name') == '')
    //   {
    //     $data['inputerror'][] = 'person_name';
    //     $data['error_string'][] = 'Person Name is required';
    //     $data['status'] = FALSE;
    //   }

    //   if($data['status'] === FALSE)
    //   {
    //     echo json_encode($data);
    //     exit();
    //   }
    // }
    //Upload Files....
    public function do_upload($fileName)
    {
    	$config['upload_path']          = 'uploaded';
    	$config['allowed_types']        = 'gif|jpg|png|pdf|xlxs|doc';	
    	$config['max_size']             = 0;
    	$config['overwrite'] = TRUE;
    	// $config['max_width']            = 1024;
    	// $config['max_height']           = 768;

    	$this->load->library('upload', $config);
    	$this->upload->initialize($config);
    	if ( ! $this->upload->do_upload($fileName))
    	{
    		$error = array('error' => $this->upload->display_errors());
    		return FALSE;
    	}
    	else
    	{
    		// $data = array('upload_data' => $this->upload->data());
    		$file_info = $this->upload->data();
    		return $file_info['file_name']; 
    		
    		 

    	}
    } 

}
?>
