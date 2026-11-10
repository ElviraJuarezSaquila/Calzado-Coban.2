<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with(['cliente', 'producto.marca'])->latest()->get();
        $clientes = Cliente::all();
        $productos = Producto::where('stock', '>', 0)->with('marca')->get();
        return view('ventas.index', compact('ventas', 'clientes', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        if ($producto->stock < $request->cantidad) {
            return redirect()->back()->with('error', 'Stock insuficiente. Solo quedan ' . $producto->stock . ' unidades disponibles.');
        }

        $total = $producto->precio * $request->cantidad;

        Venta::create([
            'cliente_id' => $request->cliente_id,
            'producto_id' => $producto->id,
            'cantidad' => $request->cantidad,
            'total' => $total,
        ]);

        // Descontar stock automáticamente del inventario
        $producto->decrement('stock', $request->cantidad);

        return redirect()->route('ventas.index')->with('success', 'Venta registrada y stock actualizado correctamente.');
    }

    public function destroy(Venta $venta)
    {
        // Devolver el stock al anular la venta
        $venta->producto->increment('stock', $venta->cantidad);
        $venta->delete();

        return redirect()->route('ventas.index')->with('success', 'Venta anulada y stock restaurado.');
    }
}