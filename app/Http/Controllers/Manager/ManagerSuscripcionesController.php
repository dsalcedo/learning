<?php

namespace App\Http\Controllers\Manager;

use App\Modelos\Catalogo\Suscripciones;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerSuscripcionesController extends Controller
{
    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function index()
    {
        $suscripciones = Suscripciones::all();
        $args = compact('suscripciones');
        return view('manager.suscripciones.index', $args);
    }

    public function crear()
    {
        return view('manager.suscripciones.crear');
    }

    public function crearPost()
    {
        $this->validate($this->req,[
            "clave" => "required|min:1|max:255|string|unique:suscripciones",
            "nombre" => "required|min:1|max:255|string",
            "descripcion" => "required|min:1|max:255|string",
            "duracion" => "required|min:1|integer",
            "costo" => "required|integer",
            "activo" => "required|boolean",
            "publicado" => "required|boolean",
            "verificacion" => "required|boolean",
        ]);

        Suscripciones::create($this->req->all());

        return redirect()->route('manage.suscripciones');
    }

    public function editar($suscripcion)
    {
        $args = compact('suscripcion');
        return view('manager.suscripciones.editar', $args);
    }

    public function editarPost($suscripcion)
    {
        $this->validate($this->req,[
            "clave" => "required|min:1|max:255|string",
            "nombre" => "required|min:1|max:255|string",
            "descripcion" => "required|min:1|max:255|string",
            "duracion" => "required|min:1|integer",
            "costo" => "required|integer",
            "activo" => "required|boolean",
            "publicado" => "required|boolean",
            "verificacion" => "required|boolean",
        ]);

        $suscripcion->clave = $this->req->get('clave');
        $suscripcion->nombre = $this->req->get('nombre');
        $suscripcion->descripcion = $this->req->get('descripcion');
        $suscripcion->duracion = $this->req->get('duracion');
        $suscripcion->costo = $this->req->get('costo');
        $suscripcion->activo = $this->req->get('activo');
        $suscripcion->publicado = $this->req->get('publicado');
        $suscripcion->verificacion = $this->req->get('verificacion');
        $suscripcion->save();

        return redirect()->route('manage.suscripciones');
    }
}
