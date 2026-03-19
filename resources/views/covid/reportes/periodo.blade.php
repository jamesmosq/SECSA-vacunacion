@extends('layouts.app')
@section('title', 'Informe COVID por Periodo')
@section('content')
<h4 class="mb-3"><span class="badge bg-danger me-2">COVID</span>Informe por Periodo</h4>
<form method="POST" action="{{ route('reportes.covid.periodo') }}" class="row g-3 mb-4">
    @csrf
    <div class="col-md-2">
        <label class="form-label">Desde</label>
        <input type="date" name="desde" class="form-control" required>
    </div>
    <div class="col-md-2">
        <label class="form-label">Hasta</label>
        <input type="date" name="hasta" class="form-control" required>
    </div>
    <div class="col-auto d-flex align-items-end">
        <button type="submit" class="btn btn-danger">Consultar</button>
    </div>
</form>
@if($movimientos->count())
<table class="table table-sm table-bordered table-hover">
    <thead class="table-danger"><tr><th>Fecha</th><th>Institución</th><th>Nro Pedido</th><th>Lote</th><th>Ingreso</th><th>Salida</th></tr></thead>
    <tbody>
        @foreach($movimientos as $mov)
        <tr>
            <td>{{ $mov->fecha_movimiento->format('d/m/Y') }}</td>
            <td>{{ $mov->institucion }}</td>
            <td>{{ $mov->nro_pedido }}</td>
            <td>{{ $mov->lote }}</td>
            <td class="text-end text-success">{{ $mov->ingreso > 0 ? number_format($mov->ingreso) : '' }}</td>
            <td class="text-end text-danger">{{ $mov->salida > 0 ? number_format($mov->salida) : '' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
