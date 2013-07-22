<div id="main">
<div class="visible-phone"><br/></div>
        <div id="options">
        <?php if($this->user){ ?>
            <?php
            foreach ($reports_create as $name=>$value):?>
                    <a class="btn" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><i class="icon-plus-sign"></i> <?=$name?></a>
            <?php endforeach;?>
            <?php } ?>
            
        </div>
        <br clear="all">
        <div class="btn-group margintop5 normal-white-space" data-toggle="buttons-radio">
                <?php foreach ($submenuactreport_service as $name=>$value):
				$id = end(explode('/',$value));
				?>
                    <a class="btn btn-mini <?php if($id==$this->uri->segment(4)) echo 'active';?>" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$name?></a>
                <?php endforeach;?>
            </div>
    
    <div class="table_head"><h6><i class="icon-list-alt"></i><? echo $this->lang->line('application_actreport');?>er</h6></div>
    	<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='data' id='reports' rel="#">
        <thead>
        <tr>
            <th width='1%'>ID</th>
            <th width='1%'><? echo $this->lang->line('application_date');?></th>
            <th width='1%'>Status</th>
            <th width='1%'><? echo $this->lang->line('application_time');?></th>
            <th width='1%'><? echo $this->lang->line('application_client');?></th>
            <th width='1%'>Tittel</th>
            <th width='1%'>Objekt</th>
            <th width="1%"><? echo $this->lang->line('application_employeeID');?></th>
            <th width="1%">Journal ID</th>
            <th width='2%' style="text-align: center;"><? echo $this->lang->line('application_action');?></th>
        </tr>
        </thead>
        <tbody>
        <?php
			if($service_reports)
			foreach($service_reports as $report){
			if($report->status=='deleted')
				continue;
                if((($report->status!='not_approve' && $report->status!='new') && ($report->company_name==$company_by_id)) || ($this->user)){		
				?>
				<tr id="<?=$report->id;?>">
                    <td><?php echo $report->id;?></td>
                    <td><?php echo date('d/m/Y',strtotime($report->datetime));?></td>
                    <td><span class="label label-<?php if($report->status == "new"){ echo "important"; } elseif($report->status == "not_approve") { echo "important"; } else{ echo "success"; } ?>"><?=$this->lang->line('application_'.$report->status);?></span></td>
                    <td><?php echo date('H:i',strtotime($report->start));;?> - <?php echo date('H:i',strtotime($report->end));?></td>
                    <td><?php echo $report->company_name;?></td>
                    <td><?php echo $report->title;?></td>
                    <td><?php echo $report->object;?></td>
                    <td><?php echo $report->tjenestenr;?></td>
                    <td><?php echo $report->shiftjournal_id;?></td>
                    <td class="option btn-group">
                    <?php if($this->user){ ?>
                    <?php if(($id->tjenestenr==$report->tjenestenr) || ($id->admin)){ ?>
                      <a class="btn btn-mini po" rel="popover" data-placement="left" data-content="<a class='btn btn-danger po-delete' href='<?php echo base_url();?>reports/delete_report/service/<?php echo $report->id;?>'>Ja, jeg er sikker!</a> <button class='btn po-close'>Nei</button> <input type='hidden' name='td-id' class='id' value='5'>" data-original-title="<b>Er du sikker?</b>"><i class="icon-trash"></i></a>
                    <a href="<?php echo base_url();?>reports/edit_report/service/<?php echo $report->id;?>" class="btn btn-mini" data-toggle=""><i class="icon-edit"></i></a>
                    <?php } ?>
                    <?php } ?>
                    <a href="#" class="btn btn-mini" data-toggle="" onclick="openBrWindow('<?php echo base_url();?>preview/service/<?php echo $report->id;?>','')"><i class="icon-print"></i></a>
                    <?php if($report->status=='approved') {} else {
                    if(@$this->user->admin) { ?>
                    <a href="<?php echo base_url();?>reports/approve_report/<?php echo $report->id;?>" class="btn btn-success btn-mini" data-toggle=""><i class="icon-ok-sign"></i></a> 
                    <? } ?>
                    <?php } ?>
                    <div class="arrow"></div>
                    <view href="<?php echo base_url();?>reports/view_report/service/<?php echo $report->id;?>"></view>
                    </td>
                </tr>
                
			<?php }
                }
            
            ?>        
        </tbody>
    </table>
    
    
    <br clear="all">
    
                       
</div>

<script>

function openBrWindow(theURL,winName) { //v2.0
  window.open(theURL,winName,'scrollbars=yes,width=800,height=700');
  return false;
}



$(document).ready(function() {
   
    $('#reports tr').click(function() {
       
		var href = $(this).find("view").attr("href");
	    if(href) {
            window.location = href;
        }
    });

});
</script>