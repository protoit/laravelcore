<?php

class ReportController extends BaseController {
               
   protected $layout = 'template';
   
   protected $service;
   
   protected $company;
   
    function __construct(ServiceReport $service, Company $company)
    {
       $this->service = $service;
	   $this->company = $company;
    }
            
	function service()
	{
		$data = array();
		
		// Titles should be from language files
		$data['title'] 			= Lang::get('menu.reports');
		$data['title_small'] 	= Lang::get('menu.reports_sub.service_reports');
		
		$data['rows'] = $this->service->with('company')->get();
		
		return View::make('reports.service', $data);
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
			
			if($s->save()) return Redirect::to('reports/service');
			
			$data['errors'] = $s->errors;
		}
		
		$data['companies'] = $this->company->orderBy('name')->get();
		
		return View::make('reports.service-add', $data);
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
		
		return View::make('reports.service-edit', $data);
	}
	
	function serviceDelete($id)
	{
		$this->service->find($id)->delete();
		return Redirect::to('reports/service');
	}
	
    
	function edit_report($condition = NULL){
		
		$id = $this->uri->segment(4);
				
		if($condition!==NULL){
			if($condition=="service"){	
				if($_POST){
					$service = Service::find($id);
					
					$service->status = $_POST['service-status'];
					$service->shiftjournal_id = $_POST['service-shiftjournalid'];	
					//$service->datetime = date("d/m/Y H:i", strtotime($_POST['service-date']));
					
					$service->datetime = date('m/d/Y H:i',strtotime(str_replace("/","-",$_POST['service-date'])));
					$service->start = $_POST['service-datetime-start'];
					$service->end = $_POST['service-datetime-end'];
					$service->company_name = $_POST['service-name'];
					$service->company_address = $_POST['service-address'];
					$service->company_zipcode = $_POST['service-zipcode'];
					$service->company_city = $_POST['service-city'];
					$service->object = $_POST['service-object'];
                    if(@$this->user->admin){
					$service->tjenestenr = $_POST['service-tjenestenr'];
                    };
					$service->title = $_POST['service-title'];
					$service->description = $_POST['service-description'];
										
					$service->save();

					foreach($_FILES as $key=>$value){
						$this->_do_upload($key,$id);
					}
					
					redirect('reports/view_report/service/'.$id);
					
				}
				else
				{
					$this->view_data['service'] = Service::find('all',array('conditions' => array('id = ?',$id)));				
					if($this->view_data['service']){
						$this->view_data['companies_not_inactive'] = Companies::find('all',array('group' => 'name' , 'conditions' => array('inactive = ?',0)));
						$this->config->load('defaults');
						$this->content_view = 'reports/servicereports/service_report_edit';
					}
					else
						redirect('reports');
				}
			}
			else
			if($condition=="announce"){
				if($_POST){
					$announce = Announce::find($this->uri->segment(4));	
					$announce->shiftjournal_id = $_POST['announce-shiftjournalid'];
					$announce->datetime = date('m/d/Y H:i',strtotime(str_replace("/","-",$_POST['announce-datetime'])));
                    if(@$this->user->admin){
					$announce->tjenestenr = $_POST['announce-tjenestenr'];
                    };
					$announce->company_name = $_POST['company-name'];
					$announce->organization_id = $_POST['organization-id'];
					$announce->company_address = $_POST['company-address'];
					$announce->company_zipcode = $_POST['company-zipcode'];
					$announce->company_city = $_POST['company-city'];
					$announce->object = $_POST['object'];
					$announce->announce_name = $this->_encrypt($_POST['announce-name']);
					$announce->announce_birth = $this->_encrypt($_POST['announce-birth']);
					$announce->announce_ident = $this->_encrypt($_POST['announce-ident']);
					$announce->announce_address = $this->_encrypt($_POST['announce-address']);
					$announce->announce_zipcode = $this->_encrypt($_POST['announce-zipcode']);
					$announce->announce_city = $this->_encrypt($_POST['announce-city']);
					$announce->announce_phone = $this->_encrypt($_POST['announce-phone']);
					$announce->announce_description = $_POST['announce-description'];
					$announce->parent_name = $this->_encrypt($_POST['parent-name']);
					$announce->parent_address = $this->_encrypt($_POST['parent-address']);
					$announce->parent_zipcode = $this->_encrypt($_POST['parent-zipcode']);
					$announce->parent_city = $this->_encrypt($_POST['parent-city']);
					$announce->parent_phone = $this->_encrypt($_POST['parent-phone']);
					$announce->action_where = $_POST['announce-action-where'];
					$announce->action_datetime = date('m/d/Y',strtotime(str_replace("/","-",$_POST['announce-action-datetime'])));
					$announce->type = $_POST['announce-type'];
					$announce->type_other = $_POST['announce-type-other-text'];
					$announce->announce_item = $_POST['announce-item'];
					$announce->announce_item_value = $_POST['announce-item-value'];
					$announce->announce_item_sum = $_POST['announce-item-sum'];
					$announce->announce_item_status = $_POST['announce-status'];
					$announce->announce_item_status_other = $_POST['announce-status-other-text'];
					$announce->announce_item_action = $_POST['announce-action'];
					$announce->announce_item_action_other = $_POST['announce-action-other-text'];
					$announce->witness_name = $this->_encrypt($_POST['witness-name']);
					$announce->witness_address = $this->_encrypt($_POST['witness-address']);
					$announce->witness_zipcode = $this->_encrypt($_POST['witness-zipcode']);
					$announce->witness_city = $this->_encrypt($_POST['witness-city']);
					$announce->witness_phone = $this->_encrypt($_POST['witness-phone']);
					$announce->short_description = $_POST['short-description'];

					$announce->save();
					
					redirect('reports/view_report/announce/'.$id);
				}
				else
				{
					$this->view_data['announce_reports'] = Announce::find('all',array('conditions' => array('id = ?',$id)));
					$this->view_data['companies_not_inactive'] = Companies::find('all',array('group' => 'name' , 'conditions' => array('inactive = ?',0)));
					if($this->view_data['announce_reports']){
						
						$this->view_data['announce_reports'][0]->announce_name = $this->_decrypt($this->view_data['announce_reports'][0]->announce_name);
						$this->view_data['announce_reports'][0]->announce_birth = $this->_decrypt($this->view_data['announce_reports'][0]->announce_birth);
						$this->view_data['announce_reports'][0]->announce_ident = $this->_decrypt($this->view_data['announce_reports'][0]->announce_ident);
						$this->view_data['announce_reports'][0]->announce_address = $this->_decrypt($this->view_data['announce_reports'][0]->announce_address);
						$this->view_data['announce_reports'][0]->announce_zipcode = $this->_decrypt($this->view_data['announce_reports'][0]->announce_zipcode);
						$this->view_data['announce_reports'][0]->announce_city = $this->_decrypt($this->view_data['announce_reports'][0]->announce_city);
						$this->view_data['announce_reports'][0]->announce_phone = $this->_decrypt($this->view_data['announce_reports'][0]->announce_phone);
						$this->view_data['announce_reports'][0]->parent_name = $this->_decrypt($this->view_data['announce_reports'][0]->parent_name );
						$this->view_data['announce_reports'][0]->parent_address = $this->_decrypt($this->view_data['announce_reports'][0]->parent_address);
						$this->view_data['announce_reports'][0]->parent_zipcode = $this->_decrypt($this->view_data['announce_reports'][0]->parent_zipcode);
						$this->view_data['announce_reports'][0]->parent_city = $this->_decrypt($this->view_data['announce_reports'][0]->parent_city);
						$this->view_data['announce_reports'][0]->parent_phone = $this->_decrypt($this->view_data['announce_reports'][0]->parent_phone);
						$this->view_data['announce_reports'][0]->witness_name = $this->_decrypt($this->view_data['announce_reports'][0]->witness_name);
						$this->view_data['announce_reports'][0]->witness_address = $this->_decrypt($this->view_data['announce_reports'][0]->witness_address);
						$this->view_data['announce_reports'][0]->witness_zipcode = $this->_decrypt($this->view_data['announce_reports'][0]->witness_zipcode);
						$this->view_data['announce_reports'][0]->witness_city = $this->_decrypt($this->view_data['announce_reports'][0]->witness_city);
						$this->view_data['announce_reports'][0]->witness_phone = $this->_decrypt($this->view_data['announce_reports'][0]->witness_phone);
						
						
						$this->config->load('defaults');
						$this->content_view = 'reports/announcereports/announce_report_edit';
					}
					else
						redirect('reports');
				}
			}
			else
			if($condition=="lift"){
				if($_POST){
					$lift = Lift::find($this->uri->segment(4));	
					$lift->object_name = $_POST['object-name'];
					$lift->object_address = $_POST['object-address'];
					$lift->object_zip = $_POST['object-zip'];
					$lift->object_city = $_POST['object-city'];
					$lift->shiftjournal_id = $_POST['shiftjournalid'];
                    if(@$this->user->admin){
                    $lift->datetime = date('m/d/Y H:i',strtotime(str_replace("/","-",$_POST['date'])));
                    $lift->tjenestenr = $_POST['tjenestenr'];
                    };
					$lift->location_name = $_POST['location_name'];
					$lift->floor = $_POST['floor'];
					$lift->warning_time = $_POST['warning-time'];
					$lift->warning_method = $_POST['warning-method'];
					$lift->arrival_time = $_POST['arrival-time'];
					$lift->arrival_status = $_POST['arrival-status'];
					$lift->depart_time = $_POST['depart-time'];
					$lift->depart_status = $_POST['depart-status'];
					$lift->action_description = $_POST['action-description'];
					$lift->cause_description = $_POST['cause-description'];
					$lift->other_comments = $_POST['other-comments'];
					$lift->person_lift = $_POST['person-lift'];
					$lift->person_lift_qty = $_POST['person-lift-qty'];
					$lift->contact_feedback = $_POST['contact-feedback'];
					$lift->save();		
					
					redirect('reports/view_report/lift/'.$id);
				}
				
				$this->view_data['liftreport'] = Lift::find('all',array('conditions' => array('id = ?',$id)));
				if($this->view_data['liftreport']){
					$this->view_data['companies_gronlandstunet'] = Companies::find('all',array('group' => 'name' , 'conditions' => array('inactive = ? AND catname = ?',0,'Sameiet Grønlandstunet')));
					$this->view_data['companies_location'] = Companies_has_location::find('all',array('group' => 'location_name' , 'conditions' => array('object = ?','Grønlandstunet')));
					$this->config->load('defaults');
					$this->content_view = 'reports/liftreports/lift_report_edit';
				}
				else
					redirect('reports');
			}	
		}
		else
		redirect('reports');
		
	}
	
	function filter($type = NULL){
		
		$this->config->load('defaults');
		
		//var_dump($this->user->admin);
		//exit;
		if($this->client){
			$this->view_data['id'] = $this->client;
			$this->view_data['company_by_id'] = $this->get_company_by_id($this->client->company_id);
		}else if($this->user){
			$this->view_data['company_by_id'] = "";
			$this->view_data['id'] = $this->user;
        }
		
		$object_id = $this->uri->segment(4);
		$object = Objectcat::find('all',array('conditions' => array('id = ?',$object_id)));	
		if($object){ 
			if($type!==NULL){
				if($type=="service"){
					$this->view_data['service_reports'] = Service::find('all',array('conditions' => array('object = ?',$object[0]->catname_has_items)));	
					$this->config->load('defaults');
					$this->content_view = 'reports/servicereports/service_filter';			
				}
				else
				if($type=="announce"){
					$this->view_data['announce_reports'] = Announce::find('all',array('conditions' => array('object = ?',$object[0]->catname_has_items)));	
					$this->config->load('defaults');
					$this->content_view = 'reports/announcereports/announce_filter';		
				}
				else
				if($type=="lift"){
					$this->view_data['lift_reports'] = Lift::find('all',array('conditions' => array('object_name = ?',$object[0]->catname_has_items)));	
					$this->config->load('defaults');
					$this->content_view = 'reports/liftreports/lift_filter';	
				}
			}
			else
				redirect('reports');
		}
		else
			redirect('reports');
		
	}
	
	
	function view_report($condition = NULL){
		
		
		$id = $this->uri->segment(4);
		if($this->client){
			$this->view_data['id'] = $this->client;
		}else if($this->user){
			$this->view_data['id'] = $this->user;
        }
		if($condition!==NULL){
			if($condition=="service"){	
				$this->view_data['service_reports'] = Service::find('all',array('conditions' => array('id = ?',$id)));				
				if($this->view_data['service_reports']){
					$this->view_data['history_reports'] = HistoryReport::find('all',array('conditions' => array('service_reports_id = ?',$this->view_data['service_reports'][0]->id)));
					$this->view_data['files'] = ServiceAttachment::find('all',array('conditions' => array('service_id = ?',$this->view_data['service_reports'][0]->id)));
					$this->config->load('defaults');
					$this->content_view = 'reports/servicereports/service_report_view';
				}
				else
					redirect('reports');

			}
			else
			if($condition=="announce"){
				$this->view_data['announce_reports'] = Announce::find('all',array('conditions' => array('id = ?',$id)));
				if($this->view_data['announce_reports']){
					
					$this->view_data['announce_reports'][0]->announce_name = $this->_decrypt($this->view_data['announce_reports'][0]->announce_name);
					$this->view_data['announce_reports'][0]->announce_birth = $this->_decrypt($this->view_data['announce_reports'][0]->announce_birth);
					$this->view_data['announce_reports'][0]->announce_ident = $this->_decrypt($this->view_data['announce_reports'][0]->announce_ident);
					$this->view_data['announce_reports'][0]->announce_address = $this->_decrypt($this->view_data['announce_reports'][0]->announce_address);
					$this->view_data['announce_reports'][0]->announce_zipcode = $this->_decrypt($this->view_data['announce_reports'][0]->announce_zipcode);
					$this->view_data['announce_reports'][0]->announce_city = $this->_decrypt($this->view_data['announce_reports'][0]->announce_city);
					$this->view_data['announce_reports'][0]->announce_phone = $this->_decrypt($this->view_data['announce_reports'][0]->announce_phone);
					$this->view_data['announce_reports'][0]->parent_name = $this->_decrypt($this->view_data['announce_reports'][0]->parent_name );
					$this->view_data['announce_reports'][0]->parent_address = $this->_decrypt($this->view_data['announce_reports'][0]->parent_address);
					$this->view_data['announce_reports'][0]->parent_zipcode = $this->_decrypt($this->view_data['announce_reports'][0]->parent_zipcode);
					$this->view_data['announce_reports'][0]->parent_city = $this->_decrypt($this->view_data['announce_reports'][0]->parent_city);
					$this->view_data['announce_reports'][0]->parent_phone = $this->_decrypt($this->view_data['announce_reports'][0]->parent_phone);
					$this->view_data['announce_reports'][0]->witness_name = $this->_decrypt($this->view_data['announce_reports'][0]->witness_name);
					$this->view_data['announce_reports'][0]->witness_address = $this->_decrypt($this->view_data['announce_reports'][0]->witness_address);
					$this->view_data['announce_reports'][0]->witness_zipcode = $this->_decrypt($this->view_data['announce_reports'][0]->witness_zipcode);
					$this->view_data['announce_reports'][0]->witness_city = $this->_decrypt($this->view_data['announce_reports'][0]->witness_city);
					$this->view_data['announce_reports'][0]->witness_phone = $this->_decrypt($this->view_data['announce_reports'][0]->witness_phone);
					
					$this->config->load('defaults');
        			$this->content_view = 'reports/announcereports/announce_report_view';
				}
				else
					redirect('reports');
			}
			else
			if($condition=="lift"){				
				$this->view_data['liftreport'] = Lift::find('all',array('conditions' => array('id = ?',$id)));
				if($this->view_data['liftreport']){
					$this->config->load('defaults');
					$this->content_view = 'reports/liftreports/lift_report_view';
				}
				else
					redirect('reports');
			}	
		}
		else
		redirect('reports');
		
	}
	
	function approve_report($id){

		$user = User::find($this->session->userdata('user_id'));
		
		$service = Service::find($id);
		$service->approvedby = $user->firstname.' '.$user->lastname;
		$service->approved_user_id = $this->session->userdata('user_id');
		$service->status = "approved";
		$service->save();	
		redirect('reports/view_report/service/'.$id);
	}
    
    function not_approve_report($id){

        $service = Service::find($id);
        $service->approvedby = "";
        $service->status = 3;
        $service->save();    
        redirect('reports/view_report/service/'.$id);
    }
	
	function delete_report($condition = NULL){
		$id = $this->uri->segment(4);
		if($condition!==NULL){	
			if($condition=="service"){	
				if($id!=FALSE){
					$service = Service::find($id);
					$service->status = "deleted";
					$service->save();			
				}
				redirect('reports');
			}
			else
			if($condition=="announce"){	
				if($id!=FALSE){
					$announce = Announce::find($id);
					$announce->delete();
				}
				redirect('reports');			
			}
			else
			if($condition=="lift"){	
				if($id!=FALSE){
					$lift = Lift::find($id);
					$lift->delete();
				}
				redirect('reports');	
			}
			else
				redirect('reports');
		}
		else
				redirect('reports');
	}
	
