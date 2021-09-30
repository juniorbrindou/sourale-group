<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('dist/img/favicon.ico')}}" />
    <title>{{config('app.name')}} | Connexion</title>

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
            <img draggable="false" src="{{asset('dist/img/logo.png')}}" class="brand-image " height="150" alt="">
        </div>
        <!-- /.login-logo -->
        <div class="card" style="background: #fff0; color=#FFF">
            <div class="card-body login-card-body" style="background: #fff0;">
                <p class="text-lg login-box-msg text-light text-bold text-uppercase">Connectez vous</p>


                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- login --}}
                    <div class="mb-3 input-group">
                        <input type="text" required class="form-control @error('login') is-invalid @enderror" id="login"
                            placeholder="Nom de l'utilisateur" name="login" value="{{ old('login') }}" autofocus>
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
                    <div class="mb-3 input-group">
                        <input type="password" required class="form-control @error('password') is-invalid @enderror"
                            name="password" autocomplete="current-password" placeholder="Mot de passe">
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


                    <div class="row">
                        <div class="col-5">
                            <button type="submit" class="btn offset-9 btn-primary btn-block">Se connecter</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
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
