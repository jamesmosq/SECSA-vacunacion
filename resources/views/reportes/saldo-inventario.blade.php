@extends('layouts.app')
@section('title', 'Saldo de Inventario')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Saldo de Inventario</h4>
    <button onclick="window.print()" class="btn btn-outline-secondary btn-sm">Imprimir</button>
</div>
<table class="table table-sm table-bordered table-hover">
    <thead class="table-dark">
        <tr><th>Lote</th><th>Insumo</th><th>Presentación</th><th>Laboratorio</th><th>Vencimiento</th><th>Saldo</th><th>Estado</th></tr>
    </thead>
    <tbody>
        @foreach($lotes as $lote)
        <tr class="{{ $lote->estado === 'Inactivo' ? 'text-muted' : '' }}">
            <td>{{ $lote->lote }}</td>
            <td>{{ $lote->insumo }}</td>
            <td>{{ $lote->presentacion }}</td>
            <td>{{ $lote->laboratorio }}</td>
            <td>{{ $lote->fecha_vencimiento?->format('d/m/Y') }}</td>
            <td class="text-end fw-bold {{ $lote->saldo > 0 ? 'text-success' : '' }}">{{ number_format($lote->saldo) }}</td>
            <td><span class="badge {{ $lote->estado === 'Activo' ? 'bg-success' : 'bg-secondary' }}">{{ $lote->estado }}</span></td>
        </tr>
        @endforeach
    </tbody>
    <tfoot class="table-light">
        <tr>
            <td colspan="5" class="text-end fw-bold">Total unidades:</td>
            <td class="text-end fw-bold">{{ number_format($lotes->sum('saldo')) }}</td>
            <td></td>
        </tr>
    </tfoot>
</table>
@endsection
