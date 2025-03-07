<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cupon;

class CuponController extends Controller {
    public function create() {
        return view('Descuentos.create');
    }

    public function store(Request $request) {
        $request->validate([
            'codigo' => 'required|unique:cupones|max:20',
            'descuento' => 'required|numeric|min:0|max:100',
            'valido_desde' => 'required|date',
            'valido_hasta' => 'required|date|after_or_equal:valido_desde',
        ]);

        Cupon::create([
            'codigo' => $request->codigo,
            'descuento' => $request->descuento,
            'valido_desde' => $request->valido_desde,
            'valido_hasta' => $request->valido_hasta,
        ]);

        return redirect()->route('cupon.create')->with('success', 'Cupón agregado correctamente.');
    }

    public function index() {
        $cupones = Cupon::all();
        return view('Descuentos.index', compact('cupones'));
    }

    public function opciones()
    {
        return view('Descuentos.opciones');
    }


}
