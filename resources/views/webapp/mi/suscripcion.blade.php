@extends('webapp.layouts.app')

@section('titulo', 'Mi Suscripcion')

@section('content')
    <div class="container" style="max-width: 800px;">
        @if(is_null($usuario->premium_at))
            <h1 class="text-center">Aún no tienes una suscripción activa</h1>
        @else
            <h1 class="text-center">
                 Tienes {{ $carbon->parse($usuario->premium_at)->diffInDays( $carbon->now() ) }} días de acceso premium
            </h1>
            <p class="text-center">Recuerda renovar tu suscripción antes del {{ $carbon->parse($usuario->premium_at)->format('d \d\e F \d\e\l Y') }}.</p>
        @endif

        <h3 class="text-center">Historial de suscripciones</h3>
        <div style="margin-bottom: 30px;"></div>

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                @foreach($usuario->suscripciones as $log)
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading-{{$log->id}}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#uid-{{$log->id}}" aria-expanded="false" aria-controls="heading-{{$log->id}}">
                                    @php
                                        $s = $log->getSuscripcion;
                                        $o = $log->getOrden;
                                    @endphp
                                    <span class="pull-right text-uppercase">
                                        {{ $o->metodo_pago }} &nbsp; | &nbsp; {{ $s->created_at->format('Y-m-d') }}
                                    </span>
                                    <span style="text-decoration: underline;">{{ $s->nombre }}</span> -
                                    <span>{{ $s->descripcion }}</span>
                                </a>
                            </h4>
                        </div>
                        <div id="uid-{{$log->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <p>Referencia: {{ $o->uid }}</p>
                                <p>Monto: ${{$o->monto}} MXN</p>
                                <p>Estado: {{ $o->estado_interno }}</p>
                                <p>Método de Pago: {{ $o->metodo_pago }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


    </div>
@endsection