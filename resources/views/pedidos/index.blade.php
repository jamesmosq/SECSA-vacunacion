@extends('layouts.app')
@section('title', 'Radicados PAIWeb')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Radicados PAIWeb</h4>
    <a href="{{ route('pedidos.create') }}" class="btn btn-primary">+ Nuevo</a>
</div>
<table class="table table-sm table-bordered">
    <thead class="table-dark"><tr><th>Nro Pedido</th><th>Radicado PAIWeb</th><th>Tipo</th><th>Temperatura</th><th>Observaciones</th><th>Acciones</th></tr></thead>
    <tbody>
        @foreach($pedidos as $p)
        <tr>
            <td>{{ $p->nro_pedido }}</td>
            <td>{{ $p->radicado_paiweb }}</td>
            <td>{{ $p->tipo_pedido }}</td>
            <td>{{ $p->temperatura }}</td>
            <td>{{ Str::limit($p->observaciones, 60) }}</td>
            <td>
                <a href="{{ route('pedidos.show', $p) }}" class="btn btn-sm btn-info">Ver</a>
                <a href="{{ route('pedidos.edit', $p) }}" class="btn btn-sm btn-warning">Editar</a>
                <form method="POST" action="{{ route('pedidos.destroy', $p) }}" class="d-inline" data-confirm="¿Eliminar el pedido #{{ $p->nro_pedido }}?">
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
