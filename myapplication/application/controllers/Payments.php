<?php
class Payments extends CI_Controller {
    function Payments() {
        parent::__construct();
        
        if ($this->session->logged_in != 1) {
            redirect('login');
        }
    }

    function index() {
        $data['Receipts'] = TRUE;
        $data['title'] = "Payments";
        $data['sub_title'] = "Manage Payments";
        $data['form_title'] = 'Payments Entry';
        $data['tr_no'] = $this->Rental_model->getLatestPaymentInvoiceNo();
        $data['suppliers'] = $this->Supplier_model->get_suppliers();
        $data['accounts'] = $this->Bank_model->get_accounts();
        
        $data['banks'] = $this->Bank_model->get_banks();
        $this->load->view('Payments/payments', $data);
    }
    // public function getInvoices($temp){

    //         $list = $this->Receipts_model->get_custRentinInvoice($temp);
    //         $data = array();
    //         $no = 0;
    //         foreach ($list as $receipt) {
    //         $no++;
    //         $row = array();
    //         // $row[] = $no;
    //         $row[] = '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
    //                 <input type="checkbox" class="emp_checkbox" name="checkInvoices[]" class="checkboxes" data-invoice-id="'.$receipt->invoice_id.'" />
    //                 <input type="hidden" name="getInvoices[]" value="'.$receipt->invoice_id.'">
    //                 <span></span>
    //                 </label>
    //                 ';
    //         $row[] = $receipt->virtual_invoice;
    //         $row[] = $receipt->total_amount;
    
    //         $data[] = $row;
    //         }
    //         $output = array(
    //         "data" => $data,
    //         );
    //                 //output to json format
    //         echo json_encode($output);
    //     }

        public function addExpense()
        {
            if ($result = $this->Payments_model->addExpense()) {

             $this->session->set_flashdata('success',"Payments Updated successfully");
             redirect('Payments');
         }else{
             $this->session->set_flashdata('error',"Payments noy  Updated successfully");
             redirect('Payments');
         }

     }    

}

?>