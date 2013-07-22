<div id="main">
<div id="options">
            <a href="<?php echo base_url();?>reports/edit_report/lift/<?php echo $this->uri->segment(4);?>" class="btn" data-toggle=""><i class="icon-edit"></i> Rediger Heisrapport</a>
            <a href="<?php echo base_url();?>reports/delete_report/lift/<?php echo $this->uri->segment(4);?>" class="btn btn-danger" data-toggle=""><i class="icon-trash"></i> Slett Heisrapport</a>

        
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
                            <li><span>Dato: </span><?php echo $liftreport[0]->datetime;?></li>
                            <li><span>Varslingstidspunkt: </span><?php echo $liftreport[0]->warning_time;?></li>
                            <li><span>Ankomstid: </span><?php echo $liftreport[0]->arrival_time;?></li>
                            <li><span>Avreisetid: </span><?php echo $liftreport[0]->depart_time;?></li>
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
            <li><div>Varslingsmåte/Hvem: </div><?php echo $liftreport[0]->warning_method;?></li>
            <li><div>Status ved ankomst: </div><?php echo $liftreport[0]->arrival_status;?></li>
            <li><div>Status ved avreise: </div><?php echo $liftreport[0]->depart_status;?></li>
            <li><div>Hva ble gjort: </div><?php echo $liftreport[0]->action_description;?></li>
            <li><div>Årsak til heisstans: </div><?php echo $liftreport[0]->cause_description;?></li>
            <li><div>Annet</div><?php echo $liftreport[0]->other_comments;?></li>
            
            <li>
            <div>Personer i heisen:</div><?php echo $liftreport[0]->person_lift;?>
            <div>Antall personer:</div><?php echo $liftreport[0]->person_lift_qty;?>
            </li>
            <li><div>Tilbakemelding gitt til innringer:</div><?php echo $liftreport[0]->contact_feedback;?></li>
        </ul>
            </div>
            </div>

             
    </div>