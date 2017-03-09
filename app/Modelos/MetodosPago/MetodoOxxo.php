<?php

namespace App\Modelos\MetodosPago;

use Illuminate\Database\Eloquent\Model;

class MetodoOxxo extends Model
{
    protected $table = 'metodo_oxxos';
    protected $fillable = [
        'usuario_id',
        'orden_id',
        'referencia'
    ];

    public function orden()
    {
        return $this->belongsTo('App\Modelos\Usuario\UsuarioOrdenes', 'orden_id', 'id');
    }

}
