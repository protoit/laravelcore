<?php

class CompanyController extends BaseController {
               
   protected $layout = 'template';

   protected $company;

   protected $client;
	  
    function __construct(Company $company, Client $client)
    {
	   $this->company = $company;
	   $this->client = $client;
	}
            
	function lists()
	{
		$data = array();

		
		// Titles should be from language files
		$data['title'] 			= Lang::get('menu.reports');
		$data['title_small'] 	= Lang::get('menu.reports_sub.service_reports');
		
		$data['rows'] = $this->company->get();
				
		return View::make('company.lists', $data);
	}
	
	function add()
	{
		$data = array();
		
		// Titles should be from language files
		$data['title'] 			= Lang::get('menu.reports');
		$data['title_small'] 	= Lang::get('menu.reports_sub.service_reports');
		
		if (Input::get('op'))
		{
			$c = $this->company->fill(Input::all());
			
			if($c->save()) return Redirect::to('company/add');
			
			$data['errors'] = $c->errors;
		}
		
		$data['clients'] = $this->client->orderBy('firstname')->get();
		
		return View::make('company.add', $data);
	}
	
	function edit($id)
	{
		
		$data = array();
		
		// Titles should be from language files
		$data['title'] 			= Lang::get('menu.reports');
		$data['title_small'] 	= Lang::get('menu.reports_sub.service_reports');

		if (Input::get('op'))
		{
			$c = $this->company->find($id);
			
			$c->fill(Input::all());
			
			if($c->save()) return Redirect::to('company/lists');
			
			$data['errors'] = $c->errors;
		}
		
		$data['info'] = $info = $this->company->find($id);

				
		$rowsClients = $this->client->orderBy('firstname')->get();
		foreach($rowsClients as $client) {             
			$clients[$client->id] = ucwords($client->firstname.' '.$client->lastname);
		}
				
		$data['clients'] = $clients;

		return View::make('company.edit', $data);
	}
	
	function delete($id)
	{
		$this->company->find($id)->delete();
		
		return Redirect::to('company/lists');
	}
	
  
}        