@extends('layouts.app')
@section('title', 'Dashboard')

@push('css')
<style>
    .info-box .info-box-icon { width: 70px; }
    .chart-title { font-size: .85rem; font-weight: 600; color: #6c757d; text-transform: uppercase; letter-spacing: .05rem; }
    .table-vencer td { vertical-align: middle; font-size: .85rem; }
    .dias-badge { min-width: 60px; text-align: center; }
</style>
@endpush

@section('content')

{{-- ════════════════════════════════════════════════════════ --}}
{{-- FILA 1 – PAI: Inventario                               --}}
{{-- ════════════════════════════════════════════════════════ --}}
<div class="row">

    {{-- Saldo total PAI --}}
    <div class="col-md-3 col-sm-6">
        <div class="info-box shadow-sm">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-syringe"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Saldo Total PAI</span>
                <span class="info-box-number">{{ number_format($saldoTotalPai) }}</span>
                <div class="progress"><div class="progress-bar bg-primary" style="width:100%"></div></div>
                <span class="progress-description">dosis disponibles</span>
            </div>
        </div>
    </div>

    {{-- Lotes activos --}}
    <div class="col-md-3 col-sm-6">
        <div class="info-box shadow-sm">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-boxes"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Lotes Activos PAI</span>
                <span class="info-box-number">{{ $lotesActivosPai }}</span>
                <div class="progress"><div class="progress-bar bg-success" style="width:100%"></div></div>
                <span class="progress-description">en inventario</span>
            </div>
        </div>
    </div>

    {{-- Lotes por vencer --}}
    <div class="col-md-3 col-sm-6">
        <div class="info-box shadow-sm">
            <span class="info-box-icon {{ $lotesPorVencer > 0 ? 'bg-warning' : 'bg-secondary' }} elevation-1">
                <i class="fas fa-exclamation-triangle"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Por Vencer ≤90d</span>
                <span class="info-box-number">{{ $lotesPorVencer }}</span>
                <div class="progress"><div class="progress-bar bg-warning" style="width:100%"></div></div>
                <span class="progress-description">
                    @if($lotesVencidosPai > 0)
                        + {{ $lotesVencidosPai }} ya vencidos
                    @else
                        sin lotes vencidos
                    @endif
                </span>
            </div>
        </div>
    </div>

    {{-- Saldo total COVID --}}
    <div class="col-md-3 col-sm-6">
        <div class="info-box shadow-sm">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-virus"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Saldo Total COVID</span>
                <span class="info-box-number">{{ number_format($saldoTotalCovid) }}</span>
                <div class="progress"><div class="progress-bar bg-danger" style="width:100%"></div></div>
                <span class="progress-description">{{ $lotesActivosCovid }} lotes activos</span>
            </div>
        </div>
    </div>

</div>

{{-- ════════════════════════════════════════════════════════ --}}
{{-- FILA 2 – Movimientos del mes + Carnets                 --}}
{{-- ════════════════════════════════════════════════════════ --}}
<div class="row">

    <div class="col-md-3 col-sm-6">
        <div class="info-box shadow-sm">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-arrow-circle-down"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Ingresos PAI este mes</span>
                <span class="info-box-number">{{ number_format($ingresosMes) }}</span>
                <div class="progress"><div class="progress-bar bg-info" style="width:100%"></div></div>
                <span class="progress-description">{{ $totalMovMes }} movimientos</span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="info-box shadow-sm">
            <span class="info-box-icon bg-orange elevation-1"><i class="fas fa-arrow-circle-up"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Salidas PAI este mes</span>
                <span class="info-box-number">{{ number_format($salidasMes) }}</span>
                <div class="progress"><div class="progress-bar bg-orange" style="width:100%"></div></div>
                <span class="progress-description">dosis distribuidas</span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="info-box shadow-sm">
            <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-id-card"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Carnets este mes</span>
                <span class="info-box-number">{{ number_format($carnetsMes) }}</span>
                <div class="progress"><div class="progress-bar bg-teal" style="width:100%"></div></div>
                <span class="progress-description">{{ number_format($carnetsTotal) }} total histórico</span>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="info-box shadow-sm">
            <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-file-alt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Pedidos PAIWeb</span>
                <span class="info-box-number">{{ number_format($pedidosTotal) }}</span>
                <div class="progress"><div class="progress-bar bg-purple" style="width:100%"></div></div>
                <span class="progress-description">{{ number_format($pedidosCovidTotal) }} COVID</span>
            </div>
        </div>
    </div>

</div>

{{-- ════════════════════════════════════════════════════════ --}}
{{-- FILA 3 – Gráficas                                      --}}
{{-- ════════════════════════════════════════════════════════ --}}
<div class="row">

    {{-- Movimientos PAI por mes --}}
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-chart-bar mr-2 text-primary"></i>Movimientos PAI — {{ now()->year }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="chartMovMes" height="110"></canvas>
            </div>
        </div>
    </div>

    {{-- Top insumos por saldo --}}
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-chart-pie mr-2 text-success"></i>Saldo por Vacuna (PAI)</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="chartInsumos" height="220"></canvas>
            </div>
        </div>
    </div>

</div>

{{-- ════════════════════════════════════════════════════════ --}}
{{-- FILA 4 – PAI vs COVID + Lotes por vencer               --}}
{{-- ════════════════════════════════════════════════════════ --}}
<div class="row">

    {{-- Comparativo PAI vs COVID últimos 6 meses --}}
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-chart-line mr-2 text-danger"></i>Salidas PAI vs COVID — últimos 6 meses</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="chartPaiVsCovid" height="160"></canvas>
            </div>
        </div>
    </div>

    {{-- Lotes próximos a vencer --}}
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-calendar-times mr-2 text-warning"></i>Lotes próximos a vencer (≤ 90 días)</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                @if($lotesProxVencer->isEmpty())
                    <p class="text-muted p-3 mb-0">No hay lotes próximos a vencer.</p>
                @else
                <table class="table table-sm table-hover mb-0 table-vencer">
                    <thead class="table-dark">
                        <tr><th>Lote</th><th>Vacuna</th><th>Saldo</th><th>Vence</th><th>Días</th></tr>
                    </thead>
                    <tbody>
                        @foreach($lotesProxVencer as $lote)
                        @php $dias = (int) now()->diffInDays($lote->fecha_vencimiento); @endphp
                        <tr>
                            <td>{{ $lote->lote }}</td>
                            <td>{{ $lote->insumo }}</td>
                            <td class="text-end">{{ number_format($lote->saldo) }}</td>
                            <td>{{ $lote->fecha_vencimiento->format('d/m/Y') }}</td>
                            <td>
                                <span class="badge dias-badge
                                    {{ $dias <= 30 ? 'badge-danger' : ($dias <= 60 ? 'badge-warning' : 'badge-info') }}">
                                    {{ $dias }}d
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
            @if($lotesVencidosPai > 0)
            <div class="card-footer text-danger text-sm">
                <i class="fas fa-exclamation-circle mr-1"></i>
                {{ $lotesVencidosPai }} lote(s) ya vencidos con estado Activo — revisar inventario.
            </div>
            @endif
        </div>
    </div>

</div>

{{-- ════════════════════════════════════════════════════════ --}}
{{-- FILA 5 – Top instituciones del mes                     --}}
{{-- ════════════════════════════════════════════════════════ --}}
<div class="row">

    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-hospital mr-2 text-info"></i>Top instituciones — salidas este mes</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                @if($topInstituciones->isEmpty())
                    <p class="text-muted p-3 mb-0">Sin movimientos este mes.</p>
                @else
                <table class="table table-sm table-hover mb-0">
                    <thead class="table-dark">
                        <tr><th>Institución</th><th class="text-end">Dosis</th><th class="text-end">Movimientos</th></tr>
                    </thead>
                    <tbody>
                        @foreach($topInstituciones as $inst)
                        <tr>
                            <td>{{ $inst->institucion }}</td>
                            <td class="text-end">{{ number_format($inst->total_salidas) }}</td>
                            <td class="text-end">{{ $inst->movimientos }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>

    {{-- COVID resumen del mes --}}
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-danger">
                <h3 class="card-title text-white"><i class="fas fa-virus mr-2"></i>COVID — resumen del mes</h3>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-4">
                        <div class="text-muted small">Ingresos</div>
                        <div class="h4 text-success font-weight-bold">{{ number_format($ingresosMesCovid) }}</div>
                    </div>
                    <div class="col-4">
                        <div class="text-muted small">Salidas</div>
                        <div class="h4 text-danger font-weight-bold">{{ number_format($salidasMesCovid) }}</div>
                    </div>
                    <div class="col-4">
                        <div class="text-muted small">Saldo total</div>
                        <div class="h4 text-primary font-weight-bold">{{ number_format($saldoTotalCovid) }}</div>
                    </div>
                </div>
                <hr>
                <div class="row text-center">
                    <div class="col-6">
                        <div class="text-muted small">Lotes activos</div>
                        <div class="h5">{{ $lotesActivosCovid }}</div>
                    </div>
                    <div class="col-6">
                        <div class="text-muted small">Pedidos COVID</div>
                        <div class="h5">{{ number_format($pedidosCovidTotal) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- ════════════════════════════════════════════════════════ --}}
{{-- FILA 6 – Accesos rápidos                               --}}
{{-- ════════════════════════════════════════════════════════ --}}
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-th mr-2"></i>Accesos rápidos</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @php $currentSection = null; @endphp
                    @foreach($opciones as $op)
                        @if(empty($op->pagina))
                            @if($currentSection !== null)</div>@endif
                            <div class="col-12 mt-2 mb-1">
                                <small class="text-muted font-weight-bold text-uppercase">{{ $op->opcion }}</small>
                            </div>
                            <div class="row w-100 mx-0">
                            @php $currentSection = $op->opcion; @endphp
                        @else
                            <div class="col-md-2 col-sm-4 mb-2">
                                <a href="{{ url($op->pagina) }}" class="btn btn-outline-primary btn-sm w-100 text-left">
                                    <i class="fas fa-chevron-right mr-1"></i>{{ $op->opcion }}
                                </a>
                            </div>
                        @endif
                    @endforeach
                    @if($currentSection !== null)</div>@endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('vendor/adminlte/plugins/chart.js/Chart.min.js') }}"></script>
