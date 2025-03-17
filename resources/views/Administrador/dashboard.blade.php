<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administracion</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Kadwa:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>

<div class="container">
    <div class="frame">
        <h2>Administracion Lingling's</h2>

        <div class="imagenes-container">
            <img src="{{ asset('img/taza_izq.png') }}" alt="Taza Izquierda" class="taza-img izquierda">

            <div class="cuadro_opciones">
                <!-- Opción 1: Modificar Menu -->
                <a href="{{ route('menu.productos') }}" class="opcion-btn">
                    <h2>Modificar Menu</h2>
                </a>

                <!-- Opción 2: Modificar Descuentos -->
                <a href="{{ route('cupon.descuentos') }}" class="opcion-btn">
                    <h2>Modificar Descuentos</h2>
                </a>

                <!-- Opción 4: Salir -->
                <a href="{{ route('inicio') }}" class="opcion-btn">
                    <h2>Salir</h2>
                </a>
            </div>

            <img src="{{ asset('img/taza_der.png') }}" alt="Taza Derecha" class="taza-img derecha">
        </div>
    </div>
</div>


</body>
</html>
