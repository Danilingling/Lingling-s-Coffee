<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cupón</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Kadwa:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }


        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        h4 {
            font-family: Arial, serif;
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 15px;
            display: none;
        }

        .mb-3 {
            margin-bottom: 15px;
        }

        .form-label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
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
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h4>Agregar Nuevo Cupón</h4>

    <div class="alert-success" id="successMessage">Cupón agregado con éxito.</div>

    <div class="mb-3">
        <label for="codigo" class="form-label">Código del Cupón</label>
        <input type="text" id="codigo" class="form-control" required maxlength="20">
    </div>

    <div class="mb-3">
        <label for="descuento" class="form-label">Descuento (%)</label>
        <input type="number" id="descuento" class="form-control" required min="0" max="100" step="0.01">
    </div>

    <div class="mb-3">
        <label for="valido_desde" class="form-label">Válido Desde</label>
        <input type="date" id="valido_desde" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="valido_hasta" class="form-label">Válido Hasta</label>
        <input type="date" id="valido_hasta" class="form-control" required>
    </div>

    <button class="btn-primary" onclick="agregarCupon()">Agregar Cupón</button>
</div>

<script>
    function agregarCupon() {
        const codigo = document.getElementById('codigo').value;
        const descuento = document.getElementById('descuento').value;
        const validoDesde = document.getElementById('valido_desde').value;
        const validoHasta = document.getElementById('valido_hasta').value;

        if (!codigo || !descuento || !validoDesde || !validoHasta) {
            alert("Todos los campos son obligatorios.");
            return;
        }

        fetch("{{ route('cupon.store') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ codigo, descuento, valido_desde: validoDesde, valido_hasta: validoHasta })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('successMessage').style.display = 'block';
                    setTimeout(() => {
                        document.getElementById('successMessage').style.display = 'none';
                    }, 3000);
                } else {
                    alert("Hubo un error al agregar el cupón.");
                }
            })
            .catch(error => console.error("Error:", error));
    }
</script>

</body>
</html>
