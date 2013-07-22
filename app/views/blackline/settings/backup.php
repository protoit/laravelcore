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
	        <hr>
		</div>	
		<div class="table_head"><h6><i class="icon-download"></i><?=$this->lang->line('application_database_backups');?></h6> <a href="mysql_restore" class="btn btn-mini pull-right" data-toggle="modal"><i class="icon icon-upload"></i> <?=$this->lang->line('application_restore_database');?></a><a href="<?=base_url()?>settings/mysql_backup" class="btn btn-mini pull-right"><i class="icon-download"></i> <?=$this->lang->line('application_backup_database');?></a></div>
		<table id="backup" class="data" cellspacing="0" cellpadding="0">
		<thead>
			<th><?=$this->lang->line('application_date');?></th>
			<th><?=$this->lang->line('application_info');?></th>
			<th><?=$this->lang->line('application_action');?></th>
		</thead>
		<?php if(isset($backups)){
		foreach ($backups as $file):
		 $filename = explode("_", $file);
		?>

		<tr>
			<td><?php echo str_replace('.zip', '', $filename[1]);?> <?php echo str_replace('.zip', '', $filename[2]);?></td>
			<td><?php echo str_replace('-', ' ', $filename[0]);?></td>
			<td class="option" style="width:125px">
				<a class="btn btn-mini" href="mysql_download/<?=$file?>"><?=$this->lang->line('application_download');?></a>
			</td>
		</tr>

		<?php endforeach; 
		}else{ ?>
		<tr>
			<td colspan="4"><?=$this->lang->line('application_no_backups');?></td>
		</tr> 
		<?php } ?>
	 	</table>
	 	<br clear="all">
	</div>