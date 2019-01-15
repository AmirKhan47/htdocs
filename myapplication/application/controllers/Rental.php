<?php
class Rental extends CI_Controller {
  function Rental() {
    parent::__construct();

    if ($this->session->logged_in != 1) {
      redirect('login');
    }
  }
//Summary Rentout.......
  function rentOut() {
    $data['rental'] = TRUE;
    $data['title'] = "Rental";
    $data['sub_title'] = "Manage Rent Out Details";
    $data['salesman'] = $this->Rental_model->get_salesman();

    $this->load->view('Rental/rentoutSummary', $data);
  }
//Summary RentIn
  function rentIn() {
    $data['rental'] = TRUE;
    $data['title'] = "Rental";
    $data['sub_title'] = "Manage Rent-In Details";
    $data['salesman'] = $this->Rental_model->get_salesman();

    $this->load->view('Rental/rentInSummary', $data);
  }
//Add  Rentout invoci.......
  function addRentOutInvoice() {
    $data['rental'] = TRUE;
    $data['title'] = "Rental";
    $data['sub_title'] = "Add Rent Out Details";
    $data['salesman'] = $this->Rental_model->get_salesman();
    $data['tr_no'] = $this->Rental_model->getLatestInvoiceNo();
    $data['customers'] = $this->Customer_model->get_customers();

    $this->load->view('Rental/rentout', $data);
  }
//Edit Rentout invoci.......
  function EditRentOutInvoice($id) {
    $data['rental'] = TRUE;
    $data['title'] = "Rental";
    $data['sub_title'] = "Edit Rent Out Details";
    $data['salesman'] = $this->Rental_model->get_salesman();
    //get invoice detail..............
    $data['detail'] = $this->Rental_model->get_invoice($id);
    $data['customers'] = $this->Customer_model->get_customers();

    // print_r($data['detail']);
    $this->load->view('Rental/rentout', $data);
  }

  //Rentout invoci.......
  // function rentoutInvoice($id) {
  //   $data['rental'] = TRUE;
  //   $data['title'] = "Rental";
  //   $data['sub_title'] = "RentOut Invoice Detail";

  //   //get invoice detail..............
  //   $data['detail'] = $this->Rental_model->rentoutInvoice($id);
  //   $data['products'] = $this->Rental_model->get_invoiceProducts($id);

  //   $this->load->view('Rental/rentoutInvoice', $data);
  // }

    //Rentin invoci.......
  // function rentinInvoice($id) {
  //   $data['rental'] = TRUE;
  //   $data['title'] = "Rental";
  //   $data['sub_title'] = "RentIn Invoice Detail";

  //   //get invoice detail..............
  //   $data['detail'] = $this->Rental_model->rentinInvoice($id);
  //   $data['products'] = $this->Rental_model->get_rentin_invoiceProducts($id);

  //   $this->load->view('Rental/rentinInvoice', $data);
  // }

  //Edit Rentout invoci.......
  function EditRentInInvoice() {
    $data['rental'] = TRUE;
    $data['title'] = "Rental";
    $data['sub_title'] = "Edit Rent-In Details";
    $data['salesman'] = $this->Rental_model->get_salesman();
    //get invoice detail..............
    $data['tr_no'] = $this->Rental_model->getLatestInvoiceNoRentIn();
    $data['banks'] = $this->Bank_model->get_banks();

    // $data['detail'] = $this->Customer_model->get_customer($this->input->post('cust_id'));
    // $data['detail'] = $this->Rental_model->get_rentIn_invoice($this->input->post('cust_id'));
    $data['salesman'] = $this->Rental_model->get_salesman();
    $data['customer'] = $this->Customer_model->get_customers();
    // echo $this->input->post('cust_id');
    $data['list']= $this->Rental_model->updatingRentinProducts();
    // print_r($data['list']);
    $this->load->view('Rental/rentin', $data);
  }

   function RentInCompleted() {
    $data['rental'] = TRUE;
    $data['title'] = "Rental";
    $data['sub_title'] = "Edit Rent-In Details";
  
    $this->load->view('Rental/rentinCompleted', $data);
  }

