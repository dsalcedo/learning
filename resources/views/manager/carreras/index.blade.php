@extends('manager.layouts.app')

@section('titulo', 'Hackrhub')

@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <a href="{{ route('carreras.crear') }}" class="btn btn-success pull-right">Agregar</a>
        <h2 class="page-header">
            Carreras
        </h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carreras as $c)
                <tr>
                    <td>
                        <a href="{{ route('carrera.editar', $c->id) }}">
                            {{ $c->nombre }}
                        </a>
                    </td>
                    <td>{{ ($c->publicado) ? 'Publicado' : 'Borrador' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- /container -->

@endsection

@section('js')
    <script>
        $('#linkCarreras').addClass('active');
    </script>
@endsection