<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaboratorioCovid extends Model
{
    protected $table = 'laboratorios_covid';
    protected $fillable = ['nombre'];
}
