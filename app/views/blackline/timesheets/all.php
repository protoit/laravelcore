<script src="<?=base_url()?>assets/blackline/js/raphael-min.js"></script>
<script src="<?=base_url()?>assets/blackline/js/morris-min.js"></script>

 <div id="main">
        <?php
        if(@$this->user->admin){?>
        <?php
        if (isset($_POST['txtlname'])) {  
         $username = "proffwqr_fc2pro"; 
         $password = "y=45m,ho2tTW";  
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
        $datetimeold = DateTime::createFromFormat('d/m/Y', ($lname));
        $newDate = $datetimeold->format('Y-m-d'); 
        $first=$_POST['txtaddress']; 
        $second=$_POST['txtpcode']; 
        $firstVal=explode( ':', $first );
        $secondVal=explode( ':', $second );

         if($firstVal[0]>'12' && $secondVal[0]<='12'){
        $tel=$firstVal[0]- $secondVal[0];
        if($firstVal[1]=='00' && $secondVal[1]=='30') {
            $tel=(25-$tel);
        }
        if($firstVal[1]=='00' && $secondVal[1]=='00') {
            $tel=(24-$tel);
        }
        if($firstVal[1]=='30' && $secondVal[1]=='30') {
         $tel=(24-$tel);
        } 
        if($firstVal[1]=='30' && $secondVal[1]=='00') {
         $tel=(24-$tel);
        }   
    }
    elseif($firstVal[0]<='12' && $secondVal[0]>'12'){
        $tel= $firstVal[0]-$secondVal[0];
        
    
    }
    elseif($firstVal[0]>'12' && $secondVal[0]>'12'){
        $tel= $firstVal[0]- $secondVal[0];
             if($firstVal[1]=='00' && $secondVal[1]=='30') {
                     if($tel<0){
                        $tel=$tel*-1;
            }
            else{
            $tel=(25-$tel);
                      }
        }
        if($firstVal[1]=='00' && $secondVal[1]=='00') {
            if($tel<0){
                        $tel=$tel*-1;
            }
            else{
            $tel=(24-$tel);
            }        }
        if($firstVal[1]=='30' && $secondVal[1]=='30') {
         if($tel<0){
                        $tel=$tel*-1;
            }
            else{
            $tel=(24-$tel);
            }            
               } 
        if($firstVal[1]=='30' && $secondVal[1]=='00') {
                if($tel<0){
                        $tel=$tel*-1;
            }
            else{
          $tel=(24-$tel);
                 }
            }   
    
    }
    else{
        $tel= $firstVal[0]- $secondVal[0];
        
    }
    if($firstVal[1]=='30' && $secondVal[1]=='00'){
        if($tel<1) $tel=$tel-0.5;
        else $tel=$tel+0.5;
  
        if($tel<1) $tel+=1; 
        }

       if($firstVal[1]=='00' && $secondVal[1]=='30'){
        if($tel>1) $tel=$tel-0.5;
        else $tel=$tel+0.5;
  
        if($tel<1) $tel-=1;
        
        }
        
    if($tel<0){
        $tel=$tel*-1;
    }                      
        mysql_query("insert into timesheets(date, start, end, object, qty, tjenestenr) values('$newDate','$address','$pcode','$email','$tel','$fax')") or die ();  
        mysql_set_charset('utf8');
        $flag=1;  
        $conf="Insert Data Successfully ";  
        }

        ?>
        <input class="required inpt" type="hidden" name="to" value="" />
        <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'>
        <form id="ajax-contact-form" method="post" name="form1" action="<?php $_PHP_SELF ?>" >
        <thead>
        <th><label style="width: 80px;" for="txtlname">Dato</label></th>
        <th><label style="width: 1%;">Vakt Start</label></th>
        <th><label style="width: 1%;">Vakt Slutt</label></th>
        <th><label style="width: 1%;">Objekt</label></th>
        <th style="display: none"><label style="width: 1%; display: none;">Antall Timer</label></th>
        <th><label style="width: 1%;">Tjenestenr</label></th>
        <th><label style="width: 1%;">Valg</label></th>
        </thead>
        <td style="width:80px;"><input class="required datepicker" id="datepicker" style="width: 160px; vertical-align: middle;" type="text" name="txtlname" /></td>
        
        <td style="width:20%;">
        <select class="required inpt span5" style="width: 100%;"name="txtaddress">
        <option>00:00</option>
        <option>00:30</option>
        <option>01:00</option>
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
        <option>01:00</option>
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
 
        <td style="display: none"><input style="width:20%; text-align: center;" align="middle" type="text" name="txttel" value="" /></td>
        <td style="width:20%;"><select class="required inpt span6" style="width:100%;" name="txtfax" >
        <?php
             
                $sql = 'SELECT * FROM users ORDER BY tjenestenr ASC';
                $result = mysql_query($sql); 
                mysql_query("SET NAMES 'utf8'");
                if (!$result) 
                echo mysql_error(); 
         
                    while($row = mysql_fetch_array($result)){
                    echo "<option>" . $row['tjenestenr'] . "</option>";
                    }
                    ?> 
                    
        </select>
        </td>
        <label id="load"></label>
        <td style="width:20%;"><input name="btnsubmit" type="submit" class="btn" value="Lagre"/></td>
        </tr>
        </form>
        </table>
        <?php
        }?>        
        
        <?php
        $date = date('Y-m-d H:i:s');       
        $stop_date = date('Y-m-d', strtotime($date) + 172800);
        $fromStopDate = $stop_date;
        $newStopDate = date("d/m/Y", strtotime($fromStopDate));
        ?>
        <?php if($this->user){ ?>
        <div class="span5 stdpad" style="padding-top: 63px;">
        <div class="table_head"><h6><i class="icon-calendar"></i><?=$this->lang->line('application_my_shifts');?></h6></div>
        <?php   
               $con = mysql_connect("localhost","proffwqr_fc2pro","y=45m,ho2tTW"); 
                if (!$con) 
                  { 
                  die('Could not connect: ' . mysql_error()); 
                  } 
  
                mysql_select_db("proffwqr_protopersonal", $con);  
                mysql_query("SET NAMES 'utf8'");
                
                $sql = 'SELECT * FROM timesheets WHERE tjenestenr = "'.$this->user->tjenestenr.'"';
                $result = mysql_query($sql); 
                if (!$result) 
                echo mysql_error(); 

                echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='data' id='clients' rel=\"<?=base_url()?>\"> 
                    <thead>
                        <th style=\"width: 95px;\">Dato</th>
                        <th style=\"width: 75px;\">Vakt Tid</th>
                        <th style=\"width: 80px;\">Objekt</th>
                        <th style=\"width: 5px;\">Antall Timer</th>
                        <th style=\"width: 10px;\">Tjenestenr</th>
                    </thead><tbody>";
         
                    while($row = mysql_fetch_array($result)) 
                    
                      {
                    if($row['status']!='inactive' && $row['status']!='deleted'){    
                        $fromMYSQL = $row['date'];
                        $newDate = date("d/m/Y l", strtotime($fromMYSQL));
                        $shiftstart = $row['start'];
                        $newshiftstart = date("H:i", strtotime($shiftstart));
                        $shiftend = $row['end'];
                        $newshiftend = date("H:i", strtotime($shiftend));
                        $newDate = str_replace ( 'Monday', 'Mandag', $newDate );
                        $newDate = str_replace ( 'Tuesday', 'Tirsdag', $newDate );
                        $newDate = str_replace ( 'Wednesday', 'Onsdag', $newDate );
                        $newDate = str_replace ( 'Thursday', 'Torsdag', $newDate );
                        $newDate = str_replace ( 'Friday', 'Fredag', $newDate );
                        $newDate = str_replace ( 'Saturday', 'LÃ¸rdag', $newDate );
                        $newDate = str_replace ( 'Sunday', 'SÃ¸ndag', $newDate );  
                        $newDate = str_replace ( 'January', 'Januar', $newDate );
                        $newDate = str_replace ( 'February', 'Februar', $newDate );
                        $newDate = str_replace ( 'March', 'Mars', $newDate );
                        $newDate = str_replace ( 'April', 'April', $newDate );
                        $newDate = str_replace ( 'May', 'Mai', $newDate );
                        $newDate = str_replace ( 'June', 'Juni', $newDate );
                        $newDate = str_replace ( 'July', 'Juli', $newDate );
                        $newDate = str_replace ( 'August', 'August', $newDate );
                        $newDate = str_replace ( 'September', 'September', $newDate );
                        $newDate = str_replace ( 'October', 'Oktober', $newDate );
                        $newDate = str_replace ( 'November', 'November', $newDate );
                        $newDate = str_replace ( 'December', 'Desember', $newDate );
                        
                        $fromMYSQL = explode('-',$fromMYSQL);
                        echo "<tr><td>" . $fromMYSQL[2].'/'.$fromMYSQL[1].'/'.$fromMYSQL[0]  . "</td>";
                        echo "<td>" . $newshiftstart . " - " . $newshiftend . "</td>";                    
                        echo "<td>" . $row['object'] . "</td>";
                        echo "<td>" . $row['qty']. "</td>";
                        echo "<td>" . $row['tjenestenr'] . "</td>";  
                        echo "</tr>"; 
                        }
                      }       
                    echo "</tbody></table>";

                    mysql_close($con); 
                    ?>
                    
        <br clear="both">
        </div>
        <? } ?>
        
        <div class="span5 stdpad">
        <div id="baseDateControl" style="float:left;">
        <div class="well">

               <form class="form-horizontal">
                 <fieldset>
                  <div class="control-group">
                    <label class="control-label" for="reservation">Tidsperiode:</label>
                    <div class="controls">
                     <div class="input-prepend">
                       <span class="add-on"><i class="icon-calendar"></i></span><input type="text" id="daterange" value="<?php echo date("d/m/Y");?> - <?php echo date("d/m/Y", time()+((60*60)*48));?>" />
                     </div>
                    </div>
                  </div>
                 </fieldset>
               </form>

        </div>
        </div>        
        <div class="table_head"><h6><i class="icon-calendar"></i><?=$this->lang->line('application_timesheets');?></h6></div>
        <?php 
               $con = mysql_connect("localhost","proffwqr_fc2pro","y=45m,ho2tTW"); 
                if (!$con) 
                  { 
                  die('Could not connect: ' . mysql_error()); 
                  } 
  
                mysql_select_db("proffwqr_protopersonal", $con); 
                mysql_query("SET NAMES 'utf8'");
                
                $sql = 'SELECT * FROM timesheets';
                $result = mysql_query($sql); 
                if (!$result) 
                echo mysql_error(); 

                echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='data2' id='clients2' rel=\"<?=base_url()?>\"> 
                    <thead>
                        <th style=\"width: 95px;\">Dato</th>
                        <th style=\"width: 75px;\">Vakt Tid</th>
                        <th style=\"width: 80px;\">Objekt</th>
                        <th style=\"width: 5px;\">Antall Timer</th>
                        <th style=\"width: 10px;\">Tjenestenr</th>
                        <th style=\"width: 44px;\">Valg</th>
                    </thead><tbody>";
         
                    while($row = mysql_fetch_array($result)) 
                    
                      {  
                    if($row['status']!='inactive' && $row['status']!='deleted'){    
                        $fromMYSQL = $row['date'];
                        $newDate = date("d/m/Y l", strtotime($fromMYSQL));
                        $shiftstart = $row['start'];
                        $newshiftstart = date("H:i", strtotime($shiftstart));
                        $shiftend = $row['end'];
                        $newshiftend = date("H:i", strtotime($shiftend));
                        $newDate = str_replace ( 'Monday', 'Mandag', $newDate );
                        $newDate = str_replace ( 'Tuesday', 'Tirsdag', $newDate );
                        $newDate = str_replace ( 'Wednesday', 'Onsdag', $newDate );
                        $newDate = str_replace ( 'Thursday', 'Torsdag', $newDate );
                        $newDate = str_replace ( 'Friday', 'Fredag', $newDate );
                        $newDate = str_replace ( 'Saturday', 'LÃ¸rdag', $newDate );
                        $newDate = str_replace ( 'Sunday', 'SÃ¸ndag', $newDate );  
                        $newDate = str_replace ( 'January', 'Januar', $newDate );
                        $newDate = str_replace ( 'February', 'Februar', $newDate );
                        $newDate = str_replace ( 'March', 'Mars', $newDate );
                        $newDate = str_replace ( 'April', 'April', $newDate );
                        $newDate = str_replace ( 'May', 'Mai', $newDate );
                        $newDate = str_replace ( 'June', 'Juni', $newDate );
                        $newDate = str_replace ( 'July', 'Juli', $newDate );
                        $newDate = str_replace ( 'August', 'August', $newDate );
                        $newDate = str_replace ( 'September', 'September', $newDate );
                        $newDate = str_replace ( 'October', 'Oktober', $newDate );
                        $newDate = str_replace ( 'November', 'November', $newDate );
                        $newDate = str_replace ( 'December', 'Desember', $newDate );
                        
                        
                        $fromMYSQL = explode('-',$fromMYSQL);
                        echo "<tr><td>" . $fromMYSQL[2].'/'.$fromMYSQL[1].'/'.$fromMYSQL[0]  . "</td>";
                        echo "<td>" . $newshiftstart . " - " . $newshiftend . "</td>";                    
                        echo "<td>" . $row['object'] . "</td>";
                        echo "<td>" . $row['qty'] . "</td>";
                        echo "<td>" . $row['tjenestenr'] . "</td>";
                        echo "<td class=\"option btn-group\">";
                            
                            if($this->client){ 
                            }
                            if(@$this->user->admin) {
                            ?>
                           <a class="btn btn-mini po" rel="popover" data-placement="left" data-content="<a class='btn btn-danger po-delete' href='<?php echo base_url();?>timesheets/delete/<?php echo $row['id'];?>'>Ja, jeg er sikker!</a> <button class='btn po-close'>Nei</button> <input type='hidden' name='td-id' class='id' value='5'>" data-original-title="<b>Er du sikker?</b>"><i class="icon-trash"></i></a>
                           <a href="<?php echo base_url();?>timesheets/update/<?php echo $row['id'];?>" class="btn btn-mini" data-toggle="modal"><i class="icon-edit"></i></a>
                            <?php }
                            echo "</td>";  
                            echo "</tr>"; 
                        }
                      }       
                    echo "</tbody></table>";

                    mysql_close($con); 
                    ?>
         
         
         <br clear="all">
         </div>
         
</div>

<script type="text/javascript">
    $(document).ready(function(){
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