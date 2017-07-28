<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Gestión Contractual')</title>
    {!! Html::style('css/bootstrap.css') !!}
    {!! Html::style('css/spectrum.css') !!}
    {!! Html::style('css/gtc.css') !!}
    {!! Html::script('js/jquery-3.2.0.min.js') !!}
    {!! Html::script('js/bootstrap.js') !!}
    {!! Html::script('js/spectrum.js') !!}
    {!! Html::script('js/gtc.js') !!}
</head>
<body>
<div class="container-fluid" style="height: 100%">
    <div class="row">
        <div class="col-md-12">
            <div class="navbar navbar-inverse navbar-fixed-top">
                <ul class="nav navbar-nav">
                    <li class="navbar-brand">Gestión Técnico Contractual</li>
                    <li class="active"><a href="#">Inicio</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row" style="position: absolute; top: 51px; height: calc(100% - 51px); width: 100%">
        <div class="col-md-2" style="background-color: #777; height: 100%">
            menu
        </div>
        <div class="col-md-10" style="height: 100%; border: solid red 1px; overflow: scroll">
            @for($i=0; $i < 100; $i++)
                <div>Contenedor {{ $i }} </div>
            @endfor
        </div>
    </div>
</div>
@yield('style')
@yield('script')
</body>
</html>