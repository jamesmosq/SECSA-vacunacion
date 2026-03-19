@extends('layouts.app')
@section('title', 'Movimiento #'.$movimiento->id)
@section('content')
<h4>Movimiento #{{ $movimiento->id }}</h4>
<table class="table table-sm">
    <tr><th>Institución</th><td>{{ $movimiento->institucion }}</td></tr>
    <tr><th>Fecha</th><td>{{ $movimiento->fecha_movimiento->format('d/m/Y') }}</td></tr>
    <tr><th>Nro Pedido</th><td>{{ $movimiento->nro_pedido }}</td></tr>
    <tr><th>Lote</th><td>{{ $movimiento->lote }}</td></tr>
    <tr><th>Ingreso</th><td>{{ number_format($movimiento->ingreso) }}</td></tr>
    <tr><th>Salida</th><td>{{ number_format($movimiento->salida) }}</td></tr>
    <tr><th>Observaciones</th><td>{{ $movimiento->observaciones }}</td></tr>
    <tr><th>Identificación</th><td>{{ $movimiento->tipo_identificacion }} {{ $movimiento->identificacion }}</td></tr>
    <tr><th>Nombre</th><td>{{ $movimiento->nombres_apellidos }}</td></tr>
</table>
<a href="{{ route('movimientos.index') }}" class="btn btn-secondary">Volver</a>
@endsection
