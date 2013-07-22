	<div id="main">
		<div id="options">
			<div class="btn-group margintop5 nav-tabs normal-white-space" data-toggle="buttons-radio">
				<?php foreach ($submenu as $name=>$value):?>
	                <a class="btn btn-mini" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$name?></a>
	            <?php endforeach;?>
	            
			</div>
			<script type="text/javascript">$(document).ready(function() { 
	            	$('.nav-tabs #<?php $last_uri = end(explode("/", uri_string())); if($val_id[count($val_id)-2] != "settings"){echo end($val_id);}else{ echo $last_uri;} ?>').button('toggle'); });
	        </script> 

		</div>
		<hr/>
		<div class="table_head"><h6><?=$this->lang->line('application_cronjob');?> <?=$this->lang->line('application_settings');?></h6></div>
		<?php   
		$attributes = array('class' => '', 'id' => 'cronjob');
		echo form_open_multipart($form_action, $attributes); 
		?>
		<table id="settings" cellspacing="0" cellpadding="0">
		<thead>
			<th><?=$this->lang->line('application_option');?></th>
			<th><?=$this->lang->line('application_value');?></th>
		</thead>

		<tr>
		<td><?=$this->lang->line('application_cronjob_active');?> <a class="cursor po pull-right" rel="popover" data-content="<?=$this->lang->line('application_cronjob_help');?>" data-original-title="<?=$this->lang->line('application_cronjob');?>"><i class="fam-information"></i></td>
		<td> <div class="switch switch-mini" data-on-label="<i class='icon-ok icon-white'></i>" data-off-label="<i class='icon-remove'></i>">
            <input name="cronjob" type="checkbox" value="1" <?php if($settings->cronjob == "1"){ ?> checked="checked" <?php } ?>>
        </div>
		</td>
		</tr>
		

		<tr>
		<td><?=$this->lang->line('application_autobackup');?> <a class="cursor po pull-right" rel="popover" data-content="<?=$this->lang->line('application_autobackup_help');?>" data-original-title="<?=$this->lang->line('application_autobackup');?>"><i class="fam-information"></i></td>
		<td> <div class="switch switch-mini" data-on-label="<i class='icon-ok icon-white'></i>" data-off-label="<i class='icon-remove'></i>">
            <input name="autobackup" type="checkbox" value="1" <?php if($settings->autobackup == "1"){ ?> checked="checked" <?php } ?>>
        </div>
		</td>
		</tr>
		<tr>
			<td><?=$this->lang->line('application_cronjob_address');?>  <a class="cursor po pull-right" rel="popover" data-content="<?=$this->lang->line('application_cronjob_address_help');?>" data-original-title="<?=$this->lang->line('application_cronjob_address');?>"><i class="fam-information"></i></td>
			<td><?=base_url()?>cronjob</td>
		</tr>
		<tr>
			<td><?=$this->lang->line('application_last_cronjob_run');?></td>
			<td><?php if(!empty($settings->last_cronjob)){echo date("Y-m-d H:i", $settings->last_cronjob); }else {echo "-";}?></td>
		</tr>
		<tr>
			<td class="bottom" colspan="2">
			 <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
			</td>
		</tr>
	 	</table>
	 	 
		<?php echo form_close(); ?>
	

	</div>