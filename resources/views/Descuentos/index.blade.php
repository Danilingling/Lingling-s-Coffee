<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Descuentos</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kadwa:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Kadwa', sans-serif;
        }
        .container {
            text-align: center;
            margin-top: 30px;
        }
        .cupon {
            background: #ffcc80;
            border: 2px dashed #d84315;
            padding: 20px;
            margin: 20px auto;
            width: 300px;
            text-align: center;
            position: relative;
            border-radius: 10px;
        }
        .cupon h3 {
            margin: 0;
            font-size: 24px;
            color: #d84315;
        }
        .cupon p {
            margin: 5px 0;
            font-size: 18px;
        }
        .validez {
            font-size: 14px;
            color: #616161;
        }
        .cupon::before, .cupon::after {
            content: "";
            position: absolute;
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }
        .cupon::before {
            left: -10px;
        }
        .cupon::after {
            right: -10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="frame">
    <h2>Lingling's Coffee - Cupones</h2>

    @foreach($cupones as $cupon)
        <div class="cupon">
            <h3>Codigo: {{ $cupon->codigo }}</h3>
            <p>Descuento: <strong>{{ $cupon->descuento }}%</strong></p>
            <p class="validez">Válido desde: {{ $cupon->valido_desde }}</p>
            <p class="validez">Válido hasta: {{ $cupon->valido_hasta }}</p>
        </div>
    @endforeach
    </div>
</div>

</body>
</html>
