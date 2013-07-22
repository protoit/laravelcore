<div id="main">
<div id="options">
        
            <?php if($this->user){ ?>
            <?php if(($id->tjenestenr==$liftreport[0]->tjenestenr) ||($id->admin)){ ?>
            <a href="<?php echo base_url();?>reports/edit_report/lift/<?php echo $this->uri->segment(4);?>" class="btn" data-toggle=""><i class="icon-edit"></i> Rediger Heisrapport</a>
            <a href="<?php echo base_url();?>reports/delete_report/lift/<?php echo $this->uri->segment(4);?>" class="btn btn-danger" data-toggle=""><i class="icon-trash"></i> Slett Heisrapport</a>
            <?php } ?>
            <?php } ?>
        
</div>
<hr>
        <div class="row">
            <div class="span6">
                <div class="table_head"><h6>Kundeinformasjon</h6></div>
                <div class="subcont">
                    <ul class="details">
                        <li><span><?php echo $liftreport[0]->object_name;?></span></li>
                        <li><span><?php echo $liftreport[0]->object_address;?></span></li>
                        <li><span><?php echo $liftreport[0]->object_zip . ", " . $liftreport[0]->object_city;?></span></li>
                    </ul>
                </div>
            </div>
            <div class="span6">
                <div class="table_head"><h6>Rapport Informasjon</h6></div>
                    <div class="subcont">
                        <ul class="details">
                            <li><span>Dato: </span><?php echo date("d/m/Y", strtotime($liftreport[0]->datetime))?></li>
                            <li><span>Varslingstidspunkt: </span><?php echo date("H:i", strtotime($liftreport[0]->warning_time))?></li>
                            <li><span>Ankomstid: </span><?php echo date("H:i", strtotime($liftreport[0]->arrival_time))?></li>
                            <li><span>Avreisetid: </span><?php echo date("H:i", strtotime($liftreport[0]->depart_time))?></li>
                            </br>
                            <li><span>Rapport ID: </span><?php echo $liftreport[0]->id;?></li>
                            <li><span>Journal ID: </span><?php echo $liftreport[0]->shiftjournal_id;?></li>
                            <li><span>Objekt: </span><?php echo $liftreport[0]->object_name;?></li>
                            <li><span>Tjenestenr: </span><?php echo $liftreport[0]->tjenestenr;?></li>
                        </ul>
                    </div>
                </div>
    </div>
            <br/>
            <div class="row">
        <div class="table_head"><h6>Beskrivelse</h6></div>
        <div class="subcont">
        <ul class="details">
            <li><div><strong>Bevokningsaddresse:</strong> </div><?php echo $liftreport[0]->location_name;?></li>
            <li><div><strong>Varslingsmåte/Hvem:</strong> </div><?php echo $liftreport[0]->warning_method;?></li>
            <li><div><strong>Status ved ankomst:</strong> </div><?php echo $liftreport[0]->arrival_status;?></li>
            <li><div><strong>Status ved avreise:</strong> </div><?php echo $liftreport[0]->depart_status;?></li>
            <li><div><strong>Hva ble gjort:</strong> </div><?php echo $liftreport[0]->action_description;?></li>
            <li><div><strong>Årsak til heisstans:</strong> </div><?php echo $liftreport[0]->cause_description;?></li>
            <li><div><strong>Annet</strong></div><?php echo $liftreport[0]->other_comments;?></li>
            
            <li>
            <div><strong>Personer i heisen:</strong></div><?php if($liftreport[0]->person_lift=="Yes") { echo $this->lang->line('application_yes');} elseif ($liftreport[0]->person_lift=="No") { echo $this->lang->line('application_no');} else {};?>
            <div><strong>Antall personer:</strong></div><?php echo $liftreport[0]->person_lift_qty;?>
            </li>
            <li><div><strong>Tilbakemelding gitt til innringer:</strong></div><?php if($liftreport[0]->contact_feedback=="Yes") { echo $this->lang->line('application_yes');} elseif ($liftreport[0]->contact_feedback=="No") { echo $this->lang->line('application_no');} else {};?></li>
        </ul>
            </div>
            </div>

             
    </div>