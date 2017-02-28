@extends('manager.layouts.app')

@section('titulo', $curso->nombre.' > Lecciones')

@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#addLessonModal">Agregar</a>
        <h2 class="page-header">
            {{ $curso->nombre }}
        </h2>

        <h4>Lecciones del curso</h4>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Publicado</th>

            </tr>
            </thead>
            <tbody>
                @foreach($curso->getLecciones as $l)
                <tr>
                    <td>{{ $l->lugar }}</td>
                    <td>
                        <a href="">
                            {{ $l->nombre }}
                        </a>
                    </td>
                    <td>{{ ($l->publicado) ? 'Publicado' : 'No publicado' }}</td>
                    <td class="text-center">
                        <a href="" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar titulo">
                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('leccion.administrar.contenido', $l->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar contenido">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar lección">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> <!-- /container -->
@endsection

@section('modals')
    <div id="addLessonModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="#" id="addFields" class="pull-right btn btn-primary">Agregar campo</a>
                    <h4 class="modal-title">Agregar lecciones</h4>
                </div>
                {!! Form::open(['route'=>['lecciones.crear.post', $curso->id]]) !!}
                    <div id="leccionesForm" class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-2 col-sm-2 col-xs-3">
                                {!! Form::label('lugar', 'Lugar') !!}
                                {!! Form::text('items[1][lugar]', 1, ['class'=>'form-control', 'disabled']) !!}
                            </div>
                            <div class="form-group col-md-10 col-sm-10 col-xs-9">
                                {!! Form::label('titulo', 'Titulo') !!}
                                {!! Form::text('items[1][titulo]', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Crear lecciones</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('js')
    <script>
        var lugar = 1;
        $('#linkCursos').addClass('active');
        var container = $('#leccionesForm');
        var tpl = '<div id="item-<:indice:>" class="row"><div class="form-group col-md-2 col-sm-2 col-xs-3">' +
                        '<label for="lugar">Lugar</label>' +
                        '<input class="form-control" name="items[<:indice:>][lugar]" type="text" value="<:indice:>" disabled>' +
                    '</div>' +
                    '<div class="form-group col-md-10 col-sm-10 col-xs-9">' +
                        '<a href="#" class="eliminarLeccion help-block pull-right" data-eliminar="#item-<:indice:>" style="margin-top: 0; margin-bottom: 0;">Eliminar</a>'+
                        '<label for="titulo">Titulo</label>' +
                        '<input class="form-control" name="items[<:indice:>][titulo]" type="text" value="">' +
                    '</div></div>';

        $(document).on('click', '#addFields', function(e){
            lugar = lugar + 1;
            container.append( tpl.bladejs({'indice':lugar}) );
            e.preventDefault();
        });

        $(document).on('click', '.eliminarLeccion', function (e) {
            var items = $( $(this).data('eliminar') );
            var i = $('#leccionesForm .row').length;
            items.remove();
            e.preventDefault();
        })
    </script>
@endsection