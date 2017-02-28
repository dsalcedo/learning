@extends('manager.layouts.app')

@section('titulo', 'Suscripciones')

@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <a href="{{ route('suscripciones.crear') }}" class="btn btn-success pull-right">Agregar</a>
        <h2 class="page-header">
            Suscripciones
        </h2>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>SKU</th>
                    <th>Duración</th>
                    <th>Costo</th>
                    <th>Estado</th>
                    <th>Publicado</th>
                    <th>Verificación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suscripciones as $s)
                <tr class="{{ ($s->costo <= 0) ? 'warning' : '' }}">
                    <td><a href="{{ route('suscripciones.editar', $s->id) }}">{{ $s->nombre }}</a></td>
                    <td>{{ $s->descripcion }}</td>
                    <td>{{ $s->clave }}</td>
                    <td>{{ $s->duracion }} Días</td>
                    <td>$ {{ $s->costo }}.00 MXN</td>
                    <td>{{ ($s->activo) ? 'Activo' : 'No activo' }}</td>
                    <td>{{ ($s->publicado) ? 'Publicado' : 'No publicado' }}</td>
                    <td>{{ ($s->verificacion) ? 'Manual' : 'Automática' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- /container -->

@endsection

@section('js')
    <script>
        $('#linkSuscripciones').addClass('active');
    </script>
@endsection