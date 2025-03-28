<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Descuentos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <div class="frame">
        <h2 class="text-center">Lista de Descuentos</h2>

        <!-- Botón para agregar nuevo cupón -->
        <div class="text-right">
            <a href="{{ route('cupon.create') }}" class="btn btn-success">+ Agregar Cupón</a>
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
                <th>Código</th>
                <th>Descuento (%)</th>
                <th>Válido Desde</th>
                <th>Válido Hasta</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cupones as $cupon)
                <tr>
                    <td>{{ $cupon->id }}</td>
                    <td>{{ $cupon->codigo }}</td>
                    <td>{{ $cupon->descuento }}%</td>
                    <td>{{ $cupon->valido_desde }}</td>
                    <td>{{ $cupon->valido_hasta }}</td>
                    <td>
                        <a href="{{ route('cupon.edit', $cupon->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('cupon.destroy', $cupon->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este cupón?')">Eliminar</button>
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
    h2, a {
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
