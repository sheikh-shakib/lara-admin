@extends('dashboard.layout')
@section('content')
<form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row align-items-center">
      <div class="col-md-12">
        <label for="inputCategoryName">Title</label>
        <input type="text" class="form-control mb-2" id="inputCategoryName" name="title" placeholder="Post Title">
      </div>
      <div class="col-md-12">
        <label for="inputCategoryName">Description</label>
        <textarea type="text" class="form-control mb-2" id="inputCategoryName" name="content" placeholder="Description"></textarea>
      </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary mb-2">Add New Category</button>
      </div>
    </div>
  </form>
@endsection