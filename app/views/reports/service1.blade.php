@extends('template')
@section('content')

<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box light-grey">
            <div class="portlet-title">
                <div class="caption"><i class="icon-globe"></i>Managed Table</div>
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
                        <button id="sample_editable_1_new" class="btn green">
                        Add New <i class="icon-plus"></i>
                        </button>
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
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                            <th>{{ Lang::get('table.sr.id') }}</th>
                            <th>{{ Lang::get('table.sr.date') }}</th>
                            <th>{{ Lang::get('table.sr.status') }}</th>
                            <th>{{ Lang::get('table.sr.time') }}</th>
                            <th>{{ Lang::get('table.sr.customer') }}</th>
                            <th>{{ Lang::get('table.sr.title') }}</th>
                            <th>{{ Lang::get('table.sr.object') }}</th>
                            <th>{{ Lang::get('table.sr.employee_id') }}</th>
                            <th>{{ Lang::get('table.sr.journal_id') }}</th>
                            <th>{{ Lang::get('table.sr.options') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $row)
                        <tr class="odd gradeX">
                            <td><input type="checkbox" class="checkboxes" value="1" /></td>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->datetime }}</td>
                            <td>{{ $row->status }}</td>
                            <td>{{ $row->start }} {{ $row->end }}</td>
                            <td>{{ $row->company_name }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->object }}</td>
                            <td>{{ $row->tjenestenr }}</td>
                            <td>{{ $row->shiftjournal_id }}</td>
                            <td >&nbsp;</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE CONTENT-->


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
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="{{ Request::root()}}/assets/plugins/select2/select2.min.js"></script>
	<script type="text/javascript" src="{{ Request::root()}}/assets/plugins/data-tables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="{{ Request::root()}}/assets/plugins/data-tables/DT_bootstrap.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="{{ Request::root()}}/assets/scripts/app.js"></script>
	<script src="{{ Request::root()}}/assets/scripts/table-managed.js"></script>     
	<script>
		jQuery(document).ready(function() {       
		   App.init();
		   TableManaged.init();
		});
	</script>



@stop