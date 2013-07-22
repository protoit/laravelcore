<?php   
$attributes = array('class' => '', 'id' => '_item');
echo form_open($form_action, $attributes); 
?>
 <div class="modal-content">  
  <div class="modal-inner"> 
<?php if(isset($subscription)){ ?>
<input id="subscription_id" type="hidden" name="subscription_id" value="<?=$subscription->id;?>" />
<?php } 
if(isset($subscription_has_items)){ ?>
<input id="id" type="hidden" name="id" value="<?=$subscription_has_items->id;?>" />
<input id="subscription_id" type="hidden" name="subscription_id" value="<?=$subscription_has_items->subscription_id;?>" />
<?php } else{ ?>
<p id="item-selector">
        <label for="item_id"><?=$this->lang->line('application_item');?></label>
        <?php $options = array(); 
        $options['-'] = '-';
        foreach ($items as $value):
        $options[$value->id] = $value->name." - ".$value->value." ".$core_settings->currency;
        endforeach;
        echo form_dropdown('item_id', $options, '', 'style="width:85%"');?>
        <a class="btn tt additem" style="margin-left:6px; height: 18px !important;" titel="<?=$this->lang->line('application_custom_item');?>"><i class="icon-plus-sign"></i></a>      
</p>
<div id="item-editor" class="hide">
<p>
        <label for="name"><?=$this->lang->line('application_name');?></label>
        <input id="name" name="name" type="text" class="required span5"  value=""  />
</p>
<p>
        <label for="value"><?=$this->lang->line('application_value');?></label>
        <input id="value" type="text" name="value" class="required sman3 number"  value=""  />
</p>
<p>
        <label for="type"><?=$this->lang->line('application_type');?></label>
        <input id="type" type="text" name="type" class="required span5"  value=""  />
</p>
</div>
<?php } ?>
<p>
        <label for="amount"><?=$this->lang->line('application_quantity_hours');?></label>
        <input id="amount" type="text" name="amount" class="required span2 number"  value="<?php if(isset($subscription_has_items)){ echo $subscription_has_items->amount; }else{echo '1';} ?>"  />
</p>
<p>
        <label for="description"><?=$this->lang->line('application_description');?></label>
        <textarea id="description" class="span5" name="description"><?php if(isset($subscription_has_items)){ echo $subscription_has_items->description; } ?></textarea>
</p>

</div>
        <div class="modal-footer">
        <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
        <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>
<?php echo form_close(); ?>