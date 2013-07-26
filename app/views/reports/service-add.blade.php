@extends('template')

@section('page_level_styles')
	<link rel="stylesheet" type="text/css" href="{{ Request::root()}}/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="{{ Request::root()}}/assets/plugins/select2/select2_metro.css" />
    <link rel="stylesheet" type="text/css" href="{{ Request::root()}}/assets/plugins/bootstrap-datepicker/css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="{{ Request::root()}}/assets/plugins/bootstrap-timepicker/compiled/timepicker.css" />
	<link rel="stylesheet" type="text/css" href="{{ Request::root()}}/assets/plugins/bootstrap-colorpicker/css/colorpicker.css" />
	<link rel="stylesheet" type="text/css" href="{{ Request::root()}}/assets/plugins/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
	<link rel="stylesheet" type="text/css" href="{{ Request::root()}}/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" />
	<link rel="stylesheet" type="text/css" href="{{ Request::root()}}/assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css" />
@stop


@section('content')

<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
    <div class="span12">
        
        @if(count($errors) >= 1)
            <div class="alert alert-error">
            	<button class="close" data-dismiss="alert"></button>
                <strong>Error!</strong>
                @foreach ($errors as $error)
                    <div class="error">{{ $error }}</div>
                @endforeach
            </div>
        @endif
                 
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i>New Service Report</div>
                <div class="tools">
                    <!--<a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>-->
                </div>
            </div>
            <div class="portlet-body form">
           
                                
                <!-- BEGIN FORM-->
                <form action="" class="horizontal-form" method="post" novalidate="novalidate">
                    <h3 class="form-section">Service Reporting Information</h3>
                    <div class="row-fluid">
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label" for="firstName">Journal ID</label>
                                <div class="controls">
                                    <input name="shiftjournal_id" type="text" class="m-wrap span12" id="firstName" placeholder="" data-required="1">
                                    <span class="help-block">This field is required</span>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label" for="lastName">Date</label>
                                <div class="controls">
                                    <input name="date" type="text" class="m-wrap span12" id="date" value="{{ date('Y-m-d') }}" placeholder="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    
                    <div class="row-fluid">
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label" for="firstName">Time Start</label>
                                <div class="controls">
                                    <input name="time_start" type="text" class="m-wrap span12 timepicker-24" id="firstName" placeholder="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label" for="lastName">Time End</label>
                                <div class="controls">
                                    <input name="time_end" type="text" class="m-wrap span12 timepicker-24" id="lastName" placeholder="">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                
                    <h3 class="form-section">Customer Information</h3>
                    
                    <div class="row-fluid">
                        <div class="span12 ">
                            <div class="control-group">
                                <label class="control-label">Company Name</label>
                                <div class="controls">
                                    <select name="company_id" class="span12 select2_category" id="company_id" tabindex="1" data-placeholder="Customer Name">
                                        <option value=""></option>
                                        @foreach($companies as $company)
                                        	<option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row--> 
                    
                    <div class="row-fluid">
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label">Title</label>
                                <div class="controls">
                                    <input name="title" type="text"  class="m-wrap span12" id="title"> 
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label" >Description</label>
                                <div class="controls">
                                  <textarea name="description" class="m-wrap span12" id="description"></textarea> 
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->           
                    <div class="row-fluid">
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label">Annex</label>
                                <div class="controls">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="icon-file fileupload-exists"></i> 
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-file">
                                            <span class="fileupload-new">Select file</span>
                                            <span class="fileupload-exists">Change</span>
                                            <input type="file" class="default" />
                                            </span>
                                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        
                    </div>
                  <div class="form-actions">
                        <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                    <a href="{{ Request::root()}}/reports/service" class="btn">Cancel</a>
                        <input name="op" type="hidden" id="op" value="1" />
                    </div>
                </form>
                <!-- END FORM--> 
            </div>
        </div>
        <!-- END EXTRAS PORTLET-->
    </div>
</div>
<!-- END PAGE CONTENT-->

@stop


@section('page_level_plugins')
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="{{ Request::root()}}/assets/plugins/select2/select2.min.js"></script>
    <script type="text/javascript" src="{{ Request::root()}}/assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
    <script type="text/javascript" src="{{ Request::root()}}/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="{{ Request::root()}}/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" src="{{ Request::root()}}/assets/plugins/clockface/js/clockface.js"></script>
	<script type="text/javascript" src="{{ Request::root()}}/assets/plugins/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="{{ Request::root()}}/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script> 
	<script type="text/javascript" src="{{ Request::root()}}/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
	<script type="text/javascript" src="{{ Request::root()}}/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
@stop

@section('page_level_scripts')
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="{{ Request::root()}}/assets/scripts/app.js"></script>
	<script src="{{ Request::root()}}/assets/scripts/form-samples.js"></script>
    <script src="{{ Request::root()}}/assets/scripts/form-components.js"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
@stop

@section('app_init')
	<script>
    jQuery(document).ready(function() {       
       //App.init();
       FormSamples.init();
	   FormComponents.init();
    });
    </script>
@stop


