<?php

namespace App\Http\Controllers\Webapp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CursoController extends Controller
{
    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function index($clave, $curso)
    {
        $args = compact('curso');
        return view('webapp.curso.index', $args);
    }
}
