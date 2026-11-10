@extends('layouts.app')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-3">
            <h4 class="mb-0 text-white">Editar Cliente</h4>
            <a href="{{ route('clientes.index') }}" class="btn btn-light btn-sm fw-bold">
                Ver Listado
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="nit" class="form-label">NIT</label>
                    <input type="text" class="form-control" id="nit" name="nit" value="{{ old('nit', $cliente->nit) }}" required>
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" required>
                </div>

                <button type="submit" class="btn btn-dark fw-bold">Actualizar Cliente</button>
            </form>
        </div>
    </div>
@endsection