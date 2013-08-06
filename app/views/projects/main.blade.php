@extends('template')
@section('page_level_styles')
	<link href="{{ Request::root()}}/assets/css/pages/project.css" rel="stylesheet" type="text/css"/>
@stop
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
			<a href="{{url('projects/add')}}" class="btn blue"><i class="icon-plus"></i> Add Project</a>
		</div>
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption"><i class="icon-cogs"></i>All Projects</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
					<a href="#portlet-config" data-toggle="modal" class="config"></a>
				</div>
			</div>
			<div class="portlet-body flip-scroll">
				<table class="table table-hover project-list">
					<thead>
						<tr>
							<th>Project ID</th>
							<th>Name</th>
							<th>Client</th>
							<th>Progress</th>
							<th>Start</th>
							<th>End</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($projects as $project)
						<tr onclick="document.location = '{{url('projects') . "/view/" . $project->id}}';">
							<td>{{$project->reference}}</td>
							<td>{{$project->name}}</td>
							<td>{{ $project->client->firstname }} {{ $project->client->lastname }}</td>
							<td>{{$project->progress}}%</td>
							<td>{{$project->start}}</td>
							<td>{{$project->end}}</td>
							<td>
								<a href="{{url('projects/edit/' . $project->id)}}" class="btn mini red">Edit</a>
								<a href="{{url('projects/delete/' . $project->id)}}" class="btn mini black">Delete</a>
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
