@extends('layouts.app')
@section('content')
<div class="container">
	<table class="table table-dark">
		  <thead>
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">Title</th>
			      <th scope="col">Author</th>
			      <th scope="col">image</th>
			      <th scope="col">Action</th>
			    </tr>
		  </thead>
		  <tbody>
		  	@foreach($all_news_info as $item)
			    <tr>
			      <td scope="row">{{ $item->id }}</td>
			      <td>{{ $item->title }}</td>
			      <td>{{ $item->author }}</td>
			      <td><img src="{{ URL::to($item->image) }}" style="height: 80px;width: 80px;"></td>
			      <td>
			      	<a href="" class="btn btn-sm btn-info">Edit</a>
			      	<a href="{{ URL::to('/delete-news/'.$item->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
			      </td>
			    </tr>
			@endforeach
		  </tbody>
	</table>
</div>
@endsection