  public function rentout_list()
    {
    $list = $this->Rental_model->get_rentoutsummary();
    $data = array();
    $no = 0;
    foreach ($list as $rental) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $rental->out_date;
      $row[] = $rental->temp_name;
      $row[] = $rental->virtual_invoice;
      $row[] = $rental->cust_business_name;
      $row[] = $rental->contact_no;
      
      if($rental->status==0){
      $row[]='<span class="label label-md label-danger">Panding</span>';
       $edit= '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_rentout('."'".$rental->invoice_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';

      }else{
      $row[]='<span class="label label-md label-success">Completed</span>';
       $edit= '<a class="btn btn-sm btn-primary"  href="javascript:void(0)" title="Edit" ><i class="glyphicon glyphicon-pencil"></i></a>';

      }


      //add html for action
      $row[] = $edit.'
      <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_rentout('."'".$rental->invoice_id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>
      <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Hapus" onclick="view_rentout('."'".$rental->invoice_id."'".')"><i class="glyphicon glyphicon-eye-open"></i> </a>';

      $data[] = $row;
    }

    $output = array(
      "data" => $data,
      );
    //output to json format
    echo json_encode($output);
  }
  public function rentin_list()
    {
    $list = $this->Rental_model->get_rentinsummary();
    $data = array();
    $no = 0;
    foreach ($list as $rental) {
      $no++;
      $row = array();
      // $row[] = $no;
      if($rental->status==0){
       $row[] = '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                              <input type="checkbox" class="emp_checkbox" name="checkInvoices[]" class="checkboxes" data-invoice-id="'.$rental->invoice_id.'" data-product-id="'.$rental->prd_id.'" data-product_unique-id="'.$rental->prd_unique_id.'" />
                              <span></span>
                            </label>
                            ';
      }else{
        $row[] = '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                              <input type="checkbox" disabled class="emp_checkbox" name="checkInvoices[]" class="checkboxes" data-invoice-id="'.$rental->invoice_id.'" data-product-id="'.$rental->prd_id.'" data-product_unique-id="'.$rental->prd_unique_id.'" />
                              <span></span>
                            </label>
                            ';
      } 

      $row[] = $rental->out_date;
      $row[] = $rental->virtual_invoice;
      $row[] = $rental->temp_name;
      $row[] = $rental->cust_business_name;
      $row[] = $rental->contact_no;
      $row[] = $rental->site_name;
      // '<input type="hidden" name="cust_id[]" value="'.$rental->cust_id.'">'.'<input type="hidden" name="cust_name[]" value="'.$rental->cust_name.'">'.'<input type="hidden" name="address[]" value="'.$rental->cust_address.'">'.'<input type="hidden" name="idcard[]" value="'.$rental->id_card.'">'.'<input type="hidden" name="contact_no[]" value="'.$rental->contact_no.'">';
      $row[] = $rental->prd_name.' '.$rental->unique_id;
      $row[] = $rental->prd_qty;
      $row[] = $rental->original_qty;
      if($rental->status==0){
      $row[]='<span class="label label-md label-danger">Panding</span>';
       // $edit= '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_rentin('."'".$rental->invoice_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';

      }else{
      // $row[]='<span class="label label-md label-success">Completed</span>';
       // $edit= '<a class="btn btn-sm btn-primary"  href="javascript:void(0)" title="Edit" ><i class="glyphicon glyphicon-pencil"></i></a>';
      $row[]='<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_rentin('."'".$rental->invoice_id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';

      }
      //add html for action
      // $row[] = $edit.'
      // <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Hapus" onclick="view_rentin('."'".$rental->invoice_id."'".')"><i class="glyphicon glyphicon-eye-open"></i> </a>';

      $data[] = $row;
    }

    $output = array(
      "data" => $data,
      );
    //output to json format
    echo json_encode($output);
  }

  public function rentin_completedlist()
    {
    $list = $this->Rental_model->get_rentincompleted();
    $data = array();
    $no = 0;
    foreach ($list as $rental) {
      $no++;
      $row = array();
      // $row[] = $no;

      $row[] = $rental->in_date;
      $row[] = $rental->virtual_invoice;
      $row[] = $rental->cust_name;
      $row[] = $rental->total_amount;
      $row[]='<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_rentin('."'".$rental->invoice_id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';
      
      $data[] = $row;
    }

    $output = array(
      "data" => $data,
      );
    //output to json format
    echo json_encode($output);
  }

