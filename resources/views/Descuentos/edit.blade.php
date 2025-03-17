@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="frame">
            <h4>Editar Cupón</h4>

            <form action="{{ route('cupon.update', $cupon->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="codigo" class="form-label">Código del Cupón</label>
                    <input type="text" name="codigo" class="form-control input-field" value="{{ $cupon->codigo }}" required>
                </div>

                <div class="mb-3">
                    <label for="descuento" class="form-label">Descuento del Cupón</label>
                    <input type="number" name="descuento" class="form-control input-field" value="{{ $cupon->descuento }}" required>
                </div>

                <button type="submit" class="btn-primary">Actualizar Cupón</button>
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
            max-width: 400px;
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

        .btn-primary {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
@endsection
