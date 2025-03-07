<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('Administrador.admin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);

            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Credenciales incorrectas.');
    }

    public function dashboard()
    {
        if (!Session::has('user_id')) {
            return redirect()->route('admin')->with('error', 'Debes iniciar sesión.');
        }

        return view('Administrador.dashboard');
    }

    public function logout()
    {
        Session::forget('user_id');
        Session::forget('user_name');

        return redirect()->route('admin')->with('success', 'Sesión cerrada correctamente.');
    }
}
