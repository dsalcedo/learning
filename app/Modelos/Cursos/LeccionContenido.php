<?php

namespace App\Modelos\Cursos;

use Illuminate\Database\Eloquent\Model;

class LeccionContenido extends Model
{
    protected $table = 'lecciones_contenidos';
    protected $fillable = [
        'leccion_id',
        'contenido'
    ];

    public function getLeccion()
    {
        return $this->hasOne('App\Modelos\Cursos\Leccion');
    }
}
