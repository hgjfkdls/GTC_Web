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
    <div class="row">
        <div class="col-md-12">
            <ul class="gtc-navbar">
                <li class="gtc-brand">Gestion Contractual</li>
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Contact</a></li>
                @if(Auth::check())
                    <li class="gtc-right"><a href="#"><span
                                    class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}<span
                                    class="glyphicon glyphicon-option-vertical"></span></a></li>
                    <li class="gtc-right"><a href="#">Notificaciones</a></li>
                @endif
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <ul class="gtc-menu">
                @foreach(isset($menu) ? $menu : [] as $item)
                    <li class="{{ isset($item['active']) ? ($item['active'] ? 'active' : '') : '' }}"><a><span
                                    class="{{ $item['icon'] }}"></span> {{ $item['name'] }}<span
                                    class="glyphicon glyphicon-chevron-right pull-right"></span></a>
                        <ul>
                            @foreach(isset($item['data']) ? $item['data'] : [] as $subitem)
                                <li><a>{{ $subitem['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-10" style="background-color: #FFF">
            <div class="row">
                <div class="col-md-12">
                    <h3>Gestión Contractual</h3>
                </div>
            </div>
            <div class="jumbotron">
                <div>{{ $menu }}</div>
                @for($i=0; $i < 10; $i++)
                    <div>Contenedor {{ $i }} </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@yield('style')
@yield('script')
</body>
</html>