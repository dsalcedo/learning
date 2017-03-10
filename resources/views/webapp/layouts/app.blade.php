<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>@yield('titulo', 'Hackrhub')</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/webapp.css') }}" rel="stylesheet">

    @yield('css')

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Static navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('webapp.index') }}">
                Project name
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('webapp.index') }}">Carreras</a>
                </li>
                <li>
                    <a href="{{ route('webapp.suscripcion') }}">Suscripciones</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i> Cuenta<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('webapp.perfil') }}">Mi perfil</a></li>
                        <li><a href="#">Mi suscripción</a></li>
                        <li><a href="{{ route('webapp.compras') }}">Mis compras</a></li>
                        <li><a href="{{ route('webapp.compras') }}" style="font-style: italic;">
                                <i class="fa fa-gift" aria-hidden="true"></i>
                                Redeem
                            </a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

@yield('content')

@yield('modals')

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ asset('js/jquery.min.js') }}"><\/script>')</script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
<script>
    String.prototype.bladejs = (function (){
        var re = /\<:(.+?)\:>/g;
        return function (o){
            return this.replace(re, function (_, k){
                return typeof o[k] != 'undefined' ? o[k] : '';
            });
        }
    }());
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
@yield('js')
</body>
</html>