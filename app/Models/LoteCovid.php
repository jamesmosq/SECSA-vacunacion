<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoteCovid extends Model
{
    protected $table = 'lotes_covid';
    protected $primaryKey = 'lote';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'lote', 'insumo', 'presentacion', 'fecha_vencimiento',
        'laboratorio', 'saldo', 'estado', 'observacion',
    ];

    protected function casts(): array
    {
        return [
            'fecha_vencimiento' => 'date',
        ];
    }

    public function scopeActivos($query)
    {
        return $query->where('estado', 'Activo');
    }
}
