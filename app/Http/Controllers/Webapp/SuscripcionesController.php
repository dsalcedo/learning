<?php

namespace App\Http\Controllers\Webapp;

use App\Modelos\Catalogo\Suscripciones;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuscripcionesController extends Controller
{
    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function index()
    {
        $suscripciones = Suscripciones::where(['activo'=>true, 'publicado'=>true])->get();
        $args = compact('suscripciones');
        return view('webapp.suscripciones.index', $args);
    }

}