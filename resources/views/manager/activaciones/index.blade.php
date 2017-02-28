@extends('manager.layouts.app')

@section('titulo', 'Activaciones')

@section('content')


    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        <h2 class="page-header">
            Activaciones
        </h2>

        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>SKU</th>
            </tr>
            </thead>
            <tbody>
            @foreach($suscripciones as $s)
                <tr>
                    <td>{{ $s->nombre }}</td>
                    <td>{{ $s->clave}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div> <!-- /container -->

@endsection

@section('js')
    <script>
        $('#linkActivaciones').addClass('active');
    </script>
@endsection