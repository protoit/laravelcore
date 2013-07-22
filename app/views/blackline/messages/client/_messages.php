<?php   
$attributes = array('class' => '', 'id' => '_quotation');
echo form_open($form_action, $attributes); 
?>
 <div class="modal-content">  
  <div class="modal-inner">  
<p>
        <label for="client"><?=$this->lang->line('application_to');?></label>
        <?php $options = array();
                foreach ($users as $value):  
                $options["Agents"]["u".$value->id] = $value->firstname.' '.$value->lastname;
                endforeach;
        echo form_dropdown('recipient', $options, '', 'style="width:100%"');?>
</p>     
<p>
        <label for="subject"><?=$this->lang->line('application_subject');?></label>
        <input id="subject" type="text" name="subject" class="required span5" value=""  />
</p>
<p>
        <label for="message"><?=$this->lang->line('application_message');?></label>
        <textarea id="message" name="message" rows="6" class="required span5 textarea"></textarea>
</p>

</div>
        <div class="modal-footer">
        <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_send');?>"/>
        <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>


<?php echo form_close(); ?>
