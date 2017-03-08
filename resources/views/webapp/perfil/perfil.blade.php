@extends('webapp.layouts.app')

@section('titulo', 'Mi perfil')

@section('content')

    <div class="container" style="max-width: 800px; background-color: #fff;">

        @if(session('success'))
            <div class="alert alert-success">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif

        {{ Form::open(['route'=>'perfil.update']) }}
            <div class="form-group">
                {{ Form::label('nombre', 'Nombre') }}
                {{ Form::text('nombre', null, ['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('apellidos', 'Apellidos') }}
                {{ Form::text('apellidos', null, ['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Correo electrónico') }}
                {{ Form::email('email', null, ['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Contraseña') }}
                {{ Form::password('password', ['class'=>'form-control']) }}
            </div>
            <div class="col-md-12 text-center">
                <input type="submit" class="btn btn-success" value="Actualizar mis datos">
            </div>
        {{ Form::close() }}
    </div>

@endsection