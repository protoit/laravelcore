<?php

class ServiceReport extends BaseModel{

	protected $table = 'service_reports';
		
	protected $fillable = array(
						'tjenestenr', 
						'date', 
						'time_start',
						'time_end',
						'shiftjournal_id',
						'company_id', 
						'object', 
						'title',
						'description',
						);
						
	protected $guarded = array();
	
	protected $hidden = array('created_at', 'updated_at', 'deleted_at');
	
	protected static $rules = array(
		'title'  			=> 'required',
		'date'  			=> 'required',
		'time_start'  		=> 'required',
		'time_end'  		=> 'required',
		'company_id'  		=> 'required',
		'title'  			=> 'required',
		'description'  		=> 'required',
		//'email'  			=> 'required|email|max:50|unique:gym,email,:id:',
	);
	
	public function company()
	{
		return $this->belongsTo('Company');	
	}

}