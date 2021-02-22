@extends('dashboard.layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Posts</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{route('posts.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New Post</a>
        </div>
        </div>
    </div>

@if (! $posts->isEmpty())
    <div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Posts</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->content}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{route('posts.show',$post->id)}}" type="button" class="btn btn-light">Show</a> 
                       {{-- @can('allowed',$post) --}}
                        <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light">Delete</button> 
                        </form>
                        <a href="{{route('posts.edit',$post->id)}}" type="button" class="btn btn-light">Edit</a> 
                        {{-- @endcan --}}
                      </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
  @else
  <p class="alert alert-info">No Posts Found......</p>
@endif
@endsection