<table class="table table-condensed table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Tjenestenr</th>
            <th>Description</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($history as $row1)
        <tr>
            <td>{{ $row1->id }}</td>
            <td>{{ $row1->datetime }}</td>
            <td>{{ $row1->tjenestenr }}</td>
            <td>{{ $row1->description }}</td>
            <td>
            <a href="#report_history" class="btn mini purple" data-toggle="modal" data-id="{{ $row1->id }}"><i class="icon-edit"></i></a>
            <a href="#myModal3" class="btn mini black" data-toggle="modal" data-id="{{ $row1->id }}" data-service_id="{{ $row1->service_reports_id }}"><i class="icon-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>