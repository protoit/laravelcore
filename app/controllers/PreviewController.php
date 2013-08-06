<?php

class PreviewController extends BaseController {
               
   protected $layout = 'template';
   
   protected $service;
   
   protected $company;
   
   protected $pdf;
   
    function __construct(ServiceReport $service, Company $company)
    {
       $this->service = $service;
	   $this->company = $company;
	   $this->pdf = new \fpdi\FPDI();
    }
            
	function service($id)
	{
		$data = array();
		
		// Titles should be from language files
		$data['title'] 			= Lang::get('menu.reports');
		$data['title_small'] 	= Lang::get('menu.reports_sub.service_reports');
				
		$row = $this->service->with('company', 'report_history')->find($id);
		
		// add a page
		$this->pdf->AddPage();
		// set the sourcefile
		$this->pdf->setSourceFile('files/template/service_reports_template.pdf');
		
		// select the first page
		$tplIdx = $this->pdf->importPage(1);
		
		// use the page we imported
		$this->pdf->useTemplate($tplIdx);
		
		// set font, font style, font size.
		$this->pdf->SetFont('Arial', '', 8);
		
		// set initial placement
		$this->pdf->SetXY(40, 22.5);		
		
		// line break
		$this->pdf->Ln(44);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, $row->company->name);
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, $row->company->address);
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, $row->company->zipcode.', '.$row->company->city);
		


		$this->pdf->SetXY(170, 65);
		$this->pdf->Write(0, $row->date);
		
		$this->pdf->Ln(4.5);
		$this->pdf->SetX(170);
		$this->pdf->Write(0, $row->time_start);
		
		$this->pdf->Ln(4.5);
		$this->pdf->SetX(170);
		$this->pdf->Write(0, $row->time_end);
		
		$this->pdf->Ln(7.5);
		$this->pdf->SetX(170);
		$this->pdf->Write(0, $row->id);
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(170);
		$this->pdf->Write(0, $row->shiftjournal_id);
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(170);
		$this->pdf->Write(0, $row->object);
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(170);
		$this->pdf->Write(0, $row->tjenestenr);
		
		
		$this->pdf->SetFont('Arial', '', 16);
		
		$this->pdf->SetXY(20, 115);
		$this->pdf->Write(0, $row->title);
		
		
		$this->pdf->SetFont('Arial', '', 8);
		$this->pdf->Ln(4);
		$this->pdf->SetX(20);
		$this->pdf->MultiCell(175, 5, $row->description);
		
		
		//$this->pdf->Ln(75);
		$this->pdf->Ln(10);
		$this->pdf->SetX(20);
		//$this->pdf->SetXY(20, 210);
		$this->pdf->SetFont('Arial', '', 16);
				
		$history = $row->report_history;
		
		if ($history != null)
		{
			$this->pdf->Write(0, 'Sakshistorikk');
		
	
			//$this->pdf->SetXY(20, 210);
			$this->pdf->Ln(10);
			$this->pdf->SetX(20);
			
			//$this->pdf->Ln(10);
			$this->pdf->SetFont('Arial', '', 8);
			
			$this->pdf->Cell(175, 5,'Dato');
				
			$this->pdf->SetX(55);
			$this->pdf->Cell(175, 5, 'Tjenestenr');
			
			$this->pdf->SetX(85);
			$this->pdf->MultiCell(175, 5, 'Description');
			
			
			foreach ($history as $row1)
			{
				$this->pdf->SetX(20);
				$this->pdf->Cell(175, 5, $row1->datetime);
				
				$this->pdf->SetX(55);
				$this->pdf->Cell(175, 5, $row1->tjenestenr);
				
				$this->pdf->SetX(85);
				$this->pdf->MultiCell(175, 5, utf8_decode($row1->description));
				
				$this->pdf->Ln(4);
				
			}
		}
		
		$this->pdf->SetXY(20, 260);
		$this->pdf->SetFont('Arial', '', 8);
		$this->pdf->SetX(20);
		
		if ($row->status == 'approved')
		{
			$user = User::find($row->approved_user_id);
			
			$this->pdf->Ln(12);
			$this->pdf->SetX(20);
			$this->pdf->Write(0, $user->firstname.' '.$user->lastname);
			
			$this->pdf->Ln(3);
			$this->pdf->SetX(20);
			$this->pdf->Write(0, $user->title);
			
			if ($user->signature != NULL)
			{
				$this->pdf->image('files/output/signature/'.$user->signature,20,250); //x, y, w, h	
			}
			
			
			$this->pdf->image('files/media/logostamp.png',55,253);
			
		}
		
		header('Cache-Control: maxage=3600'); //Adjust maxage appropriately
		header('Pragma: public');
	
		// If the parameter is D = download F = save as file
		$this->pdf->Output('files/output/1.pdf', 'I'); 
		
	}
}        