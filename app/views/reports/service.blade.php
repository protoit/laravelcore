@extends('template')
@section('content')

<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box light-grey">
            <div class="portlet-title">
                <div class="caption"><i class="icon-globe"></i>Managed Table</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body">
              <div class="clearfix">
                    <div class="btn-group">
                        <button id="sample_editable_1_new" class="btn green">
                        Add New <i class="icon-plus"></i>
                        </button>
                    </div>
                    <div class="btn-group pull-right">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#">Print</a></li>
                            <li><a href="#">Save as PDF</a></li>
                            <li><a href="#">Export to Excel</a></li>
                        </ul>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                            <th>{{ Lang::get('table.sr.id') }}</th>
                            <th class="hidden-480">{{ Lang::get('table.sr.date') }}</th>
                            <th class="hidden-480">{{ Lang::get('table.sr.status') }}</th>
                            <th class="hidden-480">{{ Lang::get('table.sr.time') }}</th>
                            <th class="hidden-480">{{ Lang::get('table.sr.customer') }}</th>
                            <th class="hidden-480">{{ Lang::get('table.sr.title') }}</th>
                            <th class="hidden-480">{{ Lang::get('table.sr.object') }}</th>
                            <th class="hidden-480">{{ Lang::get('table.sr.employee_id') }}</th>
                            <th class="hidden-480">{{ Lang::get('table.sr.journal_id') }}</th>
                            <th >{{ Lang::get('table.sr.options') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $row)
                        <tr class="odd gradeX">
                            <td><input type="checkbox" class="checkboxes" value="1" /></td>
                            <td>{{ $row->id }}</td>
                            <td class="hidden-480">{{ $row->datetime }}</td>
                            <td class="hidden-480">{{ $row->status }}</td>
                            <td class="hidden-480">{{ $row->start }} {{ $row->end }}</td>
                            <td class="hidden-480">{{ $row->company_name }}</td>
                            <td class="hidden-480">{{ $row->title }}</td>
                            <td class="hidden-480">{{ $row->object }}</td>
                            <td class="hidden-480">{{ $row->tjenestenr }}</td>
                            <td>{{ $row->shiftjournal_id }}</td>
                            <td >&nbsp;</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE CONTENT-->
@stop