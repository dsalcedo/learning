@extends('webapp.layouts.app')

@section('titulo', 'Suscripciones')

@section('css')
    <style>
        body {
            padding-top: 50px;
        }
        .qr {
            margin-left: auto;
            margin-right: auto;
        }

        .prices {
            padding-bottom: 40px;
            color: #fff;
            background: #B3C0DD;
            background: -moz-linear-gradient(-45deg, #3f4c6b 0%, #3f4c6b 100%);
            background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,#3f4c6b), color-stop(100%,#3f4c6b));
            background: -webkit-linear-gradient(-45deg, #B3C0DD 0%,#3f4c6b 100%);
            background: -o-linear-gradient(-45deg, #B3C0DD 0%,#3f4c6b 100%);
            background: -ms-linear-gradient(-45deg, #B3C0DD 0%,#3f4c6b 100%);
            background: linear-gradient(135deg, #B3C0DD 0%,#3f4c6b 100%);
        }

        .pricing-tables-jumbotron {
            text-align: center;
            background: none;
        }

        .big {
            font-size: 37px;
        }

        .option {
            background: #f9f9f9;
            box-shadow: 0 0 1px rgba(0, 0, 0, .2);
            border-radius: 4px 4px 0 0;
            position: relative;
            margin: 20px 0;
            text-align: center;
            color: #333;
        }

        .option:hover .hided-icon {
            color: #fff;
            padding: 0 10px;
        }

        .option > .option-title {
            padding: 20px;
        }

        .option > .option-title > h3 {
            font-weight: bold;
            font-size: 32px;
            text-transform: uppercase;
            margin: 0;
        }

        .option > .option-title > span {
            font-size: 16px;
        }

        .option > .option-price {
            background: #fff;
            padding: 0 0 10px;
            color: #0FB112;
        }

        .option > .option-price > .price {
            display: block;
            font-size: 50px;
            font-weight: bold;
        }

        .option > .option-price > .period {
            font-size: 14px;
        }

        .option .option-list {
            padding: 0;
        }

        .option .item-list {
            list-style: none;
            padding: 0;
        }

        .option .item-list li:nth-child(even) {
            background: #fdfdfd;
        }

        .option .item-list > li {
            padding: 10px 5px;
            font-size: 16px;
        }

        .option .btn {
            width: 100%;
            padding: 18px 8px;
            border-radius: 0;
            border: none;
            text-transform: uppercase;
        }

        .option .btn-success {
            color: #fff;
            background: #0FB112;
        }

        .option .btn-success:hover {
            background: #1d7019;
        }

        .option .hided-icon {
            color: #0FB112;
            margin-left: -14px;
            -webkit-transition: all 0.7s ease-in-out;
            -moz-transition: all 0.7s ease-in-out;
            -o-transition: all 0.7s ease-in-out;
            transition: all 0.7s ease-in-out;
        }
    </style>
@endsection

@section('content')
    <div class="container">

        @foreach($suscripciones as $s)
            <div class="col-sm-3 col-md-3">
                <div class="option">
                    <div class="option-title">
                        <h3>{{ $s->nombre }}</h3>
                        <span>Duración de {{ $s->duracion }} días</span>
                    </div>
                    <div class="option-price">
                        <span class="price">${{ $s->costo }}</span>
                        <span class="period">MXN</span>
                    </div>
                    <div class="option-list">
                        <ul class="item-list">
                            <li><strong>Acceso a todos los cursos</strong></li>
                            <li>Entrada <strong>preferencial</strong> a nuestros eventos</li>
                            <li>Exámenes al final de cada curso y <strong>diploma</strong> por cada carrera</li>
                            <li>
                                <div class="qr" id="uid-{{$s->id}}" data-link="{{ route('comprar.suscripcion', [$s->id, $s->clave])}}"></div>
                            </li>
                        </ul>
                        <a href="{{ route('comprar.suscripcion', [$s->id, $s->clave])}}" class="btn btn-success">
                            Escoger
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/shieldui-lite/dist/js/shieldui-lite-all.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.qr').each(function(index, item){
                var uid = $(item).attr('id');
                var uri = $(item).data('link');
                $("#"+uid).shieldQRcode({
                    mode: "byte",
                    size: 150,
                    value: uri
                });
            });
        });
    </script>
@endsection