<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<html>
  <head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$core_settings->company;?></title>
    <script src="<?=base_url()?>assets/blackline/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/img/favicon.ico" rel="SHORTCUT ICON" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/jquery-ui-1.8.16.custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/jquery.cleditor.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/select2.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/prettify.css"></link>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/bootstrap-wysihtml5.css"></link>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/wysiwyg-color.css"></link>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/fontello.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/fam-icons.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/blackline/css/bootstrap-toggle-buttons.css">
      <!--[if IE 7]>
        <link rel="stylesheet" href="<?=base_url()?>assets/blackline/css/fontello-ie7.css"><![endif]-->   
    <style type="text/css">
      html{
        height: 100%;
      }
      body {
        padding-bottom: 40px;
        height: 100%;
        background:url("<?=base_url()?>/assets/blackline/img/bg.png");
      }  
    </style>
    <link href="<?=base_url()?>assets/blackline/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
     
  <title><?=$core_settings->company;?></title>
 </head>
  <body>
  <div class="container-narrow">
    <div class="row">
  		<img class="margin20" src="<?=base_url()?><?=$core_settings->logo;?>" alt="<?=$core_settings->company;?>" />
     
      </div>
    <div>
     <?php if($this->session->flashdata('message')) { $exp = explode(':', $this->session->flashdata('message'))?>
	    <div id="quotemessage" class="alert alert-success" style="width:740px;"><span><?=$exp[1]?></span></div>
	    <?php } ?>
<?=$yield?>
<br clear="all"/>
	</div>

</div>
      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/jquery-ui-1.8.16.custom.min.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/jquery.datatables.min.js"></script>   
      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/jquery.validate.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/jquery.cleditor.min.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/select2.min.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/wysihtml5-0.3.0.min.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/prettify.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/bootstrap-wysihtml5.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/bootstrap-datepicker.js"></script> 
      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/jquery.toggle.buttons.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/jquery.screwdefaultbuttons.min.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/blackline/js/custom.js"></script>

      <script type="text/javascript" charset="utf-8">
        $('.textarea').wysihtml5();
        $(prettyPrint);

        $(document).ready(function(){ 
              $('input:radio').screwDefaultButtons({ 
                 checked: "url(<?=base_url()?>assets/blackline/img/radio-checked.png)",
                 unchecked: "url(<?=base_url()?>assets/blackline/img/radio.png)",
                 width:  15,
                 height:   15
              });

              $('input:checkbox').screwDefaultButtons({ 
                 checked: "url(<?=base_url()?>assets/blackline/img/checkbox-checked.png)",
                 unchecked: "url(<?=base_url()?>assets/blackline/img/checkbox.png)",
                 width:  85,
                 height:   85
              });
        });
    </script>

 </body>
</html>
