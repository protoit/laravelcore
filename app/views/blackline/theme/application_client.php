<?php 
        $act_uri = $this->uri->segment(1, 0);
        $lastsec = $this->uri->total_segments();
        $act_uri_submenu = $this->uri->segment($lastsec);
        if(!$act_uri){$act_uri= 'dashboard';}
        if(is_numeric($act_uri_submenu)){ 
            $lastsec = $lastsec-1; 
            $act_uri_submenu = $this->uri->segment($lastsec);
        }
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<html>
  <head> 
    <title><?=$core_settings->company;?></title>  
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">    <script src="<?=base_url()?>assets/blackline/js/jquery.min.js"></script>    	<script type="text/javascript" src="<?=base_url()?>assets/blackline/js/moment.js"></script>    <link rel="SHORTCUT ICON" href="<?=base_url()?>assets/blackline/img/favicon2.ico"/>	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/daterangepicker.css" />    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/jquery-ui-1.8.16.custom.css"/>    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/bootstrap.css"/>    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/custom.css"/>    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/select2.css" />    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/prettify.css" />    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/bootstrap-wysihtml5.css" />    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/wysiwyg-color.css" />    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/fontello.css" />    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/datepicker.css" />    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/fam-icons.css" />    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/jquery.jscrollpane.css" />    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/bootstrap-switch.css" />    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/user.css"/>    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/jquery.toolbar.css"/>	    
    <style type="text/css">
      html{
        height: 100%;
      }
      body {
        padding-bottom: 40px;
        height: 100%;
      }  

        <?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== false) {
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false) {
    } else {
        echo '#file, #file2{ display:block !important; width:470px;}
.dummyfile{ display: none !important;}';
    }
} ?>
    </style>
        <!--[if gte IE 8]>
      <style type="text/css">
        #file, #file2{ display:block !important; width:470px;}
        .dummyfile{ display: none !important;}
      </style>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/bootstrap-responsive.css"/>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
  <body>
      <div class="container-fluid">

      <div class="row-fluid">
        <div id="sidebar" class="span2">
          <div class="full_sidebarbg span2 hidden-phone"></div>
          <div class="sidebar-nav">
            <div class="logo"><img src="<?=base_url()?><?=$core_settings->logo;?>" alt="<?=$core_settings->company;?>"/></div>

            <div class="agent-info ">
              <div class="agent-pic shadow"><img src="
               <?php 
                if($this->client->userpic != 'no-pic.png'){
                  echo base_url()."files/media/".$this->client->userpic;
                }else{
                  echo get_gravatar($this->client->email);
                }
                 ?>
                " /></div>
              <div class="username">
                <a href="<?=site_url("agent");?>" class="user" data-toggle="modal"><?php echo $this->client->firstname." ".$this->client->lastname;?></a> 
                <br/><small><?=$this->client->company->name;?></small>
                <a href="#" id="openmenu" class="visible-phone visible-tablet pull-right" ></a>
              </div>
              

            </div>
            
            <ul class="nav dark nav-list clear hidden-phone hidden-tablet" id="menu">
            
              <?php foreach ($menu as $key => $value) { ?>
               <li id="<?=strtolower($value->name);?>"><a href="<?=site_url($value->link);?>"><i class="icon-white <?=$value->icon;?>"></i> <?php echo $this->lang->line('application_'.$value->link);?>
                <?php if(strtolower($value->name) == "messages" && $messages_new[0]->amount != "0"){ ?><span class="badge badge-important badge-new shadow pull-right"><?=$messages_new[0]->amount;?></span><?php } ?>
                <?php if(strtolower($value->name) == "quotations" && $quotations_new[0]->amount != "0"){ ?><span class="badge badge-important badge-new shadow pull-right"><?=$quotations_new[0]->amount;?></span><?php } ?>
                <?php if(strtolower($value->name) == "tickets" && $tickets_new[0]->amount != "0"){ ?><span class="badge badge-important badge-new shadow pull-right"><?=$tickets_new[0]->amount;?></span><?php } ?>
               </a> </li>
              <?php } ?>
              </ul>
          </div><!--/.well -->

        </div><!--/span-->

        <ul class="span10 breadcrumb">
          <li class="hidden-phone"><a href="<?=site_url();?>"><i class="icon icon-home" style="opacity: 0.7;"></i></a> <span class="divider hidden-phone">></i></span></li>
          <li><a href="<?=site_url($act_uri);?>"><?=ucwords($this->lang->line('application_'.$act_uri));?></a></li>
          <?php if($act_uri_submenu != $act_uri && $act_uri_submenu != ""){ ?><li class="active"><span class="divider">></span> <?=$this->lang->line('application_'.$act_uri_submenu);?></li><?php } ?>
          <li class="pull-right"><a href="<?=site_url("logout");?>" class="btn btn-mini"><i class="icon-off"></i></a></li> 
          <li class="pull-right" >

                                  <div class="btn-group">
                                    <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
                                      <?php if(!empty($core_settings->language)){$default_language = $core_settings->language; }else{ $default_language = "english"; } ?>
                                      <img src="<?=base_url()?>assets/blackline/img/<?php if($this->input->cookie('language') != ""){echo $this->input->cookie('language');}else{echo $default_language;} ?>.png" style="margin-top:-1px" align="middle">
                                      <span class="caret"></span>
                                    </a>
                                     <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dLabel">
                                        <?php if ($handle = opendir('application/language/')) {

                            while (false !== ($entry = readdir($handle))) {
                                if ($entry != "." && $entry != "..") {
                                  ?><li><a href="<?=base_url()?>agent/language/<?=$entry;?>"><img src="<?=base_url()?>assets/blackline/img/<?=$entry;?>.png" class="language-img"><?=ucwords($entry);?></a></li><?php
                                }
                            }
                  
                            closedir($handle);
                            } 
                      ?>
                      
                                      </ul>
                                  </div>

          </li> 
        </ul>
        <div class="span10 white">
        
          <?=$yield?>


      <hr>      
      <footer>
        <p><small>ProtoPersonal v.<?=$core_settings->version;?> | Utviklet av <a href="http://www.protoit.no">ProtoIT.no</a></small></p>
      </footer>
      </div><!--/span-->
      </div><!--/row-->

    </div><!--/.fluid-container-->
    <div id="response_modal" class="modal hide fade"></div>

    <?php if($this->session->flashdata('message')) { $exp = explode(':', $this->session->flashdata('message'))?>
      <div class="notification notification-<?=$exp[0]?>"><div><span><?=$exp[1]?></span></div></div>
    <?php } ?>
 
	  <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/jquery-ui-1.8.16.custom.min.js"></script>      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/bootstrap.min.js"></script>      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/jquery.datatables.min.js"></script>         <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/jquery.dataTables.columnFilter.js"></script>         <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/jquery.validate.js"></script>      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/ckeditor/ckeditor.js"></script>      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/select2.min.js"></script>      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/wysihtml5-0.3.0.min.js"></script>      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/prettify.js"></script>      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/bootstrap-wysihtml5.js"></script>      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/bootstrap-datepicker.js"></script>       <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/jquery.switch.js"></script>      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/jquery.screwdefaultbuttons.min.js"></script>      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/custom.js"></script>      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/jquery-ui.js"></script>      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/dropzone.js"></script>      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/TableTools.js"></script>      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/ZeroClipboard.js"></script>      	  	  <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/daterangepicker.js"></script>    
      <script type="text/javascript" charset="utf-8">          
		$.fn.dataTableExt.afnFiltering.push(            
			function(oSettings, aData, iDataIndex){				
				var datesString = $("#daterange").val();				
				var dates = datesString.split(" - ");                
				var dateStart = parseDateValue(dates[0]);                
				var dateEnd = parseDateValue(dates[1]);				
				var eval = aData[0].split("/");                
				var evalDate = eval[1]+eval[0]+eval[2];				
				if ((evalDate >= dateStart) && (evalDate <= dateEnd)) {					
				//if (dateStart<= dateEnd) {                    
					return true;                
				}else {                    
					return false;                
					}        
				});        
				
				function parseDateValue(rawDate){
					var dateArray= rawDate.split("/");            
					var parsedDate=  dateArray[1]+ dateArray[0] + dateArray[2];            
					return parsedDate;        
				}		
				
				  $(document).ready(function(){
					$("#menu li a, .submenu li a").removeClass("active");
					if("" == "<?php echo $act_uri_submenu; ?>"){$("#sidebar li a").first().addClass("active");}  
					<?php if($act_uri_submenu != "0"){ ?>$(".submenu li a#<?php echo $act_uri_submenu; ?>").parent().addClass("active");<?php } ?>
					$("#menu li#<?php echo $act_uri; ?>").addClass("active");

    //Datatables
       var oTable = $('table.data').dataTable({          
	   "sDom": '<"toolbar">frtip',          
	   "iDisplayLength": 25,          
	   "aaSorting": [[ 0, 'desc'], [ 1, 'desc']],          
	   "oLanguage": {            
	   "sInfo": "<?=$this->lang->line('application_showing_from_to');?>",            
	   "sInfoEmpty": "<?=$this->lang->line('application_showing_from_to_empty');?>",            
	   "sEmptyTable": "<?=$this->lang->line('application_no_data_yet');?>",            
	   "oPaginate": {              "sNext": "<?=$this->lang->line('application_next');?>",              
	   "sPrevious": "<?=$this->lang->line('application_previous');?>",            
	   }          
	   }                  
	   });
        $('table.data-small').dataTable({
          "iDisplayLength": 5,
          "aaSorting": [[ 2, 'desc']],
          "oLanguage": {
            "sInfo": "<?=$this->lang->line('application_showing_from_to');?>", 
            "sInfoEmpty": "<?=$this->lang->line('application_showing_from_to_empty');?>",
            "sEmptyTable": "<?=$this->lang->line('application_no_data_yet');?>",
            "oPaginate": {
              "sNext": "<?=$this->lang->line('application_next');?>",
              "sPrevious": "<?=$this->lang->line('application_previous');?>",
            }
          }
        });

        $dateControls= $("#baseDateControl").children("div").clone();
        $("#table.data").prepend($dateControls);
        $("#table.data2").prepend($dateControls);
        $("#table.data3").prepend($dateControls);

        $('.datepicker').datepicker("hide");
        $("#daterange").keyup ( function() { oTable.fnDraw(); } );
        $("#daterange").change( function() { oTable.fnDraw(); } );
        $("#daterange").mousemove( function() { oTable.fnDraw(); } );
        $("#daterange").blur( function() { oTable.fnDraw(); } );
      });
      $('.textarea').wysihtml5();
      $(prettyPrint);
      </script>
      <script>$(function(){
    var pickerOpts = {dateFormat: $.datepicker.RFC_2822};    
    $("#date").datepicker(pickerOpts);
});</script>
      

 </body>
</html>
