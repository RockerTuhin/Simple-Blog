@extends('welcome')

@section('content')
    @php
        $all_news = DB::table('newss')->get();
    @endphp
    @foreach($all_news as $item)
      <div class="post-preview">
        <a href="{{ URL::to('/view-news/'.$item->id) }}">
          <h2 class="post-title">
            {{ $item->title }}
          </h2>
          <img src="{{ URL::to($item->image) }}" style="height: 100%;width: 300px;">
          <h6>
            {{ $item->details }}
          </h6>
        </a>
        <p class="post-meta">Posted by
          <a href="#">{{ $item->author }}</a>
          on September 24, 2018</p>
      </div>
      <hr>
   @endforeach
  <!-- Pager -->
  <div class="clearfix">
    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
  </div>
@endsection
