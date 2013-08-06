<?php

class AnnounceReport extends BaseModel{

	protected $table = 'announce_reports';
		
	protected $fillable = array(
						  'tjenestenr',
						  'datetime',
						  'shiftjournal_id',
						  'company_id',
						  'organization_id',
						  'announce_name',
						  'announce_birth',
						  'announce_address',
						  'announce_zipcode',
						  'announce_city',
						  'announce_phone',
						  'announce_ident',
						  'announce_description',
						  'parent_name',
						  'parent_address',
						  'parent_zipcode',
						  'parent_city',
						  'parent_phone',
						  'action_where',
						  'action_datetime',
						  'type',
						  'type_other',
						  'announce_item',
						  'announce_item_value',
						  'announce_item_sum',
						  'announce_item_status',
						  'announce_item_status_other',
						  'announce_item_action_other',
						  'announce_item_action',
						  'witness_name',
						  'witness_address',
						  'witness_zipcode',
						  'witness_city',
						  'witness_phone',
						  'short_description',
						  'object_id',
						);
						
	protected $guarded = array();
	
	protected $hidden = array('created_at', 'updated_at', 'deleted_at');
	
	protected static $rules = array(
		//'title'  			=> 'required|max:64',
		'datetime'  			=> 'required|max:50',
		//'url'  				=> 'required',
		//'email'  			=> 'required|email|max:50|unique:gym,email,:id:',
	);
	
	public function company()
	{
		return $this->belongsTo('Company');	
	}
	
	public function object()
	{
		return $this->belongsTo('Object');	
	}
}