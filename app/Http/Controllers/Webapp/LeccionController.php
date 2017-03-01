<?php

namespace App\Http\Controllers\Webapp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeccionController extends Controller
{
    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function index($claveCurso, $indice, $leccion)
    {
        $args = compact('leccion');
        return view('webapp.curso.leccion', $args);
    }
}
