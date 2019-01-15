<?php

function createProductHtml($products,$rate,$country) {
    
        $CI = & get_instance();
         
        $producthtml .= '<div class="col-md-od-2 col-sm-od-2 col-xs-od-12 custom_style_col2">'
            .'<div class="custom_style_col">'
            .'<a href="'.PURL.$products['product_alias'].' ">'
            .' <div class="pic top_padding">
                <div class="for_control_cash for_top_circle">';

//        $producthtml .='</div></div></a></div></div>';
        if(file_exists(FCPATH."assets/product_images/thumb/".$products['product_image'])){
    
        $producthtml .= '<div class="pro-img">    <img src="'.PRODUCT_THUMB.$products['product_image'].'">  </div>';
        
        }else {
                
        $producthtml .= '<div class="pic"><img  alt="" src="'.SURL .'assets/product_images/no_image.gif'.'" ></div>';
         
        }
            
    if($CI->session->userdata('customer_id')!=""){
        
        $producthtml .= '<div class="cash_back_home for_home_cas">
                        <a href="#" data-toggle="tooltip" data-placement="top" data-html="true" title="'.$efmdetails.'">
                        <span class="g-price">'.$country['currencycode'].'"<br> "'.cashbackprice($products['agent_margin'],$rate,2).  '</span>
                        <span class="cashback_text">e-FM*</span>
                        </a>
                        </div>';
        }
        
        $producthtml .= '</div></div><span class="subject">'. $products['product_name'] .'</span> <span class="less_strike">';
    
    if($products['product_price']>0 && $products['product_price']<$products['actual_price']) {
            
        $producthtml .= ' <div class="strikediv">'
                     . $country['currencycode']." ".salesprice($products['actual_price'],$products['shipping_cost'],$rate).'</div>'
                     . $country['currencycode']." ".salesprice($products['product_price'],$products['shipping_cost'],$rate). '<div class="clearfix"></div>';
               
        $actual_price = cal_salesprice($products['actual_price'], $products['shipping_cost'], $rate);
        $product_price = cal_salesprice($products['product_price'], $products['shipping_cost'], $rate);
        $off = (($products['actual_price'] -$products['product_price']) *100)/$products['actual_price'];
            
        $producthtml .= '<div class="discounts"><span>'.number_format($off, 2, ".", "")."% off".'</span></div>';
    
    }else{
        $producthtml .=  $country['currencycode']." ".salesprice($products['actual_price'],$products['shipping_cost'],$rate); 
        }
        
        $producthtml .= '</span>';
    if($CI->session->userdata('customer_id')!=""){        
                                                     
              
    } 
    if ($product[ 'product_image'] !="" && file_exists( 'assets/product_images/thumb/' . $products[ 'product_image'])) { 
        
    }else{ 
        
    }
        
    
    
    $producthtml .= '</a></div></div>';
            
        
        
    return $producthtml;
   //return "muz<pre>".$products."</pre>";
}

function get_socialmedia(&$data) {
    //$data is passed by reference. Previous stuff in data will be accesable plus any modifications will be automatically reflected back.
//Get Facebook
    $ci = & get_instance();

    $facebook_arr = $ci->mod_preferences->get_preferences_setting('facebook');
    $data['facebook'] = $facebook_arr['setting_value'];

    //Get twiter
    $twitter_arr = $ci->mod_preferences->get_preferences_setting('twitter');
    $data['twitter'] = $twitter_arr['setting_value'];

    //Get google_plus
    $google_plus_arr = $ci->mod_preferences->get_preferences_setting('twitter');
    $data['google_plus'] = $google_plus_arr['setting_value'];

    //Get youtube
    $youtube_arr = $ci->mod_preferences->get_preferences_setting('youtube');
    $data['youtube'] = $youtube_arr['setting_value'];
}

function check_image($path, $image_name) {

    $img_path = $path . $image_name;
    if (file_exists($img_path) && $image_name != "") {
        return $img_path;
    } else {
        return SURL . "assets/category_icon_images/miss-catagoery.png";
    }
}

function get_common_templatedata(&$data) {
    $ci = & get_instance();


    //Get in
    $in_arr = $ci->mod_preferences->get_preferences_setting('in'); //??
    $data['in'] = $in_arr['setting_value']; // ??
    //Get footer_copyright_text mzm see this ??
    $footer_copyright_text_arr = $ci->mod_preferences->get_preferences_setting('footer_copyright_text');
    $data['footer_copyright_text'] = $footer_copyright_text_arr['setting_value'];
}

function generate_cms_links($menu_item) {
    $link = '#';
    if ($menu_item['page_type'] == 'article' || $menu_item['page_type'] == 'contact') {
        $link = SURL . 'cms/' . $menu_item['seo_url_name'];
    } elseif ($menu_item['page_type'] == 'special') {
        $link = SURL . $menu_item['special_link'];
    } elseif ($menu_item['page_type'] == 'home') {
        $link = SURL;
    }

    return $link;
}

//mzm handy function to output server side stuff in console
function console_print($data) {

    echo '<script type="text/javascript">';
    echo "console.log('$data')";

    echo '</script>';
}

//mzm hanby funtion to print debug info

function printme($data, $exit_status = 0) {

    echo '<pre>';
    print_r($data);
    echo '</pre>';

    if ($exit_status) {
        exit;
    }
}

function display_date($date) {
    return date('d M Y', strtotime($date));
}

function country_dropdown_options($selected = '', $comare_by = 'country_name') {

    $ci = & get_instance();

    $ci->db->dbprefix('countries');

    $ci->db->order_by('country_name', 'asc');



    $get_data = $ci->db->get('countries');

    //echo $ci->db->last_query(); 
    $data = $get_data->result_array();
    $country_options = '<option value="">Select Country </option>';
    foreach ($data as $country) {
        $selected_tag = ($selected == $country[$comare_by]) ? 'selected="selected"' : '';


        $country_options.='<option ' . $selected_tag . ' value="' . $country[$comare_by] . '">' . $country['country_name'] . '</option>';
    }


    //printme($data,1);
    return $country_options;
}

function country_list() {
    $ci = & get_instance();

    $ci->db->dbprefix('countries');

    $ci->db->order_by('country_name', 'asc');



    $get_data = $ci->db->get('countries');

    //echo $ci->db->last_query(); 
    $data = $get_data->result_array();
    return $data;
}

function cart_totals() {

    $ci = & get_instance();


    $ci->load->library('cart');
    $data = array();
    $data['cart_total'] = $ci->cart->format_number($ci->cart->total());

    if ($data['cart_total'] > 0) {
        $shipping_price = $ci->session->userdata('shipping_price');
    } else {
        $shipping_price = 0; //only show shipping if there are items in the cart
    }

    $grand_total = $data['cart_total'] + $shipping_price;
    $data['shipping_price'] = $ci->cart->format_number($shipping_price);


    $data['grandtotal'] = $ci->cart->format_number($grand_total);

    return $data;
}

function has_children($rows, $id) {
    foreach ($rows as $row) {
        if ($row['parent_category'] == $id) {
            return true;
        }
    }
    return false;
}



