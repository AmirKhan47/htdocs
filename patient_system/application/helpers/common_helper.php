<?php
function admin_notifications(){
  $CI =& get_instance();
  $query='SELECT * FROM `notifications` where admin_read_status=0 ORDER by id DESC LIMIT 5';
  $get=$CI->db->query($query);
  return $get->result_array();

}
function notification_count(){
  $CI =& get_instance();
  $query='SELECT * FROM `notifications` where admin_read_status=0 ORDER by id DESC';
  $get=$CI->db->query($query);
  return $get->result_array();

}

?>