<?php

namespace App\Http\Controllers;

use App\Models\Carnet;
use Illuminate\Http\Request;

class CarnetController extends Controller
{
    public function index()
    {
        $carnets = Carnet::orderBy('fecha', 'desc')->paginate(20);
        return view('carnets.index', compact('carnets'));
    }

    public function create()
    {
        $tiposId = [
            'Registro civil',
            'Tarjeta de identidad',
            'Cedula de ciudadanía',
            'Cedula de extranjería',
            'Carnet diplomático',
            'Salvoconducto',
            'Pasaporte',
            'Permiso especial de permanencia',
            'Permiso por protección temporal',
            'Sin documento',
            'Otro',
        ];
        return view('carnets.form', compact('tiposId'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fecha'          => 'required|date',
            'tipo_id'        => 'required|string|max:50',
            'numero_id'      => 'required|string|max:50',
            'expedicion_id'  => 'required|string|max:150',
            'nombres'        => 'required|string|max:200',
            'persona_expide' => 'required|string|max:200',
        ]);

        $carnet = Carnet::create($data);
        return redirect()->route('carnets.show', $carnet)->with('success', 'Carnet registrado correctamente.');
    }

    public function show(string $id)
    {
        $carnet = Carnet::findOrFail($id);
        return view('carnets.show', compact('carnet'));
    }

    public function edit(string $id)
    {
        $carnet = Carnet::findOrFail($id);
        $tiposId = [
            'Registro civil', 'Tarjeta de identidad', 'Cedula de ciudadanía',
            'Cedula de extranjería', 'Carnet diplomático', 'Salvoconducto',
            'Pasaporte', 'Permiso especial de permanencia',
            'Permiso por protección temporal', 'Sin documento', 'Otro',
        ];
        return view('carnets.form', compact('carnet', 'tiposId'));
    }

    public function update(Request $request, string $id)
    {
        $carnet = Carnet::findOrFail($id);
        $data = $request->validate([
            'fecha'          => 'required|date',
            'tipo_id'        => 'required|string|max:50',
            'numero_id'      => 'required|string|max:50',
            'expedicion_id'  => 'required|string|max:150',
            'nombres'        => 'required|string|max:200',
            'persona_expide' => 'required|string|max:200',
        ]);
        $carnet->update($data);
        return redirect()->route('carnets.show', $carnet)->with('success', 'Carnet actualizado.');
    }

    public function destroy(string $id)
    {
        Carnet::findOrFail($id)->delete();
        return redirect()->route('carnets.index')->with('success', 'Carnet eliminado.');
    }
}
