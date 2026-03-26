<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use App\Models\Lote;
use App\Models\Movimiento;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    use \App\Http\Controllers\Concerns\ExportaReporte;
    public function saldoInventario()
    {
        $lotes = Lote::orderBy('insumo')->orderBy('lote')->get();
        return view('reportes.saldo-inventario', compact('lotes'));
    }

    public function institucionFecha(Request $request)
    {
        $instituciones = Institucion::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        $grupos        = collect();

        if ($request->filled(['institucion', 'fecha'])) {
            $request->validate([
                'institucion' => 'required|string',
                'fecha'       => 'required|date',
            ]);
            $grupos = Movimiento::with('loteRelacion')
                ->where('institucion', $request->institucion)
                ->whereDate('fecha_movimiento', $request->fecha)
                ->orderBy('nro_pedido')->orderBy('lote')
                ->get()
                ->groupBy(fn($m) => $m->fecha_movimiento->format('Y-m-d') . '|' . $m->nro_pedido . '|' . $m->observaciones);
        }

        if ($request->input('format') === 'pdf') return $this->exportarPdf('Informe por Institución y Fecha', $grupos);
        if ($request->input('format') === 'csv') return $this->exportarCsv('Informe por Institución y Fecha', $grupos);
        return view('reportes.institucion-fecha', compact('instituciones', 'grupos'));
    }

    public function institucionPedido(Request $request)
    {
        $instituciones = Institucion::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        $grupos        = collect();

        if ($request->filled('institucion')) {
            $request->validate(['institucion' => 'required|string']);
            $grupos = Movimiento::with('loteRelacion')
                ->where('institucion', $request->institucion)
                ->orderBy('nro_pedido')->orderBy('fecha_movimiento')->orderBy('lote')
                ->get()
                ->groupBy(fn($m) => $m->nro_pedido . '|' . $m->fecha_movimiento->format('Y-m-d') . '|' . $m->observaciones);
        }

        if ($request->input('format') === 'pdf') return $this->exportarPdf('Informe por Institución y Pedido', $grupos);
        if ($request->input('format') === 'csv') return $this->exportarCsv('Informe por Institución y Pedido', $grupos);
        return view('reportes.institucion-pedido', compact('instituciones', 'grupos'));
    }

    public function institucionPeriodo(Request $request)
    {
        $instituciones = Institucion::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        $grupos        = collect();

        if ($request->filled(['institucion', 'desde', 'hasta'])) {
            $request->validate([
                'institucion' => 'required|string',
                'desde'       => 'required|date',
                'hasta'       => 'required|date|after_or_equal:desde',
            ]);
            $grupos = Movimiento::with('loteRelacion')
                ->where('institucion', $request->institucion)
                ->whereBetween('fecha_movimiento', [$request->desde, $request->hasta])
                ->orderBy('fecha_movimiento')->orderBy('nro_pedido')->orderBy('lote')
                ->get()
                ->groupBy(fn($m) => $m->fecha_movimiento->format('Y-m-d') . '|' . $m->nro_pedido . '|' . $m->observaciones);
        }

        if ($request->input('format') === 'pdf') return $this->exportarPdf('Informe por Institución y Periodo', $grupos);
        if ($request->input('format') === 'csv') return $this->exportarCsv('Informe por Institución y Periodo', $grupos);
        return view('reportes.institucion-periodo', compact('instituciones', 'grupos'));
    }

    public function periodo(Request $request)
    {
        $grupos = collect();

        if ($request->filled(['desde', 'hasta'])) {
            $request->validate([
                'desde' => 'required|date',
                'hasta' => 'required|date|after_or_equal:desde',
            ]);
            $grupos = Movimiento::with('loteRelacion')
                ->whereBetween('fecha_movimiento', [$request->desde, $request->hasta])
                ->orderBy('fecha_movimiento')->orderBy('institucion')->orderBy('nro_pedido')->orderBy('lote')
                ->get()
                ->groupBy(fn($m) => $m->fecha_movimiento->format('Y-m-d') . '|' . $m->institucion . '|' . $m->nro_pedido . '|' . $m->observaciones);
        }

        if ($request->input('format') === 'pdf') return $this->exportarPdf('Informe por Periodo', $grupos);
        if ($request->input('format') === 'csv') return $this->exportarCsv('Informe por Periodo', $grupos);
        return view('reportes.periodo', compact('grupos'));
    }

    public function insumoPeriodo(Request $request)
    {
        $grupos = collect();

        if ($request->filled(['desde', 'hasta'])) {
            $request->validate([
                'desde' => 'required|date',
                'hasta' => 'required|date|after_or_equal:desde',
            ]);
            $grupos = Movimiento::with('loteRelacion')
                ->whereBetween('fecha_movimiento', [$request->desde, $request->hasta])
                ->orderBy('lote')
                ->get()
                ->groupBy(fn($m) => $m->loteRelacion?->insumo ?? $m->lote);
        }

        if ($request->input('format') === 'pdf') return $this->exportarPdf('Informe por Insumo y Periodo', $grupos);
        if ($request->input('format') === 'csv') return $this->exportarCsv('Informe por Insumo y Periodo', $grupos);
        return view('reportes.insumo-periodo', compact('grupos'));
    }

    public function cohorte()
    {
        return view('reportes.cohorte');
    }

    public function estadistica()
    {
        return view('reportes.estadistica');
    }
}
