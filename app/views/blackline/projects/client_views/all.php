<div id="main">
		
		<div class="table_head"><h6><i class="icon-briefcase"></i><?=$this->lang->line('application_cprojects');?></h6></div>
		<table class="data" id="cprojects" rel="<?=base_url()?>" cellspacing="0" cellpadding="0">
		<thead>
			<th class="hidden-phone" style="width:70px"><?=$this->lang->line('application_project_id');?></th>
			<th><?=$this->lang->line('application_name');?></th>
			<th><?=$this->lang->line('application_client');?></th>
			<th  class="hidden-phone"><?=$this->lang->line('application_deadline');?></th>
			<th  class="hidden-phone" width="20%"><?=$this->lang->line('application_progress');?></th>
		</thead>
		<?php foreach ($project as $value):?>

		<tr id="<?=$value->id;?>" >
			<td  class="hidden-phone" style="width:70px"><?=$value->reference;?></td>
			<td><?=$value->name;?></td>
			<td><span class="label label-info"><?php if(!isset($value->company->name)){echo $this->lang->line('application_no_client_assigned'); }else{ echo $value->company->name; }?></span></td>
			<td  class="hidden-phone"><span class="label <?php if($value->end <= date('Y-m-d') && $value->progress != 100){ echo 'label-important tt" title="'.$this->lang->line('application_overdue'); } ?>"><?php $unix = human_to_unix($value->end.' 00:00');echo '<span class="hidden">'.$unix.'</span> '; echo date($core_settings->date_format, $unix);?></span></td>
			<td  class="hidden-phone">
				<div class="progress progress-striped active progress-medium tt <?php if($value->progress== "100"){ ?>progress-success<?php } ?>" title="<?=$value->progress;?>%">
                      <div class="bar" style="width:<?=$value->progress;?>%"></div>
                </div>
            </td>
		</tr>

		<?php endforeach;?>
	 	</table>
	 	<br clear="all">
		
	</div>