<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/admin/customer_model','customer',true);
    }
    // public function index()
    // {
    //     if($this->input->post('submit'))
    //     {
    //         // Hostel Logo
    //          // ------------------------------------------------------------------------
    //         $config['upload_path']          = './assets/uploads/hostel_logos';
    //         $config['allowed_types']        = 'jpeg|jpg|png';
    //         $config['max_size']             = 2048;
    //         // $config['max_width']            = 1024;
    //         // $config['max_height']           = 768;
    //         $this->upload->initialize($config);
    //         if(!$this->upload->do_upload('hostel_logo'))
    //         {
    //             $error_file_arr = array('error' => $this->upload->display_errors());
    //             $this->session->set_flashdata('error_message', $error_file_arr['error']);
    //             redirect(AURL.'hostel/');
    //                 // The uploaded file exceeds the maximum allowed size in your PHP configuration file.
    //                 // $this->session->set_flashdata('err_message', $error['error']);
    //                 // redirect('admin/submission_details_edit/'.$challan_id.'/'.$student_id);
    //         }
    //         else
    //         {
    //                 $data=array('upload_data'=>$this->upload->data());
    //                 $hostel_logo=$data['upload_data']['file_name'];
    //         }
    //         // ------------------------------------------------------------------------
    //         $hostels=array(
    //             'hostel_name'=>$this->input->post('hostel_name'),
    //             'owner_name'=>$this->input->post('owner_name'),
    //             'contact'=>$this->input->post('contact'),
    //             'description'=>$this->input->post('description'),
    //             'category_id'=>$this->input->post('category_id'),
    //             'type_id'=>$this->input->post('type_id'),
    //             'property_size'=>$this->input->post('property_size'),
    //             'total_rooms'=>$this->input->post('total_rooms'),
    //             'website_link'=>$this->input->post('website_link'),
    //             'facebook_link'=>$this->input->post('facebook_link'),
    //             'hostel_timings'=>$this->input->post('hostel_timings'),
    //             'single_person_room_rent'=>$this->input->post('single_person_room_rent'),
    //             'shared_room_rent'=>$this->input->post('shared_room_rent'),
    //             'address'=>$this->input->post('address'),
    //             'country_id'=>$this->input->post('country_id'),
    //             'city_id'=>$this->input->post('city_id'),
    //             'area_id'=>$this->input->post('area_id'),
    //             'google_location'=>$this->input->post('google_location'),
    //             'hostel_logo'=>$hostel_logo,
    //             'created_by'=>$this->session->userdata('user_id')
    //         );
    //         $hostel_id=$this->common->insert_into_table('hostels',$hostels);
    //         $hostels_statuses=array(
    //                 'hostel_id'=>$hostel_id,
    //                 'status_id'=>1,
    //                 'remarks'=>'No Remarks',
    //                 'created_by'=>$this->session->userdata('user_id')
    //             );
    //         $hostel_status_id=$this->common->insert_into_table('hostels_statuses',$hostels_statuses);
    //         $result=$this->common->update_table('hostels',array('hostel_id'=>$hostel_id),array('last_hostel_status_id'=>$hostel_status_id));
    //         // Hostel Pictures
    //         // ------------------------------------------------------------------------
    //         $filename=array();
    //         if(count($_FILES['picture_name']['name']) > 0 && $_FILES['picture_name']['name'] !='')
    //         {                        
    //             $files = $_FILES['picture_name'];
    //             $count = count($_FILES['picture_name']['name']);
    //             for($i=0; $i<$count;$i++)
    //             {               
    //                 $config = array();
    //                 $projects_folder_path = './assets/uploads/hostel_pictures';
    //                 $thumb = $projects_folder_path . 'thumb';
    //                 $_FILES['picture_name']['name']= $files['name'][$i];
    //                 $_FILES['picture_name']['type']= $files['type'][$i];
    //                 $_FILES['picture_name']['tmp_name']= $files['tmp_name'][$i];
    //                 $_FILES['picture_name']['error']= $files['error'][$i];
    //                 $_FILES['picture_name']['size']= $files['size'][$i];
    //                 $config['upload_path']         = $projects_folder_path;
    //                 $config['allowed_types']       = 'jpeg|jpg|png';
    //                 $config['max_size']            = 2048;
    //                 $config['file_name'] = $_FILES['picture_name']['name'];
    //                 $this->upload->initialize($config);
    //                 if(!$this->upload->do_upload('picture_name'))
    //                 {
    //                     $error_file_arr = array('error' => $this->upload->display_errors());
    //                     $this->session->set_flashdata('error_message', $error_file_arr['error']);
    //                     redirect(AURL.'hostel/');
    //                 }
    //                 else
    //                 {
    //                     $data_image_upload = array('upload_image_data' => $this->upload->data());
    //                     $image_name =$data_image_upload['upload_image_data']['file_name'];  
    //                     $full_path = $data_image_upload['upload_image_data']['full_path'];                
    //                 }
    //                 $filename[] = $image_name;
    //             }                              
    //         }
    //         foreach ($filename as $key => $value)
    //         {
    //             $hostels_pictures=array(
    //                 'hostel_id'=>$hostel_id,
    //                 'picture_name'=>$value,
    //                 'created_by'=>$this->session->userdata('user_id')
    //             );
    //             $hostel_picture_id=$this->common->insert_into_table('hostels_pictures',$hostels_pictures);                       
    //         }
    //         // ------------------------------------------------------------------------
    //         foreach ($this->input->post('hostel_facilities') as $key => $value)
    //         {
    //             $hostels_facilities=array(
    //                 'hostel_id'=>$hostel_id,
    //                 'facility_id'=>$value,
    //                 'created_by'=>$this->session->userdata('user_id')
    //             );
    //             $hostel_facility_id=$this->common->insert_into_table('hostels_facilities',$hostels_facilities);                       
    //         }
    //         if($hostel_facility_id)
    //         {
    //             $this->session->set_flashdata('ok_message', 'Hostel Added!');
    //         }
    //         else
    //         {
    //             $this->session->set_flashdata('error_message', 'Hostel Not Added!');
    //         }
    //         redirect(AURL.'hostel/');
    //     }
    //     $data['categories']=$this->common->select_array_records('categories');
    //     $data['types']=$this->common->select_array_records('types');
    //     $data['countries']=$this->common->select_array_records('countries');
    //     $data['facilities']=$this->common->select_array_records('facilities');
    // 	$data['active']='add_hostel';
    //     $data['page']='hostels/add_hostel';
    //     $this->load->view('backend/admin/layout/default',$data);
    // }
    // public function get_cities()
    // {
    //     if($this->input->post('country_id'))
    //     {
    //         echo $this->hostel->get_cities($this->input->post('country_id'));
    //     }
    // }
    // public function get_areas()
    // {
    //     if($this->input->post('city_id'))
    //     {
    //         echo $this->hostel->get_areas($this->input->post('city_id'));
    //     }
    // }
    // public function username_check()
    // {
    //     $result=$this->common->field_check('users','username',$this->input->post('username'));
    //     echo $result;
    // }
    // public function email_check()
    // {
    //     $result=$this->common->field_check('users','email',$this->input->post('email'));
    //     echo $result;
    // }
    public function signup()
    {
        if($this->input->post('submit'))
        {
            array(
                'fullname'=>$this->input->post('fullname'),
                'contact'=>$this->input->post('contact'),
                'cnic'=>$this->input->post('cnic'),
                'address'=>$this->input->post('address')
            );
        }
    }
    public function new_customers()
    {
        $data['active']='new_customers';
        $data['page']='customers/new_customers';
        $this->load->view('backend/admin/layout/default',$data);
    }
    public function get_new_customers()
    {
        $list = $this->customer->get_new_customers();
        $data = array();
        $no = $_POST['start'];
        // $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            // $row[] = $i;
            $row[] = $value['cust_username'];
            $row[] = $value['cust_password'];
            $row[] = $value['cust_email'];
            $row[] = $value['cust_phone'];
            $row[] = $value['hostel_name'];
            // $row[] = $value['status_name'];
            // $row[] = '<a class="btn btn-primary btn-sm" href="'.SURL.'customer/update_customer/'.$value['user_id'].'">Edit</a>
            //             <button type="button" class="btn btn-info btn-sm" onclick="hostel_detail('.$value['user_id'].','.$value['user_id'].');" >
            //                 Detail
            //             </button>
            //             <a class="btn btn-danger btn-sm" href="'.AURL.'hostel/status_update/'.$value['user_id'].'/'.$value['user_id'].'">
            //                 Submit
            //             </a>
            //         ';
            $data[] = $row;
            // $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->customer->new_customers_count(),
            "recordsFiltered" => $this->customer->new_customers_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function all_customers()
    {
        $data['active']='all_customers';
        $data['page']='customers/all_customers';
        $this->load->view('backend/admin/layout/default',$data);
    }
    public function get_all_customers()
    {
        $list = $this->customer->get_all_customers();
        $data = array();
        $no = $_POST['start'];
        // $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            // $row[] = $i;
            $row[] = $value['cust_username'];
            $row[] = $value['cust_password'];
            $row[] = $value['cust_email'];
            $row[] = $value['cust_phone'];
            $row[] = $value['hostel_name'];
            // $row[] = $value['status_name'];
            // $row[] = '<a class="btn btn-primary btn-sm" href="'.SURL.'customer/update_customer/'.$value['user_id'].'">Edit</a>
            //             <button type="button" class="btn btn-info btn-sm" onclick="hostel_detail('.$value['user_id'].','.$value['user_id'].');" >
            //                 Detail
            //             </button>
            //             <a class="btn btn-danger btn-sm" href="'.AURL.'hostel/status_update/'.$value['user_id'].'/'.$value['user_id'].'">
            //                 Submit
            //             </a>
            //         ';
            $data[] = $row;
            // $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->customer->all_customers_count(),
            "recordsFiltered" => $this->customer->all_customers_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
}