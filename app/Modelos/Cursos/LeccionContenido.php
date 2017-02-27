<?php

namespace App\Modelos\Cursos;

use Illuminate\Database\Eloquent\Model;

class LeccionContenido extends Model
{
    protected $table = 'leccion_contenidos';
    protected $fillable = [
        'leccion_id',
        'contenido'
    ];
}
