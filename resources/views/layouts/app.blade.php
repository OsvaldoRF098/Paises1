<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - {{ $title ?? 'Dashboard' }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

        <!-- Material Kit CSS -->
        <link href="{{ asset('css/material-kit.min.css') }}" rel="stylesheet">

        <!-- Livewire Styles -->
        @livewireStyles
    </head>
    <body class="index-page sidebar-collapse">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent" color-on-scroll="100">
            <div class="container">
                <div class="navbar-translate">
                    <a class="navbar-brand" href="{{ route('countries.index') }}">{{ config('app.name') }}</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.show') }}">Perfil</a>
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Registro</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="page-header header-filter" data-parallax="true" style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80'); height: 40vh;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        @if (isset($header) && $header)
                            <h1 class="title">{{ $header }}</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="main main-raised">
            <div class="container" style="margin-top: -60px; min-height: 60vh;">
                {{ $slot }}
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/material-kit.min.js?v=2.0.7') }}" type="text/javascript"></script>

        @livewireScripts
        @stack('scripts')
    </body>
</html>