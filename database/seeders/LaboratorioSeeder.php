<?php

namespace Database\Seeders;

use App\Models\Laboratorio;
use App\Models\LaboratorioCovid;
use Illuminate\Database\Seeder;

class LaboratorioSeeder extends Seeder
{
    public function run(): void
    {
        $laboratorios = [
            'Bilthoven Biologicals BV', 'Bio-Manguinhos/FIOCRUZ', 'BUTANTAN',
            'Fabricante', 'Glaxo SmithKline', 'Green Cross',
            'Imprenta Nacional de Colombia', 'JIANGXI SANXIN MEDTEC', 'MEDECO',
            'MERCK SHARP DOHME', 'MSD', 'NUBENCO', 'PFIZER', 'PRECISION CARE',
            'Q JECT (QG MEDICAL DEVICES)', 'Rymco', 'SANAVITA', 'Sanofi Pasteur',
            'Serum', 'NIPRO', 'QATARI', 'MEDIKAX', 'LG CHEM', 'KEDRION',
            'CSL BEHRING', 'KEDRION BIPHARMA', 'GC BIOPHARMA', 'SINOVAC',
            'CSL SEQIRUS', 'GUANGDONG HAIOU MEDICAL', 'YESO-MED',
            'BIOLOGICAL E LTD', 'KAMADA', 'CHUMAKOV',
        ];

        foreach ($laboratorios as $nombre) {
            Laboratorio::firstOrCreate(['nombre' => $nombre]);
        }

        $laboratoriosCovid = [
            'PFIZER', 'RYMCO', 'IMPRENTA NACIONAL DE COLOMBIA', 'JANSSEN',
            'JIANGXI SANXIN MEDTEC', 'MODERNA BIOTECH', 'NIPRO', 'NUBENCO',
            'OXFORD-ASTRAZENECA', 'PRECISION CARE', 'Q JECT (QG MEDICAL DEVICES)',
            'SANAVITA', 'SINOVAC',
        ];

        foreach ($laboratoriosCovid as $nombre) {
            LaboratorioCovid::firstOrCreate(['nombre' => $nombre]);
        }
    }
}