function admin_menu_tree() {

    $ci = & get_instance();
    $ci->db->dbprefix('admin_menu');
    $ci->db->where('parent_id', '0');
    $ci->db->where('show_in_nav', '1');
    $ci->db->order_by('display_order', 'asc');
    $get_data = $ci->db->get('admin_menu');
    $data = $get_data->result_array();

    foreach ($data AS $key => $val) {
        $sub_items = get_sub_menu($val['id']);
        $data[$key]["sub_item"] = $sub_items;
    }
    return $data;
}

function get_sub_menu($parent_id) {
    $ci = & get_instance();
    $ci->db->dbprefix('admin_menu');
    $ci->db->where('parent_id', $parent_id);
    $ci->db->where('show_in_nav', '1');
    $ci->db->order_by('display_order', 'asc');
    $get_data = $ci->db->get('admin_menu');
    $data = $get_data->result_array();
    return $data;
}

function build_cat_menu_for_creating_Category($rows, $parent = 0, $ischild = 0, $counter = 0, $total_rows = 0) {
    $display = "";
    $child_id = "";
    if ($ischild == 1) {
        $child_id = "child_of_" . $parent;
        $display = "display:none";
    }
    $frow = "";
    if ($counter == 0) {
        $frow = '<ul><li ><label class="checkbox-inline"><input type="radio" checked name="parent_category" id="product_cat0" value="0"><span>Root Category</span></label>';
    }
    $counter++;
    $result = $frow . "<ul id='" . $child_id . "' style='" . $display . "'>";

    foreach ($rows as $row) {
        if ($row['parent_category'] == $parent) {

            $arrow = "";
            $pid = $row['id'];
            if (has_children($rows, $row['id'])) {
            $arrow = "<span class='parent_row' id='" . $pid . "' style='padding:14px'><i class='fa fa-plus-square-o' aria-hidden='true' style='font-size:19px'></i></span>";
            }
            $checkbox = '<label class="checkbox-inline"><input type="radio" name="parent_category" id="product_cat' . $row['id'] . '" value="' . $row['id'] . '"><span>' . $row['category_name'] . '"</span></label>';
            $result.= "<li >" . $arrow . $checkbox;
            if (has_children($rows, $row['id'])) {

            $result.= build_cat_menu_for_creating_Category($rows, $row['id'], 1, $counter, $total_rows);
            }
            $result.= "</li>";
        }
    }
    $result.= "</ul>";
    if ($counter == $total_rows) {
        $result.= "</li></ul>";
    }
    return $result;
}

function build_cat_menu($rows, $parent = 0, $ischild = 0) {

    $display = "";
    $child_id = "";
    if ($ischild == 1) {
        $child_id = "child_of_" . $parent;
        $display = "display:none";
    }
    $result = "<ul id='" . $child_id . "' style='" . $display . "'>";

    foreach ($rows as $row) {
        if ($row['parent_category'] == $parent) {

            $arrow = "";
            $pid = $row['id'];
            if (has_children($rows, $row['id'])) {
                $arrow = "<span class='parent_row' id='" . $pid . "' style='padding:14px'><i class='fa fa-plus-square-o' aria-hidden='true' style='font-size:19px'></i></span>";
            }
            $checkbox = '<label class="checkbox-inline"><input type="checkbox" name="product_cats[]" id="product_cat' . $row['id'] . '" value="' . $row['id'] . '"><span>' . $row['category_name'] . '"</span></label>';
            $result.= "<li >" . $arrow . $checkbox;
            if (has_children($rows, $row['id'])) {

                $result.= build_cat_menu($rows, $row['id'], 1);
            }
            $result.= "</li>";
        }
    }
    $result.= "</ul>";

    return $result;
}

function build_cat_menu_for_edit($rows, $prd_cats, $parent = 0, $ischild = 0) {
    $display = "";
    $child_id = "";
    if ($ischild == 1) {
        $child_id = "child_of_" . $parent;
        $display = "display:none";
    }
    $result = "<ul id='" . $child_id . "' style='" . $display . "'>";

    foreach ($rows as $row) {
        if ($row['parent_category'] == $parent) {

            $arrow = "";
            $pid = $row['id'];
            if (has_children($rows, $row['id'])) {
                $arrow = "<span class='parent_row' id='" . $pid . "' style='padding:14px'><i class='fa fa-plus-square-o' aria-hidden='true' style='font-size:19px'></i></span>";
            }
            $checked = "";
            if (in_array($row['id'], $prd_cats)) {
                $checked = "checked";
            }
            $checkbox = '<label class="checkbox-inline"><input ' . $checked . ' type="checkbox" name="product_cats[]" id="product_cat' . $row['id'] . '" value="' . $row['id'] . '"><span>' . $row['category_name'] . '"</span></label>';
            $result.= "<li >" . $arrow . $checkbox;
            if (has_children($rows, $row['id'])) {

                $result.= build_cat_menu_for_edit($rows, $prd_cats, $row['id'], 1);
            }
            $result.= "</li>";
        }
    }
    $result.= "</ul>";

    return $result;
}

function create_category_menu() {

    $ci = & get_instance();
    $query = "SELECT * FROM biz_categories where is_active ='1' order BY sortorder ASC";
    $get = $ci->db->query($query);
    $data = $get->result_array();

    foreach ($data as $key => &$item) {
        $itemsByReference[$item['id']] = &$item;
        // Children array:
        $itemsByReference[$item['id']]['children'] = array();
        // Empty data class (so that json_encode adds "data: {}" ) 
//        $itemsByReference[$item['id']]['data'] = new StdClass();
    }

// Set items as children of the relevant parent item.
    foreach ($data as $key => &$item)
        if ($item['parent_category'] && isset($itemsByReference[$item['parent_category']]))
            $itemsByReference [$item['parent_category']]['children'][] = &$item;

// Remove items that were added to parents elsewhere:
    foreach ($data as $key => &$item) {
        if ($item['parent_category'] && isset($itemsByReference[$item['parent_category']]))
            unset($data[$key]);
    }
    return $data;
}

function create_category_by_slug($id) {

    $ci = & get_instance();
    $query = "SELECT * FROM biz_categories where is_active ='1' and parent_category='" . $id . "'";
    $get = $ci->db->query($query);
    $data = $get->result_array();

    foreach ($data as $key => &$item) {
        $itemsByReference[$item['id']] = &$item;
        // Children array:
        $childdata = array();

        $childqry = "SELECT * FROM biz_categories where is_active ='1' and parent_category='" . $item['id'] . "'";
        $childget = $ci->db->query($childqry);
        $childdata = $childget->result_array();
        $itemsByReference[$item['id']]['children'] = $childdata;

        // Empty data class (so that json_encode adds "data: {}" ) 
//        $itemsByReference[$item['id']]['data'] = new StdClass();
    }

// Set items as children of the relevant parent item.
// Remove items that were added to parents elsewhere:
    return $data;
}

