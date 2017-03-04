@extends('manager.layouts.app')

@section('titulo', 'Leccion > Crear contenido')

@section('css')
    <style>
        .hljs-line-numbers {
            text-align: right;
            border-right: 1px solid #ccc;
            color: #999;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
    </style>
@endsection

@section('headjs')

@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h2>
            <a href="{{ route('manage.curso.lecciones', $leccion->curso_id) }}" title="Volver a las lecciones">
                {{ $leccion->getCurso->nombre }}
            </a>
        </h2>
        <h2>Lección #{{ $leccion->lugar .' - '. $leccion->nombre }}</h2>
        {!! Form::open(['route'=>['administrar.contenido.post', $leccion->id]]) !!}
            <div class="form-group">
                {!! Form::textarea('contenido', (!is_null($leccion->getContenido)) ? $leccion->getContenido->contenido : '') !!}
            </div>
            <button type="submit" class="btn btn-success" style="margin-top: 30px;">Guardar cambios</button>
        {!! Form::close() !!}
    </div>
@endsection

@section('js')
    <script src="{{ asset('libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('libs/highlight/highlight.min.js') }}"></script>
    <script src="{{ asset('libs/highlight/highlight-line-numbers.min.js') }}"></script>
    <script>
        $('#linkCursos').addClass('active');
    </script>

    <script>tinymce.init({
            selector:'textarea',
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern codesample"
            ],
            toolbar: "insertfile codesample | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code",
            image_caption: true,
            media_live_embeds: true,
            imagetools_cors_hosts: ['tinymce.com', 'codepen.io', 'localhost', '127.0.0.1'],
            extended_valid_elements : "iiframe[align|longdesc|name|width|height|frameborder|scrolling|marginheight|marginwidth|src],script[language|type|src]",
//            content_css: [
//                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
//                '//cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.css',
//                '//www.tinymce.com/css/codepen.min.css'
//            ]
        });</script>
@endsection