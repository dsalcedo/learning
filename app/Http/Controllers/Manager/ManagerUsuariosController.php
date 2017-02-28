<?php

namespace App\Http\Controllers\Manager;

use App\Modelos\Catalogo\Roles;
use App\Modelos\Usuario\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerUsuariosController extends Controller
{
    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function index()
    {
        $usuarios = Usuario::all();
        $args = compact('usuarios');
        return view('manager.usuarios.index', $args);
    }

    public function crear()
    {
        $roles = Roles::all();
        $args = compact('roles');
        return view('manager.usuarios.crear', $args);
    }

    public function crearPost()
    {
        $this->validate($this->req, [
            "nombre" => 'required|min:3|max:255',
            "apellidos" => 'required|min:3|max:255',
            "email" => 'required|min:3|max:255|unique:usuarios|email',
            "password" => 'required|min:3|max:255',
            "activo" => 'required',
            "roles" => 'required|array'
        ]);

        $user = Usuario::create($this->req->all());
        $user->roles()->sync($this->req->get('roles'));

        return redirect()->route('manage.usuarios');
    }

    public function editar($user)
    {
        $roles = Roles::all();
        $args = compact('user', 'roles');
        return view('manager.usuarios.editar', $args);
    }

    public function editarPost($user)
    {
        $this->validate($this->req, [
            "nombre" => 'required|min:3|max:255',
            "apellidos" => 'required|min:3|max:255',
            "email" => 'required|min:3|max:255|email',
            "activo" => 'required',
            "roles" => 'required|array'
        ]);

        $user->nombre = $this->req->get('nombre');
        $user->apellidos = $this->req->get('apellidos');
        $user->email = $this->req->get('email');

        if(!is_null($this->req->get('password'))){
            $user->password = $this->req->get('password');
        }

        $user->activo = $this->req->get('activo');
        $user->save();

        $user->roles()->sync($this->req->get('roles'));

        return redirect()->route('manage.usuarios');
    }
}
