<?php   
$attributes = array('class' => '', 'id' => 'backup_form');
echo form_open_multipart($form_action, $attributes); 
?>
 <div class="modal-content">  
  <div class="modal-inner modal-small"> 
<div class="alert alert-error"><?=$this->lang->line('application_restore_notice');?></div><br/>
<p>
        <label for="userfile"><?=$this->lang->line('application_backup_file_zip');?></label>
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
        <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_restore_backup');?>"/>
        <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>

<?php echo form_close(); ?>