function create_transparent_thumb($filename, $src, $dest, $width = 150, $height = 150) {

    $ci = & get_instance();
//
//    //resize:
    // echo $src."<br>";
    $config_resize['image_library'] = 'gd2';
//    $config_resize['library_path'] = '/usr/bin/mogrify';
    $config_resize['source_image'] = $src;
    $config_resize['quality'] = 80;
    $config_resize['new_image'] = $dest;
//  $config_resize['file_name'] = $filename;
    $config_resize['maintain_ratio'] = FALSE;
    $config_resize['create_thumb'] = FALSE;
    $config_resize['width'] = $width;
    $config_resize['height'] = $height;
//
    // echo $src;
    $data = getimagesize($src);
    $width1 = $data[0];
    $height1 = $data[1];
    if ($width1 != $height1) {

        $config_resize['maintain_ratio'] = TRUE;
        $config_resize['master_dim'] = 'auto';
        $ci->load->library('image_lib');
        $ci->image_lib->initialize($config_resize);
        if ($ci->image_lib->resize()) {

            $dfile = $dest . "/" . $filename;

            $im = imagecreatetruecolor($width, $height);
//        $stamp = imagecreatefromjpeg('img.jpg');

            if (preg_match('/[.](jpg)$/', $filename)) {
                $stamp = imagecreatefromjpeg($dfile);
            } else if (preg_match('/[.](gif)$/', $filename)) {
                $stamp = imagecreatefromgif($dfile);
            } else if (preg_match('/[.](png)$/', $filename)) {
                $stamp = imagecreatefrompng($dfile);
            } else if (preg_match('/[.](jpeg)$/', $filename)) {

                $stamp = imagecreatefromjpeg($dfile);
            } else if (preg_match('/[.](JPG)$/', $filename)) {

                $stamp = imagecreatefromjpeg($dfile);
            }

            
            $red = imagecolorallocate($im, 0, 0, 0);
            imagefill($im, 0, 0, $red);



            $sx = imagesx($stamp);
            $sy = imagesy($stamp);


            $oy = imagesx($stamp);
            $ox = imagesy($stamp);


            $d = getimagesize($dfile);
            $wd = $d[0];
            $hg = $d[1];

            if ($wd < $width) {
                $mg = $width - $wd;
                $marge_right = $mg / 2;
            } else {
                $marge_right = 0;
            }
            if ($hg < $height) {

                $mgh = $height - $hg;
                $marge_bottom = $mgh / 2;
            } else {
                $marge_bottom = 0;
            }
            $imgg = imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, $sx, $sy);

// echo "resized ".$src;
            header('Content-type: image/png');
            imagejpeg($im, $dfile);
            imagepng($im, $dfile);
            imagedestroy($im);
        } else {

            // echo $ci->image_lib->display_errors();
        }
    } else {

// echo "resized ".$src;
        $ci->load->library('image_lib');
        $ci->image_lib->initialize($config_resize);
        $ci->image_lib->resize();
    }

//      $ci->image_lib->fit();
//
//
//
//    $ci->image_lib->clear();
}


function create_thumbnail($filename, $src, $dest, $width = 150, $height = 150) {

    $ci = & get_instance();
//
//    //resize:
    // echo $src."<br>";
    $config_resize['image_library'] = 'gd2';
//    $config_resize['library_path'] = '/usr/bin/mogrify';
    $config_resize['source_image'] = $src;
    $config_resize['quality'] = 80;
    $config_resize['new_image'] = $dest;
//  $config_resize['file_name'] = $filename;
    $config_resize['maintain_ratio'] = FALSE;
    $config_resize['create_thumb'] = FALSE;
    $config_resize['width'] = $width;
    $config_resize['height'] = $height;
//
    // echo $src;
    $data = getimagesize($src);
    $width1 = $data[0];
    $height1 = $data[1];
    if ($width1 != $height1) {

        $config_resize['maintain_ratio'] = TRUE;
        $config_resize['master_dim'] = 'auto';
        $ci->load->library('image_lib');
        $ci->image_lib->initialize($config_resize);
        if ($ci->image_lib->resize()) {

            $dfile = $dest . "/" . $filename;

            $im = imagecreatetruecolor($width, $height);
//        $stamp = imagecreatefromjpeg('img.jpg');

            if (preg_match('/[.](jpg)$/', $filename)) {
                $stamp = imagecreatefromjpeg($dfile);
            } else if (preg_match('/[.](gif)$/', $filename)) {
                $stamp = imagecreatefromgif($dfile);
            } else if (preg_match('/[.](png)$/', $filename)) {
                $stamp = imagecreatefrompng($dfile);
            } else if (preg_match('/[.](jpeg)$/', $filename)) {

                $stamp = imagecreatefromjpeg($dfile);
            } else if (preg_match('/[.](JPG)$/', $filename)) {

                $stamp = imagecreatefromjpeg($dfile);
            }

			
            $red = imagecolorallocate($im, 255, 255, 255);
            imagefill($im, 0, 0, $red);



            $sx = imagesx($stamp);
            $sy = imagesy($stamp);


            $oy = imagesx($stamp);
            $ox = imagesy($stamp);


            $d = getimagesize($dfile);
            $wd = $d[0];
            $hg = $d[1];

            if ($wd < $width) {
                $mg = $width - $wd;
                $marge_right = $mg / 2;
            } else {
                $marge_right = 0;
            }
            if ($hg < $height) {

                $mgh = $height - $hg;
                $marge_bottom = $mgh / 2;
            } else {
                $marge_bottom = 0;
            }
            $imgg = imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, $sx, $sy);

// echo "resized ".$src;
            header('Content-type: image/png');
            imagejpeg($im, $dfile);
            imagepng($im, $dfile);
            imagedestroy($im);
        } else {

            // echo $ci->image_lib->display_errors();
        }
    } else {

// echo "resized ".$src;
        $ci->load->library('image_lib');
        $ci->image_lib->initialize($config_resize);
        $ci->image_lib->resize();
    }

//      $ci->image_lib->fit();
//
//
//
//    $ci->image_lib->clear();
}

function create_fixed_thumbnail($filename, $src, $dest, $width = 150, $height = 150) {




    $ci = & get_instance();
//
//    //resize:
    $config_resize['image_library'] = 'gd2';
    $config_resize['library_path'] = '/usr/bin/mogrify';
    $config_resize['source_image'] = $src;
    $config_resize['quality'] = 80;
    $config_resize['new_image'] = $dest;
    $config_resize['maintain_ratio'] = FALSE;
    $config_resize['width'] = $width;
    $config_resize['height'] = $height;
    //echo "test";exit;

    $ci->load->library('image_lib');
    $ci->image_lib->initialize($config_resize);
    $ci->image_lib->resize();
}

function create_optimize($filename, $src, $dest) {
    $ci = & get_instance();

    //resize:
    $config_resize['image_library'] = 'gd2';
//     $config_resize['library_path'] = '/usr/bin/composite';
    $config_resize['source_image'] = $src;
    $config_resize['quality'] = 80;
    $config_resize['new_image'] = $dest;
    $config_resize['maintain_ratio'] = TRUE;

    $ci->load->library('image_lib');
    $ci->image_lib->initialize($config_resize);
    $ci->image_lib->resize();

    $ci->image_lib->clear();
}

function category_menuimages($cat_id) {
    $ci = & get_instance();
    $query = "SELECT * FROM biz_category_menu_images where category_id ='" . $cat_id . "'";
    $get = $ci->db->query($query);
    return $data = $get->row_array();
}

function get_product_by_category($id) {
    $ci = & get_instance();
  //  $query = "select * from biz_products where find_in_set('" . $id . "',product_categories) <> 0 and  product_quantity >0 and approval_status=1 Limit 12";
    $get = $ci->db->query($query);
    return $data = $get->result_array();
}

