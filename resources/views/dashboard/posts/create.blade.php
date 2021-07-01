@extends('dashboard.layout')
@section('content')
<form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
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
        <label for="inputPostName">Title</label>
        <input type="text" class="form-control mb-2" id="inputPostName" name="title" placeholder="Post Title">
      </div>
      <div class="col-md-12">
        <label for="inputPostName">Description</label>
        <textarea type="text" class="form-control mb-2" id="inputPostName" name="content" placeholder="Description"></textarea>
      </div>
      <div class="col-md-12">
        <label for="inputCategory">Category Select</label>
        <select class="form-control mb-2" name="category_id">
          <option value="0">Select A Category</option>
          @if (!$categories->isEmpty())
              @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->title}}</option>
              @endforeach
          @endif
        </select>
      </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary mb-2">Add New Post</button>
      </div>
    </div>
  </form>
@endsection