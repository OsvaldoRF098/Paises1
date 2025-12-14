<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <!-- Fuentes de Google -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

        <!-- Material Kit CSS -->
        <link href="{{ secure_asset('css/material-kit.min.css') }}" rel="stylesheet">
        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        <!-- Material Kit JS -->
        <script src="{{ secure_asset('js/core/popper.min.js') }}" type="text/javascript"></script>
        <script src="{{ secure_asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ secure_asset('js/material-kit.min.js') }}" type="text/javascript"></script>
        @livewireScripts
    </body>
</html>
