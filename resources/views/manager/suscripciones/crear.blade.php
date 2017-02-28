@extends('manager.layouts.app')

@section('titulo', 'Suscripciones > Crear')

@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        {!! Form::open(['route'=>'suscripciones.crear.post']) !!}
        <h3>Crear suscripción</h3>
        <div class="form-group">
            {!! Form::label('clave', 'Clave') !!}
            {!! Form::text('clave', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('descripcion', 'Descripción') !!}
            {!! Form::textarea('descripcion', null, ['class'=>'form-control', 'rows'=>'2']) !!}
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                {!! Form::label('duracion', 'Duración en días de la suscripción') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-time" aria-hidden="true"></i>
                    </span>
                    {!! Form::text('duracion', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('costo', 'Costo') !!}
                <div class="input-group">
                    <span class="input-group-addon">
                       $
                    </span>
                    {!! Form::text('costo', null, ['class'=>'form-control']) !!}
                    <span class="input-group-addon">.00</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                {!! Form::label('activo', 'Activo') !!}
                {!! Form::select('activo', ['0'=>'No','1'=>'Si'], 0, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('publicado', 'Público') !!}
                {!! Form::select('publicado', ['0'=>'No','1'=>'Si'], 0, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('verificacion', 'Requiere de verificación') !!}
                {!! Form::select('verificacion', ['0'=>'No','1'=>'Si'], 0, ['class'=>'form-control']) !!}
            </div>
        </div>


        <button type="submit" class="btn btn-success">Publicar suscripción</button>
        {!! Form::close() !!}
    </div>

@endsection

@section('js')
    <script>
        $('#linkSuscripciones').addClass('active');
    </script>
@endsection