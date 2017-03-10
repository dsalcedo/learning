@extends('website.app')

@section('titulo', 'Hackrhub')

@section('content')
<div class="container" style="max-width: 500px;">
    {!! Form::open(['route'=>'acceso.post']) !!}
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Iniciar sesión</button>
    {!! Form::close() !!}
</div>
@endsection