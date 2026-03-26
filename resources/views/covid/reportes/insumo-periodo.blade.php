@extends('layouts.app')
@section('title', 'Informe COVID por Insumo y Periodo')
@section('content')
<h4 class="mb-3"><span class="badge bg-danger me-2">COVID</span>Informe por Insumo y Periodo</h4>
<form method="GET" action="{{ route('reportes.covid.insumo-periodo') }}" class="row g-3 mb-4">
    <div class="col-md-2">
        <label class="form-label">Desde</label>
        <input type="date" name="desde" class="form-control" value="{{ request('desde') }}" required>
    </div>
    <div class="col-md-2">
        <label class="form-label">Hasta</label>
        <input type="date" name="hasta" class="form-control" value="{{ request('hasta') }}" required>
    </div>
    <div class="col-auto d-flex align-items-end">
        <button type="submit" class="btn btn-danger">Consultar</button>
    </div>
</form>
@foreach($grupos as $insumo => $movimientos)
    @php
        $movGrupos = $movimientos->groupBy(fn($m) => $m->fecha_movimiento->format('Y-m-d') . '|' . $m->institucion . '|' . $m->nro_pedido . '|' . $m->observaciones);
    @endphp
    <h5 class="mt-4 mb-2">{{ $insumo }}</h5>
    @foreach($movGrupos as $clave => $items)
        @php $mov = $items->first(); @endphp
        <div class="card mb-2 border-danger">
            <div class="card-header py-2 bg-light d-flex gap-4 small">
                <span><strong>Fecha:</strong> {{ $mov->fecha_movimiento->format('d/m/Y') }}</span>
                <span><strong>Institución:</strong> {{ $mov->institucion }}</span>
                <span><strong>Pedido:</strong> {{ $mov->nro_pedido ?: '—' }}</span>
                @if($mov->observaciones)<span><strong>Obs:</strong> {{ $mov->observaciones }}</span>@endif
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-bordered mb-0">
                    <thead class="table-danger"><tr><th>Lote</th><th class="text-end">Ingreso</th><th class="text-end">Salida</th></tr></thead>
                    <tbody>
                        @foreach($items as $m)
                        <tr>
                            <td>{{ $m->lote }}</td>
                            <td class="text-end text-success">{{ $m->ingreso > 0 ? number_format($m->ingreso) : '' }}</td>
                            <td class="text-end text-danger">{{ $m->salida > 0 ? number_format($m->salida) : '' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="table-light"><tr>
                        <td class="text-end fw-bold">Subtotal</td>
                        <td class="text-end fw-bold text-success">{{ number_format($items->sum('ingreso')) }}</td>
                        <td class="text-end fw-bold text-danger">{{ number_format($items->sum('salida')) }}</td>
                    </tr></tfoot>
                </table>
            </div>
        </div>
    @endforeach
    <div class="alert alert-light border d-flex gap-4 py-2 mb-3">
        <strong>Total {{ $insumo }}:</strong>
        <span class="text-success">Ingreso: {{ number_format($movimientos->sum('ingreso')) }}</span>
        <span class="text-danger">Salida: {{ number_format($movimientos->sum('salida')) }}</span>
    </div>
@endforeach
@endsection
