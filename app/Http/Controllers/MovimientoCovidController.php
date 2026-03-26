<?php

namespace App\Http\Controllers;

use App\Models\InstitucionCovid;
use App\Models\LoteCovid;
use App\Models\MovimientoCovid;
use App\Models\PedidoCovid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimientoCovidController extends Controller
{
    public function index()
    {
        return redirect()->route('movimientos-covid.create');
    }

    public function create()
    {
        $instituciones  = InstitucionCovid::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        $pedidos        = PedidoCovid::orderBy('nro_pedido')->get(['id', 'nro_pedido', 'radicado_paiweb']);
        $lotesPorInsumo = LoteCovid::activos()->orderBy('insumo')->orderBy('lote')
                            ->get(['lote', 'insumo', 'saldo'])
                            ->groupBy('insumo');
        return view('covid.movimientos.form', compact('instituciones', 'pedidos', 'lotesPorInsumo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'institucion'         => 'required|string|max:200',
            'fecha_movimiento'    => 'required|date',
            'nro_pedido'          => 'required|integer',
            'observaciones'       => 'nullable|string',
            'tipo_identificacion' => 'nullable|string|max:30',
            'identificacion'      => 'nullable|string|max:30',
            'nombres_apellidos'   => 'nullable|string|max:200',
            'items'               => 'required|array|min:1',
            'items.*.lote'        => 'required|string|max:30|exists:lotes_covid,lote',
            'items.*.ingreso'     => 'required|integer|min:0',
            'items.*.salida'      => 'required|integer|min:0',
        ]);

        $cabecera = $request->only([
            'institucion', 'fecha_movimiento', 'nro_pedido', 'observaciones',
            'tipo_identificacion', 'identificacion', 'nombres_apellidos',
        ]);

        DB::transaction(function () use ($cabecera, $request) {
            foreach ($request->items as $item) {
                MovimientoCovid::create(array_merge($cabecera, [
                    'lote'    => $item['lote'],
                    'ingreso' => (int) $item['ingreso'],
                    'salida'  => (int) $item['salida'],
                ]));
                $lote = LoteCovid::findOrFail($item['lote']);
                $lote->increment('saldo', (int) $item['ingreso']);
                $lote->decrement('saldo', (int) $item['salida']);
            }
        });

        $total = count($request->items);
        return redirect()->route('movimientos-covid.index')
            ->with('success', "Se registraron {$total} movimiento(s) COVID correctamente.");
    }

    public function show(string $id)
    {
        $movimiento = MovimientoCovid::findOrFail($id);
        return view('covid.movimientos.show', compact('movimiento'));
    }

    public function edit(string $id)
    {
        $movimiento     = MovimientoCovid::findOrFail($id);
        $instituciones  = InstitucionCovid::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        $pedidos        = PedidoCovid::orderBy('nro_pedido')->get(['id', 'nro_pedido', 'radicado_paiweb']);
        $lotesPorInsumo = LoteCovid::activos()->orderBy('insumo')->orderBy('lote')
                            ->get(['lote', 'insumo', 'saldo'])
                            ->groupBy('insumo');
        return view('covid.movimientos.form', compact('movimiento', 'instituciones', 'pedidos', 'lotesPorInsumo'));
    }

    public function update(Request $request, string $id)
    {
        $movimiento = MovimientoCovid::findOrFail($id);
        $data = $request->validate([
            'institucion'         => 'required|string|max:200',
            'fecha_movimiento'    => 'required|date',
            'nro_pedido'          => 'required|integer',
            'lote'                => 'required|string|max:30',
            'ingreso'             => 'required|integer|min:0',
            'salida'              => 'required|integer|min:0',
            'observaciones'       => 'nullable|string',
            'tipo_identificacion' => 'nullable|string|max:30',
            'identificacion'      => 'nullable|string|max:30',
            'nombres_apellidos'   => 'nullable|string|max:200',
        ]);

        DB::transaction(function () use ($movimiento, $data) {
            $lote = LoteCovid::findOrFail($movimiento->lote);
            $lote->decrement('saldo', $movimiento->ingreso);
            $lote->increment('saldo', $movimiento->salida);
            $newLote = LoteCovid::findOrFail($data['lote']);
            $newLote->increment('saldo', $data['ingreso']);
            $newLote->decrement('saldo', $data['salida']);
            $movimiento->update($data);
        });

        return redirect()->route('movimientos-covid.index')->with('success', 'Movimiento COVID actualizado.');
    }

    public function destroy(string $id)
    {
        $movimiento = MovimientoCovid::findOrFail($id);
        DB::transaction(function () use ($movimiento) {
            $lote = LoteCovid::find($movimiento->lote);
            if ($lote) {
                $lote->decrement('saldo', $movimiento->ingreso);
                $lote->increment('saldo', $movimiento->salida);
            }
            $movimiento->delete();
        });
        return redirect()->route('movimientos-covid.index')->with('success', 'Movimiento COVID eliminado.');
    }

    public function byInstitucion(Request $request)
    {
        $request->validate(['institucion' => 'required|string']);
        $movimientos = MovimientoCovid::where('institucion', $request->institucion)
            ->orderBy('fecha_movimiento', 'desc')
            ->paginate(30);
        $instituciones = InstitucionCovid::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        return view('covid.movimientos.index', compact('movimientos', 'instituciones'));
    }
}
