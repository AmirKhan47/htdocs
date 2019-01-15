<?php
class mod_common extends CI_Model {

    public $permissions = array();
    
    function __construct() {

        parent::__construct();
        $this->permission = $this->session->userdata("permissions");
    }

    public function is_page_accessible($page_id=0) {
        if (!in_array($page_id, $this->permission)) {
            redirect(AURL . "Dashboard/");
        }
    }
   public function get_discount(){

        $this->db->select('discount.* , users.* , brand.*');
        $this->db->join('users','users.id = discount.user_id');
        $this->db->join('brand','brand.brand_id = discount.brand_id');
        $get = $this->db->get('discount');
     //   echo $this->db->last_query();exit;
        return $get->result_array();
        }

    public function check_logged_in() {
        if ($this->session->userdata('admin_id')) {
            redirect(AURL . 'Dashboard/');
        }
    }
     public function get_total_company_margin($oid) {

       $qry="select sum(p.company_margin) as company_margin from products p join items i on p.id=i.product_id where i.order_id=$oid";
       $get=$this->db->query($qry);
  
       return $get->row_array();

    }
    public function get_total_agent_margin($oid) {

       $qry="select sum(p.agent_margin) as agent_margin from products p join items i on p.id=i.product_id where i.order_id=$oid";
       $get=$this->db->query($qry);
       return $get->row_array();

    }

    //Verify If User is Login on the authorized Pages.
    public function verify_is_admin_login() {

        if (!$this->session->userdata('admin_id')) {
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $this->session->set_flashdata('err_message', '- You have to login to access this page.');
            redirect(AURL . 'login?url_ref=' . $actual_link);
        }
    }

    public function verify_is_pinholder_login() {

        if (!$this->session->userdata('pinholder_id')) {
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $this->session->set_flashdata('err_message', '- You have to login to access this page.');
            redirect(PHURL . 'login?url_ref=' . $actual_link);
        }
    }

    public function verify_is_vendor_login() {

        if (!$this->session->userdata('vendor_id')) {
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $this->session->set_flashdata('err_message', '- You have to login to access this page.');
            redirect(VURL . 'login?url_ref=' . $actual_link);
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

        if ($update) {
            return true;
        } else {
            return false;
        }
    }
    function get_all_records_nums($table = "", $where = "", $fields = "*") {
        $this->db->select($fields);
		if ($where != "") {
            $this->db->where($where);
        }

        $get = $this->db->get($table);
        return $get->num_rows();
    }

    

    function get_all_records_nums_group($table = "", $where = "", $fields = "*",$group) {
        $this->db->select($fields);
        if ($where != "") {
            $this->db->where($where);
        }
        $this->db->group_by($group);

        $get = $this->db->get($table);
        return $get->num_rows();
    }

    function get_all_records($table = "",$fields = "*",$llimit=0,$ulimit=0,$where = "") {

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

    function select_single_records($table = "", $where = "", $fields = "*") {
        $this->db->select($fields);
        if ($where != "") {
            $this->db->where($where);
        }
        $get = $this->db->get($table);
        return $get->row_array();
    }

    function select_array_records($table = "", $where = "", $fields = "*") {

        $this->db->select($fields);
        if ($where != "") {
            $this->db->where($where);
        }
        $get = $this->db->get($table);
		//echo $this->db->last_query(); 
        return $get->result_array();
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

    public function get_all_states($country_id) {

        // $this->db->dbprefix('states');
        $this->db->select("*");
        $this->db->where('country_id', $country_id);
        $this->db->order_by('name ASC');
        $get_states_list = $this->db->get('states');
        

        $row_states_list['states_result'] = $get_states_list->result_array();
        $row_states_list['states_count'] = $get_states_list->num_rows();


        return $row_states_list;
    }

    public function get_preferences_setting($setting_name = '') {
        $table_name = 'site_preferences';
        $this->db->dbprefix($table_name);
        $this->db->where('setting_name', $setting_name);
        $get_setting = $this->db->get($table_name);
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
    
      function get_CoA_Tree(){
        $this->db->select("id, title, parent_id");
        $get =$this->db->get("chart_of_accounts");
         $result = $get->result_array();
    
          $tree = $this->buildCoATree($result);
         return $tree;
//          return $this->doOutputList($tree);
    }
    public function buildCoATree(array $elements, $parentId = 0) {
        $branch = array();

        
        foreach ($elements as $as =>$element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->buildCoATree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }

    public function home_categories(){
        $query="SELECT * FROM  `biz_categories` WHERE STATUS ='1' ORDER BY id DESC LIMIT 0 , 4";
        $get=$this->db->query($query);
        return $get->result_array();
    }
    
    
}

?>