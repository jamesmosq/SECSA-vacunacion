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
            ['login' => 'Administrador', 'password' => Hash::make('Admin123*'),       'tipo' => 'Administrador'],
            ['login' => 'Consulta',      'password' => Hash::make('Consulta'),         'tipo' => 'Consulta'],
            ['login' => 'General',       'password' => Hash::make('vacunacion123*'),   'tipo' => 'General'],
        ];

        foreach ($usuarios as $u) {
            User::updateOrCreate(['login' => $u['login']], $u);
        }

        $opciones = [
            // ── Administrador ────────────────────────────────────────────────────
            // PAI — Inventario
            ['login' => 'Administrador', 'opcion' => 'PAI — Inventario',            'pagina' => '',                              'orden' => 100],
            ['login' => 'Administrador', 'opcion' => 'Lotes',                        'pagina' => 'lotes',                         'orden' => 101],
            ['login' => 'Administrador', 'opcion' => 'Movimientos',                  'pagina' => 'movimientos',                   'orden' => 102],
            ['login' => 'Administrador', 'opcion' => 'Pedidos PAIWEB',               'pagina' => 'pedidos',                       'orden' => 103],
            ['login' => 'Administrador', 'opcion' => 'Saldo de Inventario',          'pagina' => 'reportes/saldo-inventario',     'orden' => 104],
            // PAI — Catálogos
            ['login' => 'Administrador', 'opcion' => 'PAI — Catálogos',             'pagina' => '',                              'orden' => 200],
            ['login' => 'Administrador', 'opcion' => 'Instituciones',                'pagina' => 'instituciones',                 'orden' => 201],
            ['login' => 'Administrador', 'opcion' => 'Insumos',                      'pagina' => 'insumos',                       'orden' => 202],
            ['login' => 'Administrador', 'opcion' => 'Laboratorios',                 'pagina' => 'laboratorios',                  'orden' => 203],
            ['login' => 'Administrador', 'opcion' => 'Presentaciones',               'pagina' => 'presentaciones',                'orden' => 204],
            // PAI — Reportes
            ['login' => 'Administrador', 'opcion' => 'PAI — Reportes',              'pagina' => '',                              'orden' => 300],
            ['login' => 'Administrador', 'opcion' => 'Por Institución y Fecha',      'pagina' => 'reportes/institucion-fecha',    'orden' => 301],
            ['login' => 'Administrador', 'opcion' => 'Por Institución y Pedido',     'pagina' => 'reportes/institucion-pedido',   'orden' => 302],
            ['login' => 'Administrador', 'opcion' => 'Por Institución por Periodo',  'pagina' => 'reportes/institucion-periodo',  'orden' => 303],
            ['login' => 'Administrador', 'opcion' => 'Por Periodo',                  'pagina' => 'reportes/periodo',              'orden' => 304],
            ['login' => 'Administrador', 'opcion' => 'Por Insumo y Periodo',         'pagina' => 'reportes/insumo-periodo',       'orden' => 305],
            // Cohorte e Indicadores
            ['login' => 'Administrador', 'opcion' => 'Cohorte e Indicadores',       'pagina' => '',                              'orden' => 400],
            ['login' => 'Administrador', 'opcion' => 'Informe Cohortes',             'pagina' => 'cohorte',                       'orden' => 401],
            ['login' => 'Administrador', 'opcion' => 'Estadística de Indicadores',  'pagina' => 'estadistica',                   'orden' => 402],
            // Carnets
            ['login' => 'Administrador', 'opcion' => 'Carnets',                     'pagina' => '',                              'orden' => 500],
            ['login' => 'Administrador', 'opcion' => 'Carnet FA y SR',               'pagina' => 'carnets/crear',                 'orden' => 501],
            // COVID — Inventario
            ['login' => 'Administrador', 'opcion' => 'COVID — Inventario',          'pagina' => '',                              'orden' => 600],
            ['login' => 'Administrador', 'opcion' => 'Lotes COVID',                  'pagina' => 'lotes-covid',                   'orden' => 601],
            ['login' => 'Administrador', 'opcion' => 'Movimientos COVID',            'pagina' => 'movimientos-covid',             'orden' => 602],
            ['login' => 'Administrador', 'opcion' => 'Pedidos COVID',                'pagina' => 'pedidos-covid',                 'orden' => 603],
            ['login' => 'Administrador', 'opcion' => 'Saldo Inventario COVID',       'pagina' => 'reportes/covid/saldo-inventario','orden' => 604],
            // COVID — Catálogos
            ['login' => 'Administrador', 'opcion' => 'COVID — Catálogos',           'pagina' => '',                              'orden' => 700],
            ['login' => 'Administrador', 'opcion' => 'Instituciones COVID',          'pagina' => 'instituciones-covid',           'orden' => 701],
            ['login' => 'Administrador', 'opcion' => 'Insumos COVID',                'pagina' => 'insumos-covid',                 'orden' => 702],
            ['login' => 'Administrador', 'opcion' => 'Laboratorios COVID',           'pagina' => 'laboratorios-covid',            'orden' => 703],
            ['login' => 'Administrador', 'opcion' => 'Presentaciones COVID',         'pagina' => 'presentaciones-covid',          'orden' => 704],
            // COVID — Reportes
            ['login' => 'Administrador', 'opcion' => 'COVID — Reportes',            'pagina' => '',                              'orden' => 800],
            ['login' => 'Administrador', 'opcion' => 'Por Institución y Fecha',      'pagina' => 'reportes/covid/institucion-fecha',   'orden' => 801],
            ['login' => 'Administrador', 'opcion' => 'Por Institución y Pedido',     'pagina' => 'reportes/covid/institucion-pedido',  'orden' => 802],
            ['login' => 'Administrador', 'opcion' => 'Por Institución por Periodo',  'pagina' => 'reportes/covid/institucion-periodo', 'orden' => 803],
            ['login' => 'Administrador', 'opcion' => 'Por Periodo',                  'pagina' => 'reportes/covid/periodo',             'orden' => 804],
            ['login' => 'Administrador', 'opcion' => 'Por Insumo y Periodo',         'pagina' => 'reportes/covid/insumo-periodo',      'orden' => 805],

            // ── Consulta ─────────────────────────────────────────────────────────
            ['login' => 'Consulta', 'opcion' => 'Cohorte e Indicadores',    'pagina' => '',            'orden' => 400],
            ['login' => 'Consulta', 'opcion' => 'Estadística de Indicadores','pagina' => 'estadistica', 'orden' => 402],

            // ── General ──────────────────────────────────────────────────────────
            ['login' => 'General', 'opcion' => 'Cohorte e Indicadores',     'pagina' => '',              'orden' => 400],
            ['login' => 'General', 'opcion' => 'Informe Cohortes',           'pagina' => 'cohorte',       'orden' => 401],
            ['login' => 'General', 'opcion' => 'Estadística de Indicadores', 'pagina' => 'estadistica',   'orden' => 402],
            ['login' => 'General', 'opcion' => 'Carnets',                    'pagina' => '',              'orden' => 500],
            ['login' => 'General', 'opcion' => 'Carnet FA y SR',             'pagina' => 'carnets/crear', 'orden' => 501],
        ];

        UsuarioOpcion::truncate();
        UsuarioOpcion::insert($opciones);
    }
}
