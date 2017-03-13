<?php

namespace App\Http\Controllers\Webapp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerfilController extends Controller
{
    public function __construct(Request $req)
    {
        $this->req = $req;
    }

    public function index()
    {
        $usuario = $this->req->user();
        $args = compact('usuario');
        return view('webapp.perfil.perfil', $args);
    }

    public function updatePerfil()
    {
        $this->validate($this->req, [
            'nombre' => 'required|min:3|max:255',
            'apellidos' => 'required|min:3|max:255',
            'email' => 'required|min:3|max:255|email',
        ]);

        $usuario = $this->req->user();
        $usuario->nombre = $this->req->get('nombre');
        $usuario->apellidos = $this->req->get('apellidos');
        $usuario->email = $this->req->get('email');

        if(!is_null($this->req->get('password'))){
            $usuario->password = $this->req->get('password');
        }

        $usuario->save();

        return back()->with("success", "¡Tu perfil ha sido actualizado correctamente!");

    }
}
