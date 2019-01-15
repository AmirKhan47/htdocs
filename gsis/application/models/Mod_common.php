<?php

class Mod_common extends CI_Model {

    public $permissions = array();
    
    function __construct() {

        parent::__construct();
        $this->permission = $this->session->userdata("permissions");
    }
	
	 public function set_rules()
    {        
       return $config = array(
				 'company' => array(  
					array(
							'field' => 'name',
							'label' => 'Company name',
							'rules' => 'required'
					),					
					  array(
							'field' => 'email',
							'label' => 'Email',
							'rules' => 'required|valid_email|is_unique[st_companies.email]',
							'errors' => array(
											'is_unique'     => 'This %s already exists.'
											)
					),
					 array(
						'field'   => 'password',
						'label'   => 'Password',
						'rules'   => 'trim|required'
					),
					array(
						'field'   => 'confirm_password',
						'label'   => 'Confirm password',
						'rules'   => 'trim|required|matches[password]',
						
					)			
           ),
		   'company_setpassword'=>array(
					 array(
							'field'   => 'newpassword',
							'label'   => 'Password',
							'rules'   => 'trim|required'
						),
						array(
							'field'   => 'renewpassword',
							'label'   => 'Confirm password',
							'rules'   => 'trim|required|matches[newpassword]',
							
						)
				),
			'reseller'=>array(
					 array(
							'field'   => 'first_name',
							'label'   => 'first name',
							'rules'   => 'trim|required'
						),
						 array(
							'field'   => 'surname',
							'label'   => 'surname',
							'rules'   => 'trim|required'
						),
						array(
							'field' => 'email',
							'label' => 'Email',
							'rules' => 'required|valid_email|is_unique[st_resellers.email]',
							'errors' => array(
											'is_unique'     => 'This %s already exists.'
											)
					),
					 array(
						'field'   => 'password',
						'label'   => 'Password',
						'rules'   => 'trim|required'
					),
					array(
						'field'   => 'confirm_password',
						'label'   => 'Confirm password',
						'rules'   => 'trim|required|matches[password]',
						
					)	
				),
				
			'category'=>array(
					 array(
							'field'   => 'title',
							'label'   => 'Title',
							'rules'   => 'trim|required'
						),
						 array(
							'userfile'   => 'category_image',
							'label'   => 'Image',
							'rules'   => 'trim|required'
						)	
				)		
        );
    }

    public function is_page_accessible($page_id=0) {
        if (!in_array($page_id, $this->permission)) {
            $this->session->set_flashdata('err_message',"- You don't have access to this operation.");
            redirect(AURL . "dashboard");
        }
    }

    public function check_logged_in() {
        if ($this->session->userdata('admin_id')) {
            redirect(AURL . 'dashboard');
        }
    }
  

    //Verify If User is Login on the authorized Pages.
    public function verify_is_admin_login() {

        if (!$this->session->userdata('admin_id')) {
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $this->session->set_flashdata('err_message', '- You have to login to access this page.');
            redirect(AURL . 'login?url_ref=' . $actual_link);
        }
    }

    

    public function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    function insert_into_table($table, $data) {
        $insert = $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        if ($insert) {
            return $insert_id;
        } else {
            return false;
        }
    }

    function update_table($table = "", $where = "", $data = "") {

        $this->db->where($where);
        $update = $this->db->update($table, $data);
		//echo $this->db->last_query();exit;
        if ($update) {
            return true;
        } else {
            return false;
        }

    }
    
        function get_all_records_nums($table = "", $fields = "*",$where="") {

        $this->db->select($fields);
		if ($where != "") {
            $this->db->where($where);
        }
        $get = $this->db->get($table);
		
        return $get->num_rows();
    }

    function get_all_records($table = "", $fields = "*",$llimit=0,$ulimit=0,$where="") {

        $this->db->select($fields);
		if ($where != "") {
            $this->db->where($where);
        }
        if ($ulimit > 0) {
            $this->db->limit($ulimit, $llimit);
        }
        $get = $this->db->get($table);
        return $get->result_array();
    }

