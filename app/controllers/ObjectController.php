<?php

class ObjectController extends BaseController {

	protected $object;

	public function __construct(Object $object)
	{
		$this->object = $object;
	 	$this->beforeFilter('csrf', array('on' => 'post'));
	}

	public function index($success_message = false)
	{
		$objects = $this->object->orderBy('id', 'ASC')
							->get();
		$data = array(
			'title' 		=> 'Objects', 
			'title_small' 	=> '', 
			'objects' 		=> $objects
		); 
	 	return View::make('objects.main', $data);
	}

	public function objectAdd()
	{
		$data = array(
			'title' 				=> 	'Add Object', 
			'title_small' 			=> 	'',
			'errors'				=>	false,
			'object_object'			=>	false,
			'attributes'			=>	false,
			'success'				=>	false,
			'success_attributes' 	=> 	false,
			'edit_form'				=>	false
		); 
	 	return View::make('objects.form', $data);
	}

	public function objectHandleAdd()
	{
		$data = array(
			'title' 				=> 'Add Object', 
			'title_small' 			=> '',
			'edit_form'				=>	false,
			'object_object'			=>	false,
		); 

		if (Input::all())
		{
			$s = $this->object->fill(Input::all());
			
			if($s->save()) 
			{
				$data['success'] = $s;
				$data['success_attributes'] = $s['attributes'];
				$data['errors']	= false;
				$data['attributes']	= false;
				return View::make('objects.form', $data);
			}
			
			$data['success_message'] = false;
			$data['success'] = false;
			$data['errors'] = $s;
			$data['attributes'] = $s['attributes'];

		}
		
		return View::make('objects.form', $data);
	}

	public function objectEdit($uid)
	{
		$object_object = $this->object->where('id', '=', $uid)->get();
		$object_object_count = count($object_object);

		$data = array(
			'title' 				=> 	'Edit Object', 
			'title_small' 			=> 	'',
			'edit_form'				=>	true,
			'test_input'			=>	false,
			'errors'				=>	false,
			'object_object_update'	=>	false,
			'success'				=>	false,
			'success_attributes' 	=> 	false
		);

		if($object_object_count == 1) {
			$data['object_object'] = $object_object;
			$data['attributes'] = $object_object[0]['attributes'];
		}else {
			return Redirect::to('objects');
		}

		if(Input::all()) 
		{
			$data['attributes']['id'] = $uid;
			
			$object = $this->object->find($uid);
			$object->fill(Input::all());
			
			//If no errors detected
			if($object->save())
			{
				$message = 'Object has been saved!';
				Session::flash('update_message', $message);
				return Redirect::to('objects');
			}
			
			$data['errors'] = $object->errors;
		}

		return View::make('objects.form', $data);
	}

	public function objectDelete($uid) 
	{
		$deleted_object = $this->object->find($uid);
		//Check if object exists
		if($deleted_object)
		{
			$delete_action = $this->object->find($uid)->delete();
		}
		if(!$deleted_object)
			return Redirect::to('objects');
		$message = 'You successfuly deleted the object record!';
		Session::flash('delete_message', $message);
		return Redirect::to('objects');
	}

}