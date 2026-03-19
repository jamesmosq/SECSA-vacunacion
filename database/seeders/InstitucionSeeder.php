<?php

namespace Database\Seeders;

use App\Models\Institucion;
use App\Models\InstitucionCovid;
use Illuminate\Database\Seeder;

class InstitucionSeeder extends Seeder
{
    public function run(): void
    {
        $instituciones = [
            ['codigo_habilitacion' => 0,  'nombre_institucion' => 'ACTAS DE BAJA',                                           'estado' => 'Activo'],
            ['codigo_habilitacion' => 1,  'nombre_institucion' => 'ESE HMUA SANTA GERTRUDIS',                                 'estado' => 'Activo'],
            ['codigo_habilitacion' => 2,  'nombre_institucion' => 'CIS COMFAMA ENVIGADO',                                     'estado' => 'Activo'],
            ['codigo_habilitacion' => 3,  'nombre_institucion' => 'COMFAMA CITY PLAZA',                                       'estado' => 'Activo'],
            ['codigo_habilitacion' => 4,  'nombre_institucion' => 'FUNDACION EL AGORA',                                       'estado' => 'Activo'],
            ['codigo_habilitacion' => 5,  'nombre_institucion' => 'VIVA 1A IPS',                                              'estado' => 'Activo'],
            ['codigo_habilitacion' => 6,  'nombre_institucion' => 'CLINICA DE LA POLICIA',                                    'estado' => 'Activo'],
            ['codigo_habilitacion' => 7,  'nombre_institucion' => 'PROSALCO IPS',                                             'estado' => 'Activo'],
            ['codigo_habilitacion' => 8,  'nombre_institucion' => 'ASESORIAS Y SOLUCIONES INTEGRALES EN SALUD (UNION TEMPORAL)','estado' => 'Activo'],
            ['codigo_habilitacion' => 9,  'nombre_institucion' => 'NEUROMEDICA',                                              'estado' => 'Activo'],
            ['codigo_habilitacion' => 10, 'nombre_institucion' => 'CLINICA LAS AMERICAS SEDE SUR',                            'estado' => 'Activo'],
            ['codigo_habilitacion' => 11, 'nombre_institucion' => 'COA-CENTRO ONCOLOGICO DE ANTIOQUIA',                       'estado' => 'Activo'],
            ['codigo_habilitacion' => 12, 'nombre_institucion' => 'DIRECCION SECCIONAL DE SALUD DE ANTIOQUIA',                'estado' => 'Activo'],
            ['codigo_habilitacion' => 13, 'nombre_institucion' => 'OTRO MUNICIPIO',                                           'estado' => 'Activo'],
            ['codigo_habilitacion' => 14, 'nombre_institucion' => 'ERRORES DE CAVA EN ASIGNACION DE INSUMOS',                 'estado' => 'Activo'],
            ['codigo_habilitacion' => 15, 'nombre_institucion' => 'SECRETARIA SALUD  ENVIGADO',                               'estado' => 'Activo'],
        ];

        foreach ($instituciones as $i) {
            Institucion::updateOrCreate(['codigo_habilitacion' => $i['codigo_habilitacion']], $i);
        }

        $institucionesCovid = [
            ['codigo_habilitacion' => 0,  'nombre_institucion' => 'ACTAS DE BAJA',                               'estado' => 'Activo'],
            ['codigo_habilitacion' => 1,  'nombre_institucion' => 'ESE HMUA SANTA GERTRUDIS',                     'estado' => 'Activo'],
            ['codigo_habilitacion' => 2,  'nombre_institucion' => 'CIS COMFAMA ENVIGADO',                         'estado' => 'Activo'],
            ['codigo_habilitacion' => 3,  'nombre_institucion' => 'COMFAMA CITY PLAZA',                           'estado' => 'Activo'],
            ['codigo_habilitacion' => 4,  'nombre_institucion' => 'VIVA 1A IPS',                                  'estado' => 'Activo'],
            ['codigo_habilitacion' => 5,  'nombre_institucion' => 'CLINICA DE LA POLICIA',                        'estado' => 'Activo'],
            ['codigo_habilitacion' => 6,  'nombre_institucion' => 'PROSALCO IPS',                                 'estado' => 'Activo'],
            ['codigo_habilitacion' => 7,  'nombre_institucion' => 'NEUROMEDICA',                                  'estado' => 'Activo'],
            ['codigo_habilitacion' => 8,  'nombre_institucion' => 'DIRECCION SECCIONAL DE SALUD DE ANTIOQUIA',    'estado' => 'Activo'],
            ['codigo_habilitacion' => 9,  'nombre_institucion' => 'OTRO MUNICIPIO',                               'estado' => 'Activo'],
            ['codigo_habilitacion' => 10, 'nombre_institucion' => 'ERRORES DE CAVA EN ASIGNACION DE INSUMOS',     'estado' => 'Activo'],
            ['codigo_habilitacion' => 11, 'nombre_institucion' => 'SECRETARIA DE SALUD ENVIGADO',                 'estado' => 'Activo'],
            ['codigo_habilitacion' => 12, 'nombre_institucion' => 'CAVA',                                         'estado' => 'Activo'],
        ];

        foreach ($institucionesCovid as $i) {
            InstitucionCovid::updateOrCreate(['codigo_habilitacion' => $i['codigo_habilitacion']], $i);
        }
    }
}
