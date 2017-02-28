<?php

namespace App\Modelos\Cursos;

use Illuminate\Database\Eloquent\Model;

class Leccion extends Model
{
    protected $table = 'lecciones';
    protected $fillable = [
        'curso_id',
        'lugar',
        'nombre',
        'publicado'
    ];

    public function getCurso()
    {
        return $this->hasOne('App\Modelos\Cursos\Curso', 'id', 'curso_id');
    }

    public function getContenido()
    {
        return $this->hasOne('App\Modelos\Cursos\LeccionContenido');
    }
}
