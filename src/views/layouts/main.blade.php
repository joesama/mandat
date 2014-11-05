<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>Package Development</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	</head>
	<body>
		<section class="container-fluid">
		@foreach ($errors->all('<li>:message</li>') as $message)
		{{ $message }}
		@endforeach
			@yield('content')
		</section>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
		@yield('script')
	</body>
</html>
