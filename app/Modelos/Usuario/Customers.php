<?php

namespace App\Modelos\Usuario;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customers';
    protected $fillable = [
        'usuario_id',
        'conekta_uid',
        'preferencia'
    ];
}
