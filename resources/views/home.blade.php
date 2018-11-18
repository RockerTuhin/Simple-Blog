@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger pull-right btn-sm" style="float: right;">Add New</a></div>
                <a href="{{ route('/add-news') }}" class="btn btn-primary">Add News</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('/all-post') }}">All Posts</a>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @php
                        //$all_post_info = App\Post::orderBy('id','DESC')->get();
                         $all_post_info = App\Post::all();
                    @endphp
                    <table class="table table-dark">
                          <thead>
                                <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Title</th>
                                  <th scope="col">Author</th>
                                  <th scope="col">Tags</th>
                                  <th scope="col">Action</th>
                                </tr>
                          </thead>
                          <tbody>
                            @foreach($all_post_info as $item)
                                <tr>
                                  <td scope="row">{{ $item->id }}</td>
                                  <td>{{ $item->title }}</td>
                                  <td>{{ $item->author }}</td>
                                  <td>{{ $item->tag }}</td>
                                  <td>
                                    <a href="{{ URL::to('/edit-post/'.$item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ URL::to('/delete-post/'.$item->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                  </td>
                                </tr>
                            @endforeach
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('/insert-post') }}" method="POST">
        @csrf
          <div class="modal-body">
              <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Author Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Author Name" name="author">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Tags</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tags" name="tags">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection
