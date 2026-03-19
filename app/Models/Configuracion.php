<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table = 'configuracion';

    protected $fillable = ['titulo', 'logo'];

    /** Devuelve siempre la fila única de configuración (la crea si no existe). */
    public static function actual(): static
    {
        return static::firstOrCreate(
            ['id' => 1],
            ['titulo' => 'Secretaría de Salud — Vacunación', 'logo' => null]
        );
    }
}
