@extends('manager.layouts.app')

@section('titulo', 'Usuarios')

@section('css')
    <style>
        .label-redeable{
            font-weight: 400;
        }
    </style>
@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <a href="{{ route('usuarios.crear') }}" class="btn btn-success pull-right">Agregar</a>
        <h2 class="page-header">
            Usuarios
        </h2>

        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Roles</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $u)
                <tr>
                    <td>
                        <a href="{{ route('usuarios.editar', $u->id) }}">
                            {{ $u->getFullname() }}
                        </a>
                    </td>
                    <td>{{ $u->email }}</td>
                    <td>
                        @foreach($u->roles as $r)
                            <span class="label label-primary label-redeable">{{ $r->titulo }}</span>
                        @endforeach
                    </td>
                    <td>{{ ($u->activo) ? 'Activo' : 'No activo' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div> <!-- /container -->

@endsection

@section('js')
    <script>
        $('#linkUsuarios').addClass('active');
    </script>
@endsection