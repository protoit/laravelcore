<?php

class ServiceReportController extends BaseController {
               
	protected $layout = 'template';
	
	protected $service;
	
	protected $user;
	
	protected $company;
	
	protected $attachment;
	
	protected $history;
   
    function __construct(
				ServiceReport $service, 
				User $user, 
				Company $company, 
				ServiceReportAttachment $attachment,
				ServiceReportHistory $history
				)
    {
       $this->service 		= $service;
	   $this->user 			= $user;
	   $this->company 		= $company;
	   $this->attachment 	= $attachment;
	   $this->history 		= $history;
    }
            
	function index()
	{
		$data = array();
		
		// Titles should be from language files
		$data['title'] 			= Lang::get('menu.reports');
		$data['title_small'] 	= Lang::get('menu.reports_sub.service_reports');
		
		$data['rows'] = $this->service->with('company', 'object')->get();
		
		return View::make('reports.service.index', $data);
	}
	
	function serviceAdd()
	{
		$data = array();
		
		// Titles should be from language files
		$data['title'] 			= Lang::get('menu.reports');
		$data['title_small'] 	= Lang::get('menu.reports_sub.service_reports');
		
		if (Input::get('op'))
		{
			$s = $this->service->fill(Input::all());
			$s->employee_id = Auth::user()->tjenestenr;
			
			$save = $s->save();
			
			$count = count(Input::file('files'));
			
			$content = Input::file('files');
			
			if ($content[0] != null)
			{
				for ($i=0; $i < $count; $i++)
				{
					$file = Input::file("files[{$i}]");
					
					$destinationPath 	= 'uploads/attachments/'.str_random(8);
					
					$filename 			= $file->getClientOriginalName();
					
					$filename = str_replace(' ', '', $filename);
					
					$upload_success 	= $file->move($destinationPath, $filename);
					
					$attachment_url = $destinationPath.'/'.$filename;
					
					$a = $this->attachment->fill(array('service_id' => $s->id, 'attachment_url' => $attachment_url));
					$a->save();
						
				}
				
			}
			
			if($save) return Redirect::to('reports/service');
			
			$data['errors'] = $s->errors;
		}
		
		$data['companies'] = $this->company->orderBy('name')->get();
		
		$this->company->dropdown(); // This will create a dropdown for companies
		$this->company->objectDropdown(); // This will create a dropdown for companies
		
		return View::make('reports.service.add', $data);
	}
	
	function serviceEdit($id)
	{
		$data = array();
		
		// Titles should be from language files
		$data['title'] 			= Lang::get('menu.reports');
		$data['title_small'] 	= Lang::get('menu.reports_sub.service_reports');

		if (Input::get('op'))
		{
			$s = $this->service->find($id);
			
			$s->fill(Input::all());
			
			if($s->save()) return Redirect::to('reports/service');
			
			$data['errors'] = $s->errors;
		}
		$data['row'] = $row = $this->service->find($id);
		
		$this->company->dropdown($row->company_id); // This will create a dropdown for companies
		$this->company->objectDropdown($row->object_id); // This will create a dropdown for companies
		
		return View::make('reports.service.edit', $data);
	}
	
	function serviceDelete($id)
	{
		$this->service->find($id)->delete();
		return Redirect::to('reports/service');
	}
	
	function serviceView($id)
	{
		$data = array();
		
		// Titles should be from language files
		$data['title'] 			= Lang::get('menu.reports');
		$data['title_small'] 	= Lang::get('menu.reports_sub.service_reports');
		
		$data['row'] = $this->service->with(
								'company', 
								'report_history', 
								'user', 
								'attachment')
								->find($id);
		
		$data['history'] = $data['row']->report_history;
		
		$data['attachments'] = $data['row']->attachment;
				
		return View::make('reports.service.view', $data);
	}
	
	function approveReport($id)
	{
		$user = $this->user->find(Auth::user()->id);
		
		$service = $this->service->find($id);
		$service->approved_user_id = Auth::user()->id;
		$service->status = 'approved';
		$service->save();
		
		return Redirect::to('reports/service');
	}
    
    function notApproveReport($id)
	{
        $service = $this->service->find($id);
        $service->status = 'not_approve';
        $service->save();    
        return Redirect::to('reports/service');
    }
	
	function downloadAttachment($id)
	{
       $attachment = $this->attachment->find($id);
	   
	   return Response::download($attachment->attachment_url);
    }
	
	function deleteAttachment($id, $report_id)
	{
	   $attachment = $this->attachment->find($id);
	   
	   File::delete($attachment->attachment_url);
	   
	   $attachment->delete();
	   
	   return Redirect::to('reports/service/view/'.$report_id);
    }
	
	function updateHistory()
	{
		$history = $this->history->find(Input::get('id'));
		
		if ($history)
		{
		   	$history->fill(Input::all());
			$history->save();
		}
		else
		{
			$this->history->create(Input::all());
		}
		
		return 0;
	}
	
	function historyInfo()
	{
		return Response::json($this->history->find(Input::get('id'))->toArray());
	}
	
	function deleteHistory($history_id, $report_id)
	{
		$this->history->find($history_id)->delete();
		return Redirect::to('reports/service/view/'.$report_id);
	}
	
}        