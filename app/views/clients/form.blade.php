@extends('template')
@section('custom_breadcrumbs')
<li>
	<a href="{{url('clients')}}">Clients</a>
	<i class="icon-angle-right"></i>
</li>
@stop

@section('content')

@if(count($errors) >= 1)
    <div class="alert alert-error">
        <button class="close" data-dismiss="alert"></button>
        <strong>Error!</strong>
        @foreach ($errors as $error)
            <div class="error">{{ $error }}</div>
        @endforeach
    </div>
@endif

@if($success)
	<div class="portlet-body">
		<div class="alert alert-success">
			<button class="close" data-dismiss="alert"></button>
			You successfully added <strong>{{ $success_attributes['firstname'] . ' ' . $success_attributes['lastname'] }}</strong> as your client!
		</div>
	</div>
@endif

@if($edit_form)
{{ Form::open(array('action' => array('ClientController@clientEdit', $attributes['id']), 'class' => 'form-horizontal')) }}
@else
{{ Form::open(array('action' => 'ClientController@clientHandleAdd', 'class' => 'form-horizontal')) }}
@endif
	
	@if($edit_form)
	{{ Form::hidden('id', $attributes['id']) }}
	@endif
	<div class="control-group">
		{{ Form::label('firstname', 'First Name', array('class' => 'control-label')) }}
		<div class="controls">
			@if($attributes['firstname'])
			{{ Form::text('firstname', $attributes['firstname'])}}
			@else
			{{ Form::text('firstname', '') }}
			@endif	
		</div>
	</div>
	<div class="control-group">
		{{ Form::label('lastname', 'Last Name', array('class' => 'control-label')) }}
		<div class="controls">
			@if($attributes['lastname'])
			{{ Form::text('lastname', $attributes['lastname']) }}
			@else
			{{ Form::text('lastname', '') }}
			@endif
		</div>
	</div>
	<div class="control-group">
	{{ Form::label('email', 'Email', array('class' => 'control-label')) }}
		<div class="controls">
		@if($attributes['email'])
		{{ Form::email('email', $attributes['email'], array('placeholder' => 'youremail@sample.com')) }}
		@else
		{{ Form::email('email', '', array('placeholder' => 'youremail@sample.com')) }}
		@endif
		</div>
	</div>
	<div class="control-group">
		{{ Form::label('phone', 'Phone Number', array('class' => 'control-label')) }}
		<div class="controls">
		@if($attributes['phone'])
		{{ Form::text('phone', $attributes['phone']) }}
		@else
		{{ Form::text('phone', '') }}
		@endif
		</div>
	</div>
	<div class="control-group">
	{{ Form::label('mobile', 'Mobile Number', array('class' => 'control-label')) }}
		<div class="controls">
			@if($attributes['mobile'])
			{{ Form::text('mobile', $attributes['mobile']) }}
			@else
			{{ Form::text('mobile', '') }}
			@endif
		</div>
	</div>
	<div class="control-group">
	{{ Form::label('address', 'Address', array('class' => 'control-label')) }}
		<div class="controls">
			@if($attributes['address'])
			{{ Form::textarea('address', $attributes['address']) }}
			@else
			{{ Form::textarea('address', '') }}
			@endif
		</div>
	</div>
	<div class="form-actions">
	{{ Form::submit('Save', array('class' => 'btn blue')) }}
	</div>
{{ Form::close() }}
@stop