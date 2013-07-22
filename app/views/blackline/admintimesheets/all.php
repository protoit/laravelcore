<div id="options">
            
            <?php
        if (isset($_POST['txtlname'])) {  
        $username = "proffwqr_fc2pro"; 
         $password = "[6NAswam(GD9";  
         $dbase = "proffwqr_protopersonal";
         $localost = "localhost";
          
         mysql_connect('localhost',$username,$password); 
         mysql_set_charset('utf8'); 
         @mysql_select_db($dbase) or die( "Unable to select database");
         
         // CODE FOR INSERTING DATA    
        $lname=$_POST['txtlname'];    
        $address=$_POST['txtaddress'];  
        $pcode=$_POST['txtpcode'];  
        $email=$_POST['txtemail'];  
        $tel=$_POST['txttel'];  
        $fax=$_POST['txtfax'];                       
        mysql_query("insert into timesheets(date, start, end, object, qty, tjenestenr) values('$lname','$address','$pcode','$email','$tel','$fax')") or die ();  
        mysql_set_charset('utf8');
        $flag=1;  
        $conf="Insert Data Successfully ";  
        }
        ?>
        <input class="required inpt" type="hidden" name="to" value="" />
        <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'>
        <form id="ajax-contact-form" method="post" name="form1" action="<?php $_PHP_SELF ?>" >
        <thead>
        <th><label style="width: 40%;" for="datepicker">Dato</label></th>
        <th><label style="width: 1%;">Vakt Start</label></th>
        <th><label style="width: 1%;">Vakt Slutt</label></th>
        <th><label style="width: 1%;">Objekt</label></th>
        <th><label style="width: 1%;">Antall Timer</label></th>
        <th><label style="width: 1%;">Tjenestenr</label></th>
        <th><label style="width: 1%;">Valg</label></th>
        </thead>
        <td style="width:100px;"><input class="required datepicker" id="datepicker" style="width: 160px;" type="text" name="txtlname" value="" readonly="readonly" /></td>
        
        <td style="width:20%;">
        <select class="required inpt span5" style="width: 100%;"name="txtaddress">
        <option>00:00</option>
        <option>00:30</option>
        <option>01:30</option>
        <option>02:00</option>
        <option>02:30</option>
        <option>03:00</option>
        <option>03:30</option>
        <option>04:30</option>
        <option>05:00</option>
        <option>05:30</option>
        <option>06:00</option>
        <option>06:30</option>
        <option>07:00</option>
        <option selected>08:00</option>
        <option>08:30</option>
        <option>09:00</option>
        <option>09:30</option>
        <option>10:00</option>
        <option>10:30</option>
        <option>11:00</option>
        <option>11:30</option>
        <option>12:00</option>
        <option>12:30</option>
        <option>13:00</option>
        <option>13:30</option>
        <option>14:00</option>
        <option>14:30</option>
        <option>15:00</option>
        <option>15:30</option>
        <option>16:00</option>
        <option>16:30</option>
        <option>17:00</option>
        <option>17:30</option>
        <option>18:00</option>
        <option>18:30</option>
        <option>19:00</option>
        <option>19:30</option>
        <option>20:00</option>
        <option>20:30</option>
        <option>21:00</option>
        <option>21:30</option>
        <option>22:00</option>
        <option>22:30</option>
        <option>23:00</option>
        <option>23:30</option>
        <option>00:00</option>
        </select></td>
        
        <td style="width:20%;">
        <select class="required inpt span5" style="width: 100%;" name="txtpcode">
        <option>00:00</option>
        <option>00:30</option>
        <option>01:30</option>
        <option>02:00</option>
        <option>02:30</option>
        <option>03:00</option>
        <option>03:30</option>
        <option>04:30</option>
        <option>05:00</option>
        <option>05:30</option>
        <option>06:00</option>
        <option>06:30</option>
        <option>07:00</option>
        <option>08:00</option>
        <option>08:30</option>
        <option>09:00</option>
        <option>09:30</option>
        <option>10:00</option>
        <option>10:30</option>
        <option>11:00</option>
        <option>11:30</option>
        <option>12:00</option>
        <option>12:30</option>
        <option>13:00</option>
        <option>13:30</option>
        <option selected>14:00</option>
        <option>14:30</option>
        <option>15:00</option>
        <option>15:30</option>
        <option>16:00</option>
        <option>16:30</option>
        <option>17:00</option>
        <option>17:30</option>
        <option>18:00</option>
        <option>18:30</option>
        <option>19:00</option>
        <option>19:30</option>
        <option>20:00</option>
        <option>20:30</option>
        <option>21:00</option>
        <option>21:30</option>
        <option>22:00</option>
        <option>22:30</option>
        <option>23:00</option>
        <option>23:30</option>
        <option>00:00</option>
        </select></td>
        
        <td style="width:20%;"><select class="required inpt" style="width:100%;" name="txtemail">
        <option>2 Kokker</option>
        <option>Bobs Pub</option>
        <option>Choice Pub</option>
        <option selected>Grønlandstorg</option>
        <option>Norges Taxi</option>
        <option>Olafiagangen</option>
        <option>Operabar</option>
        <option>Posthallen</option>
        <option>Star Gate</option>
        </select></td>
 
        <td><input class="required" style="width:20%;" type="text" name="txttel" value="" /></td>
        
        <td style="width:20%;"><select class="required inpt span6" style="width:100%;" name="txtfax" >
        <?php
             
                $sql = 'SELECT * FROM users ORDER BY tjenestenr ASC';
                $result = mysql_query($sql); 
                mysql_query("SET NAMES 'utf8'");
                if (!$result) 
                echo mysql_error(); 
         
                    while($row = mysql_fetch_array($result)){
                    $tjid = $row[tjenestenr];
                    echo "<option>" . $tjid . "</option>";
                    }
                    ?> 
                    
        </select>
        </td>
        <label id="load"></label>
        <td style="width:20%;"><input name="btnsubmit" type="submit" class="btn" value="Lagre"/></td>
        </tr>
        </form>
        </table>
            
            
            
            
            <br clear="all">
            
            <div class="table_head"><h6><i class="icon-calendar"></i><?=$this->lang->line('application_my_shifts');?></h6></div>
        <?php 
                $con = mysql_connect("localhost","proffwqr_fc2pro","[6NAswam(GD9"); 
                if (!$con) 
                  { 
                  die('Could not connect: ' . mysql_error()); 
                  } 
  
                mysql_select_db("proffwqr_protopersonal", $con); 
                mysql_query("SET NAMES 'utf8'");
                
                $sql = 'SELECT * FROM timesheets WHERE tjenestenr = "'.$this->user->tjenestenr.'" ORDER BY tjenestenr ASC';
                $result = mysql_query($sql); 
                if (!$result) 
                echo mysql_error(); 

                echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='data' id='clients' rel=\"<?=base_url()?>\"> 
                    <thead>
                        <th width='1%'>Dato</th>
                        <th width='1%'>Vakt Tid</th>
                        <th width='10%'>Objekt</th>
                        <th width='1%'>Antall Timer</th>
                        <th width='1%'>Tjenestenr</th>
                    </thead>";
         
                    while($row = mysql_fetch_array($result)) 
                    
                      { 
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['start'] . " - " . $row['end'] . "</td>";                    
                    echo "<td>" . $row['object'] . "</td>";
                    echo "<td>" . $row['qty'] . "</td>";
                    echo "<td>" . $row['tjenestenr'] . "</td>";  
                    echo "</tr>"; 
                      }       
                    echo "</table>";

                    mysql_close($con); 
                    ?>
         
         <br clear="all">
                    
         <div class="table_head"><h6><i class="icon-calendar"></i><?=$this->lang->line('application_timesheets');?></h6></div>
        <?php 
                $con = mysql_connect("localhost","proffwqr_fc2pro","[6NAswam(GD9"); 
                if (!$con) 
                  { 
                  die('Could not connect: ' . mysql_error()); 
                  } 
  
                mysql_select_db("proffwqr_protopersonal", $con); 
                mysql_query("SET NAMES 'utf8'");
                
                $sql = 'SELECT * FROM timesheets ORDER BY tjenestenr ASC';
                $result = mysql_query($sql); 
                if (!$result) 
                echo mysql_error(); 

                echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='data' id='clients' rel=\"<?=base_url()?>\"> 
                    <thead>
                        <th width='1%'>Dato</th>
                        <th width='1%'>Vakt Tid</th>
                        <th width='10%'>Objekt</th>
                        <th width='1%'>Antall Timer</th>
                        <th width='1%'>Tjenestenr</th>
                    </thead>";
         

                    while($row = mysql_fetch_array($result)) 
                    
                      { 
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['start'] . " - " . $row['end'] . "</td>";                    
                    echo "<td>" . $row['object'] . "</td>";
                    echo "<td>" . $row['qty'] . "</td>";
                    echo "<td>" . $row['tjenestenr'] . "</td>";  
                    echo "</tr>"; 
                      }       
                    echo "</table>";

                    mysql_close($con); 
                    ?>
         
         
         <br clear="all">
 

        </div>
        <hr/>

