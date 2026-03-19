<?php

namespace App\Http\Controllers;

use App\Models\Carnet;
use App\Models\Lote;
use App\Models\LoteCovid;
use App\Models\Movimiento;
use App\Models\MovimientoCovid;
use App\Models\Pedido;
use App\Models\PedidoCovid;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $hoy       = now();
        $anio      = $hoy->year;
        $mes       = $hoy->month;
        $inicio    = $hoy->copy()->startOfMonth();
        $fin       = $hoy->copy()->endOfMonth();
        $en90dias  = $hoy->copy()->addDays(90);

        // ── PAI: Inventario ──────────────────────────────────────────────
        $saldoTotalPai    = Lote::where('estado', 'Activo')->sum('saldo');
        $lotesActivosPai  = Lote::where('estado', 'Activo')->count();
        $lotesVencidosPai = Lote::where('estado', 'Activo')
            ->whereNotNull('fecha_vencimiento')
            ->whereDate('fecha_vencimiento', '<', $hoy)
            ->count();
        $lotesPorVencer   = Lote::where('estado', 'Activo')
            ->whereNotNull('fecha_vencimiento')
            ->whereDate('fecha_vencimiento', '>=', $hoy)
            ->whereDate('fecha_vencimiento', '<=', $en90dias)
            ->count();

        // ── PAI: Movimientos del mes ─────────────────────────────────────
        $movMes     = Movimiento::whereBetween('fecha_movimiento', [$inicio, $fin]);
        $ingresosMes = (clone $movMes)->sum('ingreso');
        $salidasMes  = (clone $movMes)->sum('salida');
        $totalMovMes = (clone $movMes)->count();

        // ── COVID: Inventario ────────────────────────────────────────────
        $saldoTotalCovid   = LoteCovid::where('estado', 'Activo')->sum('saldo');
        $lotesActivosCovid = LoteCovid::where('estado', 'Activo')->count();

        $movMesCovid     = MovimientoCovid::whereBetween('fecha_movimiento', [$inicio, $fin]);
        $ingresosMesCovid = (clone $movMesCovid)->sum('ingreso');
        $salidasMesCovid  = (clone $movMesCovid)->sum('salida');

        // ── Carnets ──────────────────────────────────────────────────────
        $carnetsMes   = Carnet::whereMonth('fecha', $mes)->whereYear('fecha', $anio)->count();
        $carnetsAnio  = Carnet::whereYear('fecha', $anio)->count();
        $carnetsTotal = Carnet::count();

        // ── Pedidos ──────────────────────────────────────────────────────
        $pedidosTotal      = Pedido::count();
        $pedidosCovidTotal = PedidoCovid::count();

        // ── Gráfica 1: Movimientos PAI por mes (año actual) ──────────────
        $movPorMesRaw = DB::table('movimientos')
            ->selectRaw("EXTRACT(MONTH FROM fecha_movimiento)::INTEGER as mes,
                         SUM(ingreso) as ingresos,
                         SUM(salida)  as salidas")
            ->whereRaw("EXTRACT(YEAR FROM fecha_movimiento) = ?", [$anio])
            ->groupByRaw("EXTRACT(MONTH FROM fecha_movimiento)::INTEGER")
            ->orderBy('mes')
            ->get()
            ->keyBy('mes');

        $meses       = ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
        $chartIngresos = [];
        $chartSalidas  = [];
        foreach (range(1, 12) as $m) {
            $chartIngresos[] = (int) ($movPorMesRaw[$m]->ingresos ?? 0);
            $chartSalidas[]  = (int) ($movPorMesRaw[$m]->salidas  ?? 0);
        }

        // ── Gráfica 2: Top insumos PAI por saldo ─────────────────────────
        $topInsumos = Lote::where('estado', 'Activo')
            ->selectRaw('insumo, SUM(saldo) as total')
            ->groupBy('insumo')
            ->orderByDesc('total')
            ->limit(8)
            ->get();

        // ── Gráfica 3: Comparativo PAI vs COVID últimos 6 meses ──────────
        $hace6meses = $hoy->copy()->subMonths(5)->startOfMonth();

        $movPaiUlt = DB::table('movimientos')
            ->selectRaw("TO_CHAR(fecha_movimiento, 'YYYY-MM') as periodo,
                         SUM(salida) as total")
            ->where('fecha_movimiento', '>=', $hace6meses)
            ->groupByRaw("TO_CHAR(fecha_movimiento, 'YYYY-MM')")
            ->orderByRaw("TO_CHAR(fecha_movimiento, 'YYYY-MM')")
            ->get()
            ->keyBy('periodo');

        $movCovidUlt = DB::table('movimientos_covid')
            ->selectRaw("TO_CHAR(fecha_movimiento, 'YYYY-MM') as periodo,
                         SUM(salida) as total")
            ->where('fecha_movimiento', '>=', $hace6meses)
            ->groupByRaw("TO_CHAR(fecha_movimiento, 'YYYY-MM')")
            ->orderByRaw("TO_CHAR(fecha_movimiento, 'YYYY-MM')")
            ->get()
            ->keyBy('periodo');

        $labelsUlt6 = [];
        $dataPaiUlt6 = [];
        $dataCovidUlt6 = [];
        $cursor = $hoy->copy()->subMonths(5)->startOfMonth();
        for ($i = 0; $i < 6; $i++) {
            $key = $cursor->format('Y-m');
            $labelsUlt6[]    = $meses[$cursor->month - 1].' '.$cursor->year;
            $dataPaiUlt6[]   = (int) ($movPaiUlt[$key]->total ?? 0);
            $dataCovidUlt6[] = (int) ($movCovidUlt[$key]->total ?? 0);
            $cursor->addMonth();
        }

        // ── Tabla: lotes próximos a vencer (≤ 90 días) ───────────────────
        $lotesProxVencer = Lote::where('estado', 'Activo')
            ->whereNotNull('fecha_vencimiento')
            ->whereDate('fecha_vencimiento', '>=', $hoy)
            ->whereDate('fecha_vencimiento', '<=', $en90dias)
            ->orderBy('fecha_vencimiento')
            ->limit(10)
            ->get();

        // ── Tabla: top instituciones del mes ─────────────────────────────
        $topInstituciones = DB::table('movimientos')
            ->selectRaw('institucion, SUM(salida) as total_salidas, COUNT(*) as movimientos')
            ->whereBetween('fecha_movimiento', [$inicio, $fin])
            ->where('salida', '>', 0)
            ->groupBy('institucion')
            ->orderByDesc('total_salidas')
            ->limit(8)
            ->get();

        return view('dashboard', compact(
            'saldoTotalPai', 'lotesActivosPai', 'lotesVencidosPai', 'lotesPorVencer',
            'ingresosMes', 'salidasMes', 'totalMovMes',
            'saldoTotalCovid', 'lotesActivosCovid', 'ingresosMesCovid', 'salidasMesCovid',
            'carnetsMes', 'carnetsAnio', 'carnetsTotal',
            'pedidosTotal', 'pedidosCovidTotal',
            'meses', 'chartIngresos', 'chartSalidas',
            'topInsumos',
            'labelsUlt6', 'dataPaiUlt6', 'dataCovidUlt6',
            'lotesProxVencer', 'topInstituciones'
        ));
    }
}
