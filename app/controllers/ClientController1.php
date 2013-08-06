<?php

class ClientController extends BaseController {

	protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
		 $this->beforeFilter('csrf', array('on' => 'post'));
	}

	public function index($success_message = false)
	{
		$clients = $this->client->orderBy('created_at', 'DESC')
							->get();
		$data = array(
			'title' => 'Clients', 
			'title_small' => '', 
			'clients' => $clients
		); 
	 	return View::make('clients.main', $data);
	}

	public function clientAdd()
	{
		$data = array(
			'title' => 'Add Client', 
			'title_small' 			=> 	'',
			'errors'				=>	false,
			'client_object'			=>	false,
			'attributes'			=>	false,
			'success'				=>	false,
			'success_attributes' 	=> 	false,
			'edit_form'				=>	false
		); 
	 	return View::make('clients.form', $data);
	}

	public function clientHandleAdd()
	{
		$data = array(
			'title' 				=> 'Add Client', 
			'title_small' 			=> '',
			'edit_form'				=>	false,
			'client_object'			=>	false,
		); 

		if (Input::all())
		{
			$s = $this->client->fill(Input::all());
			
			if($s->save()) 
			{
				$data['success'] = $s;
				$data['success_attributes'] = $s['attributes'];
				$data['errors']	= false;
				$data['attributes']	= false;
				return View::make('clients.form', $data);
			}
			
			$data['success_message'] = false;
			$data['success'] = false;
			$data['errors'] = $s;
			$data['attributes'] = $s['attributes'];

		}
		
		return View::make('clients.form', $data);
	}

	public function clientEdit($uid)
	{
		$client_object = $this->client->where('id', '=', $uid)->get();
		$client_object_count = count($client_object);

		$data = array(
			'title' 				=> 	'Edit Client', 
			'title_small' 			=> 	'',
			'edit_form'				=>	true,
			'test_input'			=>	false,
			'errors'				=>	false,
			'client_object_update'	=>	false,
			'success'				=>	false,
			'success_attributes' 	=> 	false
		);

		if($client_object_count == 1) {
			$data['client_object'] = $client_object;
			$data['attributes'] = $client_object[0]['attributes'];
		}else {
			return Redirect::to('clients');
		}

		if(Input::all()) {
			$update_input = Input::all();
			if($update_input['id'] != $uid) 
			{
				/* Security - If somebody edited the id within element inspector. */
				return Redirect::to('clients');
			}
			$client_object_update = $this->client->fill($update_input);
			$client_object_update->validate();
			$data['errors'] = $client_object_update;
			$data['attributes'] = $client_object_update['attributes'];
			$data['attributes']['id'] = $uid;
			//If no errors detected
			if(!$data['errors']['errors']){
				$update_fields = $this->client->where('id', '=', $uid);
				$update_fields->update(
					array(
						'firstname' 	=>	$data['attributes']['firstname'], 
						'lastname' 		=>	$data['attributes']['lastname'], 
						'email' 		=>	$data['attributes']['email'],
						'phone'			=>	$data['attributes']['phone'],
						'mobile'		=>	$data['attributes']['mobile'],
						'address'		=>	$data['attributes']['address']
					)
				);
				$message = 'You\'ve successfuly edited <strong>' . $data['attributes']['firstname'] . ' ' . $data['attributes']['lastname'] . '</strong>';
				Session::flash('update_message', $message);
				return Redirect::to('clients');
			}


			return View::make('clients.form', $data);
		}

		return View::make('clients.form', $data);
	}

	public function clientDelete($uid) 
	{
		$deleted_client = $this->client->find($uid);
		$delete_action = $this->client->find($uid)->delete();
		$message = 'You successfuly deleted the client record!';
		Session::flash('delete_message', $message);
		return Redirect::to('clients');
	}

}