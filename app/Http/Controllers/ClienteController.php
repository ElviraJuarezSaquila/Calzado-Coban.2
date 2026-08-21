<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Método para mostrar la lista de todos los clientes
    public function index()
    {
        return view('clientes.index');
    }

    // Método para mostrar el formulario de creación
    public function create()
    {
        return view('clientes.create');
    }

    // Método para mostrar el detalle de un solo cliente
    public function show($cliente)
    {
        return view('clientes.show', compact('cliente'));
    }
}
