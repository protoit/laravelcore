<div id="mainfull">
<div class="top">Ny Anmeldelse
</div>
<div class="row">
	<form method="post" action="<?php echo base_url();?>reports/create_report/announce">
        <h5><strong><span>Anmeldelse Informasjon:</span></strong></h5>
         <span>Journal ID:</span>
            <!--Write data to announce_reports->shiftjournal_id -->    
            <input autofocus="autofocus" class="required" name="announce-shiftjournalid" type="text"  value="">
         <br/>
            <span>Dato &amp; Tid:</span>
            <!--Write data to announce_reports->datetime -->    
            <input class="required" name="announce-datetime" type="text"  value="<?php echo date('d/m/Y H:i');?>">
         <br/>
            <span>Tjenestenr:</span>
            <!--Write data to announce_reports->tjenestenr -->    
            <input class=" " name="announce-tjenestenr" type="text"  value="<?php echo $this->user->tjenestenr;?>" readonly="readonly"/>
         <br/>
         
        <h5><strong><span>Informasjon om fornærmedes/skadelidtes:</span></strong></h5>
            <span>Kundenavn:</span>
            <!--Get data from companies where inactive "0" --> 
            <!--Write data to announce_reports->company_name -->     
            <select class="required service_name" name="company-name" type="text">
            		<?php
					foreach($companies_not_inactive as $company){ 					
					?>
					<option value="<?php echo $company->name;?>"><?php echo $company->name;?></option>
					<?php  }  ?>
            </select>
         <br/>
            <span>Org. nr:</span>
            <!--Fetch companies->website from selected company(Kundenavn) --> 
            <!--Write data to announce_reports->organization_id -->       
            <input class="required company_no" name="organization-id" type="text"  value="">
         <br/>
            <span>Adresse:</span>
            <!--Fetch companies->address from selected company(Kundenavn) --> 
            <!--Write data to announce_reports->company_address -->       
            <input class="required company_address" name="company-address" type="text"  value="">
         <br/>
            <span>Postnr</span>
            <!--Fetch companies->zipcode from selected company(Kundenavn) --> 
            <!--Write data to announce_reports->company_zipcode -->     
            <input class="required company_zipcode" name="company-zipcode" type="text"  value="">
         <br/>
            <span>By</span>
            <!--Fetch companies->city from selected companycompany(Kundenavn) --> 
            <!--Write data to announce_reports->company_city -->     
            <input class="required company_city" name="company-city" type="text"  value="">
         <br/>
          <span>Object</span>
            <!--Fetch companies->city from selected companycompany(Kundenavn) --> 
            <!--Write data to announce_reports->object -->     
            <input class="required company_object" name="object" type="text"  value="Grønlandstorg">
        <br/>

        <h5><strong><span>Informasjon om anmeldte:</span></strong></h5>
            <span>Anmeldtes navn:</span>
            <!--Write data to announce_reports->announce_name
            Encrypt this data.
            -->     
            <input class="required" name="announce-name" type="text"  value="">
         <br/>
            <span>Anmeldtes Fødselsnummer:</span>
            <!--Write data to announce_reports->announce_birth
            Encrypt this data.
            -->        
            <input class="required" name="announce-birth" type="text"  value="">
         <br/>
            <span>Legitimasjon (Type/Nummer):</span>
            <!--Write data to announce_reports->announce_ident
            Encrypt this data.
            -->        
            <input class="required" name="announce-ident" type="text"  value="">
         <br/>   
            <span>Anmeldtes adresse:</span>
            <!--Write data to announce_reports->announce_address
            Encrypt this data.
            -->        
            <input class="required" name="announce-address" type="text"  value="">
         <br/>
            <span>Anmeldtes postnr</span> 
            <!--Write data to announce_reports->announce_zipcode
            Encrypt this data.
            -->      
            <input class="required" name="announce-zipcode" type="text"  value="">
         <br/>
            <span>Anmeldtes by</span>
            <!--Write data to announce_reports->announce_city
            Encrypt this data.
            -->      
            <input class="required" name="announce-city" type="text"  value="">
         <br/>
            <span>Anmeldtes telefonnr:</span>
            <!--Write data to announce_reports->announce_phone
            Encrypt this data.
            -->        
            <input class="required" name="announce-phone" type="text"  value="">
            <span>Beskrivelse av anmeldte:</span>
            <!--Write data to announce_reports->announce_description
            Encrypt this data.
            -->        
            <textarea cols="4" rows="4" class="required" name="announce-description" placeholder="Beskrivelse av anmeldte (Bekledning, Hårfarge, Spesielle kjenneteng). Utenlandsk Opprinnelse"></textarea>
         <br/>
         
        <h5><strong><span>Informasjon om verge:</span></strong></h5>
            <span>Verges navn:</span>
            <!--Write data to announce_reports->parent_name
            Encrypt this data.
            -->     
            <input class=" " name="parent-name" type="text"  value="">
         <br/>
            <span>Verges adresse:</span>
            <!--Write data to announce_reports->announce_address
            Encrypt this data.
            -->        
            <input class=" " name="parent-address" type="text"  value="">
         <br/>
            <span>Verges postnr</span> 
            <!--Write data to announce_reports->announce_zipcode
            Encrypt this data.
            -->      
            <input class=" " name="parent-zipcode" type="text"  value="">
         <br/>
            <span>Verges by:</span>
            <!--Write data to announce_reports->announce_city
            Encrypt this data.
            -->      
            <input class=" " name="parent-city" type="text"  value="">
         <br/>
            <span>Verges telefonnr:</span>
            <!--Write data to announce_reports->announce_phone
            Encrypt this data.
            -->        
            <input class=" " name="parent-phone" type="text"  value="">
         <br/>
       
         <h5><strong><span>Hendelse Informasjon:</span></strong></h5>

         <span>Hvor fant forholdet sted (Gateadresse):</span>
            <!--Write data to announce_reports->action_where -->
            <input class="required" name="announce-action-where" type="text"  value=""/>
         <br/>
         <span>Når fant forholdet sted:</span>
            <!--Write data to announce_reports->action_datetime
            Value = Datepicker output in format dd/mm/Y H:i
            -->        
            <input class="required datepicker" name="announce-action-datetime" type="text"  value="">
         <br/>
         <span>Forhold:</span>
            <!--Write data to announce_reports->announce_type -->    
            <div class="radiobutton"><input type="radio" id="announce-type-tyveri" name="announce-type" value="Tyveri/Naskeri"><label for="announce-type-tyveri">Tyveri/Naskeri</label></div>
            <div class="radiobutton"><input type="radio" id="announce-type-skadeverk" name="announce-type" value="Skadeverk"><label for="announce-type-skadeverk">Skadeverk</label></div>
            <!-- If Annet is choosed. Show a text field. -->
            <div class="radiobutton"><input type="radio" id="announce-type-other" name="announce-type" value="Annet"><label for="announce-type-other">Annet</label></div>
            <!-- This text area is for if Annet is choosed. Set text field to required if Annet is choosed.
                 Write data to announce_reports->type_other
            -->
            <textarea cols="4" rows="1" name="announce-type-other-text"></textarea>
         <br/>
        <span>Varebeskrivelse:</span>
            <!--Write data to announce_reports->announce_item -->
            <textarea class="required" cols="5" rows="5" name="announce-item" placeholder="Varer som er stjålet, evt. skadet (Vareslag, Merke, Type). Det kreves full erstatning for de evt. skadede varene."></textarea>
        <br/>
        <span>Verdi KR:</span>
            <!--Write data to announce_reports->announce_item_value -->
            <textarea cols="3" rows="5" name="announce-item-value"></textarea>
        <br/>
        <span>Sum:</span>
            <!--Write data to announce_reports->announce_item_sum -->        
            <input class="required" name="announce-item-sum" type="text"  value="">
         <br/>
         <span>Vare Status:</span>
            <!--Write data to announce_reports->announce_item_status -->    
            <div class="radiobutton"><input type="radio" id="announce-status-tyveri" name="announce-status" value="Varene er betalt"><label for="announce-status-tyveri">Varene er betalt</label></div>
            <div class="radiobutton"><input type="radio" id="announce-status-tilbakelevert" name="announce-status" value="Tilbakelevert"><label for="announce-status-tilbakelevert">Tilbakelevert</label></div>
            <div class="radiobutton"><input type="radio" id="announce-status-odelagt" name="announce-status" value="Ødelagt"><label for="announce-status-odelagt">Ødelagt</label></div>
            <!-- If Annet is choosed. Show a text field. -->
            <div class="radiobutton"><input type="radio" id="announce-status-other" name="announce-status" value="Annet"><label for="announce-status-other">Annet</label></div>
            <!-- This text area is for if Annet is choosed. Set text field to required if Annet is choosed.
                 Write data to announce_reports->announce_item_status_other
            -->
            <textarea cols="4" rows="1" name="announce-status-other-text"></textarea>
         <br/>
         <span>Anmeldte Status:</span>
            <!--Write data to announce_reports->announce_item_action -->    
            <div class="radiobutton"><input type="radio" id="announce-action-anmeldte" name="announce-action" value="Anmeldte er utlevert til Politiet"><label for="announce-action-anmeldte">Anmeldte er utlevert til Politiet</label></div>
            <div class="radiobutton"><input type="radio" id="announce-action-barnevernet" name="announce-action" value="Barnevernet"><label for="announce-action-barnevernet">Barnevernet</label></div>
            <div class="radiobutton"><input type="radio" id="announce-action-fri" name="announce-action" value="Satt Fri"><label for="announce-action-fri">Satt Fri</label></div>
            <!-- If Annet is choosed. Show a text field. -->
            <div class="radiobutton"><input type="radio" id="announce-action-other" name="announce-action" value="Annet"><label for="announce-action-other">Annet</label></div>
            <!-- This text area is for if Annet is choosed. Set text field to required if Annet is choosed.
                 Write data to announce_reports->announce_item_action_other
            -->
            <textarea cols="4" rows="1" name="announce-action-other-text"></textarea>
         <br/>
        <h5><strong><span>Vitne Informasjon:</span></strong></h5>
        
            <span>Vitnes navn:</span>
            <!--Write data to announce_reports->witness_name
            Encrypt this data.
            -->     
            <input class=" " name="witness-name" type="text"  value="">
         <br/>
            <span>Vitnes adresse:</span>
            <!--Write data to announce_reports->witness_address
            Encrypt this data.
            -->        
            <input class=" " name="witness-address" type="text"  value="">
         <br/>
            <span>Vitnes postnr</span> 
            <!--Write data to announce_reports->witness_zipcode
            Encrypt this data.
            -->      
            <input class=" " name="witness-zipcode" type="text"  value="">
         <br/>
            <span>Vitnes by:</span>
            <!--Write data to announce_reports->witness_city
            Encrypt this data.
            -->      
            <input class=" " name="witness-city" type="text"  value="">
         <br/>
            <span>Vitnes telefonnr:</span>
            <!--Write data to announce_reports->witness_phone
            Encrypt this data.
            -->        
            <input class=" " name="witness-phone" type="text"  value="">
         <br/>        
        <h5><strong><span>Kort angivelse:</span></strong></h5>
            <!--Write data to announce_reports->short_description -->
            <textarea class="required" cols="5" rows="5" name="short-description" placeholder="Kort angivelse av hva som ble iaktatt av vitnet..."></textarea>
        <br/>
        
            
