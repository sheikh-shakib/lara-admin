@extends('dashboard.layout')
@section('content')
<form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row align-items-center">
      <div class="col-md-12">
        <label class="sr-only" for="inputCategoryName">Title</label>
        <input type="text" class="form-control mb-2" id="inputCategoryName" name="title" placeholder="Category Name">
      </div>
      <div class="col-md-12">
        <label class="sr-only" for="inputCategoryName">Content</label>
        <textarea type="text" class="form-control mb-2" id="inputCategoryContent" name="content" placeholder="Content"></textarea>
      </div>
      <div class="col-md-12">
        <label class="sr-only" for="inputCategoryName">Thumbnail</label>
        <input type="file" class="form-control form-file-controll mb-2" id="inputCategoryName" name="thumbnail" placeholder="Thumbnail"> 
      </div>
    </br>
      <div class="col-md-12">
        <label class="sr-only" for="inputCategoryName">Select</label>
        <select name="parent_id" id="">
          <option value="0">Select A Parent Category</option>
          @if (!$categories->isEmpty())
              @foreach ($categories as $category)
                 <option value="{{$category->id}}">{{$category->title}}</option> 
              @endforeach
          @endif
        </select>
      </div>
    </br>
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary mb-2">Add New Category</button>
      </div>
    </div>
  </form>
@endsection