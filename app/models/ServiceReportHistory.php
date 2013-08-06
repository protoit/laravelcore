<?php

class ServiceReportHistory extends BaseModel{

	protected $table = 'service_reports_history';
		
	protected $fillable = array(
						'datetime', 
						'tjenestenr', 
						'description',
						'service_reports_id',
						);
						
	protected $guarded = array();
	
	protected $hidden = array('created_at', 'updated_at', 'deleted_at');
	
	protected static $rules = array(
		//'title'  			=> 'required',
		//'date'  			=> 'required',
		//'time_start'  		=> 'required',
		//'time_end'  		=> 'required',
		//'company_id'  		=> 'required',
		//'title'  			=> 'required',
		'description'  		=> 'required',
		//'email'  			=> 'required|email|max:50|unique:gym,email,:id:',
	);

}