<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizacionController extends Controller
{
    public function index()
    {
        return view('Localizacion.localizacion');
    }
}
