<?php

namespace App\Http\Controllers;

use App\Models\InstitucionCovid;
use App\Models\LoteCovid;
use App\Models\MovimientoCovid;
use Illuminate\Http\Request;

class ReporteCovidController extends Controller
{
    use \App\Http\Controllers\Concerns\ExportaReporte;
    public function saldoInventario()
    {
        $lotes = LoteCovid::orderBy('insumo')->orderBy('lote')->get();
        return view('covid.reportes.saldo-inventario', compact('lotes'));
    }

    public function institucionFecha(Request $request)
    {
        $instituciones = InstitucionCovid::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        $grupos        = collect();

        if ($request->filled(['institucion', 'fecha'])) {
            $request->validate([
                'institucion' => 'required|string',
                'fecha'       => 'required|date',
            ]);
            $grupos = MovimientoCovid::with('loteRelacion')
                ->where('institucion', $request->institucion)
                ->whereDate('fecha_movimiento', $request->fecha)
                ->orderBy('nro_pedido')->orderBy('lote')
                ->get()
                ->groupBy(fn($m) => $m->fecha_movimiento->format('Y-m-d') . '|' . $m->nro_pedido . '|' . $m->observaciones);
        }

        if ($request->input('format') === 'pdf') return $this->exportarPdf('COVID — Informe por Institución y Fecha', $grupos, true);
        if ($request->input('format') === 'csv') return $this->exportarCsv('COVID — Informe por Institución y Fecha', $grupos);
        return view('covid.reportes.institucion-fecha', compact('instituciones', 'grupos'));
    }

    public function institucionPedido(Request $request)
    {
        $instituciones = InstitucionCovid::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        $grupos        = collect();

        if ($request->filled('institucion')) {
            $request->validate(['institucion' => 'required|string']);
            $grupos = MovimientoCovid::with('loteRelacion')
                ->where('institucion', $request->institucion)
                ->orderBy('nro_pedido')->orderBy('fecha_movimiento')->orderBy('lote')
                ->get()
                ->groupBy(fn($m) => $m->nro_pedido . '|' . $m->fecha_movimiento->format('Y-m-d') . '|' . $m->observaciones);
        }

        if ($request->input('format') === 'pdf') return $this->exportarPdf('COVID — Informe por Institución y Pedido', $grupos, true);
        if ($request->input('format') === 'csv') return $this->exportarCsv('COVID — Informe por Institución y Pedido', $grupos);
        return view('covid.reportes.institucion-pedido', compact('instituciones', 'grupos'));
    }

    public function institucionPeriodo(Request $request)
    {
        $instituciones = InstitucionCovid::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        $grupos        = collect();

        if ($request->filled(['institucion', 'desde', 'hasta'])) {
            $request->validate([
                'institucion' => 'required|string',
                'desde'       => 'required|date',
                'hasta'       => 'required|date|after_or_equal:desde',
            ]);
            $grupos = MovimientoCovid::with('loteRelacion')
                ->where('institucion', $request->institucion)
                ->whereBetween('fecha_movimiento', [$request->desde, $request->hasta])
                ->orderBy('fecha_movimiento')->orderBy('nro_pedido')->orderBy('lote')
                ->get()
                ->groupBy(fn($m) => $m->fecha_movimiento->format('Y-m-d') . '|' . $m->nro_pedido . '|' . $m->observaciones);
        }

        if ($request->input('format') === 'pdf') return $this->exportarPdf('COVID — Informe por Institución y Periodo', $grupos, true);
        if ($request->input('format') === 'csv') return $this->exportarCsv('COVID — Informe por Institución y Periodo', $grupos);
        return view('covid.reportes.institucion-periodo', compact('instituciones', 'grupos'));
    }

    public function periodo(Request $request)
    {
        $grupos = collect();

        if ($request->filled(['desde', 'hasta'])) {
            $request->validate([
                'desde' => 'required|date',
                'hasta' => 'required|date|after_or_equal:desde',
            ]);
            $grupos = MovimientoCovid::with('loteRelacion')
                ->whereBetween('fecha_movimiento', [$request->desde, $request->hasta])
                ->orderBy('fecha_movimiento')->orderBy('institucion')->orderBy('nro_pedido')->orderBy('lote')
                ->get()
                ->groupBy(fn($m) => $m->fecha_movimiento->format('Y-m-d') . '|' . $m->institucion . '|' . $m->nro_pedido . '|' . $m->observaciones);
        }

        if ($request->input('format') === 'pdf') return $this->exportarPdf('COVID — Informe por Periodo', $grupos, true);
        if ($request->input('format') === 'csv') return $this->exportarCsv('COVID — Informe por Periodo', $grupos);
        return view('covid.reportes.periodo', compact('grupos'));
    }

    public function insumoPeriodo(Request $request)
    {
        $grupos = collect();

        if ($request->filled(['desde', 'hasta'])) {
            $request->validate([
                'desde' => 'required|date',
                'hasta' => 'required|date|after_or_equal:desde',
            ]);
            $grupos = MovimientoCovid::with('loteRelacion')
                ->whereBetween('fecha_movimiento', [$request->desde, $request->hasta])
                ->orderBy('lote')
                ->get()
                ->groupBy(fn($m) => $m->loteRelacion?->insumo ?? $m->lote);
        }

        if ($request->input('format') === 'pdf') return $this->exportarPdf('COVID — Informe por Insumo y Periodo', $grupos, true);
        if ($request->input('format') === 'csv') return $this->exportarCsv('COVID — Informe por Insumo y Periodo', $grupos);
        return view('covid.reportes.insumo-periodo', compact('grupos'));
    }
}
