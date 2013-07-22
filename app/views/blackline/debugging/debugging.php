<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Debugging extends MY_Controller {
               
    function __construct()
    {
        parent::__construct();
        
        if($this->client){    
            redirect('login');
        }elseif($this->user){
            foreach ($this->view_data['menu'] as $key => $value) { 
                if($value->link == "debugging"){ $access = TRUE;}
            }
            if(!$access){redirect('login');}
        }else{
            redirect('login');
        }
        
    }    
    function index()
    {
        $this->view_data['settings'] = Setting::first();
        $this->view_data['form_action'] = 'settings/settings_update';
        $this->content_view = 'debugging/all';
    }
        
}