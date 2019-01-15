<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	function Customer() {
		parent::__construct();

		if ($this->session->logged_in != 1) {
			redirect('login');
		}
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
  /*
     * Customers.
     */

  function index() {
  	$data['store'] = TRUE;
  	$data['title'] = "Customers";
  	$data['sub_title'] = "Manage Your Customer Records";

  	$data['prdoduct_class'] = $this->Store_model->get_class();
  	$this->load->view('Customer/customer', $data);
  }

      /*
     * View Customer Detail
   */
      public function customer_view($id)
      {
      	$data['store'] = TRUE;
      	$data['title'] = "Customer";
      	$data['sub_title'] = "Manage Customer Profile";

      	$data['customer'] = $this->Customer_model->get_customer($id);
      	$this->load->view('Customer/customer_detail', $data);
      }
    /*
     * Show Product
     */
    public function getCustomers()
    {
      $list = $this->Customer_model->get_customers();
      echo json_encode($list);
    }
    public function customer_list()
    {
    	$list = $this->Customer_model->get_customers();
    	$data = array();
    	$no = 0;
    	foreach ($list as $customer) {
    		$no++;
    		$row = array();
    		$row[] = $no;
        $row[] = $customer->due_date;
    		$row[] = $customer->cust_name;
    		$row[] = $customer->cust_business_name;
    		$row[] = $customer->cust_contact;
    		$row[] = $customer->total_credit;

      //add html for action
    		$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_customer('."'".$customer->cust_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
    		<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_customer('."'".$customer->cust_id."'".')"><i class="glyphicon glyphicon-trash"></i></a>
        <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Hapus" onclick="view_customer('."'".$customer->cust_id."'".')"><i class="glyphicon glyphicon-eye-open"></i></a>';

    		$data[] = $row;
    	}

    	$output = array(
        // "draw" => $_POST['draw'],
        // "recordsTotal" => $this->Store_model->count_all(),
        // "recordsFiltered" => $this->Store_model->count_filtered(),
    		"data" => $data,
    		);
    //output to json format
    	echo json_encode($output);
    }
    
    public function customerPersons($id)
    {
      $list = $this->Customer_model->get_persons($id);
      echo json_encode($list);

    } 

    public function customerDetail($id)
    {
      $list = $this->Customer_model->customerDetail($id);
      echo json_encode($list);

    }

      public function get_persons($id)
    {
      $list = $this->Customer_model->get_persons($id);
      $data = array();
      $no = 0;
      foreach ($list as $persons) {
        $no++;
        $row = array();
        $row[] = $persons->person_name;
        $row[] = $persons->person_profession;
        $row[] = $persons->contact_no;
        // $row[] = $persons->idcard;
        $row[] = '<a href="'.base_url().'uploaded/'.$persons->idcard.'" download>'.$persons->idcard.'</a>';

        $row[] = $persons->passport;


      //add html for action
        $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$persons->ap_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
        <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$persons->ap_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

        $data[] = $row;
      }

      $output = array(
        // "draw" => $_POST['draw'],
        // "recordsTotal" => $this->Store_model->count_all(),
        // "recordsFiltered" => $this->Store_model->count_filtered(),
        "data" => $data,
        );
    //output to json format
      echo json_encode($output);
    }  
    /*
     * Add Product
     */
    public function customer_add()
    {
    	$this->_validate();
    	$data = array(
        'due_date'  => $this->input->post('due_date'), 
    		'cust_name'  => $this->input->post('cust_name'), 
        'cust_contact' => $this->input->post('cust_contact'), 
        'cust_idcard'  => $this->input->post('cust_idcard'), 
        'cust_business_name' => $this->input->post('cust_business_name'), 
        'cust_business_licence' => $this->input->post('cust_business_licence'), 
        'emirates' => $this->input->post('emirates'), 
        'cust_nationality' => $this->input->post('cust_nationality'), 
        'cust_mobl' => $this->input->post('cust_mobl'), 
        'cust_location' => $this->input->post('cust_location'), 
        'cust_email' => $this->input->post('cust_email'), 
        'trn_no' => $this->input->post('trn_no'),
        // 'cust_received_amount' => $this->input->post('cust_received_amount')

        
    		);

      $licence=$this->do_upload('cust_licence');
    	$idcardcopy=$this->do_upload('cust_idcard_copy');
      $agrement=$this->do_upload('cust_agrement');
      $passport=$this->do_upload('cust_passport');

    	if($this->do_upload('cust_licence')!=FALSE){
    		$data['cust_licence']=$licence;
    	}
      if($this->do_upload('cust_idcard_copy')!=FALSE){
        $data['cust_idcard_copy']=$idcardcopy;
      }
      if($this->do_upload('cust_agrement')!=FALSE){
    		$data['cust_agrement']=$agrement;
    	}
      if($this->do_upload('cust_passport')!=FALSE){
    		$data['cust_passport']=$passport;
    	}
    	// echo json_encode($this->do_upload('cust_idcard'));
    	// echo json_encode($this->do_upload('cust_agrement'));
    	// echo json_encode($this->do_upload('cust_passport'));

    	$insert = $this->Customer_model->addCustomer($data);

    	echo json_encode(array("status" => TRUE));
    }

        /*
     * Add Product
     */
    public function person_add($id)
    {
      // $this->person_validate();
      $data = array(
        'cust_id'  => $id, 
        'person_name'  => $this->input->post('name'), 
        'person_profession'  => $this->input->post('profession'), 
        'contact_no' => $this->input->post('contact')
        );
      $idcard=$this->do_upload('idcard');
      $passport=$this->do_upload('passport');
      if($this->do_upload('idcard')!=FALSE){
        $data['idcard']=$idcard;
      }
      if($this->do_upload('passport')!=FALSE){
        $data['passport']=$passport;
      }
     
      $insert = $this->Customer_model->addPerson($data,$id);

      echo json_encode(array("status" => TRUE));
    }
    /*
     * Get Agrement
     */

    public function get_agrement($id)
    {
      $list = $this->Customer_model->get_agrement($id);
      $list2 = $this->Customer_model->get_equipments($id);
      $data = array();
      $row = array();
      $no=0;
      foreach ($list2 as $agrement) {
        $row[] = '<tr id="row'.$no.$no.'"><td><input type="text"  class="form-control" id="equipmentInserted_'.$no.'" name="equipment[]" value="'.$agrement->equipment_name.'"></td>'.
         '<td><input type="text"  class="form-control" id="rent_per_dayInserted_'.$no.'" name="rent_per_day[]" value="'.$agrement->rent_per_day.'"></td>'.
        '<td><input type="text"  class="form-control " id="rent_per_monthInserted_'.$no.'" name="rent_per_month[]" value="'.$agrement->rent_per_month.'"></td>'.
        '<td><button type="button" id="'.$no.$no.'" name="remove" class="btn btn-danger btn_remove">Delete</button></td></tr>';
       //add html for action
        // $row[] = '';
        // $data[] = $row;
      $no++;

      }

      $output = array(
        "detail" => $list,
        "equipments" => $row,
        );
    //output to json format
      echo json_encode($output);
    }

     /*
     * Update Product
     */
     public function customer_edit($id)
     {
     	$data = $this->Customer_model->get_customer($id);
      // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
     	echo json_encode($data);
     }


     /*
     * Update Product
     */
     public function person_edit($id)
     {
      $data = $this->Customer_model->get_authorizePerson($id);
      // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
      echo json_encode($data);
     }

     public function customer_update(){

    	$this->_validate();
      $data = array(
        'due_date'  => $this->input->post('due_date'), 
        'cust_name'  => $this->input->post('cust_name'), 
        'cust_contact' => $this->input->post('cust_contact'), 
        'cust_idcard'  => $this->input->post('cust_idcard'), 
        'cust_business_name' => $this->input->post('cust_business_name'), 
        'cust_business_licence' => $this->input->post('cust_business_licence'), 
        'emirates' => $this->input->post('emirates'), 
        'cust_nationality' => $this->input->post('cust_nationality'), 
        'cust_mobl' => $this->input->post('cust_mobl'), 
        'cust_location' => $this->input->post('cust_location'), 
        'cust_email' => $this->input->post('cust_email'), 
        'trn_no' => $this->input->post('trn_no'),
        // 'cust_received_amount' => $this->input->post('cust_received_amount')
        
        
        );

      $licence=$this->do_upload('cust_licence');
      $idcardcopy=$this->do_upload('cust_idcard_copy');
      $agrement=$this->do_upload('cust_agrement');
      $passport=$this->do_upload('cust_passport');

      if($this->do_upload('cust_licence')!=FALSE){
        $data['cust_licence']=$licence;
      }
      if($this->do_upload('cust_idcard_copy')!=FALSE){
        $data['cust_idcard_copy']=$idcardcopy;
      }
      if($this->do_upload('cust_agrement')!=FALSE){
        $data['cust_agrement']=$agrement;
      }
      if($this->do_upload('cust_passport')!=FALSE){
        $data['cust_passport']=$passport;
      }
     	$this->Customer_model->updateCustomer($this->input->post('cust_id'), $data);
     	echo json_encode(array("status" => TRUE));
     }

     public function person_update(){

      // $this->_person_validate();
      $data = array(
        'person_name'  => $this->input->post('name'), 
        'person_profession'  => $this->input->post('profession'), 
        'contact_no' => $this->input->post('contact')
        );
      $idcard=$this->do_upload('idcard');
      $passport=$this->do_upload('passport');
      if($this->do_upload('idcard')!=FALSE){
        $data['idcard']=$idcard;
      }
      if($this->do_upload('passport')!=FALSE){
        $data['passport']=$passport;
      }

      $this->Customer_model->updatePerson($this->input->post('ap_id'), $data);
      echo json_encode(array("status" => TRUE));
     }
/// update equipment list........
     public function equipment_update($id){


      $data = array(
        'business_name'  => $this->input->post('business_name'), 
        'tele_no'  => $this->input->post('tele_no'), 
        'mob_no' => $this->input->post('mob_no'), 
        'lice_no' => $this->input->post('lice_no'), 
        'idcard_no' => $this->input->post('idcard_no'), 
        'terms_condition' => $this->input->post('terms_condition')
        );

      $this->Customer_model->customerAgrement($id, $data);
      echo json_encode(array("status" => TRUE));
    }

  /*
     * Delete Product
   */
  public function customer_delete($id)
  {
  	$this->Customer_model->delete_customer($id);
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
