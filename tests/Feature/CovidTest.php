<?php

use App\Models\InstitucionCovid;
use App\Models\LoteCovid;
use App\Models\MovimientoCovid;
use App\Models\PedidoCovid;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

beforeEach(function () {
    $this->user = User::create([
        'login'    => 'admin',
        'password' => Hash::make('Admin123*'),
        'tipo'     => 'Administrador',
    ]);
});

// ─── Lotes COVID ────────────────────────────────────────────────────────────

it('muestra el listado de lotes covid', function () {
    LoteCovid::create(['lote' => 'CV001', 'insumo' => 'Vacuna COVID', 'presentacion' => 'Frasco', 'saldo' => 200, 'estado' => 'Activo']);

    $response = $this->actingAs($this->user)->get('/lotes-covid');
    $response->assertStatus(200);
    $response->assertSee('CV001');
});

it('almacena un lote covid nuevo', function () {
    $response = $this->actingAs($this->user)->post('/lotes-covid', [
        'lote'         => 'cv-abc',
        'insumo'       => 'Vacuna COVID',
        'presentacion' => 'Frasco',
        'laboratorio'  => 'LabX',
        'saldo'        => 500,
        'estado'       => 'Activo',
    ]);

    $response->assertRedirect(route('lotes-covid.index'));
    $this->assertDatabaseHas('lotes_covid', ['lote' => 'CV-ABC', 'insumo' => 'Vacuna COVID']);
});

it('valida campos requeridos al crear lote covid', function () {
    $response = $this->actingAs($this->user)->post('/lotes-covid', []);
    $response->assertSessionHasErrors(['lote', 'insumo', 'presentacion', 'saldo', 'estado']);
});

it('actualiza un lote covid', function () {
    LoteCovid::create(['lote' => 'CV001', 'insumo' => 'Vacuna COVID', 'presentacion' => 'Frasco', 'saldo' => 200, 'estado' => 'Activo']);

    $response = $this->actingAs($this->user)->put('/lotes-covid/CV001', [
        'insumo'       => 'Vacuna COVID Bivalente',
        'presentacion' => 'Frasco',
        'laboratorio'  => 'LabX',
        'saldo'        => 200,
        'estado'       => 'Activo',
    ]);

    $response->assertRedirect(route('lotes-covid.index'));
    $this->assertDatabaseHas('lotes_covid', ['lote' => 'CV001', 'insumo' => 'Vacuna COVID Bivalente']);
});

it('elimina un lote covid', function () {
    LoteCovid::create(['lote' => 'CV001', 'insumo' => 'Vacuna COVID', 'presentacion' => 'Frasco', 'saldo' => 0, 'estado' => 'Inactivo']);

    $response = $this->actingAs($this->user)->delete('/lotes-covid/CV001');
    $response->assertRedirect(route('lotes-covid.index'));
    $this->assertDatabaseMissing('lotes_covid', ['lote' => 'CV001']);
});

// ─── Movimientos COVID ───────────────────────────────────────────────────────

it('crea un movimiento covid de ingreso y actualiza el saldo', function () {
    InstitucionCovid::create(['codigo_habilitacion' => 1, 'nombre_institucion' => 'ESE HMUA', 'estado' => 'Activo']);
    LoteCovid::create(['lote' => 'CV001', 'insumo' => 'Vacuna COVID', 'presentacion' => 'Frasco', 'saldo' => 0, 'estado' => 'Activo']);
    PedidoCovid::create(['nro_pedido' => 1, 'radicado_paiweb' => 'R-001', 'tipo_pedido' => 'Pedido', 'observaciones' => '']);

    $response = $this->actingAs($this->user)->post('/movimientos-covid', [
        'institucion'      => 'ESE HMUA',
        'fecha_movimiento' => '2025-03-10',
        'nro_pedido'       => 1,
        'lote'             => 'CV001',
        'ingreso'          => 100,
        'salida'           => 0,
        'observaciones'    => 'Ingreso inicial',
    ]);

    $response->assertRedirect(route('movimientos-covid.index'));
    $this->assertDatabaseHas('movimientos_covid', ['lote' => 'CV001', 'ingreso' => 100]);
    $this->assertEquals(100, LoteCovid::find('CV001')->saldo);
});

it('crea un movimiento covid de salida y descuenta el saldo', function () {
    InstitucionCovid::create(['codigo_habilitacion' => 1, 'nombre_institucion' => 'ESE HMUA', 'estado' => 'Activo']);
    LoteCovid::create(['lote' => 'CV001', 'insumo' => 'Vacuna COVID', 'presentacion' => 'Frasco', 'saldo' => 200, 'estado' => 'Activo']);
    PedidoCovid::create(['nro_pedido' => 1, 'radicado_paiweb' => 'R-001', 'tipo_pedido' => 'Pedido', 'observaciones' => '']);

    $response = $this->actingAs($this->user)->post('/movimientos-covid', [
        'institucion'      => 'ESE HMUA',
        'fecha_movimiento' => '2025-03-10',
        'nro_pedido'       => 1,
        'lote'             => 'CV001',
        'ingreso'          => 0,
        'salida'           => 80,
    ]);

    $response->assertRedirect(route('movimientos-covid.index'));
    $this->assertEquals(120, LoteCovid::find('CV001')->saldo);
});

