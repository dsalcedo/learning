<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recibo de pago OXXO Pay</title>

    <link href="{{ asset('css/oxxopay.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    @php
        $limite = $recibo->created_at->addDays(15);
    @endphp
    <style>

    </style>
</head>
<body>
<div class="opps">
    <div class="opps-header">
        <div class="opps-reminder">Ficha digital. No es necesario imprimir.</div>
        <div class="opps-info">
            <div class="opps-brand">
                <img src="{{ asset('images/oxxopay_brand.png') }}" alt="OXXOPay">
            </div>
            <div class="opps-ammount">
                <h3>Monto a pagar</h3>
                <h2>$ {{ number_format($recibo->orden->monto, 2, '.', ',')  }} <sup>MXN</sup></h2>
                <p style="color: #eb655a;">OXXO cobrará una comisión adicional al momento de realizar el pago.</p>
            </div>
        </div>
        <div class="opps-reference">
            <h3>Referencia</h3>
            <h1>{{ wordwrap($recibo->referencia, 4 , '-', true) }}</h1>
        </div>
        <div class="opps-reference">
            <h3>Fecha límite de pago</h3>
            <h1>{{ $recibo->created_at->addDays(15)->format('Y-m-d') }}</h1>
        </div>
    </div>
    <div class="opps-instructions">
        <h3>Instrucciones</h3>
        <ol>
            <li>Acude a la tienda OXXO más cercana. <a href="https://www.google.com.mx/maps/search/oxxo/" target="_blank">Encuéntrala aquí</a>.</li>
            <li>Indica en caja que quieres ralizar un pago de <strong>OXXOPay</strong>.</li>
            <li>Dicta al cajero el número de referencia en esta ficha para que tecleé directamete en la pantalla de venta.</li>
            <li>Realiza el pago correspondiente con dinero en efectivo.</li>
            <li>Al confirmar tu pago, el cajero te entregará un comprobante impreso. <strong>En el podrás verificar que se haya realizado correctamente.</strong> Conserva este comprobante de pago.</li>
        </ol>
        <div class="opps-footnote">Al completar estos pasos recibirás un correo electrónico de <strong>Hackrhub</strong> confirmando tu pago.</div>
    </div>
</div>
</body>
</html>