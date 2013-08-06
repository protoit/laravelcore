@extends('template')

@section('content')

<!-- get flash on success -->
@if (Session::has('msg'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="success">{{Session::get('msg')}}</div>
    </div> 
@endif

<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-globe"></i>
                {{ Lang::get('table.sr.heading') }}</div>
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
                      <a href="{{ Request::root() }}/user/add" 
                        class="btn green">{{ Lang::get('forms.add-new') }} 
                      <i class="icon-plus"></i></a>
                    </div>
                    <div class="btn-group pull-right">
                        
                        <button class="btn dropdown-toggle" 
                        data-toggle="dropdown">Tools 
                        <i class="icon-angle-down"></i>
                        </button>
                        
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#">Print</a></li>
                            <li><a href="#">Save as PDF</a></li>
                            <li><a href="#">Export to Excel</a></li>
                        </ul>
                    </div>
            </div>
                
                
            <div id="myModal3" 
                class="modal hide fade" 
                tabindex="-1" 
                role="dialog" 
                aria-labelledby="myModalLabel3" 
                aria-hidden="true">
                
              <div class="modal-header">
                      
                        <button type="button" 
                        class="close" 
                        data-dismiss="modal" 
                        aria-hidden="true"></button>
                      
            <h3 id="myModalLabel3">Confirm Delete</h3>
                    </div>
                    <div class="modal-body">
                        <p>Delete Report?</p>
                    </div>
                    <div class="modal-footer">
                        
                      <a href="{{ Request::root()}}/reports/service/delete/" 
                        class="btn blue" 
                        id="delete_me">Confirm</a>
                        
                      <button class="btn" 
                        data-dismiss="modal" 
                        aria-hidden="true">Close</button>
                    
            </div>
                </div>
                
              <table class="table table-striped table-bordered table-hover" id="sample_1">
                  <thead>
                      <tr>
                          <th style="width:8px;">
                              <input type="checkbox" 
                                class="group-checkable" 
                                data-set="#sample_1 .checkboxes" />
                          </th>
                          <th>ID</th>
                          <th>Username</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Status</th>
                          <th>ZipCode</th>
                          <th>City</th>
                          <th>{{ Lang::get('table.sr.options') }}</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($rows as $row)
                      <tr class="odd gradeX">
                          <td><input type="checkbox" class="checkboxes" value="1" /></td>
                          <td>{{ $row->id }}</td>
                          <td>{{ $row->username }}</td>
                          <td>{{ ucwords($row->firstname.' '.$row->lastname) }}</td>
                          <td>{{ $row->email }}</td>
                          <td>{{ $row->address }}</td>
                          <td>{{ $row->status }}</td>
                          <td>{{ $row->zipcode }}</td>
                          <td>{{ $row->city }}</td>
                          <td>
                            
                            <a href="{{ Request::root()}}/user/edit/{{ $row->id }}" 
                            class="btn mini purple">
                            <i class="icon-edit"></i></a>
                            
                            <a href="#myModal3" class="btn mini black" 
                            data-toggle="modal" 
                            data-id="{{ $row->id }}">
                            <i class="icon-trash"></i></a>
                            </td>
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
			 
		$("#delete_me").attr("href", "{{ Request::root()}}/user/delete/"+$(this).data('id'));
		
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


