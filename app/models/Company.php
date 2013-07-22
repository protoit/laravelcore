<?php

class Company extends BaseModel {
	
	
	protected $table = 'companies';
		
	protected $fillable = array(
						'title', 
						'name', 
						'author',
						'description',
						'ratings',
						);
						
	protected $guarded = array();
	
	protected $hidden = array('created_at', 'updated_at', 'deleted_at');
	
	protected static $rules = array(
		'title'  			=> 'required|max:64',
		'author'  			=> 'required|max:50',
		'url'  				=> 'required',
		//'email'  			=> 'required|email|max:50|unique:gym,email,:id:',
	);
	
	
	
	
	static $has_many = array(
	array('clients', 'conditions' => 'inactive != 1'),
    array('invoices'),
    array('projects'),
    array('subscriptions')
    );

    static $belongs_to = array(
    array('client', 'conditions' => 'inactive != 1')
    );
}