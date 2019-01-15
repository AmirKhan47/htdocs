<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller {
	function Purchase() {
		parent::__construct();

		if ($this->session->logged_in != 1) {
			redirect('login');
		}
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
  /*
     * Purchases.
     */

    function index() {
  	$data['store'] = TRUE;
  	$data['title'] = "Purchase";
  	$data['sub_title'] = "Manage Your Purchase Records";
    
  	$this->load->view('SalePurchase/purchaseSummary', $data);
  }

  function addPurchaseProduct() {
  	$data['store'] = TRUE;
  	$data['title'] = "Purchase";
  	$data['sub_title'] = "Manage Your Purchase Records";
    
    $data['tr_no'] = $this->Rental_model->getLatestPurchaseInvoiceNo();
    $data['salesman'] = $this->Rental_model->get_salesman();
    $data['banks'] = $this->Bank_model->get_banks();
    // $data['customer'] = $this->Customer_model->get_customers();
    $data['supplier']=$this->Supplier_model->get_suppliers();
  	// $data['prdoduct_class'] = $this->Store_model->get_class();
  	$this->load->view('SalePurchase/purchase', $data);
  }

   function editPurchaseProduct($id) {
  	$data['store'] = TRUE;
  	$data['title'] = "Sales";
  	$data['sub_title'] = "Manage Your Sale Records";
    
    $data['tr_no'] = $this->Rental_model->getLatestPurchaseInvoiceNo();
    $data['salesman'] = $this->Rental_model->get_salesman();
    $data['banks'] = $this->Bank_model->get_banks();
    $data['supplier']=$this->Supplier_model->get_suppliers();
    
    // $data['customer'] = $this->Customer_model->get_customers();
    $data['products'] = $this->Store_model->get_sale_products();

    $data['detail'] = $this->Purchase_model->get_detail($id);
    $data['purchaseDetail'] = $this->Purchase_model->get_purchase_detail($id);
    // print_r($data['detail']);
    // print_r($data['purchaseDetail']);
    // echo $id;
  	// $data['prdoduct_class'] = $this->Store_model->get_class();
  	$this->load->view('SalePurchase/purchase', $data);
  }

  public function addPurchase()
  {

  	if ($result = $this->Purchase_model->addPurchase()) {

  		$this->session->set_flashdata('success',"Purchase Added successfully");
  		redirect('Purchase');
  	}else{
  		$this->session->set_flashdata('error',"Purchase not Added successfully");
  		redirect('Purchase');
  	}

  }

  public function updatePurchase()
  {

  	if ($result = $this->Purchase_model->updatePurchase()) {

  		$this->session->set_flashdata('success',"Purchase Updated successfully");
  		redirect('Purchase');
  	}else{
  		$this->session->set_flashdata('error',"Purchase not Updated successfully");
  		redirect('Purchase');
  	}

  }

    public function purchase_list()
    {
    	$list = $this->Purchase_model->get_purchases();
    	$data = array();
    	$no = 0;
    	foreach ($list as $purchase) {
    		$no++;
    		$row = array();
    		$row[] = $no;
    		$row[] = $purchase->date;
    		$row[] = $purchase->virtual_invoice;
    		$row[] = $purchase->sup_name;
    		$row[] = $purchase->total_amount;

      //add html for action
    		$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_purchase('."'".$purchase->invoice_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
    		<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_purchase('."'".$purchase->invoice_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

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
  public function purchase_delete($id)
  {
  	$this->Purchase_model->delete_purchase($id);
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
