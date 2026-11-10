<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;

Route::get('/', function () {
    return redirect()->route('productos.index');
});

// Rutas de Clientes
Route::resource('clientes', ClienteController::class)->except(['show']);

// Rutas de Marcas
Route::resource('marcas', MarcaController::class)->only(['index', 'store', 'destroy']);

// Rutas de Productos (Inventario y Tallas)
Route::resource('productos', ProductoController::class)->except(['show']);

// Rutas de Ventas
Route::resource('ventas', VentaController::class)->only(['index', 'store', 'destroy']);

// Endpoint de API REST propia (Requisito técnico del curso)
Route::get('/api/inventario', [ProductoController::class, 'apiIndex'])->name('api.inventario');