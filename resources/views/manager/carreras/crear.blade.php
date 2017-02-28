@extends('manager.layouts.app')

@section('titulo', 'Carreras > Crear')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/spectrum.css') }}">
@endsection

@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        {!! Form::open(['route'=>'carreras.crear.post']) !!}
            <div class="form-group">
                {!! Form::label('clave', 'Clave') !!}
                {!! Form::text('clave', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('descripcion', 'Descripcion') !!}
                {!! Form::textarea('descripcion', null, ['class'=>'form-control', 'rows'=>3]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('color', 'Color') !!}
                {!! Form::text('color', null,['class'=>'form-control', 'id'=>'color']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('cover', 'Cover') !!}
                {!! Form::text('cover', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('publicado', 'Publicado') !!}
                {!! Form::select('publicado', ['1'=>'Si','0'=>'No'], 0, ['class'=>'form-control']) !!}
            </div>
            <button type="submit" class="btn btn-success">Publicar</button>
        {!! Form::close() !!}
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/spectrum.js') }}"></script>
    <script>
        $('#linkCarreras').addClass('active');
        $("#color").spectrum({
            preferredFormat: "hex"
        });
    </script>
@endsection