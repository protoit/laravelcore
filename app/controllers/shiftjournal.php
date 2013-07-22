<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shiftjournal extends MY_Controller {
               
    function __construct()
    {
        parent::__construct();
        $access = FALSE;
        if($this->input->cookie('language') != ""){ $language = $this->input->cookie('language');}else{ $language = "english";}
        $this->lang->load('application', $language);
		/*
        if($this->client){    
            redirect('cprojects');
        }elseif($this->user){
			*/
		if($this->client || $this->user){
            foreach ($this->view_data['menu'] as $key => $value) { 
                if($value->link == "shiftjournal"){ $access = TRUE;}
            }
            if(!$access){redirect('login');}

        }else{
            redirect('login');
        }
		
		
		
		if($this->client){
			$this->view_data['company_id'] = $this->client->company_id;	
			
			$companies = Companies::all();
			
			foreach($companies as $company){
				if($this->view_data['company_id'] == $company->id){
					$company_name = $company->name;	
				}
			}
			
			$companies = Companies::find('all',array('group' => 'name' , 'conditions' => array('name = ?',$company_name)));
			
			foreach($companies as $company){
				$catname = $company->catname;	
			}
			
			$objectcat = Objectcat::find('all',array('conditions' => array('catname_has_items = ?',$catname)));
			
			$this->view_data['submenu']['Alle'] = 'shiftjournal/filter/all';
			if($objectcat)
			foreach($objectcat as $cat){
				if($cat->catname_has_items != '' && $cat->catname_has_items != NULL)
				$this->view_data['submenu'][$cat->catname_has_items] = 'shiftjournal/filter/'.$cat->id;
			}
			
		}		
		else
		{
			$objectcat = Objectcat::all();
		
			$this->view_data['submenu']['Alle'] = 'shiftjournal/filter/all';
			foreach($objectcat as $cat){
				if($cat->catname_has_items != '' && $cat->catname_has_items != NULL)
				$this->view_data['submenu'][$cat->catname_has_items] = 'shiftjournal/filter/'.$cat->id;
			}
		}
				
		/*
        $this->view_data['submenu'] = array(
                         $this->lang->line('application_all') => 'shiftjournal',
                         $this->lang->line('application_gt') => 'shiftjournal/filter/gt',
                         $this->lang->line('application_europark') => 'shiftjournal/filter/europark',
                         $this->lang->line('application_sameiet_gt') => 'shiftjournal/filter/sameiegt',
                         $this->lang->line('application_olafiagangen') => 'shiftjournal/filter/olafiagangen',
                         );        
		*/
    }    
    function index()
    {   
		$this->load->model('timesheets_model');
		$this->view_data["shiftjournal_calling_data"] = $this->timesheets_model->fetch_table('shiftjournal_calling');
		$this->view_data["objectcat_data"] = $this->timesheets_model->fetch_table('objectcat');
		$where = array('object'=>'Grønlandstorg');
		$this->view_data["companies_has_locations_data"] = $this->timesheets_model->fetch_table_where('companies_has_location',$where);
        $this->content_view = 'shiftjournal/all';
        $this->load->database();
        $max_value = 25; 
    }
	
	
    function filter($condition = NULL)
    {		
		//echo urldecode($condition);
		
		$objectcat = Objectcat::all();
		
		foreach($objectcat as $cat){
			if($cat->id == $condition)
				$object = $cat->catname_has_items;
		}
		
		if($this->client){
			$company_id = $this->client->company_id;
			
			$companies = Companies::all();
			
			foreach($companies as $company){
				if($company_id == $company->id){
					$name = $company->name;	
				}
			}
			
			if($condition != NULL){
				if($condition == 'all')
					$this->view_data['shiftjournals'] = Shift::find('all',array('conditions' => array('company = ?',$name)));
				else
					$this->view_data['shiftjournals'] = Shift::find('all',array('conditions' => array('company = ? AND object = ?',$name, $object)));
			}
			else
				$this->view_data['shiftjournals'] = Shift::find('all',array('conditions' => array('object = ?',$object)));
			
		}
		else
		if($this->user){
		
			if($condition != NULL){
				if($condition == 'all')
					$this->view_data['shiftjournals'] = Shift::all();
				else
					$this->view_data['shiftjournals'] = Shift::find('all',array('conditions' => array('object = ?',$object)));
			}
			else
				$this->view_data['shiftjournals'] = Shift::all();
			
		}
		
		
		/*
        switch ($condition) {
            case 'gt':
				$this->view_data['shiftjournals'] = Shift::find('all',array('conditions' => array('object = ?','Grønlandstorg')));
                break;
            case 'europark':
                $this->view_data['shiftjournals'] = Shift::find('all', array('conditions' => array('object = ?', 'Europark')));
                break;
            case 'sameiegt':
                $this->view_data['shiftjournals'] = Shift::find('all', array('conditions' => array('object = ?', 'Sameie Grønlandstunet')));
                break;
            case 'olafiagangen':
                $this->view_data['shiftjournals'] = Shift::find('all', array('conditions' => array('object = ?', 'Olafiagangen')));
                break;    
            default:
                $this->view_data['shiftjournals'] = Shift::all();
                break;
        }
		*/
		/*
        echo '<pre>';
		var_dump($this->view_data['shiftjournal']);
		die();
		*/
		
        $this->content_view = 'shiftjournal/filter';
		$this->load->database();
    }
    function delete($id = FALSE){
		
		if($id!=FALSE){
			$shiftjournal = Shift::find($id);
			$shiftjournal->status = "inactive";
			$shiftjournal->save();			
		}
		redirect('shiftjournal');
		/*
        $shiftjournal = Shiftjournal::find($id);
        $shiftjournal->delete();
        if(!$shiftjournal){$this->session->set_flashdata('message', 'error:'.$this->lang->line('messages_delete_quotation_error'));}
           else{$this->session->set_flashdata('message', 'success:'.$this->lang->line('messages_delete_quotation_success'));}
        redirect('shiftjournal');
		*/
    }
	
	
	function get_locations($object = NULL){
			/*
			echo '<pre>';
			var_dump($this->user);
			die();
			*/
			if($object != NULL ) {
					//echo urldecode($object);
					//echo '<pre>';
					$companies = Company::find('all',array('conditions' => array('catname = ?',urldecode($object))));
					//var_dump($companies);
					if($companies)
						foreach($companies as $company){
							?>
                            <option value="<?php echo $company->name;?>"><?php echo $company->name;?></option>
                            <?php	
						}
			}
			else
					echo 'Empty';
			die();
	}
	
	function update($id = NULL){
		if($id!=NULL){
			$record = Shift::find($id);
			$objectcat = Objectcat::all();
			$companies = Company::all();
			$shiftjournalcodes = Shiftjournalcode::all();
			?>
            <div id="response_modal" class="modal hide fade in" style="display: block;" aria-hidden="false">
            <div class="modal-header">
            <h3><?=$this->lang->line('application_edit_shiftjournal');?></h3>
            </div>
            <div class="modal-body">
            <form method="post" action="<?php echo base_url();?>shiftjournal/update_record"> 
            <input type="hidden" name="id" value="<?php echo $record->id;?>"/>  
            <div class="modal-inner">
            <?php
            if(@$this->user->admin){?>
            <p>
            <label><?=$this->lang->line('application_employeeID');?></label>
            <input type="text" name="employeeID" id="employeeID" value="<?php echo $record->tjenestenr; ?>"/>
            </p>
            <?php }?>           
            <p>
            <label><?=$this->lang->line('application_datetime');?></label>
            <input type="text" name="datetime" value="<?php $fromMYSQL = $record->datetime; echo date("d/m/Y", strtotime($fromMYSQL));?>"/>
            </p>
            <p>
            <label><?=$this->lang->line('application_time');?></label>
            <input type="text" name="time" value="<?php $fromTime = $record->time; echo date("H:i", strtotime($fromTime));?>"/>
            </p>
            <p>
            <th><label><?=$this->lang->line('application_calling');?></label></th>
            <td><select style="width: 150px" name="calling" id="calling" class="select2-container">
            <option><?php echo $record->calling; ?></option>
            <option>Annet</option>
            <option>Alarm</option>
            <option>Service</option>
            <option>Tjenestetlf</option>
            </select></td>
            </p>
            <p>
            <label><?=$this->lang->line('application_object');?></label>
            <select style="width: 150px" name="object" id="object-update" class="element text small">
            <?php 
				foreach($objectcat as $objcat){
					if($objcat->catname_has_items!= NULL && $objcat->catname_has_items !=''){
						?>
						<option <?php if($record->object==$objcat->catname_has_items) echo 'selected="selected"';?> value="<?php echo $objcat->catname_has_items;?>"><?php echo $objcat->catname_has_items;?></option>
						<?php
					}
				}
			?>
            </select>
            </p>
            <p>
            <label><?=$this->lang->line('application_location');?></label>
            <select style="width: 150px" name="company" id="company-update" class="element text small">
            <?php 
				foreach($companies as $company){
						?>
						<option <?php if($record->company==$company->name) echo 'selected="selected"';?> value="<?php echo $company->name;?>"><?php echo $company->name;?></option>
						<?php
				}
			?>
            </select>
            </p>
            <p>
            <label><?=$this->lang->line('application_taskcode');?></label>
            <select style="width: 150px" name="taskcode" id="taskcode" class="element text small">
            <?php 
				foreach($shiftjournalcodes as $calling){
						?>
						<option <?php if($record->taskcode==$calling->codedescription) echo 'selected="selected"';?> value="<?php echo $calling->codedescription;?>"><?php echo $calling->codedescription;?></option>
						<?php
				}
			?>
            </select>
            </p>
            <p>
            <label><?=$this->lang->line('application_hrs_qty');?></label>
            <input type="text" name="qty" value="<?php echo $record->qty;?>" style="width: 20px;"/>
            </p>
            <p>
            <label><?=$this->lang->line('application_description');?></label>
            <textarea name="description" style="height: 80px; width: 95%;"><?php echo $record->description;?></textarea>
            </p>
            </div>
            <div class="modal-footer">
            <input type="submit" name="submit" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
            <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
            </div>
            
            </div>
            <?php echo form_close(); ?>
            <script type="text/javascript">
			$(document).ready(function(){
				$('#object-update').change(function(){
					var val = $(this).val();
					$.post('<?php echo base_url();?>shiftjournal/get_locations/'+val,{}, function(data){
						$('#company-update').find('option').remove().end();
						$('#company-update').append(data);
					});
				});
			});
			</script>
            
            <?php
			
		}
		die();
	}
	
	function update_record(){
		if($_POST){
            $datetime = $_POST['datetime'];
            $datetimeold = DateTime::createFromFormat('d/m/Y', ($datetime));
            $newDate = $datetimeold->format('Y-m-d H:i');
            $_POST[$newDate] = $newDate;
			$record = Shift::find($_POST['id']);
            if(@$this->user->admin){
            $record->tjenestenr = $_POST['employeeID'];
            }
            $record->datetime = $_POST[$newDate];
            $record->time = $_POST['time'];
			$record->calling = $_POST['calling'];
			$record->object = $_POST['object'];
			$record->company = $_POST['company'];
			$record->taskcode = $_POST['taskcode'];
			$record->qty = $_POST['qty'];
			$record->description= $_POST['description'];
			$record->save();
			redirect('shiftjournal');
            
            			
		}
	}
}