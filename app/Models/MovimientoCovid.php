<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimientoCovid extends Model
{
    protected $table = 'movimientos_covid';

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
        return $this->belongsTo(LoteCovid::class, 'lote', 'lote');
    }

    public function pedido()
    {
        return $this->belongsTo(PedidoCovid::class, 'nro_pedido', 'nro_pedido');
    }
}
