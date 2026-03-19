<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UsuarioOpcion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    public function run(): void
    {
        $usuarios = [
            ['login' => 'Administrador', 'password' => Hash::make('Admin123*'), 'tipo' => 'Administrador'],
            ['login' => 'Consulta',      'password' => Hash::make('Consulta'),   'tipo' => 'Consulta'],
            ['login' => 'General',       'password' => Hash::make('vacunacion123*'), 'tipo' => 'General'],
        ];

        foreach ($usuarios as $u) {
            User::updateOrCreate(['login' => $u['login']], $u);
        }

        $opciones = [
            // Administrador
            ['login' => 'Administrador', 'opcion' => '-----------TABLAS MAESTRAS ----------------',         'pagina' => '',                                        'orden' => 100],
            ['login' => 'Administrador', 'opcion' => 'LOTE',                                                'pagina' => 'lotes',                                   'orden' => 1],
            ['login' => 'Administrador', 'opcion' => 'MOVIMIENTO',                                          'pagina' => 'movimientos',                             'orden' => 2],
            ['login' => 'Administrador', 'opcion' => 'INFORME POR INSTITUCION Y FECHA ENTREGA',             'pagina' => 'reportes/institucion-fecha',               'orden' => 3],
            ['login' => 'Administrador', 'opcion' => 'INFORME POR INSTITUCION Y PEDIDO',                    'pagina' => 'reportes/institucion-pedido',              'orden' => 4],
            ['login' => 'Administrador', 'opcion' => 'INFORME POR INSTITUCION POR PERIODO',                 'pagina' => 'reportes/institucion-periodo',             'orden' => 5],
            ['login' => 'Administrador', 'opcion' => 'INFORME POR PERIODO',                                 'pagina' => 'reportes/periodo',                        'orden' => 6],
            ['login' => 'Administrador', 'opcion' => 'INFORME POR INSUMO Y PERIODO',                        'pagina' => 'reportes/insumo-periodo',                 'orden' => 7],
            ['login' => 'Administrador', 'opcion' => 'INGRESA RADICADO PAIWEB',                             'pagina' => 'pedidos',                                 'orden' => 8],
            ['login' => 'Administrador', 'opcion' => 'SALDO DE INVENTARIO',                                 'pagina' => 'reportes/saldo-inventario',               'orden' => 9],
            ['login' => 'Administrador', 'opcion' => 'INSTITUCION',                                         'pagina' => 'instituciones',                           'orden' => 101],
            ['login' => 'Administrador', 'opcion' => 'INSUMO',                                              'pagina' => 'insumos',                                 'orden' => 102],
            ['login' => 'Administrador', 'opcion' => 'LABORATORIO',                                         'pagina' => 'laboratorios',                            'orden' => 103],
            ['login' => 'Administrador', 'opcion' => 'PRESENTACION',                                        'pagina' => 'presentaciones',                          'orden' => 104],
            ['login' => 'Administrador', 'opcion' => '-----------SEGUIMIENTO A LA COHORTE ----------------','pagina' => '',                                        'orden' => 200],
            ['login' => 'Administrador', 'opcion' => 'Informe Cohortes',                                    'pagina' => 'cohorte',                                 'orden' => 201],
            ['login' => 'Administrador', 'opcion' => '---------- INDICADORES ----------------',             'pagina' => '',                                        'orden' => 250],
            ['login' => 'Administrador', 'opcion' => 'ESTADISTICA DE INDICADORES',                          'pagina' => 'estadistica',                             'orden' => 251],
            ['login' => 'Administrador', 'opcion' => '-----------CARNET FIEBRE AMARILLA Y SR ----------------','pagina' => '',                                     'orden' => 300],
            ['login' => 'Administrador', 'opcion' => 'Carnet FA y SR',                                      'pagina' => 'carnets/crear',                           'orden' => 301],
            ['login' => 'Administrador', 'opcion' => '-----------COVID ----------------',                    'pagina' => '',                                        'orden' => 500],
            ['login' => 'Administrador', 'opcion' => 'LOTE COVID',                                          'pagina' => 'lotes-covid',                             'orden' => 501],
            ['login' => 'Administrador', 'opcion' => 'INSTITUCION COVID',                                   'pagina' => 'instituciones-covid',                     'orden' => 502],
            ['login' => 'Administrador', 'opcion' => 'INSUMO COVID',                                        'pagina' => 'insumos-covid',                           'orden' => 503],
            ['login' => 'Administrador', 'opcion' => 'LABORATORIO COVID',                                   'pagina' => 'laboratorios-covid',                      'orden' => 504],
            ['login' => 'Administrador', 'opcion' => 'PRESENTACION COVID',                                  'pagina' => 'presentaciones-covid',                    'orden' => 505],
            ['login' => 'Administrador', 'opcion' => 'MOVIMIENTO COVID',                                    'pagina' => 'movimientos-covid',                       'orden' => 506],
            ['login' => 'Administrador', 'opcion' => 'INFORME POR INSTITUCION Y FECHA ENTREGA COVID',       'pagina' => 'reportes/covid/institucion-fecha',        'orden' => 507],
            ['login' => 'Administrador', 'opcion' => 'INFORME POR INSTITUCION Y PEDIDO COVID',              'pagina' => 'reportes/covid/institucion-pedido',       'orden' => 508],
            ['login' => 'Administrador', 'opcion' => 'INFORME POR INSTITUCION POR PERIODO COVID',           'pagina' => 'reportes/covid/institucion-periodo',      'orden' => 509],
            ['login' => 'Administrador', 'opcion' => 'INFORME POR PERIODO COVID',                           'pagina' => 'reportes/covid/periodo',                  'orden' => 510],
            ['login' => 'Administrador', 'opcion' => 'INFORME POR INSUMO Y PERIODO COVID',                  'pagina' => 'reportes/covid/insumo-periodo',           'orden' => 511],
            ['login' => 'Administrador', 'opcion' => 'INGRESA RADICADO PAIWEB COVID',                       'pagina' => 'pedidos-covid',                           'orden' => 512],
            ['login' => 'Administrador', 'opcion' => 'SALDO DE INVENTARIO COVID',                           'pagina' => 'reportes/covid/saldo-inventario',         'orden' => 513],
            // Consulta
            ['login' => 'Consulta', 'opcion' => '---------- INDICADORES ----------------', 'pagina' => '',              'orden' => 250],
            ['login' => 'Consulta', 'opcion' => 'ESTADISTICA DE INDICADORES',              'pagina' => 'estadistica',   'orden' => 251],
            // General
            ['login' => 'General', 'opcion' => '-----------SEGUIMIENTO A LA COHORTE ----------------', 'pagina' => '',            'orden' => 200],
            ['login' => 'General', 'opcion' => 'Informe Cohortes',                                     'pagina' => 'cohorte',     'orden' => 201],
            ['login' => 'General', 'opcion' => '---------- INDICADORES ----------------',              'pagina' => '',            'orden' => 250],
            ['login' => 'General', 'opcion' => 'ESTADISTICA DE INDICADORES',                           'pagina' => 'estadistica', 'orden' => 251],
            ['login' => 'General', 'opcion' => '-----------CARNET FIEBRE AMARILLA Y SR ----------------','pagina' => '',          'orden' => 300],
            ['login' => 'General', 'opcion' => 'Carnet FA y SR',                                       'pagina' => 'carnets/crear','orden' => 301],
        ];

        UsuarioOpcion::truncate();
        UsuarioOpcion::insert($opciones);
    }
}
