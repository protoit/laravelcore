<?php   
$attributes = array('class' => '', 'id' => '_media');
echo form_open_multipart($form_action, $attributes); 
?>
<?php if(isset($media)){ ?>
<input id="id" type="hidden" name="id" value="<?php echo $media->id; ?>" />
<?php } ?>
<input id="date" type="hidden" name="date" value="<?php echo $datetime; ?>" />
<div class="modal-content">  
<div class="modal-inner"> 
<p>
        <label for="name"><?=$this->lang->line('application_name');?> *</label>
        <input id="name" type="text" name="name" class="required span5" value="<?php if(isset($media)){echo $media->name;} ?>"  />
</p>
<p>
        <label for="description"><?=$this->lang->line('application_description');?></label>
        <input id="description" type="text" name="description" class="span5" value="<?php if(isset($media)){echo $media->description;} ?>"  />
</p>
<p>
        <label for="phase"><?=$this->lang->line('application_phase');?></label>
        <?php $options = explode(',', $project->phases); 
                $options2 = array();
                foreach ($options as $value): 
                $options2[$value] = $value;
                endforeach;
                $phase = FALSE;
                if(isset($media)){ $phase = $media->phase;} 
                echo form_dropdown('phase', $options2, $phase, 'style="width:100%"'); ?>
</p> 
<?php if(!isset($media)){ ?>
<p>
        <label for="userfile"><?=$this->lang->line('application_file');?></label>

      <input type="file" name="userfile" id="file">
      <div class="dummyfile">
         <div class="input-append">
              <input id="filename" type="text" class="input span4" name="file-name">
              <a id="fileselectbutton" class="btn"><?=$this->lang->line('application_select');?></a>
         </div>
    </div>

</p>

<?php } ?>  
</div>
        <div class="modal-footer">
        <input type="submit" id="send" name="send" class="btn btn-primary btn-loader" value="<?=$this->lang->line('application_save');?>"/>
        <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>

<?php echo form_close(); ?>