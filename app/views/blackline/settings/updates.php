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
		<div class='alert'><?=$this->lang->line('application_always_make_backup');?></div>
		<div class="table_head"><h6><i class="icon-download"></i><?=$this->lang->line('application_system_updates');?></h6> <a href="<?=base_url()?>settings/updates" class="btn btn-mini pull-right"><i class="icon-refresh"></i> <?=$this->lang->line('application_check_for_updates');?></a><a href="<?=base_url()?>settings/mysql_backup" class="btn btn-mini pull-right"><i class="icon-download-alt"></i> <?=$this->lang->line('application_backup_database');?></a></div>
		<table id="updates" cellspacing="0" cellpadding="0">
		<thead>
			<th><?=$this->lang->line('application_update');?></th>
			<th><?=$this->lang->line('application_release_date');?></th>
			<th><?=$this->lang->line('application_info');?></th>
			<th><?=$this->lang->line('application_action');?></th>
		</thead>
		<?php  $first = FALSE;
		foreach ($lists as $key => $file):
		 if($file->version > $core_settings->version){
		?>

		<tr>
			<td><?php echo "Core ".$file->version;?></td>
			<td><?=$file->date;?></td>
			<td><a href="#" class="po" rel="popover" data-placement="top" data-content="<?=$file->changelog;?>" data-original-title="Update <?=$file->version;?>"><?=$this->lang->line('application_view_changelog');?></a></td>
			
			<td class="option btn-group">
				<?php if($first){echo $this->lang->line('application_previous_update_required');}else{ ?>
				<a <?php if(in_array($file->file, $downloaded_updates)){echo 'class="btn btn-mini disabled"';}else{ echo 'href="update_download/'.$file->file.'" class="btn btn-mini"';} ?>><?=$this->lang->line('application_download');?></a>
				<a <?php if(in_array($file->file, $downloaded_updates)){echo 'href="update_install/'.$file->file.'/'.$file->version.'" class="btn btn-mini"';}else{ echo 'class="btn btn-mini disabled"';} ?>><?=$this->lang->line('application_install');?></a>
				<?php } ?>
			</td>
		</tr>

		<?php $first = TRUE; } endforeach; 
		if(!$first){ ?>
		<tr>
			<td colspan="4"><?=$this->lang->line('application_system_up_to_date');?></td>
		</tr> 
		<?php } ?>
	 	</table>
	 	<br clear="all">
	</div>