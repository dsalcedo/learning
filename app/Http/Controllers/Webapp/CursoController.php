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

    public function agregarAvance($leccion)
    {
        $usuario = $this->req->user();
        $avance  = $usuario->avances()->where('leccion_id', $leccion->id)->first();

        if(is_null($avance)){
            $usuario->avances()->create([
                'carrera_id' => $leccion->getCurso->carrera_id,
                'curso_id'   => $leccion->curso_id,
                'leccion_id' => $leccion->id
            ]);

            $carrera = $leccion->getCarrera;
            $avance  = $carrera->getAvanceInt($usuario);

        }

        return redirect()->back();
    }
}
