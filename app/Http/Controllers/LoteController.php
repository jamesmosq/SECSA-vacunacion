<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Models\Laboratorio;
use App\Models\Lote;
use App\Models\Presentacion;
use Illuminate\Http\Request;

class LoteController extends Controller
{
    public function index()
    {
        $lotes = Lote::orderBy('insumo')->orderBy('lote')->paginate(30);
        return view('lotes.index', compact('lotes'));
    }

    public function create()
    {
        $insumos        = Insumo::orderBy('nombre')->pluck('nombre');
        $laboratorios   = Laboratorio::orderBy('nombre')->pluck('nombre');
        $presentaciones = Presentacion::orderBy('descripcion')->pluck('descripcion');
        return view('lotes.form', compact('insumos', 'laboratorios', 'presentaciones'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'lote'              => 'required|string|max:30|unique:lotes,lote',
            'insumo'            => 'required|string|max:200',
            'presentacion'      => 'required|string|max:200',
            'fecha_vencimiento' => 'nullable|date',
            'laboratorio'       => 'nullable|string|max:200',
            'saldo'             => 'required|integer|min:0',
            'estado'            => 'required|in:Activo,Inactivo',
            'observacion'       => 'nullable|string',
        ]);

        $data['lote'] = strtoupper($data['lote']);
        Lote::create($data);

        return redirect()->route('lotes.index')->with('success', 'Lote creado correctamente.');
    }

    public function show(string $id)
    {
        $lote = Lote::findOrFail($id);
        return view('lotes.show', compact('lote'));
    }

    public function edit(string $loteCode)
    {
        $lote           = Lote::findOrFail($loteCode);
        $insumos        = Insumo::orderBy('nombre')->pluck('nombre');
        $laboratorios   = Laboratorio::orderBy('nombre')->pluck('nombre');
        $presentaciones = Presentacion::orderBy('descripcion')->pluck('descripcion');
        return view('lotes.form', compact('lote', 'insumos', 'laboratorios', 'presentaciones'));
    }

    public function update(Request $request, string $loteCode)
    {
        $lote = Lote::findOrFail($loteCode);
        $data = $request->validate([
            'insumo'            => 'required|string|max:200',
            'presentacion'      => 'required|string|max:200',
            'fecha_vencimiento' => 'nullable|date',
            'laboratorio'       => 'nullable|string|max:200',
            'saldo'             => 'required|integer|min:0',
            'estado'            => 'required|in:Activo,Inactivo',
            'observacion'       => 'nullable|string',
        ]);

        $lote->update($data);
        return redirect()->route('lotes.index')->with('success', 'Lote actualizado correctamente.');
    }

    public function destroy(string $loteCode)
    {
        Lote::findOrFail($loteCode)->delete();
        return redirect()->route('lotes.index')->with('success', 'Lote eliminado.');
    }
}
