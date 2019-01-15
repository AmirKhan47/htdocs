<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {
  function Store() {
    parent::__construct();

    if ($this->session->logged_in != 1) {
      redirect('login');
    }
    $this->load->library('form_validation');
    $this->load->helper('form');
  }
  /*
     * Store Products.
     */

  function index() {
    $data['store'] = TRUE;
    $data['title'] = "Store";
    $data['sub_title'] = "Manage Your Store Material";
    
    $data['prdoduct_class'] = $this->Store_model->get_class();
    $data['supplier'] = $this->Supplier_model->get_suppliers();
    $this->load->view('Store/store', $data);
  }
    /*
     * Damage Products
     */

    function damageProducts() {
      $data['store'] = TRUE;
      $data['title'] = "Store";
      $data['sub_title'] = "Manage Your Damage Products";

      $data['prdoduct_name'] = $this->Store_model->get_rental_products();
      $this->load->view('Store/damageProducts', $data);
    }
    
      /*
     * View Damage Product
   */
      public function product_view($id)
      {
        $data['store'] = TRUE;
        $data['title'] = "Store";
        $data['sub_title'] = "Manage Damage Products Details";

        $data['prdoduct_name'] = $this->Store_model->get_sale_products();
        // $data['detail'] = $this->Store_model->get_detail_damage_product($id);
        $this->load->view('Store/viewdamageProduct', $data);
      }
    /*
     * Show Product
     */

    public function getProducts()
    {
      $list = $this->Store_model->get_rent_products();
      echo json_encode($list);
    }

    public function getSaleProducts()
    {
      $list = $this->Store_model->get_sale_products();
      echo json_encode($list);
    }

    public function getAllProducts()
    {
      $list = $this->Store_model->get_all_products();
      echo json_encode($list);
    }

    public function getProductDetail($id){
      
      $list = $this->Store_model->getProductDetail($id);
      echo json_encode($list);

    }

    public function product_list()
    {
      $list = $this->Store_model->get_products();
      $data = array();
      // $no = $_POST['start'];
      $no = 0;
      foreach ($list as $product) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = $product->prd_name;
        $row[] = $product->sup_name;
        $row[] = $product->prd_category;
        if($product->picture){
        $row[] = '<img class="thumbnail" src="'.base_url().'/uploaded/'.$product->picture.'" alt="img" width="200" height="200">';  
        }else{
          $row[]='';
        }
        $row[] = $product->prd_qty;
        $row[] = $product->prd_cost_price;

      //add html for action
        $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_product('."'".$product->prd_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
        <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_product('."'".$product->prd_id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

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
     * Show Damage Product
     */

    public function damage_product_list()
    {
      $list = $this->Store_model->get_damage_products();
      $data = array();
      // $no = $_POST['start'];
      $no=1;
      foreach ($list as $product) {
        $no++;
        $row = array();
        // $row[] = $no;
        $row[] = $product->date;
        $row[] = $product->prd_name;
        $row[] = $product->description;
        $row[] = $product->prd_unique_id;
        $row[] = $product->prd_qty;

      //add html for action
        $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_product('."'".$product->dp_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
        <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_product('."'".$product->dp_id."'".')"><i class="glyphicon glyphicon-trash"></i></a>
        <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Hapus" onclick="view_product('."'".$product->dp_id."'".')"><i class="glyphicon glyphicon-eye-open"></i></a>
        <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Hapus" onclick="update_status('."'".$product->dp_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';

        $data[] = $row;
      }

      $output = array(
        // "draw" => $_POST['draw'],
        // "recordsTotal" => $this->Store_model->count_all_damage(),
        // "recordsFiltered" => $this->Store_model->count_filtered_damage(),
        "data" => $data
        );
    //output to json format
      echo json_encode($output);
    }
    
            /*
     * Show Damage Product
     */

    public function view_material_list($id)
    {
      $list = $this->Store_model->get_material_list($id);
      $data = array();
      // $no = $_POST['start'];
      $no=1;
      foreach ($list as $product) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = $product->date;
        $row[] = $product->prd_name;
        $row[] = $product->mat_qty;
        $row[] = $product->mat_price;

      //add html for action
        $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_damage_product_detail('."'".$product->ddp_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

        $data[] = $row;
      }

      $output = array(
        // "draw" => $_POST['draw'],
        // "recordsTotal" => $this->Store_model->count_all_damage(),
        // "recordsFiltered" => $this->Store_model->count_filtered_damage(),
        "data" => $data
        );
    //output to json format
      echo json_encode($output);
    }
    

    /*
     * Add Product
     */
    public function product_add()
    {
      $this->_validate();
      $data = array(
        // 'prd_code'  => $this->input->post('prd_code'), 
        'sup_id'  => $this->input->post('supplier'), 
        'prd_name'  => $this->input->post('prd_name'), 
        // 'prd_brand' => $this->input->post('prd_brand'), 
        // 'prd_model' => $this->input->post('prd_model'), 
        // 'prd_size' => $this->input->post('prd_size'), 
        // 'prd_color' => $this->input->post('prd_color'), 
        'unit_cost' => $this->input->post('unit_cost'), 
        'prd_qty' => $this->input->post('prd_qty'), 
        'prd_category' => $this->input->post('prd_category'), 
        'prd_cost_price' => $this->input->post('prd_cost_price'), 
        'prd_sale_price' => $this->input->post('prd_sale_price'), 
        'prd_rent_per_day' => $this->input->post('prd_rent_per_day'), 
        'prd_rent_per_month' => $this->input->post('prd_rent_per_month'), 
        'prd_class' => $this->input->post('prd_class')
        );
      
      $picture=$this->do_upload('picture');
      if($this->do_upload('picture')!=FALSE){
        $data['picture']=$picture;
      }
      // echo json_encode($picture);
      $insert = $this->Store_model->addProduct($data);
      echo json_encode(array("status" => TRUE));
    }
    
    public function damage_product_status_update()
    {
      $this->Store_model->damage_product_update();
      echo json_encode(array("status" => TRUE));
    }

    /*
     * Damage Add Product
     */
    public function damage_product_add()
    {
      $this->_validate_damage();
      $data = array(
        'date'  => $this->input->post('date'),  
        'prd_id' => $this->input->post('prd_name'),
        'prd_unique_id' => $this->input->post('unique_id'),
        'prd_qty' => $this->input->post('prd_qty'),
        'description' => $this->input->post('description'),
        );
      $insert = $this->Store_model->addDamageProduct($data,$this->input->post('prd_qty'),$this->input->post('prd_name'));
      echo json_encode(array("status" => TRUE));
    }

    /*
     * Damage Add Material
     */
    public function damage_product_detail_add()
    {
      $this->_validate_damage_detail();
      $data = array(
        'date'  => $this->input->post('date'),  
        'dp_id' => $this->uri->segment(3),
        'mat_id' => $this->input->post('prd_name'),
        'mat_qty' => $this->input->post('prd_qty'),
        'mat_price' => $this->input->post('prd_price')
        );
      $insert = $this->Store_model->addDamageProductMaterial($data,$this->input->post('prd_cost'),$this->input->post('prd_name'),$this->input->post('prd_qty'));
      echo json_encode(array("status" => TRUE));
    }
     /*
     * Update Product
     */
     public function product_edit($id)
     {
      $data = $this->Store_model->get_by_id($id);
      // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
      echo json_encode($data);
    }
    public function damage_product_edit($id)
    {
      $data = $this->Store_model->get_by_id_damage($id);
      $data->date = ($data->date == '0000-00-00') ? '' : $data->date; // if 0000-00-00 set tu empty for datepicker compatibility
      echo json_encode($data);
    }
    public function product_uniqueids($id)
    {
       $data =$this->Store_model->get_product_uniqueids($id);
       echo json_encode($data);
    }

    public function product_qty($id)
    {
       $data =$this->Store_model->get_product_qty($id);
       echo json_encode($data);
    }
    public function product_update(){
    
      $this->_validate();
  
        $data = array(
        // 'prd_code'  => $this->input->post('prd_code'), 
        'sup_id'  => $this->input->post('supplier'), 
        'prd_name'  => $this->input->post('prd_name'), 
        // 'prd_brand' => $this->input->post('prd_brand'), 
        // 'prd_model' => $this->input->post('prd_model'), 
        // 'prd_size' => $this->input->post('prd_size'), 
        // 'prd_color' => $this->input->post('prd_color'), 
        'unit_cost' => $this->input->post('unit_cost'), 
        'prd_qty' => $this->input->post('prd_qty'), 
        'prd_category' => $this->input->post('prd_category'), 
        'prd_cost_price' => $this->input->post('prd_cost_price'), 
        'prd_sale_price' => $this->input->post('prd_sale_price'), 
        'prd_rent_per_day' => $this->input->post('prd_rent_per_day'), 
        'prd_rent_per_month' => $this->input->post('prd_rent_per_month'), 
        'prd_class' => $this->input->post('prd_class')
        );
      $picture=$this->do_upload('picture');

      if($this->do_upload('picture')!=FALSE){
        $data['picture']=$picture;
      }
      // echo json_encode($picture);
      $this->Store_model->updateProduct(array('prd_id' => $this->input->post('prd_id')), $data);
      echo json_encode(array("status" => TRUE));
    }

    public function damage_product_update()
    {
      $this->_validate_damage_detail();
      $data = array(
        'date'  => $this->input->post('date'),  
        // 'dp_id' => $this->uri->segment(3),
        'prd_id' => $this->input->post('prd_name'),
        'prd_qty' => $this->input->post('prd_qty'),
        'prd_unique_id' => $this->input->post('unique_id'),
        'description' => $this->input->post('description')
        );
      // echo json_encode($this->input->post('dp_id'));
      $this->Store_model->updateDamageProduct($this->input->post('dp_id'),$data);
      echo json_encode(array("status" => TRUE));
    }
  /*
     * Delete Product
   */
  public function product_delete($id)
  {
    $this->Store_model->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
  }

  /*
     * Delete Product
   */
  public function damage_product_detail_delete($id)
  {
    $this->Store_model->delete_damage_product_detail($id);
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

      if($this->input->post('prd_name') == '')
      {
        $data['inputerror'][] = 'prd_name';
        $data['error_string'][] = 'Product name is required';
        $data['status'] = FALSE;
      }

      if($this->input->post('prd_category') == '')
      {
        $data['inputerror'][] = 'prd_category';
        $data['error_string'][] = 'Product Category is required';
        $data['status'] = FALSE;
      }

      if($data['status'] === FALSE)
      {
        echo json_encode($data);
        exit();
      }
    }  

      /*
    Damage Validation 
   */
    private function _validate_damage()
    {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;

      if($this->input->post('prd_name') == '')
      {
        $data['inputerror'][] = 'prd_name';
        $data['error_string'][] = 'Product name is required';
        $data['status'] = FALSE;
      }
      if($this->input->post('date') == '')
      {
        $data['inputerror'][] = 'date';
        $data['error_string'][] = 'Date is required';
        $data['status'] = FALSE;
      }

      if($data['status'] === FALSE)
      {
        echo json_encode($data);
        exit();
      }
    }

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

      /*
    Damage Validation 
   */
    private function _validate_damage_detail()
    {
      $data = array();
      $data['error_string'] = array();
      $data['inputerror'] = array();
      $data['status'] = TRUE;

      if($this->input->post('prd_name') == '')
      {
        $data['inputerror'][] = 'prd_name';
        $data['error_string'][] = 'Product name is required';
        $data['status'] = FALSE;
      }
      if($this->input->post('date') == '')
      {
        $data['inputerror'][] = 'date';
        $data['error_string'][] = 'Date is required';
        $data['status'] = FALSE;
      }

      if($this->input->post('prd_qty') == '0')
      {
        $data['inputerror'][] = 'prd_qty';
        $data['error_string'][] = 'Quantity Should Greater Then 0';
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
