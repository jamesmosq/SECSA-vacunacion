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
        $carnets = Carnet::orderBy('created_at', 'desc')->paginate(20);
        return view('carnets.form', compact('tiposId', 'carnets'));
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

    public function descargar(string $id)
    {
        $carnet = Carnet::findOrFail($id);

        $templatePath = base_path('Salud_Carta_Digital_Final.docx');
        $tempPath     = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'carnet_' . $carnet->id . '_' . time() . '.docx';
        copy($templatePath, $tempPath);

        $zip = new \ZipArchive();
        $zip->open($tempPath);
        $originalXml = $zip->getFromName('word/document.xml');

        // Preservar sectPr (referencias a encabezados, márgenes, tamaño de página)
        preg_match('/<w:sectPr[\s\S]*?<\/w:sectPr>/', $originalXml, $m);
        $sectPr = $m[0] ?? '';

        $x = fn(string $s): string => htmlspecialchars($s, ENT_XML1 | ENT_QUOTES, 'UTF-8');

        $fecha         = $x($carnet->fecha->format('d / m / Y'));
        $nombres       = $x(mb_strtoupper($carnet->nombres));
        $tipoId        = $x($carnet->tipo_id);
        $numeroId      = $x($carnet->numero_id);
        $expedicion    = $x($carnet->expedicion_id);
        $personaExpide = $x(mb_strtoupper($carnet->persona_expide));

        // Genera un párrafo Word con múltiples runs (texto, negrita)
        $parrafo = function (array $runs, string $jc = 'left', int $sz = 20, int $before = 0, int $after = 80): string {
            $xml = '<w:p><w:pPr>'
                 . '<w:jc w:val="' . $jc . '"/>'
                 . '<w:spacing w:before="' . $before . '" w:after="' . $after . '"/>'
                 . '</w:pPr>';
            foreach ($runs as [$texto, $negrita]) {
                $b = $negrita ? '<w:b/><w:bCs/>' : '';
                $xml .= '<w:r><w:rPr>' . $b
                      . '<w:sz w:val="' . $sz . '"/><w:szCs w:val="' . $sz . '"/>'
                      . '</w:rPr><w:t xml:space="preserve">' . $texto . '</w:t></w:r>';
            }
            return $xml . '</w:p>';
        };

        // Líneas vacías para posicionar el texto sobre la imagen de fondo
        $espacios = str_repeat(
            '<w:p><w:pPr><w:spacing w:before="0" w:after="0"/></w:pPr></w:p>',
            14
        );

        $cuerpo = $espacios
            . $parrafo([
                ['La Secretar&#237;a de Salud del Municipio de Envigado certifica que el/la se&#241;or(a) ', false],
                [$nombres, true],
                [', identificado(a) con ', false],
                [$tipoId . ' No. ' . $numeroId, true],
                [' expedida en ', false],
                [$expedicion, true],
                [',', false],
            ], 'justify', 20, 0, 100)
            . $parrafo([
                ['NO ES APTA para recibir la Vacuna contra la Fiebre Amarilla (FA) y/o la Vacuna contra '
                 . 'el Sarampi&#243;n y la Rube&#243;la (SR) por presentar riesgo elevado de Efectos Adversos '
                 . 'Supuestamente Atribuidos a la Vacunaci&#243;n o Inmunizaci&#243;n (ESAVI).', true],
            ], 'justify', 20, 0, 200)
            . $parrafo([['', false]], 'left', 20, 0, 0)
            . $parrafo([
                ['Fecha de expedi&#243;n:   ', true],
                [$fecha, false],
                ['          Persona que expide:   ', true],
                [$personaExpide, false],
            ], 'left', 20, 160, 80);

        // Reconstruir el XML del documento: preservar cabecera de namespaces, reemplazar <w:body>
        $bodyStart = strpos($originalXml, '<w:body>');
        $bodyEnd   = strrpos($originalXml, '</w:body>') + strlen('</w:body>');

        $newXml = substr($originalXml, 0, $bodyStart)
                . '<w:body>' . $cuerpo . $sectPr . '</w:body>'
                . substr($originalXml, $bodyEnd);

        // Eliminar la entrada original antes de reemplazarla (evita entradas duplicadas en el ZIP)
        $zip->deleteName('word/document.xml');
        $zip->addFromString('word/document.xml', $newXml);
        $zip->close();

        $filename = 'carnet_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', $carnet->numero_id) . '.docx';
        return response()->download($tempPath, $filename)->deleteFileAfterSend();
    }
}
