<?php	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Reports_model extends CI_Model{
		
		function get_company_by_id($id){
			$query = $this->db->get_where("companies",array('id'=>$id));
			return $query->row();
		}
		
	}