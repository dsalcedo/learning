@extends('manager.layouts.app')

@section('titulo', $curso->nombre.' > Lecciones')

@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <a href="{{ route('curso.lecciones.crear', $curso->id) }}" class="btn btn-success pull-right">Agregar</a>
        <h2 class="page-header">
            {{ $curso->nombre }}
        </h2>

        <h4>Lecciones del curso</h4>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Carrera</th>
                <th>Descripción</th>
                <th>Acceso</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody>
                @foreach($curso->getLecciones as $l)
                <tr>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- /container -->

@endsection

@section('js')
    <script>
        $('#linkCursos').addClass('active');
    </script>
@endsection