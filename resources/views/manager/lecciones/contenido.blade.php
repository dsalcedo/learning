@extends('manager.layouts.app')

@section('titulo', 'Cursos > Crear')

@section('headjs')
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({
        selector:'textarea',
            plugins: 'link image media code imagetools',
            toolbar: 'link image media code',
            image_caption: true,
            media_live_embeds: true,
            imagetools_cors_hosts: ['tinymce.com', 'codepen.io', 'localhost', '127.0.0.1'],
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.css',
                '//www.tinymce.com/css/codepen.min.css'
            ]
    });</script>
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
    <script>
        $('#linkCursos').addClass('active');
    </script>
@endsection