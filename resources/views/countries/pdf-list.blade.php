<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Países del Mundo</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 20px;
            font-size: 12px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #0275d8;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        img.flag {
            width: 40px;
            height: auto;
            vertical-align: middle;
        }
        .text-center {
            text-align: center;
        }
        .footer {
            position: fixed;
            bottom: 20px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #888;
        }
        @page {
            margin: 2cm;
        }
    </style>
</head>
<body>
    <h1>Listado de Países del Mundo</h1>
    <p class="text-center">Total de países: {{ $countries->count() }} | Generado el {{ now()->format('d/m/Y \a \l\a\s H:i') }}</p>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Bandera</th>
                <th>Nombre Oficial</th>
                <th>Capital</th>
                <th>Población</th>
                <th>Región</th>
            </tr>
        </thead>
        <tbody>
            @foreach($countries as $country)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center"><img class="flag" src="{{ $country->flag }}" alt="Bandera"></td>
                    <td>{{ $country->name }}</td>
                    <td>{{ $country->capital ?? 'Sin capital' }}</td>
                    <td>{{ number_format($country->population) }}</td>
                    <td>{{ $country->region }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Generado el {{ now()->format('d/m/Y \a \l\a\s H:i') }} — Sistema de Países del Mundo
    </div>
</body>
</html>