<!DOCTYPE html>
<html lang="en">

<head>
    <title>Penomoran Surat dan Memo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('img/logo.ico') }}" />
    <!--===============================================================================================-->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <style>
		body {
			background-size: 100% 100%;
			background-repeat: no-repeat;
		}

		body,html {
			background-image: url('{{ asset('img/bg-01.jpg?$server') }}');
			height: 100%;
		}

		#profile-img {
			height:180px;
		}
		.h-80 {
			height: 80% !important;
		}
    </style>

</head>

<body>
	<div class="container h-80">
		<div class="row align-items-center h-100">
			<div class="col-3 mx-auto">
				<div class="text-center">
					@if (session('failed'))
					<div class="alert alert-danger">{{ session('failed') }}</div>
					@endif
					@if (session('success'))
					<div class="alert alert-success">{{ session('success') }}</div>
					@endif
					<p id="profile-name" class="profile-name-card"></p>
					<form class="form-signin" action="{{ route('verify.login') }}" method="post">
						@csrf
						
						<input type="text" name="username" id="inputPassword" class="form-control form-group" placeholder="Username" required autofocus>
						<input type="password" name="password" id="inputPassword" class="form-control form-group" placeholder="password" required autofocus>
						<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>
