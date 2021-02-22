@extends('dashboard.layout')
@section('content')
<form action="{{route('posts.update',$post->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-row align-items-center">
      <div class="col-md-12">
        <label for="inputCategoryName">Title</label>
       <input type="text" class="form-control mb-2" id="inputCategoryName" value="{{$post->title}}" name="title" placeholder="Post Title">
      </div>
      <div class="col-md-12">
        <label for="inputCategoryName">Description</label>
        <textarea type="text" class="form-control mb-2"  id="inputCategoryName" name="content" placeholder="Description"> {{$post->content}} </textarea>
      </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary mb-2">Update Post</button>
      </div>
    </div>
  </form>
@endsection