function get_brands() {
    $ci = & get_instance();
    $query = "SELECT * FROM biz_brand LIMIT 4 ";
    $get = $ci->db->query($query);
    return $data = $get->result_array();
}

function get_famous_brands() {
    $ci = & get_instance();
    $query = "SELECT * FROM biz_brand  where show_on_home_page=1 LIMIT 6";
    $get = $ci->db->query($query);
    return $data = $get->result_array();
}

function get_all_brands() {
    $ci = & get_instance();
    $query = "SELECT * FROM biz_brand where brand_status=1";
    $get = $ci->db->query($query);
    return $data = $get->result_array();
}

function get_banner_by_id($id) {
    $ci = & get_instance();
    $query = "SELECT * FROM biz_banner where banner_id='" . $id . "'";
    $get = $ci->db->query($query);
    return $data = $get->row_array();
}

function get_front_banner_by_country_position($countryname,$position) {
    $ci = & get_instance();
    $query = "SELECT * FROM biz_front_banner where country_name='" . $countryname . "' and position=$position";
    $get = $ci->db->query($query);
    return $data = $get->row_array();
}


function get_customer_data($id) {
    $ci = & get_instance();
	
	if($ci->session->userdata('customer_id')==10){
    	$query = "SELECT c.*, p.packages_name FROM biz_clients c LEFT JOIN biz_packages p ON c.package_id = p.packages_id where c.customer_id='" . $id . "' ";
	}else{
		$query = "SELECT c.*, p.packages_name FROM biz_customer c LEFT JOIN biz_packages p ON c.package_id = p.packages_id where c.customer_id='" . $id . "'";
	}
	$get = $ci->db->query($query);
	$data = $get->row_array();
	return $data;
}

function get_package_name($id) {
    $ci = & get_instance();
	$query = "SELECT * FROM biz_packages where packages_id='" . $id . "'";
	
	$get = $ci->db->query($query);
    $data = $get->row_array();
	return $data['packages_name'];
}

function get_vendor_data($id) {
    $ci = & get_instance();
    $query = "SELECT * FROM biz_vendor where id='" . $id . "'";
    $get = $ci->db->query($query);
    return $data = $get->row_array();
}

function get_most_viewed_products($cats, $pid = 0) {
    if (count($cats) > 0) {
        foreach ($cats as $key => $cat) {
            $where_arr[] = "FIND_IN_SET( " . $cat . ", product_categories ) ";
        }
        $where = "where (" . implode("OR ", $where_arr) . " )";
        $query = "SELECT * FROM biz_products " . $where . " and  product_quantity >0 and approval_status=1 and id <> $pid Order by RAND()  limit 3";
    } else {
        $query = "SELECT * FROM biz_products where id <> $pid and  product_quantity >0 and approval_status=1 Order by RAND() limit 3";
    }

    $ci = & get_instance();
    $get = $ci->db->query($query);
    return $data = $get->result_array();
}

function getpayment_method($id) {
    $ci = & get_instance();
    $query = "select * from biz_payment_methods where id=" . $id;
    $get = $ci->db->query($query);
    return $data = $get->row_array();
}

/* GEt CHild Counts */

function get_left_child_count($node_id = 0, $cc = 0) {

//    echo $cc;
    $count = 0;
    $ci = & get_instance();
    $query = "SELECT child_left, child_right FROM biz_customer where customer_id='" . $node_id . "'";

    $get = $ci->db->query($query);
    $parent_detail = $get->row_array();



    $left_child = $parent_detail['child_left'];
    $right_child = "";
    if ($cc > 0) {
        $right_child = $parent_detail['child_right'];
    }
    if (count($parent_detail) > 0) {
        $cc = $cc + 1;
    }
    $left_node = "";
    $right_node = "";




    if ($left_child != "" || $right_child != "") {
        $count = $count + 1;

        $count+=get_left_child_count($left_child, $cc);
        $count+= get_left_child_count($right_child, $cc);
    }

//    echo $cc."<br>";
    return $count;
}

function get_right_child_count($node_id = 0, $cc = 0) {

//    echo $cc;
    $count = 0;
    $ci = & get_instance();
    $query = "SELECT child_left, child_right FROM biz_customer where customer_id='" . $node_id . "'";

    $get = $ci->db->query($query);
    $parent_detail = $get->row_array();

    $left_child = $parent_detail['child_right'];
    $right_child = "";
    if ($cc > 0) {
        $right_child = $parent_detail['child_left'];
    }
    $c++;
    $left_node = "";
    $right_node = "";

    if ($left_child != "" || $right_child != "") {
        $count = $count + 1;

        $count+=get_right_child_count($left_child, $cc);
        $count+= get_right_child_count($right_child, $cc);
    }
    return $count;
}

function get_left_paid_child_count($node_id = 0, $cc = 0, $p_counter = 0) {

//    echo $cc;
    $count = 0;
    $ci = & get_instance();
    $query = "SELECT package_id, child_left, child_right FROM biz_customer where customer_id='" . $node_id . "'";

    $get = $ci->db->query($query);
    $parent_detail = $get->row_array();



    $left_child = $parent_detail['child_left'];
    $right_child = "";
    if ($cc > 0) {
        $right_child = $parent_detail['child_right'];
    }
    if (count($parent_detail) > 0) {
        $cc = $cc + 1;
    }
    $left_node = "";
    $right_node = "";

    $package_id = $parent_detail['package_id'];
    if ($package_id > 1) {
        $p_counter += 1;
    }


    if ($left_child != "" || $right_child != "") {
        $count = $count + 1;
        if ($package_id > 1) {
            $p_counter += 1;
        }

        $p_counter+=get_left_child_count($left_child, $cc, $p_counter);
        $p_counter+= get_left_child_count($right_child, $cc, $p_counter);
    }

//    echo $cc."<br>";
    return $p_counter;
}

function get_right_paid_child_count($node_id = 0, $cc = 0) {

//    echo $cc;
    $count = 0;
    $ci = & get_instance();
    $query = "SELECT child_left, child_right FROM biz_customer where customer_id='" . $node_id . "'";

    $get = $ci->db->query($query);
    $parent_detail = $get->row_array();

    $left_child = $parent_detail['child_right'];
    $right_child = "";
    if ($cc > 0) {
        $right_child = $parent_detail['child_left'];
    }
    $c++;
    $left_node = "";
    $right_node = "";

    if ($left_child != "" || $right_child != "") {
        $count = $count + 1;

        $count+=get_right_child_count($left_child, $cc);
        $count+= get_right_child_count($right_child, $cc);
    }
    return $count;
}

function get_left_child($node_id) {

    $ci = & get_instance();
    $query = "SELECT child_left FROM biz_customer where customer_id='" . $node_id . "'";
    $get = $ci->db->query($query);
    $parent_detail = $get->row_array();
    $left_child = $parent_detail['child_left'];
    return $left_child;
}

function get_right_child($node_id) {

    $ci = & get_instance();
    $query = "SELECT child_right FROM biz_customer where customer_id='" . $node_id . "'";
    $get = $ci->db->query($query);
    $parent_detail = $get->row_array();
    $right_child = $parent_detail['child_right'];
    return $right_child;
}

