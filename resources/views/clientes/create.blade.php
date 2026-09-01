@extends('layouts.app')

@section('content')
    <h2>Registrar Nuevo Cliente</h2>
    
    <p>
        <a href="{{ route('clientes.index') }}">← Volver</a>
    </p>

    <form action="#" method="POST">
        @csrf
        
        <div>
            <label for="nit">NIT</label><br>
            <input type="text" id="nit" name="nit" placeholder="Ingrese el NIT del cliente">
        </div>
        <br>
        <div>
            <label for="nombre">Nombre</label><br>
            <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre completo">
        </div>
        <br>
        <div>
            <label for="email">Correo Electrónico</label><br>
            <input type="email" id="email" name="email" placeholder="ejemplo@correo.com">
        </div>
        <br>
        <div>
            <button type="submit">Guardar Cliente</button>
        </div>
    </form>
@endsection