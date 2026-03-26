<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 9pt; color: #212529; }
    h2 { font-size: 12pt; margin-bottom: 4px; }
    .sub { font-size: 8pt; color: #666; margin-bottom: 12px; }
    .grupo { margin-bottom: 14px; page-break-inside: avoid; }
    .grupo-header { background: {{ $esCovid ? '#f8d7da' : '#d1ecf1' }}; padding: 4px 6px; font-size: 8pt; border-left: 3px solid {{ $esCovid ? '#dc3545' : '#0d6efd' }}; margin-bottom: 2px; }
    .grupo-header span { margin-right: 16px; }
    table { width: 100%; border-collapse: collapse; font-size: 8pt; }
    th { background: {{ $esCovid ? '#dc3545' : '#0d6efd' }}; color: #fff; padding: 3px 5px; text-align: left; }
    th.num, td.num { text-align: right; }
    td { padding: 2px 5px; border-bottom: 1px solid #dee2e6; }
    tr:nth-child(even) td { background: #f8f9fa; }
    tfoot td { font-weight: bold; background: #e9ecef; border-top: 1px solid #adb5bd; }
    .total-general { margin-top: 10px; padding: 5px 8px; background: #e9ecef; font-size: 9pt; font-weight: bold; }
    .insumo-title { font-size: 10pt; font-weight: bold; margin: 10px 0 4px; border-bottom: 1px solid #adb5bd; padding-bottom: 2px; }
</style>
</head>
<body>
<h2>{{ $titulo }}</h2>
<div class="sub">Generado: {{ now()->format('d/m/Y H:i') }}</div>

@php
    // Detectar si es insumo-periodo (primer nivel es insumo, segundo es movimientos)
    $primerValor = $grupos->first();
    $esPorInsumo = $primerValor instanceof \Illuminate\Support\Collection
        && $primerValor->first() instanceof \Illuminate\Support\Collection;
    $totalIngreso = 0;
    $totalSalida  = 0;
@endphp

@if($esPorInsumo)
    @foreach($grupos as $insumo => $movGrupos)
        <div class="insumo-title">{{ $insumo }}</div>
        @foreach($movGrupos as $clave => $items)
            @php $mov = $items->first(); @endphp
            <div class="grupo">
                <div class="grupo-header">
                    <span><b>Fecha:</b> {{ $mov->fecha_movimiento->format('d/m/Y') }}</span>
                    <span><b>Institución:</b> {{ $mov->institucion }}</span>
                    <span><b>Pedido:</b> {{ $mov->nro_pedido ?: '—' }}</span>
                    @if($mov->observaciones)<span><b>Obs:</b> {{ $mov->observaciones }}</span>@endif
                </div>
                <table>
                    <thead><tr><th>Lote</th><th class="num">Ingreso</th><th class="num">Salida</th></tr></thead>
                    <tbody>
                        @foreach($items as $m)
                        @php $totalIngreso += $m->ingreso; $totalSalida += $m->salida; @endphp
                        <tr><td>{{ $m->lote }}</td><td class="num">{{ $m->ingreso > 0 ? number_format($m->ingreso) : '' }}</td><td class="num">{{ $m->salida > 0 ? number_format($m->salida) : '' }}</td></tr>
                        @endforeach
                    </tbody>
                    <tfoot><tr><td class="num" colspan="1">Subtotal</td><td class="num">{{ number_format($items->sum('ingreso')) }}</td><td class="num">{{ number_format($items->sum('salida')) }}</td></tr></tfoot>
                </table>
            </div>
        @endforeach
    @endforeach
@else
    @foreach($grupos as $clave => $items)
        @php $mov = $items->first(); $totalIngreso += $items->sum('ingreso'); $totalSalida += $items->sum('salida'); @endphp
        <div class="grupo">
            <div class="grupo-header">
                <span><b>Fecha:</b> {{ $mov->fecha_movimiento->format('d/m/Y') }}</span>
                @isset($mov->institucion)<span><b>Institución:</b> {{ $mov->institucion }}</span>@endisset
                <span><b>Pedido:</b> {{ $mov->nro_pedido ?: '—' }}</span>
                @if($mov->observaciones)<span><b>Obs:</b> {{ $mov->observaciones }}</span>@endif
            </div>
            <table>
                <thead><tr><th>Insumo</th><th>Lote</th><th class="num">Ingreso</th><th class="num">Salida</th></tr></thead>
                <tbody>
                    @foreach($items as $m)
                    <tr>
                        <td>{{ $m->loteRelacion?->insumo ?? '—' }}</td>
                        <td>{{ $m->lote }}</td>
                        <td class="num">{{ $m->ingreso > 0 ? number_format($m->ingreso) : '' }}</td>
                        <td class="num">{{ $m->salida > 0 ? number_format($m->salida) : '' }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot><tr>
                    <td colspan="2" class="num">Subtotal</td>
                    <td class="num">{{ number_format($items->sum('ingreso')) }}</td>
                    <td class="num">{{ number_format($items->sum('salida')) }}</td>
                </tr></tfoot>
            </table>
        </div>
    @endforeach
@endif

@if($grupos->count())
<div class="total-general">
    Total general — Ingreso: {{ number_format($totalIngreso) }} &nbsp;|&nbsp; Salida: {{ number_format($totalSalida) }}
</div>
@endif
</body>
</html>
