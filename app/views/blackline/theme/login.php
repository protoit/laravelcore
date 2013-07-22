<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title><?=$core_settings->company;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?=base_url()?>assets/blackline/js/jquery.min.js"></script>

    <link href="<?=base_url()?>assets/blackline/css/jquery-ui-1.8.16.custom.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/blackline/css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/blackline/css/custom.css" rel="stylesheet">
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
    <link href="<?=base_url()?>/assets/blackline/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link rel="SHORTCUT ICON" href="<?=base_url()?>assets/blackline/img/favicon.ico" />
 </head>

  <body>

    <div class="container">

      <div class="row">
        

        <div class="span4 offset4">
        <?=$yield?>
        
        <?php if($this->session->flashdata('message')) { $exp = explode(':', $this->session->flashdata('message'))?>
            <div class="alert alert-<?=$exp[0]?>"> 
              <?=$exp[1]?>
            </div>
        <?php } ?>
       </div>
      </div><!--/row-->

    </div><!--/.fluid-container-->
    <script src="<?=base_url()?>assets/blackline/js/jquery-ui-1.8.16.custom.min.js"></script>
    <script src="<?=base_url()?>assets/blackline/js/bootstrap.min.js"></script>

     <?php if($error == "true"){ ?>
      <script type="text/javascript">
        $(document).ready(function(){
        $("#login").effect('shake', { times:3 }, 70);
        });
      </script> 
      <?php } ?>
  </body>
</html>