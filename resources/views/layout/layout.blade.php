<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="">
	<style>
		.container{
			margin: 0 auto;
			width: 960px;
			background: #cccc;
			padding: 20px;
		}
		body{
			margin: 0;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2>@yield('title')</h2>
			@if (session('message'))
			    <div class="alert alert-success">
			        {{ session('message') }}
			    </div>
			@endif

		@yield('content')
	</div>
</body>
</html>