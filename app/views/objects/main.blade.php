@extends('template')
@section('content')

{{-- Validation Message For Deleting --}}
@if(Session::get('delete_message'))
	<div class="portlet-body">
		<div class="alert alert-success">
			<button class="close" data-dismiss="alert"></button>
			{{ Session::get('delete_message') }}
		</div>
	</div>
@endif

{{-- Validation Message for Editing --}}
@if(Session::get('update_message'))
		<div class="portlet-body">
			<div class="alert alert-success">
				<button class="close" data-dismiss="alert"></button>
				{{ Session::get('update_message') }}
			</div>
		</div>
@endif

<div class="row-fluid">
	<div class="responsive span12 fix-offset" data-tablet="span12 fix-offset" data-desktop="span12">
		<div class="portlet">
			<a href="{{url('objects/add')}}" class="btn blue"><i class="icon-plus"></i> Add Object</a>
		</div>
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption"><i class="icon-cogs"></i>All Objects</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
					<a href="#portlet-config" data-toggle="modal" class="config"></a>
				</div>
			</div>
			<div class="portlet-body flip-scroll">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$counter = 1;
						?>
						@foreach($objects as $object)
						<tr>
							<td>{{$counter++;}}</td>
							<td>{{$object->name}}</td>
							<td>
								<a href="{{url('objects/edit/' . $object->id)}}" class="btn mini red">Edit</a>
								<a href="{{url('objects/delete/' . $object->id)}}" class="btn mini black">Delete</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
		<!-- END EXAMPLE TABLE PORTLET-->
</div>
@stop

@section('page_level_scripts')

	<script src="{{ Request::root()}}/assets/plugins/select2/select2.min.js" type="text/javascript" ></script>
	<script src="{{ Request::root()}}/assets/plugins/data-tables/jquery.dataTables.js" type="text/javascript" ></script>
	<script src="{{ Request::root()}}/assets/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>
	<script src="{{ Request::root()}}/assets/scripts/table-managed.js" type="text/javascript" ></script>
@stop