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

    public function getUsuario()
    {
        return $this->hasOne('App\Modelos\Usuario\Usuario', 'id', 'usuario_id');
    }

    public function getCarrera()
    {
        return $this->hasOne('App\Modelos\Cursos\Carreras', 'id', 'carrera_id');
    }

    public function getCurso()
    {
        return $this->hasOne('App\Modelos\Cursos\Curso', 'id', 'curso_id');
    }

    public function getLeccion()
    {
        return $this->hasOne('App\Modelos\Cursos\Leccion', 'id', 'leccion_id');
    }
}
