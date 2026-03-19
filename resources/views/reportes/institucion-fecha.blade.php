@extends('layouts.app')
@section('title', 'Informe por Institución y Fecha')
@section('content')
<h4 class="mb-3">Informe por Institución y Fecha de Entrega</h4>
<form method="POST" action="{{ route('reportes.institucion-fecha') }}" class="row g-3 mb-4">
    @csrf
    <div class="col-md-5">
        <label class="form-label">Institución</label>
        <select name="institucion" class="form-select" required>
            <option value=""></option>
            @foreach($instituciones as $inst)
                <option value="{{ $inst }}" {{ request('institucion') == $inst ? 'selected' : '' }}>{{ $inst }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label class="form-label">Fecha</label>
        <input type="date" name="fecha" class="form-control" value="{{ request('fecha') }}">
    </div>
    <div class="col-auto d-flex align-items-end">
        <button type="submit" class="btn btn-primary">Consultar</button>
    </div>
</form>

@if($movimientos->count())
<table class="table table-sm table-bordered">
    <thead class="table-dark"><tr><th>Lote</th><th>Nro Pedido</th><th>Ingreso</th><th>Salida</th><th>Observaciones</th></tr></thead>
    <tbody>
        @foreach($movimientos as $mov)
        <tr>
            <td>{{ $mov->lote }}</td>
            <td>{{ $mov->nro_pedido }}</td>
            <td class="text-end">{{ $mov->ingreso }}</td>
            <td class="text-end">{{ $mov->salida }}</td>
            <td>{{ $mov->observaciones }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
