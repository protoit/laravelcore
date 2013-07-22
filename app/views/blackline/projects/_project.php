<?php   
$attributes = array('class' => '', 'id' => '_project');
echo form_open($form_action, $attributes); 
if(isset($project)){ ?>
<input id="id" type="hidden" name="id" value="<?php echo $project->id; ?>" />
<?php } ?>
 <div class="modal-content">  
  <div class="modal-inner"> 

<input id="progress" type="hidden" name="progress" value="<?php if(isset($project)){echo $project->progress;}else{echo "0";} ?>" />
<p>
        <label for="reference"><?=$this->lang->line('application_reference_id');?> *</label>
        <input id="reference" type="text" name="reference" class="required span5"  value="<?php 
        
        if(isset($project)){echo $project->reference;} else{ echo $core_settings->project_reference;} ?>"   readonly="readonly"  />
</p>
<p>
        <label for="client"><?=$this->lang->line('application_client');?></label>
        <?php $options = array();
                $options['0'] = '-';
                foreach ($companies as $value):  
                $options[$value->id] = $value->name;
                endforeach;
        if(isset($project) && isset($project->company->id)){$client = $project->company->id;}else{$client = "";}
        echo form_dropdown('company_id', $options, $client, 'style="width:100%"');?>
</p>       
<p>
	<label for="progress"><?=$this->lang->line('application_progress');?>: <span id="pvalue"><?php if(isset($project)){echo $project->progress;}else{echo "0";} ?> %</span></label>
	<div id="slider-range-min"></div>
	<script>
	$(document).ready(function(){ 
	$( "#slider-range-min" ).slider( "option", "value", <?php if(isset($project)){echo $project->progress;}else{echo "0";} ?> );
	});
	</script>
</p>
<p> Calculate progress
        <div class="switch switch-mini" data-on-label="<i class='icon-ok icon-white'></i>" data-off-label="<i class='icon-remove'></i>">
           <input name="progress_calc" type="checkbox" value="1" <?php if(isset($project) && $project->progress_calc == "1"){ ?> checked="checked" <?php } ?>>
        </div>
</p>
<p>
        <label for="name"><?=$this->lang->line('application_name');?> *</label>
        <input id="name" type="text" name="name" class="required span5" value="<?php if(isset($project)){echo $project->name;} ?>"  />
</p>
<p>
        <label for="start"><?=$this->lang->line('application_start_date');?> *</label>
        <input id="start" type="text" name="start" class="required datepicker span5" value="<?php if(isset($project)){echo $project->start;} ?>" />
</p>
<p>
        <label for="end"><?=$this->lang->line('application_deadline');?> *</label>
        <input id="end" type="text" name="end" class="required datepicker span5" value="<?php if(isset($project)){echo $project->end;} ?>" />
</p>
<p>
        <label for="category"><?=$this->lang->line('application_category');?></label>
        <input id="category" type="text" name="category" class="span5" value="<?php if(isset($project)){echo $project->category;} ?>"  />
</p>
<p>
        <label for="phases"><?=$this->lang->line('application_phases');?> *</label>
        <input id="phases" type="text" name="phases" class="required span5" value="<?php if(isset($project)){echo $project->phases;}else{echo "Planning, Developing, Testing";} ?>" />
</p>
<p>
        <label for="description"><?=$this->lang->line('application_description');?></label>
        <textarea id="description" name="description" class="span5" rows="4"><?php if(isset($project)){echo $project->description;} ?></textarea>
</p>
         

</div>
        <div class="modal-footer">
        <input type="submit" name="send" class="btn btn-primary" value="<?=$this->lang->line('application_save');?>"/>
        <a class="btn" data-dismiss="modal"><?=$this->lang->line('application_close');?></a>
        </div>


<?php echo form_close(); ?>