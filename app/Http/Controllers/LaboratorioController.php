<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    public function index()
    {
        $laboratorios = Laboratorio::orderBy('nombre')->paginate(20);
        return view('laboratorios.index', compact('laboratorios'));
    }

    public function create()
    {
        return view('laboratorios.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['nombre' => 'required|string|max:200|unique:laboratorios,nombre']);
        Laboratorio::create($data);
        return redirect()->route('laboratorios.index')->with('success', 'Laboratorio creado.');
    }

    public function show(string $id)
    {
        $laboratorio = Laboratorio::findOrFail($id);
        return view('laboratorios.show', compact('laboratorio'));
    }

    public function edit(string $id)
    {
        $laboratorio = Laboratorio::findOrFail($id);
        return view('laboratorios.form', compact('laboratorio'));
    }

    public function update(Request $request, string $id)
    {
        $laboratorio = Laboratorio::findOrFail($id);
        $data = $request->validate(['nombre' => 'required|string|max:200|unique:laboratorios,nombre,' . $id]);
        $laboratorio->update($data);
        return redirect()->route('laboratorios.index')->with('success', 'Laboratorio actualizado.');
    }

    public function destroy(string $id)
    {
        Laboratorio::findOrFail($id)->delete();
        return redirect()->route('laboratorios.index')->with('success', 'Laboratorio eliminado.');
    }
}
