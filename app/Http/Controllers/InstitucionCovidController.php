<?php

namespace App\Http\Controllers;

use App\Models\InstitucionCovid;
use Illuminate\Http\Request;

class InstitucionCovidController extends Controller
{
    public function index()
    {
        $instituciones = InstitucionCovid::orderBy('nombre_institucion')->paginate(20);
        return view('covid.instituciones.index', compact('instituciones'));
    }

    public function create()
    {
        return view('covid.instituciones.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'codigo_habilitacion' => 'required|integer|unique:instituciones_covid,codigo_habilitacion',
            'nombre_institucion'  => 'required|string|max:200',
            'estado'              => 'required|in:Activo,Inactivo',
        ]);
        InstitucionCovid::create($data);
        return redirect()->route('instituciones-covid.index')->with('success', 'Institución COVID creada.');
    }

    public function show(string $id)
    {
        $institucion = InstitucionCovid::findOrFail($id);
        return view('covid.instituciones.show', compact('institucion'));
    }

    public function edit(string $id)
    {
        $institucion = InstitucionCovid::findOrFail($id);
        return view('covid.instituciones.form', compact('institucion'));
    }

    public function update(Request $request, string $id)
    {
        $institucion = InstitucionCovid::findOrFail($id);
        $data = $request->validate([
            'nombre_institucion' => 'required|string|max:200',
            'estado'             => 'required|in:Activo,Inactivo',
        ]);
        $institucion->update($data);
        return redirect()->route('instituciones-covid.index')->with('success', 'Institución COVID actualizada.');
    }

    public function destroy(string $id)
    {
        InstitucionCovid::findOrFail($id)->delete();
        return redirect()->route('instituciones-covid.index')->with('success', 'Institución COVID eliminada.');
    }
}
