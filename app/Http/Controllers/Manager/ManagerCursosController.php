<?php

namespace App\Http\Controllers\Manager;

use App\Modelos\Cursos\Carreras;
use App\Modelos\Cursos\Curso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerCursosController extends Controller
{
    public function __construct(Request $request)
    {
        $this->req = $request;
    }

    public function index()
    {
        $cursos = Curso::all();
        $args = compact('cursos');
        return view('manager.cursos.index', $args);
    }

    public function crear()
    {
        $carreras = Carreras::pluck('nombre', 'id');
        $args = compact('cursos', 'carreras');

        return view('manager.cursos.crear', $args);
    }

    public function crearPost()
    {
        $this->validate($this->req,[
            "clave" => 'min:1|max:255|unique:cursos',
            "nombre" => 'min:1|max:255',
            "carrera_id" => 'min:1|max:255',
            "descripcion" =>  'min:1|max:255',
            "insignia" => 'min:1|max:255',
            "cover" => 'min:1|max:255',
            "gratuito" => 'min:1',
            "publicado" => 'min:1',
        ]);

        Curso::create($this->req->all());

        return redirect()->route('manage.cursos');
    }

    public function editar($curso)
    {
        $carreras = Carreras::pluck('nombre', 'id');
        $args = compact('curso', 'carreras');

        return view('manager.cursos.editar', $args);
    }

    public function editarPost($curso)
    {
        $this->validate($this->req,[
            "clave" => 'min:1|max:255',
            "nombre" => 'min:1|max:255',
            "carrera_id" => 'min:1|max:255',
            "descripcion" => 'min:1|max:255',
            "insignia" => 'min:1|max:255',
            "cover" => 'min:1|max:255',
            "gratuito" => 'min:1',
            "publicado" => 'min:1',
        ]);

        $curso->clave = $this->req->get('clave');
        $curso->nombre = $this->req->get('nombre');
        $curso->carrera_id = $this->req->get('carrera_id');
        $curso->descripcion = $this->req->get('descripcion');
        $curso->insignia = $this->req->get('insignia');
        $curso->cover = $this->req->get('cover');
        $curso->gratuito = $this->req->get('gratuito');
        $curso->publicado = $this->req->get('publicado');

        $curso->save();

        return redirect()->route('manage.cursos');
    }
}
