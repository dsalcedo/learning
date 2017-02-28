@extends('webapp.layouts.app')

@section('titulo', $curso->nombre)

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
    </style>
    <div class="container" style="max-width: 750px;">
        <h1>{{ $curso->nombre }}</h1>
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