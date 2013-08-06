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
              
              <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="reference">Reference</label>
                    <div class="controls">
                      <input name="reference" 
                      type="text" 
                      class="m-wrap 
                      span12" 
                      id="reference" 
                      placeholder="" 
                      data-required="1"
                      value="{{$info->reference}}">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="name">Name</label>
                    <div class="controls">
                      <input name="name" 
                      type="text" 
                      class="m-wrap span12" 
                      id="name" 
                      placeholder="" 
                      data-required="1"
                      value="{{$info->name}}">
                    </div>
                  </div>
                </div>
              </div>

              <!--/row-->
              <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label">Client</label>
                    <div class="controls">
                      
                      {{ Form::select('client_id', $clients, $info->client_id) }}
                      
                    </div>
                  </div>
                </div>
              </div>

              <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="phone">Phone</label>
                    <div class="controls">
                      <input name="phone" 
                      type="text" 
                      class="m-wrap span12" 
                      id="phone" 
                      placeholder="" 
                      data-required="1"
                      value="{{$info->phone}}">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="mobile">mobile</label>
                    <div class="controls">
                      <input name="mobile" 
                      type="text" 
                      class="m-wrap span12" 
                      id="mobile" 
                      placeholder="" 
                      data-required="1"
                      value="{{$info->mobile}}">
                    </div>
                  </div>
                </div>
              </div>

               <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="address">Address</label>
                    <div class="controls">
                      <input name="address"
                       type="text" 
                       class="m-wrap span12" 
                       id="address" 
                       placeholder="" 
                       data-required="1"
                       value="{{$info->address}}">
                    </div>
                  </div>
                </div>
              </div>

               <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="zipcode">Zip Code</label>
                    <div class="controls">
                      <input name="zipcode" 
                      type="text" 
                      class="m-wrap span12" 
                      id="zipcode" 
                      placeholder="" 
                      data-required="1"
                      value="{{$info->zipcode}}">
                    </div>
                  </div>
                </div>
              </div>

               <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="zipcode">city</label>
                    <div class="controls">
                      <input name="city" 
                      type="text" 
                      class="m-wrap span12" 
                      id="city" 
                      placeholder="" 
                      data-required="1"
                      value="{{$info->city}}">
                    </div>
                  </div>
                </div>
              </div>

               <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="website">Website</label>
                    <div class="controls">
                      <input name="website" 
                      type="text" 
                      class="m-wrap span12" 
                      id="website" 
                      placeholder="" 
                      data-required="1"
                      value="{{$info->website}}">
                    </div>
                  </div>
                </div>
              </div>

               <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="company_location">Company Location</label>
                    <div class="controls">
                      <input name="company_location" 
                      type="text" 
                      class="m-wrap span12" 
                      id="company_location" 
                      placeholder="" 
                      data-required="1"
                      value="{{$info->company_location}}">
                    </div>   

                  </div>
                </div>
              </div>


               <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="company_location">Status</label>
                    <div class="controls">
                    <label class="control-label" for="inactive">
                       <input name="inactive" 
                       id="inactive" 
                       type="checkbox" 
                       value="1" <?php if($info->inactive == 1) echo 'checked';?>> Active             
                    </label>
                    </div>   
                  </div>
                </div>
              </div>
              
              
              <div class="form-actions">
                <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                <a href="{{ Request::root()}}/company/lists" class="btn">Cancel</a>
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


