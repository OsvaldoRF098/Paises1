<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Países del Mundo</title>

    <!-- Fuentes de Google -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

    <!-- Material Kit CSS -->
    <link href="{{ asset('css/material-kit.min.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body class="landing-page sidebar-collapse">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent" color-on-scroll="100">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="/">Países del Mundo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-white btn-round">Iniciar sesión</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="btn btn-primary btn-round">Registrarse</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('countries.index') }}" class="dropdown-item">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header con parallax -->
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title">Bienvenido a Países del Mundo</h1>
                    <h4>Explora información actualizada de todos los países: banderas, capitales, población y más.</h4>
                    <br>
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg btn-round">Registrarse gratis</a>
                        <a href="{{ route('login') }}" class="btn btn-white btn-lg btn-round">Iniciar sesión</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="main main-raised">
        <div class="container">
            <div class="section text-center py-5">
                <h2 class="title">Una vez registrado, podrás:</h2>
                <div class="row">
                    <div class="col-md-4">
                        <i class="material-icons text-primary" style="font-size: 60px;">search</i>
                        <h4>Buscar en tiempo real con Algolia</h4>
                    </div>
                    <div class="col-md-4">
                        <i class="material-icons text-primary" style="font-size: 60px;">picture_as_pdf</i>
                        <h4>Exportar a PDF</h4>
                    </div>
                    <div class="col-md-4">
                        <i class="material-icons text-primary" style="font-size: 60px;">sync</i>
                        <h4>Resincronizar datos</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Material Kit -->
    <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/material-kit.min.js') }}" type="text/javascript"></script>

    @livewireScripts
</body>
</html>