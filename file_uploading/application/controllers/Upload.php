<?php
    class Upload extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->model('Common_model');
        }
        public function index()
        {
            $this->load->view('upload_form', array('error' => ' ' ));
        }
        public function do_upload()
        {
            $filename=array();
            if(count($_FILES['file']['name']) > 0 && $_FILES['file']['name'] !='')
            {
                $files = $_FILES['file'];
                $count = count($_FILES['file']['name']);
                //echo $_FILES['file']['name'];exit();
                for($i=0; $i<$count;$i++)
                {
                    $config = array();
                    $projects_folder_path = './assets/uploads/';
                    $thumb = $projects_folder_path . 'thumb';
                    $_FILES['file']['name']= $files['name'][$i];
                    $_FILES['file']['type']= $files['type'][$i];
                    $_FILES['file']['tmp_name']= $files['tmp_name'][$i];
                    $_FILES['file']['error']= $files['error'][$i];
                    $_FILES['file']['size']= $files['size'][$i];   
                    $file_ext  = ltrim(strtolower(strrchr($_FILES['file']['name'],'.')),'.');  
                    $file_name =    'oppein-'.date('YmdGis').'.'.$file_ext;        
                    $config['upload_path']         = $projects_folder_path;
                    $config['allowed_types']       = '*';
                    $config['encrypt_name']        = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['file_name'] = $file_name;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('file'))
                    {
                        $error_file_arr = array('error' => $this->upload->display_errors());                
                        $this->session->set_flashdata('err_message', $error_file_arr['error']);
                        echo "2";
                    }
                    else
                    {
                        $data_image_upload = array('upload_image_data' => $this->upload->data());
                        $image_name =$data_image_upload['upload_image_data']['file_name'];  
                        $full_path = $data_image_upload['upload_image_data']['full_path'];                
                    }
                    $filename[] = $image_name;
                } // end for loop                      
            }
            foreach ($filename as $key => $value)
            {
                $insert_image=array(
                    'document_name'=> $value,
                    // 'lead_id' => $lead_id,
                    // 'stage_id' => $stage_id,
                    'created_date' => date("Y-m-d G:i:s"),
                    // 'category_status' => 1,
                    // 'user_id' =>$this->session->userdata('user_id'),
                );
                // echo "<pre>";
                // print_r ($insert_image);
                // echo "</pre>";
                // exit();
                $add_image = $this->Common_model->insert_into_table('uploads', $insert_image);                           
            }
            if ($add_image)
            {
                echo(1);
            }
        }
    }
?>