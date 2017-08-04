<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Gestión Contractual')</title>
    {!! Html::script('js/jquery-3.2.0.min.js') !!}
    {!! Html::script('js/bootstrap.js') !!}
    {!! Html::script('js/spectrum.js') !!}
    {!! Html::script('js/gtc.js') !!}
    {!! Html::style('css/bootstrap.css') !!}
    {!! Html::style('css/spectrum.css') !!}
    {!! Html::style('css/gtc.css') !!}
    {!! Html::style('css/gtc-navbar.css') !!}
    {!! Html::style('css/gtc-menu.css') !!}
    {!! Html::style('css/gtc-dropdown.css') !!}
</head>
<body class="gtc-body">
<div class="container-fluid">
    <div class="row" style="height: 40px">
        <div class="col-md-12">
            @include('navbar')
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            @include('menu')
        </div>
        <div class="col-md-10" style="background-color: #FFF; min-height: 400px;">
            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
@yield('style')
@yield('script')
</body>
</html>