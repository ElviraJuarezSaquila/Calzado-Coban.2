@extends('layouts.app')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-3">
            <h4 class="mb-0">Inventario de Calzado</h4>
            <div>
                <button type="button" class="btn btn-warning btn-sm fw-bold me-2" onclick="consumirApiInventario()">
                    🔄 Consumir API REST
                </button>
                <a href="{{ route('productos.create') }}" class="btn btn-light btn-sm fw-bold">
                    + Nuevo Calzado
                </a>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Contenedor donde se muestra el consumo del endpoint API propio -->
            <div id="resultado-api" class="alert alert-info d-none mb-3"></div>

            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Estilo / Modelo</th>
                        <th>Talla</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $producto)
                        <tr>
                            <td class="fw-bold">#{{ $producto->id }}</td>
                            <td><span class="badge bg-secondary">{{ $producto->marca->nombre ?? 'Sin marca' }}</span></td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->talla }}</td>
                            <td>Q{{ number_format($producto->precio, 2) }}</td>
                            <td>
                                @if($producto->stock > 5)
                                    <span class="badge bg-success">{{ $producto->stock }} disponibles</span>
                                @elseif($producto->stock > 0)
                                    <span class="badge bg-warning text-dark">{{ $producto->stock }} (Bajo stock)</span>
                                @else
                                    <span class="badge bg-danger">Agotado</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning fw-bold me-1">Editar</a>
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este calzado del inventario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger fw-bold">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">No hay calzado registrado en el inventario.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function consumirApiInventario() {
            fetch("{{ route('api.inventario') }}")
                .then(response => response.json())
                .then(data => {
                    const div = document.getElementById('resultado-api');
                    div.classList.remove('d-none');
                    div.innerHTML = `<strong>Respuesta en vivo de API REST (/api/inventario):</strong> Estado: <code>${data.status}</code> | Total de modelos registrados: <strong>${data.total_productos}</strong>.`;
                });
        }
    </script>
@endsection