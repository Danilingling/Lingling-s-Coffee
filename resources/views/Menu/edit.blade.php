@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="frame">
            <h4>Editar Producto</h4>

            <form action="{{ route('menu.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Producto</label>
                    <input type="text" name="nombre" class="form-control input-field" value="{{ $producto->nombre }}" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control input-field">{{ $producto->descripcion }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" name="precio" class="form-control input-field" step="0.01" value="{{ $producto->precio }}" required>
                </div>

                <div class="mb-3">
                    <label for="categoria_id" class="form-label">Categoría</label>
                    <select name="categoria_id" class="form-control input-field" required>
                        <option value="" disabled>Selecciona una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" name="imagen" class="form-control input-field">
                    @if($producto->imagen)
                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-preview">
                    @endif
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save"></i> Actualizar Producto
                    </button>
                    <a href="{{ route('menu.opciones') }}" class="btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </form>
        </div>
    </div>

    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .frame {
            max-width: 450px;
            width: 100%;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h4 {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-bottom: 15px;
            font-size: 22px;
            font-weight: bold;
            color: #333;
        }

        .mb-3 {
            margin-bottom: 12px;
        }

        .form-label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .input-field {
            width: calc(100% - 20px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            display: block;
            margin: 0 auto;
        }

        .input-field:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.5);
        }

        .img-preview {
            display: block;
            width: 100px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 15px;
        }

        .btn-primary, .btn-secondary {
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            width: 100%;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
@endsection
