<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresentacionCovid extends Model
{
    protected $table = 'presentaciones_covid';
    protected $fillable = ['descripcion'];
}
