<div id="main">
        <div class="stats-frame">
      <?php
      if(isset($_POST['add']))
      {  
         $username = "proffwqr_fc2pro"; 
         $password = "BlEXxW)iSbef";  
         $dbase = "proffwqr_protopersonal";
         $localost = "localhost";
          
         mysql_connect('localhost',$username,$password); 
         mysql_set_charset('utf8'); 
         @mysql_select_db($dbase) or die( "Unable to select database"); 
        
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
        <th style="width: 150px"><label style="width: 150px">Kunde</label></th>
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
             
                $sql = 'SELECT catname_has_items FROM objectcat';
                $result = mysql_query($sql); 
                mysql_query("SET NAMES 'utf8'");
                if (!$result) 
                echo mysql_error(); 
         
                    while($row = mysql_fetch_array($result)){
                    $shiftjournaltype = $row[catname_has_items];
                    echo "<option>" . $shiftjournaltype . "</option>";
                    }
                    ?> 
                    
        </select></td>
        
        <td style="width: 150px"><select style="width: 150px;" id="company" name="company">
        <?php
                
                $sql = "SELECT name FROM companies WHERE catname = 'Grønlandstorg' ORDER BY name ASC";
                $result = mysql_query($sql); 
                mysql_query("SET NAMES 'utf8'");
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
             
                $sql = 'SELECT * FROM shiftjournalcode';
                $result = mysql_query($sql); 
                mysql_query("SET NAMES 'utf8'");
                if (!$result) 
                echo mysql_error(); 
         
                    while($row = mysql_fetch_array($result)){
                    $codedescription = $row[codedescription];
                    echo "<option>" . $codedescription . "</option>";
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
         <div class="btn-group margintop5 nav-tabs normal-white-space" data-toggle="buttons-radio">
                <?php foreach ($submenushiftjournal as $name=>$value):?>
                    <a class="btn btn-mini" href="<?=site_url($value);?>"><?=$name?></a>
                <?php endforeach;?>
            </div>
        <div class="table_head"><h6><i class="icon-list-alt"></i><?=$this->lang->line('application_shiftjournal');?></h6></div>
        <?php 
                $con = mysql_connect("localhost","proffwqr_fc2pro","BlEXxW)iSbef"); 
                if (!$con) 
                  { 
                  die('Could not connect: ' . mysql_error()); 
                  } 

                mysql_select_db("proffwqr_protopersonal", $con);  
                mysql_query("SET NAMES 'utf8'");

                $sql = "SELECT * FROM shiftjournal ORDER BY datetime ASC"; 
                $result = mysql_query($sql); 
                if (!$result) 
                echo mysql_error(); 

                echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='data' id='clients' rel=\"<?=base_url()?>\"> 
                    <thead>
                        <th width='1%'>Dato & Tid</th>
                        <th width='1%'>Kunde</th>
                        <th width='1%'>Tilkalling</th>
                        <th width='10%'>Oppgavekode</th>
                        <th width='1%'>Antall</th>
                        <th width='10%'>Beskrivelse</th>
                        <th width='1%'>Tjenestenr</th>
                        <th width='1%'>Valg</th>
                    </thead>";
         
                    while($row = mysql_fetch_array($result)) 
                    
                      {                     
                     
                    echo "<td>" . $row['datetime'] . "</td>"; 
                    echo "<td>" . $row['company'] . "</td>";
                    echo "<td>" . $row['calling'] . "</td>"; 
                    echo "<td>" . $row['taskcode'] . "</td>"; 
                    echo "<td>" . $row['qty'] . "</td>"; 
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['tjenestenr'] . "</td>";
                    echo "<td>" . "" . "</td>";
                    echo "</tr>"; 
                      }       
                    echo "</table>";
 
                    ?>
                    
         <br clear="all">
         
               
         
    </div>