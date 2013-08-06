<table class="table table-condensed table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>Description</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($attachments as $attachment)
        <tr>
            <td>{{ $attachment->id }}</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>{{ basename($attachment->attachment_url) }}</td>
            <td>
            <a href="{{ Request::root()}}/reports/service/download/{{ $attachment->id }}" class="btn blue">Download</a>
            <a href="#deleteFile" data-toggle="modal" data-id="{{ $attachment->id }}" data-service_id="{{ $attachment->service_id }}" class="btn red delete_file">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>