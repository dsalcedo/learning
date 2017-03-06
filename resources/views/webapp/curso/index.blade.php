@extends('webapp.layouts.app')

@section('titulo', $curso->nombre)

@section('css')
    <style>
        body {
            padding-top: 52px!important;
        }

        .titulo-curso {
            color: #fff;
            text-shadow: 2px 1px 0px rgba(150, 150, 150, 1);
        }
        .curso-cover{
            background: #4f5b93 url('{{ asset("test/cover.png") }}') no-repeat center center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        @media (min-width: 768px) {
            .container-curso{
                margin-top: -100px;
                background-color: #fff;
                border-radius: 3px;
                padding: 40px 50px!important;
                max-width: 800px;
            }
            .curso-cover{
                min-height: 300px;
            }
        }
    </style>
@endsection

@section('content')
    <style>
        .panel-card{
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px  solid #ddd;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .panel-card .indice{
            width:130px;
            height:50px;
            background-color: #fafafa;
            display: inline-block;
            position: relative;
            vertical-align: middle;
            margin-right: 15px;
            padding-top: 15px;
            padding-bottom: 15px;
            font-weight: bold;
        }
        .indice .fa{
            margin-right: 10px;
        }
        .indice .fa-minus-circle{
            color: #c7c7c7;
        }
        .indice .fa-check-circle{
            color: #61b54e;
        }
        .v-middle{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        .timeline {
            list-style: none;
            margin: 25px 0 22px;
            padding: 0;
            position: relative;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .timeline-horizontal:after {
            border-top-width: 6px;
            border-left-width: 13px;
            border-color: transparent transparent transparent #00637d;
            top: 15px;
            right: 0;
            bottom: auto;
            left: auto;
        }
        .timeline-horizontal .timeline-milestone {
            border-top: 2px solid #00637d;
            display: inline;
            float: left;
            margin: 20px 0 0 0;
            padding: 40px 0 0 0;
        }
        .timeline-horizontal .timeline-milestone:before {
            top: -17px;
            left: auto;
        }
        .timeline-horizontal .timeline-milestone.is-completed:after {
            top: -17px;
            left: 0;
        }
        .timeline-milestone {
            border-left: 2px solid #00637d;
            margin: 0 0 0 20px;
            padding: 0 0 15px 30px;
            position: relative;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .timeline-milestone:before {
            border: 7px solid #00637d;
            border-radius: 50%;
            content: "";
            display: block;
            position: absolute;
            left: -17px;
            width: 32px;
            height: 32px;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .timeline-milestone.is-completed:before {
            background-color: #00637d;
        }
        .timeline-milestone.is-completed:after {
            color: #FFF;
            content: "\f00c";
            display: block;
            font-family: "FontAwesome";
            line-height: 32px;
            position: absolute;
            top: 0;
            left: -17px;
            text-align: center;
            width: 32px;
            height: 32px;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .timeline-milestone.is-current:before {
            background-color: #EEE;
        }
        .timeline-milestone.is-future:before {
            background-color: #8DACB8;
            border: 0;
        }
        .timeline-milestone.is-future .timeline-action .title {
            color: #8DACB8;
        }

        .timeline-action {
            background-color: #00637d;
            padding: 12px 10px 12px 20px;
            position: relative;
            top: -15px;
        }
        .timeline-action.is-expandable .title {
            cursor: pointer;
            position: relative;
        }
        .timeline-action.is-expandable .title:focus {
            outline: 0;
            text-decoration: underline;
        }
        .timeline-action.is-expandable .title:after {
            border: 6px solid #666;
            border-color: transparent transparent transparent #666;
            content: "";
            display: block;
            position: absolute;
            top: 6px;
            right: 0;
        }
        .timeline-action.is-expandable .content {
            display: none;
        }
        .timeline-action.is-expandable.is-expanded .title:after {
            border-color: #666 transparent transparent transparent;
            top: 10px;
            right: 5px;
        }
        .timeline-action.is-expandable.is-expanded .content {
            display: block;
        }
        .timeline-action .title, .timeline-action .content {
            word-wrap: break-word;
        }
        .timeline-action .title {
            color: #00637d;
            font-size: 18px;
            margin: 0;
        }
        .timeline-action .date {
            display: block;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .timeline-action .content {
            font-size: 14px;
        }

        .file-list {
            line-height: 1.4;
            list-style: none;
            padding-left: 10px;
        }

        .timeline-end{
            border-left: none;
        }
    </style>

    <div class="jumbotron curso-cover text-center v-middle">
        <h2 class="titulo-curso">{{ $curso->nombre }}</h2>
    </div>

    <div class="container container-curso">

        <ul class="timeline">
            {{--@foreach($curso->getLeccionesActivas() as $l)--}}
                {{--<li class="timeline-milestone is-future {{ ($loop->last) ? 'timeline-end':'' }}">--}}
                    {{--<div class="timeline-action is-expandable">--}}
                        {{--<h2 class="title" style="color: #fff;">--}}

                            {{--{{ $loop->iteration. '.- '. $l->nombre }}--}}
                        {{--</h2>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--@endforeach--}}
            {{--<li class="timeline-milestone is-completed timeline-start">--}}
                {{--<div class="timeline-action">--}}
                    {{--<h2 class="title">Begin</h2>--}}
                    {{--<span class="date">First quarter 2013</span>--}}
                    {{--<div class="content">--}}
                        {{--We will have a small kickoff--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--<li class="timeline-milestone is-current">--}}
                {{--<div class="timeline-action is-expandable expanded">--}}
                    {{--<h2 class="title">Initial planning</h2>--}}
                    {{--<span class="date">Second quarter 2013</span>--}}
                    {{--<div class="content">--}}
                        {{--<ul class="file-list">--}}
                            {{--<li><a href="example/video" class="video-link">Introduction video</a></li>--}}
                            {{--<li><a href="example.pdf">Project Plan, pdf 2,8 MB</a></li>--}}
                            {{--<li><a href="example.pdf">Requirements, pdf 5,3 MB</a></li>--}}
                            {{--<li><a href="example.pdf">Test Plan, pdf 7,6 MB</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--<li class="timeline-milestone is-future">--}}
                {{--<div class="timeline-action is-expandable">--}}
                    {{--<h2 class="title">Start construction</h2>--}}
                    {{--<span class="date">Fourth quarter 2013</span>--}}
                    {{--<div class="content">--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--<li class="timeline-milestone is-future timeline-end">--}}
                {{--<div class="timeline-action">--}}
                    {{--<h2 class="title">Test and verify</h2>--}}
                    {{--<span class="date">Second quarter 2014</span>--}}
                    {{--<div class="content">--}}

                    {{--</div>--}}
                {{--</div>--}}
            {{--</li>--}}
        </ul>


        @foreach($curso->getLeccionesActivas() as $l)
            <div class="panel-card">
                <div class="indice text-center">
                    <i class="fa fa-minus-circle" aria-hidden="true"></i>
                     Lección #{{ $l->lugar }}
                </div>
                <a href="{{ route('webapp.curso.leccion', [$curso->clave, $l->lugar, $l->id]) }}">
                    {{ $l->nombre }}
                </a>
            </div>
        @endforeach
    </div>
@endsection

@section('js')
    <script>
//        $(document).ready(function() {
//            $timelineExpandableTitle = $('.timeline-action.is-expandable .title');
//
//            $($timelineExpandableTitle).attr('tabindex', '0');
//
//            // Give timelines ID's
//            $('.timeline').each(function(i, $timeline) {
//                var $timelineActions = $($timeline).find('.timeline-action.is-expandable');
//
//                $($timelineActions).each(function(j, $timelineAction) {
//                    var $milestoneContent = $($timelineAction).find('.content');
//
//                    $($milestoneContent).attr('id', 'timeline-' + i + '-milestone-content-' + j).attr('role', 'region');
//                    $($milestoneContent).attr('aria-expanded', $($timelineAction).hasClass('expanded'));
//
//                    $($timelineAction).find('.title').attr('aria-controls', 'timeline-' + i + '-milestone-content-' + j);
//                });
//            });
//
//            // Expand or navigate back and forth between sections
//            $($timelineExpandableTitle).keyup(function(e) {
//                if (e.which == 13){ //Enter key pressed
//                    $(this).click();
//                } else if (e.which == 37 ||e.which == 38) { // Left or Up
//                    $(this).closest('.timeline-milestone').prev('.timeline-milestone').find('.timeline-action .title').focus();
//                } else if (e.which == 39 ||e.which == 40) { // Right or Down
//                    $(this).closest('.timeline-milestone').next('.timeline-milestone').find('.timeline-action .title').focus();
//                }
//            });
//        });
    </script>
@endsection