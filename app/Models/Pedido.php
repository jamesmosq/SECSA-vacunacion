<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $fillable = ['nro_pedido', 'radicado_paiweb', 'tipo_pedido', 'observaciones', 'temperatura'];

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class, 'nro_pedido', 'nro_pedido');
    }
}
