<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administration extends MY_Controller {
               
    function __construct()
    {
        parent::__construct();
        
        if($this->client){    
            redirect('cprojects');
        }elseif($this->user){
            foreach ($this->view_data['menu'] as $key => $value) { 
                if($value->link == "webnews"){ $access = TRUE;}
            }
            if(!$this->user->admin) {
            $this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_no_access'));
            redirect('dashboard');
        }
        $this->view_data['submenu'] = array(
                         $this->lang->line('application_admin_timesheets') => 'administration/admintimesheets',
                         $this->lang->line('application_admin_reports') => 'administration/adminreports',
                         $this->lang->line('application_admin_clients') => 'administration/adminclients',
                         $this->lang->line('application_users') => 'settings/users',
                         $this->lang->line('application_logs') => 'settings/logs',
                         );    
        $this->config->load('defaults');
    }
    function admintimesheets()
    {
        $this->view_data['admintimesheets'] = Invoice::all();
        $this->content_view = 'administration/admintimesheets';
    }
        
    }    
    function index()
    {
        $this->view_data['companies'] = Company::find('all',array('conditions' => array('inactive=?','0')));
        $this->content_view = 'administration/all';
    }
    function credentials($id = FALSE, $email = FALSE)
    {
        if($email){
            $this->load->helper('file');
            $client = Client::find($id);
            $setting = Setting::first();
            $this->email->from($setting->email, $setting->company);
            $this->email->to($client->email); 
            $this->email->subject($this->lang->line('application_account_details'));
            $this->load->library('parser');
            $parse_data = array(
                                'client_contact' => $client->contact,
                                'client_link' => $setting->domain,
                                'logo' => '<img src="'.base_url().''.$setting->logo.'" alt="'.$setting->company.'"/>',
                                'invoice_logo' => '<img src="'.base_url().''.$setting->invoice_logo.'" alt="'.$setting->company.'"/>'
                                );
            
            $message = read_file('./application/views/blackline/templates/email_credentials.html');
              $message = $this->parser->parse_string($message, $parse_data);
            $this->email->message($message);
            if($this->email->send()){$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_send_login_details_success'));}
               else{$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_send_login_details_error'));}
            redirect('clients/view/'.$id);

        } else {
        $this->view_data['client'] = Client::find($id);
        $this->theme_view = 'modal';
        $this->view_data['title'] = $this->lang->line('application_login_details');
        $this->view_data['form_action'] = 'clients/credentials';
        $this->content_view = 'clients/_credentials';
        }
    }
}