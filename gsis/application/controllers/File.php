<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class File extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		$this->load->helper(array('form', 'url'));
        $this->load->model('Common_model');
	}
	public function index($student_id='',$document_name='')
	{
		if($this->session->userdata('id'))
		{
			$data['files']=$this->Common_model->select_array_records('uploads',$where=array('student_id'=>$student_id));
			$data['active']='registered_students';
			$this->load->view('admin/header',$data);
			$data['student_id']=$student_id;
			$data['error']='';
			$this->load->view('registration/file_completion',$data);
			$this->load->view('admin/footer',$data);
		}
		else
		{
			redirect('login/');
		}
	}
	public function file_completion($student_id='',$document_name='')
    {
        $filename=array();
        if(count($_FILES['undertaking']['name']) > 0 && $_FILES['undertaking']['name'] !='')
        {
            $files = $_FILES['undertaking'];
            $count = count($_FILES['undertaking']['name']);
            //echo $_FILES['file']['name'];exit();
            for($i=0; $i<$count;$i++)
            {
                $config = array();
                $projects_folder_path = './assets/uploads/';
                $thumb = $projects_folder_path . 'thumb';
                $_FILES['undertaking']['name']      = $files['name'][$i];
                $_FILES['undertaking']['type']      = $files['type'][$i];
                $_FILES['undertaking']['tmp_name']  = $files['tmp_name'][$i];
                $_FILES['undertaking']['error']     = $files['error'][$i];
                $_FILES['undertaking']['size']      = $files['size'][$i];   
                // $file_ext  = ltrim(strtolower(strrchr($_FILES['undertaking']['name'],'.')),'.');  
                // $file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;        
                $config['upload_path']      = $projects_folder_path;
                $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                $config['max_size']         = 2048;
                // $config['encrypt_name']     = TRUE;
                // $config['overwrite']        = TRUE;
                // $config['file_name']     = $file_name;
                $config['file_name'] = $_FILES['undertaking']['name'];
                // // $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('undertaking'))
                {
                    $error_file_arr = array('error' => $this->upload->display_errors());                
                    $this->session->set_flashdata('err_message', $error_file_arr['error']);
                    $r=2;
                    echo json_encode($r);
                    exit();
                }
                else
                {
                    $data['delete_record'] = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                    if(file_exists($projects_folder_path.$data['delete_record']['undertaking'])!='./assets/uploads/')
                    {
                        unlink($projects_folder_path.$data['delete_record']['undertaking']);
                    }
                    $data_image_upload = array('upload_image_data' => $this->upload->data());
                    $image_name =$data_image_upload['upload_image_data']['file_name']; 
                    $full_path = $data_image_upload['upload_image_data']['full_path'];
                    // ------------------------------------------------------------------------ 
                    $this->load->library('image_lib');
                    $config['image_library']    = 'GD2';
                    $config['source_image']     = './assets/uploads/' . $image_name;
                    $config['maintain_ratio']   = TRUE;
                    $config['master_dim']   = 'auto';
                    $config['quality']  = 70;
                    $config['width'] = 1024;
                    $config['height'] = 768;
                    $config['new_image'] = './assets/uploads/' . $image_name;
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    // ------------------------------------------------------------------------                      
                }
                $filename[] = $image_name;
            } // end for loop                      
        }
        foreach ($filename as $key => $value)
        {
            $insert_image=array(
                'undertaking'=> $value,
                'update_date' => date("Y-m-d g:i:s"),
            );
            $add_image = $this->Common_model->update_table('uploads',$where=array('student_id'=>$student_id),$insert_image);
        }
        if ($add_image)
        {
            $record = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
            echo json_encode($record);
        }
    }
    public function file_completion1($student_id='',$document_name='')
    {
        // if($this->input->post('student_id'))
        // {
        // echo $this->input->post($student_id);
        // echo($student_id).'-';
        // echo($document_name);
        // exit();
            $filename=array();
            if(count($_FILES['copy_of_paid_fee_challan']['name']) > 0 && $_FILES['copy_of_paid_fee_challan']['name'] !='')
            {
                $files = $_FILES['copy_of_paid_fee_challan'];
                $count = count($_FILES['copy_of_paid_fee_challan']['name']);
                //echo $_FILES['file']['name'];exit();
                for($i=0; $i<$count;$i++)
                {
                    $config = array();
                    $projects_folder_path = './assets/uploads/';
                    $thumb = $projects_folder_path . 'thumb';
                    $_FILES['copy_of_paid_fee_challan']['name']     = $files['name'][$i];
                    $_FILES['copy_of_paid_fee_challan']['type']     = $files['type'][$i];
                    $_FILES['copy_of_paid_fee_challan']['tmp_name'] = $files['tmp_name'][$i];
                    $_FILES['copy_of_paid_fee_challan']['error']    = $files['error'][$i];
                    $_FILES['copy_of_paid_fee_challan']['size']     = $files['size'][$i];   
                    // $file_ext  = ltrim(strtolower(strrchr($_FILES['copy_of_paid_fee_challan']['name'],'.')),'.');  
                    // $file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;        
                    $config['upload_path']      = $projects_folder_path;
                    $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                    $config['max_size']         = 2048;
                    // $config['encrypt_name']     = TRUE;
                // $config['overwrite']        = TRUE;
                    $config['file_name']        = $_FILES['copy_of_paid_fee_challan']['name'];
                    // // $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('copy_of_paid_fee_challan'))
                    {
                        $error_file_arr = array('error' => $this->upload->display_errors());                
                        $this->session->set_flashdata('err_message', $error_file_arr['error']);
                        $r=2;
                        echo json_encode($r);
                        exit();
                    }
                    else
                    {
                        $data['delete_record'] = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                        if(file_exists($projects_folder_path.$data['delete_record']['undertaking'])!='./assets/uploads/')
                        {
                            unlink($projects_folder_path.$data['delete_record']['undertaking']);
                        }
                        $data_image_upload = array('upload_image_data' => $this->upload->data());
                        $image_name =$data_image_upload['upload_image_data']['file_name']; 
                        $full_path = $data_image_upload['upload_image_data']['full_path'];
                        // ------------------------------------------------------------------------ 
                        $this->load->library('image_lib');
                        $config['image_library']    = 'GD2';
                        $config['source_image']     = './assets/uploads/' . $image_name;
                        $config['maintain_ratio']   = TRUE;
                        $config['master_dim']   = 'auto';
                        $config['quality']  = 70;
                        $config['width'] = 1024;
                        $config['height'] = 768;
                        $config['new_image'] = './assets/uploads/' . $image_name;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        // ------------------------------------------------------------------------            
                    }
                    $filename[] = $image_name;
                } // end for loop                      
            }
            foreach ($filename as $key => $value)
            {
                $insert_image=array(
                    'copy_of_paid_fee_challan'=> $value,
                    // 'student_id' => $student_id,
                    // 'stage_id' => $stage_id,
                    'update_date' => date("Y-m-d g:i:s"),
                    // 'category_status' => 1,
                    // 'user_id' =>$this->session->userdata('user_id'),
                );
                // echo "<pre>";
                // print_r ($insert_image);
                // echo "</pre>";
                // exit();
                $add_image = $this->Common_model->update_table('uploads',$where=array('student_id'=>$student_id),$insert_image);                           
            }
            if ($add_image)
            {
                $record = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                echo json_encode($record);
            }
        // }
        // else
        // {
        //  $data['active']='registered_students';
        //  $this->load->view('admin/header',$data);
        //  $data['student_id']=$student_id;
        //  $data['error']='';
        //  $this->load->view('registration/file_completion',$data);
        //  $this->load->view('admin/footer',$data);
        // }
    }
    public function file_completion2($student_id='',$document_name='')
	{
		// if($this->input->post('student_id'))
		// {
		// echo $this->input->post($student_id);
		// echo($student_id).'-';
		// echo($document_name);
		// exit();
			$filename=array();
            if(count($_FILES['copy_of_paid_registration_slip']['name']) > 0 && $_FILES['copy_of_paid_registration_slip']['name'] !='')
            {
                $files = $_FILES['copy_of_paid_registration_slip'];
                $count = count($_FILES['copy_of_paid_registration_slip']['name']);
                //echo $_FILES['file']['name'];exit();
                for($i=0; $i<$count;$i++)
                {
                    $config = array();
                    $projects_folder_path = './assets/uploads/';
                    $thumb = $projects_folder_path . 'thumb';
                    $_FILES['copy_of_paid_registration_slip']['name']= $files['name'][$i];
                    $_FILES['copy_of_paid_registration_slip']['type']= $files['type'][$i];
                    $_FILES['copy_of_paid_registration_slip']['tmp_name']= $files['tmp_name'][$i];
                    $_FILES['copy_of_paid_registration_slip']['error']= $files['error'][$i];
                    $_FILES['copy_of_paid_registration_slip']['size']= $files['size'][$i];   
                    // $file_ext  = ltrim(strtolower(strrchr($_FILES['copy_of_paid_registration_slip']['name'],'.')),'.');  
                    // $file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;        
                    $config['upload_path']      = $projects_folder_path;
                    $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                    $config['max_size']         = 2048;
                    // $config['encrypt_name']     = TRUE;
                // $config['overwrite']        = TRUE;
                    $config['file_name']        = $_FILES['copy_of_paid_registration_slip']['name'];
                    // $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('copy_of_paid_registration_slip'))
                    {
                        $error_file_arr = array('error' => $this->upload->display_errors());                
                        $this->session->set_flashdata('err_message', $error_file_arr['error']);
                        $r=2;
                        echo json_encode($r);
                        exit();
                    }
                    else
                    {
                        $data['delete_record'] = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                        if(file_exists($projects_folder_path.$data['delete_record']['copy_of_paid_registration_slip'])!='./assets/uploads/')
                        {
                            unlink($projects_folder_path.$data['delete_record']['copy_of_paid_registration_slip']);
                        }
                        $data_image_upload = array('upload_image_data' => $this->upload->data());
                        $image_name =$data_image_upload['upload_image_data']['file_name']; 
                        $full_path = $data_image_upload['upload_image_data']['full_path'];
                        // ------------------------------------------------------------------------ 
                        $this->load->library('image_lib');
                        $config['image_library']    = 'GD2';
                        $config['source_image']     = './assets/uploads/' . $image_name;
                        $config['maintain_ratio']   = TRUE;
                        $config['master_dim']   = 'auto';
                        $config['quality']  = 70;
                        $config['width'] = 1024;
                        $config['height'] = 768;
                        $config['new_image'] = './assets/uploads/' . $image_name;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        // ------------------------------------------------------------------------            
                    }
                    $filename[] = $image_name;
                } // end for loop                      
            }
            foreach ($filename as $key => $value)
            {
                $insert_image=array(
                    'copy_of_paid_registration_slip'=> $value,
                    // 'student_id' => $student_id,
                    // 'stage_id' => $stage_id,
                    'update_date' => date("Y-m-d g:i:s"),
                    // 'category_status' => 1,
                    // 'user_id' =>$this->session->userdata('user_id'),
                );
                // echo "<pre>";
                // print_r ($insert_image);
                // echo "</pre>";
                // exit();
                $add_image = $this->Common_model->update_table('uploads',$where=array('student_id'=>$student_id),$insert_image);                           
            }
            if ($add_image)
            {
                $record = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                echo json_encode($record);
            }
		// }
		// else
		// {
		// 	$data['active']='registered_students';
		// 	$this->load->view('admin/header',$data);
		// 	$data['student_id']=$student_id;
		// 	$data['error']='';
		// 	$this->load->view('registration/file_completion',$data);
		// 	$this->load->view('admin/footer',$data);
		// }
	}
    public function file_completion3($student_id='',$document_name='')
    {
            $filename=array();
            if(count($_FILES['photographs']['name']) > 0 && $_FILES['photographs']['name'] !='')
            {
                $files = $_FILES['photographs'];
                $count = count($_FILES['photographs']['name']);
                for($i=0; $i<$count;$i++)
                {
                    $config = array();
                    $projects_folder_path = './assets/uploads/';
                    $thumb = $projects_folder_path . 'thumb';
                    $_FILES['photographs']['name']= $files['name'][$i];
                    $_FILES['photographs']['type']= $files['type'][$i];
                    $_FILES['photographs']['tmp_name']= $files['tmp_name'][$i];
                    $_FILES['photographs']['error']= $files['error'][$i];
                    $_FILES['photographs']['size']= $files['size'][$i];      
                    $config['upload_path']      = $projects_folder_path;
                    $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                    $config['max_size']         = 2048;
                    // $config['encrypt_name']     = TRUE;
                // $config['overwrite']        = TRUE;
                    $config['file_name']        = $_FILES['photographs']['name'];
                    // $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('photographs'))
                    {
                        $error_file_arr = array('error' => $this->upload->display_errors());                
                        $this->session->set_flashdata('err_message', $error_file_arr['error']);
                        $r=2;
                        echo json_encode($r);
                        exit();
                    }
                    else
                    {
                        $data['delete_record'] = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                        if(file_exists($projects_folder_path.$data['delete_record']['photographs'])!='./assets/uploads/')
                        {
                            unlink($projects_folder_path.$data['delete_record']['photographs']);
                        }
                        $data_image_upload = array('upload_image_data' => $this->upload->data());
                        $image_name =$data_image_upload['upload_image_data']['file_name']; 
                        $full_path = $data_image_upload['upload_image_data']['full_path'];
                        // ------------------------------------------------------------------------ 
                        $this->load->library('image_lib');
                        $config['image_library']    = 'GD2';
                        $config['source_image']     = './assets/uploads/' . $image_name;
                        $config['maintain_ratio']   = TRUE;
                        $config['master_dim']   = 'auto';
                        $config['quality']  = 70;
                        $config['width'] = 1024;
                        $config['height'] = 768;
                        $config['new_image'] = './assets/uploads/' . $image_name;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        // ------------------------------------------------------------------------            
                    }
                    $filename[] = $image_name;
                } // end for loop                      
            }
            foreach ($filename as $key => $value)
            {
                $insert_image=array(
                    'photographs'=> $value,
                    'update_date' => date("Y-m-d g:i:s"),
                );
                $add_image = $this->Common_model->update_table('uploads',$where=array('student_id'=>$student_id),$insert_image);                           
            }
            if ($add_image)
            {
                $record = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                echo json_encode($record);
            }
    }
    public function file_completion4($student_id='',$document_name='')
    {
        // if($this->input->post('student_id'))
        // {
        // echo $this->input->post($student_id);
        // echo($student_id).'-';
        // echo($document_name);
        // exit();
            $filename=array();
            if(count($_FILES['copy_of_form_b']['name']) > 0 && $_FILES['copy_of_form_b']['name'] !='')
            {
                $files = $_FILES['copy_of_form_b'];
                $count = count($_FILES['copy_of_form_b']['name']);
                //echo $_FILES['file']['name'];exit();
                for($i=0; $i<$count;$i++)
                {
                    $config = array();
                    $projects_folder_path = './assets/uploads/';
                    $thumb = $projects_folder_path . 'thumb';
                    $_FILES['copy_of_form_b']['name']= $files['name'][$i];
                    $_FILES['copy_of_form_b']['type']= $files['type'][$i];
                    $_FILES['copy_of_form_b']['tmp_name']= $files['tmp_name'][$i];
                    $_FILES['copy_of_form_b']['error']= $files['error'][$i];
                    $_FILES['copy_of_form_b']['size']= $files['size'][$i];      
                    $config['upload_path']      = $projects_folder_path;
                    $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                    $config['max_size']         = 2048;
                    // $config['encrypt_name']     = TRUE;
                // $config['overwrite']        = TRUE;
                    $config['file_name']        = $_FILES['copy_of_form_b']['name'];
                    // $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('copy_of_form_b'))
                    {
                        $error_file_arr = array('error' => $this->upload->display_errors());                
                        $this->session->set_flashdata('err_message', $error_file_arr['error']);
                        $r=2;
                        echo json_encode($r);
                        exit();
                    }
                    else
                    {
                        $data['delete_record'] = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                        if(file_exists($projects_folder_path.$data['delete_record']['copy_of_form_b'])!='./assets/uploads/')
                        {
                            unlink($projects_folder_path.$data['delete_record']['copy_of_form_b']);
                        }
                        $data_image_upload = array('upload_image_data' => $this->upload->data());
                        $image_name =$data_image_upload['upload_image_data']['file_name']; 
                        $full_path = $data_image_upload['upload_image_data']['full_path'];
                        // ------------------------------------------------------------------------ 
                        $this->load->library('image_lib');
                        $config['image_library']    = 'GD2';
                        $config['source_image']     = './assets/uploads/' . $image_name;
                        $config['maintain_ratio']   = TRUE;
                        $config['master_dim']   = 'auto';
                        $config['quality']  = 70;
                        $config['width'] = 1024;
                        $config['height'] = 768;
                        $config['new_image'] = './assets/uploads/' . $image_name;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        // ------------------------------------------------------------------------
                    }
                    $filename[] = $image_name;
                } // end for loop                      
            }
            foreach ($filename as $key => $value)
            {
                $insert_image=array(
                    'copy_of_form_b'=> $value,
                    // 'student_id' => $student_id,
                    // 'stage_id' => $stage_id,
                    'update_date' => date("Y-m-d g:i:s"),
                    // 'category_status' => 1,
                    // 'user_id' =>$this->session->userdata('user_id'),
                );
                // echo "<pre>";
                // print_r ($insert_image);
                // echo "</pre>";
                // exit();
                $add_image = $this->Common_model->update_table('uploads',$where=array('student_id'=>$student_id),$insert_image);                           
            }
            if ($add_image)
            {
                $record = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                echo json_encode($record);
            }
        // }
        // else
        // {
        //  $data['active']='registered_students';
        //  $this->load->view('admin/header',$data);
        //  $data['student_id']=$student_id;
        //  $data['error']='';
        //  $this->load->view('registration/file_completion',$data);
        //  $this->load->view('admin/footer',$data);
        // }
    }
    public function file_completion5($student_id='',$document_name='')
    {
        // if($this->input->post('student_id'))
        // {
        // echo $this->input->post($student_id);
        // echo($student_id).'-';
        // echo($document_name);
        // exit();
            $filename=array();
            if(count($_FILES['copy_of_guardian_cnic']['name']) > 0 && $_FILES['copy_of_guardian_cnic']['name'] !='')
            {
                $files = $_FILES['copy_of_guardian_cnic'];
                $count = count($_FILES['copy_of_guardian_cnic']['name']);
                //echo $_FILES['file']['name'];exit();
                for($i=0; $i<$count;$i++)
                {
                    $config = array();
                    $projects_folder_path = './assets/uploads/';
                    $thumb = $projects_folder_path . 'thumb';
                    $_FILES['copy_of_guardian_cnic']['name']= $files['name'][$i];
                    $_FILES['copy_of_guardian_cnic']['type']= $files['type'][$i];
                    $_FILES['copy_of_guardian_cnic']['tmp_name']= $files['tmp_name'][$i];
                    $_FILES['copy_of_guardian_cnic']['error']= $files['error'][$i];
                    $_FILES['copy_of_guardian_cnic']['size']= $files['size'][$i];   
                    // $file_ext  = ltrim(strtolower(strrchr($_FILES['copy_of_paid_registration_slip']['name'],'.')),'.');  
                    // $file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;        
                    $config['upload_path']      = $projects_folder_path;
                    $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                    $config['max_size']         = 2048;
                    // $config['encrypt_name']     = TRUE;
                // $config['overwrite']        = TRUE;
                    $config['file_name']        = $_FILES['copy_of_guardian_cnic']['name'];
                    // $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('copy_of_guardian_cnic'))
                    {
                        $error_file_arr = array('error' => $this->upload->display_errors());                
                        $this->session->set_flashdata('err_message', $error_file_arr['error']);
                        $r=2;
                        echo json_encode($r);
                        exit();
                    }
                    else
                    {
                        $data['delete_record'] = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                        if(file_exists($projects_folder_path.$data['delete_record']['copy_of_guardian_cnic'])!='./assets/uploads/')
                        {
                            unlink($projects_folder_path.$data['delete_record']['copy_of_guardian_cnic']);
                        }
                        $data_image_upload = array('upload_image_data' => $this->upload->data());
                        $image_name =$data_image_upload['upload_image_data']['file_name']; 
                        $full_path = $data_image_upload['upload_image_data']['full_path'];
                        // ------------------------------------------------------------------------ 
                        $this->load->library('image_lib');
                        $config['image_library']    = 'GD2';
                        $config['source_image']     = './assets/uploads/' . $image_name;
                        $config['maintain_ratio']   = TRUE;
                        $config['master_dim']   = 'auto';
                        $config['quality']  = 70;
                        $config['width'] = 1024;
                        $config['height'] = 768;
                        $config['new_image'] = './assets/uploads/' . $image_name;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        // ------------------------------------------------------------------------            
                   
                    }
                        $filename[] = $image_name;
                } // end for loop                      
            }
            foreach ($filename as $key => $value)
            {
                $insert_image=array(
                    'copy_of_guardian_cnic'=> $value,
                    // 'student_id' => $student_id,
                    // 'stage_id' => $stage_id,
                    'update_date' => date("Y-m-d g:i:s"),
                    // 'category_status' => 1,
                    // 'user_id' =>$this->session->userdata('user_id'),
                );
                // echo "<pre>";
                // print_r ($insert_image);
                // echo "</pre>";
                // exit();
                $add_image = $this->Common_model->update_table('uploads',$where=array('student_id'=>$student_id),$insert_image);                           
            }
            if ($add_image)
            {
                $record = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                echo json_encode($record);
            }
        // }
        // else
        // {
        //  $data['active']='registered_students';
        //  $this->load->view('admin/header',$data);
        //  $data['student_id']=$student_id;
        //  $data['error']='';
        //  $this->load->view('registration/file_completion',$data);
        //  $this->load->view('admin/footer',$data);
        // }
    }
    public function file_completion6($student_id='',$document_name='')
    {
        // if($this->input->post('student_id'))
        // {
        // echo $this->input->post($student_id);
        // echo($student_id).'-';
        // echo($document_name);
        // exit();
            $filename=array();
            if(count($_FILES['school_leaving_certificate']['name']) > 0 && $_FILES['school_leaving_certificate']['name'] !='')
            {
                $files = $_FILES['school_leaving_certificate'];
                $count = count($_FILES['school_leaving_certificate']['name']);
                //echo $_FILES['file']['name'];exit();
                for($i=0; $i<$count;$i++)
                {
                    $config = array();
                    $projects_folder_path = './assets/uploads/';
                    $thumb = $projects_folder_path . 'thumb';
                    $_FILES['school_leaving_certificate']['name']= $files['name'][$i];
                    $_FILES['school_leaving_certificate']['type']= $files['type'][$i];
                    $_FILES['school_leaving_certificate']['tmp_name']= $files['tmp_name'][$i];
                    $_FILES['school_leaving_certificate']['error']= $files['error'][$i];
                    $_FILES['school_leaving_certificate']['size']= $files['size'][$i];   
                    // $file_ext  = ltrim(strtolower(strrchr($_FILES['copy_of_paid_registration_slip']['name'],'.')),'.');  
                    // $file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;        
                    $config['upload_path']      = $projects_folder_path;
                    $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                    $config['max_size']         = 2048;
                    // $config['encrypt_name']     = TRUE;
                // $config['overwrite']        = TRUE;
                    $config['file_name']        = $_FILES['school_leaving_certificate']['name'];
                    // $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('school_leaving_certificate'))
                    {
                        $error_file_arr = array('error' => $this->upload->display_errors());                
                        $this->session->set_flashdata('err_message', $error_file_arr['error']);
                        $r=2;
                        echo json_encode($r);
                        exit();
                    }
                    else
                    {
                        $data['delete_record'] = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                        if(file_exists($projects_folder_path.$data['delete_record']['school_leaving_certificate'])!='./assets/uploads/')
                        {
                            unlink($projects_folder_path.$data['delete_record']['school_leaving_certificate']);
                        }
                        $data_image_upload = array('upload_image_data' => $this->upload->data());
                        $image_name =$data_image_upload['upload_image_data']['file_name']; 
                        $full_path = $data_image_upload['upload_image_data']['full_path'];
                        // ------------------------------------------------------------------------ 
                        $this->load->library('image_lib');
                        $config['image_library']    = 'GD2';
                        $config['source_image']     = './assets/uploads/' . $image_name;
                        $config['maintain_ratio']   = TRUE;
                        $config['master_dim']   = 'auto';
                        $config['quality']  = 70;
                        $config['width'] = 1024;
                        $config['height'] = 768;
                        $config['new_image'] = './assets/uploads/' . $image_name;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        // ------------------------------------------------------------------------            
                    }
                        $filename[] = $image_name;
                } // end for loop                      
            }
            foreach ($filename as $key => $value)
            {
                $insert_image=array(
                    'school_leaving_certificate'=> $value,
                    // 'student_id' => $student_id,
                    // 'stage_id' => $stage_id,
                    'update_date' => date("Y-m-d g:i:s"),
                    // 'category_status' => 1,
                    // 'user_id' =>$this->session->userdata('user_id'),
                );
                // echo "<pre>";
                // print_r ($insert_image);
                // echo "</pre>";
                // exit();
                $add_image = $this->Common_model->update_table('uploads',$where=array('student_id'=>$student_id),$insert_image);                           
            }
            if ($add_image)
            {
                $record = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                echo json_encode($record);
            }
        // }
        // else
        // {
        //  $data['active']='registered_students';
        //  $this->load->view('admin/header',$data);
        //  $data['student_id']=$student_id;
        //  $data['error']='';
        //  $this->load->view('registration/file_completion',$data);
        //  $this->load->view('admin/footer',$data);
        // }
    }
    public function file_completion7($student_id='',$document_name='')
    {
        // if($this->input->post('student_id'))
        // {
        // echo $this->input->post($student_id);
        // echo($student_id).'-';
        // echo($document_name);
        // exit();
            $filename=array();
            if(count($_FILES['record_of_results']['name']) > 0 && $_FILES['record_of_results']['name'] !='')
            {
                $files = $_FILES['record_of_results'];
                $count = count($_FILES['record_of_results']['name']);
                //echo $_FILES['file']['name'];exit();
                for($i=0; $i<$count;$i++)
                {
                    $config = array();
                    $projects_folder_path = './assets/uploads/';
                    $thumb = $projects_folder_path . 'thumb';
                    $_FILES['record_of_results']['name']= $files['name'][$i];
                    $_FILES['record_of_results']['type']= $files['type'][$i];
                    $_FILES['record_of_results']['tmp_name']= $files['tmp_name'][$i];
                    $_FILES['record_of_results']['error']= $files['error'][$i];
                    $_FILES['record_of_results']['size']= $files['size'][$i];   
                    // $file_ext  = ltrim(strtolower(strrchr($_FILES['copy_of_paid_registration_slip']['name'],'.')),'.');  
                    // $file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;        
                    $config['upload_path']      = $projects_folder_path;
                    $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                    $config['max_size']         = 2048;
                    // $config['encrypt_name']     = TRUE;
                // $config['overwrite']        = TRUE;
                    $config['file_name']        = $_FILES['record_of_results']['name'];
                    // $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('record_of_results'))
                    {
                        $error_file_arr = array('error' => $this->upload->display_errors());                
                        $this->session->set_flashdata('err_message', $error_file_arr['error']);
                        $r=2;
                        echo json_encode($r);
                        exit();
                    }
                    else
                    {
                        $data['delete_record'] = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                        if(file_exists($projects_folder_path.$data['delete_record']['record_of_results'])!='./assets/uploads/')
                        {
                            unlink($projects_folder_path.$data['delete_record']['record_of_results']);
                        }
                        $data_image_upload = array('upload_image_data' => $this->upload->data());
                        $image_name =$data_image_upload['upload_image_data']['file_name']; 
                        $full_path = $data_image_upload['upload_image_data']['full_path'];
                        // ------------------------------------------------------------------------ 
                        $this->load->library('image_lib');
                        $config['image_library']    = 'GD2';
                        $config['source_image']     = './assets/uploads/' . $image_name;
                        $config['maintain_ratio']   = TRUE;
                        $config['master_dim']   = 'auto';
                        $config['quality']  = 70;
                        $config['width'] = 1024;
                        $config['height'] = 768;
                        $config['new_image'] = './assets/uploads/' . $image_name;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        // ------------------------------------------------------------------------            
                    }
                    $filename[] = $image_name;
                } // end for loop                      
            }
            foreach ($filename as $key => $value)
            {
                $insert_image=array(
                    'record_of_results'=> $value,
                    // 'student_id' => $student_id,
                    // 'stage_id' => $stage_id,
                    'update_date' => date("Y-m-d g:i:s"),
                    // 'category_status' => 1,
                    // 'user_id' =>$this->session->userdata('user_id'),
                );
                // echo "<pre>";
                // print_r ($insert_image);
                // echo "</pre>";
                // exit();
                $add_image = $this->Common_model->update_table('uploads',$where=array('student_id'=>$student_id),$insert_image);                           
            }
            if ($add_image)
            {
                $record = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                echo json_encode($record);
            }
        // }
        // else
        // {
        //  $data['active']='registered_students';
        //  $this->load->view('admin/header',$data);
        //  $data['student_id']=$student_id;
        //  $data['error']='';
        //  $this->load->view('registration/file_completion',$data);
        //  $this->load->view('admin/footer',$data);
        // }
    }
    public function file_completion8($student_id='',$document_name='')
    {
        // if($this->input->post('student_id'))
        // {
        // echo $this->input->post($student_id);
        // echo($student_id).'-';
        // echo($document_name);
        // exit();
            $filename=array();
            if(count($_FILES['merit_certificates']['name']) > 0 && $_FILES['merit_certificates']['name'] !='')
            {
                $files = $_FILES['merit_certificates'];
                $count = count($_FILES['merit_certificates']['name']);
                //echo $_FILES['file']['name'];exit();
                for($i=0; $i<$count;$i++)
                {
                    $config = array();
                    $projects_folder_path = './assets/uploads/';
                    $thumb = $projects_folder_path . 'thumb';
                    $_FILES['merit_certificates']['name']= $files['name'][$i];
                    $_FILES['merit_certificates']['type']= $files['type'][$i];
                    $_FILES['merit_certificates']['tmp_name']= $files['tmp_name'][$i];
                    $_FILES['merit_certificates']['error']= $files['error'][$i];
                    $_FILES['merit_certificates']['size']= $files['size'][$i];   
                    // $file_ext  = ltrim(strtolower(strrchr($_FILES['copy_of_paid_registration_slip']['name'],'.')),'.');  
                    // $file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;        
                    $config['upload_path']      = $projects_folder_path;
                    $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                    $config['max_size']         = 2048;
                    // $config['encrypt_name']     = TRUE;
                // $config['overwrite']        = TRUE;
                    $config['file_name']        = $_FILES['merit_certificates']['name'];
                    // $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('merit_certificates'))
                    {
                        $error_file_arr = array('error' => $this->upload->display_errors());                
                        $this->session->set_flashdata('err_message', $error_file_arr['error']);
                        $r=2;
                        echo json_encode($r);
                        exit();
                    }
                    else
                    {
                        $data['delete_record'] = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                        if(file_exists($projects_folder_path.$data['delete_record']['merit_certificates'])!='./assets/uploads/')
                        {
                            unlink($projects_folder_path.$data['delete_record']['merit_certificates']);
                        }
                        $data_image_upload = array('upload_image_data' => $this->upload->data());
                        $image_name =$data_image_upload['upload_image_data']['file_name']; 
                        $full_path = $data_image_upload['upload_image_data']['full_path'];
                        // ------------------------------------------------------------------------ 
                        $this->load->library('image_lib');
                        $config['image_library']    = 'GD2';
                        $config['source_image']     = './assets/uploads/' . $image_name;
                        $config['maintain_ratio']   = TRUE;
                        $config['master_dim']   = 'auto';
                        $config['quality']  = 70;
                        $config['width'] = 1024;
                        $config['height'] = 768;
                        $config['new_image'] = './assets/uploads/' . $image_name;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        // ------------------------------------------------------------------------            
                    }
                    $filename[] = $image_name;
                } // end for loop                      
            }
            foreach ($filename as $key => $value)
            {
                $insert_image=array(
                    'merit_certificates'=> $value,
                    // 'student_id' => $student_id,
                    // 'stage_id' => $stage_id,
                    'update_date' => date("Y-m-d g:i:s"),
                    // 'category_status' => 1,
                    // 'user_id' =>$this->session->userdata('user_id'),
                );
                // echo "<pre>";
                // print_r ($insert_image);
                // echo "</pre>";
                // exit();
                $add_image = $this->Common_model->update_table('uploads',$where=array('student_id'=>$student_id),$insert_image);                           
            }
            if ($add_image)
            {
                $record = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                echo json_encode($record);
            }
        // }
        // else
        // {
        //  $data['active']='registered_students';
        //  $this->load->view('admin/header',$data);
        //  $data['student_id']=$student_id;
        //  $data['error']='';
        //  $this->load->view('registration/file_completion',$data);
        //  $this->load->view('admin/footer',$data);
        // }
    }
    public function file_completion9($student_id='',$document_name='')
    {
        // if($this->input->post('student_id'))
        // {
        // echo $this->input->post($student_id);
        // echo($student_id).'-';
        // echo($document_name);
        // exit();
            $filename=array();
            if(count($_FILES['gap_certificate']['name']) > 0 && $_FILES['gap_certificate']['name'] !='')
            {
                $files = $_FILES['gap_certificate'];
                $count = count($_FILES['gap_certificate']['name']);
                //echo $_FILES['file']['name'];exit();
                for($i=0; $i<$count;$i++)
                {
                    $config = array();
                    $projects_folder_path = './assets/uploads/';
                    $thumb = $projects_folder_path . 'thumb';
                    $_FILES['gap_certificate']['name']= $files['name'][$i];
                    $_FILES['gap_certificate']['type']= $files['type'][$i];
                    $_FILES['gap_certificate']['tmp_name']= $files['tmp_name'][$i];
                    $_FILES['gap_certificate']['error']= $files['error'][$i];
                    $_FILES['gap_certificate']['size']= $files['size'][$i];   
                    // $file_ext  = ltrim(strtolower(strrchr($_FILES['copy_of_paid_registration_slip']['name'],'.')),'.');  
                    // $file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;        
                    $config['upload_path']      = $projects_folder_path;
                    $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                    $config['max_size']         = 2048;
                    // $config['encrypt_name']     = TRUE;
                // $config['overwrite']        = TRUE;
                    $config['file_name']        = $_FILES['gap_certificate']['name'];
                    // $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('gap_certificate'))
                    {
                        $error_file_arr = array('error' => $this->upload->display_errors());                
                        $this->session->set_flashdata('err_message', $error_file_arr['error']);
                        $r=2;
                        echo json_encode($r);
                        exit();
                    }
                    else
                    {
                        $data['delete_record'] = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                        if(file_exists($projects_folder_path.$data['delete_record']['gap_certificate'])!='./assets/uploads/')
                        {
                            unlink($projects_folder_path.$data['delete_record']['gap_certificate']);
                        }
                        $data_image_upload = array('upload_image_data' => $this->upload->data());
                        $image_name =$data_image_upload['upload_image_data']['file_name']; 
                        $full_path = $data_image_upload['upload_image_data']['full_path'];
                        // ------------------------------------------------------------------------ 
                        $this->load->library('image_lib');
                        $config['image_library']    = 'GD2';
                        $config['source_image']     = './assets/uploads/' . $image_name;
                        $config['maintain_ratio']   = TRUE;
                        $config['master_dim']   = 'auto';
                        $config['quality']  = 70;
                        $config['width'] = 1024;
                        $config['height'] = 768;
                        $config['new_image'] = './assets/uploads/' . $image_name;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        // ------------------------------------------------------------------------
                    }
                    $filename[] = $image_name;
                } // end for loop                      
            }
            foreach ($filename as $key => $value)
            {
                $insert_image=array(
                    'gap_certificate'=> $value,
                    // 'student_id' => $student_id,
                    // 'stage_id' => $stage_id,
                    'update_date' => date("Y-m-d g:i:s"),
                    // 'category_status' => 1,
                    // 'user_id' =>$this->session->userdata('user_id'),
                );
                // echo "<pre>";
                // print_r ($insert_image);
                // echo "</pre>";
                // exit();
                $add_image = $this->Common_model->update_table('uploads',$where=array('student_id'=>$student_id),$insert_image);                           
            }
            if ($add_image)
            {
                $record = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                echo json_encode($record);
            }
        // }
        // else
        // {
        //  $data['active']='registered_students';
        //  $this->load->view('admin/header',$data);
        //  $data['student_id']=$student_id;
        //  $data['error']='';
        //  $this->load->view('registration/file_completion',$data);
        //  $this->load->view('admin/footer',$data);
        // }
    }
    public function file_completion10($student_id='',$document_name='')
    {
        // if($this->input->post('student_id'))
        // {
        // echo $this->input->post($student_id);
        // echo($student_id).'-';
        // echo($document_name);
        // exit();
            $filename=array();
            if(count($_FILES['character_certificate']['name']) > 0 && $_FILES['character_certificate']['name'] !='')
            {
                $files = $_FILES['character_certificate'];
                $count = count($_FILES['character_certificate']['name']);
                //echo $_FILES['file']['name'];exit();
                for($i=0; $i<$count;$i++)
                {
                    $config = array();
                    $projects_folder_path = './assets/uploads/';
                    $thumb = $projects_folder_path . 'thumb';
                    $_FILES['character_certificate']['name']= $files['name'][$i];
                    $_FILES['character_certificate']['type']= $files['type'][$i];
                    $_FILES['character_certificate']['tmp_name']= $files['tmp_name'][$i];
                    $_FILES['character_certificate']['error']= $files['error'][$i];
                    $_FILES['character_certificate']['size']= $files['size'][$i];   
                    // $file_ext  = ltrim(strtolower(strrchr($_FILES['copy_of_paid_registration_slip']['name'],'.')),'.');  
                    // $file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;        
                    $config['upload_path']      = $projects_folder_path;
                    $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                    $config['max_size']         = 2048;
                    // $config['encrypt_name']     = TRUE;
                // $config['overwrite']        = TRUE;
                    $config['file_name']        = $_FILES['character_certificate']['name'];
                    // $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('character_certificate'))
                    {
                        $error_file_arr = array('error' => $this->upload->display_errors());                
                        $this->session->set_flashdata('err_message', $error_file_arr['error']);
                        $r=2;
                        echo json_encode($r);
                        exit();
                    }
                    else
                    {
                        $data['delete_record'] = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                        if(file_exists($projects_folder_path.$data['delete_record']['character_certificate'])!='./assets/uploads/')
                        {
                            unlink($projects_folder_path.$data['delete_record']['character_certificate']);
                        }
                        $data_image_upload = array('upload_image_data' => $this->upload->data());
                        $image_name =$data_image_upload['upload_image_data']['file_name']; 
                        $full_path = $data_image_upload['upload_image_data']['full_path'];
                        // ------------------------------------------------------------------------ 
                        $this->load->library('image_lib');
                        $config['image_library']    = 'GD2';
                        $config['source_image']     = './assets/uploads/' . $image_name;
                        $config['maintain_ratio']   = TRUE;
                        $config['master_dim']   = 'auto';
                        $config['quality']  = 70;
                        $config['width'] = 1024;
                        $config['height'] = 768;
                        $config['new_image'] = './assets/uploads/' . $image_name;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        // ------------------------------------------------------------------------
                    }
                    $filename[] = $image_name;
                } // end for loop                      
            }
            foreach ($filename as $key => $value)
            {
                $insert_image=array(
                    'character_certificate'=> $value,
                    // 'student_id' => $student_id,
                    // 'stage_id' => $stage_id,
                    'update_date' => date("Y-m-d g:i:s"),
                    // 'category_status' => 1,
                    // 'user_id' =>$this->session->userdata('user_id'),
                );
                // echo "<pre>";
                // print_r ($insert_image);
                // echo "</pre>";
                // exit();
                $add_image = $this->Common_model->update_table('uploads',$where=array('student_id'=>$student_id),$insert_image);                           
            }
            if ($add_image)
            {
                $record = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                echo json_encode($record);
            }
        // }
        // else
        // {
        //  $data['active']='registered_students';
        //  $this->load->view('admin/header',$data);
        //  $data['student_id']=$student_id;
        //  $data['error']='';
        //  $this->load->view('registration/file_completion',$data);
        //  $this->load->view('admin/footer',$data);
        // }
    }
    public function file_completion11($student_id='',$document_name='')
    {
        // if($this->input->post('student_id'))
        // {
        // echo $this->input->post($student_id);
        // echo($student_id).'-';
        // echo($document_name);
        // exit();
            $filename=array();
            if(count($_FILES['migration_certificate']['name']) > 0 && $_FILES['migration_certificate']['name'] !='')
            {
                $files = $_FILES['migration_certificate'];
                $count = count($_FILES['migration_certificate']['name']);
                //echo $_FILES['file']['name'];exit();
                for($i=0; $i<$count;$i++)
                {
                    $config = array();
                    $projects_folder_path = './assets/uploads/';
                    $thumb = $projects_folder_path . 'thumb';
                    $_FILES['migration_certificate']['name']= $files['name'][$i];
                    $_FILES['migration_certificate']['type']= $files['type'][$i];
                    $_FILES['migration_certificate']['tmp_name']= $files['tmp_name'][$i];
                    $_FILES['migration_certificate']['error']= $files['error'][$i];
                    $_FILES['migration_certificate']['size']= $files['size'][$i];   
                    // $file_ext  = ltrim(strtolower(strrchr($_FILES['copy_of_paid_registration_slip']['name'],'.')),'.');  
                    // $file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;        
                    $config['upload_path']      = $projects_folder_path;
                    $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                    $config['max_size']         = 2048;
                    // $config['encrypt_name']     = TRUE;
                // $config['overwrite']        = TRUE;
                    $config['file_name']        = $_FILES['migration_certificate']['name'];
                    // $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('migration_certificate'))
                    {
                        $error_file_arr = array('error' => $this->upload->display_errors());                
                        $this->session->set_flashdata('err_message', $error_file_arr['error']);
                        $r=2;
                        echo json_encode($r);
                        exit();
                    }
                    else
                    {
                        $data['delete_record'] = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                        if(file_exists($projects_folder_path.$data['delete_record']['migration_certificate'])!='./assets/uploads/')
                        {
                            unlink($projects_folder_path.$data['delete_record']['migration_certificate']);
                        }
                        $data_image_upload = array('upload_image_data' => $this->upload->data());
                        $image_name =$data_image_upload['upload_image_data']['file_name']; 
                        $full_path = $data_image_upload['upload_image_data']['full_path'];
                        // ------------------------------------------------------------------------ 
                        $this->load->library('image_lib');
                        $config['image_library']    = 'GD2';
                        $config['source_image']     = './assets/uploads/' . $image_name;
                        $config['maintain_ratio']   = TRUE;
                        $config['master_dim']   = 'auto';
                        $config['quality']  = 70;
                        $config['width'] = 1024;
                        $config['height'] = 768;
                        $config['new_image'] = './assets/uploads/' . $image_name;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        // ------------------------------------------------------------------------
                    }
                    $filename[] = $image_name;
                } // end for loop                      
            }
            foreach ($filename as $key => $value)
            {
                $insert_image=array(
                    'migration_certificate'=> $value,
                    // 'student_id' => $student_id,
                    // 'stage_id' => $stage_id,
                    'update_date' => date("Y-m-d g:i:s"),
                    // 'category_status' => 1,
                    // 'user_id' =>$this->session->userdata('user_id'),
                );
                // echo "<pre>";
                // print_r ($insert_image);
                // echo "</pre>";
                // exit();
                $add_image = $this->Common_model->update_table('uploads',$where=array('student_id'=>$student_id),$insert_image);                           
            }
            if ($add_image)
            {
                $record = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                echo json_encode($record);
            }
        // }
        // else
        // {
        //  $data['active']='registered_students';
        //  $this->load->view('admin/header',$data);
        //  $data['student_id']=$student_id;
        //  $data['error']='';
        //  $this->load->view('registration/file_completion',$data);
        //  $this->load->view('admin/footer',$data);
        // }
    }
    public function file_completion12($student_id='',$document_name='')
    {
        // if($this->input->post('student_id'))
        // {
        // echo $this->input->post($student_id);
        // echo($student_id).'-';
        // echo($document_name);
        // exit();
            $filename=array();
            if(count($_FILES['registration_card']['name']) > 0 && $_FILES['registration_card']['name'] !='')
            {
                $files = $_FILES['registration_card'];
                $count = count($_FILES['registration_card']['name']);
                //echo $_FILES['file']['name'];exit();
                for($i=0; $i<$count;$i++)
                {
                    $config = array();
                    $projects_folder_path = './assets/uploads/';
                    $thumb = $projects_folder_path . 'thumb';
                    $_FILES['registration_card']['name']= $files['name'][$i];
                    $_FILES['registration_card']['type']= $files['type'][$i];
                    $_FILES['registration_card']['tmp_name']= $files['tmp_name'][$i];
                    $_FILES['registration_card']['error']= $files['error'][$i];
                    $_FILES['registration_card']['size']= $files['size'][$i];   
                    // $file_ext  = ltrim(strtolower(strrchr($_FILES['copy_of_paid_registration_slip']['name'],'.')),'.');  
                    // $file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;        
                    $config['upload_path']      = $projects_folder_path;
                    $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                    $config['max_size']         = 2048;
                    // $config['encrypt_name']     = TRUE;
                // $config['overwrite']        = TRUE;
                    $config['file_name']        = $_FILES['registration_card']['name'];
                    // $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('registration_card'))
                    {
                        $error_file_arr = array('error' => $this->upload->display_errors());                
                        $this->session->set_flashdata('err_message', $error_file_arr['error']);
                        $r=2;
                        echo json_encode($r);
                        exit();
                    }
                    else
                    {
                        $data['delete_record'] = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                        if(file_exists($projects_folder_path.$data['delete_record']['registration_card'])!='./assets/uploads/')
                        {
                            unlink($projects_folder_path.$data['delete_record']['registration_card']);
                        }
                        $data_image_upload = array('upload_image_data' => $this->upload->data());
                        $image_name =$data_image_upload['upload_image_data']['file_name']; 
                        $full_path = $data_image_upload['upload_image_data']['full_path'];
                        // ------------------------------------------------------------------------ 
                        $this->load->library('image_lib');
                        $config['image_library']    = 'GD2';
                        $config['source_image']     = './assets/uploads/' . $image_name;
                        $config['maintain_ratio']   = TRUE;
                        $config['master_dim']   = 'auto';
                        $config['quality']  = 70;
                        $config['width'] = 1024;
                        $config['height'] = 768;
                        $config['new_image'] = './assets/uploads/' . $image_name;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        // ------------------------------------------------------------------------
                    }
                    $filename[] = $image_name;
                } // end for loop                      
            }
            foreach ($filename as $key => $value)
            {
                $insert_image=array(
                    'registration_card'=> $value,
                    // 'student_id' => $student_id,
                    // 'stage_id' => $stage_id,
                    'update_date' => date("Y-m-d g:i:s"),
                    // 'category_status' => 1,
                    // 'user_id' =>$this->session->userdata('user_id'),
                );
                // echo "<pre>";
                // print_r ($insert_image);
                // echo "</pre>";
                // exit();
                $add_image = $this->Common_model->update_table('uploads',$where=array('student_id'=>$student_id),$insert_image);                           
            }
            if ($add_image)
            {
                $record = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                echo json_encode($record);
            }
        // }
        // else
        // {
        //  $data['active']='registered_students';
        //  $this->load->view('admin/header',$data);
        //  $data['student_id']=$student_id;
        //  $data['error']='';
        //  $this->load->view('registration/file_completion',$data);
        //  $this->load->view('admin/footer',$data);
        // }
    }
    public function file_completion13($student_id='',$document_name='')
    {
        // if($this->input->post('student_id'))
        // {
        // echo $this->input->post($student_id);
        // echo($student_id).'-';
        // echo($document_name);
        // exit();
            $filename=array();
            if(count($_FILES['equivalence_certificate']['name']) > 0 && $_FILES['equivalence_certificate']['name'] !='')
            {
                $files = $_FILES['equivalence_certificate'];
                $count = count($_FILES['equivalence_certificate']['name']);
                //echo $_FILES['file']['name'];exit();
                for($i=0; $i<$count;$i++)
                {
                    $config = array();
                    $projects_folder_path = './assets/uploads/';
                    $thumb = $projects_folder_path . 'thumb';
                    $_FILES['equivalence_certificate']['name']= $files['name'][$i];
                    $_FILES['equivalence_certificate']['type']= $files['type'][$i];
                    $_FILES['equivalence_certificate']['tmp_name']= $files['tmp_name'][$i];
                    $_FILES['equivalence_certificate']['error']= $files['error'][$i];
                    $_FILES['equivalence_certificate']['size']= $files['size'][$i];   
                    // $file_ext  = ltrim(strtolower(strrchr($_FILES['copy_of_paid_registration_slip']['name'],'.')),'.');  
                    // $file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;        
                    $config['upload_path']      = $projects_folder_path;
                    $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                    $config['max_size']         = 2048;
                    // $config['encrypt_name']     = TRUE;
                // $config['overwrite']        = TRUE;
                    $config['file_name']        = $_FILES['equivalence_certificate']['name'];
                    // $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('equivalence_certificate'))
                    {
                        $error_file_arr = array('error' => $this->upload->display_errors());                
                        $this->session->set_flashdata('err_message', $error_file_arr['error']);
                        $r=2;
                        echo json_encode($r);
                        exit();
                    }
                    else
                    {
                        $data['delete_record'] = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                        if(file_exists($projects_folder_path.$data['delete_record']['equivalence_certificate'])!='./assets/uploads/')
                        {
                            unlink($projects_folder_path.$data['delete_record']['equivalence_certificate']);
                        }
                        $data_image_upload = array('upload_image_data' => $this->upload->data());
                        $image_name =$data_image_upload['upload_image_data']['file_name']; 
                        $full_path = $data_image_upload['upload_image_data']['full_path'];
                        // ------------------------------------------------------------------------ 
                        $this->load->library('image_lib');
                        $config['image_library']    = 'GD2';
                        $config['source_image']     = './assets/uploads/' . $image_name;
                        $config['maintain_ratio']   = TRUE;
                        $config['master_dim']   = 'auto';
                        $config['quality']  = 70;
                        $config['width'] = 1024;
                        $config['height'] = 768;
                        $config['new_image'] = './assets/uploads/' . $image_name;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        // ------------------------------------------------------------------------
                    }
                    $filename[] = $image_name;
                } // end for loop                      
            }
            foreach ($filename as $key => $value)
            {
                $insert_image=array(
                    'equivalence_certificate'=> $value,
                    // 'student_id' => $student_id,
                    // 'stage_id' => $stage_id,
                    'update_date' => date("Y-m-d g:i:s"),
                    // 'category_status' => 1,
                    // 'user_id' =>$this->session->userdata('user_id'),
                );
                // echo "<pre>";
                // print_r ($insert_image);
                // echo "</pre>";
                // exit();
                $add_image = $this->Common_model->update_table('uploads',$where=array('student_id'=>$student_id),$insert_image);                           
            }
            if ($add_image)
            {
                $record = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                echo json_encode($record);
            }
        // }
        // else
        // {
        //  $data['active']='registered_students';
        //  $this->load->view('admin/header',$data);
        //  $data['student_id']=$student_id;
        //  $data['error']='';
        //  $this->load->view('registration/file_completion',$data);
        //  $this->load->view('admin/footer',$data);
        // }
    }
    public function file_completion14($student_id='',$document_name='')
    {
        // if($this->input->post('student_id'))
        // {
        // echo $this->input->post($student_id);
        // echo($student_id).'-';
        // echo($document_name);
        // exit();
            $filename=array();
            if(count($_FILES['cancelation_of_result']['name']) > 0 && $_FILES['cancelation_of_result']['name'] !='')
            {
                $files = $_FILES['cancelation_of_result'];
                $count = count($_FILES['cancelation_of_result']['name']);
                //echo $_FILES['file']['name'];exit();
                for($i=0; $i<$count;$i++)
                {
                    $config = array();
                    $projects_folder_path = './assets/uploads/';
                    $thumb = $projects_folder_path . 'thumb';
                    $_FILES['cancelation_of_result']['name']= $files['name'][$i];
                    $_FILES['cancelation_of_result']['type']= $files['type'][$i];
                    $_FILES['cancelation_of_result']['tmp_name']= $files['tmp_name'][$i];
                    $_FILES['cancelation_of_result']['error']= $files['error'][$i];
                    $_FILES['cancelation_of_result']['size']= $files['size'][$i];   
                    // $file_ext  = ltrim(strtolower(strrchr($_FILES['copy_of_paid_registration_slip']['name'],'.')),'.');  
                    // $file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;        
                    $config['upload_path']      = $projects_folder_path;
                    $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                    $config['max_size']         = 2048;
                    // $config['encrypt_name']     = TRUE;
                // $config['overwrite']        = TRUE;
                    $config['file_name']        = $_FILES['cancelation_of_result']['name'];
                    // $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('cancelation_of_result'))
                    {
                        $error_file_arr = array('error' => $this->upload->display_errors());                
                        $this->session->set_flashdata('err_message', $error_file_arr['error']);
                        $r=2;
                        echo json_encode($r);
                        exit();
                    }
                    else
                    {
                        $data['delete_record'] = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                        if(file_exists($projects_folder_path.$data['delete_record']['cancelation_of_result'])!='./assets/uploads/')
                        {
                            echo $projects_folder_path.$data['delete_record']['cancelation_of_result'];
                            echo "agaya";
                            unlink($projects_folder_path.$data['delete_record']['cancelation_of_result']);
                        }
                        $data_image_upload = array('upload_image_data' => $this->upload->data());
                        $image_name =$data_image_upload['upload_image_data']['file_name']; 
                        $full_path = $data_image_upload['upload_image_data']['full_path'];
                        // ------------------------------------------------------------------------ 
                        $this->load->library('image_lib');
                        $config['image_library']    = 'GD2';
                        $config['source_image']     = './assets/uploads/' . $image_name;
                        $config['maintain_ratio']   = TRUE;
                        $config['master_dim']   = 'auto';
                        $config['quality']  = 70;
                        $config['width'] = 1024;
                        $config['height'] = 768;
                        $config['new_image'] = './assets/uploads/' . $image_name;
                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                        // ------------------------------------------------------------------------
                    }
                    $filename[] = $image_name;
                } // end for loop                      
            }
            foreach ($filename as $key => $value)
            {
                $insert_image=array(
                    'cancelation_of_result'=> $value,
                    // 'student_id' => $student_id,
                    // 'stage_id' => $stage_id,
                    'update_date' => date("Y-m-d g:i:s"),
                    // 'category_status' => 1,
                    // 'user_id' =>$this->session->userdata('user_id'),
                );
                // echo "<pre>";
                // print_r ($insert_image);
                // echo "</pre>";
                // exit();
                $add_image = $this->Common_model->update_table('uploads',$where=array('student_id'=>$student_id),$insert_image);                           
            }
            if ($add_image)
            {
                $record = $this->Common_model->select_single_records('uploads',$where=array('student_id'=>$student_id));
                echo json_encode($record);
            }
        // }
        // else
        // {
        //  $data['active']='registered_students';
        //  $this->load->view('admin/header',$data);
        //  $data['student_id']=$student_id;
        //  $data['error']='';
        //  $this->load->view('registration/file_completion',$data);
        //  $this->load->view('admin/footer',$data);
        // }
    }
	function download($file_name)
	{
        // echo($file_name);
        // exit();
		$this->load->helper('download');
        force_download('./assets/uploads/'.$file_name, NULL);
    }
}