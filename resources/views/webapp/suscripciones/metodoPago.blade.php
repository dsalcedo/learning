@extends('webapp.layouts.app')

@section('titulo', 'Suscripciones')

@section('css')
    <style>
        .checkbox label, .radio label{
            padding: 0;
        }
        input[type=radio] {
            position: relative!important;
            margin-left: auto!important;
            margin-right: auto!important;
            display: block;
            margin-bottom: 15px;
        }
        .radio{
            background-color: #fafafa;
        }
        .radio img{
            max-width: 100px;
        }
        @media(min-width: 768px){
            .radio{
                height: 150px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="col-md-3 text-center">
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                    <img src="{{ asset('images/AmericanExpress.png') }}">
                </label>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                    <img src="{{ asset('images/MasterCard.png') }}" alt="">
                </label>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                    <img src="{{ asset('images/Visa.png') }}" alt="">
                </label>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                    <img src="{{ asset('images/Oxxo.png') }}" alt="">
                </label>
            </div>
        </div>
    </div>

@endsection
