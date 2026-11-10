@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card shadow border-0">
            <div class="card-header bg-dark text-white text-center py-3">
                <h4 class="mb-0">👞 Acceso al Sistema - Calzado Cobán</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Correo Electrónico</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="admin@calzadocoban.com" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 fw-bold py-2">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 