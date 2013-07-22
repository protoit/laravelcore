
<div id="main">
	<div id="options">
			<a href="<?=base_url()?>projects/update/<?=$project->id;?>" class="btn" data-toggle="modal"><i class="icon-edit"></i> <?=$this->lang->line('application_edit_this_project');?></a>
			<?php if($project->sticky == 0){ ?>
				<a href="<?=base_url()?>projects/sticky/<?=$project->id;?>" class="btn"><i class="icon-star"></i> <?=$this->lang->line('application_add_to_quick_access');?></a>
			<?php }else{ ?>
				<a href="<?=base_url()?>projects/sticky/<?=$project->id;?>" class="btn hidden-phone"><i class="icon-star-empty"></i> <?=$this->lang->line('application_remove_from_quick_access');?></a>
			<?php } ?>

			<?php if(!empty($project->tracking)){ ?>
				<a href="<?=base_url()?>projects/tracking/<?=$project->id;?>" class="btn btn-danger pull-right"><i class="icon-time icon-white"></i> <?=$this->lang->line('application_stop_timer');?></a>
			<?php }else{ ?>
				<a href="<?=base_url()?>projects/tracking/<?=$project->id;?>" class="btn btn-success pull-right"><i class="icon-time icon-white"></i> <?=$this->lang->line('application_start_timer');?></a>
			<?php } ?>
		</div>
		<hr>
<div id="overview">
	<h2><?=$project->name;?> <small class="pull-right hidden-phone"><?=$this->lang->line('application_created_on');?> <?php  echo date($core_settings->date_format.' '.$core_settings->date_time_format, $project->datetime); ?></small> </h2> 
	<p><?=$project->description;?></p>
