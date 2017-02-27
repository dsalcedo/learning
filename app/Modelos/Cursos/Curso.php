<?php

namespace App\Modelos\Cursos;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $fillable = [
        'carrera_id',
        'clave',
        'nombre',
        'descripcion',
        'cover',
        'insignia',
        'gratuito',
        'publicado'
    ];

    public function getCarrera()
    {
        return $this->hasOne('App\Modelos\Cursos\Carreras', 'id', 'carrera_id');
    }

    public function getLecciones()
    {
        return $this->hasMany('App\Modelos\Cursos\Leccion', 'curso_id');
    }
}