function is_url_exist($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($code == 200) {
        $status = true;
    } else {
        $status = false;
    }
    curl_close($ch);
    return $status;
}

function random_code_generator($len, $number_of_codes) {
    $result = array();
    $chars = "abGTyHqr$*#sTuvwxyz^%67891230";
    $charArray = str_split($chars);
    for ($j = 0; $j < $number_of_codes; $j++) {
        for ($i = 0; $i < $len; $i++) {
            $randItem = array_rand($charArray);
            if ($i == 0) {
                $result[$j] = "" . $charArray[$randItem];
                continue;
            }
            $result[$j] .= "" . $charArray[$randItem];
        }
    }
    return $result;
}

function random_password_generator($len = 8, $number_of_codes = 1) {
    $result = array();
    $chars = "abGTyHqr$*#sTuvwxyz^%67891230";
    $charArray = str_split($chars);
    for ($j = 0; $j < $number_of_codes; $j++) {
        for ($i = 0; $i < $len; $i++) {
            $randItem = array_rand($charArray);
            if ($i == 0) {
                $result[$j] = "" . $charArray[$randItem];
                continue;
            }
            $result[$j] .= "" . $charArray[$randItem];
        }
    }
    return $result[0];
}

function random_single_code($len = 6, $number_of_codes = 1) {
    $result = array();
    $chars = "1234567890";
    $charArray = str_split($chars);
    for ($j = 0; $j < $number_of_codes; $j++) {
        for ($i = 0; $i < $len; $i++) {
            $randItem = array_rand($charArray);
            if ($i == 0) {
                $result[$j] = "" . $charArray[$randItem];
                continue;
            }
            $result[$j] .= "" . $charArray[$randItem];
        }
    }
    return $result[0];
}

function sms_send($params, $backup = false) {

    static $content;

    if ($backup == true) {
        $url = 'https://api2.smsapi.com/sms.do';
    } else {
        $url = 'https://api.smsapi.com/sms.do';
    }

    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_POST, true);
    curl_setopt($c, CURLOPT_POSTFIELDS, $params);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

    $content = curl_exec($c);
    $http_status = curl_getinfo($c, CURLINFO_HTTP_CODE);

    if ($http_status != 200 && $backup == false) {
        $backup = true;
        sms_send($params, $backup);
    }

    curl_close($c);
    return $content;
}

/* Generic function to create user tree */

function creat_customer_tree($ref_id = 0, $parent_id = 0, $parent_position = "L", $counter = 0) {

//    echo $cc;
    $count = 0;
    $ci = & get_instance();
    $ins_array = array(
        "first_name" => random_alphawords_generator(5),
        "last_name" => random_alphawords_generator(5),
        "ref_id" => $ref_id,
        "user_name" => random_alphawords_generator(5),
        "email" => random_alphawords_generator(5) . "@nsol.sg",
        "emailcode" => random_single_code(),
        "is_email_verified" => 1,
        "mobile_no" => random_number_generator(11),
        "mobilecode" => random_single_code(),
        "parent_id_binary" => $parent_id,
        "parent_position" => $parent_position,
        "is_mobile_verified" => 1,
        "package_id" => 1,
        "password" => md5(random_alphawords_generator(5)),
        "secret_question" => "1",
        "answer" => random_alphawords_generator(5),
        "created_date" => date("Y-m-d")
    );
    $ci->db->insert("biz_customer", $ins_array);
    $customer_id = $ci->db->insert_id();

    if ($parent_id > 0) {
        if ($parent_position == "L") {

            $update_ref_child_right = array(
                "child_left" => $customer_id
            );
            $ci->db->where("customer_id", $parent_id);
            $ci->db->update("biz_customer", $update_ref_child_right);
        } else {

            $update_ref_child_right = array(
                "child_right" => $customer_id
            );
            $ci->db->where("customer_id", $parent_id);
            $ci->db->update("biz_customer", $update_ref_child_right);
        }
    }
    $ci->load->model("mod_customer");
    if ($ref_id > 0) {
        $pid = $parent_id;
        $pposition = $parent_position;
        while ($pid > 0) {

            $parent_detail = $ci->mod_customer->get_parent_info($pid);

//                     echo "<pre>"; print_r($parent_detail); 
            if ($pposition == "L") {
                //   echo "Left balance inceser of ".$registration_amount." to ".$parent_id;
                $ci->mod_customer->update_customer_child_count($pid, "Left");
            } else if ($pposition == "R") {

                //    echo "Right balance inceser of ".$registration_amount." to ".$parent_id;
                $ci->mod_customer->update_customer_child_count($pid, "Right");
            }


            $c_id = $pid;
            $pid = $parent_detail['parent_id_binary'];
        }
    }


    $parent_detail = $ci->mod_customer->get_parent_info($parent_id);
    if ($counter < 5) {
        $counter++;

        if ($parent_detail['child_left'] == "") {
            creat_customer_tree($ref_id, $parent_id, "L", $counter);
        } else {
            creat_customer_tree($ref_id, $customer_id, "L", $counter);
        }

        if ($parent_detail['child_right'] == "") {
            creat_customer_tree($ref_id, $parent_id, "R", $counter);
        } else {
            //      creat_customer_tree($ref_id, $customer_id, "R", $counter);
        }
    }
    echo "Finish";
}

/* Generic funciton to make customer paid */

