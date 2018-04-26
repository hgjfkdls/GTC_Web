<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Gestión Contractual')</title>
    {!! Html::style(asset('css/bootstrap.css')) !!}
    {!! Html::style(asset('css/spectrum.css')) !!}
    {!! Html::style(asset('css/gtc.css')) !!}
    {!! Html::script(asset('js/jquery-3.2.0.min.js')) !!}
    {!! Html::script(aseset('js/bootstrap.js')) !!}
    {!! Html::script(asset('js/spectrum.js')) !!}
    {!! Html::script(asset('js/gtc.js')) !!}
</head>
<body>
<div class="container">
    <div class="container-fluid">
        <h2><a href="{{ route('home') }}">@yield('title', 'Gestión Contractual - Motor de Búsqueda')</a></h2>
    </div>
    <div class="container-fluid">@yield('nav')</div>
    <br>
    <div class="container-fluid">
        @yield('modulo')
    </div>
</div>
@yield('style')
@yield('script')
</body>
</html>