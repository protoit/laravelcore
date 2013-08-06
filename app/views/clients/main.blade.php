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
			<a href="{{url('clients/add')}}" class="btn blue"><i class="icon-plus"></i> Add Client</a>
		</div>
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption"><i class="icon-cogs"></i>All Clients</div>
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
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Mobile</th>
							<th>Address</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$counter = 1;
						?>
						@foreach($clients as $client)
						<tr>
							<td>{{$counter++;}}</td>
							<td>{{$client->firstname}}</td>
							<td>{{$client->lastname}}</td>
							<td><a href="mailto:{{$client->email}}">{{$client->email}}</a></td>
							<td>{{$client->phone}}</td>
							<td>{{$client->mobile}}</td>
							<td>{{$client->address}}</td>
							<td>
								<a href="{{url('clients/edit/' . $client->id)}}" class="btn mini red">Edit</a>
								<a href="{{url('clients/delete/' . $client->id)}}" class="btn mini black">Delete</a>
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