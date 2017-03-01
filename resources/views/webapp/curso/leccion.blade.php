@extends('webapp.layouts.app')

@section('titulo', 'Lección #'.$leccion->lugar.' - '.$leccion->nombre . ' > ' .$leccion->getCurso->nombre)

@section('css')
    <style>
        ul.lecciones-lista{
            padding: 0;
            list-style-type: none;
        }
        ul.lecciones-lista li{
            padding: 8px 10px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                
            </div>
            <div class="col-md-3">
                <ul class="lecciones-lista">
                    @foreach($leccion->getCurso->getLeccionesActivas() as $l)
                        <li>
                            <a href="#">
                                <i class="fa fa-file-text-o" aria-hidden="true" style="margin-right: 10px;"></i>
                                {{$l->nombre }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-9">
                {{ $leccion->getContenido }}
            </div>
        </div>
    </div>
@endsection