<?php
class Reports extends CI_Controller {
  function Reports() {
    parent::__construct();

    if ($this->session->logged_in != 1) {
      redirect('login');
    }
  }
  //Rentout Report .......
  function rentout_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Rentout Report Details";
    $data['cust_name'] = $this->Rental_model->getAllCustomers();
    $data['business_name'] = $this->Rental_model->getAllCustomersBussinessNames();
    $data['prd_class'] = $this->Rental_model->getProductClassRO();

    $this->load->view('Reports/Rental_Report/rentout_report', $data);
  }
  function purchase_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Purchase Report Details";
    $data['sup_name'] = $this->Purchase_model->getAllSuppliers();
    
    $this->load->view('Reports/purchase_report', $data);
  }
  function damage_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Damage Product Report Details";
    $data['damage'] = $this->Store_model->get_damage_products();
    
    $this->load->view('Reports/damage_report', $data);
  }
  function supplier_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Damage Products Report Details";
    $data['sup_name'] = $this->Purchase_model->getAllSuppliers();
    
    $this->load->view('Reports/supplier_report', $data);
  }
  function sale_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Sale Report Details";
    $data['cust_name'] = $this->Sale_model->getAllCustomers();
    $data['business_name'] = $this->Sale_model->getAllCustomersBussinessNames();
    $data['prd_class'] = $this->Sale_model->getProductClass();

    $this->load->view('Reports/sale_report', $data);
  }
  function service_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Service Report Details";

    $this->load->view('Reports/service_report', $data);
  }
  function accounts_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Accounts Report Details";
    $data['accounts'] = $this->Report_model->getAllAccounts();

    $this->load->view('Reports/Bank_Report/accounts_report', $data);
  }
  function daily_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Daily Report Details";
    // $data['accounts'] = $this->Report_model->getAllAccounts();
    $data['trans_type'] = $this->Report_model->getTransactionTypes();

    $this->load->view('Reports/Bank_Report/daily_report', $data);
  }
  function saleStock_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Sale Stock Report Details";

    $this->load->view('Reports/saleStock_report', $data);
  }
  function rentalStock_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Rental Stock Report Details";

    $this->load->view('Reports/rentalStock_report', $data);
  }
  function monthly_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Monthly Report Details";
    $data['accounts'] = $this->Report_model->getAllAccounts();

    $this->load->view('Reports/Bank_Report/monthly_report', $data);
  }
  function total_expense() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Total Expense Report Details";

    $this->load->view('Reports/Bank_Report/total_expense', $data);
  }
  function cheque_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Cheque Report Details";

    $this->load->view('Reports/Bank_Report/cheque_report', $data);
  }
  function customerAccounts_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Customer Accounts Report Details";

    $this->load->view('Reports/Bank_Report/customerAccounts_report', $data);
  }
  function customer_credit_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Customer Credit Report Details";
    $data['cust_name'] = $this->Customer_model->get_customers();

    $this->load->view('Reports/Bank_Report/customer_credit_report', $data);
  }
  //datatable for rentout report
  function populateRentout($from,$to,$cust,$type){
    $list = $this->Report_model->get_rentoutReport($from,$to,$cust,$type);
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    // $row[] = '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
    //         <input type="checkbox" class="emp_checkbox" name="checkInvoices[]" class="checkboxes" data-invoice-id="'.$report->invoice_id.'" />
    //         <span></span>
    //         </label>
    //         ';
    $row[] = $report->rout_id;
    //$row[] = $report->cust_name;
    $row[] = $report->invoice_id;
    $row[] = $report->temp_name;
    $row[] = $report->original_qty;
    $row[] = $report->total_amount;
    $row[] = $report->out_date;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
            //output to json format
    echo json_encode($output);
    //echo 'alert("'.$from.'");';
  }
  function populateChequesReport($from = null,$to = null){
    $list = $this->Report_model->get_ChequeReport($from , $to);
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    $row[] = $report->cheque_date;
    $row[] = $report->cheque_no;
    $row[] = $report->bank_name;
    $row[] = $report->description;
    $row[] = $report->account_name;
    $row[] = $report->total_amount;
    $row[] = $report->cheque_status;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
            //output to json format
    echo json_encode($output);
    //echo 'alert("'.$from.'");';
  }

  function populateCustCreditReport(){
    $list = $this->Customer_model->get_customers();
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    //ye values abhi maloom ni han
    $row[] = $report->cust_name;
    $row[] = $report->cust_business_name;
    $row[] = $report->cust_contact;
    $row[] = $report->total_credit;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
            //output to json format
    echo json_encode($output);
  }

  function populateCustomerAccountsReport($from,$to){
    $list = $this->Report_model->get_CustomerAccountsReport($from , $to);
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    //ye values abhi maloom ni han
    $row[] = $report->customer_code;
    $row[] = $report->cheque_no;
    $row[] = $report->bank_name;
    $row[] = $report->description;
    $row[] = $report->account_name;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
            //output to json format
    echo json_encode($output);
    //echo 'alert("'.$from.'");';
  }
  function populateTotalExpenseReport($from,$to){
    $list = $this->Report_model->get_TotalExpenseReport($from , $to);
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    //ye values abhi maloom ni han
    // $row[] = $report->bt_id;
    $row[] = $report->account_name;
    $row[] = $report->bank_name;
    $row[] = $report->tr_type;
    $row[] = $report->sum;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
            //output to json format
    echo json_encode($output);
    //echo 'alert("'.$from.'");';
  }
  function populateAccountsReport($from,$to,$account){
    $list = $this->Report_model->get_accountsReport($from,$to,$account);
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    // $row[] = '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
    //         <input type="checkbox" class="emp_checkbox" name="checkInvoices[]" class="checkboxes" data-invoice-id="'.$report->invoice_id.'" />
    //         <span></span>
    //         </label>
    //         ';
    $row[] = $report->tr_date;
    $row[] = $report->bt_id;
    $row[] = $report->tr_type;
    $row[] = $report->description;
    $row[] = $report->dr;
    $row[] = $report->cr;
    // $row[] = $report->balance;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
            //output to json format
    echo json_encode($output);
    //echo 'alert("'.$from.'");';
  }
  function populateDailyReport($from,$to,$type){
    $list = $this->Report_model->get_dailyReport($from,$to,$type);
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    // $row[] = '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
    //         <input type="checkbox" class="emp_checkbox" name="checkInvoices[]" class="checkboxes" data-invoice-id="'.$report->invoice_id.'" />
    //         <span></span>
    //         </label>
    //         ';
    $row[] = $report->tr_date;
    $row[] = $report->bt_id;
    $row[] = $report->type;
    $row[] = $report->cust_name;
    $row[] = $report->description;
    $row[] = $report->dr;
    $row[] = $report->cr;
    // $row[] = $report->balance;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
            //output to json format
    echo json_encode($output);
    //echo 'alert("'.$from.'");';
  }
  function populateSaleStockReport(){
    $list = $this->Report_model->get_saleStockReport();
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    $row[] = $report->prd_name;
    $row[] = $report->prd_cost_price;
    $row[] = $report->prd_qty;
    $row[] = $report->prd_sale_price;
    $row[] = $report->prd_brand;
    $row[] = $report->prd_model;
    $row[] = $report->prd_size;
    $row[] = $report->sup_name;
    $row[] = $report->prd_class;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
            //output to json format
    echo json_encode($output);
    //echo 'alert("'.$from.'");';
  }
  function populateRentalStockReport(){
    $list = $this->Report_model->get_rentalStockReport();
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    $row[] = $report->prd_name;
    $row[] = $report->prd_qty;
    $row[] = $report->prd_rent_per_day;
    $row[] = $report->prd_rent_per_month;
    $row[] = $report->prd_brand;
    $row[] = $report->prd_model;
    $row[] = $report->prd_size;
    $row[] = $report->sup_name;
    $row[] = $report->prd_class;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
            //output to json format
    echo json_encode($output);
    //echo 'alert("'.$from.'");';
  }
  function populateMonthlyReport($from,$to){
    $list = $this->Report_model->get_monthlyReport($from,$to);
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    // $row[] = '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
    //         <input type="checkbox" class="emp_checkbox" name="checkInvoices[]" class="checkboxes" data-invoice-id="'.$report->invoice_id.'" />
    //         <span></span>
    //         </label>
    //         ';
    $row[] = $report->expense;
    $row[] = $report->expense_balance;
    $row[] = $no;
    $row[] = $report->debit;
    $row[] = $report->debit_balance;
    // $row[] = $report->balance;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
            //output to json format
    echo json_encode($output);
    //echo 'alert("'.$from.'");';
  }
  function populateRentalProducts(){
    $list = $this->Report_model->get_rentalProducts();
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    $row[] = $report->prd_name;
    $row[] = $report->prd_qty;
    $row[] = $report->rentOut;
    $row[] = $report->remain;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
            //output to json format
    echo json_encode($output);
    //echo 'alert("'.$from.'");';
  }
  function populateRentIn($from,$to,$cust,$type){
    $list = $this->Report_model->get_rentInReport($from,$to,$cust,$type);
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    // $row[] = '<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
    //         <input type="checkbox" class="emp_checkbox" name="checkInvoices[]" class="checkboxes" data-invoice-id="'.$report->invoice_id.'" />
    //         <span></span>
    //         </label>
    //         ';
    $row[] = $report->rid_id;
    //$row[] = $report->cust_name;
    $row[] = $report->invoice_id;
    $row[] = $report->cust_name;
    $row[] = $report->prd_qty;
    $row[] = $report->total_amount;
    $row[] = $report->in_date;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
            //output to json format
    echo json_encode($output);
    //echo 'alert("'.$from.'");';
  }
  function populateService($from,$to){
    $list = $this->Report_model->get_serviceReport($from,$to);
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    $row[] = $report->invoice_id;
    $row[] = $report->date;
    $row[] = $report->cust_name;
    $row[] = $report->estimated_charges;
    $row[] = $report->problems;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
            //output to json format
    echo json_encode($output);
    //echo 'alert("'.$from.'");';
  }
  function populateRentInRentOut($from,$to,$cust,$type){
    $list = $this->Report_model->get_rentInRentOutReport($from,$to,$cust,$type);
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    $row[] = $report->rentOut_dateTime;
    $row[] = $report->prd_name;
    $row[] = $report->original_qty;
    $row[] = $report->rentIn_dateTime;
    $row[] = $report->prd_qty;
    $row[] = $report->prd_price;
    $row[] = $report->discount;
    $row[] = $report->total_amount;
    $row[] = $report->Status;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
            //output to json format
    echo json_encode($output);
    //echo 'alert("'.$from.'");';
  }
  function populateSale($from,$to,$cust,$type){
    // echo $cust;
    $list = $this->Report_model->get_saleReport($from,$to,$cust,$type);
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    $row[] = $report->invoice_id;
    $row[] = $report->temp_name;
    $row[] = $report->total_amount;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
    echo json_encode($output);
  }
  function populatePurchase($from,$to,$cust){
    // echo $cust;
    $list = $this->Report_model->get_purchaseReport($from,$to,$cust);
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    $row[] = $report->invoice_id;
    $row[] = $report->date;
    $row[] = $report->sup_name;
    $row[] = $report->payment_type;
    $row[] = $report->total_amount;
    $row[] = $report->vat_amount;
    // $row[] = $report->trn_no;
    $row[] = $report->remarks;
    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
    echo json_encode($output);
  }
  function populateSupplier($from,$to,$cust){
    // echo $cust;
    $list = $this->Report_model->get_supplierReport($from,$to,$cust);
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    $row[] = $report->invoice_id;
    $row[] = $report->sup_name;
    $row[] = $report->phone;
    $row[] = $report->total_amount;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
    echo json_encode($output);
  }
  function populateDamage($from,$to){
    // echo $cust;
    $list = $this->Report_model->get_damageReport($from,$to);
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    $row[] = $report->dp_id;
    $row[] = $report->prd_name;
    $row[] = $report->prd_unique_id;
    $row[] = $report->prd_qty;
    $row[] = $report->date;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
    echo json_encode($output);
  }
  function populateCustomerProducts($from,$to,$type,$cust){
    $list = $this->Report_model->get_customerProductsReport($from,$to,$type,$cust);
    $data = array();
    $no = 0;
    foreach ($list as $report) {
    $no++;
    $row = array();
    $row[] = $no;
    $row[] = $report->rentOut_dateTime;
    $row[] = $report->prd_name;
    $row[] = $report->invoice_id;
    $row[] = $report->original_qty;
    $row[] = $report->rentIn_dateTime;
    $row[] = $report->prd_qty;
    $row[] = $report->balance_qty;
    $row[] = $report->rate;
    $row[] = $report->net_amount;
    $row[] = $report->site_name;

    $data[] = $row;
    }
    $output = array(
    "data" => $data,
    );
            //output to json format
    echo json_encode($output);
    //echo 'alert("'.$from.'");';
  }
  //Rentin Report .......
  function rentin_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "RentIn Report Details";
    $data['cust_name'] = $this->Rental_model->getAllCustomersRI();
    $data['business_name'] = $this->Rental_model->getAllCustomersBussinessNamesRI();
    $data['prd_class'] = $this->Rental_model->getProductClassRI();

    $this->load->view('Reports/Rental_Report/rentin_report', $data);
  }
  function customerRented_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Product wise Customer Report";
    $data['cust_name'] = $this->Report_model->getAllCustomers();

    $this->load->view('Reports/Rental_Report/customerRented_report', $data);
  }
  function rentalProducts_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Rental Products Report Details";

    $this->load->view('Reports/Rental_Report/rentalProducts_report', $data);
  }
  function rentIn_rentOut_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Rental Summary Details";
    $data['cust_name'] = $this->Rental_model->getAllCustomers();
    $data['business_name'] = $this->Rental_model->getAllCustomersBussinessNames();
    $data['prd_class'] = $this->Rental_model->getProductClassRO();

    $this->load->view('Reports/Rental_Report/rentIn_rentOut_report', $data);
  }
  function rental_combined_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Combined Rental Report Details";

    $this->load->view('Reports/Rental_Report/combinedRental_report', $data);
  }
  //Rentin Report .......
  function equipment_report() {
    $data['reports'] = TRUE;
    $data['title'] = "Reports";
    $data['sub_title'] = "Equipment Report Details";

    $this->load->view('Reports/Rental_Report/rentin_report', $data);
  }
}
?>