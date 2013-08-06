<?php

class Company extends BaseModel {
	
	
	protected $table = 'companies';

	public $timestamps = false;
			
	protected $fillable = array('reference',
								'name',
								'client_id',
								'phone',
								'mobile',
								'address',
								'zipcode',
								'city',
								'inactive',
								'website',
								'object',
								'company_location',
								'admin');
					
	protected $guarded = array();
	
	protected $hidden = array('created_at', 'updated_at', 'deleted_at');
	
	protected static $rules = array('name' => 'required|max:64',
									'client_id' => 'required|max:50');
									
	
	public function dropdown($id = 0)
	{
		$companies = Company::orderBy('name')->lists('name', 'id');
		
		//$data['row'] = $row = $this->service->find($id);
		
		Form::macro('companyDropdown', function() use($companies, $id)
		{
			return Form::select('company_id', $companies, $id, array(
																	'id' 				=> 'company_id', 
																	'class' 			=> 'span12 select2_category', 
																	'data-placeholder' 	=> "Customer Name")
																	);
		});
	}
	
	public function objectDropdown($id = 0)
	{
		$companies = Object::orderBy('name')->lists('name', 'id');
				
		Form::macro('objectDropdown', function() use($companies, $id)
		{
			return Form::select('object_id', $companies, $id, array(
																	'id' 				=> 'object_id', 
																	'class' 			=> 'span12 select2_category', 
																	'data-placeholder' 	=> "Object")
																	);
		});
	}
	
	public function conditionRadio($type = 0)
	{				
		Form::macro('conditionRadio', function() use($type)
		{														
			$radios = array('Theft / Petty larceny', 'Damage', 'Other');
			
			$conditions = '';
			
			foreach ($radios as $radio)
			{
				$check = '';
				
				if ($radio == $type) $check = 'checked';

				$conditions .= '<label class="radio line">
                                    <input type="radio" name="type" value="'.$radio.'" '.$check.' />
                                    '.$radio.'
                                    </label>';
			}
			
			return $conditions;									
																	
																	
		});
	}
	
	public function statusRadio($announce_item_status = '')
	{				
		Form::macro('statusRadio', function() use($announce_item_status)
		{														
			$stats = array('The goods are paid', 'Returned', 'Corrupted', 'Other');
			
			$status = '';
			
			foreach ($stats as $radio1)
			{
				$check1 = '';
				
				if ($radio1 == $announce_item_status) $check1 = 'checked';

				$status .= '<label class="radio line">
                                    <input type="radio" name="type" value="'.$radio1.'" '.$check1.' />
                                    '.$radio1.'
                                    </label>';
			}
			
			return $status;									
																	
																	
		});
	}
	
	public function getNameAttribute($value)
    {
        return utf8_decode($value);
    }
	
	public function getAddressAttribute($value)
    {
        return utf8_decode($value);
    }
	
	public function getZipcodeAttribute($value)
    {
        return utf8_decode($value);
    }
	
	public function getCityAttribute($value)
    {
        return utf8_decode($value);
    }
}