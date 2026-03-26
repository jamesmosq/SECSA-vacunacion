<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

trait ExportaReporte
{
    /**
     * Exporta $grupos como PDF.
     * $grupos puede ser:
     *   - Collection<string, Collection<Movimiento>>  (reportes agrupados por movimiento)
     *   - Collection<string, Collection<Movimiento>>  (insumo-periodo: keyed by insumo name)
     */
    private function exportarPdf(string $titulo, $grupos, bool $esCovid = false): Response
    {
        $pdf = app('dompdf.wrapper');
        $pdf->setPaper('letter', 'portrait');
        $pdf->loadView('reportes.partials.export-pdf', compact('titulo', 'grupos', 'esCovid'));
        return $pdf->download(\Illuminate\Support\Str::slug($titulo, '_') . '.pdf');
    }

    /**
     * Exporta $grupos como CSV compatible con Excel.
     */
    private function exportarCsv(string $titulo, $grupos): StreamedResponse
    {
        $filename = \Illuminate\Support\Str::slug($titulo, '_') . '.csv';

        return response()->streamDownload(function () use ($grupos) {
            $out = fopen('php://output', 'w');
            // BOM para UTF-8 en Excel
            fputs($out, "\xEF\xBB\xBF");
            fputcsv($out, ['Fecha', 'Institución', 'Pedido', 'Observaciones', 'Insumo', 'Lote', 'Ingreso', 'Salida'], ';');

            foreach ($grupos as $items) {
                // Si items es una colección de movimientos directamente
                if ($items->first() && method_exists($items->first(), 'getAttribute')) {
                    foreach ($items as $m) {
                        fputcsv($out, [
                            $m->fecha_movimiento->format('d/m/Y'),
                            $m->institucion,
                            $m->nro_pedido,
                            $m->observaciones ?? '',
                            $m->loteRelacion?->insumo ?? '',
                            $m->lote,
                            $m->ingreso,
                            $m->salida,
                        ], ';');
                    }
                } else {
                    // Estructura anidada (insumo → movimientos)
                    foreach ($items as $subItems) {
                        foreach ($subItems as $m) {
                            fputcsv($out, [
                                $m->fecha_movimiento->format('d/m/Y'),
                                $m->institucion,
                                $m->nro_pedido,
                                $m->observaciones ?? '',
                                $m->loteRelacion?->insumo ?? '',
                                $m->lote,
                                $m->ingreso,
                                $m->salida,
                            ], ';');
                        }
                    }
                }
            }
            fclose($out);
        }, $filename, [
            'Content-Type'        => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }
}
