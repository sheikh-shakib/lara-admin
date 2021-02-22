@extends('layout.layout')
@section('title','Create Post')
@section('content')
This is a slot message 
@endcomponent
	<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" >
		@csrf
		<input type="email" name="email" placeholder="Email"> <br><br>
		<input type="email" name="email_confirmation" placeholder="Confirm Email"> <br><br>
		@if($errors->has('email'))
			@foreach($errors->get('email') as $error)
				 {{$error}}<br>
			@endforeach
		@endif<br>
		<textarea name="content" placeholder="Message"></textarea> <br><br>
		@if($errors->has('content'))
			@foreach($errors->get('content') as $error)
				 {{$error}}<br>
			@endforeach
		@endif<br>
		<label>Computer<input type="checkbox" name="check[]" ></label>
		<label>Laptop<input type="checkbox" name="check[]" ></label> 
		<label>Mobile<input type="checkbox" name="check[]" ></label> <br>
		@if($errors->has('check'))
			@foreach($errors->get('check') as $error)
				 {{$error}}<br>
			@endforeach
		@endif
		<br>
		<label>Please Select An Image: <input type="file" id="imgUpload1" name="imgUpload1"></label><br>
			@if($errors->has('imgUpload1'))
			@foreach($errors->get('imgUpload1') as $error)
				 {{$error}}<br>
			@endforeach
		@endif
		<br>
		<label for="">Before Date:<input type="date" name="start_date" value="" placeholder=""></label><br>
					@if($errors->has('start_date'))
			@foreach($errors->get('start_date') as $error)
				 {{$error}}<br>
			@endforeach
		@endif<br>
		<label for="">After Date:<input type="date" name="end_date" value="" placeholder=""></label><br>
			@if($errors->has('end_date'))
			@foreach($errors->get('end_date') as $error)
				 {{$error}}<br>
			@endforeach
		@endif<br>
		<input type="submit" name="submit" value="Create Post">
	</form>
@endsection