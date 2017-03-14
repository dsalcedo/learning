<?php

namespace App\Modelos\Examenes;

use Illuminate\Database\Eloquent\Model;

class ExamenesPreguntasRespuestas extends Model
{
    protected $table = 'examenes_preguntas_respuestas';
    protected $fillable = [
        'pregunta_id',
        'respuesta',
        'correcta'
    ];
}
