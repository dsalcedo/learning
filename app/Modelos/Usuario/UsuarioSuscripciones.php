<?php

namespace App\Modelos\Usuario;

use Illuminate\Database\Eloquent\Model;

class UsuarioSuscripciones extends Model
{
    protected $table = 'usuario_suscripciones';
    protected $fillable = [
        'usuario_id',
        'suscripcion_id',
        'activo',
        'expires_at'
    ];
}
