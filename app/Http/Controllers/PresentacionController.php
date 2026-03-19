<?php

namespace App\Http\Controllers;

use App\Models\Presentacion;
use Illuminate\Http\Request;

class PresentacionController extends Controller
{
    public function index()
    {
        $presentaciones = Presentacion::orderBy('descripcion')->paginate(20);
        return view('presentaciones.index', compact('presentaciones'));
    }

    public function create()
    {
        return view('presentaciones.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['descripcion' => 'required|string|max:200|unique:presentaciones,descripcion']);
        Presentacion::create($data);
        return redirect()->route('presentaciones.index')->with('success', 'Presentación creada.');
    }

    public function show(string $id)
    {
        $presentacion = Presentacion::findOrFail($id);
        return view('presentaciones.show', compact('presentacion'));
    }

    public function edit(string $id)
    {
        $presentacion = Presentacion::findOrFail($id);
        return view('presentaciones.form', compact('presentacion'));
    }

    public function update(Request $request, string $id)
    {
        $presentacion = Presentacion::findOrFail($id);
        $data = $request->validate(['descripcion' => 'required|string|max:200|unique:presentaciones,descripcion,' . $id]);
        $presentacion->update($data);
        return redirect()->route('presentaciones.index')->with('success', 'Presentación actualizada.');
    }

    public function destroy(string $id)
    {
        Presentacion::findOrFail($id)->delete();
        return redirect()->route('presentaciones.index')->with('success', 'Presentación eliminada.');
    }
}
