<?php

namespace App\Modelos\MetodosPago;

use Illuminate\Database\Eloquent\Model;

class MetodoTarjetas extends Model
{
    protected $table = 'metodo_tarjetas';
    protected $fillable = [
        'usuario_id',
        'orden_id',
        'tarjeta_digitos',
        'brand',
        'issuer',
        'type'
    ];
}
