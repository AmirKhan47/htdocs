<?php
class Supplier extends CI_Controller {
  function Supplier() {
    parent::__construct();

    if ($this->session->logged_in != 1) {
      redirect('login');
    }
  }

  function index() {
    $data['supplier'] = TRUE;
    $data['title'] = "Supplier";
    $data['sub_title'] = "Manage Supplier Details";


    $this->load->view('Supplier/supplier', $data);
  }

  public function supplier_list()
  {
    $list = $this->Supplier_model->get_suppliers();
    $data = array();
    $no = 0;
    foreach ($list as $supplier) {
      $no++;
      $row = array();
      // $row[] = $no;
      $row[] = $supplier->sup_name;
      $row[] = $supplier->email;
      $row[] = $supplier->sup_licence;
        // $row[] = $supplier->phone;
      $row[] = $supplier->mobile;
      $row[] = $supplier->address;
      $row[] = $supplier->total_credit;

      //add html for action
      $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_supplier('."'".$supplier->sup_id."'".')"><i class="glyphicon glyphicon-pencil"></i> </a>
      <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_supplier('."'".$supplier->sup_id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>
      <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Hapus" onclick="view_supplier('."'".$supplier->sup_id."'".')"><i class="glyphicon glyphicon-eye-open"></i> </a>';

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
     * Add Supplier
     */
      public function supplier_add()
      {
        $this->_validate();
        $data = array(
          'sup_name'  => $this->input->post('sup_name'), 
          'sup_licence'  => $this->input->post('sup_licence'), 
          'email' => $this->input->post('email'), 
          'phone' => $this->input->post('phone'), 
          'mobile' => $this->input->post('mobile'), 
          'address' => $this->input->post('address'),
          'business_name' => $this->input->post('business_name'), 
          'emirates' => $this->input->post('emirates'), 
          'tr_no' => $this->input->post('trn_no')

          );

        $insert = $this->Supplier_model->addSupplier($data);

        echo json_encode(array("status" => TRUE));
      }
 /*
     * Edit Data Supplier
     */
 public function supplier_edit($id)
 {
  $data = $this->Supplier_model->get_supplier($id);
  echo json_encode($data);
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
    'address' => $this->input->post('address'),
    'business_name' => $this->input->post('business_name'), 
    'emirates' => $this->input->post('emirates'), 
    'tr_no' => $this->input->post('trn_no')
    );

  $this->Supplier_model->updateSupplier($this->input->post('sup_id'), $data);
  echo json_encode(array("status" => TRUE));
}
     /*
     * Delete Supplier
   */
     public function supplier_delete($id)
     {
      $this->Supplier_model->delete_supplier($id);
      echo json_encode(array("status" => TRUE));
    }
 /*
     * Edit Data Supplier
     */
 public function supplier_transaction($id)
 {
  $data = $this->Supplier_model->supplier_transaction($id);
  echo json_encode($data);
}

 public function supplierDetail($id)
 {
  $data = $this->Supplier_model->get_supplier($id);
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