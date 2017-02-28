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
}
