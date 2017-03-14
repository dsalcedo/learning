<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamenesController extends Controller
{
    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function index($carrera)
    {
        $args = compact('carrera');
        return view('manager.examenes.index', $args);
    }

    public function crear($carrera)
    {
        $args = compact('carrera');
        return view('manager.examenes.crear', $args);
    }

    public function crearPost($carrera)
    {

    }

}
