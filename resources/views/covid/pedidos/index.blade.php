@extends('layouts.app')
@section('title', 'Radicados PAIWeb COVID')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4><span class="badge bg-danger me-2">COVID</span>Radicados PAIWeb</h4>
    <a href="{{ route('pedidos-covid.create') }}" class="btn btn-danger">+ Nuevo</a>
</div>
<table class="table table-sm table-bordered">
    <thead class="table-danger"><tr><th>Nro Pedido</th><th>Radicado</th><th>Tipo</th><th>Observaciones</th><th>Acciones</th></tr></thead>
    <tbody>
        @foreach($pedidos as $p)
        <tr>
            <td>{{ $p->nro_pedido }}</td>
            <td>{{ $p->radicado_paiweb }}</td>
            <td>{{ $p->tipo_pedido }}</td>
            <td>{{ Str::limit($p->observaciones, 60) }}</td>
            <td>
                <a href="{{ route('pedidos-covid.show', $p) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('pedidos-covid.edit', $p) }}" class="btn btn-sm btn-warning">Editar</a>
                <form method="POST" action="{{ route('pedidos-covid.destroy', $p) }}" class="d-inline" data-confirm="¿Eliminar el pedido COVID #{{ $p->nro_pedido }}?">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $pedidos->links() }}
@endsection
