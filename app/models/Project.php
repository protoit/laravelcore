<?php

class Project extends BaseModel {
	
	protected $table = 'projects';
		
	protected $fillable = array(
						'reference',
						'name', 
						'description', 
						'start',
						'end',
						'client_id',
						'progress',
						'phases',
						'category'
						);
						
	protected $guarded = array();
	
	protected $hidden = array('created_at', 'updated_at');
	
	public static $rules = array(
		'reference'		=> 'required|unique:projects,reference,:id:',
		'name'  		=> 'required|max:65',
		'start'			=> 'required',
		'end'			=> 'required',
		'client_id'		=> 'required|integer',
		'progress'		=> 'required|integer|min:0|max:100',
		'phases'		=> 'required|max:150',
		'category'		=> 'required|max:150'
	);
	
	public function client()
	{
		return $this->belongsTo('Client');	
	}
	
	
}