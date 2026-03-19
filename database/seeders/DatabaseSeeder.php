<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UsuariosSeeder::class,
            InsumoSeeder::class,
            LaboratorioSeeder::class,
            PresentacionSeeder::class,
            InstitucionSeeder::class,
        ]);
    }
}
