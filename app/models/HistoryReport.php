<?php

class HistoryReport extends BaseModel{

	
	
	protected $table = 'service_reports_history';
		
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

	

	

}