<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DescuentoController extends Controller
{
    public function index()
    {
        return view('Descuentos.descuentos');
    }
}
