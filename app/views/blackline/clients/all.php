<div id="main">
		<div id="options">
			<a href="<?=base_url()?>clients/company/create" class="btn" data-toggle="modal"><i class="icon-plus-sign"></i> <?=$this->lang->line('application_add_new_company');?></a>
		</div>
		<div class="table_head"><h6><i class="icon-user"></i><?=$this->lang->line('application_companies');?></h6></div>
		<table class="data" id="clients" rel="<?=base_url()?>" cellspacing="0" cellpadding="0">
		<thead>
			
			<th class="hidden-phone" style="width:70px"><?=$this->lang->line('application_company_id');?></th>
            <th><?=$this->lang->line('application_object');?></th>
            <th><?=$this->lang->line('application_company_name');?></th>
			<th><?=$this->lang->line('application_primary_contact');?></th>
			<th  class="hidden-phone"><?=$this->lang->line('application_email');?></th>
			<th  class="hidden-phone"><?=$this->lang->line('application_organization_number');?></th>
			<th><?=$this->lang->line('application_action');?></th>
		</thead>
		<?php foreach ($companies as $value):?>

		<tr  id="<?=$value->id;?>" ><td class="hidden-phone" style="width:70px"><?php if(isset($value->reference)){ echo $value->reference;} ?></td>
			<td><span class="label label-active"><?php if(isset($value->catname)){echo $value->catname;}?></span></td>			
			<td><span class="label label-info"><?php if(isset($value->name)){echo $value->name;} else{echo $this->lang->line('application_no_company_assigned'); }?></span></td>
            
			<td><?php if(isset($value->client->firstname)){ echo $value->client->firstname.' '.$value->client->lastname;}else{ echo $this->lang->line('application_no_contact_assigned');} ?></td>
			<td class="hidden-phone"><?php if(isset($value->client->email)){ echo $value->client->email;}else{ echo $this->lang->line('application_no_contact_assigned');}?></td>
			<td  class="hidden-phone"><?php echo $value->website = empty($value->website) ? "-" : $value->website ?></td>
			<td class="option btn-group">
				<a class="btn btn-mini po" rel="popover" data-placement="left" data-content="<a class='btn btn-danger po-delete ajax-silent' href='<?=base_url()?>clients/company/delete/<?=$value->id;?>'><?=$this->lang->line('application_yes_im_sure');?></a> <button class='btn po-close'><?=$this->lang->line('application_no');?></button> <input type='hidden' name='td-id' class='id' value='<?=$value->id;?>'>" data-original-title="<b><?=$this->lang->line('application_really_delete');?></b>"><i class="icon-trash"></i></a>
				<a href="<?=base_url()?>clients/company/update/<?=$value->id;?>" class="btn btn-mini" data-toggle="modal"><i class="icon-edit"></i></a>
			</td>
		</tr>
		<?php endforeach;?>
	 	</table>
	 	<br clear="all">
		
	</div>