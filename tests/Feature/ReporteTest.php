<?php

use App\Models\Institucion;
use App\Models\Lote;
use App\Models\Movimiento;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

beforeEach(function () {
    $this->user = User::create([
        'login'    => 'admin',
        'password' => Hash::make('Admin123*'),
        'tipo'     => 'Administrador',
    ]);
    Lote::create(['lote' => 'LOT001', 'insumo' => 'BCG', 'presentacion' => 'Unidosis', 'saldo' => 100, 'estado' => 'Activo']);
    Institucion::create(['codigo_habilitacion' => 1, 'nombre_institucion' => 'ESE HMUA', 'estado' => 'Activo']);
    Movimiento::create([
        'institucion' => 'ESE HMUA', 'fecha_movimiento' => '2025-01-15',
        'nro_pedido' => 1, 'lote' => 'LOT001', 'ingreso' => 50, 'salida' => 0,
    ]);
});

it('muestra el saldo de inventario', function () {
    $response = $this->actingAs($this->user)->get('/reportes/saldo-inventario');
    $response->assertStatus(200);
    $response->assertSee('LOT001');
    $response->assertSee('100');
});

it('muestra el informe por institución y fecha', function () {
    $response = $this->actingAs($this->user)->post('/reportes/institucion-fecha', [
        'institucion' => 'ESE HMUA',
        'fecha'       => '2025-01-15',
    ]);
    $response->assertStatus(200);
    $response->assertSee('LOT001');
});

it('muestra el informe por periodo', function () {
    $response = $this->actingAs($this->user)->post('/reportes/periodo', [
        'desde' => '2025-01-01',
        'hasta' => '2025-12-31',
    ]);
    $response->assertStatus(200);
    $response->assertSee('ESE HMUA');
});

it('valida que fecha hasta sea posterior a desde en reporte por periodo', function () {
    $response = $this->actingAs($this->user)->post('/reportes/periodo', [
        'desde' => '2025-12-31',
        'hasta' => '2025-01-01',
    ]);
    $response->assertSessionHasErrors('hasta');
});
