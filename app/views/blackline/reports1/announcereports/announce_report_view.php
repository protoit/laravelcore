<div id="main">
<div id="options">
            <a href="<?php echo base_url();?>reports/edit_report/announce/<?php echo $this->uri->segment(4);?>" class="btn" data-toggle=""><i class="icon-edit"></i> Rediger Anmeldelse</a>
            <a href="<?php echo base_url();?>reports/delete_report/announce/<?php echo $this->uri->segment(4);?>" class="btn btn-danger" data-toggle=""><i class="icon-trash"></i> Slett Anmeldelse</a>

        
</div>
<hr>
        <div class="row">
            <div class="span6">
                <div class="table_head"><h6>Informasjon om Fornærmedes/Skadelidtes</h6></div>
                <div class="subcont">
                    <ul class="details">
                        <li><span>Navn:</span><?php echo $announce_reports[0]->company_name;?></li>
                        <li><span>Org.nr:</span><?php echo $announce_reports[0]->organization_id;?></li>
                        <li><span>Adresse:</span><?php echo $announce_reports[0]->company_address;?></li>
                        <li><span>Postnr:</span><?php echo $announce_reports[0]->company_zipcode;?></li>
                        <li><span>By:</span><?php echo $announce_reports[0]->company_city;?></li>
                    </ul>
                </div>
            </div>
            <div class="span6">
                <div class="table_head"><h6>Rapport Informasjon</h6></div>
                    <div class="subcont">
                        <ul class="details">
                            <li><span>Dato &amp; Tid: </span><?php echo $announce_reports[0]->datetime;?></li>
                            <li></li>
                            <li><span>Anmeldelse ID: </span><?php echo $announce_reports[0]->id;?></li>
                            <li><span>Journal ID: </span><?php echo $announce_reports[0]->shiftjournal_id;?></li>
                            <li><span>Objekt: </span><?php echo $announce_reports[0]->object;?></li>
                            <li><span>Tjenestenr: </span><?php echo $announce_reports[0]->tjenestenr;?></li>  
                        </ul>
                    </div>
                </div>
            
        </div>
            <br/>
            <div class="row">
        <div class="table_head"><h6>Inforasjon om anmeldte</h6></div>
        <div class="subcont">
        <ul class="details">
            <li><span>Anmeldtes navn:</span><?php echo $announce_reports[0]->announce_name;?></li>
            <li><span>Anmeldtes adresse:</span><?php echo $announce_reports[0]->announce_address;?></li>
            <li><span>Anmeldtes postnr:</span><?php echo $announce_reports[0]->announce_zipcode;?></li>
            <li><span>Anmeldtes by:</span><?php echo $announce_reports[0]->announce_city;?></li>
            <li><span>Anmeldtes telefon:</span><?php echo $announce_reports[0]->announce_phone;?></li>
            <li><span>Legitimasjon (Type/Nummer):</span><?php echo $announce_reports[0]->announce_ident;?></li>
            <li><span>Fødselsnummer:</span><?php echo $announce_reports[0]->announce_birth;?></li>
            <li><span>Beskrivelse av anmeldte:</span><?php echo $announce_reports[0]->announce_description;?></li>
        </ul>
            </div>
        <div class="subcont">
        <ul class="details">
            <li><span>Verges navn:</span><?php echo $announce_reports[0]->parent_name;?></li>
            <li><span>Verges adresse:</span><?php echo $announce_reports[0]->parent_address;?></li>
            <li><span>Verges postnr:</span><?php echo $announce_reports[0]->parent_zipcode;?></li>
            <li><span>Verges by:</span><?php echo $announce_reports[0]->parent_city;?></li>
            <li><span>Verges telefon:</span><?php echo $announce_reports[0]->parent_phone;?></li>
        </ul>
            </div>
        <div class="subcont">
        <ul class="details">
            <li><span>Vitnes navn:</span><?php echo $announce_reports[0]->witness_name;?></li>
            <li><span>Vitnes adresse:</span><?php echo $announce_reports[0]->witness_address;?></li>
            <li><span>Vitnes postnr:</span><?php echo $announce_reports[0]->witness_zipcode;?></li>
            <li><span>Vitnes by:</span><?php echo $announce_reports[0]->witness_city;?></li>
            <li><span>Vitnes telefon:</span><?php echo $announce_reports[0]->witness_phone;?></li>
        </ul>
            </div>
        </div>
        <div class="row">
        <div class="table_head"><h6>Vare/Skade beskrivelse</h6></div>
        <div class="subcont">
        <ul class="details">
            <li><span>Hvor fant forholdet sted (Gateadresse):</span><?php echo $announce_reports[0]->action_where;?></li>
            <li><span>Når fant forholdet sted (Dato &amp; Tid):</span><?php echo $announce_reports[0]->action_datetime;?></li>
            <li><span>Forhold:</span><?php echo $announce_reports[0]->type;?></li>
            <li><span>Hvis forhold annet:</span><?php echo $announce_reports[0]->type_other;?></li>
            <li><span>Varer som er stjålet:</span><?php echo $announce_reports[0]->announce_item;?></li>
            <li><span>Verdi KR:</span><?php echo $announce_reports[0]->announce_item_value;?></li>
            <li><span>Total sum:</span><?php echo $announce_reports[0]->announce_item_sum;?></li>
            <li><span>Vare status:</span><?php echo $announce_reports[0]->announce_item_status;?></li>
            <li><span>Vare status (Hvis annet):</span><?php echo $announce_reports[0]->announce_item_status_other;?></li>
            <li><span>Anmeldte status:</span><?php echo $announce_reports[0]->announce_item_action;?></li>
            <li><span>Anmeldte status (Hvis annet):</span><?php echo $announce_reports[0]->announce_item_action_other;?></li>
        </ul>
            </div>
        </div>
        <div class="row">
        <div class="table_head"><h6>Kort angivelse:</div>
        <div class="subcont">
        <ul class="details">
            <li><span>Kort angivelse av hva som ble iaktatt av vitnet:</span><?php echo $announce_reports[0]->short_description;?></li>
        </ul>
            </div>
        </div>
</div>