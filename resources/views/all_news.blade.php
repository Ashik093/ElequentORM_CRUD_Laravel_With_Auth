@extends('layouts.app')

@section('content')
<div class="container">
	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($news as $data)
	    <tr>
	      <td>{{ $data->id }}</td>
	      <td>{{ $data->title }}</td>
	      <td>{{ $data->author }}</td>
	      <td><img src="{{ $data->image }}" height="50" width="50" alt=""></td>
	      <td class="btn-group"><a href="" class="btn btn-sm btn-info">Edit</a><a href="{{ URL::to('/delete-post/'.$data->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a><a href="" class="btn btn-sm btn-primary">View</a></td>
	    </tr>
	@endforeach
  </tbody>
</table>
</div>

@endsection