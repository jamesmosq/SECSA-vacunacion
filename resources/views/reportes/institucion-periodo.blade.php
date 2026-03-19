@extends('layouts.app')
@section('title', 'Informe por Institución y Periodo')
@section('content')
<h4 class="mb-3">Informe por Institución y Periodo</h4>
<form method="POST" action="{{ route('reportes.institucion-periodo') }}" class="row g-3 mb-4">
    @csrf
    <div class="col-md-4">
        <label class="form-label">Institución</label>
        <select name="institucion" class="form-select" required>
            <option value=""></option>
            @foreach($instituciones as $inst)
                <option value="{{ $inst }}">{{ $inst }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <label class="form-label">Desde</label>
        <input type="date" name="desde" class="form-control" required>
    </div>
    <div class="col-md-2">
        <label class="form-label">Hasta</label>
        <input type="date" name="hasta" class="form-control" required>
    </div>
    <div class="col-auto d-flex align-items-end">
        <button type="submit" class="btn btn-primary">Consultar</button>
    </div>
</form>
@if($movimientos->count())
<table class="table table-sm table-bordered">
    <thead class="table-dark"><tr><th>Fecha</th><th>Nro Pedido</th><th>Lote</th><th>Ingreso</th><th>Salida</th><th>Observaciones</th></tr></thead>
    <tbody>
        @foreach($movimientos as $mov)
        <tr>
            <td>{{ $mov->fecha_movimiento->format('d/m/Y') }}</td>
            <td>{{ $mov->nro_pedido }}</td>
            <td>{{ $mov->lote }}</td>
            <td class="text-end">{{ $mov->ingreso }}</td>
            <td class="text-end">{{ $mov->salida }}</td>
            <td>{{ $mov->observaciones }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
