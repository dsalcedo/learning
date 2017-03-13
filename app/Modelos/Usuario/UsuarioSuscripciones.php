<?php

namespace App\Modelos\Usuario;

use Illuminate\Database\Eloquent\Model;

class UsuarioSuscripciones extends Model
{
    protected $table = 'usuarios_suscripciones';
    protected $fillable = [
        'usuario_id',
        'orden_id',
        'suscripcion_id',
        'activo',
        'expires_at'
    ];

    public function getSuscripcion()
    {
        return $this->hasOne('App\Modelos\Catalogo\Suscripciones', 'id','suscripcion_id');
    }

    public function getOrden()
    {
        return $this->hasOne('App\Modelos\Usuario\UsuarioOrdenes', 'id','orden_id');
    }
}
