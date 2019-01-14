<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hostel extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backend/admin/hostel_model','hostel',true);
    }
    public function index()
    {
        if($this->input->post('submit'))
        {
            // Hostel Logo
             // ------------------------------------------------------------------------
            $config['upload_path']          = './assets/uploads/hostel_logos';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 512;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('hostel_logo'))
            {
                $error_file_arr = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error_message', $error_file_arr['error']);
                redirect(AURL.'hostel/');
                    // The uploaded file exceeds the maximum allowed size in your PHP configuration file.
                    // $this->session->set_flashdata('err_message', $error['error']);
                    // redirect('admin/submission_details_edit/'.$challan_id.'/'.$student_id);
            }
            else
            {
                    $data=array('upload_data'=>$this->upload->data());
                    $hostel_logo=$data['upload_data']['file_name'];
            }
            // ------------------------------------------------------------------------
            $hostels=array(
                'hostel_name'=>$this->input->post('hostel_name'),
                'owner_name'=>$this->input->post('owner_name'),
                'contact'=>$this->input->post('contact'),
                'description'=>$this->input->post('description'),
                'category_id'=>$this->input->post('category_id'),
                'type_id'=>$this->input->post('type_id'),
                'property_size'=>$this->input->post('property_size'),
                'total_rooms'=>$this->input->post('total_rooms'),
                'website_link'=>$this->input->post('website_link'),
                'facebook_link'=>$this->input->post('facebook_link'),
                'hostel_timings'=>$this->input->post('hostel_timings1').'-'.$this->input->post('hostel_timings2'),
                'single_person_room_rent'=>$this->input->post('single_person_room_rent'),
                'shared_room_rent'=>$this->input->post('shared_room_rent'),
                'address'=>$this->input->post('address'),
                'country_id'=>$this->input->post('country_id'),
                'city_id'=>$this->input->post('city_id'),
                'area_id'=>$this->input->post('area_id'),
                'google_location'=>$this->input->post('google_location'),
                'hostel_logo'=>$hostel_logo,
                'created_by'=>$this->session->userdata('user_id')
            );
            $hostel_id=$this->common->insert_into_table('hostels',$hostels);
            $hostels_statuses=array(
                    'hostel_id'=>$hostel_id,
                    'status_id'=>1,
                    'remarks'=>'No Remarks',
                    'created_by'=>$this->session->userdata('user_id')
                );
            $hostel_status_id=$this->common->insert_into_table('hostels_statuses',$hostels_statuses);
            $result=$this->common->update_table('hostels',array('hostel_id'=>$hostel_id),array('last_hostel_status_id'=>$hostel_status_id));
            // Hostel Pictures
            // ------------------------------------------------------------------------
            $filename=array();
            if(count($_FILES['picture_name']['name']) > 0 && $_FILES['picture_name']['name'] !='')
            {
                $files = $_FILES['picture_name'];
                $count = count($_FILES['picture_name']['name']);
                for($i=0; $i<$count;$i++)
                {               
                    $config = array();
                    $projects_folder_path = './assets/uploads/hostel_pictures';
                    $thumb = $projects_folder_path . 'thumb';
                    $_FILES['picture_name']['name']= $files['name'][$i];
                    $_FILES['picture_name']['type']= $files['type'][$i];
                    $_FILES['picture_name']['tmp_name']= $files['tmp_name'][$i];
                    $_FILES['picture_name']['error']= $files['error'][$i];
                    $_FILES['picture_name']['size']= $files['size'][$i];
                    $config['upload_path']         = $projects_folder_path;
                    $config['allowed_types']       = 'jpeg|jpg|png';
                    $config['max_size']            = 512;
                    $config['file_name'] = $_FILES['picture_name']['name'];
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('picture_name'))
                    {
                        $error_file_arr = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_message', $error_file_arr['error']);
                        redirect(AURL.'hostel/');
                    }
                    else
                    {
                        $data_image_upload = array('upload_image_data' => $this->upload->data());
                        $image_name =$data_image_upload['upload_image_data']['file_name'];  
                        $full_path = $data_image_upload['upload_image_data']['full_path'];                
                    }
                    $filename[] = $image_name;
                }
            }
            foreach ($filename as $key => $value)
            {
                $hostels_pictures=array(
                    'hostel_id'=>$hostel_id,
                    'picture_name'=>$value,
                    'created_by'=>$this->session->userdata('user_id')
                );
                $hostel_picture_id=$this->common->insert_into_table('hostels_pictures',$hostels_pictures);                       
            }
            // ------------------------------------------------------------------------
            foreach ($this->input->post('hostel_facilities') as $key => $value)
            {
                $hostels_facilities=array(
                    'hostel_id'=>$hostel_id,
                    'facility_id'=>$value,
                    'created_by'=>$this->session->userdata('user_id')
                );
                $hostel_facility_id=$this->common->insert_into_table('hostels_facilities',$hostels_facilities);                       
            }
            if($hostel_facility_id)
            {
                $this->session->set_flashdata('ok_message', 'Hostel Added!');
            }
            else
            {
                $this->session->set_flashdata('error_message', 'Hostel Not Added!');
            }
            redirect(AURL.'hostel/');
        }
        $data['categories']=$this->common->select_array_records('categories');
        $data['types']=$this->common->select_array_records('types');
        $data['countries']=$this->common->select_array_records('countries');
        $data['facilities']=$this->common->select_array_records('facilities');
    	$data['active']='add_hostel';
        $data['page']='hostels/add_hostel';
        $this->load->view('backend/admin/layout/default',$data);
    }
    public function get_cities()
    {
        if($this->input->post('country_id'))
        {
            echo $this->hostel->get_cities($this->input->post('country_id'));
        }
    }
    public function get_cities1()
    {
        if($this->input->post('country_id'))
        {
            $hostel=$this->hostel->get_hostel_detail($this->input->post('hostel_id'));
            $result=$this->hostel->get_cities1($this->input->post('country_id'));
            // $output = '<option value="'.$hostel['city_id'].'" selected>'.$hostel['city_name'].'</option>';
            foreach($result as $key => $value)
            {
                if($hostel['city_id']==$value['city_id'])
                {
                    $output .= '<option value="'.$value['city_id'].'" selected>'.$value['city_name'].'</option>';    
                }
                else
                {
                    $output .= '<option value="'.$value['city_id'].'">'.$value['city_name'].'</option>';
                }
                
            }
            echo $output;
        }
    }
    public function get_areas()
    {
        if($this->input->post('city_id'))
        {
            echo $this->hostel->get_areas($this->input->post('city_id'));
        }
    }
    public function get_areas1()
    {
        if($this->input->post('city_id'))
        {
            $hostel=$this->hostel->get_hostel_detail($this->input->post('hostel_id'));
            $result=$this->hostel->get_areas1($this->input->post('city_id'));
            // $output = '<option value="'.$hostel['area_id'].'" selected>'.$hostel['area_name'].'</option>';
            foreach($result as $key => $value)
            {
                if($hostel['area_id']==$value['area_id'])
                {
                    $output .= '<option value="'.$value['area_id'].'" selected>'.$value['area_name'].'</option>';    
                }
                else
                {
                    $output .= '<option value="'.$value['area_id'].'">'.$value['area_name'].'</option>';
                }
            }
            echo $output;
        }
    }
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
    public function new_hostels()
    {
        $data['statuses']=$this->common->select_array_records('statuses');
        $data['active']='new_hostels';
        $data['page']='hostels/new_hostels';
        $this->load->view('backend/admin/layout/default',$data);
    }
    public function get_new_hostels()
    {
        $list = $this->hostel->get_new_hostels();
        $data = array();
        $no = $_POST['start'];
        // $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            // $row[] = $i;
            $row[] = $value['hostel_name'];
            $row[] = $value['owner_name'];
            $row[] = $value['contact'];
            $row[] = $value['category_name'];
            $row[] = $value['single_person_room_rent'];
            $row[] = $value['shared_room_rent'];
            $row[] = $value['area_name'];
            if($this->session->userdata('role_id')==1)
            {
                $row[] = '
                        <span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
                                <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-131px, 27px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="btn btn-primary btn-sm" href="'.AURL.'hostel/update_hostel/'.$value['hostel_id'].'">
                                    Edit
                                </a>
                                <button type="button" class="btn btn-info btn-sm" onclick="hostel_detail('.$value['hostel_id'].','.$value['last_hostel_status_id'].');" >
                                    Detail
                                </button>
                                <button type="button" class="btn btn-success btn-sm" onclick="status_change('.$value['hostel_id'].','.$value['status_id'].');">
                                    Status Update
                                </button>
                                <a class="btn btn-danger btn-sm" href="'.AURL.'hostel/status_update/'.$value['hostel_id'].'/'.$value['last_hostel_status_id'].'">
                                    Submit
                                </a>
                            </div>
                        </span>
                        ';
            }
            else
            {
                $row[] = '
                        <span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
                                <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-131px, 27px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="btn btn-primary btn-sm" href="'.AURL.'hostel/update_hostel/'.$value['hostel_id'].'">
                                    Edit
                                </a>
                                <button type="button" class="btn btn-info btn-sm" onclick="hostel_detail('.$value['hostel_id'].','.$value['last_hostel_status_id'].');" >
                                    Detail
                                </button>
                            </div>
                        </span>
                        ';
            }
            $data[] = $row;
            // $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->hostel->new_hostels_count(),
            "recordsFiltered" => $this->hostel->new_hostels_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function approved_hostels()
    {
        $data['statuses']=$this->common->select_array_records('statuses');
        $data['active']='approved_hostels';
        $data['page']='hostels/approved_hostels';
        $this->load->view('backend/admin/layout/default',$data);
    }
    public function get_approved_hostels()
    {
        $list = $this->hostel->get_approved_hostels();
        $data = array();
        $no = $_POST['start'];
        // $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            // $row[] = $i;
            $row[] = $value['hostel_name'];
            $row[] = $value['owner_name'];
            $row[] = $value['contact'];
            $row[] = $value['category_name'];
            $row[] = $value['single_person_room_rent'];
            $row[] = $value['shared_room_rent'];
            $row[] = $value['area_name'];
            if($this->session->userdata('role_id')==1)
            {
                $row[] = '
                        <span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
                                <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-131px, 27px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="btn btn-primary btn-sm" href="'.AURL.'hostel/update_hostel/'.$value['hostel_id'].'">
                                    Edit
                                </a>
                                <button type="button" class="btn btn-info btn-sm" onclick="hostel_detail('.$value['hostel_id'].','.$value['last_hostel_status_id'].');" >
                                    Detail
                                </button>
                                <button type="button" class="btn btn-success btn-sm" onclick="status_change('.$value['hostel_id'].','.$value['status_id'].');" >
                                    Status Update
                                </button>
                                <a class="btn btn-danger btn-sm" href="'.AURL.'hostel/status_update/'.$value['hostel_id'].'/'.$value['last_hostel_status_id'].'">
                                    Submit
                                </a>
                            </div>
                        </span>
                        ';
            }
            else
            {
                $row[] = '
                        <span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
                                <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-131px, 27px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="btn btn-primary btn-sm" href="'.AURL.'hostel/update_hostel/'.$value['hostel_id'].'">
                                    Edit
                                </a>
                                <button type="button" class="btn btn-info btn-sm" onclick="hostel_detail('.$value['hostel_id'].','.$value['last_hostel_status_id'].');" >
                                    Detail
                                </button>
                            </div>
                        </span>
                        ';
            }
            $data[] = $row;
            // $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->hostel->approved_hostels_count(),
            "recordsFiltered" => $this->hostel->approved_hostels_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function payment_pending()
    {
        $data['statuses']=$this->common->select_array_records('statuses');
        $data['active']='payment_pending';
        $data['page']='hostels/payment_pending';
        $this->load->view('backend/admin/layout/default',$data);
    }
    public function get_payment_pending()
    {
        $list = $this->hostel->get_payment_pending();
        $data = array();
        $no = $_POST['start'];
        // $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            // $row[] = $i;
            $row[] = $value['hostel_name'];
            $row[] = $value['owner_name'];
            $row[] = $value['contact'];
            $row[] = $value['category_name'];
            $row[] = $value['single_person_room_rent'];
            $row[] = $value['shared_room_rent'];
            $row[] = $value['area_name'];
            if($this->session->userdata('role_id')==1)
            {
                $row[] = '
                        <span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
                                <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-131px, 27px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="btn btn-primary btn-sm" href="'.AURL.'hostel/update_hostel/'.$value['hostel_id'].'">
                                    Edit
                                </a>
                                <button type="button" class="btn btn-info btn-sm" onclick="hostel_detail('.$value['hostel_id'].','.$value['last_hostel_status_id'].');" >
                                    Detail
                                </button>
                                <button type="button" class="btn btn-success btn-sm" onclick="status_change('.$value['hostel_id'].','.$value['status_id'].');" >
                                    Status Update
                                </button>
                                <a class="btn btn-primary btn-sm" href="'.AURL.'hostel/payment_history/'.$value['hostel_id'].'">
                                    Payment History
                                </a>
                            </div>
                        </span>
                        ';
            }
            else
            {
                $row[] = '
                        <span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
                                <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-131px, 27px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="btn btn-primary btn-sm" href="'.AURL.'hostel/update_hostel/'.$value['hostel_id'].'">
                                    Edit
                                </a>
                                <button type="button" class="btn btn-info btn-sm" onclick="hostel_detail('.$value['hostel_id'].','.$value['last_hostel_status_id'].');" >
                                    Detail
                                </button>
                            </div>
                        </span>
                        ';
            }
            $data[] = $row;
            // $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->hostel->payment_pending_count(),
            "recordsFiltered" => $this->hostel->payment_pending_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function all_hostels()
    {
        $data['statuses']=$this->common->select_array_records('statuses');
        $data['active']='all_hostels';
        $data['page']='hostels/all_hostels';
        $this->load->view('backend/admin/layout/default',$data);
    }
    public function get_all_hostels()
    {
        $list = $this->hostel->get_all_hostels();
        $data = array();
        $no = $_POST['start'];
        // $i=1;
        foreach ($list as $key => $value)
        {
            $no++;
            $row = array();
            // $row[] = $i;
            $row[] = $value['hostel_name'];
            $row[] = $value['owner_name'];
            $row[] = $value['contact'];
            $row[] = $value['category_name'];
            $row[] = $value['single_person_room_rent'];
            $row[] = $value['shared_room_rent'];
            $row[] = $value['area_name'];
            $row[] = $value['status_name'];
            if($this->session->userdata('role_id')==1)
            {
                $row[] = '
                        <span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
                                <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-131px, 27px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="btn btn-primary btn-sm" href="'.AURL.'hostel/update_hostel/'.$value['hostel_id'].'">
                                    Edit
                                </a>
                                <button type="button" class="btn btn-info btn-sm" onclick="hostel_detail('.$value['hostel_id'].','.$value['last_hostel_status_id'].');" >
                                    Detail
                                </button>
                                <button type="button" class="btn btn-success btn-sm" onclick="status_change('.$value['hostel_id'].','.$value['status_id'].');" >
                                    Status Update
                                </button>
                            </div>
                        </span>
                        ';
            }
            else
            {
                $row[] = '
                        <span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
                                <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-131px, 27px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="btn btn-primary btn-sm" href="'.AURL.'hostel/update_hostel/'.$value['hostel_id'].'">
                                    Edit
                                </a>
                                <button type="button" class="btn btn-info btn-sm" onclick="hostel_detail('.$value['hostel_id'].','.$value['last_hostel_status_id'].');" >
                                    Detail
                                </button>
                            </div>
                        </span>
                        ';
            }
            $data[] = $row;
            // $i++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->hostel->all_hostels_count(),
            "recordsFiltered" => $this->hostel->all_hostels_count(),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function update_hostel($hostel_id='')
    {
        if($this->input->post('submit'))
        {
            $hostel_logo=$this->input->post('hostel_logo');
            if($_FILES['hostel_logo']['name'])
            {
                // Hostel Logo
                // ------------------------------------------------------------------------
                $config['upload_path']          = './assets/uploads/hostel_logos';
                $config['allowed_types']        = 'jpeg|jpg|png';
                $config['max_size']             = 512;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('hostel_logo'))
                {
                    $error_file_arr = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_message', $error_file_arr['error']);
                    $url=$_SERVER['HTTP_REFERER'];
                    redirect($url);
                    // redirect(AURL.'hostel/update_hostel');
                        // The uploaded file exceeds the maximum allowed size in your PHP configuration file.
                        // $this->session->set_flashdata('err_message', $error['error']);
                        // redirect('admin/submission_details_edit/'.$challan_id.'/'.$student_id);
                }
                else
                {
                        $data=array('upload_data'=>$this->upload->data());
                        $hostel_logo=$data['upload_data']['file_name'];
                }
            }
            // ------------------------------------------------------------------------
            $hostels=array(
                'hostel_name'=>$this->input->post('hostel_name'),
                'owner_name'=>$this->input->post('owner_name'),
                'contact'=>$this->input->post('contact'),
                'description'=>$this->input->post('description'),
                'category_id'=>$this->input->post('category_id'),
                'type_id'=>$this->input->post('type_id'),
                'property_size'=>$this->input->post('property_size'),
                'total_rooms'=>$this->input->post('total_rooms'),
                'website_link'=>$this->input->post('website_link'),
                'facebook_link'=>$this->input->post('facebook_link'),
                'hostel_timings'=>$this->input->post('hostel_timings1').'-'.$this->input->post('hostel_timings2'),
                'single_person_room_rent'=>$this->input->post('single_person_room_rent'),
                'shared_room_rent'=>$this->input->post('shared_room_rent'),
                'address'=>$this->input->post('address'),
                'country_id'=>$this->input->post('country_id'),
                'city_id'=>$this->input->post('city_id'),
                'area_id'=>$this->input->post('area_id'),
                'google_location'=>$this->input->post('google_location'),
                'hostel_logo'=>$hostel_logo,
                'created_by'=>$this->session->userdata('user_id')
            );
            $result=$this->common->update_table('hostels',array('hostel_id'=>$hostel_id),$hostels);
            // Hostel Pictures
            // ------------------------------------------------------------------------
            // $filename=array();
            // if(count($_FILES['picture_name']['name']) > 0 && $_FILES['picture_name']['name'] !='')
            // {
            //     $files = $_FILES['picture_name'];
            //     $count = count($_FILES['picture_name']['name']);
            //     for($i=0; $i<$count;$i++)
            //     {
            //         $config = array();
            //         $projects_folder_path = './assets/uploads/hostel_pictures';
            //         $thumb = $projects_folder_path . 'thumb';
            //         $_FILES['picture_name']['name']= $files['name'][$i];
            //         $_FILES['picture_name']['type']= $files['type'][$i];
            //         $_FILES['picture_name']['tmp_name']= $files['tmp_name'][$i];
            //         $_FILES['picture_name']['error']= $files['error'][$i];
            //         $_FILES['picture_name']['size']= $files['size'][$i];
            //         $config['upload_path']         = $projects_folder_path;
            //         $config['allowed_types']       = 'jpeg|jpg|png';
            //         $config['max_size']            = 512;
            //         $config['file_name'] = $_FILES['picture_name']['name'];
            //         $this->upload->initialize($config);
            //         if(!$this->upload->do_upload('picture_name'))
            //         {
            //             $error_file_arr = array('error' => $this->upload->display_errors());
            //             $this->session->set_flashdata('error_message', $error_file_arr['error']);
            //             redirect(AURL.'hostel/');
            //         }
            //         else
            //         {
            //             $data_image_upload = array('upload_image_data' => $this->upload->data());
            //             $image_name =$data_image_upload['upload_image_data']['file_name'];  
            //             $full_path = $data_image_upload['upload_image_data']['full_path'];                
            //         }
            //         $filename[] = $image_name;
            //     }                              
            // }
            // foreach ($filename as $key => $value)
            // {
            //     $hostels_pictures=array(
            //         'hostel_id'=>$hostel_id,
            //         'picture_name'=>$value,
            //         'created_by'=>$this->session->userdata('user_id')
            //     );
            //     $hostel_picture_id=$this->common->insert_into_table('hostels_pictures',$hostels_pictures);                       
            // }
            // ------------------------------------------------------------------------
            // foreach ($this->input->post('hostel_facilities') as $key => $value)
            // {
            //     $hostels_facilities=array(
            //         'hostel_id'=>$hostel_id,
            //         'facility_id'=>$value,
            //         'created_by'=>$this->session->userdata('user_id')
            //     );
            //     $hostel_facility_id=$this->common->insert_into_table('hostels_facilities',$hostels_facilities);                       
            // }
            if($result)
            {
                $this->session->set_flashdata('ok_message', 'Hostel Updated!');
            }
            else
            {
                $this->session->set_flashdata('error_message', 'Hostel Not Updated!');
            }
            // $url=$_SERVER['HTTP_REFERER'];
            // redirect($url);
            // redirect(AURL.'hostel/');
        }
        $data['hostel']=$this->hostel->get_hostel_detail($hostel_id);
        $data['hostel_pictures']=$this->common->select_array_records('hostels_pictures',array('hostel_id'=>$hostel_id));
        $data['hostels_facilities']=$this->hostel->get_hostels_facilities($hostel_id);
        $data['categories']=$this->common->select_array_records('categories');
        $data['types']=$this->common->select_array_records('types');
        $data['countries']=$this->common->select_array_records('countries');
        $data['facilities']=$this->common->select_array_records('facilities');
        $data['active']='new_hostels';
        $data['page']='hostels/update_hostel';
        $this->load->view('backend/admin/layout/default',$data);
    }
    public function image_update($hostel_picture_id='',$picture_name='')
    {
        $data=$this->common->select_single_records('hostels_pictures',array('hostel_picture_id'=>$hostel_picture_id),'picture_name');
        $projects_folder_path='./assets/uploads/hostel_pictures/';
        $path=$projects_folder_path.$data['picture_name'];
        unlink($path);
        $config['upload_path']          = './assets/uploads/hostel_pictures/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 512;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->upload->initialize($config);
        if(!$this->upload->do_upload('picture_name'))
        {
            $error_file_arr = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error_message', $error_file_arr['error']);
            redirect(AURL.'hostel/new_hostels');
                // The uploaded file exceeds the maximum allowed size in your PHP configuration file.
                // $this->session->set_flashdata('err_message', $error['error']);
                // redirect('admin/submission_details_edit/'.$challan_id.'/'.$student_id);
        }
        else
        {
            $data=array('upload_data'=>$this->upload->data());
            $picture_name=$data['upload_data']['file_name'];
            $hostels_pictures=array(
                'picture_name'=>$picture_name,
                'updated_by'=>$this->session->userdata('user_id')
            );
            $result=$this->common->update_table('hostels_pictures',array('hostel_picture_id'=>$hostel_picture_id),$hostels_pictures);
            echo $result;
        }
    }
    public function add_more_images($hostel_id='')
    {
        $filename=array();
        if(count($_FILES['picture_name1']['name']) > 0 && $_FILES['picture_name1']['name'] !='')
        {
            $files = $_FILES['picture_name1'];
            $count = count($_FILES['picture_name1']['name']);
            for($i=0; $i<$count;$i++)
            {               
                $config = array();
                $projects_folder_path = './assets/uploads/hostel_pictures';
                $thumb = $projects_folder_path . 'thumb';
                $_FILES['picture_name1']['name']= $files['name'][$i];
                $_FILES['picture_name1']['type']= $files['type'][$i];
                $_FILES['picture_name1']['tmp_name']= $files['tmp_name'][$i];
                $_FILES['picture_name1']['error']= $files['error'][$i];
                $_FILES['picture_name1']['size']= $files['size'][$i];
                $config['upload_path']         = $projects_folder_path;
                $config['allowed_types']       = 'jpeg|jpg|png';
                $config['max_size']            = 512;
                $config['file_name'] = $_FILES['picture_name1']['name'];
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('picture_name1'))
                {
                    $error_file_arr = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_message', $error_file_arr['error']);
                    $url=$_SERVER['HTTP_REFERER'];
                    redirect($url);
                }
                else
                {
                    $data_image_upload = array('upload_image_data' => $this->upload->data());
                    $image_name =$data_image_upload['upload_image_data']['file_name'];  
                    $full_path = $data_image_upload['upload_image_data']['full_path'];                
                }
                $filename[] = $image_name;
            }
        }
        foreach ($filename as $key => $value)
        {
            $hostels_pictures=array(
                'hostel_id'=>$hostel_id,
                'picture_name'=>$value,
                'created_by'=>$this->session->userdata('user_id')
            );
            $hostel_picture_id=$this->common->insert_into_table('hostels_pictures',$hostels_pictures);                       
        }
        $this->session->set_flashdata('ok_message', 'New Images Added Successfully!');
        $url=$_SERVER['HTTP_REFERER'];
        redirect($url);
    }
    public function delete_image()
    {
        $projects_folder_path = './assets/uploads/hostel_pictures/';
        $path=$projects_folder_path.$this->input->post('picture_name');
        $result=$this->common->delete_record('hostels_pictures',array('hostel_picture_id'=>$this->input->post('hostel_picture_id')));
        if(unlink($path))
        {
            echo $result;
        }
    }
    public function update_hostel_facilities($hostel_id='')
    {
        $result=$this->common->delete_record('hostels_facilities',array('hostel_id'=>$hostel_id));
        foreach ($this->input->post('hostel_facilities') as $key => $value)
        {
            $hostels_facilities=array(
                'hostel_id'=>$hostel_id,
                'facility_id'=>$value,
                'created_by'=>$this->session->userdata('user_id')
            );
            $hostel_facility_id=$this->common->insert_into_table('hostels_facilities',$hostels_facilities);                       
        }
        if($hostel_facility_id)
        {
            $this->session->set_flashdata('ok_message', 'Facilities Updated!');
        }
        else
        {
            $this->session->set_flashdata('warning_message', 'Facilities Removed!');
        }
        $url=$_SERVER['HTTP_REFERER'];
        redirect($url);
    }
    public function hostel_detail($hostel_id='',$last_hostel_status_id='')
    {
        $data['hostel']=$this->hostel->get_hostel_detail($hostel_id,$last_hostel_status_id);
        $data['hostel_pictures']=$this->common->select_array_records('hostels_pictures',array('hostel_id'=>$hostel_id));
        $data['hostels_facilities']=$this->hostel->get_hostels_facilities($hostel_id);
        echo json_encode($data);
    }
    public function status_update($hostel_id='',$hostel_status_id='')
    {
        $status_id=$this->common->select_single_records('hostels_statuses',array('hostel_status_id'=>$hostel_status_id),'status_id');
        $hostel_status_id=$this->common->insert_into_table('hostels_statuses',array('hostel_id'=>$hostel_id,'status_id'=>$status_id['status_id']+1));
        $result=$this->common->update_table('hostels',array('hostel_id'=>$hostel_id),array('last_hostel_status_id'=>$hostel_status_id));
        if($status_id['status_id']==1)
        {
            $this->session->set_flashdata('ok_message', 'Status Updated!');
            redirect(AURL.'hostel/approved_hostels');
        }
        else
        if($status_id['status_id']==2)
        {
            $this->session->set_flashdata('ok_message', 'Status Updated!');
            redirect(AURL.'hostel/payment_pending');
        }
    }
    public function status_change($hostel_id='')
    {
        $hostel_status_id=$this->common->insert_into_table('hostels_statuses',array('hostel_id'=>$hostel_id,'status_id'=>$this->input->post('status_id')));
        $result=$this->common->update_table('hostels',array('hostel_id'=>$hostel_id),array('last_hostel_status_id'=>$hostel_status_id));
        echo $result;
    }
    public function payment_history($hostel_id='')
    {
        $year = date("Y");
        $data['payment_history']=$this->common->select_single_records('hostels_monthly_payments',array('hostel_id'=>$hostel_id,'year'=>$year));
        $data['years']=$this->common->select_array_records('hostels_monthly_payments',array('hostel_id'=>$hostel_id,'year!='=>$year),'year');
        $data['year']=$year;
        $data['hostel_id']=$hostel_id;
        $data['active']='payment_pending';
        $data['page']='hostels/payment_history';
        $this->load->view('backend/admin/layout/default',$data);
    }
    public function payment_history_ajax_table($hostel_id='')
    {
        $data['payment_history']=$this->common->select_single_records('hostels_monthly_payments',array('hostel_id'=>$hostel_id,'year'=>$this->input->post('year')));
        // echo($hostel_id);
        // echo($this->input->post('year'));
        // exit();
        $html=$this->load->view('backend/admin/hostels/payment_history_ajax_table',$data,TRUE);
        echo $html;
    }
    public function add_hostel_payment($hostel_id='')
    {
        $parts=explode('-',$this->input->post('date'));
        $year=$parts[0];
        $month=$parts[1];
        $check=$this->common->select_single_records('hostels_monthly_payments',array('hostel_id'=>$hostel_id,'year'=>$year));
        if($check)
        {
            $update_month=array();
            for($i=1;$i<13;$i++)
            {
                if($i==$month)
                {
                    $update_month['month_'.$i]=$this->input->post('amount');
                }
                $update_month['updated_by']=$this->session->userdata('user_id');
            }
            $result=$this->common->update_table('hostels_monthly_payments',array('hostel_id'=>$hostel_id,'year'=>$year),$update_month);
        }
        else
        {
            $update_month=array();
            for($i=1;$i<13;$i++)
            {
                if($i==$month)
                {
                    $update_month['month_'.$i]=$this->input->post('amount');
                }
                $update_month['hostel_id']=$hostel_id;
                $update_month['year']=$year;
                $update_month['created_by']=$this->session->userdata('user_id');
            }
            $result=$this->common->insert_into_table('hostels_monthly_payments',$update_month);
        }
        echo $result;
    }
}