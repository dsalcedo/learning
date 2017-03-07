@extends('manager.layouts.app')

@section('titulo', 'Cursos > Editar')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/spectrum.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/easy-autocomplete/easy-autocomplete.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/easy-autocomplete/easy-autocomplete.themes.min.css') }}">
    <style>
        .search-thumb{
            width: 30px;
            height: 30px;
        }
    </style>
@endsection

@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        {!! Form::model($curso,['route'=> ['cursos.editar.post', $curso->id]]) !!}
        <div class="form-group">
            {!! Form::label('clave', 'Clave') !!}
            {!! Form::text('clave', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('carrera_id', 'Carrera') !!}
            {!! Form::select('carrera_id', $carreras, 0, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('descripcion', 'Descripción') !!}
            {!! Form::textarea('descripcion', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('insignia', 'Insignia') !!}
            {!! Form::text('', $curso->getInsignia->nombre, ['class'=>'form-control autocompleteMe']) !!}
            {!! Form::hidden('insignia_id', null) !!}
        </div>
        <div class="form-group">
            {!! Form::label('color', 'Color de fondo') !!} <br>
            {!! Form::text('color', null,['class'=>'form-control', 'id'=>'color']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cover', 'Cover') !!}
            {!! Form::text('cover', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('gratuito', 'Gratuito') !!}
            {!! Form::select('gratuito', ['0'=>'No','1'=>'Si'], null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('publicado', 'Publicado') !!}
            {!! Form::select('publicado', ['0'=>'No','1'=>'Si'], null, ['class'=>'form-control']) !!}
        </div>

        <button type="submit" class="btn btn-success">Guardar cambios</button>
        {!! Form::close() !!}
    </div>

@endsection


@section('js')
    <script src="{{ asset('js/spectrum.js') }}"></script>
    <script src="{{ asset('libs/easy-autocomplete/jquery.easy-autocomplete.min.js') }}"></script>
    <script>
        var insput = $('input[name=insignia_id]');
        var options = {
            data : {!! $insigniasJson !!},
            getValue: "nombre",
            list: {
                match: {
                    enabled: true
                },
                maxNumberOfElements: 8,
                onSelectItemEvent: function () {
                    var value = $(".autocompleteMe").getSelectedItemData();
                    insput.val(value.id);
                }
            },

            template: {
                type: "custom",
                fields: {
                    description: "nombre"
                },
                method: function(value, item) {
                    return "<img src='/multimedia/"+item.media+"' class='search-thumb'> " + value;
                }
            },

            theme: "square"
        };
        $('#linkCursos').addClass('active');
        $("#color").spectrum({
            preferredFormat: "hex",
            showInput: true
        });

        $(".autocompleteMe").easyAutocomplete(options);

    </script>
@endsection