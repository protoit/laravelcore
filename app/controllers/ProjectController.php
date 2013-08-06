<?php

class ProjectController extends BaseController {

	protected $project;
	protected $client;

	public function __construct(Project $project, Client $client)
	{
		$this->project = $project;
		$this->client = $client;
	 	$this->beforeFilter('csrf', array('on' => 'post'));
	}

	public function index($success_message = false)
	{
		$projects = $this->project->with('client')->orderBy('id', 'DESC')
							->get();
		$data = array(
			'title' 		=> 'Project', 
			'title_small' 	=> '', 
			'projects' 		=> $projects
		); 
	
	 	return View::make('projects.main', $data);
	}

	public function details($uid) 
	{
		$project_object = $this->project->where('id', '=', $uid)->get();
		$project_object_count = count($project_object);

		$data = array(
			'title' 				=> 	'Edit Project', 
			'title_small' 			=> 	'',
			'edit_form'				=>	true,
			'test_input'			=>	false,
			'errors'				=>	false,
			'project_object_update'	=>	false,
			'success'				=>	false,
			'success_attributes' 	=> 	false
		);

		if($project_object_count == 1) {
			$data['project_object'] = $project_object;
			$data['attributes'] = $project_object[0]['attributes'];
			$data['title'] = $data['attributes']['name'];
			$data['client'] = $this->client->find($data['attributes']['client_id']);
		}else {
			return Redirect::to('projects');
		}
	 	return View::make('projects.details', $data);

	}

	public function projectAdd()
	{
		$clients = $this->client->orderBy('firstname', 'ASC')->get();
		$client_data = array('' => '');
		foreach($clients as $client)
		{
			$client_data[$client['attributes']['id']] = $client['attributes']['firstname'] . " " . $client['attributes']['lastname'];
		}

		$reference_number = $this->project->max('reference') + 1;
		$data = array(
			'title' 				=> 	'Add Project', 
			'title_small' 			=> 	'',
			'errors'				=>	false,
			'project_object'		=>	false,
			'attributes'			=>	false,
			'success'				=>	false,
			'success_attributes' 	=> 	false,
			'max_reference_number'	=>	$reference_number,
			'clients'				=> 	$client_data,
			'edit_form'				=>	false,
		); 
	 	return View::make('projects.form', $data);
	}

	public function projectHandleAdd()
	{
		$clients = $this->client->orderBy('firstname', 'ASC')->get();
		$client_data = array('' => '');
		foreach($clients as $client)
		{
			$client_data[$client['attributes']['id']] = $client['attributes']['firstname'] . " " . $client['attributes']['lastname'];
		}
		$reference_number = $this->project->max('reference') + 1;
		$data = array(
			'title' 				=> 'Add Project', 
			'title_small' 			=> '',
			'edit_form'				=>	false,
			'project_object'		=>	false,
			'max_reference_number'	=>	$reference_number,
			'clients'				=> 	$client_data
		); 

		if (Input::all())
		{
			$s = $this->project->fill(Input::all());
			
			if($s->save()) 
			{
				$reference_number = $this->project->max('reference') + 1;
				$data['success'] = $s;
				$data['success_attributes'] = $s['attributes'];
				$data['errors']	= false;
				$data['attributes']	= false;
				//Recheck the maximum reference number after saving
				$data['max_reference_number'] = $reference_number;
				return View::make('projects.form', $data);
			}
			
			$data['success_message'] = false;
			$data['success'] = false;
			$data['errors'] = $s;
			$data['attributes'] = $s['attributes'];

		}
		
		return View::make('projects.form', $data);
	}

	public function projectEdit($uid)
	{
		$project_object = $this->project->where('id', '=', $uid)->get();
		$project_object_count = count($project_object);
		$clients = $this->client->orderBy('firstname', 'ASC')->get();
		$client_data = array('' => '');
		foreach($clients as $client)
		{
			$client_data[$client['attributes']['id']] = $client['attributes']['firstname'] . " " . $client['attributes']['lastname'];
		}

		$data = array(
			'title' 				=> 	'Edit Project', 
			'title_small' 			=> 	'',
			'edit_form'				=>	true,
			'test_input'			=>	false,
			'errors'				=>	false,
			'project_object_update'	=>	false,
			'success'				=>	false,
			'success_attributes' 	=> 	false,
			'clients'				=> 	$client_data
		);

		if($project_object_count == 1) {
			$data['project_object'] = $project_object;
			$data['attributes'] = $project_object[0]['attributes'];
		}else {
			return Redirect::to('projects');
		}

		if(Input::all()) 
		{
			$data['attributes']['id'] = $uid;
			
			$project = $this->project->find($uid);
			$project->fill(Input::all());
			
			//If no errors detected
			if($project->save())
			{
				$message = 'Project has been saved!';
				Session::flash('update_message', $message);
				return Redirect::to('projects');
			}
			
			$data['errors'] = $project->errors;
		}

		return View::make('projects.form', $data);
	}

	public function projectDelete($uid) 
	{
		$deleted_project = $this->project->find($uid);
		//Check if project exists
		if($deleted_project)
		{
			$delete_action = $this->project->find($uid)->delete();
		}
		if(!$deleted_project)
			return Redirect::to('projects');
		$message = 'You successfuly deleted the project record!';
		Session::flash('delete_message', $message);
		return Redirect::to('projects');
	}

}