function make_random_customers_paid($package_id = 1, $count = 0) {
    $ci = & get_instance();
    $i = 0;
    while ($i < $count) {

        //$query = $ci->db->query("SELECT * from biz_customer WHERE package_id<='1' ORDER BY RAND()  LIMIT 1");
        $query = $ci->db->query("SELECT * from biz_customer WHERE package_id<='1'  LIMIT 1");
        $cdetail = $query->row_array();
        $cust_id = $customer_id = $cdetail["customer_id"];
        echo "=========CUSTOMER '" . $cust_id . "' <br></br>";
        /* Update custoemr Package */
        $cust_update = array(
            "package_id" => $package_id,
            "paid_date" => date("Y-m-d"),
            "updated_by" => $customer_id,
            "updated_date" => date("Y-m-d"));


        $ci->db->where("customer_id", $customer_id);
        $update_package = $ci->db->update("customer", $cust_update);
        if ($update_package)
            echo "Package update for customer '" . $customer_id . "<br>";
        else
            echo "Package not update for customer '" . $customer_id . "<br>";
        /* Update custoemr Package */


        /* Get Customer Detail */

        $ci->db->select("customer.*, packages.*");
        $ci->db->join("packages", "customer.package_id = packages.packages_id");
        $ci->db->where("customer_id", $customer_id);
        $get = $ci->db->get("customer");
        $customer_detail = $get->row_array();


        $customer_name = $customer_detail['first_name'] . " " . $customer_detail['last_name'];
        $c_id = $customer_id;
        $c_package = $customer_detail['package_id'];
        $registration_amount = $customer_detail['bv_value'];
        $unilevel_commision = $customer_detail['uni_commission'];

        /* Get Customr Detail Ends */

        /* Direct commision start */
        $ref_id = $customer_detail['ref_id'];

        $ci->db->select("customer.*, packages.*");
        $ci->db->join("packages", "customer.package_id = packages.packages_id");
        $ci->db->where("customer_id", $ref_id);
        $get = $ci->db->get("customer");
        $ref_details = $get->row_array();
        $direct_commision_percentage = $ref_details['direct_commission'];
        $direct_commision = ($registration_amount * $direct_commision_percentage) / 10;

        $query = "UPDATE `biz_customer` SET `direct_commission` = `direct_commission` + " . $direct_commision . " WHERE customer_id = '" . $ref_id . "'";
        $up_direct = $ci->db->query($query);
        if ($up_direct)
            echo "Direct commission update for '" . $ref_id . "'<br/>";
        else
            echo "Direct not commission update for '" . $ref_id . "'<br//>";
        /* Direct commision end */



        /* Commision Distrinution Start */

        if ($update_package && $c_package > 1) {
            $parent_id = $customer_detail['parent_id_binary'];
            $cus_ref = $customer_detail['ref_id'];
            $parent_position = $customer_detail['parent_position'];
            $uni_counter = 0;
            while ($parent_id > 0) {



                $ci->db->select("child_left, child_right,package_id, parent_id_binary, package_id, ref_id");
                $ci->db->where("customer_id", $parent_id);
                $get = $ci->db->get("customer");
                $parent_detail = $get->row_array();


//                            $parent_detail = $ci->mod_customer->get_parent_info($parent_id);

                if ($parent_detail['package_id'] > 1) {
                    if ($parent_position == "L") {

                        //$ci->mod_customer->update_customer_commision_balance($parent_id, $registration_amount, "Left");

                        $query = "UPDATE `biz_customer` SET `left_commision_balance` = `left_commision_balance` + " . $registration_amount . " WHERE customer_id = '" . $parent_id . "'";

                        $lcom = $ci->db->query($query);
                        if ($lcom)
                            echo "Left commision updated for '" . $parent_id . "' <br>";
                        else
                            echo "Left commision not updated for '" . $parent_id . "' <br>";
                        $notification_data = array(
                            "customer_id" => $parent_id,
                            "dated" => date("Y-m-d"),
                            "description" => "New customer(" . $customer_name . ") has activated account on your left side",
                            "read_status" => 0,
                            "created_by" => $cust_id,
                            "created_date" => date("Y-m-d")
                        );
                        //  $ci->mod_common->add_customer_notification($notification_data);
                        $ci->db->insert("biz_customer_notification", $notification_data);
                    } else if ($parent_position == "R") {
                        //    echo "Right balance inceser of ".$registration_amount." to ".$parent_id;
                        //$ci->mod_customer->update_customer_commision_balance($parent_id, $registration_amount, "Right");
                        $query = "UPDATE `biz_customer` SET `right_commision_balance` = `right_commision_balance` + " . $registration_amount . " WHERE customer_id = '" . $parent_id . "'";
                        $rcom = $ci->db->query($query);

                        if ($rcom)
                            echo "Right commision updated for '" . $parent_id . "' <br>";
                        else
                            echo "Right commision not updated for '" . $parent_id . "' <br>";


                        $notification_data = array(
                            "customer_id" => $parent_id,
                            "dated" => date("Y-m-d"),
                            "description" => "New customer(" . $customer_name . ") has activated account on your right side",
                            "read_status" => 0,
                            "created_by" => $cust_id,
                            "created_date" => date("Y-m-d")
                        );
                        //$ci->mod_common->add_customer_notification($notification_data);
                        $ci->db->insert("biz_customer_notification", $notification_data);
                    }
                }
                /* Count paid Childs Start */
                if ($parent_position == "L") {
                    // $ci->mod_customer->update_paid_child_count($parent_id, "Left");
                    $query = "UPDATE `biz_customer` SET `left_paid_child_count` = `left_paid_child_count` + 1 WHERE customer_id = '" . $parent_id . "'";
                    $lc = $ci->db->query($query);
                    if ($lc)
                        echo "Left child count updated for '" . $parent_id . "' <br>";
                    else
                        echo "Left child count  not updated for '" . $parent_id . "' <br>";
                } else if ($parent_position == "R") {
                    //    echo "Right balance inceser of ".$registration_amount." to ".$parent_id;
//                    $ci->mod_customer->update_paid_child_count($parent_id, "Right");
                    $query = "UPDATE `biz_customer` SET `right_paid_child_count` = `right_paid_child_count` + 1 WHERE customer_id = '" . $parent_id . "'";
                    $ci->db->query($query);
                    if ($rc)
                        echo "Right child count updated for '" . $parent_id . "' <br>";
                    else
                        echo "Right child count  not updated for '" . $parent_id . "' <br>";
                }

                /* Count paid childs end */

                /* DISTRIBUTE UNI lEVEL COMMISION UPTO TENth LEVEL START */
                if ($uni_counter < 10) {

//                    $ci->mod_customer->update_customer_unilevel_commision_balance($cus_ref, $unilevel_commision);
                    $query = "UPDATE `biz_customer` SET `unilevel_commission` = `unilevel_commission` + " . $unilevel_commision . " WHERE customer_id = '" . $cus_ref . "'";
                    $uc = $ci->db->query($query);
                    if ($uc)
                        echo "Unilevel commision updated for '" . $cus_ref . "' <br>";
                    else
                        echo "Unilevel commision not updated for '" . $cus_ref . "' <br>";
                }
                $cus_ref = $parent_detail['ref_id'];
                $uni_counter++;

                /* DISTRIBUTE UNI lEVEL COMMISION UPTO TENth LEVEL END */


                $c_id = $parent_id;
                $parent_id = $parent_detail['parent_id_binary'];


                //    printme($customer_detail);
            }
            /*
              COMMISION DISTRIBUTION END
             */
        }

        /* Commision Distrinution Ends */


        $i++;
        echo "<br></br>";
    }
}

function random_number_generator($digit) {

    $randnumber = '';
    $totalChar = $digit;  //length of random number
    $salt = "0123456789";  // salt to select chars
    srand((double) microtime() * 1000000); // start the random generator
    $password = ""; // set the inital variable

    for ($i = 0; $i < $totalChar; $i++)  // loop and create number
        $randnumber = $randnumber . substr($salt, rand() % strlen($salt), 1);

    return $randnumber;
}

// random_password_generator()
//Random Alhpa Numeric string generator
function random_alphanumaric_generator($digit) {

    $randnumber = '';
    $totalChar = $digit;  //length of random number
    $salt = "0123456789ABCBEFGHIJKLMNOPQRSTUVWXYZ";  // salt to select chars
    srand((double) microtime() * 1000000); // start the random generator
    $password = ""; // set the inital variable

    for ($i = 0; $i < $totalChar; $i++)  // loop and create number
        $randnumber = $randnumber . substr($salt, rand() % strlen($salt), 1);

    return $randnumber;
}

// 

function random_alphawords_generator($digit) {

    $randnumber = '';
    $totalChar = $digit;  //length of random number
    $salt = "ABCBEFGHIJKLMNOPQRSTUVWXYZ";  // salt to select chars
    srand((double) microtime() * 1000000); // start the random generator
    $password = ""; // set the inital variable

    for ($i = 0; $i < $totalChar; $i++)  // loop and create number
        $randnumber = $randnumber . substr($salt, rand() % strlen($salt), 1);

    return $randnumber;
}

