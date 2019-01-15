<?php
class Invoice extends CI_Controller {
  function Invoice() {
    parent::__construct();

    if ($this->session->logged_in != 1) {
      redirect('login');
    }
  }
  //Rentout invoci.......
  function rentoutInvoice($id) {
    $data['Invoice'] = TRUE;
    $data['title'] = "Invoice";
    $data['sub_title'] = "RentOut Invoice Detail";

    //get invoice detail..............
    $data['detail'] = $this->Rental_model->rentoutInvoice($id);
    $data['products'] = $this->Rental_model->get_invoiceProducts($id);

    $this->load->view('Invoice/rentoutInvoice', $data);
  }

  //Rentin invoci.......
  function rentinInvoice($id) {
    $data['Invoice'] = TRUE;
    $data['title'] = "Invoice";
    $data['sub_title'] = "RentIn Invoice Detail";

    //get invoice detail..............
    $data['detail'] = $this->Rental_model->rentinInvoice($id);
    $data['products'] = $this->Rental_model->get_rentin_Products($id);

    $this->load->view('Invoice/rentinInvoice', $data);
  }
  //Rentin invoci.......
  function saleInvoice($id) {
    $data['Invoice'] = TRUE;
    $data['title'] = "Invoice";
    $data['sub_title'] = "Sale Invoice Detail";

    //get invoice detail..............
    $data['detail'] = $this->Sale_model->get_detail($id);
    $data['products'] = $this->Sale_model->get_sale_detail($id);    

    $this->load->view('Invoice/saleInvoice', $data);
  }
  //Rentin invoci.......
  function purchaseInvoice($id) {
    $data['Invoice'] = TRUE;
    $data['title'] = "Invoice";
    $data['sub_title'] = "Purchase Invoice Detail";

    //get invoice detail..............
    $data['detail'] = $this->Purchase_model->get_detail($id);
    $data['products'] = $this->Purchase_model->get_purchase_detail($id);

    $this->load->view('Invoice/purchaseInvoice', $data);
  }
  function supplierInvoice($id) {
    $data['Invoice'] = TRUE;
    $data['title'] = "Invoice";
    $data['sub_title'] = "Purchase Invoice Detail";

    //get invoice detail..............
    $data['detail'] = $this->Purchase_model->get_detail($id);
    $data['products'] = $this->Purchase_model->get_purchase_detail($id);

    $this->load->view('Invoice/purchaseInvoice', $data);
  }
  function damageInvoice($id) {
    $data['Invoice'] = TRUE;
    $data['title'] = "Invoice";
    $data['sub_title'] = "Damage Poduct Invoice Detail";

    //get invoice detail..............
    $data['detail'] = $this->Store_model->get_damage_products_with_id($id);
    $data['products'] = $this->Store_model->get_material_list($id);

    $this->load->view('Invoice/damageInvoice', $data);
  }
  function serviceInvoice($id) {
    $data['Invoice'] = TRUE;
    $data['title'] = "Invoice";
    $data['sub_title'] = "Service Invoice Detail";

    //get invoice detail..............
    $data['detail'] = $this->Services_model->get_serviceForInvoice($id);
    $data['products'] = $this->Services_model->get_servicesDetailForInvoice($id);

    $this->load->view('Invoice/serviceInvoice', $data);
  }

    //General invoci.......
  function generalInvoice($id) {
    $data['Invoice'] = TRUE;
    $data['title'] = "Invoice";
    $data['sub_title'] = "Sale Invoice Detail";

    //get invoice detail..............
    $data['detail'] = $this->Receipts_model->get_detail($id);

    $this->load->view('Invoice/generalInvoice', $data);
  }
}
?>