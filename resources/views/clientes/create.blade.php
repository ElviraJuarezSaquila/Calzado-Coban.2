@extends('layouts.app')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
            <h4 class="mb-0 text-white">Registrar Nuevo Cliente</h4>
            <a href="{{ route('clientes.index') }}" class="btn btn-light btn-sm fw-bold">
                ← Volver
            </a>
        </div>
        <div class="card-body p-4">
            <form action="#" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="nit" class="form-label fw-bold text-secondary">NIT</label>
                    <input type="text" class="form-control" id="nit" name="nit" placeholder="Ingrese el NIT del cliente">
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label fw-bold text-secondary">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre completo">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold text-secondary">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@correo.com">
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary px-4 fw-bold">
                        Guardar Cliente
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection