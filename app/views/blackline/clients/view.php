
<div id="main">
<div id="overview">
	<h2><?=$company->name;?></h2> 
</div>
		<div class="row">
		<div class="span12 marginbottom20">
		<div class="table_head"><h6><?=$this->lang->line('application_company_details');?></h6> <a href="<?=base_url()?>clients/company/update/<?=$company->id;?>/view" class="btn btn-mini pull-right" data-toggle="modal"><i class="icon-edit"></i> <?=$this->lang->line('application_edit');?></a></div>
		<div class="subcont">
		<ul class="details span6">
			<li><span><?=$this->lang->line('application_company_name');?>:</span> <?php echo $company->name = empty($company->name) ? "-" : $company->name; ?></li>
			<li><span><?=$this->lang->line('application_primary_contact');?>:</span> <?php if(isset($company->client->firstname)){ echo $company->client->firstname.' '.$company->client->lastname;}else{echo "-";} ?></li>
			<li><span><?=$this->lang->line('application_email');?>:</span> <?php if(isset($company->client->email)){ echo $company->client->email; }else{ echo "-"; } ?></li>
			<li><span><?=$this->lang->line('application_organization_number');?>:</span> <?php echo $company->website = empty($company->website) ? "-" : $company->website ?></li>
            <li><span><?=$this->lang->line('application_object');?>:</span> <?php echo $company->catname = empty($company->catname) ? "-" : $company->catname ?></li>
			<span class="visible-phone"></span>
		</ul>
		<ul class="details span6">
			<li><span><?=$this->lang->line('application_phone');?>:</span> <?php echo $company->phone = empty($company->phone) ? "-" : $company->phone; ?></li>
			<li><span><?=$this->lang->line('application_address');?>:</span> <?php echo $company->address = empty($company->address) ? "-" : $company->address; ?></li>
			<li><span><?=$this->lang->line('application_zip_code');?>:</span> <?php echo $company->zipcode = empty($company->zipcode) ? "-" : $company->zipcode; ?></li>
			<li><span><?=$this->lang->line('application_city');?>:</span> <?php echo $company->city = empty($company->city) ? "-" : $company->city; ?></li>

		</ul>
		<br clear="all">
		</div>
		</div>
		</div>
		
<div class="row">
	 	<div class="span12">
	 		<?php if(!isset($company->clients[0])){ ?><div class="alert alert-warning"><?=$this->lang->line('application_client_has_no_contacts');?> <a href="<?=base_url()?>clients/create/<?=$company->id;?>" data-toggle="modal"><?=$this->lang->line('application_add_new_contact');?></a></div>
	 		<?php } ?>
	 	<div class="data-table-marginbottom">

		<div class="table_head"><h6><i class="icon-user"></i><?=$this->lang->line('application_contacts');?></h6><a href="<?=base_url()?>clients/create/<?=$company->id;?>" class="btn btn-mini pull-right" data-toggle="modal"><i class="icon-plus-sign"></i> <?=$this->lang->line('application_add_new_contact');?></a></div>
		<table id="contacts" class="data-small" rel="<?=base_url()?>" cellspacing="0" cellpadding="0">
		<thead>
			<th style="width:10px"></th>
			<th><?=$this->lang->line('application_name');?></th>
			<th class="hidden-phone"><?=$this->lang->line('application_email');?></th>
			<th><?=$this->lang->line('application_phone');?></th>
			<th class="hidden-phone"><?=$this->lang->line('application_mobile');?></th>
			<th class="hidden-phone"><?=$this->lang->line('application_last_login');?></th>
			<th><?=$this->lang->line('application_action');?></th>
		</thead>
		<?php foreach ($company->clients as $value):?>

		<tr id="<?=$value->id;?>" >
			<td style="width:10px"><img class="minipic" src="
               <?php 
                if($value->userpic != 'no-pic.png'){
                  echo base_url()."files/media/".$value->userpic;
                }else{
                  echo get_gravatar($value->email, '20');
                }
                 ?>
                " /></td>
			<td><?=$value->firstname;?> <?=$value->lastname;?></td>
			<td class="hidden-phone"><?=$value->email;?></td>
			<td><?=$value->phone;?></td>
			<td class="hidden-phone"><?=$value->mobile;?></td>
			<td class="hidden-phone"><?php if(!empty($value->last_login)){ echo date($core_settings->date_format.' '.$core_settings->date_time_format, $value->last_login); } else{echo "-";} ?></td>
			<td class="option btn-group">
				<a  href="<?=base_url()?>clients/credentials/<?=$value->id;?>" class="btn btn-mini tt" title="<?=$this->lang->line('application_email_login_details');?>" data-toggle="modal"><i class="icon-envelope"></i></a>
				<a class="btn btn-mini po" rel="popover" data-placement="left" data-content="<a class='btn btn-danger po-delete ajax-silent' href='<?=base_url()?>clients/delete/<?=$value->id;?>'><?=$this->lang->line('application_yes_im_sure');?></a> <button class='btn po-close'><?=$this->lang->line('application_no');?></button> <input type='hidden' name='td-id' class='id' value='<?=$value->id;?>'>" data-original-title="<b><?=$this->lang->line('application_really_delete');?></b>"><i class="icon-trash"></i></a>
				<a href="<?=base_url()?>clients/update/<?=$value->id;?>" class="btn btn-mini" data-toggle="modal"><i class="icon-edit"></i></a>
			</td>
		</tr>

		<?php endforeach;?>
		</table>
		</div>
		</div>
