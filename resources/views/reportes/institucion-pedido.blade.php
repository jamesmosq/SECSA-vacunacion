@extends('layouts.app')
@section('title', 'Informe por Institución y Pedido')
@section('content')
<h4 class="mb-3">Informe por Institución y Pedido</h4>
<form method="GET" action="{{ route('reportes.institucion-pedido') }}" class="row g-3 mb-4">
    <div class="col-md-5">
        <label class="form-label">Institución</label>
        <select name="institucion" class="form-select" required>
            <option value=""></option>
            @foreach($instituciones as $inst)
                <option value="{{ $inst }}" {{ request('institucion') == $inst ? 'selected' : '' }}>{{ $inst }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-auto d-flex align-items-end">
        <div class="d-flex gap-2 align-items-end">
        <button type="submit" name="format" value="" class="btn btn-primary">Consultar</button>
        @include("reportes.partials.botones-export")
    </div>
    </div>
</form>

@if($grupos->count())
    @php $totalIngreso = 0; $totalSalida = 0; @endphp
    @foreach($grupos as $clave => $items)
        @php
            $mov = $items->first();
            $totalIngreso += $items->sum('ingreso');
            $totalSalida  += $items->sum('salida');
        @endphp
        <div class="card mb-3">
            <div class="card-header py-2 bg-light d-flex gap-4">
                <span><strong>Pedido:</strong> {{ $mov->nro_pedido ?: '—' }}</span>
                <span><strong>Fecha:</strong> {{ $mov->fecha_movimiento->format('d/m/Y') }}</span>
                @if($mov->observaciones)<span><strong>Obs:</strong> {{ $mov->observaciones }}</span>@endif
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-bordered mb-0">
                    <thead class="table-dark">
                        <tr><th>Insumo</th><th>Lote</th><th class="text-end">Ingreso</th><th class="text-end">Salida</th></tr>
                    </thead>
                    <tbody>
                        @foreach($items as $m)
                        <tr>
                            <td>{{ $m->loteRelacion?->insumo ?? '—' }}</td>
                            <td>{{ $m->lote }}</td>
                            <td class="text-end text-success">{{ $m->ingreso > 0 ? number_format($m->ingreso) : '' }}</td>
                            <td class="text-end text-danger">{{ $m->salida > 0 ? number_format($m->salida) : '' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <td colspan="2" class="text-end fw-bold">Subtotal</td>
                            <td class="text-end fw-bold text-success">{{ number_format($items->sum('ingreso')) }}</td>
                            <td class="text-end fw-bold text-danger">{{ number_format($items->sum('salida')) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    @endforeach
    <div class="alert alert-secondary d-flex gap-4">
        <strong>Total general:</strong>
        <span class="text-success">Ingreso: {{ number_format($totalIngreso) }}</span>
        <span class="text-danger">Salida: {{ number_format($totalSalida) }}</span>
    </div>
@endif
@endsection
