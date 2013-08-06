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
						'object_id', 
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
	
	public function report_history()
	{
		// service_reports_id is the field to find in Model ServiceReportHistory
		return $this->hasMany('ServiceReportHistory', 'service_reports_id');	
	}
	
	public function user()
	{
		// approved_user_id is the field in Model ServiceReport
		return $this->belongsTo('User', 'approved_user_id');	
	}
	
	public function attachment()
	{
		// service_id is the field to find in Model ServiceReportAttachment
		return $this->hasMany('ServiceReportAttachment', 'service_id');	
	}
	
	public function object()
	{
		return $this->belongsTo('Object');	
	}
	
	
	
	public function getDateAttribute($value)
    {
		return date('d/m/Y', strtotime($value));
    }
	
	public function getTimeStartAttribute($value)
    {
		return date('H:i', strtotime($value));
    }
	
	public function getTimeEndAttribute($value)
    {
		return date('H:i', strtotime($value));
    }
	
	public function getApprovedAttribute($value)
    {
		return $this->time_start;
    }

}