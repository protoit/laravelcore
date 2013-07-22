<div id="main">
<div id="options">
            <a href="<?php echo base_url();?>reports/edit_report/service/<?php echo $this->uri->segment(4);?>" class="btn"><i class="icon-edit"></i> Rediger Tjenesterapport</a>
            <a href="<?php echo base_url();?>reports/create_history_report/<?php echo $this->uri->segment(4);?>" class="btn" data-toggle="modal"><i class="icon-plus"></i> Skriv logg</a>
            <a href="<?php echo base_url();?>reports/delete_report/service/<?php echo $this->uri->segment(4);?>" class="btn btn-danger"><i class="icon-trash"></i> Slett Tjenesterapport</a>
            <!-- Approve is only for admins. Update record status to approved -->
            <a href="#" class="btn btn-success" data-toggle="modal"><i class="icon-ok"></i> Approve</a>

        
</div>
<hr>
        <div class="row">
            <div class="span6">
                <div class="table_head"><h6>Informasjon om kunde</h6></div>
                <div class="subcont">
                    <ul class="details">
                        <li><span>Navn:</span><?php echo $service_reports[0]->company_name;?></li>
                        <li><span>Adresse:</span><?php echo $service_reports[0]->company_address;?></li>
                        <li><span>Postnr:</span><?php echo $service_reports[0]->company_zipcode;?></li>
                        <li><span>By:</span><?php echo $service_reports[0]->company_city;?></li>
                    </ul>
                </div>
            </div>
            <div class="span6">
                <div class="table_head"><h6>Rapport Informasjon</h6></div>
                    <div class="subcont">
                        <ul class="details">
                            <li><span>Rapport Status: </span><?php echo $service_reports[0]->status;;?></li>
                            <li><span>Dato: </span><?php echo $service_reports[0]->datetime;;?></li>
                            <li><span>Fra Tid: </span><?php echo $service_reports[0]->start;;?></li>
                            <li><span>Til Tid: </span><?php echo $service_reports[0]->end;?></li>
                            <li></li>
                            <li><span>Rapport ID: </span><?php echo $service_reports[0]->id;?></li>
                            <li><span>Journal ID: </span><?php echo $service_reports[0]->shiftjournal_id;?></li>
                            <li><span>Objekt: </span><?php echo $service_reports[0]->object;?></li>
                            <li><span>Vedlegg: </span><?php echo $service_reports[0]->attachment_qty;?></li>
                            <li><span>Tjenestenr: </span><?php echo $service_reports[0]->tjenestenr;?></li>
                            <li></li>
                            <li><span>Godkjent av: </span><?php echo $service_reports[0]->approvedby;;?></li>
                            
                        </ul>
                    </div>
                </div>
            
        </div>
            <br/>
            <div class="row">
        <div class="table_head"><h6><?php echo $service_reports[0]->title;?></h6></div>
        <div class="subcont">
        <ul class="details">
            <li><?php echo $service_reports[0]->description;?></li>
            <li>&nbsp;</li>
        </ul>
        <?php if($files){ ?>
        <ul class="files details">
        <li><span>Files:</span></li>
			<?php foreach($files as $file){ ?>
                <li><span>Attachment:</span><span><?php echo $file->attachment_url;?></span><span><a target="_blank" class="btn btn-primary" href="<?php echo base_url();?>reports/file_download/<?php echo $file->id;?>">Download</a>&nbsp;&nbsp;<a class="btn btn-danger" href="<?php echo base_url();?>reports/file_delete/<?php echo $file->id;?>">Delete</a></span></li>
            <?php } ?>
        </ul>
        <?php } ?>
            </div>
            </div>
            
             <div class="table_head"><h6><i class="icon-list-alt"></i>History Service Reports</h6></div>
    	<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='data' id='reports' rel="#">
        <thead>
        <tr>
            <th width='1%'>ID</th>
            <th width='1%'>Date</th>
			<th width="1%">Tjenestenr</th>
            <th width="1%">Description</th>
            <th width='2%' style="text-align: center;">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php 
		if($history_reports)
		foreach($history_reports as $report){ ?>
        	<tr>
                <td width='1%'><?php echo $report->id;?></td>
                <td width='1%'><?php echo $report->datetime;?></td>
                <td width="1%"><?php echo $report->tjenestenr;?></td>
                <td width="1%"><?php echo $report->description;?></td>
                <td width='2%' style="text-align: center;">             
                <a class="btn btn-mini po" rel="popover" data-placement="left" data-content="<a class='btn btn-danger po-delete' href='<?php echo base_url();?>reports/delete_history_report/<?php echo $report->id;?>'>Ja, jeg er sikker!</a> <button class='btn po-close'>Nei</button> <input type='hidden' name='td-id' class='id' value='5'>" data-original-title="<b>Er du sikker?</b>"><i class="icon-trash"></i></a>
                    <a href="<?php echo base_url();?>reports/edit_history_report/<?php echo $report->id;?>" class="btn btn-mini" data-toggle="modal"><i class="icon-edit"></i></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
</div>