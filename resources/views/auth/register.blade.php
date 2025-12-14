<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - Países del Mundo</title>

    <!-- Fuentes -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

    <!-- Material Kit CSS -->
    <link href="{{ secure_asset('css/material-kit.min.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body class="register-page sidebar-collapse">

    <!-- Header con parallax (igual que welcome) -->
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <h1 class="title">Registrarse en Países del Mundo</h1>
                    <h4>Crea tu cuenta gratis y explora todos los países</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario centrado con Material Kit -->
    <div class="main main-raised">
        <div class="container">
            <div class="section section-signup">
                <div class="row">
                    <div class="col-md-5 ml-auto mr-auto">

                        <!-- Logo pequeño arriba del formulario -->
                        <div class="text-center mb-4">
                            <a href="/">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 80px;"> <!-- Cambia por tu logo si tienes -->
                                <!-- O usa el de Laravel si no tienes logo personalizado -->
                                <!-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> -->
                            </a>
                        </div>

                        <div class="card card-signup">
                            <div class="card-body">

                                <x-validation-errors class="mb-4 text-center" />

                                <form method="POST" action="{{ secure_url(route('register')) }}">
                                    @csrf

                                    <!-- Name -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="material-icons">face</i></span>
                                            </div>
                                            <input type="text" name="name" class="form-control" placeholder="Nombre..." value="{{ old('name') }}" required autofocus>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="material-icons">email</i></span>
                                            </div>
                                            <input type="email" name="email" class="form-control" placeholder="Email..." value="{{ old('email') }}" required>
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

                                    <!-- Confirm Password -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="material-icons">lock_outline</i></span>
                                            </div>
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña..." required>
                                        </div>
                                    </div>

                                    <!-- Terms (si está activado) -->
                                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                        <div class="form-check text-center mb-3">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="terms" required>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                Acepto los <a href="{{ route('terms.show') }}" target="_blank">Términos</a> y <a href="{{ route('policy.show') }}" target="_blank">Política de privacidad</a>
                                            </label>
                                        </div>
                                    @endif

                                    <!-- Botones -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-round btn-lg">Registrarse</button>
                                    </div>

                                    <div class="text-center mt-3">
                                        <a href="{{ route('login') }}" class="text-muted">¿Ya tienes cuenta? Iniciar sesión</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts Material Kit -->
    <script src="{{ secure_asset('js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ secure_asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ secure_asset('js/material-kit.min.js') }}" type="text/javascript"></script>

    @livewireScripts
</body>
</html>