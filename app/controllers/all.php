<div id="main">
        <div class="stats-frame">
      <?php
      if(isset($_POST['add']))
      { 
        //Block 2
        $tjenestenr = $_POST['tjenestenr'];
        $datetime = $_POST['datetime'];
        $calling = $_POST['calling'];
        $object = $_POST['object'];
        $company = $_POST['company'];
        $taskcode = $_POST['taskcode'];
        $qty = $_POST['qty'];
        $description = $_POST['description'];

        //Block 4
        $sql = "INSERT INTO shiftjournal (tjenestenr, datetime, calling, object, company, taskcode, qty, description)
        VALUES ('$tjenestenr','$datetime','$calling','$object','$company','$taskcode','$qty', '$description')";
        mysql_set_charset('utf8');
        //Block 5
        $res = mysql_query($sql);
        }

        ?>

        <div class="table_head"><h6><i class="icon-list-alt"></i><?=$this->lang->line('application_shiftjournal');?></h6></div>
        <form action="<?php $_PHP_SELF ?>" method="post">
        <table>
        <thead>
        <th style="width: 80px"><label style="width: 80px;">Tjenestenr</label></th>
        <th style="width: 150px"><label style="width: 150px">Tid & Dato</label></th>
        <th style="width: 150px"><label style="width: 150px">Tilkalling</label></th>
        <th style="width: 150px"><label style="width: 150px">Objekt</label></th>
        <th style="width: 150px"><label style="width: 150px">Sted</label></th>
        <th style="width: 170px"><label style="width: 170px">Oppgavekode</label></th>
        <th style="width: 30px"><label style="width: 30px">Antall</label></th>
        <th><label>Beskrivelse</label></th>
        <th><label>Valg</label></th>
        </thead>
        
        <td style="width: 80px;"><input style="width: 80px;" class="required span5" type="text" name="tjenestenr" id="tjenestenr" value="<?php echo $this->user->tjenestenr; ?>" readonly="readonly" /></td>
        <?php 
        $dato = date('d/m/Y H:i:s');

        $dato = str_replace ( 'Monday', 'Mandag', $dato );
        $dato = str_replace ( 'Tuesday', 'Tirsdag', $dato );
        $dato = str_replace ( 'Wednesday', 'Onsdag', $dato );
        $dato = str_replace ( 'Thursday', 'Torsdag', $dato );
        $dato = str_replace ( 'Friday', 'Fredag', $dato );
        $dato = str_replace ( 'Saturday', 'Lørdag', $dato );
        $dato = str_replace ( 'Sunday', 'Søndag', $dato );  
        $dato = str_replace ( 'January', 'Januar', $dato );
        $dato = str_replace ( 'February', 'Februar', $dato );
        $dato = str_replace ( 'March', 'Mars', $dato );
        $dato = str_replace ( 'April', 'April', $dato );
        $dato = str_replace ( 'May', 'Mai', $dato );
        $dato = str_replace ( 'June', 'Juni', $dato );
        $dato = str_replace ( 'July', 'Juli', $dato );
        $dato = str_replace ( 'August', 'August', $dato );
        $dato = str_replace ( 'September', 'September', $dato );
        $dato = str_replace ( 'October', 'Oktober', $dato );
        $dato = str_replace ( 'November', 'November', $dato );
        $dato = str_replace ( 'December', 'Desember', $dato );
        ?>
        <td style="width: 150px"><input style="width: 150px" id="datetime" name="datetime" value="<?php echo $dato; ?>" type="text"></td>
        <td style="width: 150px"><select style="width: 150px" name="calling" id="calling">
        <option>Annet</option>
        <option>Alarm</option>
        <option>Service</option>
        </select></td>
        <td style="width: 150px">
        <select style="width: 150px" class="element text small" style="width: 225px;" id="object" name="object">
        <?php   
                $query = $this->db->get('objectcat');
                foreach ($query->result() as $row)
                {
                echo "<option>" . $row->catname_has_items . "</option>";
                }
        ?>          
        </select></td>
        
        <td style="width: 150px"><select style="width: 150px;" id="company" name="company">
        <?php
                $sql = "SELECT name FROM companies WHERE catname = 'Grønlandstorg' ORDER BY name ASC";
                $result = mysql_query($sql); 
                if (!$result) 
                echo mysql_error(); 
         
                    while($row = mysql_fetch_array($result)){
                    $shiftjournaltype = $row[name];
                    echo "<option>" . $shiftjournaltype . "</option>";
                    }
                    ?> 
                    
        </select></td>
        
        <td><select class="element text small" style="width: 225px;" id="taskcode" name="taskcode">
        <?php
             
                $query = $this->db->get('shiftjournalcode');
                foreach ($query->result() as $row)
                {
                echo "<option>" . $row->codedescription . "</option>";
                } 
        ?> 
                    
        </select>
        </td>
        
        <td><input class="element text small" id="qty" name="qty" style="width: 25px;" value="1" type="text"/>
        </td>
        <td>
        <textarea style="height: 80px; width: 350px;" id="description" name="description"></textarea>
        </td>
        <td>
        <input style="float: right;" class="btn" type="submit" name="add" id="add" value="Lagre"/>
        </td>
        </form>
        </table>
        </div>
        <br clear="all">  
        <div class="visible-phone"><br/></div>
        <div id="options">
            <div class="btn-group margintop5 pull-left nav-tabs" data-toggle="buttons-radio">
                <?php foreach ($submenu as $name=>$value):?>
                    <a class="btn btn-mini" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$name?></a>
                <?php endforeach;?>
                
            </div>
            <script type="text/javascript">$(document).ready(function() { 
                    $('.nav-tabs #<?php $last_uri = end(explode("/", uri_string())); if($val_id[count($val_id)-2] != "filter"){echo end($val_id);}else{ echo $last_uri;} ?>').button('toggle'); });
            </script> 

        </div>
                    
         <br clear="all">
         
        <div class="visible-phone"><br/></div>
        <div class="table_head"><h6><i class="icon-list-alt"></i> <?=$this->lang->line('application_shiftjournal');?></h6></div>
        <table class="data" id="shiftjournal" rel="<?=base_url()?>" cellspacing="0" cellpadding="0">
        <thead>
            <th><?=$this->lang->line('application_datetime');?></th>
            <th><?=$this->lang->line('application_client');?></th>
            <th><?=$this->lang->line('application_calling');?></th>
            <th><?=$this->lang->line('application_taskcode');?></th>
            <th><?=$this->lang->line('application_qty');?></th>
            <th><?=$this->lang->line('application_description');?></th>
            <th><?=$this->lang->line('application_employeeID');?></th>
            <th><?=$this->lang->line('application_action');?></th>
        </thead>
        <?php foreach ($shiftjournal as $value):?>

        <tr id="<?=$value->datetime;?>" >
            <td><?=$value->company;?></td>
            <td><?=$value->calling;?></td>
            <td><?=$value->taskcode;?></td>
            <td><?=$value->qty;?></td>
            <td><?=$value->description;?></td>
            <td><?=$value->tjenestenr;?></td>
            <td class="option btn-group">
                <a class="btn btn-mini po" rel="popover" data-placement="left" data-content="<a class='btn btn-danger po-delete ajax-silent' href='<?=base_url()?>shiftjournal/delete/<?=$value->id;?>'><?=$this->lang->line('application_yes_im_sure');?></a> <button class='btn po-close'><?=$this->lang->line('application_no');?></button> <input type='hidden' name='td-id' class='id' value='<?=$value->id;?>'>" data-original-title="<b><?=$this->lang->line('application_really_delete');?></b>"><i class="icon-trash"></i></a>
                <a href="<?=base_url()?>quotations/update/<?=$value->id;?>" class="btn btn-mini" data-toggle="modal"><i class="icon-edit"></i></a>
            </td>
        </tr>

        <?php endforeach;?>
         </table>
         <br clear="all">
         
    </div>