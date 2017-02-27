@extends('manager.layouts.app')

@section('titulo', 'Carreras > Editar')

@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        {!! Form::model($carrera, ['route'=>['carrera.editar.post', $carrera->id]]) !!}
            <div class="form-group">
                {!! Form::label('clave', 'Clave') !!}
                {!! Form::text('clave', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('cover', 'Cover') !!}
                {!! Form::text('cover', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('publicado', 'Publicado') !!}
                {!! Form::select('publicado', ['1'=>'Si','0'=>'No'], null, ['class'=>'form-control']) !!}
            </div>
            <button type="submit" class="btn btn-success">Guardar cambios</button>
        {!! Form::close() !!}
    </div>

@endsection

@section('js')
    <script>
        $('#linkCarreras').addClass('active');
    </script>
@endsection