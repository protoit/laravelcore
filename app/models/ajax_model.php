<?php	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Ajax_model extends CI_Model{			

		function get_companies($object_name){
			$query = $this->db->query('SELECT DISTINCT company FROM shiftjournal WHERE object="'.$object_name.'"');
			return $query->result();
		}
		
		function get_taskcodes($company_name,$object_name){
			$query = $this->db->query('SELECT taskcode,COUNT(*) AS counter FROM shiftjournal WHERE company="'.$company_name.'" AND object="'.$object_name.'" GROUP BY taskcode');
			return $query->result();
		}
		
		function count_taskcodes($company_name,$object_name){
			$qdata = $this->get_taskcodes($company_name,$object_name);
			$total = 0;
			foreach($qdata as $data){
				$total += $data->counter;
			}
			return $total;
		}
		
		function get_taskcodes_by_id($ids){
			$this->db->select('*');
			$this->db->from('shiftjournalcode');
			$this->db->where_in('id',$ids);
			$query = $this->db->get();
			return $query->result();
		}
		
	}	