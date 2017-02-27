<?php

namespace App\Modelos\Cursos;

use Illuminate\Database\Eloquent\Model;

class Leccion extends Model
{
    protected $table = 'lecciones';
    protected $fillable = [
        'curso_id',
        'nombre',
        'publicado'
    ];
}
