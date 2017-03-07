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
        // $args = compact('');
        return view('webapp.perfil.perfil');
    }

    public function updatePerfil()
    {
        $this->validate($this->req, [
            'nombre' => 'required|min:3',
            'apellidos' => 'required|min:3',
            'email' => 'required|min:3',
        ]);

        return back()->with("success", "¡Tu perfil ha sido actualizado correctamente!");

    }
}
