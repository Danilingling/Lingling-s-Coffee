<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Ticket</title>
    <script>
        function agregarProducto() {
            let container = document.getElementById("productos-container");
            let div = document.createElement("div");
            div.classList.add("producto-item");

            div.innerHTML = `
                <select name="productos[]" required>
                    @foreach($productos as $producto)
            <option value="{{ $producto->id }}">{{ $producto->nombre }} - ${{ $producto->precio }}</option>
                    @endforeach
            </select>
            <input type="number" name="cantidades[]" placeholder="Cantidad" min="1" required>
            <button type="button" onclick="this.parentElement.remove()">❌</button>`;

            container.appendChild(div);
        }
    </script>
    <style>
        body { font-family: Arial, sans-serif; color: #3E2525 ; background-color: #5e3a3a; padding: 40px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .form-group { margin-bottom: 15px; }
        label { font-weight: bold; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; }
        button { background-color: #007bff; color: white; padding: 8px; border: none; cursor: pointer; margin-top: 5px; }
        button:hover { background-color: #0056b3; }
        .producto-item { display: flex; gap: 10px; margin-bottom: 5px; }
        .producto-item button {
            background-color: #40302e;
            padding: 5px;
            color: #111; /* Hace la tacha mucho más oscura */
            font-weight: bold;
            font-size: 16px;
        }

        .ticket_h2{ color: #3E2525; font-size: 30px}
    </style>
</head>
<body>

<div class="container">

    <h2 class="ticket_h2">Crear Nuevo Ticket</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="ticket_id">ID del Ticket Físico:</label>
            <input type="number" name="ticket_id" id="ticket_id" required>
        </div>

        <h4>Productos Comprados</h4>
        <div id="productos-container"></div>

        <button type="button" onclick="agregarProducto()">+ Agregar Producto</button>

        <button type="submit">Registrar Ticket</button>
    </form>
</div>

</body>
</html>
