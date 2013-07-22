<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportform extends MY_Controller {
               
	function __construct()
	{
		parent::__construct();

		if($this->input->cookie('language') != ""){ $language = $this->input->cookie('language');}else{ $language = "english";}
		$this->lang->load('Reportform', $language);

		if($this->client){	
			redirect('cprojects');
		}elseif($this->user){

		}else{
			//redirect('reportform/');
		}
		$this->view_data['submenu'] = array(
				 		$this->lang->line('application_report') => 'Reportform'
				 		);	
		
	}	
	function index()
	{
		if($_POST){
			unset($_POST['send']);
			$_POST = array_map('htmlspecialchars', $_POST);
			$_POST['status'] = "New"; 
			$_POST['date'] = date("Y-m-d H:i", time()); 
			$item = Quote::create($_POST);
       		if(!$item){$this->session->set_flashdata('message', 'error:'.$this->lang->line('quotation_create_error'));}
       		else{
       				$this->load->helper('notification');
       				$this->session->set_flashdata('message', 'success:'.$this->lang->line('quotation_create_success'));
       				$admins = User::find('all', array('conditions' => array('admin = ? AND status = ?', '1', 'active')));
       				foreach ($admins as &$value):
					send_notification($value->email, $this->lang->line('application_notification_quotation_subject'), $this->lang->line('application_notification_quotation'));
					endforeach;
       		}
			redirect('quotation');
			
		}else
		{
		$this->theme_view = 'fullpage';
		$this->view_data['form_action'] = 'quotation';
		$this->content_view = 'quotation/_main';
		}
	}
	function language($lang = false){
		$folder = 'application/language/';
		$languagefiles = scandir($folder);
		if(in_array($lang, $languagefiles)){
		$cookie = array(
                   'name'   => 'language',
                   'value'  => $lang,
                   'expire' => '31536000',
               );
 
		$this->input->set_cookie($cookie);
		}
		redirect('quotation'); 
	}

	
}