it('elimina un movimiento covid y revierte el saldo', function () {
    LoteCovid::create(['lote' => 'CV001', 'insumo' => 'Vacuna COVID', 'presentacion' => 'Frasco', 'saldo' => 100, 'estado' => 'Activo']);
    PedidoCovid::create(['nro_pedido' => 1, 'radicado_paiweb' => 'R-001', 'tipo_pedido' => 'Pedido', 'observaciones' => '']);

    $mov = MovimientoCovid::create([
        'institucion'      => 'ESE HMUA',
        'fecha_movimiento' => '2025-03-10',
        'nro_pedido'       => 1,
        'lote'             => 'CV001',
        'ingreso'          => 100,
        'salida'           => 0,
    ]);

    $response = $this->actingAs($this->user)->delete('/movimientos-covid/' . $mov->id);
    $response->assertRedirect(route('movimientos-covid.index'));
    $this->assertEquals(0, LoteCovid::find('CV001')->saldo);
});

it('valida campos requeridos al crear movimiento covid', function () {
    $response = $this->actingAs($this->user)->post('/movimientos-covid', []);
    $response->assertSessionHasErrors(['institucion', 'fecha_movimiento', 'lote', 'ingreso', 'salida']);
});

// ─── Pedidos COVID ───────────────────────────────────────────────────────────

it('muestra el listado de pedidos covid', function () {
    PedidoCovid::create(['nro_pedido' => 1, 'radicado_paiweb' => 'R-COVID-01', 'tipo_pedido' => 'Pedido', 'observaciones' => '']);

    $response = $this->actingAs($this->user)->get('/pedidos-covid');
    $response->assertStatus(200);
    $response->assertSee('R-COVID-01');
});

it('almacena un pedido covid', function () {
    $response = $this->actingAs($this->user)->post('/pedidos-covid', [
        'nro_pedido'     => 1,
        'radicado_paiweb' => 'R-COVID-01',
        'tipo_pedido'    => 'Pedido',
        'observaciones'  => 'Observacion test',
    ]);

    $response->assertRedirect(route('pedidos-covid.index'));
    $this->assertDatabaseHas('pedidos_covid', ['nro_pedido' => 1, 'radicado_paiweb' => 'R-COVID-01']);
});

// ─── Reportes COVID ──────────────────────────────────────────────────────────

it('muestra el saldo de inventario covid', function () {
    LoteCovid::create(['lote' => 'CV001', 'insumo' => 'Vacuna COVID', 'presentacion' => 'Frasco', 'saldo' => 500, 'estado' => 'Activo']);

    $response = $this->actingAs($this->user)->get('/reportes/covid/saldo-inventario');
    $response->assertStatus(200);
    $response->assertSee('CV001');
    $response->assertSee('500');
});

it('muestra el informe covid por institución y fecha', function () {
    InstitucionCovid::create(['codigo_habilitacion' => 1, 'nombre_institucion' => 'ESE HMUA', 'estado' => 'Activo']);
    LoteCovid::create(['lote' => 'CV001', 'insumo' => 'Vacuna COVID', 'presentacion' => 'Frasco', 'saldo' => 0, 'estado' => 'Activo']);
    PedidoCovid::create(['nro_pedido' => 1, 'radicado_paiweb' => 'R-001', 'tipo_pedido' => 'Pedido', 'observaciones' => '']);
    MovimientoCovid::create([
        'institucion'      => 'ESE HMUA',
        'fecha_movimiento' => '2025-03-10',
        'nro_pedido'       => 1,
        'lote'             => 'CV001',
        'ingreso'          => 50,
        'salida'           => 0,
    ]);

    $response = $this->actingAs($this->user)->post('/reportes/covid/institucion-fecha', [
        'institucion' => 'ESE HMUA',
        'fecha'       => '2025-03-10',
    ]);
    $response->assertStatus(200);
    $response->assertSee('CV001');
});

it('muestra el informe covid por periodo', function () {
    LoteCovid::create(['lote' => 'CV001', 'insumo' => 'Vacuna COVID', 'presentacion' => 'Frasco', 'saldo' => 0, 'estado' => 'Activo']);
    PedidoCovid::create(['nro_pedido' => 1, 'radicado_paiweb' => 'R-001', 'tipo_pedido' => 'Pedido', 'observaciones' => '']);
    MovimientoCovid::create([
        'institucion'      => 'ESE HMUA',
        'fecha_movimiento' => '2025-03-10',
        'nro_pedido'       => 1,
        'lote'             => 'CV001',
        'ingreso'          => 50,
        'salida'           => 0,
    ]);

    $response = $this->actingAs($this->user)->post('/reportes/covid/periodo', [
        'desde' => '2025-01-01',
        'hasta' => '2025-12-31',
    ]);
    $response->assertStatus(200);
    $response->assertSee('ESE HMUA');
});

it('valida que fecha hasta sea posterior a desde en reporte covid por periodo', function () {
    $response = $this->actingAs($this->user)->post('/reportes/covid/periodo', [
        'desde' => '2025-12-31',
        'hasta' => '2025-01-01',
    ]);
    $response->assertSessionHasErrors('hasta');
});
