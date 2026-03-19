@extends('layouts.app')
@section('title', 'Informe COVID por Insumo y Periodo')
@section('content')
<h4 class="mb-3"><span class="badge bg-danger me-2">COVID</span>Informe por Insumo y Periodo</h4>
<form method="POST" action="{{ route('reportes.covid.insumo-periodo') }}" class="row g-3 mb-4">
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
@foreach($movimientos as $insumo => $movs)
    <h5 class="mt-3">{{ $insumo }}</h5>
    <table class="table table-sm table-bordered">
        <thead class="table-danger"><tr><th>Fecha</th><th>Institución</th><th>Lote</th><th>Ingreso</th><th>Salida</th></tr></thead>
        <tbody>
            @foreach($movs as $mov)
            <tr>
                <td>{{ $mov->fecha_movimiento->format('d/m/Y') }}</td>
                <td>{{ $mov->institucion }}</td>
                <td>{{ $mov->lote }}</td>
                <td class="text-end">{{ $mov->ingreso }}</td>
                <td class="text-end">{{ $mov->salida }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class="table-light">
            <tr>
                <td colspan="3" class="text-end fw-bold">Subtotal:</td>
                <td class="text-end fw-bold">{{ $movs->sum('ingreso') }}</td>
                <td class="text-end fw-bold">{{ $movs->sum('salida') }}</td>
            </tr>
        </tfoot>
    </table>
@endforeach
@endsection
