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
            <form action="" class="horizontal-form" method="post" novalidate="novalidate" enctype="multipart/form-data">

            <div class="row-fluid">
              <div class="span3">
                <div class="control-group">
                  <label class="control-label">Photo</label>
                  <div class="controls">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <input type="hidden" value="" name="input">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"> 
                      <img src="{{ Request::root() }}/{{ User::getPicture($info->id, 'userpic') }}" alt=""></div>
                      <div class="fileupload-preview fileupload-exists thumbnail" 
                              style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div> <span class="btn btn-file"><span class="fileupload-new">Select image</span> 
                      <span class="fileupload-exists">Change</span>
                        <input type="file" class="default" name="userpic">
                      </span> <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="span3">
                <div class="control-group">
                  <label class="control-label">Signature</label>
                  <div class="controls">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <input type="hidden" value="" name="input">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"> 
                      <img src="{{ Request::root() }}/{{ User::getPicture($info->id, 'signature') }}" alt=""></div>
                      <div class="fileupload-preview fileupload-exists thumbnail" 
                              style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div> <span class="btn btn-file"><span class="fileupload-new">Select image</span> 
                      <span class="fileupload-exists">Change</span>
                        <input type="file" class="default" name="signature">
                      </span> <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
              <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="username">Username</label>
                    <div class="controls">
                      <input name="username" 
                      type="text" 
                      class="m-wrap span12" 
                      id="username" 
                      placeholder="" 
                      data-required="1"
                      value="{{ $info->username }}">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="firstname">First Name</label>
                    <div class="controls">
                      <input name="firstname" 
                      type="text" 
                      class="m-wrap span12" 
                      id="firstname" 
                      placeholder="" 
                      data-required="1"
                      value="{{ $info->firstname }}">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="lastname">Last Name</label>
                    <div class="controls">
                      <input name="lastname" 
                      type="text" 
                      class="m-wrap span12" 
                      id="lastname" 
                      placeholder="" 
                      data-required="1"
                      value="{{ $info->lastname }}">
                    </div>
                  </div>
                </div>
              </div>

               <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="email">Email</label>
                    <div class="controls">
                      <input name="email" 
                      type="text" 
                      class="m-wrap span12" 
                      id="email" 
                      placeholder="" 
                      data-required="1"
                      value="{{ $info->email }}">
                    </div>
                  </div>
                </div>
              </div>

               <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="title">Title</label>
                    <div class="controls">
                      <input name="title" 
                      type="text" 
                      class="m-wrap span12" 
                      id="title" 
                      placeholder="" 
                      data-required="1"
                      value="{{ $info->title }}">
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
                      value="{{ $info->address }}">
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
                      value="{{ $info->zipcode }}">
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
                      value="{{ $info->city }}">
                    </div>
                  </div>
                </div>
              </div>

               <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="tjenestenr">Employee ID</label>
                    <div class="controls">
                      <input name="tjenestenr" 
                      type="text" 
                      class="m-wrap span12" 
                      id="tjenestenr" 
                      placeholder="" 
                      data-required="1"
                      value="{{ $info->tjenestenr }}">
                    </div>   

                  </div>
                </div>
              </div>

               <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="phone">Phone Number</label>
                    <div class="controls">
                      <input name="phone" 
                      type="text" 
                      class="m-wrap span12" 
                      id="phone" 
                      placeholder="" 
                      data-required="1"
                      value="{{ $info->phone }}">
                    </div>   

                  </div>
                </div>
              </div>

               <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="admin">Admin</label>
                    <div class="controls">
                    <label class="control-label" for="admin">
                       <input name="admin" 
                       id="admin" 
                       type="checkbox" 
                       value="1"
                       <?php if($info->admin == '1') echo 'checked';?>> Admin             
                    </label>
                    </div>   
                  </div>
                </div>
              </div>

               <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="status">Status</label>
                    <div class="controls">
                    <label class="control-label" for="status">
                       <input name="inactive" 
                       id="status" 
                       type="checkbox" 
                       value="active" 
                       <?php if($info->status == 'active') echo 'checked';?>> Active             
                    </label>
                    </div>   
                  </div>
                </div>
              </div>
              
              
              <div class="form-actions">
                <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                <a href="{{ Request::root()}}/user/lists" class="btn">Cancel</a>
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


