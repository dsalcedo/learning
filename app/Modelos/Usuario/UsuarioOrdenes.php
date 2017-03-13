<?php

namespace App\Modelos\Usuario;

use Illuminate\Database\Eloquent\Model;

class UsuarioOrdenes extends Model
{
    protected $table = 'usuario_ordenes';
    protected $fillable = [
        'uid',
        'usuario_id',
        'suscripcion_id',
        'monto',
        'uid_transaccion',
        'estado_interno',
        'metodo_pago',
        'emisor',
        'estado_pago',
        'paid_at'
    ];

    public function getUsuario()
    {
        return $this->hasOne('App\Modelos\Usuario\Usuario','id', 'usuario_id');
    }

    public function getSuscripcion()
    {
        return $this->hasOne('App\Modelos\Catalogo\Suscripciones','id', 'suscripcion_id');
    }
}
