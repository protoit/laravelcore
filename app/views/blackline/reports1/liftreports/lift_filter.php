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
                <?php foreach($submenuactreport_lift as $name=>$value):
				$id=end(explode('/',$value));
				?>
                    <a class="btn btn-mini <?php if($id==$this->uri->segment(4)) echo 'active'; ?>" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$name?></a>
                <?php endforeach;?>
            </div>
    
    <div class="table_head"><h6><i class="icon-list-alt"></i>Lift Reports</h6></div>
    <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='data2' id='' rel="#">
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
                    <a href="<?php echo base_url();?>reports/view_report/lift/<?php echo $report->id;?>" class="btn btn-mini" data-toggle=""><i class="icon-cog"></i></a>
                    <div class="arrow"></div></td>
                </tr>
                
			<?php }	?>    
         </tbody>    
    </table>
                       
</div>