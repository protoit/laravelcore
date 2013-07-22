<div id="main">
		<div id="options">
				<div class="btn-group margintop5 pull-right nav-tabs" data-toggle="buttons-radio">
				<?php foreach ($submenu as $name=>$value):?>
	                <a class="btn btn-mini" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$name?></a>
	            <?php endforeach;?>
	            
			</div>
			<script type="text/javascript">$(document).ready(function() { 
	            	$('.nav-tabs #<?php $last_uri = end(explode("/", uri_string())); if($val_id[count($val_id)-2] != "filter"){echo end($val_id);}else{ echo $last_uri;} ?>').button('toggle'); });
	        </script> 

		</div>
		<br>
		<div class="table_head"><h6><i class="icon-list-alt"></i><?=$this->lang->line('application_subscriptions');?></h6></div>
		<table class="data" id="csubscriptions" rel="<?=base_url()?>" cellspacing="0" cellpadding="0">
		<thead>
			<th class="hidden-phone" width="70px"><?=$this->lang->line('application_subscription_id');?></th>
			<th><?=$this->lang->line('application_client');?></th>
			<th class="hidden-phone"><?=$this->lang->line('application_issue_date');?></th>
			<th class="hidden-phone"><?=$this->lang->line('application_end_date');?></th>
			<th><?=$this->lang->line('application_next_payment');?></th>
			<th class="hidden-phone"><?=$this->lang->line('application_status');?></th>
		</thead>
		<?php foreach ($subscriptions as $value):?>

		<tr id="<?=$value->id;?>" >
			<td class="hidden-phone"><?=$value->reference;?></td>
			<td><span class="label label-info"><?php if(!isset($value->company->name)){echo $this->lang->line('application_no_client_assigned'); }else{ echo $value->company->name; }?></span></td>
			<td class="hidden-phone"><span><?php $unix = human_to_unix($value->issue_date.' 00:00'); echo '<span class="hidden">'.$unix.'</span> '; echo date($core_settings->date_format, $unix);?></span></td>
			<td><span class="label <?php if($value->status == "Active"){echo ' ';} if($value->end_date <= date('Y-m-d') && $value->status != "Inactive"){ echo ' label-success tt" title="'.$this->lang->line('application_subscription_has_ended'); } ?>"><?php $unix = human_to_unix($value->end_date.' 00:00'); echo '<span class="hidden">'.$unix.'</span> '; echo date($core_settings->date_format, $unix);?></span></td>
			<td class="hidden-phone"><span class="label <?php if($value->status == "Active" && $value->next_payment > date('Y-m-d')){echo 'label-success';} if($value->next_payment < date('Y-m-d') && $value->status != "Inactive" && $value->end_date > date('Y-m-d')){ echo 'label-important tt" title="'.$this->lang->line('application_new_invoice_required'); } ?>"><?php $unix = human_to_unix($value->next_payment.' 00:00'); echo '<span class="hidden">'.$unix.'</span> '; if($value->end_date < date('Y-m-d')){ echo "-";}else{echo date($core_settings->date_format, $unix);}?></span></td>
			<td><span class="label <?php if($value->status == "Active"){echo 'label-success';}else{echo "label-important";} ?>"><?php if($value->end_date <= date('Y-m-d') && $value->status != "Inactive"){ echo $this->lang->line('application_ended'); }else{ echo $this->lang->line('application_'.$value->status); } ?></span></td>
			</tr>

		<?php endforeach;?>
	 	</table>
	 	<br clear="all">
		
	</div>