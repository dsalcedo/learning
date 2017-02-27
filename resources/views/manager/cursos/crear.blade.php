@extends('manager.layouts.app')

@section('titulo', 'Cursos > Crear')

@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        {!! Form::open(['route'=>'cursos.crear.post']) !!}
        <div class="form-group">
            {!! Form::label('clave', 'Clave') !!}
            {!! Form::text('clave', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('carrera_id', 'Carrera') !!}
            {!! Form::select('carrera_id', $carreras, 0, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('descripcion', 'Descripción') !!}
            {!! Form::textarea('descripcion', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('insignia', 'Insignia') !!}
            {!! Form::text('insignia', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cover', 'Cover') !!}
            {!! Form::text('cover', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('gratuito', 'Gratuito') !!}
            {!! Form::select('gratuito', ['0'=>'No','1'=>'Si'], 0, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('publicado', 'Publicado') !!}
            {!! Form::select('publicado', ['0'=>'No','1'=>'Si'], 0, ['class'=>'form-control']) !!}
        </div>

        <button type="submit" class="btn btn-success">Publicar</button>
        {!! Form::close() !!}
    </div>

@endsection

@section('js')
    <script>
        $('#linkCursos').addClass('active');
    </script>
@endsection