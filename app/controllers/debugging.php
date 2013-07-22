<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Debugging extends MY_Controller {
               
    function __construct()
    {
        parent::__construct();
        
        if($this->client){    
            redirect('cprojects');
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
        $this->content_view = 'debugging/all';
    }
        
}