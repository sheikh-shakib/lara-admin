@extends('dashboard.layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">categories</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{route('categories.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New category</a>
        </div>
        </div>
    </div>

@if ($category)
    <div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>User</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td>{{$category->content}}</td>
                <td><img src="{{asset($category->thumbnail)}}" alt=""></td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td></td>
                <td>
                    <div class="btn-group" category="group" aria-label="Basic example">
                        <a href="{{route('categories.show',$category->id)}}" type="button" class="btn btn-light">Show</a> 
                        <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light">Delete</button> 
                        </form>
                        <a href="{{route('categories.edit',$category->id)}}" type="button" class="btn btn-light">Edit</a> 
                      </div>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
  @else
  <p class="alert alert-info">No categories Record Found......</p>
@endif
@endsection