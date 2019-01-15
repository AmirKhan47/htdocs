<?php
class Challan_model extends CI_Model
{
	private $db;
	function __construct()
	{
		// connect to secondary database
		$this->db=$this->load->database('second_database', TRUE);
	}

	public function get_challan($roll)
	{
		$query = $this->db->get_where('all_students', array('roll_number'=>$roll));
		return $query->row_array();
	}
	public function get_all_students()
	{
		$query = $this->db->get('all_students');
		return $query->row_array();
	}
}
?>