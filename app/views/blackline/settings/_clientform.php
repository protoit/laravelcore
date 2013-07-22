<?php   
$attributes = array('class' => '', 'id' => 'client_form');
echo form_open_multipart($form_action, $attributes); 
?>
 <div class="modal-content">  
  <div class="modal-inner"> 
<p>
        <label for="password"><?=$this->lang->line('application_password');?></label>
        <input id="password" type="password" name="password"  minlength="6" />
</p>
<p>
        <label for="confirm_password"><?=$this->lang->line('application_confirm_password');?></label>
        <input id="confirm_password" name="confirm_password" type="password"  minlength="6" equalTo="#password">
</p>
<p>
        <label for="userfile"><?=$this->lang->line('application_profile_picture');?></label>

              <input type="file" name="userfile" id="file">
              <div class="dummyfile">
                 <div class="input-append">
                      <input id="filename" type="text" class="input span4" name="file-name">
                      <a id="fileselectbutton" class="btn"><?=$this->lang->line('application_select');?></a>
                 </div>
            </div>

</p>
</div>
        <div class="modal-footer">
        <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
        <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>

<?php echo form_close(); ?>