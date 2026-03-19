<?php

namespace App\Http\Controllers;

use App\Models\InstitucionCovid;
use App\Models\LoteCovid;
use App\Models\MovimientoCovid;
use Illuminate\Http\Request;

class ReporteCovidController extends Controller
{
    public function saldoInventario()
    {
        $lotes = LoteCovid::orderBy('insumo')->orderBy('lote')->get();
        return view('covid.reportes.saldo-inventario', compact('lotes'));
    }

    public function institucionFecha(Request $request)
    {
        $instituciones = InstitucionCovid::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        $movimientos   = collect();

        if ($request->filled(['institucion', 'fecha'])) {
            $request->validate([
                'institucion' => 'required|string',
                'fecha'       => 'required|date',
            ]);
            $movimientos = MovimientoCovid::where('institucion', $request->institucion)
                ->whereDate('fecha_movimiento', $request->fecha)
                ->orderBy('lote')
                ->get();
        }

        return view('covid.reportes.institucion-fecha', compact('instituciones', 'movimientos'));
    }

    public function institucionPedido(Request $request)
    {
        $instituciones = InstitucionCovid::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        $movimientos   = collect();

        if ($request->filled('institucion')) {
            $request->validate(['institucion' => 'required|string']);
            $movimientos = MovimientoCovid::where('institucion', $request->institucion)
                ->orderBy('nro_pedido')->orderBy('lote')
                ->get();
        }

        return view('covid.reportes.institucion-pedido', compact('instituciones', 'movimientos'));
    }

    public function institucionPeriodo(Request $request)
    {
        $instituciones = InstitucionCovid::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        $movimientos   = collect();

        if ($request->filled(['institucion', 'desde', 'hasta'])) {
            $request->validate([
                'institucion' => 'required|string',
                'desde'       => 'required|date',
                'hasta'       => 'required|date|after_or_equal:desde',
            ]);
            $movimientos = MovimientoCovid::where('institucion', $request->institucion)
                ->whereBetween('fecha_movimiento', [$request->desde, $request->hasta])
                ->orderBy('fecha_movimiento')
                ->get();
        }

        return view('covid.reportes.institucion-periodo', compact('instituciones', 'movimientos'));
    }

    public function periodo(Request $request)
    {
        $movimientos = collect();

        if ($request->filled(['desde', 'hasta'])) {
            $request->validate([
                'desde' => 'required|date',
                'hasta' => 'required|date|after_or_equal:desde',
            ]);
            $movimientos = MovimientoCovid::whereBetween('fecha_movimiento', [$request->desde, $request->hasta])
                ->orderBy('fecha_movimiento')->orderBy('institucion')
                ->get();
        }

        return view('covid.reportes.periodo', compact('movimientos'));
    }

    public function insumoPeriodo(Request $request)
    {
        $movimientos = collect();

        if ($request->filled(['desde', 'hasta'])) {
            $request->validate([
                'desde' => 'required|date',
                'hasta' => 'required|date|after_or_equal:desde',
            ]);
            $movimientos = MovimientoCovid::with('loteRelacion')
                ->whereBetween('fecha_movimiento', [$request->desde, $request->hasta])
                ->orderBy('lote')
                ->get()
                ->groupBy(fn($m) => $m->loteRelacion?->insumo ?? $m->lote);
        }

        return view('covid.reportes.insumo-periodo', compact('movimientos'));
    }
}
