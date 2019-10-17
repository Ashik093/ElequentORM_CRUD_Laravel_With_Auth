@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Add News</h2>
		@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
		<form action="{{ url('create-news') }}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleFormControlInput1">News Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Author</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="author">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Image</label>
                <input type="file" id="exampleFormControlInput1" name="image">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Details</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="details"></textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add News</button>
          </div>
        </form>
	</div>
@endsection