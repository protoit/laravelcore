<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Preview extends MY_Controller {
               
	function __construct()
	{
		parent::__construct();
		
	}
	
	function announce($id = '')
	{
		
		$this->db->where('id', $id);
		
		$announce_reports = $this->db->get('announce_reports');
				
		foreach ($announce_reports->result() as $row)
		{
			
		}
		
		$this->load->library('fpdf');
							
		$this->load->library('fpdi');
		
		// initiate FPDI   
		$this->pdf = new FPDI();
		// add a page
		$this->pdf->AddPage();
		// set the sourcefile
		$this->pdf->setSourceFile('files/template/announce_reports_template.pdf');
		
		// select the first page
		$tplIdx = $this->pdf->importPage(1);
		
		// use the page we imported
		$this->pdf->useTemplate($tplIdx);
		
		// set font, font style, font size.
		$this->pdf->SetFont('Arial', '', 8);
		
		// set initial placement
		$this->pdf->SetXY(40, 22.5);
		
		//$this->pdf->SetX(60);
		
		// line break
		$this->pdf->Ln(45);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, $row->company_name);
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, $row->company_address);
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, $row->company_zipcode.', '.$row->company_city);
        
        $this->pdf->Ln(4);
        $this->pdf->SetX(20);
        $this->pdf->Write(0, "Org.nr"." ".$row->organization_id);
		
		
		
		$this->pdf->Ln(12);
		$this->pdf->SetX(60);
		$this->pdf->Write(0, $this->_decrypt($row->announce_ident));
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(60);
		$this->pdf->Write(0, $this->_decrypt($row->announce_birth));
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(40);
		//$this->pdf->Write(0, utf8_decode($row->announce_description));
		$this->pdf->MultiCell(90, 3, utf8_decode($row->announce_description));
		
		
		$this->pdf->SetXY(157, 85);
        
		//Modified by Nik 12072013
		$this->pdf->Write(0, date("d/m/Y H:i", strtotime($row->datetime)));
		
		$this->pdf->Ln(6.5);
		$this->pdf->SetX(157);
		$this->pdf->Write(0, $row->id);
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(157);
		$this->pdf->Write(0, $row->shiftjournal_id);
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(157);
		$this->pdf->Write(0, utf8_decode($row->object));
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(157);
		$this->pdf->Write(0, $row->tjenestenr);
		
		
		
		$this->pdf->SetXY(42, 111);
		$this->pdf->Write(0, $this->_decrypt($row->announce_name));
		
		$this->pdf->Ln(6.5);
		$this->pdf->SetX(45);
		$this->pdf->Write(0, $this->_decrypt($row->announce_address));
		
		$this->pdf->Ln(6.5);
		$this->pdf->SetX(45);
		$this->pdf->Write(0, $this->_decrypt($row->announce_zipcode));
		
		$this->pdf->Ln(6.5);
		$this->pdf->SetX(45);
		$this->pdf->Write(0, $this->_decrypt($row->announce_city));
		
		
		$this->pdf->SetXY(157, 111);
		$this->pdf->Write(0, $this->_decrypt($row->parent_name));
		
		$this->pdf->Ln(6.5);
		$this->pdf->SetX(157);
		$this->pdf->Write(0, $this->_decrypt($row->parent_address));
		
		$this->pdf->Ln(6.5);
		$this->pdf->SetX(157);
		$this->pdf->Write(0, $this->_decrypt($row->parent_zipcode));
		
		$this->pdf->Ln(6.5);
		$this->pdf->SetX(157);
		$this->pdf->Write(0, $this->_decrypt($row->parent_city));
		
		$this->pdf->Ln(6.5);
		$this->pdf->SetX(157);
		$this->pdf->Write(0, $this->_decrypt($row->parent_city));
		
		
		
		$this->pdf->SetXY(68, 198);
		$this->pdf->Write(0, utf8_decode($row->action_where));
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(68);
		$this->pdf->Write(0, $row->action_datetime);
		
		$this->pdf->Ln(5);
		$this->pdf->SetX(40);
		$this->pdf->Write(0, $row->type);
		
		$this->pdf->SetX(77);
		$this->pdf->Write(0, $row->type_other);
		
		
		
		$this->pdf->SetXY(111, 200);
		$this->pdf->Write(0, utf8_decode($row->announce_item_status));
		
		//$this->pdf->Ln(5);
		$this->pdf->SetX(150);
		$this->pdf->Write(0, $row->announce_item_action);
		
		$this->pdf->Ln(6.5);
		$this->pdf->SetX(111);
		$this->pdf->Write(0, $row->announce_item_status_other);
		
		$this->pdf->SetX(150);
		$this->pdf->Write(0, $row->announce_item_action_other);
		
		
		
		
		
		$this->pdf->SetXY(20, 217);
		//$this->pdf->Write(0, utf8_decode($row->short_description));
		$this->pdf->MultiCell(150, 3, utf8_decode($row->short_description));
		
		
		//Modified by Nik 12072013
		$this->pdf->Ln(4);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, date('d/m/Y h:i'));
		
		$this->pdf->Ln(20);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, date('d/m/Y h:i'));
		
		$this->pdf->Ln(27);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, date('d/m/Y h:i'));
		
		
		header('Cache-Control: maxage=3600'); //Adjust maxage appropriately
		
		header('Pragma: public');
	
		// If the parameter is D = download F = save as file
		
		$this->pdf->Output('files/output/1.pdf', 'I'); 
		
		
		exit;
	}
	
	function service($id = '')
	{
		
		$this->db->where('id', $id);
		$announce_reports = $this->db->get('service_reports');
				
		foreach ($announce_reports->result() as $row)
		{
		}
		
		$this->load->library('fpdf');
							
		$this->load->library('fpdi');
		
		// initiate FPDI   
		$this->pdf = new FPDI();
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
		
		//$this->pdf->SetX(60);
		
		
		// line break
		$this->pdf->Ln(44);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, utf8_decode($row->company_name));
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, utf8_decode($row->company_address));
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, $row->company_zipcode.', '.$row->company_city);
		


		$this->pdf->SetXY(170, 65);
		$this->pdf->Write(0,  date('d/m/Y', strtotime($row->datetime)));
		
		$this->pdf->Ln(4.5);
		$this->pdf->SetX(170);
		$this->pdf->Write(0, date('H:i', strtotime($row->start)));
		
		$this->pdf->Ln(4.5);
		$this->pdf->SetX(170);
		$this->pdf->Write(0, date('H:i', strtotime($row->end)));
		
		$this->pdf->Ln(7.5);
		$this->pdf->SetX(170);
		$this->pdf->Write(0, $row->id);
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(170);
		$this->pdf->Write(0, $row->shiftjournal_id);
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(170);
		$this->pdf->Write(0, utf8_decode($row->object));
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(170);
		$this->pdf->Write(0, $row->tjenestenr);
		
		
		$this->pdf->SetFont('Arial', '', 16);
		
		$this->pdf->SetXY(20, 115);
		$this->pdf->Write(0, utf8_decode($row->title));
		
		
		$this->pdf->SetFont('Arial', '', 8);
		$this->pdf->Ln(4);
		$this->pdf->SetX(20);
		$this->pdf->MultiCell(175, 5, utf8_decode($row->description));
		
		
		//$this->pdf->Ln(75);
		$this->pdf->Ln(10);
		$this->pdf->SetX(20);
		//$this->pdf->SetXY(20, 210);
		$this->pdf->SetFont('Arial', '', 16);
		
		$this->db->where('service_reports_id', $id);
		
		$history = $this->db->get('service_reports_history');
		
		if ($history->num_rows() != 0)
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
			
			
			
			foreach ($history->result() as $row1)
			{
				$this->pdf->SetX(20);
				$this->pdf->Cell(175, 5, utf8_decode($row1->datetime));
				
				$this->pdf->SetX(55);
				$this->pdf->Cell(175, 5, utf8_decode($row1->tjenestenr));
				
				$this->pdf->SetX(85);
				$this->pdf->MultiCell(175, 5, utf8_decode($row1->description));
				
				$this->pdf->Ln(4);
				
			}
		}
		
		
		
		
		//$this->pdf->Ln(4);
		
		
		$this->pdf->SetXY(20, 260);
		$this->pdf->SetFont('Arial', '', 8);
		$this->pdf->SetX(20);
		
		if ($row->status == 'approved')
		{
			$user = User::find($row->approved_user_id);
			
			$this->pdf->Ln(12);
			$this->pdf->SetX(20);
			$this->pdf->Write(0, utf8_decode($user->firstname.' '.$user->lastname));
			
			$this->pdf->Ln(3);
			$this->pdf->SetX(20);
			$this->pdf->Write(0, utf8_decode($user->title));
			
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
		
		
		exit;
	}
	
	function lift($id = '')
	{
		
		$this->db->where('id', $id);
		$announce_reports = $this->db->get('lift_reports');
				
		foreach ($announce_reports->result() as $row)
		{
		}
		
		$this->load->library('fpdf');
							
		$this->load->library('fpdi');
		
		// initiate FPDI   
		$this->pdf = new FPDI();
		// add a page
		$this->pdf->AddPage();
		// set the sourcefile
		$this->pdf->setSourceFile('files/template/lift_reports_template.pdf');
		
		// select the first page
		$tplIdx = $this->pdf->importPage(1);
		
		// use the page we imported
		$this->pdf->useTemplate($tplIdx);
		
		// set font, font style, font size.
		$this->pdf->SetFont('Arial', '', 8);
		
		// set initial placement
		$this->pdf->SetXY(40, 22.5);
		
		//$this->pdf->SetX(60);
		
		
		// line break
		$this->pdf->Ln(44);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, utf8_decode($row->object_name));
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, utf8_decode($row->object_address));
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, $row->object_zip.', '.$row->object_city);
		
		

		$this->pdf->SetXY(177, 65);
		$this->pdf->Write(0,  date('d/m/Y', strtotime($row->datetime)));
		
		$this->pdf->Ln(4.5);
		$this->pdf->SetX(177);
		$this->pdf->Write(0, date('H:i', strtotime($row->warning_time)));
		
		$this->pdf->Ln(4.5);
		$this->pdf->SetX(177);
		$this->pdf->Write(0, date('H:i', strtotime($row->arrival_time)));
		
		$this->pdf->Ln(4.5);
		$this->pdf->SetX(177);
		$this->pdf->Write(0, date('H:i', strtotime($row->depart_time)));
		
		$this->pdf->Ln(6.5);
		$this->pdf->SetX(170);
		$this->pdf->Write(0, $row->id);
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(170);
		$this->pdf->Write(0, $row->shiftjournal_id);
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(160);
		$this->pdf->Write(0, utf8_decode($row->object_name));
		
		$this->pdf->Ln(4);
		$this->pdf->SetX(170);
		$this->pdf->Write(0, utf8_decode($row->tjenestenr));
		
		
		
		
		$this->pdf->SetXY(20, 128);
		$this->pdf->Write(0, utf8_decode($row->location_name));
		
		$this->pdf->Ln(12);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, utf8_decode($row->warning_method));
		
		$this->pdf->Ln(12);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, utf8_decode($row->arrival_status));
		
		$this->pdf->Ln(12);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, utf8_decode($row->depart_status));
		
		$this->pdf->Ln(12);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, utf8_decode($row->action_description));
		
		$this->pdf->Ln(12);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, utf8_decode($row->cause_description));
		
		$this->pdf->Ln(12);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, utf8_decode($row->other_comments));
		
		$person_lift = '';
		
		if($row->person_lift=="Yes") 
		{ 
			$person_lift = $this->lang->line('application_yes');
		} 
		elseif ($row->person_lift=="No") 
		{ 
			$person_lift = $this->lang->line('application_no');
		} 
		
		
		$this->pdf->Ln(9);
		$this->pdf->SetX(45);
		$this->pdf->Write(0, utf8_decode($person_lift));
		
		$this->pdf->Ln(9);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, utf8_decode($row->person_lift_qty));
		
		$contact_feedback = '';
		
		if($row->contact_feedback=="Yes") 
		{ 
			$contact_feedback = $this->lang->line('application_yes');
		} 
		elseif ($row->contact_feedback=="No") 
		{ 
			$contact_feedback = $this->lang->line('application_no');
		} 
		
		$this->pdf->Ln(9);
		$this->pdf->SetX(20);
		$this->pdf->Write(0, utf8_decode($contact_feedback));
			
		header('Cache-Control: maxage=3600'); //Adjust maxage appropriately
		header('Pragma: public');

		
	
		// If the parameter is D = download F = save as file
		$this->pdf->Output('files/output/1.pdf', 'I'); 
		
		
		exit;
	}
	
	function _encrypt($text=NULL){
		$config['encryption_key'] = "kh432k";	
		$this->load->library('encrypt',$config);
		return $this->encrypt->encode($text);
	}
	
	function _decrypt($text=NULL){
		$config['encryption_key'] = "kh432k";	
		$this->load->library('encrypt',$config);
		return $this->encrypt->decode($text);
	}

}