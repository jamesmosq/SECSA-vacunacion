<?php

use App\Models\Insumo;
use App\Models\Laboratorio;
use App\Models\Lote;
use App\Models\Presentacion;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

beforeEach(function () {
    $this->user = User::create([
        'login'    => 'admin',
        'password' => Hash::make('Admin123*'),
        'tipo'     => 'Administrador',
    ]);
    Insumo::create(['nombre' => 'BCG']);
    Laboratorio::create(['nombre' => 'Serum']);
    Presentacion::create(['descripcion' => 'Unidosis']);
});

it('lista los lotes correctamente', function () {
    Lote::create([
        'lote' => 'TEST001', 'insumo' => 'BCG', 'presentacion' => 'Unidosis',
        'saldo' => 100, 'estado' => 'Activo',
    ]);

    $response = $this->actingAs($this->user)->get('/lotes');
    $response->assertStatus(200);
    $response->assertSee('TEST001');
    $response->assertSee('BCG');
});

it('muestra el formulario de creación de lote', function () {
    $response = $this->actingAs($this->user)->get('/lotes/create');
    $response->assertStatus(200);
    $response->assertSee('Nuevo Lote');
});

it('crea un lote nuevo', function () {
    $response = $this->actingAs($this->user)->post('/lotes', [
        'lote'              => 'TEST001',
        'insumo'            => 'BCG',
        'presentacion'      => 'Unidosis',
        'laboratorio'       => 'Serum',
        'fecha_vencimiento' => '2026-12-31',
        'saldo'             => 50,
        'estado'            => 'Activo',
        'observacion'       => 'Lote de prueba',
    ]);

    $response->assertRedirect(route('lotes.index'));
    $this->assertDatabaseHas('lotes', ['lote' => 'TEST001', 'saldo' => 50]);
});

it('no permite crear un lote con código duplicado', function () {
    Lote::create(['lote' => 'TEST001', 'insumo' => 'BCG', 'presentacion' => 'Unidosis', 'saldo' => 10, 'estado' => 'Activo']);

    $response = $this->actingAs($this->user)->post('/lotes', [
        'lote' => 'TEST001', 'insumo' => 'BCG', 'presentacion' => 'Unidosis',
        'saldo' => 5, 'estado' => 'Activo',
    ]);
    $response->assertSessionHasErrors('lote');
});

it('actualiza un lote existente', function () {
    Lote::create(['lote' => 'TEST001', 'insumo' => 'BCG', 'presentacion' => 'Unidosis', 'saldo' => 10, 'estado' => 'Activo']);

    $response = $this->actingAs($this->user)->put('/lotes/TEST001', [
        'insumo' => 'BCG', 'presentacion' => 'Unidosis',
        'saldo' => 25, 'estado' => 'Inactivo',
    ]);

    $response->assertRedirect(route('lotes.index'));
    $this->assertDatabaseHas('lotes', ['lote' => 'TEST001', 'saldo' => 25, 'estado' => 'Inactivo']);
});

it('elimina un lote', function () {
    Lote::create(['lote' => 'TEST001', 'insumo' => 'BCG', 'presentacion' => 'Unidosis', 'saldo' => 0, 'estado' => 'Inactivo']);

    $response = $this->actingAs($this->user)->delete('/lotes/TEST001');
    $response->assertRedirect(route('lotes.index'));
    $this->assertDatabaseMissing('lotes', ['lote' => 'TEST001']);
});

it('valida campos requeridos al crear lote', function () {
    $response = $this->actingAs($this->user)->post('/lotes', []);
    $response->assertSessionHasErrors(['lote', 'insumo', 'presentacion', 'saldo', 'estado']);
});
