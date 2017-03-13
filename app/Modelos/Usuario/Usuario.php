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
        'premium_at',
        'logged_out_at'
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

    public function getConektaCustomer()
    {
        return $this->hasOne('App\Modelos\Usuario\Customers', 'usuario_id');
    }

    public function ordenes()
    {
        return $this->hasMany('App\Modelos\Usuario\UsuarioOrdenes', 'usuario_id', 'id');
    }

    public function suscripciones()
    {
        return $this->hasMany('App\Modelos\Usuario\UsuarioSuscripciones', 'usuario_id', 'id');
    }

    public function avances()
    {
        return $this->hasMany('App\Modelos\Usuario\UsuarioAvances','usuario_id', 'id');
    }

    public function getCursamiento()
    {
        return $this->hasMany('App\Modelos\Usuario\UsuarioCursamiento', 'usuario_id', 'id');
    }

}
