<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carnet extends Model
{
    protected $table = 'carnets';

    protected $fillable = [
        'fecha', 'tipo_id', 'numero_id', 'expedicion_id',
        'nombres', 'persona_expide',
    ];

    protected function casts(): array
    {
        return [
            'fecha' => 'date',
        ];
    }
}
