@extends('layouts.app')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-3">
            <h4 class="mb-0">Registrar Nuevo Calzado</h4>
            <a href="{{ route('productos.index') }}" class="btn btn-light btn-sm fw-bold">Volver al Inventario</a>
        </div>
        <div class="card-body">
            <form action="{{ route('productos.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Marca</label>
                        <select name="marca_id" class="form-select" required>
                            <option value="">Seleccione una marca...</option>
                            @foreach($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Estilo / Nombre del Calzado</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ej. Bota Industrial Cuero" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Talla</label>
                        <input type="text" name="talla" class="form-control" placeholder="Ej. 40" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Precio (Q)</label>
                        <input type="number" step="0.01" name="precio" class="form-control" placeholder="650.00" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Stock Inicial</label>
                        <input type="number" name="stock" class="form-control" placeholder="20" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark fw-bold">Guardar en Inventario</button>
            </form>
        </div>
    </div>
@endsection