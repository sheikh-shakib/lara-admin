@extends('dashboard.layout')
@section('content')
<form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
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
        <label  for="inputUserFullName">User Full Name</label>
        <input type="text" class="form-control mb-2" id="inputUserFullName" name="name" placeholder="Full Name">
      </div>
      <div class="col-md-12">
        <label  for="inputUserName">User Name</label>
        <input type="text" class="form-control mb-2" id="inputUserName" name="username" placeholder="User Name">
      </div>
      <div class="col-md-12">
        <label  for="inputUserEmail">User Email</label>
        <input type="email" class="form-control mb-2" id="inputUserEmail" name="email" placeholder="User Email">
      </div>
      <div class="col-md-12">
        <label  for="inputUserPassword">User Password</label>
        <input type="password" class="form-control mb-2" id="inputUserPassword" name="password" placeholder="User Password">
      </div>
      <div class="col-md-12">
        <label  for="inputUserPhone">User Phone</label>
        <input type="text" class="form-control mb-2" id="inputUserPhone" name="phone" placeholder="+880745573544">
      </div>
      <div class="col-md-12">
        <label  for="inputUserCountry">Country</label>
        <select name="country" id="inputUserCountry" class="form-control">
          @if (!$countries->isEmpty())
              @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
              @endforeach
          @endif
        </select>
      </div>
      <div class="col-md-12">
        <label  for="city">User City</label>
        <input type="text" class="form-control mb-2" id="city" name="city" placeholder="City">
      </div>
      <div class="col-md-12">
        <label  for="Thumbnail">Thumbnail</label>
        <input type="file" class="form-control form-file-controll mb-2" id="Thumbnail" name="photo" placeholder="Thumbnail"> 
      </div>
      <div class="col-md-12">
        <label for="Role">Role</label>
        <select name="roles[]" id="Role" class="form-control" multiple>
          @if (!$roles->isEmpty())
              @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
              @endforeach
          @endif
        </select>
      </div>

   
      <div class="col-md-12" style="margin-top:10px ">
        <button type="submit" class="btn btn-primary mb-2">Add New Category</button>
      </div>
    </div>
  </form>
@endsection