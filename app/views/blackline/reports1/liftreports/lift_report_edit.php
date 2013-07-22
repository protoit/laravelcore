<div id="mainfull">
<div class="top">Ny Heisrapport
</div>
        
<div class="row">
		<form method="post" action="<?php echo base_url();?>reports/edit_report/lift/<?php echo $this->uri->segment(4);?>">
        <h5><strong><span>Kundeinformasjon</span></strong></h5>
            
            <span>Kundenavn:</span>
            <!--Fetch companies->name where name = "Grønlandstunet" --> 
            <!--Write data to lift_reports->object_name -->     	
            <select class="required" name="object-name">
			<?php
					foreach($companies_gronlandstunet as $company){ 					
					?>
						<option <?php if($liftreport[0]->object_name==$company->name) echo 'selected="selected"';?> value="<?php echo $company->name;?>"><?php echo $company->name;?></option>
					<?php  }  ?>				
            </select>
         <br/>
            <span>Adresse:</span>
            <!--Fetch companies->address from selected company(Grønlandstunet) --> 
            <!--Write data to lift_reports->object_address -->       
            <input class=" " name="object-address" type="text" maxlength="100" value="<?php echo $liftreport[0]->object_address;?>">
         <br/>
            <span>Postnr</span>
            <!--Fetch companies->zipcode from selected company(Grønlandstunet) --> 
            <!--Write data to lift_reports->object_zip -->     
            <input class=" " name="object-zip" type="text" maxlength="100" value="<?php echo $liftreport[0]->object_zip;?>">
         <br/>
         <span>City</span>
            <!--Fetch companies->city from selected company(Grønlandstunet) --> 
            <!--Write data to lift_reports->object_city -->     
            <input class=" " name="object-city" type="text" maxlength="100" value="<?php echo $liftreport[0]->object_city;?>">
         <br/>

        <h5><strong><span>Rapport Informasjon</span></strong></h5>
        
         <span>Journal ID:</span>
            <!--Write data to lift_reports->shiftjournal_id -->    
            <input class=" " name="shiftjournalid" type="text" maxlength="100" value="<?php echo $liftreport[0]->shiftjournal_id;?>">
         <br/>
            <span>Dato:</span>
            <!--Write data to lift_reports->date -->    
            <input class=" " name="date" type="text" maxlength="100" value="<?php echo $liftreport[0]->datetime;?>">
         <br/>
         <?php if(@$this->user->admin){ ?>
            <span>Tjenestenr:</span>
            <!--Write data to lift_reports->tjenestenr -->    
            <input class=" " name="tjenestenr" type="text" maxlength="100" value="<?php echo $liftreport[0]->tjenestenr;?>"/>
         <br/>
         <? } ?>
            <span>Bevokningsadresse:</span>
            <!--Fetch companies->name from companies where object = "Sameiet Grønlandstunet" -->
            <!--Write data to lift_reports->location_name -->    
            <select name="location_name">
            		<?php
					foreach($companies_sameiet as $company){ ?>
						<option <?php if($liftreport[0]->location_name==$company->name) echo 'selected="selected"';?> value="<?php echo $company->name;?>"><?php echo $company->name;?></option>
					<?php } ?>		
            </select>
         <br/>
            <span>Etasje:</span>
            <!--Write data to lift_reports->floor -->    
            <input class="required" name="floor" type="text" maxlength="100" value="<?php echo $liftreport[0]->floor;?>"/>
         <br/>
            <span>Varslingstidspunkt:</span>
            <!--Write data to lift_reports->warning_time -->    
            <input class="required" name="warning-time" type="text" maxlength="100" value="<?php echo $liftreport[0]->warning_time;?>"/>
         <br/>
            <span>Varslingsmetode:</span>
            <!--Write data to lift_reports->warning_method -->    
            <input class="required" name="warning-method" type="text" maxlength="100" value="<?php echo $liftreport[0]->warning_method;?>"/>
         <br/>
            <span>Ankomstid:</span>
            <!--Write data to lift_reports->arrival_time -->    
            <input class="required"  name="arrival-time" type="text" maxlength="100" value="<?php echo $liftreport[0]->arrival_time;?>"/>
         <br/>
            <span>Status ved ankomst:</span>
            <!--Write data to lift_reports->arrival_status -->    
            <input class="required" name="arrival-status" type="text" maxlength="100" value="<?php echo $liftreport[0]->arrival_status;?>"/>
         <br/>
            <span>Avreisetid:</span>
            <!--Write data to lift_reports->depart_time -->    
            <input class="required" name="depart-time" type="text" maxlength="100" value="<?php echo $liftreport[0]->depart_time;?>"/>
         <br/>
            <span>Status ved avreise:</span>
            <!--Write data to lift_reports->depart_status -->    
            <input class="required" name="depart-status" type="text" maxlength="100" value="<?php echo $liftreport[0]->depart_status;?>"/>
         <br/>
            <span>Hva ble gjort:</span>
            <!--Write data to lift_reports->action_description -->    
            <textarea name="action-description" class="" rows="6" maxlength="400"><?php echo $liftreport[0]->action_description;?></textarea>
         <br/>
         <span>Årsak til heisstans:</span>
            <!--Write data to lift_reports->cause_description -->    
            <textarea name="cause-description" class="" rows="6" maxlength="400"><?php echo $liftreport[0]->cause_description;?></textarea>
         <br/>
         <span>Annet:</span>
            <!--Write data to lift_reports->other_comments -->    
            <textarea name="other-comments" class="" rows="3" maxlength="400"><?php echo $liftreport[0]->other_comments;?></textarea>
         <br/>
         <span>Personer i heisen:</span>
            <!--Write data to lift_reports->person_lift -->    
            <div class="radiobutton"><input <?php if($liftreport[0]->person_lift=="Yes") echo 'checked="checked"';?> type="radio" id="person-lift-yes" name="person-lift" value="Yes"><label for="person-lift-yes">Yes</label></div>
            <div class="radiobutton"><input type="radio" <?php if($liftreport[0]->person_lift=="No") echo 'checked="checked"';?>  id="person-lift-no" name="person-lift" value="No"><label for="person-lift-no">No</label></div>
            <label>Hvis Ja. Fyll antall person:</label>
            <!--Write data to lift_reports->person_lift_qty -->
            <input class=" " name="person-lift-qty" type="text" maxlength="100" value="<?php echo $liftreport[0]->person_lift_qty;?>"/>
         <br/>
         <span>Tilbakemelding gitt til innringer:</span>
            <!--Write data to lift_reports->contact_feedback -->    
            <div class="radiobutton"><input type="radio" <?php if($liftreport[0]->contact_feedback=="Yes") echo 'checked="checked"';?> id="contact-feedback-yes" name="contact-feedback" value="Yes"><label for="contact-feedback-yes">Yes</label></div>
            <div class="radiobutton"><input type="radio" <?php if($liftreport[0]->contact_feedback=="No") echo 'checked="checked"';?> id="contact-feedback-no" name="contact-feedback" value="No"><label for="contact-feedback-no">No</label></div>

</div>
    <div class="bottom">
        <input type="submit" name="send" class="btn btn-primary" value="Lagre"/>
        <!-- Preview this form in PDF -->
        <input type="" name="preview" class="btn" value="Forhåndsvisning"/>
    </div>
    <!-- Once form is saved, redirect -> Rapporter -->
    </form>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		
		
		$('.object_name').change(function(){
			name = $('.object_name :selected').val();
			$.post('<?php echo base_url();?>reports/get_company',{name:name},function(data){
				var company = jQuery.parseJSON(data);
				$('.object_address').val(company.company_address);
				$('.object_zipcode').val(company.company_zipcode);
				$('.object_city').val(company.company_city);				
			});
		});
	});
</script>