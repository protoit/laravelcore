<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timesheets_model extends CI_Model{
	
	function fetch_table($tbl){
		$query = $this->db->get($tbl);
		return $query->result();
	}
	
	function fetch_table_where($tbl,$where){
		$query = $this->db->get_where($tbl,$where);
		return $query->result();
	}
	
}