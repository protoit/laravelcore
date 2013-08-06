@extends('template')

@section('page_level_styles')    
    <link href="{{ Request::root()}}/assets/plugins/glyphicons/css/glyphicons.css" rel="stylesheet" />
	<link href="{{ Request::root()}}/assets/plugins/glyphicons_halflings/css/halflings.css" rel="stylesheet" />
@stop


@section('content')

<!-- BEGIN PAGE CONTENT-->
<div class="btn-group">
	<button class="btn blue dropdown-toggle" data-toggle="dropdown">Options <i class="icon-angle-down"></i>
        </button>
        <ul class="dropdown-menu">
            <li><a href="{{ Request::root()}}/reports/service/edit/{{ $row->id }}">Edit</a></li>
            <li><a href="#myModal3" data-toggle="modal" data-id="{{ $row->id }}" class="delete_report">Delete</a></li>
            <li><a href="#report_history" data-toggle="modal" data-id="{{ $row->id }}" class="add_history">Add Report History</a></li>
            @if($row->status == 'approved')
            	<li><a href="{{ Request::root()}}/reports/service/not-approved/{{ $row->id }}">Not Approved</a></li>
            @else
            	<li><a href="{{ Request::root()}}/reports/service/approved/{{ $row->id }}">Approve</a></li>
            @endif
            
        </ul>
</div>
<br />
<br />

@include('reports.service.modals.modals')

<div class="row-fluid">
    <div class="span6">
                 
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>INFORMATION ABOUT THE CUSTOMER</div>
                <div class="tools">
                   
                </div>
            </div>
            <div class="portlet-body form">       
                <!-- BEGIN TABLE-->
                @include('reports.service.tables.service-about')
            	<!-- END TABLE--> 
            </div>
        </div>
        <!-- END EXTRAS PORTLET-->
    </div>
    
    
    <div class="span6">
                 
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>REPORT INFORMATION</div>
                <div class="tools">
                   
                </div>
            </div>
            <div class="portlet-body form">       
                <!-- BEGIN TABLE-->
                @include('reports.service.tables.service-info')
            	<!-- END TABLE--> 
            </div>
        </div>
        <!-- END EXTRAS PORTLET-->
    </div>
    
    
</div>

<div class="row-fluid">
    <div class="span12">
                 
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>{{ strtoupper($row->title) }}</div>
                <div class="tools">
                   
                </div>
            </div>
            <div class="portlet-body form">
           		<p>{{ $row->description }}</p>
            </div>
        </div>
        <!-- END EXTRAS PORTLET-->
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
                 
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>FILES</div>
                <div class="tools">
                   
                </div>
            </div>
            <div class="portlet-body form">
           		<!-- BEGIN TABLE-->
                @include('reports.service.tables.service-files')
            	<!-- END TABLE--> 
            </div>
        </div>
        <!-- END EXTRAS PORTLET-->
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
                 
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>{{ strtoupper('SAKSHISTORIKK') }}</div>
                <div class="tools">
                   
                </div>
            </div>
            <div class="portlet-body form">
           		<!-- BEGIN TABLE-->
                @include('reports.service.tables.service-history')
            	<!-- END TABLE--> 
            </div>
        </div>
        <!-- END EXTRAS PORTLET-->
    </div>
</div>

<!-- END PAGE CONTENT-->

@stop


@section('page_level_plugins')
	<!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ Request::root()}}/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="{{ Request::root()}}/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="{{ Request::root()}}/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="{{ Request::root()}}/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END PAGE LEVEL PLUGINS -->
@stop

@section('page_level_scripts')
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="{{ Request::root()}}/assets/scripts/app.js"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
@stop

@section('app_init')
	<script>
	
	
	$(document).on("click", "a[class='delete_report']", function () {
		
		$("#delete_me").attr("href", "{{ Request::root()}}/reports/service/delete/"+$(this).data('id'));
		
	});
	
	$(document).on("click", "a[class='btn mini black']", function () {
		
		$("#delete_me").attr("href", "{{ Request::root()}}/reports/service/delete-history/"+$(this).data('id') + "/" + $(this).data('service_id'));
		
	});
	
	$(document).on("click", "a[class='btn red delete_file']", function () {
		
		$("#delete_file_confirm").attr("href", "{{ Request::root()}}/reports/service/delete-attachment/"+$(this).data('id') + "/" + $(this).data('service_id'));
		
	});
	
	$(document).on("click", "a[class='add_history']", function () {
		
		$("#history_report_id").attr("value", $(this).data('id'));
		$('#datetime').val("");
		$('#tjenestenr').val("");
		$('#description').val("");
		$("#history_id").attr("value", 0);
		
	});
	
	$(document).on("click", "a[class='btn mini purple']", function () {
		
		$("#history_id").attr("value", $(this).data('id'));
		
		$.post('{{Request::root()}}/reports/service/history-info', { 
				
					id: $(this).data('id'), 
					}, function(data) {
				
				$('#datetime').val(data.datetime);
				$('#tjenestenr').val(data.tjenestenr);
				$('#description').val(data.description);
				$('#history_report_id').val(data.service_reports_id);
				
		});
		
	});
	
	$(document).on("click", "#report_history_save", function () {
		 
		$.post('{{Request::root()}}/reports/service/history', { 
					datetime: $('#datetime').val(), 
					tjenestenr: $('#tjenestenr').val(), 
					description: $('#description').val(), 
					service_reports_id: $('#history_report_id').val(),
					id: $('#history_id').val(), 
					}, function(data) {
				
		});
		
		 $('#report_history').modal('hide')
		 
	});
	
    jQuery(document).ready(function() {       
       //App.init();
    });
    </script>
@stop


