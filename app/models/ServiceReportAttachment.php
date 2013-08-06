<?php

class ServiceReportAttachment extends BaseModel{

	protected $table = 'service_reports_attachments';
		
	protected $fillable = array(
						'attachment_url', 
						'service_id', 
						'service_id_linked_reports',
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
		//'description'  		=> 'required',
		//'email'  			=> 'required|email|max:50|unique:gym,email,:id:',
	);

}