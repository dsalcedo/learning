@extends('webapp.layouts.app')

@section('titulo', 'Hackrhub')

@section('css')
    <style>
        .examen{
            background-color: #33b9b9;
            color: #fff!important;
            transition-duration: 1s;
            text-transform: uppercase;

        }
        a.examen:hover,
        a.examen:focus{
            background-color: #00cc77;
        }
    </style>
@endsection

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
                            @php
                                $a = $carrera->getAvanceInt($usuario);
                            @endphp
                            <div class="progress">
                                <span class="porcentaje-avance">{{ $a }}%</span>
                                <div class="progress-bar bar-colorful" role="progressbar" aria-valuenow="{{ $a }}" aria-valuemin="0" aria-valuemax="100" style="min-width: {{ $a }}%;">
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
                            <img src="{{ asset($curso->getInsignia->getLink()) }}" class="img-circle insignia-mini">
                            <span class="curso-nombre">
                                {{ $curso->nombre }}
                            </span>
                        </a>
                    @endforeach
                    @if($a>=100)
                            <a href="" class="list-group-item text-center examen">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                 Tomar el examen de certificación
                            </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach

    </div> <!-- /container -->

@endsection