<?php

class Object extends BaseModel {
	public $timestamps = false;
	protected $table = 'object';
		
	protected $fillable = array(
						'name'
						);
						
	protected $guarded = array();
	
	protected $hidden = array();
	
	public static $rules = array(
		'name'  		=> 'required|max:200'
	);

	// Override Messages
	protected static $messages = array(
		'name.required'		=>	'The Name is required'
	);
	
}