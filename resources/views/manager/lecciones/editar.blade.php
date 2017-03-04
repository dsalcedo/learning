@extends('manager.layouts.app')

@section('titulo', 'Editar Lección')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        <ol class="breadcrumb">
            <li><a href="{{ route('manage.curso.lecciones', $leccion->curso_id) }}">{{ $leccion->getCurso->nombre }}</a></li>
            <li>Leccion</li>
            <li class="active">{{ $leccion->nombre }}</li>
        </ol>


        {!! Form::model($leccion, ['route'=>['curso.leccion.editarPost', $leccion->id]]) !!}

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre de la lección') !!}
                {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('publicado', 'Lección publicada') !!}
                {!! Form::select('publicado', [1 => 'Si',0 =>'No'], null, ['class'=>'form-control']) !!}
            </div>
            <button type="submit" class="btn btn-success">Guardar cambios</button>
        {!! Form::close() !!}
    </div>

@endsection

@section('js')
    <script>
        $('#linkCursos').addClass('active');
    </script>
@endsection