<?php

namespace App\Http\Controllers;

use App\Models\InsumoCovid;
use App\Models\LaboratorioCovid;
use App\Models\LoteCovid;
use App\Models\PresentacionCovid;
use Illuminate\Http\Request;

class LoteCovidController extends Controller
{
    public function index()
    {
        $lotes = LoteCovid::orderBy('insumo')->orderBy('lote')->paginate(30);
        return view('covid.lotes.index', compact('lotes'));
    }

    public function create()
    {
        $insumos        = InsumoCovid::orderBy('nombre')->pluck('nombre');
        $laboratorios   = LaboratorioCovid::orderBy('nombre')->pluck('nombre');
        $presentaciones = PresentacionCovid::orderBy('descripcion')->pluck('descripcion');
        return view('covid.lotes.form', compact('insumos', 'laboratorios', 'presentaciones'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'lote'              => 'required|string|max:30|unique:lotes_covid,lote',
            'insumo'            => 'required|string|max:200',
            'presentacion'      => 'required|string|max:200',
            'fecha_vencimiento' => 'nullable|date',
            'laboratorio'       => 'nullable|string|max:200',
            'saldo'             => 'required|integer|min:0',
            'estado'            => 'required|in:Activo,Inactivo',
            'observacion'       => 'nullable|string',
        ]);

        $data['lote'] = strtoupper($data['lote']);
        LoteCovid::create($data);

        return redirect()->route('lotes-covid.index')->with('success', 'Lote COVID creado correctamente.');
    }

    public function show(string $id)
    {
        $lote = LoteCovid::findOrFail($id);
        return view('covid.lotes.show', compact('lote'));
    }

    public function edit(string $loteCode)
    {
        $lote           = LoteCovid::findOrFail($loteCode);
        $insumos        = InsumoCovid::orderBy('nombre')->pluck('nombre');
        $laboratorios   = LaboratorioCovid::orderBy('nombre')->pluck('nombre');
        $presentaciones = PresentacionCovid::orderBy('descripcion')->pluck('descripcion');
        return view('covid.lotes.form', compact('lote', 'insumos', 'laboratorios', 'presentaciones'));
    }

    public function update(Request $request, string $loteCode)
    {
        $lote = LoteCovid::findOrFail($loteCode);
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
        return redirect()->route('lotes-covid.index')->with('success', 'Lote COVID actualizado.');
    }

    public function destroy(string $loteCode)
    {
        LoteCovid::findOrFail($loteCode)->delete();
        return redirect()->route('lotes-covid.index')->with('success', 'Lote COVID eliminado.');
    }
}
