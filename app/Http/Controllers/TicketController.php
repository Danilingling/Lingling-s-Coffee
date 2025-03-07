<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Producto;

class TicketController extends Controller {
    public function index() {
        $tickets = Ticket::with('productos')->get();
        return view('tickets.index', compact('tickets'));
    }

    public function create() {
        $productos = Producto::all();
        return view('tickets.create', compact('productos'));
    }

    public function store(Request $request) {
        $request->validate([
            'ticket_id' => 'required|numeric|unique:tickets,id',
            'productos' => 'required|array',
            'cantidades' => 'required|array',
        ]);

        $ticket = Ticket::create(['id' => $request->ticket_id]);

        foreach ($request->productos as $index => $productoId) {
            $producto = Producto::find($productoId);
            $cantidad = intval($request->cantidades[$index]);
            $subtotal = $producto->precio * $cantidad;

            $ticket->productos()->attach($producto->id, [
                'cantidad' => $cantidad,
                'subtotal' => $subtotal
            ]);
        }

        return redirect()->route('tickets.create')->with('success', 'Ticket registrado correctamente.');
    }

}
