<?php

namespace App\Http\Controllers\Manager;

use App\Modelos\Catalogo\Suscripciones;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerActivacionesController extends Controller
{
    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function index()
    {
        $suscripciones = Suscripciones::where('costo', 0)->get();
        $args = compact('suscripciones');
        return view('manager.activaciones.index', $args);
    }
}
