<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ asset('dist/img/favicon.ico')}}" />
	<title>{{config('app.name')}} | Nouveau compte</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page"
	style="background-image: url({{asset('dist/img/background.jpg')}}); background-size: 100Vh;">
	<div class="login-box">
		<div class="login-logo">
			<img src="{{asset('dist/img/logo.png')}}" class="brand-image " height="150" alt="">
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body" style="background-color: rgba(253, 253, 255, 0.299)">
				<p class="login-box-msg">Nouveau Compte</p>


				<form method="POST" action="{{ route('register') }}">
					@csrf

					{{-- login --}}
					<div class="input-group mb-3">
						<input type="text" id="login" name="login" class="form-control @error('login') is-invalid @enderror"
							id="login" placeholder="login" required value="{{ old('login') }}" autofocus>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
						@error('login')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>


					{{-- mot de passe  --}}
					<div class="input-group mb-3">
						<input type="password" id="password" required
							class="form-control @error('password') is-invalid @enderror" name="password"
							autocomplete="current-password" placeholder="Mot de passe">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
						@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>



					{{-- password_confirm --}}
					<div class="input-group mb-3">
						<input type="password" class="form-control id=" password-confirm" @error('password')
							is-invalid @enderror" name="password_confirmation" placeholder="Confirmez le mot de passe">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-7">
							<button type="submit" class="btn offset-5 btn-primary btn-block">Créer mon compte</button>
						</div>
						<!-- /.col -->
					</div>
				</form>

				
				<p class="mb-0 text-center">
					<a href="{{route('login')}}" class="text-center">J'ai déja un compte</a>
				</p>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
</body>

</html>