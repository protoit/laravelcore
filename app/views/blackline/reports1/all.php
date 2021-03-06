<div id="main">
<div class="visible-phone"><br/></div>
        <div id="options">
        	<?php
			foreach ($reports_create as $name=>$value):?>
                    <a class="btn" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><i class="icon-plus-sign"></i> <?=$name?></a>
			<?php endforeach;?>
            
        </div>
        <br clear="all">
        <div class="btn-group margintop5 normal-white-space" data-toggle="buttons-radio">
                <?php $count = 0; foreach ($submenuactreport_service as $name=>$value):?>
                    <a class="btn btn-mini <?php if($count==0) { echo 'active'; $count++; }?>" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$name?></a>
                <?php endforeach;?>
            </div>
    
    <div class="table_head"><h6><i class="icon-list-alt"></i>Service Reports</h6></div>
    	<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='data' id='reports' rel="#">
        <thead>
        <tr>
            <th width='1%'>ID</th>
            <th width='1%'>Date</th>
            <th width='1%'>Status</th>
            <th width='1%'>Start & End</th>
            <th width='1%'>Company name</th>
            <th width='1%'>Object</th>
			<th width="1%">Tjenestenr</th>
            <th width="1%">Shiftjournal ID</th>
            <th width='2%' style="text-align: center;">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
			if($service_reports)
			foreach($service_reports as $report){
			if($report->status=='deleted')
				continue;	
				 ?>
				<tr id="<?php echo $report->id;?>">
                    <td><?php echo $report->id;?></td>
                    <td><?php echo date('d/m/Y',strtotime($report->datetime));?></td>
                    <td><?php echo $report->status;?></td>
                    <td><?php echo $report->start;?> - <?php echo $report->end;?></td>
                    <td><?php echo $report->company_name;?></td>
                    <td><?php echo $report->object;?></td>
                    <td><?php echo $report->tjenestenr;?></td>
                    <td><?php echo $report->shiftjournal_id;?></td>
                    <td>
                      <a class="btn btn-mini po" rel="popover" data-placement="left" data-content="<a class='btn btn-danger po-delete' href='<?php echo base_url();?>reports/delete_report/service/<?php echo $report->id;?>'>Ja, jeg er sikker!</a> <button class='btn po-close'>Nei</button> <input type='hidden' name='td-id' class='id' value='5'>" data-original-title="<b>Er du sikker?</b>"><i class="icon-trash"></i></a>
                    <a href="<?php echo base_url();?>reports/edit_report/service/<?php echo $report->id;?>" class="btn btn-mini" data-toggle=""><i class="icon-edit"></i></a>
                    <!--<a href="<?php echo base_url();?>reports/view_report/service/<?php echo $report->id;?>" class="btn btn-mini" data-toggle=""><i class="icon-cog"></i></a>-->
                    <div class="arrow"></div><view href="<?php echo base_url();?>reports/view_report/service/<?php echo $report->id;?>"></view></td>
                </tr>
                
			<?php }	?>        
        </tbody>
    </table>
    
    
    <br clear="all">
        <div class="btn-group margintop5 normal-white-space" data-toggle="buttons-radio">
                <?php $count=0; foreach ($submenuactreport_announce as $name=>$value):?>
                    <a class="btn btn-mini <?php if($count==0) { echo 'active'; $count++; }?>" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$name?></a>
                <?php endforeach;?>
            </div>
            
     
    <div class="table_head"><h6><i class="icon-list-alt"></i>Announce Reports</h6></div>
    <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='data2' id='reports' rel="#">
        <thead>
        <tr>
            <th width='1%'>ID</th>
            <th width='1%'>Date</th>
            <th width='1%'>Company name</th>
            <th width='1%'>Object</th>
			<th width="1%">Tjenestenr</th>
            <th width="1%">Shiftjournal ID</th>
            <th width='2%' style="text-align: center;">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
			if($announce_reports)
			foreach($announce_reports as $report){ ?>
				<tr>
                    <td><?php echo $report->id;?></td>
                    <td><?php echo date('d/m/Y',strtotime($report->datetime));?></td>
                    <td><?php echo $report->company_name;?></td>
                    <td><?php echo $report->object;?></td>
                    <td><?php echo $report->tjenestenr;?></td>
                    <td><?php echo $report->shiftjournal_id;?></td>
                    <td>
                     <a class="btn btn-mini po" rel="popover" data-placement="left" data-content="<a class='btn btn-danger po-delete' href='<?php echo base_url();?>reports/delete_report/announce/<?php echo $report->id;?>'>Ja, jeg er sikker!</a> <button class='btn po-close'>Nei</button> <input type='hidden' name='td-id' class='id' value='5'>" data-original-title="<b>Er du sikker?</b>"><i class="icon-trash"></i></a>
                    <a href="<?php echo base_url();?>reports/edit_report/announce/<?php echo $report->id;?>" class="btn btn-mini" data-toggle=""><i class="icon-edit"></i></a>
                    <!--<a href="<?php echo base_url();?>reports/view_report/announce/<?php echo $report->id;?>" class="btn btn-mini" data-toggle=""><i class="icon-cog"></i></a>-->
                    <view href="<?php echo base_url();?>reports/view_report/announce/<?php echo $report->id;?>"></view>
                    <div class="arrow"></div></td>
                </tr>
                
			<?php }	?>    
     </tbody>   
    </table>
    
    
    
    <br clear="all">
        <div class="btn-group margintop5 normal-white-space" data-toggle="buttons-radio">
                <?php $count=0; foreach($submenuactreport_lift as $name=>$value):?>
                    <a class="btn btn-mini <?php if($count==0) { echo 'active'; $count++; }?>" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$name?></a>
                <?php endforeach;?>
            </div>
    
    <div class="table_head"><h6><i class="icon-list-alt"></i>Lift Reports</h6></div>
    <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='data2' id='reports2' rel="#">
    	<thead>
        <tr>
            <th width='1%'>ID</th>
            <th width='1%'>Date</th>
            <th width='1%'>Object</th>
			<th width="1%">Tjenestenr</th>
            <th width="1%">Shiftjournal ID</th>
            <th width='2%' style="text-align: center;">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
			if($lift_reports)
			foreach($lift_reports as $report){ ?>
				<tr>
                    <td><?php echo $report->id;?></td>
                    <td><?php echo date('d/m/Y',strtotime($report->datetime));?></td>
                    <td><?php echo $report->object_name;?></td>
                    <td><?php echo $report->tjenestenr;?></td>
                    <td><?php echo $report->shiftjournal_id;?></td>
                    <td>
                    <a class="btn btn-mini po" rel="popover" data-placement="left" data-content="<a class='btn btn-danger po-delete' href='<?php echo base_url();?>reports/delete_report/lift/<?php echo $report->id;?>'>Ja, jeg er sikker!</a> <button class='btn po-close'>Nei</button> <input type='hidden' name='td-id' class='id' value='5'>" data-original-title="<b>Er du sikker?</b>"><i class="icon-trash"></i></a>
                    <a href="<?php echo base_url();?>reports/edit_report/lift/<?php echo $report->id;?>" class="btn btn-mini" data-toggle=""><i class="icon-edit"></i></a>
                    <!--<a href="<?php echo base_url();?>reports/view_report/lift/<?php echo $report->id;?>" class="btn btn-mini" data-toggle=""><i class="icon-cog"></i></a>-->
                    <view href="<?php echo base_url();?>reports/view_report/lift/<?php echo $report->id;?>"></view>
                    <div class="arrow"></div></td>
                </tr>
                
			<?php }	?>    
         </tbody>    
    </table>
                       
</div>

<script>
$(document).ready(function() {
   
    $('#reports tr').click(function() {
       
		var href = $(this).find("view").attr("href");
	    if(href) {
            window.location = href;
        }
    });
	
	 $('.data2 tr').click(function() {
       
		var href = $(this).find("view").attr("href");
	    if(href) {
            window.location = href;
        }
    });
	
	 $('#reports2 tr').click(function() {
       
		var href = $(this).find("view").attr("href");
	    if(href) {
            window.location = href;
        }
    });

});
</script>