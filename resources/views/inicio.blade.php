<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inicio</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Kadwa:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>

<div class="container">
    <div class="frame">
        <h2>Lingling's Coffee</h2>

        <div class="imagenes-container">
            <img src="{{ asset('img/taza_izq.png') }}" alt="Taza Izquierda" class="taza-img izquierda">

            <div class="cuadro_opciones">
                <!-- Opción 1: Menu -->
                <a href="{{ route('menu.dashboard') }}" class="opcion-btn">
                    <h2>Menú</h2>
                </a>

                <!-- Opción 2: Localización -->
                <a href="{{ route('localizacion') }}" class="opcion-btn">
                    <h2>Localización</h2>
                </a>

                <!-- Opción 3: Otra opción -->
                <a href="{{ route('cupon.index') }}" class="opcion-btn">
                    <h2>Cupones</h2>
                </a>

                <!-- Opción 4: Administracion -->
                <a href="{{ route('admin') }}" class="opcion-btn">
                    <h2>Administración</h2>
                </a>
            </div>

            <img src="{{ asset('img/taza_der.png') }}" alt="Taza Derecha" class="taza-img derecha">
        </div>
    </div>
</div>


</body>
</html>
