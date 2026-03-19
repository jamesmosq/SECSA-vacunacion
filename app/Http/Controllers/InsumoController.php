<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    public function index()
    {
        $insumos = Insumo::orderBy('nombre')->paginate(20);
        return view('insumos.index', compact('insumos'));
    }

    public function create()
    {
        return view('insumos.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['nombre' => 'required|string|max:200|unique:insumos,nombre']);
        Insumo::create($data);
        return redirect()->route('insumos.index')->with('success', 'Insumo creado.');
    }

    public function show(string $id)
    {
        $insumo = Insumo::findOrFail($id);
        return view('insumos.show', compact('insumo'));
    }

    public function edit(string $id)
    {
        $insumo = Insumo::findOrFail($id);
        return view('insumos.form', compact('insumo'));
    }

    public function update(Request $request, string $id)
    {
        $insumo = Insumo::findOrFail($id);
        $data = $request->validate(['nombre' => 'required|string|max:200|unique:insumos,nombre,' . $id]);
        $insumo->update($data);
        return redirect()->route('insumos.index')->with('success', 'Insumo actualizado.');
    }

    public function destroy(string $id)
    {
        Insumo::findOrFail($id)->delete();
        return redirect()->route('insumos.index')->with('success', 'Insumo eliminado.');
    }
}
