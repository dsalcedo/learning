<?php

namespace App\Modelos\Examenes;

use Illuminate\Database\Eloquent\Model;

class ExamenesPreguntas extends Model
{
    protected $table = 'examenes_preguntas';
    protected $fillable = [
        'examen_id',
        'curso_id',
        'pregunta',
        'adicional',
    ];
}
