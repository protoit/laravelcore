<table class="table table-condensed table-hover">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Reporting Status:</strong></td>
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
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><strong>Date:</strong></td>
            <td>{{ $row->date }}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><strong>Time Start:</strong></td>
            <td>{{ $row->time_start }}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Time End:</strong></td>
          <td>{{ $row->time_end }}</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Report ID:</strong></td>
          <td>{{ $row->id }}</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Journal ID:</strong></td>
          <td>{{ $row->shiftjournal_id }}</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Object:</strong></td>
          <td>{{ $row->object }}</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Tjenestenr</strong></td>
          <td>{{ $row->tjenestenr }}</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
            <td><strong>Approved By:</strong></td>
            <td>
            @if($row->user)
            	{{ $row->user->firstname }} {{ $row->user->lastname }}
            @endif
            </td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>