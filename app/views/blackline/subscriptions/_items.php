<?php   
$attributes = array('class' => '', 'id' => '_item');
echo form_open($form_action, $attributes); 
?>
 <div class="modal-content">  
  <div class="modal-inner modal-small"> 
<?php if(isset($items)){ ?>
<input id="id" type="hidden" name="id" value="<?=$items->id;?>" />
<?php } ?>
<p>
        <label for="name"><?=$this->lang->line('application_name');?></label>
        <input id="name" name="name" type="text" class="required span5"  value="<?php if(isset($items)){ echo $items->name; } ?>"  />
</p>
<p>
        <label for="value"><?=$this->lang->line('application_value');?></label>
        <input id="value" type="text" name="value" class="required span5 number"  value="<?php if(isset($items)){ echo $items->value; } ?>"  />
</p>
<p>
        <label for="type"><?=$this->lang->line('application_type');?></label>
        <input id="type" type="text" name="type" class="required span5"  value="<?php if(isset($items)){ echo $items->type; } ?>"  />
</p>

</div>
        <div class="modal-footer">
        <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
        <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>
<?php echo form_close(); ?>