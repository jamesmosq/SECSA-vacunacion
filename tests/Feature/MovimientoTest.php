<?php

use App\Models\Institucion;
use App\Models\Lote;
use App\Models\Movimiento;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

beforeEach(function () {
    $this->user = User::create([
        'login'    => 'admin',
        'password' => Hash::make('Admin123*'),
        'tipo'     => 'Administrador',
    ]);
    Institucion::create(['codigo_habilitacion' => 1, 'nombre_institucion' => 'ESE HMUA', 'estado' => 'Activo']);
    Lote::create(['lote' => 'LOT001', 'insumo' => 'BCG', 'presentacion' => 'Unidosis', 'saldo' => 100, 'estado' => 'Activo']);
    Pedido::create(['nro_pedido' => 1, 'radicado_paiweb' => '90001', 'tipo_pedido' => 'Pedido', 'observaciones' => '', 'temperatura' => '']);
});

it('muestra la pantalla de movimientos', function () {
    $response = $this->actingAs($this->user)->get('/movimientos');
    $response->assertStatus(200);
    $response->assertSee('Movimientos de Inventario');
});

it('crea un movimiento de ingreso y actualiza el saldo del lote', function () {
    $response = $this->actingAs($this->user)->post('/movimientos', [
        'institucion'      => 'ESE HMUA',
        'fecha_movimiento' => '2025-01-15',
        'nro_pedido'       => 1,
        'lote'             => 'LOT001',
        'ingreso'          => 50,
        'salida'           => 0,
        'observaciones'    => 'Ingreso de prueba',
    ]);

    $response->assertRedirect(route('movimientos.index'));
    $this->assertDatabaseHas('movimientos', ['lote' => 'LOT001', 'ingreso' => 50]);
    $this->assertEquals(150, Lote::find('LOT001')->saldo);
});

it('crea un movimiento de salida y descuenta el saldo', function () {
    $response = $this->actingAs($this->user)->post('/movimientos', [
        'institucion'      => 'ESE HMUA',
        'fecha_movimiento' => '2025-01-15',
        'nro_pedido'       => 1,
        'lote'             => 'LOT001',
        'ingreso'          => 0,
        'salida'           => 30,
    ]);

    $response->assertRedirect(route('movimientos.index'));
    $this->assertEquals(70, Lote::find('LOT001')->saldo);
});

it('elimina un movimiento y revierte el saldo', function () {
    $movimiento = Movimiento::create([
        'institucion'      => 'ESE HMUA',
        'fecha_movimiento' => '2025-01-15',
        'nro_pedido'       => 1,
        'lote'             => 'LOT001',
        'ingreso'          => 50,
        'salida'           => 0,
    ]);
    Lote::find('LOT001')->update(['saldo' => 150]);

    $response = $this->actingAs($this->user)->delete('/movimientos/' . $movimiento->id);
    $response->assertRedirect(route('movimientos.index'));
    $this->assertEquals(100, Lote::find('LOT001')->saldo);
});

it('valida campos requeridos al crear movimiento', function () {
    $response = $this->actingAs($this->user)->post('/movimientos', []);
    $response->assertSessionHasErrors(['institucion', 'fecha_movimiento', 'lote', 'ingreso', 'salida']);
});
