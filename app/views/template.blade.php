<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD --><head>
	<meta charset="utf-8" />
	<title>Company Name | Admin Dashboard</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="{{ Request::root()}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="{{ Request::root()}}/assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="{{ Request::root()}}/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="{{ Request::root()}}/assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="{{ Request::root()}}/assets/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="{{ Request::root()}}/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="{{ Request::root()}}/assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="{{ Request::root()}}/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
    
	<!-- BEGIN PAGE LEVEL STYLES --> 
     @yield('page_level_styles')
	<!-- END PAGE LEVEL STYLES -->
    
   
<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">

<!-- BEGIN HEADER -->
@include('header')
<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		@include('sidebar')
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div id="portlet-config" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button"></button>
                    <h3>portlet Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here will be a configuration form</p>
                </div>
            </div>
            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <!-- BEGIN PAGE CONTAINER-->        
            <div class="container-fluid">
                <!-- BEGIN PAGE HEADER-->
                @include('page-header')
                <!-- END PAGE HEADER-->
                
            @yield('content')
            
            
            </div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			2013 &copy; Company Name.
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
     <!-- BEGIN CORE PLUGINS -->
	<script src="{{ Request::root()}}/assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="{{ Request::root()}}/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="{{ Request::root()}}/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="{{ Request::root()}}/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
	<script src="{{ Request::root()}}/assets/plugins/excanvas.min.js"></script>
	<script src="{{ Request::root()}}/assets/plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="{{ Request::root()}}/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="{{ Request::root()}}/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="{{ Request::root()}}/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="{{ Request::root()}}/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
    
    <script src="{{ Request::root()}}/assets/scripts/app.js"></script>
    
    
    @yield('page_level_plugins')
    
    @yield('page_level_scripts')
    
    <script>
	jQuery(document).ready(function() {       
	   App.init();
	 });
	 </script>
    
    @yield('app_init')
    
	<script>
	
    $(".page-sidebar-menu li").removeClass("active");
	$(".page-sidebar-menu li#reports_menu<?php //echo $act_uri; ?>").addClass("active");
	//$("#reports_service<?php //echo $act_uri; ?>").addClass("active");
	 //if("" == "<?php //echo $act_uri_submenu; ?>"){$("#sidebar li a").first().addClass("active");}  
        //<?php //if($act_uri_submenu != "0"){ ?>$(".submenu li a#<?php //echo $act_uri_submenu; ?>").parent().addClass("active");<?php //} ?>
        //$(".page-sidebar-menu li#Reports<?php //echo $act_uri; ?>").addClass("active");
    </script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>