<?php

namespace App\Http\Controllers;

use App\Models\LaboratorioCovid;
use Illuminate\Http\Request;

class LaboratorioCovidController extends Controller
{
    public function index()
    {
        $laboratorios = LaboratorioCovid::orderBy('nombre')->paginate(20);
        return view('covid.laboratorios.index', compact('laboratorios'));
    }

    public function create()
    {
        return view('covid.laboratorios.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['nombre' => 'required|string|max:200|unique:laboratorios_covid,nombre']);
        LaboratorioCovid::create($data);
        return redirect()->route('laboratorios-covid.index')->with('success', 'Laboratorio COVID creado.');
    }

    public function show(string $id)
    {
        $laboratorio = LaboratorioCovid::findOrFail($id);
        return view('covid.laboratorios.show', compact('laboratorio'));
    }

    public function edit(string $id)
    {
        $laboratorio = LaboratorioCovid::findOrFail($id);
        return view('covid.laboratorios.form', compact('laboratorio'));
    }

    public function update(Request $request, string $id)
    {
        $laboratorio = LaboratorioCovid::findOrFail($id);
        $data = $request->validate(['nombre' => 'required|string|max:200|unique:laboratorios_covid,nombre,' . $id]);
        $laboratorio->update($data);
        return redirect()->route('laboratorios-covid.index')->with('success', 'Laboratorio COVID actualizado.');
    }

    public function destroy(string $id)
    {
        LaboratorioCovid::findOrFail($id)->delete();
        return redirect()->route('laboratorios-covid.index')->with('success', 'Laboratorio COVID eliminado.');
    }
}