function delete_history_report($id = NULL){
		if($id!==NULL){
			$history =  HistoryReport::find($id);
			$service_id = $history->service_reports_id;
			$history->delete();
			
			redirect('reports/view_report/service/'.$service_id);
		}
	}	
	
	function edit_history_report($id = NULL){
		if($id!==NULL){
			if($_POST){
					$history = HistoryReport::find($id);
					$history->datetime = date('m/d/Y H:i',strtotime(str_replace("/","-",$_POST['history-date'])));
                    if(@$this->user->admin){
					$history->tjenestenr = $_POST['history-tjenestenr'];
                    };
					$history->description = $_POST['history-description'];
					$history->save();
					
					redirect('reports/view_report/service/'.$history->service_reports_id);
				}
				else
				{
					$history = HistoryReport::find($id);
					if($history){
					?>
                    
                    <div id="response_modal" class="modal hide fade in" style="display: block;" aria-hidden="false">
                                <div class="modal-header">
                                <h3>Ny logg</h3>
                                </div>
                                <div class="modal-body">
                                <form method="post" action="<?php echo base_url();?>reports/edit_history_report/<?php echo $history->id;?>">
                                <div class="modal-inner">
                                <p>
                                <label>Date &amp; Time</label>
                                <input type="text" name="history-date" id="history-date" value="<?php echo date('d/m/Y H:i', strtotime($history->datetime));?>" />
                                </p>
                                <p>
                                <label>Tjenestenr</label>
                                <input type="text" name="history-tjenestenr" id="history-tjenestenr" value="<?php echo $history->tjenestenr;?>" />
                                </p>
                                <p>
                                <label>Description</label>
                                <textarea name="history-description" id="history-description"><?php echo $history->description;?></textarea>
                                </p>
                                
                                </div>
                                <div class="modal-footer">
                                <input type="submit" name="submit" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
                                <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
                                </div>
                                </form>
                    <?php
					die();
					}
					else
						redirect('reports');
								
				}
		}
		else
			redirect('reports');
	}
	
	function create_history_report($id = NULL){
		if($id!==NULL){
			$service = Service::find($id);
			if($service){
				if($_POST){
					$history = new HistoryReport();
					//$history->datetime = 
					var_dump($_POST['history-date']);
					$history->tjenestenr = $_POST['history-tjenestenr'];
					$history->description = $_POST['history-description'];
					$history->datetime = date('m/d/Y H:i',strtotime(str_replace("/","-",$_POST['history-date'])));
					$history->service_reports_id = $id;
					$history->save();
					
					redirect('reports/view_report/service/'.$id);
				}
				else
				{
					?>
                    
                    <div id="response_modal" class="modal hide fade in" style="display: block;" aria-hidden="false">
                                <div class="modal-header">
                                <h3>Ny logg</h3>
                                </div>
                                <div class="modal-body">
                                <form method="post" action="<?php echo base_url();?>reports/create_history_report/<?php echo $this->uri->segment(3);?>">
                                <div class="modal-inner">	
                                <p>
                                <label>Date &amp; Time</label>
                                <input type="text" name="history-date" id="history-date" value="<?php echo date('d/m/Y H:i');?>" />
                                </p>
                                <p>
                                <label>Tjenestenr</label>
                                <input type="text" name="history-tjenestenr" id="history-tjenestenr" value="<?php echo $this->user->tjenestenr;?>" />
                                </p>
                                <p>
                                <label>Description</label>
                                <textarea name="history-description" id="history-description"></textarea>
                                </p>
                                
                                </div>
                                <div class="modal-footer">
                                <input type="submit" name="submit" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
                                <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
                                </div>
                                </form>
                    <?php
					die();			
				}
			}
		}
	}
	
	
	function create_report($condition = NULL){
		if($condition!==NULL){
			if($condition=="service"){	
				if($_POST){
					
					$service = new Service();
					
					$service->status = $_POST['service-status'];
					$service->shiftjournal_id = $_POST['service-shiftjournalid'];
					//echo $_POST['service-date'];
					//$service->datetime = date('d/m/Y', strtotime($_POST['service-date']));
					$service->start = $_POST['service-datetime-start'];
					$service->end = $_POST['service-datetime-end'];
					$service->company_name = $_POST['service-name'];
					$service->company_address = $_POST['service-address'];
					$service->company_zipcode = $_POST['service-zipcode'];
					$service->company_city = $_POST['service-city'];
					//$service->object = $_POST['service-object'];
					$service->tjenestenr = $this->user->tjenestenr;
					$service->title = $_POST['service-title'];
					$service->description = $_POST['service-description'];
					//echo date('m/d/Y H:i:s');
					//$service->datetime = $_POST['service-date'];
					$service->datetime = date('m/d/Y',strtotime(str_replace("/","-",$_POST['service-date'])));
					//echo $service->datetime;
					print_r($service);
					$service->save();
					
					$last_service = Service::find('last');
					foreach($_FILES as $key=>$value){
						$this->_do_upload($key,$last_service->id);
					}
					redirect('reports');
					
				}
				else
				{
					$this->view_data['companies_not_inactive'] = Companies::find('all',array('group' => 'name' , 'conditions' => array('inactive = ?',0)));
					$this->config->load('defaults');
        			$this->content_view = 'reports/servicereports/service_report_create';
				}

			}
			else
			if($condition=="announce"){
				if($_POST){
					$announce = new Announce();	
					
					$announce->shiftjournal_id = $_POST['announce-shiftjournalid'];
					//$announce->datetime = date('d/m/Y H:i', strtotime('announce-datetime'));
					$announce->datetime = date('m/d/Y',strtotime(str_replace("/","-",$_POST['announce-datetime'])));
					$announce->tjenestenr = $this->user->tjenestenr;
					$announce->company_name = $_POST['company-name'];
					$announce->organization_id = $_POST['organization-id'];
					$announce->company_address = $_POST['company-address'];
					$announce->company_zipcode = $_POST['company-zipcode'];
					$announce->company_city = $_POST['company-city'];
					$announce->object = $_POST['object'];
					$announce->announce_name = $this->_encrypt($_POST['announce-name']);
					$announce->announce_birth = $this->_encrypt($_POST['announce-birth']);
					$announce->announce_ident = $this->_encrypt($_POST['announce-ident']);
					$announce->announce_address = $this->_encrypt($_POST['announce-address']);
					$announce->announce_zipcode = $this->_encrypt($_POST['announce-zipcode']);
					$announce->announce_city = $this->_encrypt($_POST['announce-city']);
					$announce->announce_phone = $this->_encrypt($_POST['announce-phone']);
					$announce->announce_description = $_POST['announce-description'];
					$announce->parent_name = $this->_encrypt($_POST['parent-name']);
					$announce->parent_address = $this->_encrypt($_POST['parent-address']);
					$announce->parent_zipcode = $this->_encrypt($_POST['parent-zipcode']);
					$announce->parent_city = $this->_encrypt($_POST['parent-city']);
					$announce->parent_phone = $this->_encrypt($_POST['parent-phone']);
					$announce->action_where = $_POST['announce-action-where'];
					$announce->action_datetime = date('m/d/Y',strtotime(str_replace("/","-",$_POST['announce-action-datetime'])));
					$announce->type = $_POST['announce-type'];
					$announce->type_other = $_POST['announce-type-other-text'];
					$announce->announce_item = $_POST['announce-item'];
					$announce->announce_item_value = $_POST['announce-item-value'];
					$announce->announce_item_sum = $_POST['announce-item-sum'];
					$announce->announce_item_status = $_POST['announce-status'];
					$announce->announce_item_status_other = $_POST['announce-status-other-text'];
					$announce->announce_item_action = $_POST['announce-action'];
					$announce->announce_item_action_other = $_POST['announce-action-other-text'];
					$announce->witness_name = $this->_encrypt($_POST['witness-name']);
					$announce->witness_address = $this->_encrypt($_POST['witness-address']);
					$announce->witness_zipcode = $this->_encrypt($_POST['witness-zipcode']);
					$announce->witness_city = $this->_encrypt($_POST['witness-city']);
					$announce->witness_phone = $this->_encrypt($_POST['witness-phone']);
					$announce->short_description = $_POST['short-description'];

					$announce->save();
					
					redirect('reports');
				}
				else
				{
					$this->view_data['companies_not_inactive'] = Companies::find('all',array('group' => 'name' , 'conditions' => array('inactive = ?',0)));
					$this->config->load('defaults');
					$this->content_view = 'reports/announcereports/announce_report_create';
				}
			}
			else
			if($condition=="lift"){
				if($_POST){
					$lift = new Lift();	
					$lift->object_name = $_POST['object-name'];
					$lift->object_address = $_POST['object-address'];
					$lift->object_zip = $_POST['object-zip'];
					$lift->object_city = $_POST['object-city'];
					$lift->shiftjournal_id = $_POST['shiftjournalid'];
					//echo $_POST['date'];
					$lift->datetime = date('m/d/Y',strtotime(str_replace("/","-",$_POST['date'])));
					//$lift->datetime = date("d/m/Y H:i", strtotime('lift-date'));
					$lift->tjenestenr = $this->user->tjenestenr;
					$lift->location_name = $_POST['location_name'];
					$lift->floor = $_POST['floor'];
					$lift->warning_time = $_POST['warning-time'];
					$lift->warning_method = $_POST['warning-method'];
					$lift->arrival_time = $_POST['arrival-time'];
					$lift->arrival_status = $_POST['arrival-status'];
					$lift->depart_time = $_POST['depart-time'];
					$lift->depart_status = $_POST['depart-status'];
					$lift->action_description = $_POST['action-description'];
					$lift->cause_description = $_POST['cause-description'];
					$lift->other_comments = $_POST['other-comments'];
					$lift->person_lift = $_POST['person-lift'];
					$lift->person_lift_qty = $_POST['person-lift-qty'];
					$lift->contact_feedback = $_POST['contact-feedback'];
					//echo $lift->datetime;
					$lift->save();		
					redirect('reports');
				}
				else
				{
					$this->view_data['companies_gronlandstunet'] = Companies::find('all',array('group' => 'name' , 'conditions' => array('inactive = ? AND catname = ?',0,'Sameiet Grønlandstunet')));
					$this->view_data['companies_location'] = Companies_has_location::find('all',array('group' => 'location_name' , 'conditions' => array('object = ?','Grønlandstunet')));
					$this->config->load('defaults');
					$this->content_view = 'reports/liftreports/lift_report_create';
				}
			}	
		}
		else
		redirect('reports');
	}
	
	function get_company(){
		if($_POST){
			$company = Companies::find('all',array('conditions' => array('inactive = ? AND name = ?',0,$_POST['name'])));
			if($company){
				$company_data = $company[0];
				$company_array['company_address'] = $company_data->address;
				$company_array['company_zipcode'] = $company_data->zipcode;
				$company_array['company_city'] = $company_data->city;
				$company_array['company_object'] = $company_data->catname;
				$company_array['org_no'] = $company_data->website;
				$company_json = json_encode($company_array);
				ob_clean();
				header('Content-Type: text/html; charset=utf-8');
				echo $company_json;
				die();
			}
			else
				die();
		}
	}
	
	function _do_upload($filename,$service_id)
	{
		$ext = end(explode('.',$_FILES[$filename]['name']));
		$this->load->helper('string');
		$name = random_string('alnum', 16).'.'.strtolower($ext);
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx|xlsx|xls|PNG|GIF|JPG|JPEG|PDF|DOC|DOCX|XLSX|XLS|';
		$config['file_name'] = $name;	
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($filename))
		{

		}
		else
		{	
			$service_attachment =  new ServiceAttachment();
			$data = array('upload_data' => $this->upload->data());
			$service_attachment->attachment_url = $data['upload_data']['file_name'];
			$service_attachment->service_id = $service_id;
			$service_attachment->save();
		}
	}
	
	function file_download($id = NULL){
		if($id!==NULL){
			$service_attachment =  ServiceAttachment::find($id);
			if($service_attachment){
				 header("Content-type: application/force-download");
				 header("Content-Transfer-Encoding: Binary");
				 header("Content-length: ".filesize('uploads/'.$service_attachment->attachment_url));
				 header("Content-disposition: attachment; filename=\"".basename($service_attachment->attachment_url)."\"");
				 readfile('uploads/'.$service_attachment->attachment_url);
				 die();
			}
		}
	}
	
	function file_delete($id = NULL){
		if($id!==NULL){
			$service_attachment =  ServiceAttachment::find($id);
			if($service_attachment){
				@unlink('uploads/'.$service_attachment->attachment_url);
				$service_id = $service_attachment->service_id;
				$service_attachment->delete();
				redirect('reports/view_report/service/'.$service_id);				
			}
			else
				redirect('reports');
		}
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