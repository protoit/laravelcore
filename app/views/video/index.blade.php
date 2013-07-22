@extends('template')
@section('content')
<br />
<h4 class="text-success">{{ $title }}<span class="badge badge-success"><?=$count;?></span></h4>
<table width="100%" id="myTable" class="table">
  <thead>
  <tr>
    <th width="3%">&nbsp;</th>
    <th width="22%"><strong>Title</strong></th>
    <th width="12%"><strong>Author</strong></th>
    <th width="30%">Description</th>
    <th width="18%"><strong>Video URL</strong></th>
    <td width="15%">
      <a href="{{Request::root()}}/admin/video/add" class="btn btn-primary btn-small">Add</a>
    </td>
  </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
  
  @foreach($rows as $row)
  <tr>
    <td><?=$i++;?></td>
    <td>{{ $row->title }}</td>
    <td>{{ $row->author }}</td>
    <td>{{ $row->description }}</td>
    <td>{{ $row->url }}</td>
    <td>
      <a href="{{Request::root()}}/admin/video/edit/{{ $row->id }}" class="btn btn-primary btn-small">Edit</a>
      <a href="#" class="btn btn-small" id="delete" val="{{ $row->id }}">Delete</a>
    </td>
  </tr>
  @endforeach
  </tbody>
</table>


<?php echo $rows->links(); ?>


<script>
$(document).ready(function() 
    { 
        $("#myTable").tablesorter(); 
    } 
);

$('a#delete').click(function(){

var val = $(this).attr('val');

//alert(val);

if (confirm("Are you sure?")) {
	$.post('<?php echo Request::root().'/admin/video/delete/';?>'+val);
	$(this).parent().parent().remove();
}
return false;

});
</script>  

@stop

