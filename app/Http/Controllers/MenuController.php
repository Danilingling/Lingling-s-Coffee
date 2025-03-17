<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Menu;
use App\Models\Producto;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('Menu.menu');
    }

    public function opciones()
    {
        return view('Menu.opciones');
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('Menu.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('productos', 'public');
        }

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen' => $rutaImagen,
            'categoria_id' => $request->categoria_id,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Producto agregado correctamente.');
    }

    public function dashboard()
    {
        $productos = Producto::all();
        return view('Menu.dashboard', compact('productos'));
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        $promedio = $producto->resenas()->avg('calificacion');

        return view('Resena.dashboard', compact('producto', 'promedio'));
    }

    public function showAll()
    {
        $productos = Producto::with('categoria')->get(); // Carga la relación con categorías
        $categorias = Categoria::all(); // Obtén todas las categorías disponibles
        return view('Menu.showAll', compact('productos', 'categorias')); // Pasa ambas variables a la vista
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('Menu.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->categoria_id = $request->categoria_id;

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('imagenes', 'public');
            $producto->imagen = $imagenPath;
        }

        $producto->save();

        return redirect()->route('menu.productos')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('menu.opciones')->with('success', 'Producto eliminado correctamente.');
    }

    public function productos()
    {
        $productos = Producto::with('categoria')->get();
        return view('Menu.productos', compact('productos'));
    }

}
