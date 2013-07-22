	<div id="main">
		<div id="options">
			<div class="btn-group margintop5 nav-tabs normal-white-space" data-toggle="buttons-radio">
				<?php foreach ($submenu as $name=>$value):?>
	                <a class="btn btn-mini" id="<?php $val_id = explode("/", $value); if(!is_numeric(end($val_id))){echo end($val_id);}else{$num = count($val_id)-2; echo $val_id[$num];} ?>" href="<?=site_url($value);?>"><?=$name?></a>
	            <?php endforeach;?>
	            
			</div>
			<script type="text/javascript">$(document).ready(function() { 
	            	$('.nav-tabs #<?php $last_uri = end(explode("/", uri_string())); if($val_id[count($val_id)-2] != "settings"){echo end($val_id);}else{ echo $last_uri;} ?>').button('toggle'); });
	        </script> 

		</div>
		<hr/>
		<div class="alert alert-warning">Warning - Only change CSS classes when you know what you do!</div>
		<style type="text/css" media="screen">
    #editor { 
        position:relative;
        height:550px;
        width:auto;
        margin:0;
        border:1px solid #e0e0e0;
    }
</style>

<div class="table_head"><h6><?=$this->lang->line('application_customize');?> CSS</h6> <button class="btn btn-primary btn-mini pull-right" id="saveeditor"><?=$this->lang->line('application_save');?></button></div>
<div id="editor"><?=$css;?></div>


<script src="http://d1n0x3qji82z53.cloudfront.net/src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/twilight");
    editor.getSession().setMode("ace/mode/css");

    $('#saveeditor').bind('click',function(e) {
    	$('#css-area').val(editor.getSession().getValue());
    	$('#css_form').submit();
    });

</script>
<?php   
$attributes = array('class' => '', 'id' => 'css_form');
echo form_open_multipart($form_action, $attributes); 
?>	
<textarea style="display:none;" id="css-area" name="css-area"></textarea>
<?php echo form_close(); ?>
	</div>  <br clear="both">