<?php

use App\Models\Carnet;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

beforeEach(function () {
    $this->user = User::create([
        'login'    => 'admin',
        'password' => Hash::make('Admin123*'),
        'tipo'     => 'Administrador',
    ]);
});

it('muestra el formulario de creación de carnet', function () {
    $response = $this->actingAs($this->user)->get('/carnets/create');
    $response->assertStatus(200);
    $response->assertSee('Carnet FA y SR');
});

it('crea un carnet correctamente', function () {
    $response = $this->actingAs($this->user)->post('/carnets', [
        'fecha'          => '2025-01-15',
        'tipo_id'        => 'Cedula de ciudadanía',
        'numero_id'      => '123456789',
        'expedicion_id'  => 'Medellín',
        'nombres'        => 'JUAN PÉREZ GÓMEZ',
        'persona_expide' => 'ANGELA ARROYAVE',
    ]);

    $this->assertDatabaseHas('carnets', ['numero_id' => '123456789']);
    $carnet = Carnet::first();
    $response->assertRedirect(route('carnets.show', $carnet));
});

it('muestra el carnet con el certificado', function () {
    $carnet = Carnet::create([
        'fecha'          => '2025-01-15',
        'tipo_id'        => 'Cedula de ciudadanía',
        'numero_id'      => '123456789',
        'expedicion_id'  => 'Medellín',
        'nombres'        => 'JUAN PÉREZ GÓMEZ',
        'persona_expide' => 'ANGELA ARROYAVE',
    ]);

    $response = $this->actingAs($this->user)->get('/carnets/' . $carnet->id);
    $response->assertStatus(200);
    $response->assertSee('JUAN PÉREZ GÓMEZ');
    $response->assertSee('123456789');
    $response->assertSee('NO ES APTA');
});

it('valida campos requeridos al crear carnet', function () {
    $response = $this->actingAs($this->user)->post('/carnets', []);
    $response->assertSessionHasErrors(['fecha', 'tipo_id', 'numero_id', 'expedicion_id', 'nombres', 'persona_expide']);
});
