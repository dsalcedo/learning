<?php

namespace App\Modelos\Usuario;

use Illuminate\Database\Eloquent\Model;

class UsuarioCursamiento extends Model
{
    protected $table = 'usuario_cursamientos';
    protected $fillable = [
        'usuario_id',
        'carrera_id',
        'avance'
    ];

    public function getUsuario()
    {
        return $this->hasOne('App\Modelos\Usuario\Usuario','id', 'usuario_id');
    }

    public function getCarrera()
    {
        return $this->hasOne('App\Modelos\Cursos\Carreras','id', 'carrera_id');
    }
}
