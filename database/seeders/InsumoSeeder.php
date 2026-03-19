<?php

namespace Database\Seeders;

use App\Models\Insumo;
use App\Models\InsumoCovid;
use Illuminate\Database\Seeder;

class InsumoSeeder extends Seeder
{
    public function run(): void
    {
        $insumos = [
            'BCG', 'VIP (Vacuna Inyectable de Polio)', 'VOP (Vacuna Oral de Polio)',
            'Pentavalente', 'Hexavalente', 'DPT', 'DPaT Pediátrica', 'TD Pediátrica',
            'Hepatitis B (Pediátrica)', 'Hepatitis B (Adulto)', 'Rotavirus',
            'Neumococo 10', 'Neumococo 13', 'SRP (Triple viral)', 'Fiebre Amarilla',
            'Hepatitis A (Pediátrica)', 'Meningococo', 'Varicela',
            'SR (Sarampión, Rubeola)', 'Td Adulto', 'dPaT Adulto',
            'Influenza pediátrica (0.25 cc)', 'Antigripal (0.5 cc)', 'VPH',
            'VSR', 'Vacuna Antirrábica Humana',
            'Inmuno-globulina Hepatitis B', 'Inmuno-globulina Antirrábica Humano',
            'Diluyente de BCG', 'Diluyente de SRP', 'Diluyente de SR (Sarampión Rubeola)',
            'Diluyente de fiebre amarilla', 'Diluyente de varicela',
            'Diluyente de antirrábica humana',
            'Jeringa 22G*1 ¼ Autodescartable', 'Jeringa 22G*1 ¼ Convencional',
            'Jeringa 23G*1 Autodescartable', 'Jeringa 23G*1 Convencional',
            'Jeringa #25G*5/8 Autodescartable',
            'TARJETAS UNIFICADAS DE VACUNACIÓN NIÑOS', 'STIKER DE MATRICULA',
        ];

        foreach ($insumos as $nombre) {
            Insumo::firstOrCreate(['nombre' => $nombre]);
        }

        $insumosCovid = [
            'PFIZER', 'MODERNA', 'JANSSEN', 'ASTRAZENECA', 'SINOVAC',
            'JERINGA 22GX1 1/2"', 'JERINGA 23GX1"',
        ];

        foreach ($insumosCovid as $nombre) {
            InsumoCovid::firstOrCreate(['nombre' => $nombre]);
        }
    }
}
