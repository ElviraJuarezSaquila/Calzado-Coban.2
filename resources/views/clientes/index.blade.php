@extends('layouts.app')

@section('content')
    <h2>Listado de Clientes</h2>
    
    <p>
        <a href="{{ route('clientes.create') }}">+ Agregar Cliente</a>
    </p>

    <p>Aquí se mostrará la tabla con los clientes registrados.</p>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIT</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="4">Aún no hay clientes registrados.</td>
            </tr>
        </tbody>
    </table>
@endsection