<?php

namespace App\Modelos\Usuario;

use Illuminate\Database\Eloquent\Model;

class UsuariosRoles extends Model
{
    protected $table = 'usuarios_roles';
    protected $fillable = [
        'usuario_id',
        'rol_id'
    ];
}
