@extends('dashboard.layout')
@section('content')
<form action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row align-items-center">
      <div class="col-md-12">
        <label  for="inputUserName">Name</label>
        <input type="text" class="form-control mb-2" id="inputUserName" value="{{$user->name}}" name="name" placeholder="User Name">
      </div>
      <div class="col-md-12">
        <label  for="inputUserEmail">User Email</label>
        <input type="email" class="form-control mb-2" value="{{$user->email}}" id="inputUserEmail" name="email" placeholder="User Email">
      </div>
      <div class="col-md-12">
        <label  for="inputUserPhone">User Phone</label>
        <input type="text" class="form-control mb-2" id="inputUserPhone" name="phone" placeholder="+880745573544" value="{{$user->profile->phone}}">
      </div>
      {{-- <div class="col-md-12">
        <label  for="inputUserCountry">Country</label>
        <select name="country" id="inputUserCountry" class="form-control">
          @if (!$countries->isEmpty())
              @foreach ($countries as $country)
                <option @if ($country->id == $user->profile->country->id )
                    {{'selected'}}
                @endif value="{{$country->id}}">{{$country->name}}</option>
              @endforeach
          @endif
        </select>
      </div> --}}
      <div class="col-md-12">
        <label  for="city">User City</label>
        <input type="text" class="form-control mb-2" id="city" name="city" value="{{$user->profile->city}}" placeholder="City">
      </div>
      <div class="col-md-12">
        <label  for="Thumbnail">Thumbnail</label>
        <img src="{{asset($user->profile->photo)}}" alt="">
        <input type="file" class="form-control form-file-controll mb-2" id="Thumbnail" name="photo" placeholder="Thumbnail"> 
      </div>
      <div class="col-md-12">
        <label  for="Role">Role</label>
        <select name="roles[]" id="Role" class="form-control">
          @if (!$roles->isEmpty())
              @foreach ($roles as $role)
                <option 
                @if (in_array($role->id,$user->roles->pluck('id')->toarray()))
                    {{'selected'}}
                @endif
                value="{{$role->id}}">{{$role->name}}</option>
              @endforeach
          @endif
        </select>
      </div>


      <div class="col-md-12">
        <button type="submit" class="btn btn-primary mb-2">Submit </button>
      </div>
    </div>
  </form>
@endsection