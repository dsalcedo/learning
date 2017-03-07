@extends('webapp.layouts.app')

@section('titulo', 'Lección #'.$leccion->lugar.' - '.$leccion->nombre . ' > ' .$leccion->getCurso->nombre)

@section('css')
    <link rel="stylesheet" href="{{ asset('libs/highlight/rainbow.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/leccion.css') }}">
    <style>

        ul.lecciones-lista{
            padding: 0;
            list-style-type: none;
        }
        ul.lecciones-lista li{
            padding: 8px 10px;
        }
        pre {
            display: block;
            padding: 9.5px;
            margin: 0 0 10px;
            font-size: 13px;
            line-height: 1.42857143;
            color: #333;
            word-break: break-all;
            word-wrap: break-word;
            background-color: #474949;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        pre {
            overflow: auto;
            word-break: normal;
            word-wrap: normal;
        }
        pre code {
            white-space: pre;
        }
        .row-sidebar{
            margin-right: -20px;
            margin-left: -20px;
            color: {{ $leccion->getCurso->color }};
            padding: 10px 20px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .insignia-sidebar{
            max-width: 80px;
            display: block;
            margin-right: auto;
            margin-left: auto;
            margin-bottom: 30px;
        }
    </style>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <div class="row row-sidebar text-center">
                    <img src="{{ asset($leccion->getCurso->getInsignia->getLink()) }}" class="insignia-sidebar">
                    {{ $leccion->getCurso->nombre }}
                </div>
                <ul class="nav nav-sidebar">
                    @foreach($leccion->getCurso->getLeccionesActivas() as $l)
                        <li id="uid-{{ $l->id }}">
                            <a href="{{ route('webapp.curso.leccion', [$leccion->getCurso->clave, $l->lugar, $l->id]) }}">
                                <i class="fa fa-file-text-o" aria-hidden="true" style="margin-right: 10px;"></i>
                                {{$loop->iteration}}.-
                                {{$l->nombre }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div style="font-size: 16px;">
                    {!! $leccion->getContenido->contenido !!}
                </div>
                <div class="col-md-12 text-center" style="margin-top: 20px; margin-bottom: 20px;">
                    <a href="" class="btn btn-border-success">
                        Marcar como leido
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('libs/highlight/highlight.min.js') }}"></script>
    <script src="{{ asset('libs/highlight/highlight-line-numbers.min.js') }}"></script>
    <script>
        var leccion = '#uid-{{ $leccion->id }}';
            $(leccion).addClass('active');

        hljs.initHighlightingOnLoad();
        hljs.initLineNumbersOnLoad();

        $(document).ready(function() {
            $('pre code').each(function(i, block) {
                hljs.lineNumbersBlock(block);
            });
        });
    </script>

@endsection