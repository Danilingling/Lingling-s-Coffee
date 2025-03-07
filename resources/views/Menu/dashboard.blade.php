<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menú</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Kadwa:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="menu_frame">
    <h2 class="producto_name">Menú de Productos</h2>

    <div class="carta">
        <div class="productos-container">
            @foreach($productos as $producto)
                <div class="producto">
                    <a href="{{ route('resena.show', $producto->id) }}">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
                    </a>
                    <div class="producto-info">
                        <h3>{{ $producto->nombre }}</h3>
                        <p>Precio: ${{ $producto->precio }}</p>
                        <p>{{ $producto->descripcion }}</p>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #5e3a3a;
        color: #fff;
    }

    .carta {
        background-color: #3E2525;
        padding: 30px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        width: 100%;
        max-width: 1600px;
        max-height: 800px;
        margin: 10px auto;
    }

    .productos-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .producto {
        background-color: #6e4c4c;
        padding: 15px;
        display: flex;
        align-items: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease-in-out;
    }

    .producto:hover {
        transform: scale(1.05);
    }

    .producto img {
        width: 150px;
        height: 150px;
        border-radius: 10px;
        margin-right: 15px;
    }

    .producto-info {
        flex-grow: 1;
    }

    h2 {
        color: #f8e8c8;
        font-size: 35px;
    }

    h3 {
        color: #e1b382;
    }

</style>
</body>
</html>
