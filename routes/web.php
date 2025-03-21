<?php

use App\Http\Controllers\ResenaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LocalizacionController;
use App\Http\Controllers\DescuentoController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\TicketController;



/*
|--------------------------------------------------------------------------
| Rutas de Páginas Principales
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'welcome']);
Route::get('/inicio', [PageController::class, 'inicio'])->name('inicio');

/*
|--------------------------------------------------------------------------
| Rutas del Administrador
|--------------------------------------------------------------------------
*/

Route::get('/admin', [AuthController::class, 'showLogin'])->name('admin');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Rutas del Menú
|--------------------------------------------------------------------------
*/
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
Route::delete('/menu/destroy/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
Route::put('/menu/update/{id}', [MenuController::class, 'update'])->name('menu.update');
Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/dashboard', [MenuController::class, 'dashboard'])->name('menu.dashboard');
Route::get('/menu/opciones', [MenuController::class, 'opciones'])->name('menu.opciones');
Route::get('/menu/productos', [MenuController::class, 'productos'])->name('menu.productos');


/*
|--------------------------------------------------------------------------
| Rutas de Localización
|--------------------------------------------------------------------------
*/

Route::get('/localizacion', [LocalizacionController::class, 'index'])->name('localizacion');

/*
|--------------------------------------------------------------------------
| Rutas de Descuento
|--------------------------------------------------------------------------
*/

Route::get('/descuentos', [DescuentoController::class, 'index'])->name('descuentos');
Route::get('/cupon/create', [CuponController::class, 'create'])->name('cupon.create');
Route::post('/cupon/store', [CuponController::class, 'store'])->name('cupon.store');
Route::get('/cupon/edit/{id}', [CuponController::class, 'edit'])->name('cupon.edit');
Route::delete('/cupon/destroy/{id}', [CuponController::class, 'destroy'])->name('cupon.destroy');
Route::put('/cupon/update/{id}', [CuponController::class, 'update'])->name('cupon.update');
Route::get('/cupon/descuentos', [CuponController::class, 'descuentos'])->name('cupon.descuentos');

/*
|--------------------------------------------------------------------------
| Rutas de Resena
|--------------------------------------------------------------------------
*/

Route::get('/resena/{producto_id}', [ResenaController::class, 'show'])->name('resena.show');
Route::post('/resena/{producto_id}', [ResenaController::class, 'store'])->name('resena.store');
