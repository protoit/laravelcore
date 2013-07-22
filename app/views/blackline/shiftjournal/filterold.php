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
		
		redirect(current_url());
        }

        ?>
		
        <?php if($this->user){ ?>
        
        <div class="table_head"><h6><i class="icon-list-alt"></i><?=$this->lang->line('application_shiftjournal');?></h6></div>
        <form action="<?php $_PHP_SELF ?>" method="post">
        <table>
        <thead>
        <th style="width: 80px"><label style="width: 80px;">EmployeeID</label></th>
        <th style="width: 150px"><label style="width: 150px">Date & Time</label></th>
        <th style="width: 150px"><label style="width: 150px">Calling</label></th>
        <th style="width: 150px"><label style="width: 150px">Object</label></th>
        <th style="width: 150px"><label style="width: 150px">Location</label></th>
        <th style="width: 170px"><label style="width: 170px">Taskcode</label></th>
        <th style="width: 30px"><label style="width: 30px">Qty</label></th>
        <th><label>Description</label></th>
        <th><label>Action</label></th>
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
        
        <div id="baseDateControl" style="float:right;display:none;">
         <div class="dateControlBlock">
                Between <input type="text" name="dateStart" id="dateStart" class="datepicker" value="01/01/2013" size="8" /> and 
                <input type="text" name="dateEnd" id="dateEnd" class="datepicker" value="<?php echo date('d/m/Y');?>" size="8"/>
            </div>
        </div>
        
        <div class="table_head"><h6><i class="icon-list-alt"></i><?=$this->lang->line('application_shiftjournal');?></h6></div>
        <?php 
                mysql_query("SET NAMES 'utf8'");
                
                echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='data' id='clients' rel=\"<?=base_url()?>\"> 
                    <thead>
                        <th width='1%'>Date & Time</th>
                        <th width='1%'>Location</th>
                        <th width='1%'>Calling</th>
                        <th width='10%'>Taskcode</th>
                        <th width='1%'>Qty</th>
                        <th width='10%'>Description</th>
                        <th width='1%'>EmployeeID</th>
                        <th width='1%'>Action</th>
                    </thead>";
                foreach ($shiftjournals as $shiftjournal)
                {
					if($shiftjournal->status!='inactive' && $shiftjournal->status!='deleted'){
						
						$dateRow = explode(' ',$shiftjournal->datetime);
						$dateSwitched = explode('-',$dateRow[0]);
						$dateSwitched = $dateSwitched[2].'/'.$dateSwitched[1].'/'.$dateSwitched[0];
						
						echo "<td>" . $dateSwitched . "</td>";
						echo "<td>" . $shiftjournal->company . "</td>";
						echo "<td>" . $shiftjournal->calling . "</td>";
						echo "<td>" . $shiftjournal->taskcode . "</td>";
						echo "<td>" . $shiftjournal->qty . "</td>";
						echo "<td>" . $shiftjournal->description . "</td>";
						echo "<td>" . $shiftjournal->tjenestenr . "</td>";
						echo "<td>";
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
	});
	</script>