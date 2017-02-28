@extends('webapp.layouts.app')

@section('titulo', 'Hackrhub')

@section('content')

    <div class="container">

        @foreach($carreras as $carrera)
        <div class="col-md-4">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading carrera-header" style="
                        background: {{$carrera->color}} url( {{ $carrera->cover }}) no-repeat center center;
                        -webkit-background-size: cover;
                        -moz-background-size: cover;
                        -o-background-size: cover;
                        background-size: cover;
                        ">
                    <span class="carrera-de">Carrera de</span>
                    <span class="carrera-nombre">{{ $carrera->nombre }}</span>
                </div>
                <div class="panel-body">
                    <p>{{ $carrera->descripcion }}</p>
                    <div class="row">
                        <div class="col-md-11">
                            <div class="progress">
                                <span class="porcentaje-avance">0%</span>
                                <div class="progress-bar bar-colorful" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 0%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- List group -->
                <div class="list-group">
                    @foreach($carrera->getCursosPublicados() as $curso)
                        <a href="{{ route('webapp.aprende.curso',[$curso->clave, $curso->id]) }}" class="list-group-item">
                            @if($curso->gratuito)
                            <span class="curso-gratuito text-center">
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                            @endif
                            <img src="{{ $curso->insignia }}" class="img-circle insignia-mini">
                            <span class="curso-nombre">
                                {{ $curso->nombre }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach

    </div> <!-- /container -->

@endsection