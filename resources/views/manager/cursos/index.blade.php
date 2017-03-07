@extends('manager.layouts.app')

@section('titulo', 'Cursos')

@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <a href="{{ route('manage.cursos.crear') }}" class="btn btn-success pull-right">Agregar</a>
        <h2 class="page-header">
            Cursos
        </h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 36px;"></th>
                    <th>Nombre</th>
                    <th>Carrera</th>
                    <th>Descripción</th>
                    <th>Acceso</th>
                    <th>Estado</th>
                    <th>Lecciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cursos as $c)
                <tr>
                    <td class="text-center">
                        <a href="{{ route('manage.cursos.editar', $c->id) }}">
                            <img src="{{ asset($c->getInsignia->getLink()) }}" style="width: 40px; height: 40px;">
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('manage.cursos.editar', $c->id) }}">
                            {{ $c->nombre }}
                        </a>
                    </td>
                    <td>{{ $c->getCarrera->nombre }}</td>
                    <td>{{ $c->descripcion }}</td>
                    <td>{{ ($c->gratuito) ? 'Gratuito' : 'Suscripción' }}</td>
                    <td>{{ ($c->publicado) ? 'Publicado' : 'Borrador' }}</td>
                    <td class="text-center">
                        <a href="{{ route('manage.curso.lecciones', $c->id ) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Lecciones">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        </a>
                    </td>
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