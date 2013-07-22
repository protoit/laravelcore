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
<div class="row">
		<div class="span12 marginbottom20">
		<div class="table_head"><h6><i class="icon-list"></i>Logs</h6><a href="<?=base_url()?>settings/logs" class="btn btn-mini pull-right"><i class="icon-refresh"></i> <?=$this->lang->line('application_refresh');?></a><a href="<?=base_url()?>settings/logs/clear" class="btn btn-mini pull-right"><i class="icon-trash"></i> <?=$this->lang->line('application_clear');?></a></div>
		<div class="subcont">
		<ul class="details span12">
			<?php foreach ($logs as $value) { $value = str_replace("ERROR -", '', $value); ?>
				<li><?=$value;?></li>
			<?php } ?>
			<?php if(empty($logs)){echo "<li>No log entrys yet</li>";}?>
			
		</ul>
		<br clear="all">
		</div>
		</div>
		</div>
