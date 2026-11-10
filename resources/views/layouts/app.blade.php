<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zapatería Calzado Cobán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('productos.index') }}">👞 Calzado Cobán</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                @auth
                    <div class="navbar-nav me-auto">
                        <a class="nav-link" href="{{ route('productos.index') }}">Inventario (Zapatos)</a>
                        @if(auth()->user()->rol === 'admin')
                            <a class="nav-link" href="{{ route('marcas.index') }}">Marcas</a>
                        @endif
                        <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a>
                        <a class="nav-link" href="{{ route('ventas.index') }}">Ventas</a>
                        <a class="nav-link text-warning fw-bold" href="{{ route('api.inventario') }}" target="_blank">API JSON</a>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <span class="me-2 small">{{ auth()->user()->name }}</span>
                        <span class="badge {{ auth()->user()->rol === 'admin' ? 'bg-danger' : 'bg-info text-dark' }} me-3 text-uppercase">
                            {{ auth()->user()->rol }}
                        </span>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">Salir</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container pb-5">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>