</div>
        <div class="bottom">
        <input type="submit" name="send" class="btn btn-primary" value="Lagre"/>
        <!-- Preview this form in PDF -->
        <input type="" name="preview" class="btn" value="Forhåndsvisning"/>
        </form>
    </div>
    <!-- Once form is saved, redirect -> Rapporter -->
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var name = $('.service_name :selected').val();
			$.post('<?php echo base_url();?>reports/get_company',{name:name},function(data){
				var company = jQuery.parseJSON(data);
				$('.company_no').val(company.org_no);
				$('.company_address').val(company.company_address);
				$('.company_zipcode').val(company.company_zipcode);
				$('.company_city').val(company.company_city);
				$('.company_object').html('');
				$('.company_object').append('<option value="'+company.company_object+'">'+company.company_object+'</option>');
				$('.company_object option').first().attr('selected','selected');
				
			});
		
		$('.service_name').change(function(){
			var name = $('.service_name :selected').val();
			$.post('<?php echo base_url();?>reports/get_company',{name:name},function(data){
				var company = jQuery.parseJSON(data);
				$('.company_no').val(company.org_no);
				$('.company_address').val(company.company_address);
				$('.company_zipcode').val(company.company_zipcode);
				$('.company_city').val(company.company_city);
				$('.company_object').html('');
				$('.company_object').append('<option value="'+company.company_object+'">'+company.company_object+'</option>');
				$('.company_object option').first().attr('selected','selected');
				
			});
		});
	});
</script>