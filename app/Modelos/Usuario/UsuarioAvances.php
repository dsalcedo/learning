<?php

namespace App\Modelos\Usuario;

use Illuminate\Database\Eloquent\Model;

class UsuarioAvances extends Model
{
    protected $table = 'usuario_avances';
    protected $fillable = [
        'usuario_id',
        'carrera_id',
        'curso_id',
        'leccion_id'
    ];
}
