@extends('template')

@section('page_level_styles')
	<link href="{{ Request::root()}}/assets/css/pages/project.css" rel="stylesheet" type="text/css"/>
@stop
@section('custom_breadcrumbs')
<li>
	<a href="{{url('projects')}}">Projects</a>
	<i class="icon-angle-right"></i>
</li>
@stop


@section('content')
	<h4>Progress: {{$attributes['progress']}}%</h4>
	<div class="progress progress-striped">
		<div style="width: {{$attributes['progress']}}%;" class="bar"></div>
	</div>
	<div class="row-fluid">
		<div class="portlet box blue project-details">
			<div class="portlet-title">
				<div class="caption"><i class="icon-cogs"></i>Project Details</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
					<a href="#portlet-config" data-toggle="modal" class="config"></a>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<div class="portlet-body flip-scroll">
						<table class="table table-hover">
							<tbody>
								<tr>
									<td><strong>Description</strong></td>
									<td>{{$attributes['description'] ? $attributes['description'] : 'Not Available.'}}</td>
								</tr>
								<tr>
									<td><strong>Client</strong></td>
									<td>{{$client['attributes']['firstname'] . " " . $client['attributes']['lastname']}}</td>
								</tr>
								<tr>
									<td><strong>Category</strong></td>
									<td>{{$attributes['category'] ? $attributes['category'] : 'Not Available.'}}</td>
								</tr>
								<tr>
									<td><strong>Phase</strong></td>
									<td>{{$attributes['phases'] ? $attributes['phases'] : 'Not Available.'}}</td>
								</tr>
								<tr>
									<td><strong>Time Spent</strong></td>
									<td>{{$attributes['time_spent'] ? $attributes['time_spent'] . ' minutes' : '0 minutes'}}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="span6">
					<div class="portlet-body flip-scroll">
						<table class="table table-hover">
							<tbody>
								<tr>
									<td><strong>Created On</strong></td>
									<td>{{date('Y-m-d g:i a', strtotime($attributes['created_at']))}}</td>
								</tr>
								<tr>
									<td><strong>Last Updated On</strong></td>
									<td>{{date('Y-m-d g:i a', strtotime($attributes['updated_at']))}}</td>
								</tr>
								<tr>
									<td><strong>Start</strong></td>
									<td>{{$attributes['start']}}</td>
								</tr>
								<tr>
									<td><strong>End</strong></td>
									<td>{{$attributes['end']}}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>	
		<div class="portlet">
			<a href="{{url('projects/edit') . '/' . $attributes['id']}}" class="btn red"><i class="icon-edit"></i> Edit Project</a>
			<a href="{{url('projects/delete') . '/' . $attributes['id']}}" class="btn black"><i class="icon-trash"></i> Delete Project</a>
		</div>	
	</div>
@stop