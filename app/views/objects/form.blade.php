@extends('template')
@section('custom_breadcrumbs')
<li>
	<a href="{{url('objects')}}">Objects</a>
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
{{ Form::open(array('action' => array('ObjectController@objectEdit', $attributes['id']), 'class' => 'form-horizontal')) }}
@else
{{ Form::open(array('action' => 'ObjectController@objectHandleAdd', 'class' => 'form-horizontal')) }}
@endif
	
	@if($edit_form)
	{{ Form::hidden('id', $attributes['id']) }}
	@endif
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
	<div class="form-actions">
	{{ Form::submit('Save', array('class' => 'btn blue')) }}
	<a href="{{url('objects')}}" class="btn red">Cancel</a>
	</div>
{{ Form::close() }}
@stop