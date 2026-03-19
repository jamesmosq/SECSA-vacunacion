@extends('layouts.app')
@section('title', 'Pedido COVID #'.$pedido->nro_pedido)
@section('content')
<h4><span class="badge bg-danger me-2">COVID</span>Pedido #{{ $pedido->nro_pedido }} - {{ $pedido->radicado_paiweb }}</h4>
<p>{{ $pedido->observaciones }}</p>
<h5>Movimientos asociados</h5>
<table class="table table-sm table-bordered">
    <thead class="table-danger"><tr><th>Institución</th><th>Fecha</th><th>Lote</th><th>Ingreso</th><th>Salida</th></tr></thead>
    <tbody>
        @foreach($pedido->movimientos as $mov)
        <tr>
            <td>{{ $mov->institucion }}</td>
            <td>{{ $mov->fecha_movimiento->format('d/m/Y') }}</td>
            <td>{{ $mov->lote }}</td>
            <td class="text-end">{{ $mov->ingreso }}</td>
            <td class="text-end">{{ $mov->salida }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('pedidos-covid.index') }}" class="btn btn-secondary">Volver</a>
@endsection
