<?php

namespace App\Http\Controllers\Webapp;

use App\Modelos\Cursos\Carreras;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function index()
    {
        $usuario  = $this->req->user();
        $carreras = Carreras::where('publicado', true)->get();
        $args = compact('usuario', 'carreras');
        return view('webapp.index', $args);
    }
}
