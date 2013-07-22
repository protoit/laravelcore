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
	   form.submit();
	 	} 
	 	
	});

	
});
$.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
});
	//$('.textarea').wysihtml5();

	//$('.datepicker').datepicker({format: 'yyyy-mm-dd'});
</script>
<?=$yield?>


