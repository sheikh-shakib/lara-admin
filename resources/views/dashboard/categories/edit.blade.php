@extends('dashboard.layout')
@section('content')
<form action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row align-items-center">
      <div class="col-md-12">
        <label class="sr-only" for="inputCategoryName">Title</label>
        <input type="text" class="form-control mb-2"  value="{{$category->title}}" id="inputCategoryName" name="title" placeholder="Category Name">
      </div>
      <div class="col-md-12">
        <label class="sr-only" for="inputCategoryName">Content</label>
        <textarea type="text" class="form-control mb-2" id="inputCategoryName" name="content" placeholder="Content">{{$category->content}}</textarea>
      </div>
      <div class="col-md-12">
        <img src="{{asset('storage/app/'.$category->thumbnail)}}" class="img-fluid img-thumbnail" width="50" height="50" alt="">
        <label class="sr-only" for="inputCategoryName">Thumbnail</label>
        <input type="file" class="form-control form-control-file mb-2" id="inputCategoryName" name="thumbnail" placeholder="Thumbnail">
      </div>
      <div class="col-md-12">
        <label class="sr-only" for="inputCategoryName">Select</label>
        <select name="parent_id" id="">
          <option value="0">Select A Parent Category</option>
          @if (!$categories->isEmpty())
              @foreach ($categories as $cats)
                 <option @if ($category->parent_id == $cats->id)
                     {{'selected'}}
                 @endif value="{{$cats->id}}">{{$cats->title}}</option> 
              @endforeach
          @endif
        </select>
      </div>
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary mb-2">Add New Category</button>
      </div>
    </div>
  </form>
@endsection