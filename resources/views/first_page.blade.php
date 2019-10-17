@extends('welcome')
@section('content')
	 	@php
            $news = DB::table('news')->get();
      	@endphp
        @foreach($news as $row)
        <div class="post-preview">
          <a href="{{ URL::to('/view-news/'.$row->id) }}">
            <h2 class="post-title">
              {{ $row->title }}
            </h2>
            <img src="{{ URL::to($row->image) }}" width="100%" alt="">
            <h6 class="post-subtitle">
              {{ $row->details }}
            </h6>
          </a>
          <p class="post-meta">Posted by
            <a href="#">{{ $row->author }}</a>
            on September 24, 2019</p>
        </div>
        <hr>
        @endforeach

        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>

@endsection