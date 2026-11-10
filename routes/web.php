<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;

// Rutas públicas de Autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Endpoint de API REST propia
Route::get('/api/inventario', [ProductoController::class, 'apiIndex'])->name('api.inventario');

// Rutas protegidas por Middleware de Autenticación (Fase 2)
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('productos.index');
    });

    Route::resource('clientes', ClienteController::class)->except(['show']);
    Route::resource('marcas', MarcaController::class)->only(['index', 'store', 'destroy']);
    Route::resource('productos', ProductoController::class)->except(['show']);
    Route::resource('ventas', VentaController::class)->only(['index', 'store', 'destroy']);
});
