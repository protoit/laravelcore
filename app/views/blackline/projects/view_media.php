<link href="<?=base_url()?>assets/blackline/css/video-js.css" rel="stylesheet">

<div id="main">

<div class="row">
	 <div class="span4">
	 	<div class="table_head"><h6><i class="icon-folder-open"></i> <?=$this->lang->line('application_media_details');?></h6></div>
		<div class="subcont">
			<ul class="details">
				<li><span><?=$this->lang->line('application_name');?>:</span> <?=$media->name;?></li>
				<li><span><?=$this->lang->line('application_filename');?>:</span> <?=$media->filename;?></li>
				<li><span><?=$this->lang->line('application_phase');?>:</span> <?=$media->phase;?></li>
				<li><span><?=$this->lang->line('application_uploaded_by');?>:</span> <a class="label label-info"><?php if(isset($media->user->firstname)){ ?><?=$media->user->firstname;?> <?=$media->user->lastname;?><?php }else{ ?> <?=$media->client->firstname;?> <?=$media->client->lastname;?><?php } ?></a></li>
				<li><span><?=$this->lang->line('application_uploaded_on');?>:</span> <?php $unix = human_to_unix($media->date); echo date($core_settings->date_format, $unix); ?></li>
				<li><span><?=$this->lang->line('application_download');?>:</span> <a href="<?=base_url()?>projects/download/<?=$media->id;?>" class="btn btn-small btn-success"><i class="icon-download icon-white"></i> <?=$this->lang->line('application_download');?></a></li>
				<?php if(!empty($media->description)){ ?><li><span><?=$this->lang->line('application_description');?></span><br><p class="margintop5"> <?=$media->description;?></p></li><?php } ?>
			</ul>
			<br clear="both">
	 </div>
	 <br>
	 <a class="btn btn-small" href="<?=base_url()?><?=$backlink;?>"><i class="icon icon-arrow-left"></i> <?=$this->lang->line('application_back_to_project');?></a>
	</div>
	 <div class="span8">
	 		 	
	 		<?php
				$type = explode('/', $media->type);
				switch($type[0]){
				case "image": ?>
					<div class="table_head"><h6><i class="icon-picture"></i><?=$this->lang->line('application_media_preview');?></h6></div>
					<div class="subcont preview">
					<div align="center">
						<img src="<?=base_url()?>files/media/<?=$media->savename;?>">
					</div>
					</div>
				<?php 
				break; 
				case "application":
					if($type[1] == "ogg"){ ?>
					<div class="table_head"><h6><i class="icon-facetime-video"></i><?=$this->lang->line('application_media_preview');?></h6></div>
					<div class="subcont preview">
					<video id="video" class="video-js vjs-default-skin" controls
				  		preload="auto" width="100%" height="350" data-setup="{}">
				  		<source src="<?=base_url()?>files/media/<?=$media->savename;?>" type='video/<?=$type[1];?>'>
					</video>
					</div>
					<?php } ?>
			<?php 
			break;
			} ?>
			  <div class="commentform">
			    <?php   
			    $attributes = array('class' => '', 'id' => 'view_media');
			    echo form_open($form_action, $attributes); 
			    ?>
			    <input id="timestamp" type="hidden" name="datetime" value="<?php echo $datetime; ?>" />
			    <textarea class="wysiwyg required span12" rows="6" name="text"></textarea>
				<button id="send" name="send" class="btn btn-primary btn-small"><?=$this->lang->line('application_post_message');?></button>
			    <?php echo form_close(); ?>

			  </div>

				<?php
			    $i = 0;
			    foreach ($media->messages as $value): 
			      $i = $i+1;
			  if($i == 1){ ?>
			  <hr>
			  <?php }
			  ?>	
			  <div class="message-content">
			 		<div class="message-header">
			 				<span class="label label-info"><?=$value->from;?></span>
				 			<span class="label"><?php  $unix = human_to_unix($value->datetime); echo date($core_settings->date_format.' '.$core_settings->date_time_format, $unix); ?></span>
			         <?php if($value->from == $this->user->firstname." ".$this->user->lastname || $this->user->admin == "1"){ ?>
			         <a href="<?=base_url()?>projects/deletemessage/<?=$media->project_id;?>/<?=$media->id;?>/<?=$value->id;?>" rel="" class="btn btn-mini pull-right btn-danger"><i class="icon-trash icon-white"></i></a>
			 		 <?php } ?>
			 		</div>
			 		<div class="message-body">
			 		<?=$value->text;?>
			 		</div>

			 	</div>

			  <?php endforeach;?>

	  </div>
	</div>
</div>