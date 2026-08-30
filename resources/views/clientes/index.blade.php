@extends('layouts.app')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-3">
            <h4 class="mb-0 text-white">Listado de Clientes</h4>
            <a href="{{ route('clientes.create') }}" class="btn btn-light btn-sm fw-bold">
                + Agregar Cliente
            </a>
        </div>
        <div class="card-body">
            <p class="text-muted">Aquí se mostrará la tabla con los clientes registrados (próximamente con datos de la base de datos).</p>
            
            <table class="table table-hover align-middle mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>NIT</th>
                        <th>Nombre</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">
                            <span class="d-block mb-1 fs-4">📂</span>
                            Aún no hay clientes registrados.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection