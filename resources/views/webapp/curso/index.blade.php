@extends('webapp.layouts.app')

@section('titulo', $curso->nombre)

@section('css')
    <style>
        body {
            padding-top: 52px!important;
        }

        .titulo-curso {
            color: #fff;
            text-shadow: 2px 1px 0px rgba(150, 150, 150, 1);
        }
        .curso-cover{
            background: url({{ $curso->cover}}) no-repeat center center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        @media (min-width: 768px) {
            .container-curso{
                margin-top: -100px;
                background-color: #fff;
                border-radius: 3px;
                padding: 40px 50px!important;
                max-width: 800px;
            }
            .curso-cover{
                min-height: 300px;
            }
        }
    </style>
@endsection

@section('content')
    <style>
        .panel-card{
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px  solid #ddd;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .panel-card .indice{
            width:130px;
            height:50px;
            background-color: #fafafa;
            display: inline-block;
            position: relative;
            vertical-align: middle;
            margin-right: 15px;
            padding-top: 15px;
            padding-bottom: 15px;
            font-weight: bold;
        }
        .indice .fa{
            margin-right: 10px;
        }
        .indice .fa-minus-circle{
            color: #c7c7c7;
        }
        .indice .fa-check-circle{
            color: #61b54e;
        }
        .v-middle{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <div class="jumbotron curso-cover text-center v-middle">
        <h2 class="titulo-curso">{{ $curso->nombre }}</h2>
    </div>

    <div class="container container-curso">
        @foreach($curso->getLeccionesActivas() as $l)
            <div class="panel-card">
                <div class="indice text-center">
                    <i class="fa fa-minus-circle" aria-hidden="true"></i>
                     Lección #{{ $l->lugar }}
                </div>
                {{ $l->nombre }}
            </div>
        @endforeach
    </div>
@endsection