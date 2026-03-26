<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use App\Models\Lote;
use App\Models\Movimiento;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimientoController extends Controller
{
    public function index()
    {
        return redirect()->route('movimientos.create');
    }

    public function create()
    {
        $instituciones  = Institucion::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        $pedidos        = Pedido::orderBy('nro_pedido')->get(['id', 'nro_pedido', 'radicado_paiweb']);
        $lotesPorInsumo = Lote::activos()->orderBy('insumo')->orderBy('lote')
                            ->get(['lote', 'insumo', 'saldo'])
                            ->groupBy('insumo');
        return view('movimientos.form', compact('instituciones', 'pedidos', 'lotesPorInsumo'));
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
            'items.*.lote'        => 'required|string|max:30|exists:lotes,lote',
            'items.*.ingreso'     => 'required|integer|min:0',
            'items.*.salida'      => 'required|integer|min:0',
        ]);

        $cabecera = $request->only([
            'institucion', 'fecha_movimiento', 'nro_pedido', 'observaciones',
            'tipo_identificacion', 'identificacion', 'nombres_apellidos',
        ]);

        DB::transaction(function () use ($cabecera, $request) {
            foreach ($request->items as $item) {
                Movimiento::create(array_merge($cabecera, [
                    'lote'    => $item['lote'],
                    'ingreso' => (int) $item['ingreso'],
                    'salida'  => (int) $item['salida'],
                ]));
                $lote = Lote::findOrFail($item['lote']);
                $lote->increment('saldo', (int) $item['ingreso']);
                $lote->decrement('saldo', (int) $item['salida']);
            }
        });

        $total = count($request->items);
        return redirect()->route('movimientos.index')
            ->with('success', "Se registraron {$total} movimiento(s) correctamente.");
    }

    public function show(string $id)
    {
        $movimiento = Movimiento::findOrFail($id);
        return view('movimientos.show', compact('movimiento'));
    }

    public function edit(string $id)
    {
        $movimiento     = Movimiento::findOrFail($id);
        $instituciones  = Institucion::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        $pedidos        = Pedido::orderBy('nro_pedido')->get(['id', 'nro_pedido', 'radicado_paiweb']);
        $lotesPorInsumo = Lote::activos()->orderBy('insumo')->orderBy('lote')
                            ->get(['lote', 'insumo', 'saldo'])
                            ->groupBy('insumo');
        return view('movimientos.form', compact('movimiento', 'instituciones', 'pedidos', 'lotesPorInsumo'));
    }

    public function update(Request $request, string $id)
    {
        $movimiento = Movimiento::findOrFail($id);
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
            $lote = Lote::findOrFail($movimiento->lote);
            // Revert old
            $lote->decrement('saldo', $movimiento->ingreso);
            $lote->increment('saldo', $movimiento->salida);
            // Apply new
            $newLote = Lote::findOrFail($data['lote']);
            $newLote->increment('saldo', $data['ingreso']);
            $newLote->decrement('saldo', $data['salida']);
            $movimiento->update($data);
        });

        return redirect()->route('movimientos.index')->with('success', 'Movimiento actualizado.');
    }

    public function destroy(string $id)
    {
        $movimiento = Movimiento::findOrFail($id);
        DB::transaction(function () use ($movimiento) {
            $lote = Lote::find($movimiento->lote);
            if ($lote) {
                $lote->decrement('saldo', $movimiento->ingreso);
                $lote->increment('saldo', $movimiento->salida);
            }
            $movimiento->delete();
        });
        return redirect()->route('movimientos.index')->with('success', 'Movimiento eliminado.');
    }

    public function byInstitucion(Request $request)
    {
        $request->validate(['institucion' => 'required|string']);
        $movimientos = Movimiento::where('institucion', $request->institucion)
            ->orderBy('fecha_movimiento', 'desc')
            ->paginate(30);
        $instituciones = Institucion::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        return view('movimientos.index', compact('movimientos', 'instituciones'));
    }
}