function salesprice($product_price, $shipping_cost, $rate = 1) {
    return $saleprice = number_format((($product_price) * $rate), 2, ".", ",");
}

function cal_salesprice($product_price, $shipping_cost, $rate = 1) {
    return $saleprice = number_format((($product_price ) * $rate), 2, ".", "");
}

function cashbackprice($product_price, $rate = 1, $commission = 2) {
    //return $saleprice = number_format((($product_price) * $rate) / $commission);
	return $saleprice = number_format((($product_price) * $rate));
}

function slider_with_data() {
    $ci = & get_instance();
    $query = "SELECT * FROM biz_front_banner where status ='" . 1 . "' order by sorting_order asc";
    $get = $ci->db->query($query);
//    echo $ci->db->last_query();exit;
    return $data = $get->result_array();
}

function getmobileapp() {

    //Check for Android in-App
    if ($_SERVER['HTTP_X_REQUESTED_WITH'] == "bkmalls.nsol.webapp") {
        $mobileapp = 'in-app-android';
        return $mobileapp;
    }
    return $mobileapp = "Web";
}

function lastquery() {

    $ci = & get_instance();
    echo $ci->db->last_query();
}

function get_email_send_content($email_id = 0) {
    $ci = & get_instance();
    $data = array();
    $get_from_email = $ci->mod_common->get_preferences_setting('from_email');
    $data['from_email'] = $get_from_email['setting_value'];
    //Get From Name
    $get_from_txt = $ci->mod_common->get_preferences_setting('email_from_txt');
    $data['from_txt'] = $get_from_txt['setting_value'];
    //Get Email Header
    $get_email_header = $ci->mod_common->get_preferences_setting('email_header');
    $data['email_header'] = $get_email_header['setting_value'];
    //Get Email Footer
    $get_email_footer = $ci->mod_common->get_preferences_setting('email_footer');
    $data['email_footer'] = $get_email_footer['setting_value'];



    $table_email = "biz_email";
    $where_email = array(
        "id" => $email_id
    );
    $get_email_content = $ci->mod_common->select_single_records($table_email, $where_email);
    $data['email_subject'] = $get_email_content['email_subject'];
    $data['email_body'] = $get_email_content['email_body'];



    $config = Array('protocol' => 'smtp',
        'smtp_host' => 'ssl://mail.BKmalls.com',
        'smtp_port' => 465,
        'smtp_user' => 'support@BKmalls.com',
        'smtp_pass' => '&*K93~@kI2M}',
        'mailtype' => 'html',
        'charset' => 'iso-8859-1'
    );

    $data['mail_config'] = $config;

    return $data;
}

function do_send_email($email_data) {

   $ci = & get_instance();
    $data = array();
    $from_email = $email_data['from_email'];
    $from_txt = $email_data['from_txt'];
    $email_header = $email_data['email_header'];
    $email_footer = $email_data['email_footer'];

    $email_subject = $email_data['email_subject'];
    
  $message = $email_header . $email_data['email_content'] . $email_footer;

   $config = $email_data['mail_config'];

    $ci->load->library('email', $config);
    $ci->email->from($from_email, $from_txt);
    $ci->email->to($email_data['to']);
    $ci->email->subject($email_subject);
    $ci->email->message($message);
    $ci->email->send();
    //echo $this->email->print_debugger();
    $ci->email->clear();
}


function has_children_tree($rows, $id) {
    foreach ($rows as $row) {
        if ($row['parent_id'] == $id) {
            return true;
        }
    }
    return false;
}
function doOutputList($rows, $parent = 0, $ischild = 0) {
//printme($rows); exit;
    $display = "";
    $child_id = "";
    if ($ischild == 1) {
        $child_id = "child_of_" . $parent;
//        $display = "display:none";
    }
    $result = "<ul id='" . $child_id . "' style='" . $display . "'>";

    foreach ($rows as $row) {
        if ($row['parent_id'] == $parent) {

            $arrow = "";
            $pid = $row['id'];
            if (has_children_tree($rows, $row['id'])) {
                $arrow = "<span class='parent_row' id='" . $pid . "' ><i class='fa fa-plus-square-o' aria-hidden='true' style='font-size:19px'></i></span>";
            }
            $checkbox = '<label class="checkbox-inline"><span  class="coa_detail_tab" id="'.$row['id'].'">' . $row['title'] . '</span></label>';
            $result.= "<li >" . $arrow . $checkbox;
            if (has_children_tree($rows, $row['id'])) {

                $result.= doOutputList($rows, $row['id'], 1);
            }
            $result.= "</li>";
        }
    }
    $result.= "</ul>";

    return $result;
}

