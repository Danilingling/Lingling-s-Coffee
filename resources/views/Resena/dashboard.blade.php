@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <div class="container">
        <div class="producto-detalle">
            <h2>{{ $producto->nombre }}</h2>
            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="producto-imagen">
            <p class="descripcion">{{ $producto->descripcion }}</p>
            <p class="precio">Precio: ${{ $producto->precio }}</p>
            <p class="calificacion">Calificación promedio: ⭐{{ number_format($promedio, 1) }} / 5</p>
        </div>

        <div class="resena-form">
            <h3>Deja tu reseña</h3>
            <form action="{{ route('resena.store', $producto->id) }}" method="POST">
                @csrf
                <label for="nombre_cliente">Tu Nombre:</label>
                <input type="text" name="nombre_cliente" id="nombre_cliente" required>

                <label for="comentario">Comentario:</label>
                <textarea name="comentario" id="comentario" required></textarea>

                <label for="calificacion">Calificación:</label>
                <select name="calificacion" id="calificacion" required>
                    <option value="1">1 ⭐</option>
                    <option value="2">2 ⭐⭐</option>
                    <option value="3">3 ⭐⭐⭐</option>
                    <option value="4">4 ⭐⭐⭐⭐</option>
                    <option value="5">5 ⭐⭐⭐⭐⭐</option>
                </select>

                <button type="submit">Enviar Reseña</button>
            </form>
        </div>

        <div class="resenas-lista">
            <h3>Reseñas</h3>
            @foreach($producto->resenas as $resena)
                <div class="resena-item">
                    <strong>{{ $resena->nombre_cliente }}</strong> - ⭐{{ $resena->calificacion }} / 5
                    <p>{{ $resena->comentario }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 10px;
            font-family: Arial, sans-serif;
            background-color: #aa9482;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .producto-imagen {
            display: block;
            margin: 20px auto;
            width: 250px;
            border-radius: 8px;
        }
        .descripcion, .precio, .calificacion {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #5a4637;
        }
        h3 {
            color: #8b5e3c;
            margin-top: 20px;
        }
        .resena-form, .resenas-lista {
            background-color: #fff8ee;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #5a4637;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #b39c85;
            border-radius: 4px;
            font-size: 1rem;
        }
        button {
            background-color: #8b5e3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #a06b48;
        }
        .resena-item {
            padding: 15px;
            border-bottom: 1px solid #d3c1ae;
            color: #5a4637;
        }
        .resena-item:last-child {
            border-bottom: none;
        }
    </style>
@endsection
