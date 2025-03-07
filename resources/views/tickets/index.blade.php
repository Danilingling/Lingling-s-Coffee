<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .ticket { border: 2px dashed #333; padding: 15px; margin: 10px 0; }
    </style>
</head>
<body>

<h2>Tickets Generados</h2>

@foreach($tickets as $ticket)
    <div class="ticket">
        <p><strong>Ticket #{{ $ticket->id }}</strong></p>
        <ul>
            @foreach($ticket->productos as $producto)
                <li>{{ $producto->nombre }} - {{ $producto->pivot->cantidad }} x ${{ $producto->precio }} = ${{ $producto->pivot->subtotal }}</li>
            @endforeach
        </ul>
        <p>Total: <strong>${{ $ticket->productos->sum('pivot.subtotal') }}</strong></p>
    </div>
@endforeach

</body>
</html>
