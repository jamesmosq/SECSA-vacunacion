<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoCovid extends Model
{
    protected $table = 'pedidos_covid';
    protected $fillable = ['nro_pedido', 'radicado_paiweb', 'tipo_pedido', 'observaciones', 'temperatura'];

    public function movimientos()
    {
        return $this->hasMany(MovimientoCovid::class, 'nro_pedido', 'nro_pedido');
    }
}
