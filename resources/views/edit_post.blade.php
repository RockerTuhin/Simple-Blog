@extends('layouts.app')
@section('content')
<div class="container">
	@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
	<form action="{{ url('/update-post/'.$singlepost->id) }}" method="POST">
        @csrf
          <div class="modal-body">
              <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $singlepost->title }}" name="title">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Author Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $singlepost->author }}" name="author">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Tags</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $singlepost->tag }}" name="tags">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ $singlepost->description }}</textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
      </form>
</div>
@endsection