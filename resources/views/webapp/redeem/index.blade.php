@extends('webapp.layouts.app')

@section('titulo', 'Redeem')

@section('content')
    <div class="container" style="max-width: 600px;">
            <h2 class="text-center">Escribe el código de canje</h2>
            <p class="text-center">
                ¡Al introducir un código de canje válido obtendrás acceso a todos los cursos! *
            </p>

        {!! Form::open(['route'=>'redeem.store', 'class'=>'form-horizontal']) !!}
            <div class="form-group">
                @if(session()->has('alerta'))
                    <div class="alert alert-warning">
                        {{ session()->get('alerta') }}
                    </div>
                @endif

                @if(session()->has('mensaje'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('mensaje') }}
                    </div>
                @endif

                <input type="text" class="form-control input-lg" id="" name="redeem">
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">CANJEAR CÓDIGO</button>
            </div>
        {!! Form::close() !!}
    </div>
@endsection