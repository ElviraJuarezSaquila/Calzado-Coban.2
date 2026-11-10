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
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <p class="text-muted">Listado oficial de clientes registrados en el sistema de la zapatería.</p>
            
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
                    @forelse($clientes as $cliente)
                        <tr>
                            <td class="fw-bold">#{{ $cliente->id }}</td>
                            <td>{{ $cliente->nit }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td class="text-center">
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning fw-bold text-dark me-1">Editar</a>
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este cliente?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger fw-bold">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">
                                <span class="d-block mb-1 fs-4">📂</span>
                                Aún no hay clientes registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection