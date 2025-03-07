<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Resena;
use Illuminate\Http\Request;

class ResenaController extends Controller
{
    public function store(Request $request, $producto_id)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'comentario' => 'required|string',
            'calificacion' => 'required|integer|min:1|max:5',
        ]);

        Resena::create([
            'producto_id' => $producto_id,
            'nombre_cliente' => $request->nombre_cliente,
            'comentario' => $request->comentario,
            'calificacion' => $request->calificacion,
        ]);

        return redirect()->route('resena.show', $producto_id)->with('success', 'Reseña añadida correctamente.');
    }

    public function show($producto_id)
    {
        $producto = Producto::with('resenas')->findOrFail($producto_id);

        $promedio = $producto->resenas->isNotEmpty() ? $producto->resenas->avg('calificacion') : 0;

        return view('Resena.dashboard', compact('producto', 'promedio'));
    }

}
