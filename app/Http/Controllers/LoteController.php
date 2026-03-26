<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Models\Laboratorio;
use App\Models\Lote;
use App\Models\Presentacion;
use Illuminate\Http\Request;

class LoteController extends Controller
{
    public function index()
    {
        $lotes = Lote::orderBy('insumo')->orderBy('lote')->paginate(30);
        return view('lotes.index', compact('lotes'));
    }

    public function create()
    {
        $insumos        = Insumo::orderBy('nombre')->pluck('nombre');
        $laboratorios   = Laboratorio::orderBy('nombre')->pluck('nombre');
        $presentaciones = Presentacion::orderBy('descripcion')->pluck('descripcion');
        return view('lotes.form', compact('insumos', 'laboratorios', 'presentaciones'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'lote'              => 'required|string|max:30|unique:lotes,lote',
            'insumo'            => 'required|string|max:200',
            'presentacion'      => 'required|string|max:200',
            'fecha_vencimiento' => 'nullable|date',
            'laboratorio'       => 'nullable|string|max:200',
            'saldo'             => 'required|integer|min:0',
            'estado'            => 'required|in:Activo,Inactivo',
            'observacion'       => 'nullable|string',
        ]);

        $data['lote'] = strtoupper($data['lote']);
        Lote::create($data);

        return redirect()->route('lotes.index')->with('success', 'Lote creado correctamente.');
    }

    public function show(string $id)
    {
        $lote = Lote::findOrFail($id);
        return view('lotes.show', compact('lote'));
    }

    public function edit(string $loteCode)
    {
        $lote           = Lote::findOrFail($loteCode);
        $insumos        = Insumo::orderBy('nombre')->pluck('nombre');
        $laboratorios   = Laboratorio::orderBy('nombre')->pluck('nombre');
        $presentaciones = Presentacion::orderBy('descripcion')->pluck('descripcion');
        return view('lotes.form', compact('lote', 'insumos', 'laboratorios', 'presentaciones'));
    }

    public function update(Request $request, string $loteCode)
    {
        $lote = Lote::findOrFail($loteCode);
        $data = $request->validate([
            'insumo'            => 'required|string|max:200',
            'presentacion'      => 'required|string|max:200',
            'fecha_vencimiento' => 'nullable|date',
            'laboratorio'       => 'nullable|string|max:200',
            'saldo'             => 'required|integer|min:0',
            'estado'            => 'required|in:Activo,Inactivo',
            'observacion'       => 'nullable|string',
        ]);

        $lote->update($data);
        return redirect()->route('lotes.index')->with('success', 'Lote actualizado correctamente.');
    }

    public function destroy(string $loteCode)
    {
        Lote::findOrFail($loteCode)->delete();
        return redirect()->route('lotes.index')->with('success', 'Lote eliminado.');
    }

    public function plantilla()
    {
        $headers = [
            'Content-Type'        => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="plantilla_lotes.csv"',
        ];

        $columnas = ['lote', 'insumo', 'presentacion', 'fecha_vencimiento', 'laboratorio', 'saldo', 'estado', 'observacion'];
        $ejemplo  = ['LOTE001', 'BCG', 'Vial x 10 dosis', '2026-12-31', 'Laboratorio XYZ', '1000', 'Activo', 'Observación opcional'];

        $callback = function () use ($columnas, $ejemplo) {
            $out = fopen('php://output', 'w');
            fprintf($out, chr(0xEF) . chr(0xBB) . chr(0xBF)); // BOM UTF-8 para Excel
            fputcsv($out, $columnas, ';');
            fputcsv($out, $ejemplo, ';');
            fclose($out);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function importar(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:csv,txt|max:2048',
        ], [
            'archivo.required' => 'Debe seleccionar un archivo CSV.',
            'archivo.mimes'    => 'El archivo debe ser formato CSV.',
            'archivo.max'      => 'El archivo no debe superar 2 MB.',
        ]);

        $path = $request->file('archivo')->getRealPath();
        $handle = fopen($path, 'r');

        // Detectar delimitador y saltar BOM
        $firstLine = fgets($handle);
        $firstLine = ltrim($firstLine, "\xEF\xBB\xBF");
        $delimitador = str_contains($firstLine, ';') ? ';' : ',';
        rewind($handle);

        // Saltar encabezado
        fgetcsv($handle, 0, $delimitador);

        $importados = 0;
        $errores    = [];
        $fila       = 1;

        while (($row = fgetcsv($handle, 0, $delimitador)) !== false) {
            $fila++;
            if (count(array_filter($row)) === 0) continue;

            // Convertir a UTF-8 si el archivo viene en Latin-1/ISO-8859-1
            $row = array_map(function ($val) {
                if ($val === null) return null;
                return mb_detect_encoding($val, ['UTF-8'], true) === false
                    ? mb_convert_encoding($val, 'UTF-8', 'ISO-8859-1')
                    : $val;
            }, $row);

            [$lote, $insumo, $presentacion, $fecha_vencimiento, $laboratorio, $saldo, $estado, $observacion] = array_pad($row, 8, null);

            $lote = strtoupper(trim($lote ?? ''));

            // Validaciones básicas
            if (empty($lote)) {
                $errores[] = "Fila {$fila}: el campo 'lote' es obligatorio.";
                continue;
            }
            if (empty($insumo)) {
                $errores[] = "Fila {$fila}: el campo 'insumo' es obligatorio.";
                continue;
            }
            if (empty($presentacion)) {
                $errores[] = "Fila {$fila}: el campo 'presentacion' es obligatorio.";
                continue;
            }
            if (!in_array(trim($estado ?? ''), ['Activo', 'Inactivo'])) {
                $errores[] = "Fila {$fila}: 'estado' debe ser Activo o Inactivo.";
                continue;
            }
            if (Lote::where('lote', $lote)->exists()) {
                $errores[] = "Fila {$fila}: el lote '{$lote}' ya existe, se omitió.";
                continue;
            }

            $fechaParsed = null;
            if (!empty($fecha_vencimiento)) {
                $fechaParsed = date('Y-m-d', strtotime(trim($fecha_vencimiento)));
                if (!$fechaParsed || $fechaParsed === '1970-01-01') {
                    $errores[] = "Fila {$fila}: fecha_vencimiento inválida (use formato AAAA-MM-DD).";
                    continue;
                }
            }

            Lote::create([
                'lote'              => $lote,
                'insumo'            => trim($insumo),
                'presentacion'      => trim($presentacion),
                'fecha_vencimiento' => $fechaParsed,
                'laboratorio'       => trim($laboratorio ?? '') ?: null,
                'saldo'             => (int) ($saldo ?? 0),
                'estado'            => trim($estado),
                'observacion'       => trim($observacion ?? '') ?: null,
            ]);

            $importados++;
        }

        fclose($handle);

        $mensaje = "Se importaron {$importados} lote(s) correctamente.";
        if (!empty($errores)) {
            return redirect()->route('lotes.index')
                ->with('success', $mensaje)
                ->with('errores_csv', $errores);
        }

        return redirect()->route('lotes.index')->with('success', $mensaje);
    }
}
