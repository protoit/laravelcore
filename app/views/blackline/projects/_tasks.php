<?php   
$attributes = array('class' => 'ajaxform', 'id' => '_task');
echo form_open($form_action, $attributes); 
$public = "0";
?>
<div class="modal-content">  
<div class="modal-inner"> 
<?php if(isset($task)){ $public = $task->public; ?>
  <input id="id" type="hidden" name="id" value="<?php echo $task->id; ?>" />
<?php } ?>
<p>
        <label for="name"><?=$this->lang->line('application_task_name');?> *</label>
        <input id="name" type="text" name="name" class="required span5 resetvalue" value="<?php if(isset($task)){echo $task->name;} ?>"  />
</p>
<p>
        <label for="status"><?=$this->lang->line('application_status');?></label>
        <?php $options = array(
                  'open'  => $this->lang->line('application_open'),
                  'done'    => $this->lang->line('application_done'),
                );
                $status = FALSE;
                if(isset($task)){ $status = $task->status;} 
                echo form_dropdown('status', $options, $status, 'style="width:100%"'); ?>
</p>  
<p>
        <label for="user"><?=$this->lang->line('application_assign_to');?></label>
        <?php $users = array();
                $users['0'] = '-';
                 foreach ($project->project_has_workers as $workers):
                    $users[$workers->user_id] = $workers->user->firstname.' '.$workers->user->lastname;
                endforeach;
        if(isset($task)){$user = $task->user_id;}else{$user = "";}
        echo form_dropdown('user_id', $users, $user, 'style="width:100%"');?>
</p>      
<p>
        <label for="name"><?=$this->lang->line('application_task_public');?></label>
        <div class="switch switch-mini" data-on-label="<i class='icon-ok icon-white'></i>" data-off-label="<i class='icon-remove'></i>">
            <input name="public" type="checkbox" value="1" <?php if($public == "1"){ ?> checked="checked" <?php } ?>>
        </div>
</p>
</div>
        <div class="modal-footer">
          <?php if(isset($task)){ ?>
            <a href="<?=base_url()?>projects/tasks/<?=$task->project_id;?>/delete/<?=$task->id;?>" class="btn btn-danger pull-left" ><?=$this->lang->line('application_delete');?></a>
          <?php }else{ ?>
        <i class="icon-loader-black" style="display:none"></i>
        <input type="submit" id="send" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save_and_add');?>"/>
        <?php } ?>
        <input type="submit" name="send" class="btn" value="<?=$this->lang->line('application_save');?>"/>
        </div>
<?php echo form_close(); ?>