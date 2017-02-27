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
}
