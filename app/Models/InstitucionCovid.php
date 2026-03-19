<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstitucionCovid extends Model
{
    protected $table = 'instituciones_covid';
    protected $fillable = ['codigo_habilitacion', 'nombre_institucion', 'estado'];

    public function scopeActivos($query)
    {
        return $query->where('estado', 'Activo');
    }
}