<script>
Chart.defaults.global.defaultFontFamily = "'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif";
Chart.defaults.global.defaultFontSize   = 12;

// ── Gráfica 1: Movimientos PAI por mes ──────────────────────────────────────
new Chart(document.getElementById('chartMovMes').getContext('2d'), {
    type: 'bar',
    data: {
        labels: @json($meses),
        datasets: [
            {
                label: 'Ingresos',
                data: @json($chartIngresos),
                backgroundColor: 'rgba(60,141,188,0.7)',
                borderColor: '#3c8dbc',
                borderWidth: 1,
            },
            {
                label: 'Salidas',
                data: @json($chartSalidas),
                backgroundColor: 'rgba(210,78,67,0.7)',
                borderColor: '#d24343',
                borderWidth: 1,
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            yAxes: [{ ticks: { beginAtZero: true, callback: v => v.toLocaleString() } }]
        },
        tooltips: { callbacks: { label: ctx => ctx.dataset.label + ': ' + ctx.yLabel.toLocaleString() } }
    }
});

// ── Gráfica 2: Saldo por vacuna PAI ─────────────────────────────────────────
var insumoColores = [
    '#3c8dbc','#00a65a','#f39c12','#dd4b39','#605ca8',
    '#39cccc','#d81b60','#e08e0b','#7d7d7d','#00c0ef'
];
new Chart(document.getElementById('chartInsumos').getContext('2d'), {
    type: 'doughnut',
    data: {
        labels: @json($topInsumos->pluck('insumo')),
        datasets: [{
            data: @json($topInsumos->pluck('total')),
            backgroundColor: insumoColores.slice(0, {{ $topInsumos->count() }}),
            borderWidth: 2,
        }]
    },
    options: {
        responsive: true,
        legend: { position: 'bottom', labels: { fontSize: 11 } },
        tooltips: { callbacks: { label: (ctx, data) => {
            var label = data.labels[ctx.index];
            var val   = data.datasets[0].data[ctx.index];
            return label + ': ' + parseInt(val).toLocaleString();
        }}}
    }
});

// ── Gráfica 3: PAI vs COVID últimos 6 meses ──────────────────────────────────
new Chart(document.getElementById('chartPaiVsCovid').getContext('2d'), {
    type: 'line',
    data: {
        labels: @json($labelsUlt6),
        datasets: [
            {
                label: 'PAI',
                data: @json($dataPaiUlt6),
                borderColor: '#3c8dbc',
                backgroundColor: 'rgba(60,141,188,0.1)',
                fill: true,
                pointRadius: 4,
                tension: 0.3,
            },
            {
                label: 'COVID',
                data: @json($dataCovidUlt6),
                borderColor: '#dd4b39',
                backgroundColor: 'rgba(221,75,57,0.1)',
                fill: true,
                pointRadius: 4,
                tension: 0.3,
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            yAxes: [{ ticks: { beginAtZero: true, callback: v => v.toLocaleString() } }]
        },
        tooltips: { callbacks: { label: ctx => ctx.dataset.label + ': ' + ctx.yLabel.toLocaleString() } }
    }
});
</script>
@endpush
