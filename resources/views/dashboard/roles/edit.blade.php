@extends('dashboard.layout')
@section('content')
<form action="{{route('roles.update',$roles->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-row align-items-center">
      <div class="col-md-8">
        <label class="sr-only" for="inputRoleName">Update</label>
        <input type="text" class="form-control mb-2" id="inputRoleName" name="name" placeholder="Role Name">
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-primary mb-2">Update Role</button>
      </div>
    </div>
  </form>
@endsection