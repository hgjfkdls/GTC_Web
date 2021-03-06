<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Motor de Búsqueda')</title>
    {!! Html::style('css/bootstrap.css') !!}
    {!! Html::script('js/jquery-3.2.0.min.js') !!}
    {!! Html::script('js/bootstrap.js') !!}
</head>
<body>
<div class="container">
    <div class="container-fluid">
        <h2>@yield('title', 'Motor de Búsqueda - Correspondencia')</h2>
    </div>
    <div class="container-fluid">@yield('nav')</div>
    <br>
    <div class="container-fluid">
        @yield('modulo')
    </div>
</div>
</body>
</html>