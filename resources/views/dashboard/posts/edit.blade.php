@extends('dashboard.layout')
@section('content')
<form action="{{route('posts.update',$post->id)}}" method="POST">
    @csrf
    @method('PUT')
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
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
        <label for="inputCategory">Select Category</label>
        <select name="category_id" class="form-control mb-2">
          <option value="0" >Select A Category</option>
          @if (!$categories->isEmpty())
              @foreach ($categories as $category)
                  <option value="{{$category->id}}" @if ($post->category_id==$category->id) selected @endif >{{$category->title}}</option>
              @endforeach
          @endif
        </select>
      </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary mb-2">Update Post</button>
      </div>
    </div>
  </form>
@endsection