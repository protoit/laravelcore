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
        
                $datetimeold = DateTime::createFromFormat('d/m/Y', ($datetime));
        $newDate = $datetimeold->format('Y-m-d H:i');

        //Block 4
        $sql = "INSERT INTO shiftjournal (tjenestenr, datetime, calling, object, company, taskcode, qty, description)
        VALUES ('$tjenestenr','$newDate','$calling','$object','$company','$taskcode','$qty', '$description')";
        mysql_set_charset('utf8');
        //Block 5
        $res = mysql_query($sql);
        
        redirect(current_url());
        }

        ?>
        
        <?php if($this->user){ ?>
        
        <div class="table_head"><h6><i class="icon-list-alt"></i><?=$this->lang->line('application_shiftjournal');?></h6></div>
        <form action="<?php $_PHP_SELF ?>" method="post">
        <table>
        <thead>
        <th style="width: 80px"><label style="width: 80px;"><?=$this->lang->line('application_employeeID');?></label></th>
        <th style="width: 90px"><label style="width: 90px"><?=$this->lang->line('application_date');?></label></th>
        <th style="width: 50px"><label style="width: 50px"><?=$this->lang->line('application_time');?></label></th>
        <th style="width: 150px"><label style="width: 150px"><?=$this->lang->line('application_calling');?></label></th>
        <th style="width: 150px"><label style="width: 150px"><?=$this->lang->line('application_object');?></label></th>
        <th style="width: 150px"><label style="width: 150px"><?=$this->lang->line('application_location');?></label></th>
        <th style="width: 170px"><label style="width: 170px"><?=$this->lang->line('application_taskcode');?></label></th>
        <th style="width: 30px"><label style="width: 30px"><?=$this->lang->line('application_hrs_qty');?></label></th>
        <th><label><?=$this->lang->line('application_description');?></label></th>
        <th><label><?=$this->lang->line('application_action');?></label></th>
        </thead>
        
        <td style="width: 80px;"><input style="width: 80px;" class="required span5" type="text" name="tjenestenr" id="tjenestenr" value="<?php echo $this->user->tjenestenr; ?>" readonly="readonly" /></td>
        <?php 
        $dato = date('d/m/Y');
        $fromMYSQL = $dato;
        ?>
        <td style="width: 90px"><input style="width: 90px" autofocus="autofocus" id="datetime" name="datetime" value="<?php echo $dato; ?>" type="text"></td>
        <td style="width: 50px"><input style="width: 50px" id="time" name="time" value="<?php echo date('H:i') ?>" type="text"></td>
        <td style="width: 150px"><select style="width: 150px" name="calling" id="calling">
        <option>Annet</option>
        <option>Alarm</option>
        <option>Service</option>
        <option>Tjenestetlf</option>
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
        
        <?php } ?>
        
        <br clear="all">
         
        <div class="visible-phone"><br/></div>
        <div id="options">
            <div class="btn-group margintop5 pull-left nav-tabs" data-toggle="buttons-radio">
                <?php foreach ($submenu as $name=>$value):?>
                    <a class="btn btn-mini <?php if(strpos($_SERVER['REQUEST_URI'],$value)) echo 'active';?>" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$name?></a>
                <?php endforeach;?>
                
            </div>
            <script type="text/javascript">$(document).ready(function() { 
                    $('.nav-tabs #<?php $last_uri = end(explode("/", uri_string())); if($val_id[count($val_id)-2] != "filter"){echo end($val_id);}else{ echo $last_uri;} ?>').button('toggle'); });
            </script> 

        </div>
        <br clear="all">
        
        <br clear="all">
        <div id="baseDateControl" style="float:left;">
        <div class="well">

               <form class="form-horizontal">
                 <fieldset>
                  <div class="control-group">
                    <label class="control-label" for="reservation">Tidsperiode:</label>
                    <div class="controls">
                     <div class="input-prepend">
                       <span class="add-on"><i class="icon-calendar"></i></span><input type="text" id="daterange" value="<?php echo date("d/m/Y");?> - <?php echo date("d/m/Y");?>" />
                     </div>
                    </div>
                  </div>
                 </fieldset>
               </form>

        </div>
        </div>
        
        <div class="table_head"><h6><i class="icon-list-alt"></i><?=$this->lang->line('application_shiftjournal');?></h6></div>
        <?php 
                mysql_query("SET NAMES 'utf8'");
                
                echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='data' id='clients' rel=\"<?=base_url()?>\"> 
                    <thead>
                        <th width='2%'>Dato</th>
                        <th width='2%'>Tid</th>
                        <th width='3%'>Sted</th>
                        <th width='1%'>Tilkalling</th>
                        <th width='6%'>Oppgavekode</th>
                        <th width='1%'>Antall</th>
                        <th width='14%'>Beskrivelse</th>
                        <th width='1%'>Tjenestenr</th>
                        <th width='1%'>ID</th>
                        <th width='2%'>Valg</th>
                    </thead>";
                foreach ($shiftjournals as $shiftjournal)
                {
                    if($shiftjournal->status!='inactive' && $shiftjournal->status!='deleted'){
                        
                        
                        $dateSwitched = date('d/m/Y',strtotime($shiftjournal->datetime));
                        
                        echo "<td>" . $dateSwitched . "</td>";
                        echo "<td>" . date("H:i", strtotime($shiftjournal->time)) . "</td>";
                        echo "<td>" . $shiftjournal->company . "</td>";
                        echo "<td>" . $shiftjournal->calling . "</td>";
                        echo "<td>" . $shiftjournal->taskcode . "</td>";
                        echo "<td>" . $shiftjournal->qty . "</td>";
                        echo "<td>" . $shiftjournal->description . "</td>";
                        echo "<td>" . $shiftjournal->tjenestenr . "</td>";
                        echo "<td>" . $shiftjournal->id . "</td>";
                        echo "<td class=\"option btn-group\">";
                        if($this->client){ 
                        }
                        if(@$this->user->admin) {
                        ?>
                        <a class="btn btn-mini po" rel="popover" data-placement="left" data-content="<a class='btn btn-danger po-delete' href='<?php echo base_url();?>shiftjournal/delete/<?php echo $shiftjournal->id;?>'>Ja, jeg er sikker!</a> <button class='btn po-close'>Nei</button> <input type='hidden' name='td-id' class='id' value='5'>" data-original-title="<b>Er du sikker?</b>"><i class="icon-trash"></i></a>
                        <?php } 
                         if(@$this->user->tjenestenr==$shiftjournal->tjenestenr || @$this->user->admin) { ?>
                        <a href="<?php echo base_url();?>shiftjournal/update/<?php echo $shiftjournal->id;?>" class="btn btn-mini" data-toggle="modal"><i class="icon-edit"></i></a>
                        <?php
                        }
                                
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                
                echo "</table>";  
 
        ?>
        
         <br clear="all">
         
    </div>
    
    <script type="text/javascript">
    $(document).ready(function(){
        $('.nav-list #dayreport').addClass('active');
        $('#object').change(function(){
            var val = $(this).val();
            $.post('<?php echo base_url();?>shiftjournal/get_locations/'+val,{}, function(data){
                $('#company').find('option').remove().end();
                $('#company').append(data);
            });
        });
        
        $('#daterange').daterangepicker(
         {
                        ranges: {
                           'Idag': [new Date(), new Date()],
                           'Igår': [moment().subtract('days', 1), moment().subtract('days', 1)],
                           'Siste 7 dager': [moment().subtract('days', 6), new Date()],
                           'Siste 30 dager': [moment().subtract('days', 29), new Date()],
                           'Denne måned': [moment().startOf('month'), moment().endOf('month')],
                           'Siste måned': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                        },
                        opens: 'left',
                        format: 'DD/MM/YYYY',
                        separator: ' - ',
                        startDate: moment().subtract('days', 29),
                        endDate: new Date(),
                        minDate: '01/01/2012',
                        maxDate: '12/31/2030',
                        locale: {
                            applyLabel: 'Ok',
                            fromLabel: 'Fra',
                            toLabel: 'Til',
                            customRangeLabel: 'Egendefinert',
                            daysOfWeek: ['Sø', 'Ma', 'Ti', 'On', 'To', 'Fr','Lø'],
                            monthNames: ['Januar', 'Februar', 'Mars', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Desember'],
                            firstDay: 1
                        },
                        showWeekNumbers: true,
                        buttonClasses: ['btn-danger'],
                        dateLimit: false
                     },
                     function(start, end) {
                        $('#daterange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                     }
         );
    });
    </script>
    <script>
    $(document).ready( function () {
    $('.data').dataTable( {
        "sDom": 'T<"clear">lfrtip',
        "oTableTools": {
            "aButtons": [
                "copy",
                "csv",
                "xls",
                {
                    "sExtends": "pdf",
                    "sPdfOrientation": "landscape",
                    "sPdfMessage": "Your custom message would go here."
                }
                "print"
            ]
        }
    } );
} );
    </script>