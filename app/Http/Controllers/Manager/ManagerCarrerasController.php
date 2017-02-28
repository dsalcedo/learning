<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Cursos\Carreras;

class ManagerCarrerasController extends Controller
{
    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function index()
    {
        $carreras = Carreras::all();
        $args = compact('carreras');

        return view('manager.carreras.index', $args);
    }

    public function crear()
    {
        return view('manager.carreras.crear');
    }

    public function crearPost()
    {
        $this->validate($this->req, [
            "clave" => "required|min:3|max:255|unique:carreras",
            "nombre" => "required|min:3|max:255",
            "descripcion" => "required",
            "color" => "required",
            "cover" => "required|min:3|max:255",
            "publicado" => "required"
        ]);

        Carreras::create($this->req->all());

        return redirect()->route('manage.carreras');
    }

    public function editar($carrera)
    {
        $args = compact('carrera');
        return view('manager.carreras.editar', $args);
    }

    public function editarPost($carrera)
    {
        $this->validate($this->req, [
            "clave" => "required|min:3|max:255",
            "nombre" => "required|min:3|max:255",
            "descripcion" => "required",
            "color" => "required",
            "cover" => "required|min:3|max:255",
            "publicado" => "required"
        ]);

        $carrera->clave  = $this->req->get('clave');
        $carrera->nombre = $this->req->get('nombre');
        $carrera->descripcion = $this->req->get('descripcion');
        $carrera->color = $this->req->get('color');
        $carrera->cover = $this->req->get('cover');
        $carrera->publicado = $this->req->get('publicado');
        $carrera->save();

        return redirect()->route('manage.carreras');
    }
}