</div>
				<div class="progress progress-striped progress-small tt <?php if($progress == "100"){ ?>progress-success<?php } ?>" title="<?=$progress;?>%">
                      <div class="bar" style="width:<?=$progress;?>%"></div>
                </div>
    <div class="row">
	<div class="span12 marginbottom20">
		<div id="big_progress"><span style="width:<?=$project->progress;?>%" <?php if($project->progress== "100"){ ?>class="done"<?php } ?>></span></div>
		<div class="table_head"><h6><i class="icon-list-alt"></i> <?=$this->lang->line('application_project_details');?></h6></div>
		<div class="subcont">
			<ul class="details span6">
				<li><span><?=$this->lang->line('application_project_id');?>:</span> <?=$project->reference;?></li>
				<li><span><?=$this->lang->line('application_category');?>:</span> <?=$project->category;?></li>
				<li><span><?=$this->lang->line('application_client');?>:</span> <?php if(!isset($project->company->name)){ ?> <a href="#" class="label label-info"><?php echo $this->lang->line('application_no_client_assigned'); }else{ ?><a class="label" href="<?=base_url()?>clients/view/<?=$project->company->id;?>"><?php echo $project->company->name;} ?></a></li>
				<li><span><?=$this->lang->line('application_assigned_to');?>:</span> <?php foreach ($project->project_has_workers as $workers):?> <a class="label label-info"><?php echo $workers->user->firstname." ".$workers->user->lastname;?></a><?php endforeach;?> <a href="<?=base_url()?>projects/assign/<?=$project->id;?>" class="pull-right tt" title="<?=$this->lang->line('application_assign_to');?>" data-toggle="modal"><i class="icon-edit"></i></a></li>
				<span class="visible-phone"/></span>
			</ul>
			<ul class="details span6">
				<li><span><?=$this->lang->line('application_start_date');?>:</span> <?php  $unix = human_to_unix($project->start.' 00:00'); echo date($core_settings->date_format, $unix);?></li>
				<li><span><?=$this->lang->line('application_deadline');?>:</span> <?php  $unix = human_to_unix($project->end.' 00:00'); echo date($core_settings->date_format, $unix);?></li>
				<li><span><?=$this->lang->line('application_time_spent');?>:</span> <?=$time_spent;?> <a href="<?=base_url()?>projects/timer_reset/<?=$project->id;?>" class="tt" title="<?=$this->lang->line('application_reset_timer');?>"><i class="icon-refresh"></i></a></li>
			</ul>
			<br clear="both">
		</div>
	 </div>
	</div>
	<div class="row">
	 <div class="span6">
	 	<div class="data-table-marginbottom">
		<div class="table_head"><h6><i class="icon-comment"></i> <?=$this->lang->line('application_latest_media_comments');?></h6></div>
		<table id="media" class="data-small" rel="<?=base_url()?>projects/media/<?=$project->id;?>" cellspacing="0" cellpadding="0">
		<thead>
			<th><?=$this->lang->line('application_message');?></th>
			<th><?=$this->lang->line('application_from');?></th>
			<th><?=$this->lang->line('application_date');?></th>
		</thead>
		<?php foreach ($project->messages as $value):?>

		<tr id="<?=$value->media_id;?>" >
			<td><?=character_limiter(strip_tags($value->text), 25);?></td>
			<td><?=$value->from;?></td>
			<td><?php $unix = human_to_unix($value->datetime); echo date($core_settings->date_format.' '.$core_settings->date_time_format, $unix); ?></td>
		</tr>
		<?php endforeach;?>
		</table>


		</div>
		<div class="data-table-marginbottom">
				<div class="table_head"><h6><i class="icon-folder-open"></i><?=$this->lang->line('application_media');?></h6> <a href="<?=base_url()?>projects/media/<?=$project->id;?>/add" class="btn btn-mini pull-right" data-toggle="modal"><i class="icon-plus"></i> <?=$this->lang->line('application_add_media');?></a></div>
				<table class="data" id="media" rel="<?=base_url()?>projects/media/<?=$project->id;?>" cellspacing="0" cellpadding="0">
				<thead>
					<th  class="hidden"></th>
					<th><?=$this->lang->line('application_name');?></th>
					<th><?=$this->lang->line('application_filename');?></th>
					<th  class="hidden-phone"><?=$this->lang->line('application_phase');?></th>
					<th width="20px"><i class="icon-download"></i></th>
					<th><?=$this->lang->line('application_action');?></th>
				</thead>
				<?php foreach ($project->project_has_files as $value):?>

				<tr id="<?=$value->id;?>">
					<td class="hidden"><?=human_to_unix($value->date);?></td>
					<td><?=$value->name;?></td>
					<td><?=$value->filename;?></td>
					<td  class="hidden-phone"><?=$value->phase;?></td>
					<td align="center"><span class="label label-info tt" title="<?=$this->lang->line('application_download_counter');?>" ><?=$value->download_counter;?></span></td>
					<td class="option btn-group">
				<a class="btn btn-mini po" rel="popover" data-placement="left" data-content="<a class='btn btn-danger po-delete ajax-silent' href='<?=base_url()?>projects/media/<?=$project->id;?>/delete/<?=$value->id;?>'><?=$this->lang->line('application_yes_im_sure');?></a> <button class='btn po-close'><?=$this->lang->line('application_no');?></button> <input type='hidden' name='td-id' class='id' value='<?=$value->id;?>'>" data-original-title="<b><?=$this->lang->line('application_really_delete');?></b>"><i class="icon-trash"></i></a>
				<a href="<?=base_url()?>projects/media/<?=$project->id;?>/update/<?=$value->id;?>" class="btn btn-mini" data-toggle="modal"><i class="icon-edit"></i></a>
			</td>
				</tr>

				<?php endforeach;?>
			 	</table>
		</div>	

		</div>
	
	<div class="span6">
		<div class="table_head"><h6><i class="icon-tasks"></i> <?=$this->lang->line('application_tasks');?></h6><a href="<?=base_url()?>projects/tasks/<?=$project->id;?>/add" class="btn btn-mini pull-right" data-toggle="modal"><i class="icon-plus"></i> <?=$this->lang->line('application_add_task');?></a></div>
	    	<div class="subcont">
				<ul class="todo">
				<?php 
				$count = 0;
				foreach ($project->project_has_tasks as $value):  $count = $count+1; ?>

				    <li class="<?=$value->status;?>"><a href="<?=base_url()?>projects/tasks/<?=$project->id;?>/check/<?=$value->id;?>" class="ajax-silent task-check">
				    	<i class="icon-tick"></i></a><?=$value->name;?> 
				    	<a href="<?=base_url()?>projects/tasks/<?=$project->id;?>/update/<?=$value->id;?>" class="pull-right" data-toggle="modal"><i class="icon-edit"></i></a>
				    	<?php if ($value->public != 0) {  ?>
				    		<a class="pull-right"><i class="icon-eye-open tt" title="<?=$this->lang->line('application_task_public');?>"></i></a>
				    	<?php } ?>
				    	<?php if ($value->user_id != 0) {  ?>
				    		<span class="label label-info pull-right margin5"><?=$value->user->firstname;?> <?=$value->user->lastname;?></span>
				    	<?php } ?>
					</li>
				 <?php endforeach;?>
				 <?php if($count == 0) { ?>
					<li class="notask">No Tasks yet</li>
				 <?php } ?>
				 </ul>
			</div>
			</div>
		</div>	 
			<br>
	    <div class="row">
			
		</div>

	</div>