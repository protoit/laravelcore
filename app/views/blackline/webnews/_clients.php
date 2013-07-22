<div class="modal-content">  
<div class="modal-inner"> 
<?php   
$attributes = array('class' => '', 'id' => '_company');
echo form_open_multipart($form_action, $attributes); 
?>
<p>
        <label for="reference"><?=$this->lang->line('application_reference_id');?> *</label>
        <input id="reference" type="text" name="reference" class="required span5"  value="<?php echo $client_reference; ?>"   readonly="readonly"  />
</p>
<p>
        <label for="name"><?=$this->lang->line('application_company');?> <?=$this->lang->line('application_name');?> *</label>
        <input id="name" type="text" name="name" class="required span5" value="<?php if(isset($client)){echo $client->company;} ?>"  />
</p>
<p>
        <label for="website"><?=$this->lang->line('application_website');?> *</label>
        <input id="website" type="text" name="website" class="required span5" value="<?php if(isset($company)){echo $company->website;} ?>" />
</p>
<p>
        <label for="phone"><?=$this->lang->line('application_phone');?> *</label>
        <input id="phone" type="text" name="phone" class="required span5" value="<?php if(isset($client)){echo $client->phone;}?>" />
</p>
<p>
        <label for="mobile"><?=$this->lang->line('application_mobile');?></label>
        <input id="mobile" type="text" name="mobile" class="span5" value="" />
</p>
<p>
        <label for="address"><?=$this->lang->line('application_address');?> *</label>
        <input id="address" type="text" name="address" class="required span5" value="<?php if(isset($client)){echo $client->address;}?>" />
</p>
<p>
        <label for="zipcode"><?=$this->lang->line('application_zip_code');?> *</label>
        <input id="zipcode" type="text" name="zipcode" class="required span5" value="<?php if(isset($client)){echo $client->zip;}?>" />
</p>
<p>
        <label for="city"><?=$this->lang->line('application_city');?> *</label>
        <input id="city" type="text" name="city" class="required span5" value="<?php if(isset($client)){echo $client->city;}?>" />
</p>
</div>
        <div class="modal-footer">
        <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
        <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>

<?php echo form_close(); ?>