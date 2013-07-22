<script>$(document).ready(function(){ 
	$("form").validate({

		errorPlacement: function(error, element)
		{
			error.insertAfter(element).hide().slideToggle(500);
		},
		success: function(label)
		{
			$(label).remove();

		},
		sendHandler: function(form) {
			
			$(".btn-loader").val('Uploading...');
			form.submit();
		} 

	});
	$( "#slider-range-min" ).slider({
		range: "min",
		value: 0,
		min: 0,
		max: 100,
		slide: function( event, ui ) {
			$( "#progress" ).val( ui.value );
			$( "#pvalue" ).html( ui.value + "%");
		}
	});

	$.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
	});

	//Tooltip
  	$('.tt').tooltip();

  	//item-selector
  	$('.additem').click(function(e){
  		$('#item-selector').slideUp('fast');
  		$('#item-editor').slideDown('slow');
  	});

  	 $('input:radio').screwDefaultButtons({ 
                 checked: "url(<?=base_url()?>assets/blackline/img/radio-checked.png)",
                 unchecked: "url(<?=base_url()?>assets/blackline/img/radio.png)",
                 width:  15,
                 height:   15
              });

     $('input.cb:checkbox').screwDefaultButtons({ 
                 checked: "url(<?=base_url()?>assets/blackline/img/checkbox-checked.png)",
                 unchecked: "url(<?=base_url()?>assets/blackline/img/checkbox.png)",
                 width:  85,
                 height:   85
              });

});
$("select").select2();

//file upload
$('#fileselectbutton').click(function(e){
	$('#file').trigger('click');
});

$('#file').change(function(e){
	var val = $(this).val();

	var file = val.split(/[\\/]/);

	$('#filename').val(file[file.length-1]);
});

$('.textarea').wysihtml5({"size": 'small'});

$('.datepicker').datepicker({"format": 'yyyy-mm-dd', "autoclose": true});
$('.switch').switch();
</script>

<script type="text/javascript" charset="utf-8">
$(prettyPrint);
</script>



<div class="modal-header">
	<a class="close" data-dismiss="modal">×</a>
	<h3><?=$title;?></h3>
</div>
<div class="modal-body">
	<?=$yield?>
</div>

