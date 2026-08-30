@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Listado de Clientes</h4>
            <a href="{{ route   ('clientes.create') }}" class="btn btn-primary btn-sm">
                + Agregar Cliente
            </a>
        </div>
        <div class="card-body">
            <p class="text-muted">Aquí se mostrará la tabla con los clientes registrados (próximamente con datos de la base de datos).</p>
            
            <!-- Estructura de ejemplo para la tabla -->
            <table class="table table-hover mt-3">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>NIT</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4" class="text-center text-muted">Aún no hay clientes registrados.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection