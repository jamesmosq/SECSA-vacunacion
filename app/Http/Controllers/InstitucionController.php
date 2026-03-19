<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    public function index()
    {
        $instituciones = Institucion::orderBy('nombre_institucion')->paginate(20);
        return view('instituciones.index', compact('instituciones'));
    }

    public function create()
    {
        return view('instituciones.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'codigo_habilitacion' => 'required|integer|unique:instituciones,codigo_habilitacion',
            'nombre_institucion'  => 'required|string|max:200',
            'estado'              => 'required|in:Activo,Inactivo',
        ]);

        Institucion::create($data);
        return redirect()->route('instituciones.index')->with('success', 'Institución creada.');
    }

    public function show(string $id)
    {
        $institucion = Institucion::findOrFail($id);
        return view('instituciones.show', compact('institucion'));
    }

    public function edit(string $id)
    {
        $institucion = Institucion::findOrFail($id);
        return view('instituciones.form', compact('institucion'));
    }

    public function update(Request $request, string $id)
    {
        $institucion = Institucion::findOrFail($id);
        $data = $request->validate([
            'nombre_institucion' => 'required|string|max:200',
            'estado'             => 'required|in:Activo,Inactivo',
        ]);
        $institucion->update($data);
        return redirect()->route('instituciones.index')->with('success', 'Institución actualizada.');
    }

    public function destroy(string $id)
    {
        Institucion::findOrFail($id)->delete();
        return redirect()->route('instituciones.index')->with('success', 'Institución eliminada.');
    }
}
