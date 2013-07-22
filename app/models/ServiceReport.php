<?php

class ServiceReport extends BaseModel{

	protected $table = 'service_reports';
		
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
		//'description'  		=> 'required',
		'url'  				=> 'required',
		//'contact_no'  		=> 'required|max:50',
		//'email'  			=> 'required|email|max:50|unique:gym,email,:id:',
	);

}