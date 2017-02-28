@extends('manager.layouts.app')

@section('titulo', 'Usuarios > Crear')

@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        {!! Form::model($user,['route'=>['usuario.editar.post', $user->id]]) !!}
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('apellidos', 'Apellidos') !!}
            {!! Form::text('apellidos', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Correo electrónico') !!}
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Contraseña') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('activo', 'Usuario activo') !!}
            {!! Form::select('activo', ['0'=>'No','1'=>'Si'], null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            <h4>Rol del usuario</h4>

            @foreach($roles as $r)
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('roles[]', $r->id) !!}
                        {{ $r->titulo }}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">Guardar cambios</button>
        {!! Form::close() !!}
    </div>

@endsection

@section('js')
    <script>
        $('#linkUsuarios').addClass('active');
    </script>
@endsection