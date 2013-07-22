<?php   
$attributes = array('class' => '', 'id' => '_invoices');
echo form_open($form_action, $attributes); 
?>
 <div class="modal-content">  
  <div class="modal-inner"> 
<?php if(isset($invoice)){ ?>
<input id="id" type="hidden" name="id" value="<?=$invoice->id;?>" />
<?php } ?>
<?php if(isset($view)){ ?>
<input id="view" type="hidden" name="view" value="true" />
<?php } ?>
<input id="status" name="status" type="hidden" value="Open"> 
<p>
        <label for="reference"><?=$this->lang->line('application_reference_id');?> *</label>
        <input id="reference" type="text" name="reference" class="span5"  value="<?php if(isset($invoice)){echo $invoice->reference;} else{ echo $core_settings->invoice_reference; } ?>"   readonly="readonly" />
</p>
<p>
        <label for="client"><?=$this->lang->line('application_client');?></label>
        <?php $options = array();
                $options['0'] = '-';
                foreach ($companies as $value):  
                $options[$value->id] = $value->name;
                endforeach;
        if(isset($invoice)){$client = $invoice->company_id;}else{$client = "";}
        echo form_dropdown('company_id', $options, $client, 'style="width:100%"');?>
</p>    
<?php if(isset($invoice)){ ?>
<p>
        <label for="status"><?=$this->lang->line('application_status');?></label>
        <?php $options = array(
                  'Open'  => $this->lang->line('application_Open'),
                  'Sent'    => $this->lang->line('application_Sent'),
                  'Paid' => $this->lang->line('application_Paid'),
                );
                echo form_dropdown('status', $options, $invoice->status, 'style="width:100%"'); ?>

</p>
<?php } ?>
<p>
        <label for="issue_date"><?=$this->lang->line('application_issue_date');?></label>
        <input id="issue_date" type="text" name="issue_date" class="required datepicker span5" value="<?php if(isset($invoice)){echo $invoice->issue_date;} ?>"  />
</p>
<p>
        <label for="due_date"><?=$this->lang->line('application_due_date');?></label>
        <input id="due_date" type="text" name="due_date" class="required datepicker span5" value="<?php if(isset($invoice)){echo $invoice->due_date;} ?>"  />
</p>
<p>
        <label for="currency"><?=$this->lang->line('application_currency');?></label>
        <input id="currency" type="text" name="currency" class="required span1" value="<?php if(isset($invoice)){ echo $invoice->currency; }else { echo $core_settings->currency; } ?>"/>
</p>
<p>
        <label for="currency"><?=$this->lang->line('application_discount');?></label>
        <input class="span1" name="discount" id="appendedInput" type="text" value="<?php if(isset($invoice)){ echo $invoice->discount;} ?>"/>
</p>
<p>
        <label for="terms"><?=$this->lang->line('application_terms');?></label>
        <textarea id="terms" name="terms" class="textarea required span5" style="height:100px"><?php if(isset($invoice)){echo $invoice->terms;}else{ echo $core_settings->invoice_terms; }?></textarea>
</p>
</div>
        <div class="modal-footer">
        <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
        <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>


<?php echo form_close(); ?>