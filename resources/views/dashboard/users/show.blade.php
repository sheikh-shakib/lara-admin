@extends('dashboard.layout')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{route('users.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New User</a>
        </div>
        </div>
    </div>

@if ($user)
    <div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>#</th>
            <th>User Name</th>
            <th>Thumbnail</th>
            <th>City</th>
            <th>Country</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>
                    <img src="{{asset('storage/app/public/'.$user->profile->photo)}}" height="50" width="50" alt="">
                </td>
                <td>{{$user->profile->city}}</td>
                <td>{{$user->profile->country}}</td>
                <td>{{$user->profile->phone}}</td>
                <td>
                    {{$user->roles->implode('name',',')}}
                </td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                <td>
                    <div class="btn-group" user="group" aria-label="Basic example">
                        <form action="{{route('users.destroy',$user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light">Delete</button> 
                        </form>
                        <a href="{{route('users.edit',$user->id)}}" type="button" class="btn btn-light">Edit</a> 
                      </div>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
  @else
  <p class="alert alert-info">No users Record Found......</p>
@endif
@endsection