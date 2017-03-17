<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Gestión Técnico Contractual')</title>
    {!! Html::style('css/app.css') !!}
    {!! Html::script('js/app.js') !!}
</head>
<body>
<div class="container">
    <div class="container-fluid">
        <h2 class="row">@yield('title', 'Géstion Técnico Contractual')</h2>
        <div class="row">@yield('nav')</div>
        <br>
        <div class="row">
            <div class="col-md-2">
                @yield('menu')
            </div>
            <div class="col-md-10">
                <div class="row">
                    <h4>@yield('path')</h4>
                </div>
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
        <br>
    </div>
</div>
</body>
</html>