@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="mb-0">Registrar Venta</h5>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('ventas.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Cliente</label>
                            <select name="cliente_id" class="form-select" required>
                                <option value="">Seleccione un cliente...</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nit }} - {{ $cliente->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Calzado Disponible</label>
                            <select name="producto_id" class="form-select" required>
                                <option value="">Seleccione el calzado...</option>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}">
                                        {{ $producto->nombre }} (Talla {{ $producto->talla }}) - Q{{ number_format($producto->precio, 2) }} [Stock: {{ $producto->stock }}]
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cantidad de Pares</label>
                            <input type="number" name="cantidad" class="form-control" value="1" min="1" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100 fw-bold">Confirmar Venta</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="mb-0">Historial de Ventas</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Producto (Talla)</th>
                                <th>Cant.</th>
                                <th>Total</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ventas as $venta)
                                <tr>
                                    <td class="fw-bold">#{{ $venta->id }}</td>
                                    <td>{{ $venta->cliente->nombre ?? 'N/A' }}</td>
                                    <td>{{ $venta->producto->nombre ?? 'N/A' }} (T. {{ $venta->producto->talla ?? '-' }})</td>
                                    <td>{{ $venta->cantidad }}</td>
                                    <td class="fw-bold text-success">Q{{ number_format($venta->total, 2) }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" onsubmit="return confirm('¿Anular esta venta y devolver los pares al stock?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger fw-bold">Anular</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">Aún no se han registrado ventas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection