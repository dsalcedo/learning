<?php

namespace App\Modelos\Catalogo;

use Illuminate\Database\Eloquent\Model;

class Suscripciones extends Model
{
    protected $table = 'suscripciones';
    protected $fillable = [
        'clave',
        'nombre',
        'descripcion',
        'duracion',
        'costo',
        'activo',
        'publicado',
        'verificacion'
    ];
}
