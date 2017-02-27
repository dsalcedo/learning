<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerLeccionesController extends Controller
{
    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function index($curso)
    {
        $args = compact('curso');
        return view('manager.lecciones.index', $args);
    }

    public function crear($curso)
    {
        $args = compact('curso');
        return view('manager.lecciones.crear', $args);
    }
}
