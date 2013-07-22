<div id="main">
		
		<div class="table_head"><h6><i class="icon-list-alt"></i><?=$this->lang->line('application_invoices');?></h6></div>
		<table class="data" id="cinvoices" rel="<?=base_url()?>" cellspacing="0" cellpadding="0">
		<thead>
			<th width="70px"><?=$this->lang->line('application_invoice_id');?></th>
			<th class="hidden-phone"><?=$this->lang->line('application_issue_date');?></th>
			<th class="hidden-phone"><?=$this->lang->line('application_due_date');?></th>
			<th><?=$this->lang->line('application_status');?></th>
		</thead>
		<?php foreach ($invoices as $value):?>

		<tr id="<?=$value->id;?>" >
			<td><?=$value->reference;?></td>
			<td class="hidden-phone"><span><?php $unix = human_to_unix($value->issue_date.' 00:00'); echo '<span class="hidden">'.$unix.'</span> ';  echo date($core_settings->date_format, $unix);?></span></td>
			<td class="hidden-phone"><span class="label <?php if($value->status == "Paid"){echo 'label-success';} if($value->due_date <= date('Y-m-d') && $value->status != "Paid"){ echo 'label-important tt" title="'.$this->lang->line('application_overdue'); } ?>"><?php $unix = human_to_unix($value->due_date.' 00:00'); echo '<span class="hidden">'.$unix.'</span> '; echo date($core_settings->date_format, $unix);?></span></td>
			<td><?php if($value->status == "Paid"){
				echo '<span class="label label-success">'.$this->lang->line('application_'.$value->status);
				}elseif($value->status == "Sent" || $value->status == "Open"){ 
					echo '<span class="label label-warning">'.$this->lang->line('application_open');
				} ?></span></td>
		</tr>

		<?php endforeach;?>
	 	</table>
	 	<br clear="all">
		
	</div>