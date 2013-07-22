<?php   
$attributes = array('class' => '', 'id' => '_clients');
echo form_open_multipart($form_action, $attributes); 
?>
<div class="modal-content">  
<div class="modal-inner"> 
<?php if(isset($client)){ ?>
<input id="id" type="hidden" name="id" value="<?=$client->id;?>" />
<?php } ?>
<?php if(isset($view)){ ?>
<input id="view" type="hidden" name="view" value="true" />
<?php } ?>
<p>
        <label for="firstname"><?=$this->lang->line('application_firstname');?> *</label>
        <input id="firstname" type="text" name="firstname" class="required span5" value="<?php if(isset($client)){echo $client->firstname;} ?>" />
</p>
<p>
        <label for="lastname"><?=$this->lang->line('application_lastname');?> *</label>
        <input id="lastname" type="text" name="lastname" class="required span5" value="<?php if(isset($client)){echo $client->lastname;} ?>" />
</p>
<p>
        <label for="email"><?=$this->lang->line('application_email');?> *</label>
        <input id="email" type="text" name="email" class="required email span5" value="<?php if(isset($client)){echo $client->email;} ?>" />
</p>
<p>
        <label for="phone"><?=$this->lang->line('application_phone');?></label>
        <input id="phone" type="text" name="phone" class="span5" value="<?php if(isset($client)){echo $client->phone;}?>" />
</p>
<p>
        <label for="mobile"><?=$this->lang->line('application_mobile');?></label>
        <input id="mobile" type="text" name="mobile" class="span5" value="<?php if(isset($client)){echo $client->mobile;}?>" />
</p>
<p>
        <label for="address"><?=$this->lang->line('application_address');?></label>
        <input id="address" type="text" name="address" class="span5" value="<?php if(isset($client)){echo $client->address;}?>" />
</p>
<p>
        <label for="zipcode"><?=$this->lang->line('application_zip_code');?></label>
        <input id="zipcode" type="text" name="zipcode" class="span5" value="<?php if(isset($client)){echo $client->zipcode;}?>" />
</p>
<p>
        <label for="city"><?=$this->lang->line('application_city');?></label>
        <input id="city" type="text" name="city" class="span5" value="<?php if(isset($client)){echo $client->city;}?>" />
</p>
<p>
        <label for="password"><?=$this->lang->line('application_password');?> *</label>
        <input id="password" type="password" name="password" class="required span5" value="<?php if(isset($client)){echo $client->password;}?>" />
</p>
<p>
        <label for="userfile"><?php if(isset($client)){ ?>
            <img class="minipic" src="
               <?php 

                if($client->userpic != 'no-pic.png'){
                  echo base_url()."files/media/".$client->userpic;
                }else{
                  echo get_gravatar($client->email, '20');
                }
                 ?>
                " />
                <?php } ?> 
                <?=$this->lang->line('application_profile_picture');?></label>

              <input type="file" name="userfile" id="file">
              <div class="dummyfile">
                 <div class="input-append">
                      <input id="filename" type="text" class="input span4" name="file-name">
                      <a id="fileselectbutton" class="btn"><?=$this->lang->line('application_select');?></a>
                 </div>
            </div>

</p>
<?php
$access = array();
if(isset($client)){ $access = explode(",", $client->access); }
?>
<?=$this->lang->line('application_module_access');?>
<p>
<ul class="accesslist">
  <?php foreach ($modules as $key => $value) { ?>
<li> <input type="checkbox" class="cb" id="r_<?=$value->link;?>" name="access[]" value="<?=$value->id;?>" <?php if(in_array($value->id, $access)){ echo 'checked="checked"';}?>> <label for="r_<?=$value->link;?>"><?=$this->lang->line('application_'.$value->link);?></label>  </li>
<?php } ?>
</ul>
</p>

</div>
        <div class="modal-footer">
        <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
        <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>
<?php echo form_close(); ?>