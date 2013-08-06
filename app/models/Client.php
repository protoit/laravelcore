<?php

class Client extends BaseModel {
	
	protected $table = 'clients';
		
	protected $fillable = array(
						'firstname', 
						'lastname', 
						'email',
						'phone',
						'mobile',
						'address'
						);
						
	protected $guarded = array();
	
	protected $hidden = array('created_at', 'updated_at');
	
	public static $rules = array(
		'firstname'  	=> 'required|max:100',
		'lastname'  	=> 'required|max:100',
		'email'  		=> 'required|email|max:50|unique:clients,email,:id:',
		'phone'			=> 'required|numeric',
		'mobile'		=> 'required|numeric'
	);

	// Override Messages
	protected static $messages = array(
		'firstname.required'=>	'The First Name is required',
		'lastname.required'=>	'The Last Name is required',
		'email.required'	=>	'The Email field is required',
		'phone.required'	=>	'The Phone Number is required',
		'phone.numeric'		=>	'The Phone Number should be numeric',
		'mobile.required'	=>	'The Mobile Number is Required',
		'mobile.numeric'	=> 	'The Mobile Number should be numeric'
	);
	
	
}