<?php

namespace App\Http\Controllers;

use App\Models\PresentacionCovid;
use Illuminate\Http\Request;

class PresentacionCovidController extends Controller
{
    public function index()
    {
        $presentaciones = PresentacionCovid::orderBy('descripcion')->paginate(20);
        return view('covid.presentaciones.index', compact('presentaciones'));
    }

    public function create()
    {
        return view('covid.presentaciones.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['descripcion' => 'required|string|max:200|unique:presentaciones_covid,descripcion']);
        PresentacionCovid::create($data);
        return redirect()->route('presentaciones-covid.index')->with('success', 'Presentación COVID creada.');
    }

    public function show(string $id)
    {
        $presentacion = PresentacionCovid::findOrFail($id);
        return view('covid.presentaciones.show', compact('presentacion'));
    }

    public function edit(string $id)
    {
        $presentacion = PresentacionCovid::findOrFail($id);
        return view('covid.presentaciones.form', compact('presentacion'));
    }

    public function update(Request $request, string $id)
    {
        $presentacion = PresentacionCovid::findOrFail($id);
        $data = $request->validate(['descripcion' => 'required|string|max:200|unique:presentaciones_covid,descripcion,' . $id]);
        $presentacion->update($data);
        return redirect()->route('presentaciones-covid.index')->with('success', 'Presentación COVID actualizada.');
    }

    public function destroy(string $id)
    {
        PresentacionCovid::findOrFail($id)->delete();
        return redirect()->route('presentaciones-covid.index')->with('success', 'Presentación COVID eliminada.');
    }
}
