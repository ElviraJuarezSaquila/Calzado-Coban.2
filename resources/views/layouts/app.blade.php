<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calzado Cobán</title>
</head>
<body>

    <nav>
        <a href="/clientes">Calzado Cobán</a> | 
        <a href="{{ route('clientes.index') }}">Ver Clientes</a> | 
        <a href="{{ route('clientes.create') }}">Nuevo Cliente</a>
    </nav>

    <hr>

    <div>
        @yield('content')
    </div>

</body>
</html>