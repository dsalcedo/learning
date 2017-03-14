@extends('manager.layouts.app')

@section('titulo', 'Crear examen')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="row">
            <div class="col-md-6">
                {!! Form::open(['route'=>['examenes.crear.post', $carrera->id]]) !!}
                    {!! Form::hidden('carrera_id', $carrera->id) !!}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Título</label>
                        {!! Form::text('titulo', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        {!! Form::textarea('descripcion', null, ['class'=>'form-control', 'rows'=>'2']) !!}
                    </div>
                    <div class="form-group">
                        <label for="activo">Activo</label>
                        {!! Form::select('activo', ['1'=>'Si', '0'=>'No'], null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Publicado</label>
                        {!! Form::select('publicado', ['1'=>'Si', '0'=>'No'], null, ['class'=>'form-control']) !!}
                    </div>
                    <button type="submit" class="btn btn-success">Guardar examen</button>
                </form>
                {!! Form::close() !!}
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#linkCarreras').addClass('active');
    </script>
@endsection