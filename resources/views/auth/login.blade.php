<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Países del Mundo</title>

    <!-- Fuentes -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

    <!-- Material Kit CSS -->
    <link href="{{ secure_asset('css/material-kit.min.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body class="login-page sidebar-collapse">

    <!-- Header con parallax -->
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <h1 class="title">Iniciar Sesión</h1>
                    <h4>Accede a tu cuenta para explorar los países del mundo</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario centrado con Material Kit -->
    <div class="main main-raised">
        <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col-md-5 ml-auto mr-auto">

                        <!-- Logo pequeño -->
                        <div class="text-center mb-5">
                            <a href="/">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 80px;">
                                <!-- Si no tienes logo personalizado, usa este fallback -->
                                <!-- <x-application-logo class="w-20 h-20 fill-current text-primary" /> -->
                            </a>
                        </div>

                        <div class="card card-login">
                            <div class="card-body">

                                <x-validation-errors class="mb-4 text-center alert alert-danger" />

                                @if (session('status'))
                                    <div class="alert alert-success text-center mb-4">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ secure_url(route('login')) }}">
                                    @csrf

                                    <!-- Email -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="material-icons">email</i></span>
                                            </div>
                                            <input type="email" name="email" class="form-control" placeholder="Email..." value="{{ old('email') }}" required autofocus>
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="material-icons">lock_outline</i></span>
                                            </div>
                                            <input type="password" name="password" class="form-control" placeholder="Contraseña..." required>
                                        </div>
                                    </div>

                                    <!-- Remember me -->
                                    <div class="form-check text-center mb-4">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="remember">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            Recordarme
                                        </label>
                                    </div>

                                    <!-- Botones -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-round btn-lg">Iniciar Sesión</button>
                                    </div>

                                    <div class="text-center mt-4">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-muted">¿Olvidaste tu contraseña?</a>
                                            <br>
                                        @endif
                                        <a href="{{ route('register') }}" class="text-primary">¿No tienes cuenta? Registrarse</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ secure_asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ secure_asset('js/material-kit.min.js') }}" type="text/javascript"></script>

    @livewireScripts
</body>
</html>