@extends('layouts.app')
@section('title', 'Lote COVID: '.$lote->lote)
@section('content')
<h4><span class="badge bg-danger me-2">COVID</span>Lote: {{ $lote->lote }}</h4>
<table class="table table-sm">
    <tr><th>Insumo</th><td>{{ $lote->insumo }}</td></tr>
    <tr><th>Presentación</th><td>{{ $lote->presentacion }}</td></tr>
    <tr><th>Laboratorio</th><td>{{ $lote->laboratorio }}</td></tr>
    <tr><th>Vencimiento</th><td>{{ $lote->fecha_vencimiento?->format('d/m/Y') }}</td></tr>
    <tr><th>Saldo</th><td>{{ number_format($lote->saldo) }}</td></tr>
    <tr><th>Estado</th><td>{{ $lote->estado }}</td></tr>
</table>
<a href="{{ route('lotes-covid.edit', $lote->lote) }}" class="btn btn-warning">Editar</a>
<a href="{{ route('lotes-covid.index') }}" class="btn btn-secondary">Volver</a>
@endsection
