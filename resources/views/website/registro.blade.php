@extends('website.app')

@section('titulo', 'Hackrhub')

@section('css')
    <style>
        .registro {
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
@endsection

@section('content')

    <div class="container">

        {!! Form::open(['route'=>'registro.post', 'class'=>'registro']) !!}

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="form-group">
                <label for="nombre">Nombre</label>
                {!! Form::text('nombre', null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="nombre">Apellidos</label>
                {!! Form::text('apellidos', null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Correo electrónico</label>
                {!! Form::text('email', null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="terminos_y_condiciones" value="1"> Acepto los Términos y Condiciones del servicio y las políticas de privacidad
                </label>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">
                    Registrarse
                </button>
            </div>
        {!! Form::close() !!}

    </div> <!-- /container -->

@endsection