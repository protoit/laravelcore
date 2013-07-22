<div id="main">
		<div class="visible-phone"><br/></div>
        <div class="table_head"><h6><i class="icon-user"></i><?=$this->lang->line('application_users');?></h6></div>
        
        <?php 
                $con = mysql_connect("localhost","proffwqr_fc2pro","[6NAswam(GD9"); 
                if (!$con) 
                  { 
                  die('Could not connect: ' . mysql_error()); 
                  } 

                mysql_select_db("proffwqr_protopersonal", $con);  
                mysql_query("SET NAMES 'utf8'");

                $sql = "SELECT * FROM users WHERE status = \"active\" ORDER BY firstname ASC"; 
                $result = mysql_query($sql); 
                if (!$result) 
                echo mysql_error(); 

                echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='data' id='clients' rel=\"<?=base_url()?>\"> 
                    <thead>
                        <th width='1%'>Tjenestenr</th>
                        <th width='1%'>Tittel</th>
                        <th width='1%'>Navn</th>
                        <th width='1%'>Epost</th>
                        <th width='1%'>Telefonnr</th>
                    </thead>";
         
                    while($row = mysql_fetch_array($result)) 
                    
                      {
                       
                    $surname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $email = $row['email']; 
                    
                    echo "<td>" . $row['tjenestenr'] . "</td>"; 
                    echo "<td>" . $row['title'] . "</td>"; 
                    echo "<td>" . $surname .' '. $lastname . "</td>";
                    echo "<td>" . "<a href=\"mailto:$email\">" . "$email" . "</a>" . "</td>"; 
                    echo "<td>" . $row['phone'] . "</td>"; 
                    echo "</tr>"; 
                      }       
                    echo "</table>";

                    mysql_close($con); 
                    ?>
        

         
         <br clear="all">        

	</div>