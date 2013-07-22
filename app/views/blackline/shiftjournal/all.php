<div id="main">
        <div class="stats-frame">
      <?php  
      if(isset($_POST['add']))
      { 
        //Block 2
        $tjenestenr = $_POST['tjenestenr'];
        $datetime = $_POST['datetime'];
        $time = $_POST['time'];
        $calling = $_POST['calling'];
        $object = $_POST['object'];
        $company = $_POST['company'];
        $taskcode = $_POST['taskcode'];
        $qty = $_POST['qty'];
        $description = $_POST['description'];
        
        $datetimeold = DateTime::createFromFormat('d/m/Y', ($datetime));
        $newDate = $datetimeold->format('Y-m-d H:i');
        
        $timeold = DateTime::createFromFormat('H:i', ($time));
        $newTime = $timeold->format('H:i');

        //Block 4
        $sql = "INSERT INTO shiftjournal (tjenestenr, datetime, time, calling, object, company, taskcode, qty, description)
        VALUES ('$tjenestenr','$newDate','$newTime', '$calling','$object','$company','$taskcode','$qty', '$description')";
        mysql_set_charset('utf8');
        //Block 5
        $res = mysql_query($sql);
        }

        ?>

        <?php if($this->user){ ?>

        <div class="table_head"><h6><i class="icon-list-alt"></i><?=$this->lang->line('application_shiftjournal');?></h6></div>
        <form action="<?php $_PHP_SELF ?>" method="post">
        <table>
        <thead>
       
        </thead>
        <tbody>
			<tr>
					<td>
						<select>
							<?php foreach($shiftjournal_calling_data as $data){ ?>
								<option><?php echo $data->shift_calling_name; ?></option>
							<?php } ?>
						</select>
					</td>
					<td>
						<select id="objects">
							<?php foreach($objectcat_data as $data){ ?>
								<option  <?php if($data->catname_has_items=="Grønlandstorg"){ ?>selected="selected"<?php } ?> ><?php echo $data->catname_has_items; ?></option>
							<?php } ?>
						</select>
					</td>
					<td>
						<select id="companies_with_location">
							<?php foreach($companies_has_locations_data as $data){ ?>
								<option><?php echo $data->location_name; ?></option>
							<?php } ?>
						</select>
					</td>
					<td>
						<select id="journals">
						</select>
					</td>
			</tr>
        </tbody>
        </table>
        </div>
        
        <?php } ?>
        <br clear="all">  
		
        <div class="visible-phone"><br/></div>
        <div id="options">
            <div class="btn-group margintop5 pull-left nav-tabs" data-toggle="buttons-radio">
                <?php foreach ($submenu as $name=>$value):?>
                
                    <a class="btn btn-mini <?php if($name=="Alle" || $name=='All') echo 'active';?>" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$name?></a>
                <?php endforeach;?>
                
            </div>
            <script type="text/javascript">$(document).ready(function() { 
                    $('.nav-tabs #<?php $last_uri = end(explode("/", uri_string())); if($val_id[count($val_id)-2] != "filter"){echo end($val_id);}else{ echo $last_uri;} ?>').button('toggle'); });
            </script> 
        <br clear="all">
        </div>
        <br clear="all">
        
        <div>
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
			$counter = 0;
                mysql_query("SET NAMES 'utf8'");
                
                echo "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0' class='data' id='clients' rel=\"".base_url()."\"> 
                    <thead>
                        <th width='1%'>Dato</th>
                        <th width='1%'>Tid</th>
                        <th width='3%'>Sted</th>
                        <th width='1%'>Tilkalling</th>
                        <th width='6%'>Oppgavekode</th>
                        <th width='1%'>Antall</th>
                        <th width='14%'>Beskrivelse</th>
                        <th width='1%'>Tjenestenr</th>
                        <th width='1%'>ID</th>
                        <th width='2%'>Valg</th>
                    </thead>";
                    
                    
                $companies = Companies::all();
                            
                foreach($companies as $company){
                        if(@$company_id == $company->id){
                            $name = $company->name;    
                    }
                }
                                                
                $query = $this->db->get('shiftjournal');
                foreach ($query->result() as $row)
                {
                    if($row->status!='inactive' && $row->status!='deleted'){    
                        $dateRow = explode(' ',$row->datetime);
                        $dateSwitched = explode('-',$dateRow[0]);
                        if(@$company_id!=''){
                            //$company_id = $this->client->company_id;
                            
                            if($row->company == $name){
                                
                                echo "<td>" . $dateSwitched[2].'/'.$dateSwitched[1].'/'.$dateSwitched[0] . "</td>";
                                echo "<td>" . date("H:i", strtotime($row->time)) . "</td>";
                                echo "<td>" . $row->company . "</td>";
                                echo "<td>" . $row->calling . "</td>";
                                echo "<td>" . $row->taskcode . "</td>";
                                echo "<td>" . $row->qty . "</td>";
                                echo "<td>" . $row->description . "</td>";
                                echo "<td>" . $row->tjenestenr . "</td>";
                                echo "<td>" . $row->id . "</td>";
                                echo "<td>";
							$counter++;
                                
                            }
                            
                        }else if($this->user){
                            
                        echo "<td>" . $dateSwitched[2].'/'.$dateSwitched[1].'/'.$dateSwitched[0] . "</td>";
                        echo "<td>" . date("H:i", strtotime($row->time)) . "</td>";
                        echo "<td>" . $row->company . "</td>";
                        echo "<td>" . $row->calling . "</td>";
                        echo "<td>" . $row->taskcode . "</td>";
                        echo "<td>" . $row->qty . "</td>";
                        echo "<td>" . $row->description . "</td>";
                        echo "<td>" . $row->tjenestenr . "</td>";
                        echo "<td>" . $row->id . "</td>";
                        echo "<td class=\"option btn-group\">";
                        }
                        
                        if($this->client){
                        }
                        if(@$this->user->admin) {
                        ?>
                        <a class="btn btn-mini po" rel="popover" data-placement="left" data-content="<a class='btn btn-danger po-delete' href='<?php echo base_url();?>shiftjournal/delete/<?php echo $row->id;?>'>Ja, jeg er sikker!</a> <button class='btn po-close'>Nei</button> <input type='hidden' name='td-id' class='id' value='5'>" data-original-title="<b>Er du sikker?</b>"><i class="icon-trash"></i></a>
                        <?php } 
                         if(@$this->user->tjenestenr==$row->tjenestenr || @$this->user->admin) { ?>
                        <a href="<?php echo base_url();?>shiftjournal/update/<?php echo $row->id;?>" class="btn btn-mini" data-toggle="modal"><i class="icon-edit"></i></a>
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
	
		$.post('<?php echo base_url(); ?>ajax/get_journal_ids',{data: $('#companies_with_location').val()}, function(result) {
			$('#journals').html(result);
		});
		
		$("#objects").change(function(){
			$.post('<?php echo base_url(); ?>ajax/get_companies_has_location',{data: $(this).val()}, function(result) {
				$('#companies_with_location').html(result);
			});
		});
		
		$("#companies_with_location").change(function(){
			$.post('<?php echo base_url(); ?>ajax/get_journal_ids',{data: $(this).val()}, function(result) {
				$('#journals').html(result);
				//alert(result);
			});
		});
		
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