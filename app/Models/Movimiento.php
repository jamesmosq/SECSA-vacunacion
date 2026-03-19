<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table = 'movimientos';

    protected $fillable = [
        'institucion', 'fecha_movimiento', 'nro_pedido', 'lote',
        'ingreso', 'salida', 'observaciones',
        'tipo_identificacion', 'identificacion', 'nombres_apellidos',
    ];

    protected function casts(): array
    {
        return [
            'fecha_movimiento' => 'date',
        ];
    }

    public function loteRelacion()
    {
        return $this->belongsTo(Lote::class, 'lote', 'lote');
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'nro_pedido', 'nro_pedido');
    }
}
