<?php

namespace App\Http\Controllers;

use App\Models\InsumoCovid;
use Illuminate\Http\Request;

class InsumoCovidController extends Controller
{
    public function index()
    {
        $insumos = InsumoCovid::orderBy('nombre')->paginate(20);
        return view('covid.insumos.index', compact('insumos'));
    }

    public function create()
    {
        return view('covid.insumos.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['nombre' => 'required|string|max:200|unique:insumos_covid,nombre']);
        InsumoCovid::create($data);
        return redirect()->route('insumos-covid.index')->with('success', 'Insumo COVID creado.');
    }

    public function show(string $id)
    {
        $insumo = InsumoCovid::findOrFail($id);
        return view('covid.insumos.show', compact('insumo'));
    }

    public function edit(string $id)
    {
        $insumo = InsumoCovid::findOrFail($id);
        return view('covid.insumos.form', compact('insumo'));
    }

    public function update(Request $request, string $id)
    {
        $insumo = InsumoCovid::findOrFail($id);
        $data = $request->validate(['nombre' => 'required|string|max:200|unique:insumos_covid,nombre,' . $id]);
        $insumo->update($data);
        return redirect()->route('insumos-covid.index')->with('success', 'Insumo COVID actualizado.');
    }

    public function destroy(string $id)
    {
        InsumoCovid::findOrFail($id)->delete();
        return redirect()->route('insumos-covid.index')->with('success', 'Insumo COVID eliminado.');
    }
}
