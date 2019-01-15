<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/admin/products_model','products');
    }
    public function index()
    {
        $data['result']=$this->products->user_count();
        $data['active']='manage_products';
        $data['page']='products/manage_products';
        $this->load->view('backend/admin/layout/default',$data);
    }
    public function get_products()
    {
        $list = $this->products->get_products();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            $row[] = '<img src="'.Website_Assets.'images/'.$value['product_image_name'].'" class="img-responsive" style="width:212px;height:212px;">';
            $row[] = $value['product_name'];
            $row[] = $value['product_price'];
            $row[] = $value['product_quantity'];
            $row[] = $value['type_name'];
            $row[] = $value['category_name'];
            $row[] = '
                        <a href="'.AURL.'products/edit_product/'.$value['product_id'].'"><span class="m-badge  m-badge--primary m-badge--wide">Edit</span></a>
                        <a href="'.AURL.'products/add_product_images/'.$value['product_id'].'"><span class="m-badge  m-badge--primary m-badge--wide">Update Images</span></a>
                        <a href="'.AURL.'products/delete_product/'.$value['product_id'].'"><span class="m-badge  m-badge--danger m-badge--wide" onclick="return confirm(\'Are You sure you want to delete the User?\');"><i class="fa fa-trash"></i>Delete</span></a>
                    ';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->products->user_count(),
            "recordsFiltered" => $this->products->user_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function add_product()
    {
        if ($this->input->post('submit'))
        {
            $config['upload_path']          = './assets/website/images/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $this->load->library('upload', $config);
            // $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('product_image_name'))
            {
                // $data = array('error' => $this->upload->display_errors());
                $this->session->flashdata('error',$this->upload->display_errors());
                $data['error']=$this->upload->display_errors();
                $data['active']='add_product';
                $data['page']='products/add_product';
                $this->load->view('backend/admin/layout/default',$data);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $product_image_name=$data['upload_data']['file_name'];
                // $this->load->library('image_lib');
                // $config['image_library']    = 'GD2';
                // $config['source_image']     = './assets/website/images/' . $data['upload_data']['file_name'];
                // $config['maintain_ratio']   = TRUE;
                // $config['master_dim']       = 'auto';
                // // $config['quality']          = 90;
                // $config['width']            = 212;
                // $config['height']           = 424;
                // $config['new_image']        = './assets/website/images/' . $data['upload_data']['file_name'];
                // $this->image_lib->initialize($config);
                // $this->image_lib->resize();
                $data = array(
                    'product_name'          =>$this->input->post('product_name')
                );
                $product_id=$this->common->insert_into_table('products',$data);
                $product_image = array(
                    'product_id'            =>$product_id,
                    'product_image_name'    =>$product_image_name
                );
                $product_image_id=$this->common->insert_into_table('product_images',$product_image);
                $product_price = array(
                    'product_id'            =>$product_id,
                    'product_price'         =>$this->input->post('product_price')
                );
                $product_price_id=$this->common->insert_into_table('product_prices',$product_price);
                $product_quantity = array(
                    'product_id'            =>$product_id,
                    'product_quantity'         =>$this->input->post('product_quantity')
                );
                $product_quantity_id=$this->common->insert_into_table('product_quantities',$product_quantity);
                $product_type = array(
                    'product_id'            =>$product_id,
                    'type_id'               =>$this->input->post('type_id')
                );
                $product_type_id=$this->common->insert_into_table('product_types',$product_type);
                $product_category = array(
                    'product_id'            =>$product_id,
                    'category_id'           =>$this->input->post('category_id')
                );
                $product_category_id=$this->common->insert_into_table('product_categories',$product_category);
                $product_detail = array(
                    'product_id'            =>$product_id,
                    'product_description'   =>$this->input->post('product_description'),
                    'product_detail'        =>$this->input->post('product_detail')
                );
                $product_detail_id=$this->common->insert_into_table('product_details',$product_detail);
                if($product_detail_id)
                {
                    $data['error']='';
                    $this->session->flashdata();
                    redirect(AURL.'products','refresh');
                }
                else
                {
                    $data['error']='';
                    $this->session->flashdata();
                    redirect(AURL.'products/add_product','refresh');
                }
            }
        }
        else
        {
            $data['types']=$this->common->select_array_records('types');
            $data['categories']=$this->common->select_array_records('categories');
            $data['error']='';
            $data['active']='add_product';
            $data['page']='products/add_product';
            $this->load->view('backend/admin/layout/default',$data);
        }
    }
    public function edit_product($product_id)
    {
        $data['types']=$this->common->select_array_records('types');
        $data['categories']=$this->common->select_array_records('categories');
        $data['products']=$this->common->select_single_records('products',$where=array('product_id'=>$product_id));
        $data['product_categories']=$this->common->select_single_records('product_categories',$where=array('product_id'=>$product_id));
        $data['category']=$this->common->select_single_records('categories',$where=array('category_id'=>$data['product_categories']['category_id']));
        $data['product_details']=$this->common->select_single_records('product_details',$where=array('product_id'=>$product_id));
        $data['product_images']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
        $data['product_prices']=$this->common->select_single_records('product_prices',$where=array('product_id'=>$product_id));
        $data['product_quantities']=$this->common->select_single_records('product_quantities',$where=array('product_id'=>$product_id));
        $data['product_types']=$this->common->select_single_records('product_types',$where=array('product_id'=>$product_id));
        $data['type']=$this->common->select_single_records('types',$where=array('type_id'=>$data['product_types']['type_id']));
        $data['error']='';
        $data['active']='manage_products';
        $data['page']='products/edit_product';
        $this->load->view('backend/admin/layout/default',$data);
    }
    public function update_product($product_id)
    {
        $image_name=$this->input->post('product_image_name');
        if($_FILES['product_image_name']['name'])
        {
            echo "string";exit();
            $config['upload_path']          = './assets/website/images/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $this->load->library('upload', $config);
            // $this->upload->initialize($config);
            if(!$this->upload->do_upload('product_image_name'))
            {
                // $data = array('error' => $this->upload->display_errors());
                $data['products']=$this->common->select_single_records('products',$where=array('product_id'=>$product_id));
                $this->session->flashdata('error',$this->upload->display_errors());
                $data['error']=$this->upload->display_errors();
                $data['active']='manage_products';
                $data['page']='products/edit_product';
                $this->load->view('backend/admin/layout/default',$data);
            }
            else
            {
                $data['delete_record'] = $this->common->select_single_records('products',$where=array('product_id'=>$product_id));
                $file_path = './assets/website/images/'.$data['delete_record']['product_image_name'];
                if(file_exists($file_path))
                {
                    unlink($file_path);
                }
                $data = array('upload_data' => $this->upload->data());
                // $this->load->library('image_lib');
                // $config['image_library']    = 'GD2';
                // $config['source_image']     = './assets/website/images/' . $data['upload_data']['file_name'];
                // $config['maintain_ratio']   = TRUE;
                // $config['master_dim']       = 'auto';
                // // $config['quality']          = 90;
                // $config['width']            = 212;
                // $config['height']           = 424;
                // $config['new_image']        = './assets/website/images/' . $data['upload_data']['file_name'];
                // $this->image_lib->initialize($config);
                // $this->image_lib->resize();
                $image_name=$data['upload_data']['file_name'];
            }
        }
        $data = array(
            'product_name'  =>$this->input->post('product_name')
        );
        $result=$this->common->update_table('products',$where=array('product_id'=>$product_id),$data);
        $product_image = array(
            'product_image_name'    =>$image_name
        );
        $result=$this->common->update_table('product_images',$where=array('product_id'=>$product_id),$product_image);
        $product_price = array(
            'product_price'         =>$this->input->post('product_price')
        );
        $result=$this->common->update_table('product_prices',$where=array('product_id'=>$product_id),$product_price);
        $product_quantity = array(
            'product_quantity'         =>$this->input->post('product_quantity')
        );
        $result=$this->common->update_table('product_quantities',$where=array('product_id'=>$product_id),$product_quantity);
        $product_type = array(
            'type_id'               =>$this->input->post('type_id')
        );
        $result=$this->common->update_table('product_types',$where=array('product_id'=>$product_id),$product_type);
        $product_category = array(
            'category_id'           =>$this->input->post('category_id')
        );
        $result=$this->common->update_table('product_categories',$where=array('product_id'=>$product_id),$product_category);
        $product_detail = array(
            'product_description'   =>$this->input->post('product_description'),
            'product_detail'        =>$this->input->post('product_detail')
        );
        $result=$this->common->update_table('product_details',$where=array('product_id'=>$product_id),$product_detail);
        if($result)
        {
            $this->session->flashdata();
            redirect(AURL.'products','refresh');
        }
        else 
        {
            $this->session->flashdata();
            redirect(AURL.'products','refresh');
        }
    }
    public function add_product_images($product_id=NULL)
    {
        if($this->input->post('update'))
        {
            $image_name1=$this->input->post('product_image1_name');
            if($_FILES['product_image1_name']['name'])
            {
                $config['upload_path']          = './assets/website/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->load->library('upload', $config);
                // $this->upload->initialize($config);
                if(!$this->upload->do_upload('product_image1_name'))
                {
                    // $data = array('error' => $this->upload->display_errors());
                    $data['products']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $this->session->flashdata('error',$this->upload->display_errors());
                    $data['error']=$this->upload->display_errors();
                    $data['active']='manage_products';
                    $data['page']='products/add_product_images';
                    $this->load->view('backend/admin/layout/default',$data);
                }
                else
                {
                    $data['delete_record']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $file_path='./assets/website/images/'.$data['delete_record']['product_image1_name'];
                    if(file_exists($file_path))
                    {
                        unlink($file_path);
                    }
                    $data = array('upload_data' => $this->upload->data());
                    // $this->load->library('image_lib');
                    // $config['image_library']    = 'GD2';
                    // $config['source_image']     = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $config['maintain_ratio']   = TRUE;
                    // $config['master_dim']       = 'auto';
                    // // $config['quality']          = 90;
                    // $config['width']            = 212;
                    // $config['height']           = 424;
                    // $config['new_image']        = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $this->image_lib->initialize($config);
                    // $this->image_lib->resize();
                    $image_name1=$data['upload_data']['file_name'];
                }
            }
            $data = array(
                'product_image1_name'=>$image_name1,
                'modified_at'       =>date('Y-m-d H:m:s')
            );
            $result=$this->common->update_table('product_images',$where = array('product_id'=>$product_id),$data);
            $image_name2=$this->input->post('product_image2_name');
            if($_FILES['product_image2_name']['name'])
            {
                $config['upload_path']          = './assets/website/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->load->library('upload', $config);
                // $this->upload->initialize($config);
                if(!$this->upload->do_upload('product_image2_name'))
                {
                    // $data = array('error' => $this->upload->display_errors());
                    $data['products']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $this->session->flashdata('error',$this->upload->display_errors());
                    $data['error']=$this->upload->display_errors();
                    $data['active']='manage_products';
                    $data['page']='products/add_product_images';
                    $this->load->view('backend/admin/layout/default',$data);
                }
                else
                {
                    $data['delete_record']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $file_path='./assets/website/images/'.$data['delete_record']['product_image2_name'];
                    if(file_exists($file_path))
                    {
                        unlink($file_path);
                    }
                    $data = array('upload_data' => $this->upload->data());
                    // $this->load->library('image_lib');
                    // $config['image_library']    = 'GD2';
                    // $config['source_image']     = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $config['maintain_ratio']   = TRUE;
                    // $config['master_dim']       = 'auto';
                    // // $config['quality']          = 90;
                    // $config['width']            = 212;
                    // $config['height']           = 424;
                    // $config['new_image']        = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $this->image_lib->initialize($config);
                    // $this->image_lib->resize();
                    $image_name2=$data['upload_data']['file_name'];
                }
            }
            $data = array(
                'product_image2_name'=>$image_name2,
                'modified_at'       =>date('Y-m-d H:m:s')
            );
            $result=$this->common->update_table('product_images',$where = array('product_id'=>$product_id),$data);
            $image_name3=$this->input->post('product_image3_name');
            if($_FILES['product_image3_name']['name'])
            {
                $config['upload_path']          = './assets/website/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->load->library('upload', $config);
                // $this->upload->initialize($config);
                if(!$this->upload->do_upload('product_image3_name'))
                {
                    // $data = array('error' => $this->upload->display_errors());
                    $data['products']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $this->session->flashdata('error',$this->upload->display_errors());
                    $data['error']=$this->upload->display_errors();
                    $data['active']='manage_products';
                    $data['page']='products/add_product_images';
                    $this->load->view('backend/admin/layout/default',$data);
                }
                else
                {
                    $data['delete_record']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $file_path='./assets/website/images/'.$data['delete_record']['product_image3_name'];
                    if(file_exists($file_path))
                    {
                        unlink($file_path);
                    }
                    $data = array('upload_data' => $this->upload->data());
                    // $this->load->library('image_lib');
                    // $config['image_library']    = 'GD2';
                    // $config['source_image']     = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $config['maintain_ratio']   = TRUE;
                    // $config['master_dim']       = 'auto';
                    // // $config['quality']          = 90;
                    // $config['width']            = 212;
                    // $config['height']           = 424;
                    // $config['new_image']        = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $this->image_lib->initialize($config);
                    // $this->image_lib->resize();
                    $image_name3=$data['upload_data']['file_name'];
                }
            }
            $data = array(
                'product_image3_name'=>$image_name3,
                'modified_at'       =>date('Y-m-d H:m:s')
            );
            $result=$this->common->update_table('product_images',$where = array('product_id'=>$product_id),$data);
            $image_name4=$this->input->post('product_image4_name');
            if($_FILES['product_image4_name']['name'])
            {
                $config['upload_path']          = './assets/website/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->load->library('upload', $config);
                // $this->upload->initialize($config);
                if(!$this->upload->do_upload('product_image4_name'))
                {
                    // $data = array('error' => $this->upload->display_errors());
                    $data['products']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $this->session->flashdata('error',$this->upload->display_errors());
                    $data['error']=$this->upload->display_errors();
                    $data['active']='manage_products';
                    $data['page']='products/add_product_images';
                    $this->load->view('backend/admin/layout/default',$data);
                }
                else
                {
                    $data['delete_record']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $file_path='./assets/website/images/'.$data['delete_record']['product_image4_name'];
                    if(file_exists($file_path))
                    {
                        unlink($file_path);
                    }
                    $data = array('upload_data' => $this->upload->data());
                    // $this->load->library('image_lib');
                    // $config['image_library']    = 'GD2';
                    // $config['source_image']     = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $config['maintain_ratio']   = TRUE;
                    // $config['master_dim']       = 'auto';
                    // // $config['quality']          = 90;
                    // $config['width']            = 212;
                    // $config['height']           = 424;
                    // $config['new_image']        = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $this->image_lib->initialize($config);
                    // $this->image_lib->resize();
                    $image_name4=$data['upload_data']['file_name'];
                }
            }
            $data = array(
                'product_image4_name'=>$image_name4,
                'modified_at'       =>date('Y-m-d H:m:s')
            );
            $result=$this->common->update_table('product_images',$where = array('product_id'=>$product_id),$data);
            $image_name5=$this->input->post('product_image5_name');
            if($_FILES['product_image5_name']['name'])
            {
                $config['upload_path']          = './assets/website/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->load->library('upload', $config);
                // $this->upload->initialize($config);
                if(!$this->upload->do_upload('product_image5_name'))
                {
                    // $data = array('error' => $this->upload->display_errors());
                    $data['products']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $this->session->flashdata('error',$this->upload->display_errors());
                    $data['error']=$this->upload->display_errors();
                    $data['active']='manage_products';
                    $data['page']='products/add_product_images';
                    $this->load->view('backend/admin/layout/default',$data);
                }
                else
                {
                    $data['delete_record']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $file_path='./assets/website/images/'.$data['delete_record']['product_image5_name'];
                    if(file_exists($file_path))
                    {
                        unlink($file_path);
                    }
                    $data = array('upload_data' => $this->upload->data());
                    // $this->load->library('image_lib');
                    // $config['image_library']    = 'GD2';
                    // $config['source_image']     = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $config['maintain_ratio']   = TRUE;
                    // $config['master_dim']       = 'auto';
                    // // $config['quality']          = 90;
                    // $config['width']            = 212;
                    // $config['height']           = 424;
                    // $config['new_image']        = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $this->image_lib->initialize($config);
                    // $this->image_lib->resize();
                    $image_name5=$data['upload_data']['file_name'];
                }
            }
            $data = array(
                'product_image5_name'=>$image_name5,
                'modified_at'       =>date('Y-m-d H:m:s')
            );
            $result=$this->common->update_table('product_images',$where = array('product_id'=>$product_id),$data);
            $image_name6=$this->input->post('product_image6_name');
            if($_FILES['product_image6_name']['name'])
            {
                $config['upload_path']          = './assets/website/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->load->library('upload', $config);
                // $this->upload->initialize($config);
                if(!$this->upload->do_upload('product_image6_name'))
                {
                    // $data = array('error' => $this->upload->display_errors());
                    $data['products']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $this->session->flashdata('error',$this->upload->display_errors());
                    $data['error']=$this->upload->display_errors();
                    $data['active']='manage_products';
                    $data['page']='products/add_product_images';
                    $this->load->view('backend/admin/layout/default',$data);
                }
                else
                {
                    $data['delete_record']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $file_path='./assets/website/images/'.$data['delete_record']['product_image6_name'];
                    if(file_exists($file_path))
                    {
                        unlink($file_path);
                    }
                    $data = array('upload_data' => $this->upload->data());
                    // $this->load->library('image_lib');
                    // $config['image_library']    = 'GD2';
                    // $config['source_image']     = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $config['maintain_ratio']   = TRUE;
                    // $config['master_dim']       = 'auto';
                    // // $config['quality']          = 90;
                    // $config['width']            = 212;
                    // $config['height']           = 424;
                    // $config['new_image']        = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $this->image_lib->initialize($config);
                    // $this->image_lib->resize();
                    $image_name6=$data['upload_data']['file_name'];
                }
            }
            $data = array(
                'product_image6_name'=>$image_name6,
                'modified_at'       =>date('Y-m-d H:m:s')
            );
            $result=$this->common->update_table('product_images',$where = array('product_id'=>$product_id),$data);
            $image_name7=$this->input->post('product_image7_name');
            if($_FILES['product_image7_name']['name'])
            {
                $config['upload_path']          = './assets/website/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->load->library('upload', $config);
                // $this->upload->initialize($config);
                if(!$this->upload->do_upload('product_image7_name'))
                {
                    // $data = array('error' => $this->upload->display_errors());
                    $data['products']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $this->session->flashdata('error',$this->upload->display_errors());
                    $data['error']=$this->upload->display_errors();
                    $data['active']='manage_products';
                    $data['page']='products/add_product_images';
                    $this->load->view('backend/admin/layout/default',$data);
                }
                else
                {
                    $data['delete_record']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $file_path='./assets/website/images/'.$data['delete_record']['product_image7_name'];
                    if(file_exists($file_path))
                    {
                        unlink($file_path);
                    }
                    $data = array('upload_data' => $this->upload->data());
                    // $this->load->library('image_lib');
                    // $config['image_library']    = 'GD2';
                    // $config['source_image']     = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $config['maintain_ratio']   = TRUE;
                    // $config['master_dim']       = 'auto';
                    // // $config['quality']          = 90;
                    // $config['width']            = 212;
                    // $config['height']           = 424;
                    // $config['new_image']        = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $this->image_lib->initialize($config);
                    // $this->image_lib->resize();
                    $image_name7=$data['upload_data']['file_name'];
                }
            }
            $data = array(
                'product_image7_name'=>$image_name7,
                'modified_at'       =>date('Y-m-d H:m:s')
            );
            $result=$this->common->update_table('product_images',$where = array('product_id'=>$product_id),$data);
            $image_name8=$this->input->post('product_image8_name');
            if($_FILES['product_image8_name']['name'])
            {
                $config['upload_path']          = './assets/website/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->load->library('upload', $config);
                // $this->upload->initialize($config);
                if(!$this->upload->do_upload('product_image8_name'))
                {
                    // $data = array('error' => $this->upload->display_errors());
                    $data['products']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $this->session->flashdata('error',$this->upload->display_errors());
                    $data['error']=$this->upload->display_errors();
                    $data['active']='manage_products';
                    $data['page']='products/add_product_images';
                    $this->load->view('backend/admin/layout/default',$data);
                }
                else
                {
                    $data['delete_record']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $file_path='./assets/website/images/'.$data['delete_record']['product_image8_name'];
                    if(file_exists($file_path))
                    {
                        unlink($file_path);
                    }
                    $data = array('upload_data' => $this->upload->data());
                    // $this->load->library('image_lib');
                    // $config['image_library']    = 'GD2';
                    // $config['source_image']     = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $config['maintain_ratio']   = TRUE;
                    // $config['master_dim']       = 'auto';
                    // // $config['quality']          = 90;
                    // $config['width']            = 212;
                    // $config['height']           = 424;
                    // $config['new_image']        = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $this->image_lib->initialize($config);
                    // $this->image_lib->resize();
                    $image_name8=$data['upload_data']['file_name'];
                }
            }
            $data = array(
                'product_image8_name'=>$image_name8,
                'modified_at'       =>date('Y-m-d H:m:s')
            );
            $result=$this->common->update_table('product_images',$where = array('product_id'=>$product_id),$data);
            $image_name9=$this->input->post('product_image9_name');
            if($_FILES['product_image9_name']['name'])
            {
                $config['upload_path']          = './assets/website/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->load->library('upload', $config);
                // $this->upload->initialize($config);
                if(!$this->upload->do_upload('product_image9_name'))
                {
                    // $data = array('error' => $this->upload->display_errors());
                    $data['products']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $this->session->flashdata('error',$this->upload->display_errors());
                    $data['error']=$this->upload->display_errors();
                    $data['active']='manage_products';
                    $data['page']='products/add_product_images';
                    $this->load->view('backend/admin/layout/default',$data);
                }
                else
                {
                    $data['delete_record']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                    $file_path='./assets/website/images/'.$data['delete_record']['product_image9_name'];
                    if(file_exists($file_path))
                    {
                        unlink($file_path);
                    }
                    $data = array('upload_data' => $this->upload->data());
                    // $this->load->library('image_lib');
                    // $config['image_library']    = 'GD2';
                    // $config['source_image']     = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $config['maintain_ratio']   = TRUE;
                    // $config['master_dim']       = 'auto';
                    // // $config['quality']          = 90;
                    // $config['width']            = 212;
                    // $config['height']           = 424;
                    // $config['new_image']        = './assets/website/images/' . $data['upload_data']['file_name'];
                    // $this->image_lib->initialize($config);
                    // $this->image_lib->resize();
                    $image_name9=$data['upload_data']['file_name'];
                }
            }
            $data = array(
                'product_image9_name'=>$image_name9,
                'modified_at'       =>date('Y-m-d H:m:s')
            );
            $result9=$this->common->update_table('product_images',$where = array('product_id'=>$product_id),$data);
            if($result9)
            {
                $this->session->flashdata();
                redirect(AURL.'products','refresh');
            }
            else
            {
                $this->session->flashdata();
                $data['products']=$this->common->select_single_records('product_images',$where=array('product_id'=>$product_id));
                $data['error']='';
                $data['active']='manage_products';
                $data['page']='products/add_product_images';
                $this->load->view('backend/admin/layout/default',$data);
            }
        }
        else 
        {
            $data['product_images']=$this->common->select_array_records('product_images',$where=array('product_id'=>$product_id));
            if(count($data['product_images'])<10)
            {
                $product_image_id=$this->common->insert_into_table('product_images',$data=array('product_id'=>$product_id));
                $product_image_id=$this->common->insert_into_table('product_images',$data=array('product_id'=>$product_id));
                $product_image_id=$this->common->insert_into_table('product_images',$data=array('product_id'=>$product_id));
                $product_image_id=$this->common->insert_into_table('product_images',$data=array('product_id'=>$product_id));
                $product_image_id=$this->common->insert_into_table('product_images',$data=array('product_id'=>$product_id));
                $product_image_id=$this->common->insert_into_table('product_images',$data=array('product_id'=>$product_id));
                $product_image_id=$this->common->insert_into_table('product_images',$data=array('product_id'=>$product_id));
                $product_image_id=$this->common->insert_into_table('product_images',$data=array('product_id'=>$product_id));
                $product_image_id=$this->common->insert_into_table('product_images',$data=array('product_id'=>$product_id));
            }
            $data['error']='';
            $data['active']='manage_products';
            $data['page']='products/add_product_images';
            $this->load->view('backend/admin/layout/default',$data);
        }
    }
    public function add_product_type()
    {
        if ($this->input->post('submit'))
        {
            $data = array(
                'type_name'       =>$this->input->post('type_name')
            );
            $type_id=$this->common->insert_into_table('types',$data);
            if($type_id)
            {
                $this->session->flashdata();
                redirect(AURL.'products/add_product','refresh');
            }
            else
            {
                echo "Error! Failed To Insert Data";
            }
        }
        else
        {
            $data['error']='';
            $data['active']='add_product_type';
            $data['page']='products/add_product_type';
            $this->load->view('backend/admin/layout/default',$data);
        }
    }
    public function add_product_category()
    {
        if ($this->input->post('submit'))
        {
            $data = array(
                'category_name'       =>$this->input->post('category_name')
            );
            $category_id=$this->common->insert_into_table('categories',$data);
            if($category_id)
            {
                $this->session->flashdata();
                redirect(AURL.'products/add_product','refresh');
            }
            else
            {
                echo "Error! Failed To Insert Data";
            }
        }
        else
        {
            $data['error']='';
            $data['active']='manage_products';
            $data['page']='products/add_product_category';
            $this->load->view('backend/admin/layout/default',$data);
        }
    }
    public function delete_product($product_id)
    {
        $data['delete_record'] = $this->common->select_single_records('products',$where=array('product_id'=>$product_id));
        $file_path = './assets/website/images/'.$data['delete_record']['product_image_name'];
        if(file_exists($file_path))
        {
            unlink($file_path);
        }
        $result=$this->common->delete_record('products',$where = array('product_id' => $product_id));
        if($result)
        {
            $this->session->flashdata();
            redirect(AURL.'products','refresh');
        }
        else 
        {
            $this->session->flashdata();
            redirect(AURL.'products','refresh');
        }
    }
}