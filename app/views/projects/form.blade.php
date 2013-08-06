@extends('template')
@section('page_level_styles')
	<link href="{{ Request::root()}}/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css"/>

@stop

@section('custom_breadcrumbs')
<li>
	<a href="{{url('projects')}}">Projects</a>
	<i class="icon-angle-right"></i>
</li>
@stop


@section('content')
@if(!$edit_form)
	@if($errors['errors'] >= 1)
	    <div class="alert alert-error">
	        <button class="close" data-dismiss="alert"></button>
	        <strong>Error!</strong>
	        @foreach ($errors['errors'] as $error)
	            <div class="error">{{ $error }}</div>
	        @endforeach
	    </div>
	@endif 
@else
	@if($errors)
	    <div class="alert alert-error">
	        <button class="close" data-dismiss="alert"></button>
	        <strong>Error!</strong>
	        @foreach ($errors as $error)
	            <div class="error">{{ $error }}</div>
	        @endforeach
	    </div>
	@endif
@endif

@if($success)
	<div class="portlet-body">
		<div class="alert alert-success">
			<button class="close" data-dismiss="alert"></button>
			You successfully added <strong>{{ $success_attributes['name'] }}</strong> as your object!
		</div>
	</div>
@endif

@if($edit_form)
{{ Form::open(array('action' => array('ProjectController@projectEdit', $attributes['id']), 'class' => 'form-horizontal')) }}
@else
{{ Form::open(array('action' => 'ProjectController@projectHandleAdd', 'class' => 'form-horizontal')) }}
@endif
	
 
	@if($edit_form)
	{{ Form::hidden('id', $attributes['id']) }}
	@endif
	

	<div class="control-group">
		{{ Form::label('reference', 'Reference ID', array('class' => 'control-label')) }}
		<div class="controls">
			@if($attributes['reference'])
			{{ Form::text('reference', $attributes['reference'], array('readonly'))}}
			@else
			{{ Form::text('reference', $max_reference_number, array('readonly')) }}
			@endif	
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('name', 'Name', array('class' => 'control-label')) }}
		<div class="controls">
			@if($attributes['name'])
			{{ Form::text('name', $attributes['name'])}}
			@else
			{{ Form::text('name', '') }}
			@endif	
		</div>
	</div>


	<div class="control-group">
	{{ Form::label('description', 'Description', array('class' => 'control-label')) }}
		<div class="controls">
			@if($attributes['description'])
			{{ Form::textarea('description', $attributes['description']) }}
			@else
			{{ Form::textarea('description', '') }}
			@endif
		</div>
	</div>
	<div class="control-group">
		{{ Form::label('start', 'Start', array('class' => 'control-label')) }}
		<div class="controls">
			@if($attributes['start'])
			{{ Form::text('start', $attributes['start'], array('class'	=>	'start-date m-wrap m-ctrl-medium date-picker', 'readonly')) }}
			@else
			{{ Form::text('start', '', array('class'	=>	'start-date m-wrap m-ctrl-medium date-picker', 'readonly')) }}
			@endif
		</div>
	</div>
	<div class="control-group">
		{{ Form::label('end', 'End', array('class' => 'control-label')) }}
		<div class="controls">
			@if($attributes['end'])
			{{ Form::text('end', $attributes['end'], array('class'	=>	'end-date m-wrap m-ctrl-medium date-picker', 'readonly')) }}
			@else
			{{ Form::text('end', '', array('class'	=>	'end-date m-wrap m-ctrl-medium date-picker', 'readonly')) }}
			@endif
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('client_id', 'Client', array('class' => 'control-label')) }}
		<div class="controls">
			@if($attributes['client_id'])
					{{ Form::select('client_id', $clients, $attributes['client_id'], array('class' => 'chosen', 'data-placeholder' => 'Choose a Client', 'tabindex' => '1')) }}
			@else
					{{ Form::select('client_id', $clients,
					'', array('class' => 'chosen', 'data-placeholder' => 'Choose a Client', 'tabindex' => '1')) }}
			@endif
		</div>
	</div>
	<div class="control-group">
		{{ Form::label('progress', 'Progress', array('class' => 'control-label')) }}
		<div class="controls">
		@if($attributes['progress'])
		{{ Form::text('progress', $attributes['progress']) }}
		@else
		{{ Form::text('progress', '') }}
		@endif
		</div>
	</div>
	<div class="control-group">
	{{ Form::label('phases', 'Phases', array('class' => 'control-label')) }}
		<div class="controls">
			@if($attributes['phases'])
			{{ Form::text('phases', $attributes['phases']) }}
			@else
			{{ Form::text('phases', '') }}
			@endif
		</div>
	</div>
	<div class="control-group">
	{{ Form::label('category', 'Category', array('class' => 'control-label')) }}
		<div class="controls">
			@if($attributes['category'])
			{{ Form::text('category', $attributes['category']) }}
			@else
			{{ Form::text('category', '') }}
			@endif
		</div>
	</div>
	<div class="form-actions">
	{{ Form::submit('Save', array('class' => 'btn blue')) }}
	<a href="{{url('projects')}}" class="btn red">Cancel</a>
	</div>
{{ Form::close() }}
@stop


@section('page_level_scripts')
	<script src="{{ Request::root()}}/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript" ></script>
@stop

@section('app_init')
	<script>
		jQuery(document).ready(function() {   
			$('.start-date').datepicker({
				format: 'yyyy-mm-dd'
			});
			$('.end-date').datepicker({
				format: 'yyyy-mm-dd'
			});
		});
	</script>
@stop