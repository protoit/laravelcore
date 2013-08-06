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
            <td><strong>Name:</strong></td>
            <td>{{ $row->company->name }}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><strong>Address:</strong></td>
            <td>{{ $row->company->address }}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><strong>Postal Code:</strong></td>
            <td>{{ $row->company->zipcode }}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><strong>City:</strong></td>
            <td>{{ $row->company->city }}</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>