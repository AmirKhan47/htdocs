<?php
class Receipts extends CI_Controller {
    function Receipts() {
        parent::__construct();
        
        if ($this->session->logged_in != 1) {
            redirect('login');
        }
    }

    function index() {
        $data['Receipts'] = TRUE;
        $data['title'] = "Receipts";
        $data['sub_title'] = "Manage Receipts";
        $data['form_title'] = 'Receipts Entry';
        $data['cust_name'] = $this->Customer_model->get_customers();
        $data['banks'] = $this->Bank_model->get_banks();
        $data['accounts'] = $this->Bank_model->get_accounts();
        $data['tr_no'] = $this->Rental_model->getLatestReceiptInvoiceNo();
        $data['suppliers'] = $this->Supplier_model->get_suppliers();

        $this->load->view('Receipts/receipts', $data);
    }
    public function getInvoices($temp){

            $list = $this->Receipts_model->get_custRentinInvoice($temp);
            $data = array();
            $no = 0;
            foreach ($list as $receipt) {
            $no++;
            $row = array();
            // $row[] = $no;
            $row[] = '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                    <input type="checkbox" class="emp_checkbox" name="checkInvoices[]" class="checkboxes" data-invoice-id="'.$receipt->invoice_id.'" />
                    <input type="hidden" name="getInvoices[]" value="'.$receipt->invoice_id.'">
                    <span></span>
                    </label>
                    ';
            $row[] = $receipt->in_date;
            $row[] = $receipt->virtual_invoice;
            $row[] = $receipt->type.'<input type="hidden" name="invoiceType[]" value="'.$receipt->type.'" />';
            $row[] = $receipt->total_amount;
    
            $data[] = $row;
            }
            $output = array(
            "data" => $data,
            );
                    //output to json format
            echo json_encode($output);
        }

        public function getSupInvoices($temp){

            $list = $this->Receipts_model->getSupInvoices($temp);
            $data = array();
            $no = 0;
            foreach ($list as $receipt) {
            $no++;
            $row = array();
            // $row[] = $no;
            $row[] = '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                    <input type="checkbox" class="emp_checkbox" name="checkInvoices[]" class="checkboxes" data-invoice-id="'.$receipt->invoice_id.'" />
                    <input type="hidden" name="getInvoices[]" value="'.$receipt->invoice_id.'">
                    <span></span>
                    </label>
                    ';
            $row[] = $receipt->date;
            $row[] = $receipt->virtual_invoice;
            $row[] = $receipt->type.'<input type="hidden" name="invoiceType[]" value="'.$receipt->type.'" />';
            $row[] = $receipt->total_amount;
    
            $data[] = $row;
            }
            $output = array(
            "data" => $data,
            );
                    //output to json format
            echo json_encode($output);
        }

        public function updateRentin()
        {

        // echo ($this->input->post('banks'));

            if ($result = $this->Receipts_model->updateRentIn()) {

             $this->session->set_flashdata('success',"Receipts Updated successfully");
             redirect('Receipts');
         }else{
             $this->session->set_flashdata('error',"Receipts noy  Updated successfully");
             redirect('Receipts');
         }

     }    

     public function receivedAmount()
     {

        if ($result = $this->Receipts_model->receivedAmount()) {
            
            // $data = array(
            //     'cust_id' => $this->input->post('cust_id') , 
            //     'invoice' => $result  , 
            //     'amount' => $this->input->post('cust_received_amount')
            //     );
            redirect('Invoice/generalInvoice/'.$result);
       }else{
           $this->session->set_flashdata('error',"Receipts noy  Updated successfully");
           redirect('Receipts');
       }

   }

}

?>