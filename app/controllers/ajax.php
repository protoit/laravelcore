<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller{
	
	function test(){
		$this->load->model("ajax_model");
		$data['the_content'] = $this->ajax_model->get_companies($this->input->post("object_name"));
		$this->load->view('ajax/statistics',$data);
	}
	
	function get_task_codes(){
		$this->load->model("ajax_model");
		$data['tbldata'] = $this->ajax_model->get_taskcodes($this->input->post("company_name"),$this->input->post("object_name"));
		$this->load->view('ajax/table',$data);
	}
	
	function count_task_codes(){
		$this->load->model("ajax_model");
		echo $this->ajax_model->count_taskcodes($this->input->post("company_name"),$this->input->post("object_name"));
	}
	
	function get_companies_has_location(){
		$this->load->model("timesheets_model");
		$where = array('object'=>$this->input->post('data'));
		$data['data_table'] = $this->timesheets_model->fetch_table_where('companies_has_location',$where);
		$this->load->view('ajax/get_companies_has_location',$data);
	}
	
	function get_journal_ids(){
		$this->load->model("timesheets_model");
		$where = array('catname_has_items'=>$this->input->post('data'));
		$data = $this->timesheets_model->fetch_table_where('objectcat',$where);
		$vdata = explode(',',$data[0]->shiftjournalcode_access);
		$this->load->model("ajax_model");
		print_r($vdata);
		$adata = $this->ajax_model->get_taskcodes_by_id($vdata);
		//echo print_r($vdata);
		$edata['dropdown_ids'] = $adata;
		$this->load->view('ajax/dropdown_ids',$edata);
		//print_r($this->timesheets_model->fetch_table_where('objectcat',$where));
	}
	
}