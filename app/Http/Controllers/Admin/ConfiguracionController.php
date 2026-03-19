<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Configuracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfiguracionController extends Controller
{
    public function edit()
    {
        $config = Configuracion::actual();
        return view('admin.configuracion', compact('config'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'titulo'       => 'required|string|max:255',
            'logo'         => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
            'eliminar_logo'=> 'nullable|boolean',
        ]);

        $config = Configuracion::actual();

        $config->titulo = $request->titulo;

        // Eliminar logo existente
        if ($request->boolean('eliminar_logo') && $config->logo) {
            Storage::disk('public')->delete('logos/' . $config->logo);
            $config->logo = null;
        }

        // Subir nuevo logo
        if ($request->hasFile('logo')) {
            // Borrar el anterior si existe
            if ($config->logo) {
                Storage::disk('public')->delete('logos/' . $config->logo);
            }
            Storage::disk('public')->makeDirectory('logos');
            $filename = 'logo_' . time() . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->storeAs('logos', $filename, 'public');
            $config->logo = $filename;
        }

        $config->save();

        return redirect()->route('admin.configuracion')
            ->with('success', 'Configuración del portal actualizada correctamente.');
    }
}