    function select_array_records($table = "", $where = "", $fields = "*") {

        $this->db->select($fields);

        if ($where != "") {

            $this->db->where($where);

        }

        $get = $this->db->get($table);

        return $get->result_array();

    }
	
	function select_single_records($table = "", $where = "", $fields = "*") {

        //echo $table.' '.$where; exit;

        $this->db->select($fields);
        if ($where != "") {
            $this->db->where($where);
        }
        $get = $this->db->get($table);

        return $get->row_array();
    }   

    function delete_record($table = "", $where = "") {

        $this->db->where($where);
        $delete = $this->db->delete($table);
        if ($delete)
            return true;
        else
            return false;
    }

    public function get_tree() {
        $query = "SELECT id, category_name as name,category_name as text, parent_category as parent_id FROM categories where is_active ='1'";
        $get = $this->db->query($query);
        $data = $get->result_array();

        foreach ($data as $key => &$item) {
            $itemsByReference[$item['id']] = &$item;
            // Children array:
            $itemsByReference[$item['id']]['children'] = array();
            // Empty data class (so that json_encode adds "data: {}" ) 
            $itemsByReference[$item['id']]['data'] = new StdClass();
        }

// Set items as children of the relevant parent item.
        foreach ($data as $key => &$item)
            if ($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
                $itemsByReference [$item['parent_id']]['children'][] = &$item;

// Remove items that were added to parents elsewhere:
        foreach ($data as $key => &$item) {
            if ($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
                unset($data[$key]);
        }
        return $data;
    }
	
	public function get_all_countries(){		
		$this->db->order_by('name ASC');
		$get_countries_list = $this->db->get('countries');
		$row_countries_list['countries_result'] = $get_countries_list->result_array();
		$row_countries_list['countries_count'] = $get_countries_list->num_rows();
		return $row_countries_list;		
	}
	
	public function get_one_country($countryid){		
		$this->db->order_by('name ASC');
		$this->db->where('id',$countryid);
		$get_countries_list = $this->db->get('countries');
		return $get_countries_list->result();	
	}

    public function get_all_states($country_id) {

        $this->db->dbprefix('states');
        $this->db->where('country_id', $country_id);
        $this->db->order_by('name ASC');
        $get_states_list = $this->db->get('states');
        //echo $this->db->last_query(); exit;

        $row_states_list['states_result'] = $get_states_list->result_array();
        $row_states_list['states_count'] = $get_states_list->num_rows();


        /*$this->db->dbprefix('cities');
        $this->db->where('country', $country_id);
        $this->db->order_by('name ASC');
        $get_cities_list = $this->db->get('cities');
        //echo $this->db->last_query(); exit;

        $row_states_list['cities_result'] = $get_cities_list->result_array();
        $row_states_list['cities_count'] = $get_cities_list->num_rows;*/


        return $row_states_list;
    }

    public function get_preferences_setting($setting_name = '') {
        $table_name = 'site_preferences';
        $this->db->dbprefix($table_name);
        $this->db->where('setting_name', $setting_name);
        $get_setting = $this->db->get($table_name);
        return $get_setting->row_array();
    }
	
	 public function get_company_setting($column = '') {
        $table_name = 'companies';
        $this->db->select($column); 
		$this->db->from($table_name);
        $this->db->where('id', $this->session->userdata('company_id'));
        $get_setting = $this->db->get();
        return $get_setting->row_array();
    }

//end get_all_states
    //Get All Cities  Name
    public function get_all_cities($state_id) {

        $this->db->dbprefix('cities');
        $this->db->where('state_id', $state_id);
        $this->db->order_by('name ASC');
        $get_cities_list = $this->db->get('cities');

        $row_cities_list['cities_result'] = $get_cities_list->result_array();
        $row_cities_list['cities_count'] = $get_cities_list->num_rows();

        return $row_cities_list;
    }

    public function getrate($currency) {
        $amount = urlencode(1);
        $from_Currency = urlencode("USD");
        $to_Currency = urlencode($currency);
//       
//          $get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");
//
//
//          $get = explode("<span class=bld>",$get);
//          $get = explode("</span>",$get[1]);
//          return $converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]); 

        $this->db->select("*");
        $this->db->where("currency_sign", $currency);
        $get = $this->db->get("currency_rate");

        $result = $get->row_array();
//        echo $this->db->last_query();exit;
        return $result['currency_rate'];
    }

//end get_all_countries  
	
	/*------------------------email sending functions------------------------*/
	function sendEmail($data,$replace,$temp_id)
	{   
		 $email = $data['email'];
		/*get email template by id*/
		$get_email_template = $this->get_email_template($temp_id); 		
		
		$html_body = str_replace(array_values($replace), array_values($data), $get_email_template[0]->email_body);
		
		/*
		* Get site preferences
		*/
		//Get SMTP Host
		/*$get_smtp_host = $this->mod_common->get_preferences_setting('smtp_host');
		$smtp_host = $get_smtp_host['setting_value'];
		//Get SMTP Port
		$get_smtp_port = $this->mod_common->get_preferences_setting('smtp_port');
		$smtp_port = $get_smtp_port['setting_value'];
		//Get From Email
		$get_from_email = $this->mod_common->get_preferences_setting('from_email');
		$from_email = $get_from_email['setting_value'];
		//Get From Email Password
		$get_from_email_password = $this->mod_common->get_preferences_setting('from_email_password');
		$from_email_password = $get_from_email_password['setting_value'];
		//Get From Name
		$get_from_txt = $this->mod_common->get_preferences_setting('email_from_txt');
		$from_txt = $get_from_txt['setting_value'];*/
		//Get Email Header
		$get_email_header = $this->mod_common->get_preferences_setting('email_header');
		$email_header = $get_email_header['setting_value'];
		//Get Email Footer
		$get_email_footer = $this->mod_common->get_preferences_setting('email_footer');		
		$email_footer = $get_email_footer['setting_value'];
		
		// bind header ,footer to the email body
		$message = $email_header.$html_body.$email_footer;
		
		
		/*
		 * send email
		$config = Array(
						  'protocol' => 'smtp',
						  'smtp_host' => $smtp_host,
						  'smtp_port' => $smtp_port,
						  'smtp_user' => $from_email,
						  'smtp_pass' => $from_email_password,
						  'mailtype' => 'html',
						  'charset' => 'iso-8859-1'
						  );
		
		
		$this->email->initialize($config);
		$this->email->from($from_email,$from_txt);
		$this->email->to($email);
		$this->email->subject($get_email_template[0]->email_subject);
		$data['image1'] = 'some_image.jpg';
		$this->email->message($this->load->view('view_file', $data, TRUE));
		$this->email->message($message);
		$this->email->set_mailtype("html");
		$send = $this->email->send();
		echo $this->email->print_debugger(); exit;*/
		send_mailgun_email($email,$get_email_template[0]->email_subject,$message);
	}
	
	function sendEmailAdmin($data,$replace,$temp_id)
	{   
		 $email = $data['email'];
		/*get email template by id*/
		$get_email_template = $this->get_email_template($temp_id); 		
		
		$html_body = str_replace(array_values($replace), array_values($data), $get_email_template[0]->email_body);
		
		/*
		* Get site preferences
		*/
		//Get SMTP Host
		/*$get_smtp_host = $this->mod_common->get_preferences_setting('smtp_host');
		$smtp_host = $get_smtp_host['setting_value'];
		//Get SMTP Port
		$get_smtp_port = $this->mod_common->get_preferences_setting('smtp_port');
		$smtp_port = $get_smtp_port['setting_value'];
		//Get From Email
		$get_from_email = $this->mod_common->get_preferences_setting('from_email');
		$from_email = $get_from_email['setting_value'];
		//Get merchant_email Email
		$get_merchant_email = $this->mod_common->get_preferences_setting('merchant_email');
		$merchant_email = $get_merchant_email['setting_value'];
		//Get From Email Password
		$get_from_email_password = $this->mod_common->get_preferences_setting('from_email_password');
		$from_email_password = $get_from_email_password['setting_value'];
		//Get From Name
		$get_from_txt = $this->mod_common->get_preferences_setting('email_from_txt');
		$from_txt = $get_from_txt['setting_value'];*/
		//Get Email Header
		$get_email_header = $this->mod_common->get_preferences_setting('email_header');
		$email_header = $get_email_header['setting_value'];
		//Get Email Footer
		$get_email_footer = $this->mod_common->get_preferences_setting('email_footer');		
		$email_footer = $get_email_footer['setting_value'];
		
		// bind header ,footer to the email body
		$message = $email_header.$html_body.$email_footer;
		//echo $message;
		//echo $html_body;exit;
		/*
		 * send email
		*/
		/*$config = Array(
						  'protocol' => 'smtp',
						  'smtp_host' => $smtp_host,
						  'smtp_port' => $smtp_port,
						  'smtp_user' => $from_email,
						  'smtp_pass' => $from_email_password,
						  'mailtype' => 'html',
						  'charset' => 'iso-8859-1'
						  );
						  
		$this->email->initialize($config);
		
		
		$this->email->from($email);
		$this->email->to($merchant_email);
		
		$this->email->subject($get_email_template[0]->email_subject);
		$data['image1'] = 'some_image.jpg';
		$this->email->message($this->load->view('view_file', $data, TRUE));
		$this->email->message($message);
		$this->email->set_mailtype("html");
		$send = $this->email->send();
		
		 //echo $this->email->print_debugger(); exit;*/
		send_mailgun_email($email,$get_email_template[0]->email_subject,$message);
	}
	
	function get_email_template($temp_id)
	{	
		 
		    $this->db->select("*");
			$this->db->from("email");
			$this->db->where("id",$temp_id);
			
			//echo $this->db->get_compiled_select();exit;
			$query = $this->db->get();
			
			$result = $query->result();
			if($result){
				return $result;
				}else{
					return false;
					}
			
	}

    /*------------------------get locationsd and allocated users------------------------*/
	
	function get_locations($id=0,$company_id=0){		
		$this->db->select(array("l.*"));
		$this->db->from("locations l");
		$this->db->where('l.company_id',$this->session->userdata('company_id'));
		if($id>0){
		$this->db->where('l.id',$id);		
		}	
		if($company_id>0){
		$this->db->where('l.company_id',$company_id);		
		}	
		//echo $this->db->get_compiled_select();
		$query = $this->db->get();			
		 $getLocation = $query->result();
		 $data=array();
		 if($getLocation){
			 foreach($getLocation as $key=>$locs){
				$data[$key]= $locs;
				if($locs->allocated_user_ids){
				 $this->db->select("name");
				$this->db->from("companies");
				$this->db->where('parent_id',$this->session->userdata('company_id'));
				if($locs->allocated_user_ids){
					$this->db->where('id IN ('.$locs->allocated_user_ids.')');	
				}
							
				
				//echo $this->db->get_compiled_select();	exit;
				$query1 = $this->db->get();				
				 $getuser= $query1->result();
				 $loc_user='';
				 if($getuser){
					 foreach($getuser as $user){
						 $loc_user.= $user->name.',';
					 }
				 }
				 
				 $data[$key]->user_name = rtrim($loc_user,',');
				}else{
					 $data[$key]->user_name = '';
				}
				 
			 }			 
		 }
		// echo '<pre>';print_r($data);exit;
		 return $data;
		
	}
	
	public function get_one_column($table,$column,$where=''){

		$this->db->select(array($column));
		$this->db->from($table);
		if($where){
		$this->db->where($where);	
		}
			
		$query = $this->db->get();
		return $query->row();	
		
	}

	public function get_last_record($table,$column="*",$where='',$order_by=''){

		$this->db->select(array($column));
		$this->db->from($table);
		if($where){
		$this->db->where($where);	
		}
		if($order_by){
			$this->db->order_by($order_by,"DESC");
		}
		
			
		$query = $this->db->get();
		return $query->row();	
		
	}

	public function checkfield_in_table($table,$column="",$value=''){

		$this->db->select(array($column));
		$this->db->from($table);
		$this->db->where($column,$value);	
		
		$query = $this->db->get();
		return $query->num_rows();	
		
	}
    
}

?>