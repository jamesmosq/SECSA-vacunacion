<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioOpcion extends Model
{
    protected $table = 'usuario_opciones';

    protected $fillable = ['login', 'opcion', 'pagina', 'orden'];
}
