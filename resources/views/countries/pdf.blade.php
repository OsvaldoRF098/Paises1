<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ficha del País: {{ $country->name }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 40px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .flag {
            text-align: center;
            margin-bottom: 30px;
        }
        .flag img {
            max-width: 300px;
            height: auto;
            border: 2px solid #ddd;
            border-radius: 8px;
        }
        h1 {
            color: #0275d8;
            font-size: 36px;
        }
        .info {
            font-size: 18px;
            line-height: 1.8;
        }
        .info strong {
            color: #333;
        }
        .footer {
            position: fixed;
            bottom: 30px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $country->name }}</h1>
    </div>

    <div class="flag">
        <img src="{{ $country->flag }}" alt="Bandera de {{ $country->name }}">
    </div>

    <div class="info">
        <p><strong>Capital:</strong> {{ $country->capital ?? 'No tiene capital oficial' }}</p>
        <p><strong>Población:</strong> {{ number_format($country->population) }} habitantes</p>
        <p><strong>Región:</strong> {{ $country->region }}</p>
    </div>

    <div class="footer">
        Generado el {{ now()->format('d/m/Y \a \l\a\s H:i') }} — Sistema de Países del Mundo
    </div>
</body>
</html>