<?php

class AnounceReportController extends BaseController {
               
	protected $layout = 'template';
	
	protected $announce;
	protected $company;
   
    function __construct(AnnounceReport $announce, Company $company)
    {
       $this->announce 	= $announce;
	   $this->company 	= $company;
	
    }
            
	function index()
	{
		$data = array();
		
		// Titles should be from language files
		$data['title'] 			= Lang::get('menu.reports');
		$data['title_small'] 	= Lang::get('menu.reports_sub.service_reports');
		
		$data['rows'] = $this->announce->with('company', 'object')->get();
		
		return View::make('reports.announce.index', $data);
	}
	
	function announceAdd()
	{
		$data = array();
		
		// Titles should be from language files
		$data['title'] 			= Lang::get('menu.reports');
		$data['title_small'] 	= Lang::get('menu.reports_sub.service_reports');
		
		if (Input::get('op'))
		{
			$s = $this->announce->fill(Input::all());
			$s->tjenestenr = Auth::user()->tjenestenr;
			
			$save = $s->save();
			
			if($save) return Redirect::to('reports/announce');
			
			$data['errors'] = $s->errors;
		}
		
		$data['companies'] = $this->company->orderBy('name')->get();
		
		$this->company->dropdown(); // This will create a dropdown for companies
		$this->company->objectDropdown(); // This will create a dropdown for companies
		
		return View::make('reports.announce.add', $data);
	}
	
	function announceEdit($id)
	{
		$data = array();
		
		// Titles should be from language files
		$data['title'] 			= Lang::get('menu.reports');
		$data['title_small'] 	= Lang::get('menu.reports_sub.service_reports');

		if (Input::get('op'))
		{
			$a = $this->announce->find($id);
			
			$a->fill(Input::all());
			
			if($a->save()) return Redirect::to('reports/announce');
			
			$data['errors'] = $s->errors;
		}
		
		$data['row'] = $row = $this->announce->find($id);
		
		$this->company->dropdown($row->company_id); // This will create a dropdown for companies
		$this->company->objectDropdown($row->object_id); // This will create a dropdown for companies
		$this->company->conditionRadio($row->type);
		$this->company->statusRadio($row->announce_item_status);
		
		
		
		
		return View::make('reports.announce.edit', $data);
	}
	
	function sannounceDelete($id)
	{
		$this->service->find($id)->delete();
		return Redirect::to('reports/announce');
	}
	
	function announceView($id)
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
				
		return View::make('reports.announce.view', $data);
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