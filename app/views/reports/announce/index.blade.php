@extends('template')

@section('content')

<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-globe"></i>{{ Lang::get('table.sr.heading') }}</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body">
              <div class="clearfix">
                    <div class="btn-group">
                        <a href="{{ Request::root()}}/reports/announce/add" class="btn green">{{ Lang::get('forms.add-new') }} <i class="icon-plus"></i></a>
                    </div>
                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#">Print</a></li>
                            <li><a href="#">Save as PDF</a></li>
                            <li><a href="#">Export to Excel</a></li>
                        </ul>
                    </div>
                </div>
                
                
                @include('reports.announce.modals.modals')
                
                @include('reports.announce.tables.index')
                
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE CONTENT-->
@stop


@section('page_level_plugins')
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="{{ Request::root()}}/assets/plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="{{ Request::root()}}/assets/plugins/data-tables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="{{ Request::root()}}/assets/plugins/data-tables/DT_bootstrap.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
@stop

@section('page_level_scripts')
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="{{ Request::root()}}/assets/scripts/app.js"></script>
	<script src="{{ Request::root()}}/assets/scripts/table-managed.js"></script>     
	<!-- END PAGE LEVEL SCRIPTS -->
@stop

@section('app_init')
	
<script>


	$(document).on("click", "a[class='btn mini black']", function () {
			 
		$("#delete_me").attr("href", "{{ Request::root()}}/reports/service/delete/"+$(this).data('id'));
		
	});


	jQuery(document).ready(function() {       
	   //App.init();
	   //TableManaged.init();
		$('#sample_1').dataTable({"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>"});
		
		jQuery('#sample_1 .group-checkable').change(function () {
			var set = jQuery(this).attr("data-set");
			var checked = jQuery(this).is(":checked");
			jQuery(set).each(function () {
				if (checked) {
					$(this).attr("checked", true);
				} else {
					$(this).attr("checked", false);
				}
			});
			jQuery.uniform.update(set);
		});
		
		jQuery('#sample_1_wrapper .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
		jQuery('#sample_1_wrapper .dataTables_length select').addClass("m-wrap small"); // modify table per page dropdown
		
	
		
	});
	
	
	$('#sample_1 tr').click(function() {
   
	var href = $(this).find("view").attr("href");
	if(href) {
		window.location = href;
	}
});
	
</script>
@stop


