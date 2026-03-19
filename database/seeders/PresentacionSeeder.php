<?php

namespace Database\Seeders;

use App\Models\Presentacion;
use App\Models\PresentacionCovid;
use Illuminate\Database\Seeder;

class PresentacionSeeder extends Seeder
{
    public function run(): void
    {
        $presentaciones = ['Multidosis x 5', 'Multidosis x 10', 'Multidosis x 20', 'Unidad', 'Unidosis'];
        foreach ($presentaciones as $desc) {
            Presentacion::firstOrCreate(['descripcion' => $desc]);
        }

        $presentacionesCovid = [
            '23GX1"', 'AMPOLLA X 1.8 ML', 'MULTIDOSIS X 10', 'MULTIDOSIS X 14',
            'MULTIDOSIS X 5', 'MULTIDOSIS X 6', 'UNIDAD', 'UNIDOSIS X 0.5ML',
            'MULTIDOSIS X 2', '22GX1 1/2"',
        ];
        foreach ($presentacionesCovid as $desc) {
            PresentacionCovid::firstOrCreate(['descripcion' => $desc]);
        }
    }
}
