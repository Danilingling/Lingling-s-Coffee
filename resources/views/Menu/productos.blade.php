<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <div class="frame">
        <h2 class="text-center">Lista de Productos</h2>

        <!-- Botón para agregar nuevo producto -->
        <div class="text-right">
            <a href="{{ route('menu.create') }}" class="btn btn-success">+ Agregar Producto</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered text-center">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Imagen</th>
                <th>Opciones</th>  <!-- Nueva columna -->
            </tr>
            </thead>
            <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>${{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>
                        @if($producto->imagen)
                            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto" width="60">
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('menu.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('menu.destroy', $producto->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .container {
        margin-top: 30px;
    }

    h2 , a {
        text-align: center;
        margin-bottom: 20px;
        font-size: 28px;
        color: #ffffff;
        font-weight: bold;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    .table th {
        background: #343a40;
        color: white;
        padding: 12px;
        text-transform: uppercase;
    }

    .table td {
        padding: 10px;
        border: 1px solid #ddd;
    }

    .table img {
        border-radius: 5px;
        border: 1px solid #ddd;
        padding: 3px;
        background: #fff;
    }

    .table tbody tr:hover {
        background: #f1f1f1;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        margin-bottom: 15px;
    }

    /* Estilos para los botones */
    .btn {
        display: inline-block;
        padding: 8px 12px;
        font-size: 14px;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
        text-align: center;
        transition: 0.3s;
    }

    .btn-warning {
        background-color: #ffc107;
        color: black;
        border: none;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .d-inline-block {
        display: inline-block;
    }
</style>
</body>
</html>
