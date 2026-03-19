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
        $instituciones = Institucion::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        return view('movimientos.index', compact('instituciones'));
    }

    public function create()
    {
        $instituciones = Institucion::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        $pedidos       = Pedido::orderBy('nro_pedido')->get(['id', 'nro_pedido', 'radicado_paiweb']);
        $lotes         = Lote::activos()->orderBy('insumo')->get(['lote', 'insumo', 'saldo']);
        return view('movimientos.form', compact('instituciones', 'pedidos', 'lotes'));
    }

    public function store(Request $request)
    {
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

        DB::transaction(function () use ($data) {
            Movimiento::create($data);
            $lote = Lote::findOrFail($data['lote']);
            $lote->increment('saldo', $data['ingreso']);
            $lote->decrement('saldo', $data['salida']);
        });

        return redirect()->route('movimientos.index')->with('success', 'Movimiento registrado correctamente.');
    }

    public function show(string $id)
    {
        $movimiento = Movimiento::findOrFail($id);
        return view('movimientos.show', compact('movimiento'));
    }

    public function edit(string $id)
    {
        $movimiento    = Movimiento::findOrFail($id);
        $instituciones = Institucion::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        $pedidos       = Pedido::orderBy('nro_pedido')->get(['id', 'nro_pedido', 'radicado_paiweb']);
        $lotes         = Lote::activos()->orderBy('insumo')->get(['lote', 'insumo', 'saldo']);
        return view('movimientos.form', compact('movimiento', 'instituciones', 'pedidos', 'lotes'));
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
