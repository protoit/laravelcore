
<div id="main">
<div id="options">
			<a href="<?=base_url()?>invoices/update/<?=$invoice->id;?>/view" class="btn" data-toggle="modal"><i class="icon-edit"></i> <?=$this->lang->line('application_edit_invoice');?></a>
			<a href="<?=base_url()?>invoices/item/<?=$invoice->id;?>" class="btn" data-toggle="modal"><i class="icon-plus-sign"></i> <?=$this->lang->line('application_add_item');?></a>
			<div class="visible-phone"><br/></div>
			<a href="<?=base_url()?>invoices/preview/<?=$invoice->id;?>" class="btn"><i class="icon-file"></i> <?=$this->lang->line('application_preview');?></a>
			<?php if($invoice->status != "Paid" && isset($invoice->company->name)){ ?><a href="<?=base_url()?>invoices/sendinvoice/<?=$invoice->id;?>" class="btn"><i class="icon-envelope"></i> <?=$this->lang->line('application_send_invoice_to_client');?></a><?php } ?>

		</div>
		<hr>
		<div class="row">
		<div class="span12 marginbottom20">
		<div class="table_head"><h6><?=$this->lang->line('application_invoice_details');?></h6></div>
		<div class="subcont">
		<ul class="details span6">
			<li><span><?=$this->lang->line('application_invoice_id');?>:</span> <?=$invoice->reference;?></li>
			<li class="<?=$invoice->status;?>"><span><?=$this->lang->line('application_status');?>:</span>
			<a class="label <?php $unix = human_to_unix($invoice->sent_date.' 00:00'); $unix2 = human_to_unix($invoice->paid_date.' 00:00'); if($invoice->status == "Paid"){echo 'label-success tt" title="'.date($core_settings->date_format, $unix2);}elseif($invoice->status == "Sent"){ echo 'label-warning tt" title="'.date($core_settings->date_format, $unix);} ?>"><?=$this->lang->line('application_'.$invoice->status);?>
			</a>
			</li>
			<li><span><?=$this->lang->line('application_issue_date');?>:</span> <?php $unix = human_to_unix($invoice->issue_date.' 00:00'); echo date($core_settings->date_format, $unix);?></li>
			<li><span><?=$this->lang->line('application_due_date');?>:</span> <a class="label <?php if($invoice->status == "Paid"){echo 'label-success';} if($invoice->due_date <= date('Y-m-d') && $invoice->status != "Paid"){ echo 'label-important tt" title="'.$this->lang->line('application_overdue'); } ?>"><?php $unix = human_to_unix($invoice->due_date.' 00:00'); echo date($core_settings->date_format, $unix);?></a></li>
			<span class="visible-phone"></span>
		</ul>
		<ul class="details span6">
			<?php if(isset($invoice->company->name)){ ?>
			<li><span><?=$this->lang->line('application_company');?>:</span> <a href="<?=base_url()?>clients/view/<?=$invoice->company->id;?>" class="label label-info"><?=$invoice->company->name;?></a></li>
			<li><span><?=$this->lang->line('application_contact');?>:</span> <?php if(isset($invoice->company->client->firstname)){ ?><?=$invoice->company->client->firstname;?> <?=$invoice->company->client->lastname;?> <?php }else{echo "-";} ?></li>
			<li><span><?=$this->lang->line('application_street');?>:</span> <?=$invoice->company->address;?></li>
			<li><span><?=$this->lang->line('application_city');?>:</span> <?=$invoice->company->zipcode;?> <?=$invoice->company->city;?></li>
			<?php }else{ ?>
				<li><?=$this->lang->line('application_no_client_assigned');?></li>
			<?php } ?>
		</ul>
		<br clear="all">
		</div>
		</div>
		</div>

		<div class="row">
		<div class="table_head"><h6><i class="icon-list-alt"></i><?=$this->lang->line('application_invoice_items');?></h6><a href="<?=base_url()?>invoices/item/<?=$invoice->id;?>" class="btn btn-mini pull-right" data-toggle="modal"><i class="icon-plus-sign"></i> <?=$this->lang->line('application_add_item');?></a></div>
		<table id="items" rel="<?=base_url()?>" cellspacing="0" cellpadding="0">
		<thead>
		<th width="4%"><?=$this->lang->line('application_action');?></th>
			<th><?=$this->lang->line('application_name');?></th>
			<th class="hidden-phone"><?=$this->lang->line('application_description');?></th>
			<th width="8%"><?=$this->lang->line('application_hrs_qty');?></th>
			<th width="12%"><?=$this->lang->line('application_unit_price');?></th>
			<th width="12%"><?=$this->lang->line('application_sub_total');?></th>
		</thead>
		<?php $i = 0; $sum = 0;?>
		<?php foreach ($items as $value):?>
		<tr id="<?=$value->id;?>" >
			<td class="option btn-group">
				<a href="<?=base_url()?>invoices/item_update/<?=$invoice->invoice_has_items[$i]->id;?>" class="btn btn-mini tt" title="<?=$this->lang->line('application_edit');?>" data-toggle="modal"><i class="icon-edit"></i></a>
				<a href="<?=base_url()?>invoices/item_delete/<?=$invoice->invoice_has_items[$i]->id;?>/<?=$invoice->id;?>" class="btn btn-mini tt" title="<?=$this->lang->line('application_delete');?>"><i class="icon-trash"></i>
			</td>
			<td><?php if(!empty($value->name)){echo $value->name;}else{ echo $invoice->invoice_has_items[$i]->item->name; }?></td>
			<td class="hidden-phone"><?=$invoice->invoice_has_items[$i]->description;?></td>
			<td align="center"><?=$invoice->invoice_has_items[$i]->amount;?></td>
			<td><?php echo sprintf("%01.2f",$invoice->invoice_has_items[$i]->value);?></td>
			<td><?php echo sprintf("%01.2f",$invoice->invoice_has_items[$i]->amount*$invoice->invoice_has_items[$i]->value);?></td>

		</tr>
		
		<?php $sum = $sum+$invoice->invoice_has_items[$i]->amount*$invoice->invoice_has_items[$i]->value; $i++;?>
		
		<?php endforeach;
		if(empty($items)){ echo "<tr><td colspan='6'>".$this->lang->line('application_no_items_yet')."</td></tr>";}
		if(substr($invoice->discount, -1) == "%"){ $discount = sprintf("%01.2f", round(($sum/100)*substr($invoice->discount, 0, -1), 2)); }
		else{$discount = $invoice->discount;}
		$sum = $sum-$discount;

		$tax = sprintf("%01.2f", round(($sum/100)*$core_settings->tax, 2));
		$sum = sprintf("%01.2f", round($sum+$tax, 2));
		?>
		<?php if ($discount != 0): ?>
		<tr>
			<td colspan="5" align="right"><?=$this->lang->line('application_discount');?></td>
			<td>- <?=$invoice->discount;?></td>
		</tr>	
		<?php endif ?>
		<?php if ($core_settings->tax != "0"){ ?>
		<tr>
			<td colspan="5" align="right"><?=$this->lang->line('application_tax');?> (<?= $core_settings->tax?>%)</td>
			<td><?=$tax?></td>
		</tr>
		<?php } ?>
		<tr class="active">
			<td colspan="5" align="right"><?=$this->lang->line('application_total');?></td>
			<td> <?=$invoice->currency?> <?=$sum;?></td>
		</tr>
		</table>
		

		</div>

			<?php if($core_settings->paypal == "1" && $sum != "0.00" && empty($invoice->paid_date)){ ?><br/>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="business" value="<?=$core_settings->paypal_account;?>">
						<input type="hidden" name="item_name" value="<?=$invoice->reference;?>">
						<input type="hidden" name="item_number" value="<?=$invoice->reference;?>">
						<input type="hidden" name="image_url" value="<?=base_url()?><?=$core_settings->invoice_logo;?>">
						<input type="hidden" name="amount" value="<?=$sum;?>">
						<input type="hidden" name="no_shipping" value="1">
						<input type="hidden" name="no_note" value="1">
						<input type="hidden" name="currency_code" value="<?= $core_settings->paypal_currency;?>">
						<input type="hidden" name="bn" value="FC-BuyNow">
						<input type="submit" class="btn btn-primary pull-right" name="send" value="<?=$this->lang->line('application_pay_via_paypal');?>">
						<input type="hidden" name="return" value="<?=base_url()?>invoices/view/<?=$invoice->id;?>"> 
						<input type="hidden" name="cancel_return" value="<?=base_url()?>invoices/view/<?=$invoice->id;?>">
						<input type="hidden" name="rm" value="2">
						<input type="hidden" name="notify_url" value="<?=base_url()?>paypalipn" /> 
						<input type="hidden" name="custom" value="invoice-<?=$sum;?>">     
						</form>
						<?php } ?>	
<br clear="all">


	</div>