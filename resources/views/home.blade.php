@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard <a href="" class="btn btn-sm btn-primary" style="float: right;"  data-toggle="modal" data-target="#exampleModal">Add Post</a></div>
                <a href="{{ route('add.news') }}" class="btn btn-sm btn-success">Add News</a>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('all.post') }}" class="btn btn-sm btn-success">All Posts</a>    
                    <a href="{{ route('all.news') }}" class="btn btn-sm btn-success">All News</a>                
                    @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                     @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
        <form action="{{ url('create-post') }}" method="post">
          @csrf
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleFormControlInput1">Post Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Post Title Here" name="title">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Author</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Author Name" name="author">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Tag</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tag Here" name="tag">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Create Post</button>
          </div>
        </form>
    </div>
  </div>
</div>
@endsection
