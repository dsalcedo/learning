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
        $curso   = $leccion->getCurso;

        if(is_null($avance)){
            $usuario->avances()->create([
                'carrera_id' => $curso->carrera_id,
                'curso_id'   => $leccion->curso_id,
                'leccion_id' => $leccion->id
            ]);
        }

        $avance = $curso->getCarrera->getAvanceInt($usuario);

        $usuario->getCursamiento()->updateOrCreate([
            'carrera_id' => $curso->carrera_id,
            'avance' => $avance
        ],[
            'carrera_id' => $curso->carrera_id,
            'avance' => $avance
        ]);

        return redirect()->back();
    }
}
