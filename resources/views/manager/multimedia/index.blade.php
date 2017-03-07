@extends('manager.layouts.app')

@section('titulo', 'Multimedia')

@section('css')
    <link rel="stylesheet" href="{{ asset('libs/upload-preview/uploadPreview.css') }}">
    <style>
        .thumb{
            width: 150px;
            height: 100px;
            background-color: #fafafa;
            display: block;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .vmedio{
            vertical-align: middle!important;
        }
    </style>
@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="col-md-3">
            {!! Form::open(['route'=>'multimedia.upload', 'files' => true]) !!}
            <h3>Subir nuevo medio</h3>
            <div class="form-group">
                {{ Form::label('nombre', 'Nombre') }}
                {{ Form::text('nombre', null, ['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('tipo', 'Tipo de medio') }}
                {{ Form::select('tipo', ['cover'=>'Cover','insignia'=>'Insignia', 'imagen'=>'Imagen', 'otro'=>'Otro'], null, ['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                <div id="image-preview">
                    {{ Form::label('image-upload', 'Escoger archivo', ['id'=>'image-label']) }}
                    {{ Form::file('media', ['id'=>'image-upload']) }}
                </div>
                <p class="help-block">El peso máximo permito es de 1MB.</p>
            </div>

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">Cargar multimedia</button>
            </div>

            {!! Form::close() !!}
        </div>
        <div class="col-md-9">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 160px;">Imagen</th>
                            <th>Nombre</th>
                            <th>Url</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($multimedios as $archivo)
                        <tr>
                            <td class="vmedio">
                                <div class="thumb" style="background: url({{ asset($archivo->getLink()) }}) no-repeat center center;  -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"></div>
                            </td>
                            <td class="vmedio"><strong>{{ $archivo->nombre }}</strong></td>
                            <td class="vmedio">
                                <input type="text" class="form-control" value="{{ $archivo->getLink() }}" style="width: 400px;">
                            </td>
                            <td class="vmedio">{{ $archivo->tipo }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-12 text-center">
                {{ $multimedios->links() }}
            </div>

        </div>

    </div>
@endsection

@section('js')
    <script src="{{ asset('libs/upload-preview/uploadPreview.min.js') }}"></script>
    <script>
        $('#linkMultimedia').addClass('active');
        $(document).ready(function() {
            $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",
                label_field: "#image-label",
                label_selected: "Cambiar",
                success_callback: null
            });
        });
    </script>
@endsection