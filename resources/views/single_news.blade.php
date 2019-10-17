@extends('welcome')

@section('content')
	<div class="">
            <h2 class="post-title">
              {{ $singleData->title }}
            </h2>
            <img src="{{ URL::to($singleData->image) }}" style="width: 100%;" alt="">
            <h6 class="post-subtitle">
              {{ $singleData->details }}
            </h6>
          <p class="post-meta">Posted by
            <a href="#">{{ $singleData->author }}</a>
            on September 24, 2019</p>
     </div>
@endsection