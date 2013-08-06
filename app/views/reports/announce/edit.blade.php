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
                <div class="caption"><i class="icon-reorder"></i>Update Announce Report</div>
                <div class="tools">
                </div>
            </div>
            <div class="portlet-body form">
           
                                
                <!-- BEGIN FORM-->
                <form action="" class="horizontal-form" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    <h3 class="form-section">Annouce Information</h3>
                    <div class="row-fluid">
                        
                            <div class="control-group">
                                <label class="control-label" for="firstName">Journal ID</label>
                                <div class="controls">
                                    <input name="shiftjournal_id" type="text" class="m-wrap" id="firstName" value="{{ $row->shiftjournal_id }}" placeholder="" data-required="1">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        
                            <div class="control-group">
                                <label class="control-label" for="lastName">Date and Time</label>
                                <div class="controls">
                                    <input name="datetime" type="text" class="m-wrap" id="datetime" value="{{ $row->datetime }}" placeholder="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        
                    </div>
                    <!--/row-->
                    
                    
                    <h3 class="form-section">Information about the victim / claimant:</h3>
                    <div class="row-fluid">
                        
                            <div class="control-group">
                                <label class="control-label">Company Name</label>
                                <div class="controls">
                                    {{ Form::companyDropdown() }}
                                </div>
                            </div>
                        	 
                             
                             <div class="control-group">
                                <label class="control-label">Object</label>
                                <div class="controls">
                                    {{ Form::objectDropdown() }}
                                </div>
                            </div>
                             
                             
                            <div class="control-group">
                                <label class="control-label" for="lastName">Organization Number</label>
                                <div class="controls">
                                    <input name="organization_id" type="text" class="m-wrap" id="organization_id" value="{{ $row->organization_id }}">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        
                    </div>
                    <!--/row-->
                    
                    
                    
                    <h3 class="form-section">Information Reviewed:</h3>
                    <div class="row-fluid">
                        
                            <div class="control-group">
                                <label class="control-label">Announce Name</label>
                                <div class="controls">
                                    <input name="announce_name" type="text" class="m-wrap" id="announce_name" value="{{ $row->announce_name }}">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Announce Date of Birth</label>
                                <div class="controls">
                                    <input name="announce_birth" type="text" class="m-wrap" id="announce_birth" value="{{ $row->announce_birth }}">
                                </div>
                            </div>
                            
                             <div class="control-group">
                                <label class="control-label">Identification (type / number):</label>
                                <div class="controls">
                                    <input name="announce_ident" type="text" class="m-wrap" id="announce_ident" value="{{ $row->announce_ident }}">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Review Address:</label>
                                <div class="controls">
                                    <input name="announce_address" type="text" class="m-wrap" id="announce_address" value="{{ $row->announce_address }}">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Review Zip Code:</label>
                                <div class="controls">
                                    <input name="announce_zipcode" type="text" class="m-wrap" id="announce_zipcode" value="{{ $row->announce_zipcode }}">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Review City</label>
                                <div class="controls">
                                    <input name="announce_city" type="text" class="m-wrap" id="announce_city" value="{{ $row->announce_city }}">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Reviw Phone:</label>
                                <div class="controls">
                                    <input name="announce_phone" type="text" class="m-wrap" id="announce_phone" value="{{ $row->announce_phone }}">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Announce Description:</label>
                                <div class="controls">
                                  <textarea name="announce_description" class="m-wrap" id="announce_description">{{ $row->announce_description }}</textarea>
                                </div>
                            </div>
            
                    </div>
                    <!--/row-->
                    
                    
                    <h3 class="form-section">Information about the guardian:</h3>
                    <div class="row-fluid">
                        
                            <div class="control-group">
                                <label class="control-label">Parent Name</label>
                                <div class="controls">
                                    <input name="parent_name" type="text" class="m-wrap" id="parent_name" value="{{ $row->parent_name }}">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Parent Address</label>
                                <div class="controls">
                                    <input name="parent_address" type="text" class="m-wrap" id="parent_address" value="{{ $row->parent_address }}">
                                </div>
                            </div>
                            
                             <div class="control-group">
                                <label class="control-label">Parent Zip Code:</label>
                                <div class="controls">
                                    <input name="parent_zipcode" type="text" class="m-wrap" id="parent_zipcode" value="{{ $row->parent_zipcode }}">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Parent City:</label>
                                <div class="controls">
                                    <input name="parent_city" type="text" class="m-wrap" id="parent_city" value="{{ $row->parent_city }}">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Parent Phone:</label>
                                <div class="controls">
                                    <input name="parent_phone" type="text" class="m-wrap" id="parent_phone" value="{{ $row->parent_phone }}">
                                </div>
                            </div>
                            
                          
            
                    </div>
                    <!--/row-->
                    
                    
                    
                    <h3 class="form-section">Event Information:</h3>
                    <div class="row-fluid">
                        
                            <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <input name="action_where" type="text" class="m-wrap" id="action_where" value="{{ $row->action_where }}">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Date and Time</label>
                                <div class="controls">
                                  <input name="action_datetime" type="text" class="m-wrap" id="action_datetime" value="{{ $row->action_datetime }}" placeholder="yyyy-mm-dd" />
                                </div>
                            </div>
                            
                             <div class="control-group">
                                <label class="control-label">Conditions:</label>
                                <div class="controls">
                                
                                {{ Form::conditionRadio() }}
                                    
                                 <input name="type_other" type="text" class="m-wrap" id="type_other" value="{{ $row->type_other }}">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Description:</label>
                                <div class="controls">
                                  <textarea name="announce_item" class="m-wrap" id="announce_item">{{ $row->announce_item }}</textarea>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Item Value</label>
                                <div class="controls">
                                  <input name="announce_item_value" type="text" class="m-wrap" id="announce_item_value" value="{{ $row->announce_item_value }}"/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Total</label>
                                <div class="controls">
                                  <input name="announce_item_sum" type="text" class="m-wrap" id="announce_item_sum" value="{{ $row->announce_item_sum }}"/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Product Status:</label>
                              <div class="controls">
                                    {{ Form::statusRadio() }}
                                    
                                  <input name="announce_item_status_other" type="text" class="m-wrap" id="announce_item_status_other">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Reviewed Status:</label>
                              <div class="controls">
                                    <label class="radio line">
                                    <input type="radio" name="announce_item_action" value="Reviewed been delivered to the Police" />
                                    Reviewed been delivered to the Police
                                    </label>
                                    <label class="radio line">
                                    <input type="radio" name="announce_item_action" value="CPS" />
                                    CPS
                                    </label>  
                                    <label class="radio line">
                                    <input type="radio" name="announce_item_action" value="Set Free" />
                                    Set Free
                                    </label>  
                                <label class="radio line">
                                  <input type="radio" name="announce_item_action" value="Other" />
                                    Other
                                  </label>  
                                    
                                  <input name="announce_item_action_other" type="text" class="m-wrap" id="announce_item_action_other">
                                </div>
                            </div>
                            
                   
                    </div>
                    <!--/row-->
                    
                    
                    <h3 class="form-section">Witness Information:</h3>
                    <div class="row-fluid">
                        
                            <div class="control-group">
                                <label class="control-label">Witness Name</label>
                                <div class="controls">
                                    <input name="witness_name" type="text" class="m-wrap" id="witness_name">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Witness Address</label>
                                <div class="controls">
                                    <input name="witness_address" type="text" class="m-wrap" id="witness_address">
                                </div>
                            </div>
                            
                             <div class="control-group">
                                <label class="control-label">Witness Zip Code:</label>
                                <div class="controls">
                                    <input name="witness_zipcode" type="text" class="m-wrap" id="witness_zipcode">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Witness City:</label>
                                <div class="controls">
                                    <input name="witness_city" type="text" class="m-wrap" id="witness_city">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Witness Phone:</label>
                                <div class="controls">
                                    <input name="witness_phone" type="text" class="m-wrap" id="witness_phone">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Short Description:</label>
                                <div class="controls">
                                  <textarea name="short_description" class="m-wrap" id="short_description"></textarea>
                                </div>
                            </div>
                            
                          
            
                    </div>
                    <!--/row-->
                    
                      
                    <div class="row-fluid">
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label">Appendix</label>
                                <div class="controls">
                                    
                                    <div id="filesContainer">
                                    	<input type="file" name="files[]"/>
                                    </div>
                                    
                                    <button type="button" class="btn" id="addFile">Add More</button>
                                    
                                    <!--<div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="icon-file fileupload-exists"></i> 
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-file">
                                            <span class="fileupload-new">Select file</span>
                                            <span class="fileupload-exists">Change</span>
                                            <input type="file" class="default" multiple="" />
                                            </span>
                                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                        
                                    </div>-->
                                    
                                    
                                </div>
                                
                            </div>
                        </div>
                        <!--/span-->
                        
                    </div>
                  <div class="form-actions">
                        <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                    <a href="{{ Request::root()}}/reports/announce" class="btn">Cancel</a>
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
	
	$('#addFile').click(function() {
		// when the add file button is clicked append
		// a new <input type="file" name="someName" />
		// to a filesContainer div
		$('#filesContainer').append(
			$('<input/>').attr('type', 'file').attr('name', 'files[]')
		);
	});
	
    jQuery(document).ready(function() {       
       //App.init();
       FormSamples.init();
	   FormComponents.init();
    });
    </script>
@stop


