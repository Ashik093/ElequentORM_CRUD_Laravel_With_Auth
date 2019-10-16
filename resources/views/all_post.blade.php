@extends('layouts.app')

@section('content')
<div class="container">
	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Tag</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($post as $data)
	    <tr>
	      <td>{{ $data->id }}</td>
	      <td>{{ $data->title }}</td>
	      <td>{{ $data->author }}</td>
	      <td>{{ $data->tag }}</td>
	      <td class="btn-group"><a href="" class="btn btn-sm btn-info">Edit</a><a href="" class="btn btn-sm btn-danger">Delete</a></td>
	    </tr>
	@endforeach
  </tbody>
</table>
</div>

@endsection