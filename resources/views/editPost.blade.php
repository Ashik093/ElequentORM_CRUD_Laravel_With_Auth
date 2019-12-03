@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Update Post</h2>
		@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
		<form action="{{ url('update-post/'.$post->id) }}" method="post">
          @csrf
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleFormControlInput1">Post Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $post->title }}" name="title">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Author</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $post->author }}" name="author">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Tag</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $post->tag }}" name="tag">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="description">{{ $post->description }}</textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update Post</button>
          </div>
        </form>
	</div>
@endsection