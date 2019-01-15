<?php
class Banking extends CI_Controller {
    function Banking() {
        parent::__construct();
        
        if ($this->session->logged_in != 1) {
            redirect('login');
        }
    }

    function index() {
        $data['banking'] = TRUE;
        $data['title'] = "Banking";
        $data['sub_title'] = "Manage Bank Accounts";
        $data['form_title'] = 'Add Banking';
        $data['Action'] = "Add";
        $data['banks'] = $this->Bank_model->show_banks();
        $this->load->view('Banking/banking', $data);
    }

    function bank_view($id) {
        $data['banking'] = TRUE;
        $data['title'] = "Banking";
        $data['sub_title'] = "Manage Bank Accounts";
        // $data['form_title'] = 'Add Banking';
        // $data['Action'] = "Add";
        $data['transactions'] = $this->Bank_model->bank_transactions($id);
        $data['detail'] = $this->Bank_model->get_bank($id);
        $this->load->view('Banking/bank_details', $data);
    }

    function bank_transactions($id) {
        $data['banking'] = TRUE;
        $data['title'] = "Banking";
        $data['sub_title'] = "Manage Bank Accounts";
        // $data['form_title'] = 'Add Banking';
        // $data['Action'] = "Add";
        $data['transactionDetail'] = $this->Bank_model->bank_transaction_detail($id);
        $this->load->view('Banking/bank_transaction_detail', $data);
    }

    function accounts() {
        $data['banking'] = TRUE;
        $data['title'] = "Banking";
        $data['sub_title'] = "Manage Banks";
        $data['form_title'] = 'Add Banking';
        $data['Action'] = "Add";
        $this->load->view('Banking/account', $data);
    }

    function account_view($id) {
        $data['banking'] = TRUE;
        $data['title'] = "Banking";
        $data['sub_title'] = "Manage Bank Accounts";
        // $data['form_title'] = 'Add Banking';
        // $data['Action'] = "Add";
        $data['transactions'] = $this->Bank_model->account_transactions($id);
        $this->load->view('Banking/account_details', $data);
    }
    
    function cheques() {
        $data['banking'] = TRUE;
        $data['title'] = "Banking";
        $data['sub_title'] = "Manage Cheques";
        $data['Action'] = "Add";

        $data['banks'] = $this->Bank_model->show_banks();
        $data['incoming'] = $this->Bank_model->incomingCheques();
        $data['outgoing'] = $this->Bank_model->outgoingCheques();


        $this->load->view('Banking/cheques', $data);
    }

    public function account_list()
    {
        $list = $this->Bank_model->get_accounts();
        $data = array();
        $no = 0;
        foreach ($list as $bank) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $bank->account_name;
            $row[] = $bank->account_description;
            $row[] = $bank->account_type;

            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_account('."'".$bank->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_account('."'".$bank->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Hapus" onclick="view_account('."'".$bank->id."'".')"><i class="glyphicon glyphicon-eye"></i> View</a>';

            $data[] = $row;
        }

        $output = array(
            "data" => $data,
            );
        echo json_encode($output);
    }
    
    public function populate_account_details($id,$from,$to)
    {
        $list = $this->Bank_model->account_transactionsWithDate($id,$from,$to);
        $data = array();
        $no = 0;
        foreach ($list as $bank) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $bank->tr_date;
            $row[] = $bank->description;
            $row[] = $bank->amount;

            $data[] = $row;
        }

        $output = array(
            "data" => $data,
            );
        echo json_encode($output);
    }

    public function getAccounts()
    {
      $list = $this->Bank_model->get_accounts();
      echo json_encode($list);
    }

    public function account_add()
    {
        // $this->_validate();
        $data = array(
            'account_name'  => $this->input->post('account_name'), 
            'account_description' => $this->input->post('account_description'), 
            'account_type'  => $this->input->post('account_type') 
            );
        $insert = $this->Bank_model->addAccount($data);
        echo json_encode(array("status" => TRUE));
    }

    //bank edit.....
    public function bank_edit($id)
    {
        $data = $this->Bank_model->get_bank($id);
      // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
    
    public function bank_result($id)
    {
        $data = $this->Bank_model->get_bankResult($this->input->get('min_date'),$this->input->get('max_date'),$id);
      // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
    public function account_edit($id)
    {
        $data = $this->Bank_model->get_account($id);
      // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }

    public function account_update()
    {
        // $this->_validate();
            $data = array(
            'account_name'  => $this->input->post('account_name'), 
            'account_description' => $this->input->post('account_description'), 
            'account_type'  => $this->input->post('account_type') 
            );

        $insert = $this->Bank_model->updateAccount($this->input->post('account_id'),$data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function bank_delete($id)
    {
        $this->Bank_model->delete_bank($id);
        echo json_encode(array("status" => TRUE));
    }

    public function deleteCheque($id)
    {
        $this->Bank_model->deleteCheque($id);
        echo json_encode(array("status" => TRUE));
    }

    public function account_delete($id)
    {
        $this->Bank_model->delete_account($id);
        echo json_encode(array("status" => TRUE));
    }

    function create_bank(){

        $data = array(
            'bank_name'  => $this->input->post('bank_name'), 
            'bank_description' => $this->input->post('bank_description'), 
            'bank_balance'  => $this->input->post('bank_balance'), 

        );
        if ($result = $this->Bank_model->addBank($data)) {

            $this->session->set_flashdata('success', 'Bank Added Successfully.');
            redirect('Banking');
        }else{
            $this->session->set_flashdata('error', 'Something went wrong, Please try again!');
            redirect('Banking');
        }  
    }
    public function clearCheck()
        {

            if ($result = $this->Bank_model->clearCheck()) {

             $this->session->set_flashdata('success',"Cheque Clear successfully");
             redirect('Banking/cheques');
         }else{
             $this->session->set_flashdata('error',"Cheque Not Clear successfully");
             redirect('Banking/cheques');
         }

     } 
    function update_bank(){

        $data = array(
            'bank_name'  => $this->input->post('bank_name'), 
            'bank_description' => $this->input->post('bank_description'), 
            'bank_balance'  => $this->input->post('bank_balance'), 

        );
        if ($result = $this->Bank_model->updateBank($this->input->post('bank_id'),$data)) {

            $this->session->set_flashdata('success', 'Bank Updated Successfully.');
            redirect('Banking');
        }else{
            $this->session->set_flashdata('error', 'Something went wrong, Please try again!');
            redirect('Banking');
        }  
    }    

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('bank_name') == '')
        {
            $data['inputerror'][] = 'bank_name';
            $data['error_string'][] = 'Bank Name is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('bank_type') == '')
        {
            $data['inputerror'][] = 'bank_type';
            $data['error_string'][] = 'Bank Type is required';
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