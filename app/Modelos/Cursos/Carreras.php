<?php

namespace App\Modelos\Cursos;

use Illuminate\Database\Eloquent\Model;

class Carreras extends Model
{
    protected $table = 'carreras';
    protected $fillable = [
        'clave',
        'nombre',
        'publicado',
        'cover'
    ];
}