  function supplier_view()
  {
    $data['supplier'] = TRUE;
    $data['title'] = "Supplier";
    $data['sub_title'] = "Manage Supplier Profile";

        // $data['Supplier'] = $this->Supplier_model->get_Supplier($id);
    $this->load->view('Supplier/supplier_detail', $data);
  }


      /*
     * Add Rentout Invoice....
     */
      public function addRentout()
      {

      // echo $this->input->post('test_cust_id');

          if ($result = $this->Rental_model->addRentOut()) {

           $this->session->set_flashdata('success',"Rentout Added successfully");
           redirect('Rental/rentOut');
         }else{
           $this->session->set_flashdata('error',"Rentout not Added successfully");
           redirect('Rental/addRentOut');
         }

     }
       /*
     * Update Rentout Invoice....
     */
      public function updateRentout($id)
      {

        // print_r($this->input->post('productname'));

          if ($result = $this->Rental_model->updateRentOut($id)) {

           $this->session->set_flashdata('success',"Rentout Updated successfully");
           redirect('Rental/rentOut');
         }else{
           $this->session->set_flashdata('error',"Rentout not Updated successfully");
           redirect('Rental/rentOut');
         }

     }
     public function updateRentin()
      {
        // print_r($this->input->post('productname'));

          if ($result = $this->Rental_model->updateRentIn()) {
            $invoices=explode('-',$this->input->post('slip_no') );
            // print_r($invoices);
            $this->session->set_flashdata('success',"Rent-In Updated successfully");
            redirect('Invoice/rentinInvoice/'.$invoices[1]);
              // redirect('Rental/rentIn');
         }else{
           $this->session->set_flashdata('error',"Rent-In not Updated successfully");
            redirect('Rental/rentIn');
         }
         exit();

     }
     //update Supplier
public function supplier_update(){

  $this->_validate();
  $data = array(
    'sup_name'  => $this->input->post('sup_name'), 
    'sup_licence'  => $this->input->post('sup_licence'), 
    'email' => $this->input->post('email'), 
    'phone' => $this->input->post('phone'), 
    'mobile' => $this->input->post('mobile'), 
    'address' => $this->input->post('address')
    );

  $this->Supplier_model->updateSupplier($this->input->post('sup_id'), $data);
  echo json_encode(array("status" => TRUE));
}
     /*
     * Delete Supplier
   */
     public function rentout_delete($id)
     {
      $this->Rental_model->delete_rentout($id);
      echo json_encode(array("status" => TRUE));
    }
    public function unitPrices($id)
    {
      $this->Rental_model->unitPrices($id);
      echo json_encode(array("status" => TRUE));
    }
    public function rentin_delete($id)
     {
      $this->Rental_model->delete_rentin($id);
      echo json_encode(array("status" => TRUE));
    }
 /*
     * Edit Data Supplier
     */
     public function setUserData($id)
     {
      
      $data = $this->Rental_model->get_invoice($id);
      $customer=array(
          'address' => $data->address,
          'id_card'  => $data->id_card,
          'contact_no'     => $data->contact_no,
          'remarks' => $data->note,
          'advance' => $data->advance,
          'cust_name'=>$data->temp_name
        );

        if( $data->cust_id==NULL ){
          $customer['cust_id']=$data->cust_id;
          // $customer['cust_name']=$data->temp_name;
        }else{
          $customer['cust_id']=$data->cust_id;
          // $customer['cust_name']=$data->cust_name;
        }

        $this->session->set_userdata($customer);

        echo json_encode($data);
    }

    //Vlidate Supplier...... 
private function _validate()
{
  $data = array();
  $data['error_string'] = array();
  $data['inputerror'] = array();
  $data['status'] = TRUE;

  if($this->input->post('sup_name') == '')
  {
    $data['inputerror'][] = 'sup_name';
    $data['error_string'][] = 'Customer Name is required';
    $data['status'] = FALSE;
  }

  if($data['status'] === FALSE)
  {
    echo json_encode($data);
    exit();
  }
}
}
?>