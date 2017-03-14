<?php

namespace App\Modelos\Examenes;

use Illuminate\Database\Eloquent\Model;

class ExamenesCarreras extends Model
{
    protected $table = 'examenes_carreras';
    protected $fillable = [
        'titulo',
        'descripcion',
        'activo',
        'publicado',
        'carrera_id'
    ];
}