</div>
		<div class="row">
	 	<div class="span6">
	 	<div class="data-table-marginbottom">

		<div class="table_head"><h6><i class="icon-briefcase"></i><?=$this->lang->line('application_projects');?></h6></div>
		<table id="projects" class="data-small" rel="<?=base_url()?>" cellspacing="0" cellpadding="0">
		<thead>
			<th class="hidden-phone" style="width:70px"><?=$this->lang->line('application_project_id');?></th>
			<th><?=$this->lang->line('application_name');?></th>
			<th><?=$this->lang->line('application_progress');?></th>
		</thead>
		<?php foreach ($company->projects as $value):?>

		<tr id="<?=$value->id;?>" >
			<td class="hidden-phone" style="width:70px"><?=$value->reference;?></td>
			<td><?=$value->name;?></td>
			<td>
				<div class="progress progress-striped active progress-medium tt <?php if($value->progress== "100"){ ?>progress-success<?php } ?>" title="<?=$value->progress;?>%">
                      <div class="bar" style="width:<?=$value->progress;?>%"></div>
                </div>
            </td>
		</tr>

		<?php endforeach;?>
		</table>
		</div>
		</div>

		<div class="span6">
	 	<div class="data-table-marginbottom">
		<div class="table_head"><h6><i class="icon-list-alt"></i><?=$this->lang->line('application_invoices');?></h6></div>
		<table id="invoices" class="data-small" rel="<?=base_url()?>" cellspacing="0" cellpadding="0">
		<thead>
			<th width="70px"><?=$this->lang->line('application_invoice_id');?></th>
			<th><?=$this->lang->line('application_issue_date');?></th>
			<th><?=$this->lang->line('application_due_date');?></th>
			<th><?=$this->lang->line('application_status');?></th>
		</thead>
		<?php foreach ($company->invoices as $value):?>

		<tr id="<?=$value->id;?>" >
			<td><?=$value->reference;?></td>
			<td><span class="label"><?php $unix = human_to_unix($value->issue_date.' 00:00'); echo date($core_settings->date_format, $unix);?></span></td>
			<td><span class="label <?php if($value->status == "Paid"){echo 'label-success';} if($value->due_date <= date('Y-m-d') && $value->status != "Paid"){ echo 'label-important tt" title="'.$this->lang->line('application_overdue'); } ?>"><?php $unix = human_to_unix($value->due_date.' 00:00'); echo date($core_settings->date_format, $unix);?></span></td>
			<td><span class="label <?php $unix = human_to_unix($value->sent_date.' 00:00'); if($value->status == "Paid"){echo 'label-success';}elseif($value->status == "Sent"){ echo 'label-warning tt" title="'.date($core_settings->date_format, $unix);} ?>"><?=$this->lang->line('application_'.$value->status);?></span></td>
		</tr>
		<?php endforeach;?>
		</table>
		</div>
		</div>
		</div>

	</div>