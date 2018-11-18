@extends('welcome')

@section('content')

  <div class="post-preview">
    <a href="#">
      <h2 class="post-title">
        {{ $single_news_info->title }}
      </h2>
      <img src="{{ URL::to($single_news_info->image) }}" style="height: 100%;width: 400px;">
      <h6>
        {{ $single_news_info->details }}
      </h6>
    </a>
    <p class="post-meta">Posted by
      <a href="#">{{ $single_news_info->author }}</a>
      on September 24, 2018</p>
  </div>
  <!-- Pager -->
  <div class="clearfix">
    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
  </div>
  
@endsection
