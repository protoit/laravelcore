<table class="table table-striped table-bordered table-hover" id="sample_1">
    <thead>
        <tr>
            <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
            <th>{{ Lang::get('table.sr.id') }}</th>
            <th>{{ Lang::get('table.sr.date') }}</th>
            <th>{{ Lang::get('table.sr.status') }}</th>
            <th>{{ Lang::get('table.sr.time') }}</th>
            <th>{{ Lang::get('table.sr.customer') }}</th>
            <th>{{ Lang::get('table.sr.title') }}</th>
            <th>{{ Lang::get('table.sr.object') }}</th>
            <th>{{ Lang::get('table.sr.employee_id') }}</th>
            <th>{{ Lang::get('table.sr.journal_id') }}</th>
            <th>{{ Lang::get('table.sr.options') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
        <tr class="odd gradeX">
            <td><input type="checkbox" class="checkboxes" value="1" /></td>
            <td>{{ $row->id }}</td>
            <td>{{ $row->date }}</td>
            <td>
            @if($row->status == 'new')
                <span class="label label-warning">{{ $row->status }}</span>
            @elseif($row->status == 'approved')
                <span class="label label-success">{{ $row->status }}</span>
            @elseif($row->status == 'deleted')
                <span class="label label-inverse">{{ $row->status }}</span>
                @elseif($row->status == 'not_approve')
                <span class="label label-danger">{{ $row->status }}</span>    
            @endif
            
            </td>
            <td>{{ $row->time_start }} - {{ $row->time_end }}</td>
            <td>{{ $row->company->name }}</td>
            <td>{{ $row->title }}</td>
            <td>
            @if($row->object != NULL)
            	 {{ $row->object->name }}
            @endif
            </td>
            <td>{{ $row->employee_id }}</td>
            <td>{{ $row->shiftjournal_id }}</td>
            <td >
            <a href="{{ Request::root()}}/reports/service/edit/{{ $row->id }}" class="btn mini purple"><i class="icon-edit"></i></a>
            <a href="#myModal3" class="btn mini black" data-toggle="modal" data-id="{{ $row->id }}"><i class="icon-trash"></i></a>
            <a href="#" class="btn mini green" onclick="openBrWindow('{{ Request::root()}}/preview/service/{{ $row->id }}','')"><i class="icon-print"></i></a>
            <view href="{{ Request::root()}}/reports/service/view/{{ $row->id }}"></view></td>
        </tr>
        @endforeach
    </tbody>
</table>