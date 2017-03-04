<?php

namespace App\Http\Controllers\Manager;

use App\Modelos\Cursos\Leccion;
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

    public function crearPost($curso)
    {
        $this->validate($this->req, [
            'items' => 'required|array'
        ]);

        $i = $curso->getLecciones->count() + 1;

        foreach ($this->req->get('items') as $item){
            $l = $i++;
            $curso->getLecciones()->create([
                'lugar' => $l,
                'nombre' => $item['titulo']
            ]);
        }

        return redirect()->route('manage.curso.lecciones', $curso->id);
    }

    public function editar($leccion)
    {
        $args = compact('leccion');
        return view('manager.lecciones.editar', $args);
    }

    public function editarPost($leccion)
    {
        $this->validate($this->req, [
            'nombre' => 'required|max:255',
            'publicado' => 'required'
        ]);

        $leccion->nombre = $this->req->get('nombre');
        $leccion->publicado = $this->req->get('publicado');
        $leccion->save();

        return redirect()->back();
    }

    public function contenido($leccion)
    {
        $args = compact('leccion');
        return view('manager.lecciones.contenido', $args);
    }

    public function contenidoPost($leccion)
    {
        $this->validate($this->req, [
            'contenido'=>'required'
        ]);

        $data = $this->req->get('contenido');
        $registro = $leccion->getContenido;

        if(is_null($registro)){
            $leccion->getContenido()->create(['contenido'=>$data]);
        }else{
            $registro->contenido = $data;
            $registro->save();
        }

        return redirect()->route('leccion.administrar.contenido', $leccion->id);
    }

    public function ajaxLeccion()
    {

        if(!$this->req->ajax()){
            return abort(404, 'No existe el recurso solicitado');
        }

        $leccion = Leccion::find($this->req->get('leccion'));
        $leccion->publicado = $this->req->get('valor');
        $leccion->save();

        return response()->json( ['success' => true] );
    }
}
