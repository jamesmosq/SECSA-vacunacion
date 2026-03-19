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
        $instituciones = InstitucionCovid::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        return view('covid.movimientos.index', compact('instituciones'));
    }

    public function create()
    {
        $instituciones = InstitucionCovid::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        $pedidos       = PedidoCovid::orderBy('nro_pedido')->get(['id', 'nro_pedido', 'radicado_paiweb']);
        $lotes         = LoteCovid::activos()->orderBy('insumo')->get(['lote', 'insumo', 'saldo']);
        return view('covid.movimientos.form', compact('instituciones', 'pedidos', 'lotes'));
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
            MovimientoCovid::create($data);
            $lote = LoteCovid::findOrFail($data['lote']);
            $lote->increment('saldo', $data['ingreso']);
            $lote->decrement('saldo', $data['salida']);
        });

        return redirect()->route('movimientos-covid.index')->with('success', 'Movimiento COVID registrado.');
    }

    public function show(string $id)
    {
        $movimiento = MovimientoCovid::findOrFail($id);
        return view('covid.movimientos.show', compact('movimiento'));
    }

    public function edit(string $id)
    {
        $movimiento    = MovimientoCovid::findOrFail($id);
        $instituciones = InstitucionCovid::activos()->orderBy('nombre_institucion')->pluck('nombre_institucion');
        $pedidos       = PedidoCovid::orderBy('nro_pedido')->get(['id', 'nro_pedido', 'radicado_paiweb']);
        $lotes         = LoteCovid::activos()->orderBy('insumo')->get(['lote', 'insumo', 'saldo']);
        return view('covid.movimientos.form', compact('movimiento', 'instituciones', 'pedidos', 'lotes'));
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
