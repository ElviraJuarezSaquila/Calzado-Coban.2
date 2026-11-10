<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Marca;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('marca')->get();
        $marcas = Marca::all();
        return view('productos.index', compact('productos', 'marcas'));
    }

    public function create()
    {
        $marcas = Marca::all();
        return view('productos.create', compact('marcas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'marca_id' => 'required|exists:marcas,id',
            'nombre' => 'required|string|max:255',
            'talla' => 'required|string|max:50',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Calzado registrado en inventario.');
    }

    public function edit(Producto $producto)
    {
        $marcas = Marca::all();
        return view('productos.edit', compact('producto', 'marcas'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'marca_id' => 'required|exists:marcas,id',
            'nombre' => 'required|string|max:255',
            'talla' => 'required|string|max:50',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Inventario actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado del inventario.');
    }

    // Endpoint API REST para consulta de inventario en JSON
    public function apiIndex()
    {
        return response()->json([
            'status' => 'success',
            'total_productos' => Producto::count(),
            'data' => Producto::with('marca')->get()
        ]);
    }
}