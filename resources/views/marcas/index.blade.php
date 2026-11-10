@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="mb-0">Nueva Marca</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('marcas.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre de la Marca</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. Caterpillar, Nike..." required>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 fw-bold">Guardar Marca</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="mb-0">Marcas Registradas</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre de Marca</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($marcas as $marca)
                                <tr>
                                    <td class="fw-bold">#{{ $marca->id }}</td>
                                    <td>{{ $marca->nombre }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('marcas.destroy', $marca->id) }}" method="POST" onsubmit="return confirm('¿Eliminar esta marca y sus productos asociados?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger fw-bold">Borrar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">No hay marcas registradas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection