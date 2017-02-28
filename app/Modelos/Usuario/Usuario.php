<?php

namespace App\Modelos\Usuario;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'password',
        'activo',
        'logged_out_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getFullname()
    {
        return $this->nombre.' '.$this->apellidos;
    }

    public function roles()
    {
        return $this->belongsToMany('App\Modelos\Catalogo\Roles', 'usuarios_roles', 'usuario_id', 'rol_id')->withTimestamps();
    }
}
