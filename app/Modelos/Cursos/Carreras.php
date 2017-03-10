<?php

namespace App\Modelos\Cursos;

use Illuminate\Database\Eloquent\Model;

class Carreras extends Model
{
    protected $table = 'carreras';
    protected $fillable = [
        'clave',
        'nombre',
        'descripcion',
        'color',
        'publicado',
        'cover'
    ];

    public function getCursos()
    {
        return $this->hasMany('App\Modelos\Cursos\Curso', 'carrera_id', 'id');
    }

    public function getCursosPublicados()
    {
        return $this->getCursos()->where('publicado', true)->get();
    }

    public function getLeccionesCursos()
    {
        return $this->hasManyThrough(
            'App\Modelos\Cursos\Leccion',
            'App\Modelos\Cursos\Curso',
            'carrera_id',
            'curso_id',
            'id'
        );
    }

    public function getAvanceInt($usuario)
    {
        $l = $this->getLeccionesCursos()->where('lecciones.publicado', true)->count();
        $a = $usuario->avances()->where('carrera_id', $this->id)->count();
        $p = ($l <= 0) ? 0 : $a * 100 / $l;

        return $p;
    }
}
