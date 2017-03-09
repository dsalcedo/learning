@extends('webapp.layouts.app')

@section('titulo', 'Detalles de compra')

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400|Raleway|Oxygen:400,700" rel="stylesheet">
    <link href="{{ asset('css/font-camphor.css') }}" rel="stylesheet">
    <style>
        body{
            background-color: #ececec;
            font-family: 'Raleway', sans-serif;
            text-rendering: optimizeLegibility;
        }
        .container-pago{
            background-color: #fff;
            border-radius: 5px;
            border: 1px solid #E4E2E2;
            padding: 30px;
        }
        .page-header{
            color: #3b89d1;
            font-family: 'Roboto', sans-serif;
        }
        h1, h2, h3, h4{
            font-family: 'Roboto', sans-serif;
            font-weight: 100;
        }
        .titulo-seccion{
            color: #9c9c9c;
        }
        label{
            font-weight: 700;
            font-family: 'Roboto', sans-serif;
        }
        .input-group, textarea, input{
            font-family: 'Roboto', sans-serif;
        }
        .disabled{
            cursor: not-allowed;
            background-color: #eeeeee;
        }
        .block-help{
            margin-top:20px;
            color: #bdbdbd;
        }
        .procesandoPago{
            padding-top: 15%;
            color: #fff;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(76, 94, 113, 0.65);
            z-index: 999999;

            background-image: url({{ asset('images/code.svg') }}),-webkit-linear-gradient(270deg, #24292e, #2b3137);
            background-image: url({{ asset('images/code.svg') }}),linear-gradient(180deg, #24292e, #2b3137);
            background-position: center -75px, 0 0;
            background-size: 100% auto;
        }

        @media(max-width: 767px){
            .procesandoPago{
                padding-top: 50%;
            }

            .procesandoPago h1{
                padding-left: 40px;
                padding-right: 40px;
            }

        }
    </style>
@endsection

@section('content')
    <div class="procesandoPago hide text-center">
        <h1>{{ ($tpl == 'tarjeta' ? 'Estamos realizando el cargo a tu tarjeta' : 'Estamos generando tu recibo de pago OXXO Pay') }}</h1>
        <h3>Por favor no cierres esta ventana</h3>
    </div>
<div class="container container-pago">
    {!! Form::open(['route'=>['procesar.compra', $suscripcion->id, $metodo]]) !!}
    {!! Form::hidden('metodo', $tpl) !!}
    <div class="col-md-12">
        <h2 class="page-header">
            Validación de compra
        </h2>
    </div>
    <div class="col-md-6">
        <h3 class="titulo-seccion">Detalles de compra</h3>
        <div class="form-horizontal">
            <div class="form-group">
                {!! Form::label('monto', 'Monto', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        {!! Form::text('monto', $suscripcion->costo,['class'=>'form-control disabled', 'readonly'=>'readonly']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('descripcion', 'Descripción', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::textarea('descripcion', $suscripcion->descripcion,['class'=>'form-control disabled', 'rows'=>'2', 'readonly'=>'readonly']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('metodo', 'Método de pago', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    <img src="{{ asset('images/pagos/originales/'.$metodo.'.png') }}" style="max-width:100px;">
                    <p style="margin-left: 10px;">
                        <a href="{{ route('webapp.suscripcion') }}">cambiar</a>
                    </p>
                </div>
            </div>
        </div>
        <h3 class="titulo-seccion" style="margin-top: 40px; margin-bottom: 20px;">Tú información</h3>

        <div class="form-group">
            {!! Form::label('nombre', 'Nombre', ['class'=>'control-label']) !!}
            {!! Form::text('nombre', $usuario->getFullname(),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Correo electrónico', ['class'=>'control-label']) !!}
            {!! Form::text('email', $usuario->email,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('telefono', 'Teléfono de contacto (10 dígitos)', ['class'=>'control-label']) !!}
            {!! Form::text('telefono', null,['class'=>'form-control']) !!}
        </div>
        <p class="help-text">Esta información nos ayudará a llevar un control anti-fraude y evitar realizarte otro tipo de cargo que no sea esta suscripción.</p>

    </div>

    <div class="col-md-6">
        <h3 class="titulo-seccion">Dirección de facturación</h3>

        <div class="form-horizontal">
            <div class="form-group">
                {!! Form::label('direccion', 'Dirección', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('direccion', null,['class'=>'form-control', 'placeholder'=>'Ej. Calle del buen ejemplo #100 Col. Emprendedor']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('ciudad', 'Ciudad', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('ciudad', null,['class'=>'form-control', 'placeholder'=>'Ciudad']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('estado', 'Estado/CP', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('estado', null, ['class'=>'form-control', 'placeholder'=>'Estado']) !!}
                </div>
                <div class="col-sm-4">
                    {!! Form::text('codigo_postal', null,['class'=>'form-control', 'placeholder'=>'Código Postal']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('pais', 'País', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::select('pais', ['mx'=>'México'],null,['class'=>'form-control']) !!}
                </div>
            </div>
        </div>

        <h3 class="titulo-seccion" style="margin-top: 40px; margin-bottom: 20px;">Información de pago</h3>

        @if($tpl == 'tarjeta')
            <div class="form-group">
                {!! Form::label('tarjetahabiente', 'Nombre del tarjetahabiente') !!}
                {!! Form::text('tarjetahabiente', null,['class'=>'form-control', 'data-conekta'=>'card[name]','placeholder'=>'']) !!}
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                            {!! Form::label('numero_tarjeta', 'Número de tarjeta/CCV') !!}
                    </div>
                    <div class="col-sm-9">
                        {!! Form::text('', null,['class'=>'form-control', 'data-conekta'=>'card[number]','placeholder'=>'']) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::text('', null,['class'=>'form-control', 'data-conekta'=>'card[cvc]','placeholder'=>'CCV']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label('exp_month', 'Fecha de expiración (MM/AAAA)') !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::select('', $meses,null,['class'=>'form-control', 'data-conekta'=>'card[exp_month]']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::selectRange('',  2017, 2025, null,['class'=>'form-control', 'data-conekta'=>'card[exp_year]']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <input id="pagoTarjeta" type="submit" class="btn btn-success" value="Realizar el pago">
            </div>
        @else
            <p style="font-family: 'Roboto', sans-serif; font-size:17px;font-weight: 200;">
                Al confirmar tu método de pago en "OXXO" tendrás <strong>15 días como máximo</strong> para realizar tu pago.
            </p>
            <p style="font-family: 'Roboto', sans-serif; font-size:17px;font-weight: 200;">
                Una vez hecho el pago, OXXO <strong>INMEDIATAMENTE</strong> nos confirmará tu pago y tu <strong>suscripción será activada</strong>.
            </p>
            <div class="col-md-12 text-center" style="margin-top: 30px;">
                <input id="pagoOxxo" type="submit" class="btn btn-success" value="Realizar mi pago en OXXO">
            </div>
        @endif
    </div>

    <div class="col-md-12 text-right">
        <div class="row">
            <p class="block-help">Por seguridad no almecenamos los siguientes datos: Dirección de facturación e información de pago.</p>
        </div>
    </div>
    {!! Form::close() !!}
</div>

<!-- Modal -->
<div id="errores" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Aviso</h4>
            </div>
            <div class="modal-body">
                <p>Existe un problema con los datos ingresados pero no te preocupes, puedes corregirlos.</p>
                <div class="msgConekta"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript" src="https://conektaapi.s3.amazonaws.com/v0.3.2/js/conekta.js"></script>
    <script>
        Conekta.setPublishableKey("key_FcyfqGBXDNGsz1u4Vd5uNow");
        Conekta.setLanguage("es");
    </script>

    @if($tpl == 'tarjeta')
        <script>
            var successHandler = function(token) {
                /* token keys: id, livemode, used, object */

                var $form = $('form');
                var card_token = token.id;
                // Insert the token_id into the form
                $form.append($('<input type="hidden" name="card_token" />').val(card_token));
                $form.submit();
            };

            var errorHandler = function(response) {
                $('.procesandoPago').addClass('hide');
                /* err keys: object, type, message, message_to_purchaser, param, code */
                $('.msgConekta').empty().text(response.message_to_purchaser);
                $('#errores').modal('show');
                $('#pagoTarjeta').prop('disabled', false);
            };


            $(document).on('click', '#pagoTarjeta', function (e) {

                $('.procesandoPago').removeClass('hide');
                $(this).prop('disabled', true);
                Conekta.token.create($('form'), successHandler, errorHandler);

                e.preventDefault();
            });
        </script>
    @else
        <script>
            var $form = $('form');

            $(document).on('click', '#pagoOxxo', function(){
                $('.procesandoPago').removeClass('hide');
                $(this).prop('disabled', true);
                $form.submit();
            });
        </script>
    @endif

@endsection