function coa_tree($rows, $parent = 0, $ischild = 0, $counter=0) {
//printme($rows); exit;
    $display = "";
    $child_id = "";
    if ($ischild == 1) {
        $child_id = "child_of_" . $parent;
//        $display = "display:none";
    }
        if ($counter == 0) {
        $result = '<ul><li ><label class="checkbox-inline"><input type="radio" checked name="coa_parent"  value="0"><span>Root Chart of Account</span></label>';
    }
    $counter++;
    
    $result .= "<ul id='" . $child_id . "' style='" . $display . "'>";

    foreach ($rows as $row) {
        if ($row['parent_id'] == $parent) {

            $arrow = "";
            $pid = $row['id'];
            if (has_children_tree($rows, $row['id'])) {
                $arrow = "<span class='parent_row' id='" . $pid . "' ><i class='fa fa-plus-square-o' aria-hidden='true' style='font-size:19px'></i></span>";
            }
            $checkbox = '<label class="checkbox-inline"><input type="radio"  name="coa_parent"  value="'.$row['id'].'"><span>' . $row['title'] . '</span></label>';
            $result.= "<li >" . $arrow . $checkbox;
            if (has_children_tree($rows, $row['id'])) {

                $result.= coa_tree($rows, $row['id'], 1, $counter);
            }
            $result.= "</li>";
        }
    }
    $result.= "</ul>";

    return $result;
}
function coa_selected_tree($coa_id =0,$coa_pid=0,  $rows, $parent = 0, $ischild = 0, $counter=0) {
//printme($rows); exit;
    $display = "";
    $child_id = "";
    if ($ischild == 1) {
        $child_id = "child_of_" . $parent;
//        $display = "display:none";
    }
        if ($counter == 0) {
            
        $result = '<ul><li ><label class="checkbox-inline"><input type="radio" checked name="coa_parent"  value="0"><span>Root Chart of Account</span></label>';
    }
    $counter++;
    
    $result .= "<ul id='" . $child_id . "' style='" . $display . "'>";

    foreach ($rows as $row) {
        if ($row['parent_id'] == $parent) {

            $arrow = "";
            $pid = $row['id'];
            if (has_children_tree($rows, $row['id'])) {
                $arrow = "<span class='parent_row' id='" . $pid . "' ><i class='fa fa-plus-square-o' aria-hidden='true' style='font-size:19px'></i></span>";
            }
            $selected="";
            if($row['id'] == $coa_pid){ $selected ="checked"; }
            if($row['id'] == $coa_id){
            $checkbox = '<label class="checkbox-inline"><span>' . $row['title'] . '</span></label>';
            }else {
            $checkbox = '<label class="checkbox-inline"><input type="radio" '.$selected.' name="coa_parent"  value="'.$row['id'].'"><span>' . $row['title'] . '</span></label>';
                
            }
            $result.= "<li >" . $arrow . $checkbox;
            if (has_children_tree($rows, $row['id'])) {

                $result.= coa_selected_tree($coa_id,$coa_pid,$rows, $row['id'], 1, $counter);
            }
            $result.= "</li>";
        }
    }
    $result.= "</ul>";

    return $result;
}


	/* matiullah*/

   function get_latest_messages($cust_id) {
    $ci = & get_instance();
    $query = "SELECT `cust`.*, `mess`.* FROM (`biz_customer` cust) JOIN `biz_messages` mess ON `cust`.`customer_id`= `mess`.`send_from` WHERE `mess`.`send_to`='$cust_id' and `mess`.`isread`='0' group by `cust`.`customer_id` ORDER BY `mess`.`id` DESC";

         $get = $ci->db->query($query);
         return $get->result_array();

    }


    function main_menu_adds_banners() {

        $ci = & get_instance();

        $ci->db->select("*");
        $ci->db->from("banner");
       
        $get = $ci->db->get();

        return $get->result_array();

     
    }
	
	function insert_dhl_data($shipment_name, $charges, $item_id, $shipment_currency) {
		$ci = & get_instance();
		$ci->load->library('session');
        $ci->session->unset_userdata("dhl_error");
		$ci->db->select("*");
        $ci->db->from("biz_dhl_api_data");
		$ci->db->where('item_id', $item_id);
		$ci->db->where('shipment_name', $shipment_name);
        $get = $ci->db->get();
		$records = $get->num_rows();
		if($records>0){
		$ci->db->where('item_id', $item_id);
		$ci->db->where('shipment_name', $shipment_name);
        $ci->db->delete('biz_dhl_api_data'); 
		}
		$data = array(
		  'shipment_name' => $shipment_name,
		  'shipment_charges' => $charges,
		  'item_id' => $item_id,
		  'shipment_currency' => $shipment_currency
		);
		$ci->db->insert('biz_dhl_api_data', $data);
   }
   function set_dhl_error($error){
	 $ci = & get_instance();
	 $ci->load->library('session');
     $ci->session->set_userdata("dhl_error", $error);
   }
   function get_dhl_shipment_info($item_id, $shipment_name){
	    $ci = & get_instance();

        $ci->db->select("*");
        $ci->db->from("dhl_api_data");
		$ci->db->where('item_id', $item_id);
		$ci->db->where('shipment_name', $shipment_name);
       
        $get = $ci->db->get();

        return $get->row_array();   
	   
   }
   
   function is_create_event() {
        
        $ci = & get_instance();
        $cust_id = $ci->session->userdata('customer_id');
        $ci->db->select("*");
        $ci->db->from("customer");
		$ci->db->where("customer_id", $cust_id);
		$ci->db->where("create_event", 1);
       
        $get = $ci->db->get();

        return $get->result_array();
     
    }
	
	function get_site_preferences() {
     $ci = & get_instance();
     $query = "SELECT * FROM biz_site_preferences where setting_name in ('flush_free_users_commission')";
     $get = $ci->db->query($query);
	 //    echo $ci->db->last_query();exit;
	 $data = $get->result_array();
	 foreach($data as $key => $val){
		$site_preference[$val['setting_name']]=$val['setting_value'];
	 }
	 return $site_preference;
    }

    function common_contacts(){
        $ci = & get_instance();
        $query="SELECT * FROM  `biz_store_information` WHERE id ='1'";
        $get=$ci->db->query($query);
        return $get->row_array();
    }

    function common_cms(){
        $ci = & get_instance();
        $query="SELECT * FROM `biz_cms` order by id desc limit 4";
        $get=$ci->db->query($query);
        return $get->result_array();
    }

    function terms(){
        $ci = & get_instance();
        $query="SELECT * FROM  `biz_cms` WHERE id ='14'";
        $get=$ci->db->query($query);
        return $get->row_array();
    }

    function admin_notification(){
    $ci = & get_instance();
    $query = "SELECT * FROM biz_notifications WHERE admin_read_status =  '0'ORDER BY id DESC LIMIT 5";
    $get = $ci->db->query($query);
       // echo $ci->db->last_query();exit;
    return $data = $get->result_array();
  }

  function footer_text(){
    $ci = & get_instance();
    $query = "SELECT * FROM  `biz_site_preferences` WHERE id ='5' LIMIT 0 , 30";
    $get = $ci->db->query($query);
       // echo $ci->db->last_query();exit;
    return $data = $get->row_array();
  }


  function assign_count($id){
    $ci = & get_instance();
    $query="SELECT * FROM `ci_assign` WHERE `assign_ro` = $id AND `is_read` = 0";
    $get = $ci->db->query($query);
    return $get->num_rows();
  }

  function visit_count($id){
    $where=array(
        'a.assign_ro' => $id,
        'st.stage_name_id' => 3, 
    );
    $ci = & get_instance();
    $ci->db->select('l.id,c.name,c.id as customer_id,d.name as designation,c.phone,b.Name as bdm,a.created_date');
    $ci->db->from('customer c');
    $ci->db->join('designation d','d.id=c.designation_id','left');
    $ci->db->join('customer_leads l','l.customer_id=c.id','left');
    $ci->db->join('assign a','a.lead_id=l.id','left');
    $ci->db->join('users r','r.id=a.assign_ro','left');
    $ci->db->join('users b','b.id=l.user_id','left');
    $ci->db->join('stage st','st.id=l.stage_id','left');
    $ci->db->where($where);

    $get=$ci->db->get();
    return $get->num_rows();

  }

  function wip_count($id){
    $where=array(
        'a.assign_ro' => $id,
        'st.stage_name_id' => 4, 
    );
    $ci = & get_instance();
    $ci->db->select('l.id,c.name,c.id as customer_id,d.name as designation,c.phone,b.Name as bdm,a.created_date');
    $ci->db->from('customer c');
    $ci->db->join('designation d','d.id=c.designation_id','left');
    $ci->db->join('customer_leads l','l.customer_id=c.id','left');
    $ci->db->join('assign a','a.lead_id=l.id','left');
    $ci->db->join('users r','r.id=a.assign_ro','left');
    $ci->db->join('users b','b.id=l.user_id','left');
    $ci->db->join('stage st','st.id=l.stage_id','left');
    $ci->db->where($where);

    $get=$ci->db->get();
    return $get->num_rows();

  }

  function presentation_count($id){
    $where=array(
        'a.assign_ro' => $id,
        'st.stage_name_id' => 6, 
    );
    $ci = & get_instance();
    $ci->db->select('l.id,c.name,c.id as customer_id,d.name as designation,c.phone,b.Name as bdm,a.created_date');
    $ci->db->from('customer c');
    $ci->db->join('designation d','d.id=c.designation_id','left');
    $ci->db->join('customer_leads l','l.customer_id=c.id','left');
    $ci->db->join('assign a','a.lead_id=l.id','left');
    $ci->db->join('users r','r.id=a.assign_ro','left');
    $ci->db->join('users b','b.id=l.user_id','left');
    $ci->db->join('stage st','st.id=l.stage_id','left');
    $ci->db->where($where);

    $get=$ci->db->get();
    return $get->num_rows();

  }
?>