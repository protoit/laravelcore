<div id="mainfull">
<div class="top">Rediger Tjenesterapport
</div>
    <form method="post" action="<?php echo base_url();?>reports/edit_report/service/<?php echo $this->uri->segment(4);?>" enctype="multipart/form-data">
        <!--Write data to service_reports->status -->
            <input style="display: none;" name="service-status" type="text" maxlength="100" value="new">
<div class="row">
        <h5><strong><span>Tjenesterapport Informasjon</span></strong></h5>
        
         <span>Journal ID:</span>
            <!--Write data to service_reports->shiftjournal_id -->    
            <input class="required" name="service-shiftjournalid" type="text" maxlength="100" value="<?php echo $service[0]->shiftjournal_id;?>" >
         <br/>
            <span>Dato:</span>
            <!--Write data to service_reports->date. Get today's date.-->    
            <input class="required datepicker" name="service-date" type="text" maxlength="100" value="<?php echo date("d/m/Y", strtotime($service[0]->datetime));?>">
         <br/>
            <span>Fra Tid:</span>
            <!--Write data to service_reports->start.-->    
            <input class=" " name="service-datetime-start" type="text" maxlength="100" value="<?php echo date("H:i", strtotime($service[0]->start));?>">
         <br/>
            <span>Til Tid:</span>
            <!--Write data to service_reports->end -->    
            <input class=" " name="service-datetime-end" type="text" maxlength="100" value="<?php echo date("H:i", strtotime($service[0]->end));?>">
         <br/>
         <h5><strong><span>Kundeinformasjon</span></strong></h5>
         <span>Kundenavn:</span>
            <!--Select company and autofill address, zipcode etc..
                Write data to service_reports->company_name. -->    
            <select class="required service_name" name="service-name">
                <?php
                foreach($companies_not_inactive as $company){                     
                ?>
                <option <?php if($service[0]->company_name==$company->name) echo 'selected="selected"';?> value="<?php echo $company->name;?>"><?php echo $company->name;?></option>
                <?php  }  ?>            
            </select>
         <br/>
         <span>Adresse:</span>
            <!--Get address from selected company
                Write data to service_reports->company_address. -->    
            <input class="company_address" name="service-address" type="text" maxlength="100" value="<?php echo $service[0]->company_address;?>">
         <br/>
         <span>Postnr:</span>
            <!--Get zipcode from selected company
                Write data to service_reports->company_zipcode. -->    
            <input class="company_zipcode" name="service-zipcode" type="text" maxlength="100" value="<?php echo $service[0]->company_zipcode;?>">
         <br/>
         <span>By:</span>
            <!--Get city from selected company
                Write data to service_reports->company_city. -->    
            <input class="company_city" name="service-city" type="text" maxlength="100" value="<?php echo $service[0]->company_city;?>">
         <br/>
         <span>Objekt:</span>
            <!--Get object from selected company.
                Write data to service_reports->object. -->    
            <select class="required company_object" name="service-object">
                <option value="<?php echo $service[0]->object;?>"><?php echo $service[0]->object;?></option>
            </select>
         <br/>
         <?php if(@$this->user->admin) { ?>
            <span>Tjenestenr:</span>
            <!--Write data to service_reports->tjenestenr -->    
            <input class=" " name="service-tjenestenr" type="text" maxlength="100" value="<?php echo $service[0]->tjenestenr;?>"/>
         <br/>
         <? } ?>

        <h5><strong><span>Tittel</span></strong></h5>
            <!--Write data to service_reports->title -->
            <input class="required" name="service-title" type="text" maxlength="100" value="<?php echo $service[0]->title;?>"/>
        <span>Beskrivelse</span>
            <!--Write data to service_reports->description -->
            <textarea cols="5" rows="10" name="service-description"><?php echo $service[0]->description;?></textarea>

        <h5><strong><span>Vedlegg</span></strong></h5>
            <!--Write data to service_reports->service_reports_attachments files here -->
            <div class="files">
                Vedlegg 1: <input type="file" name="attachment" value="" /><br />
                
                <input type="button" name="add_file" value="Legg til fler" class="btn add_file" />
            </div>
            
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
        var count = 2;
        
        $('.add_file').click(function(){
            $('.add_file').before('Vedlegg '+count+': <input type="file" name="attachment'+count+'" value="" /><br />');
            count++;
        });
        
        $('.service_name').change(function(){
            var name = $('.service_name :selected').val();
            $.post('<?php echo base_url();?>reports/get_company',{name:name},function(data){
                var company = jQuery.parseJSON(data);
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