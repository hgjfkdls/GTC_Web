@extends('master')
@section('nav')
    @include('partials.nav')
@endsection
@section('modulo')
    <div class="container-fluid">
        @yield('modulo_menu')
    </div>
    <div class="container-fluid">
        @yield('modulo_content')
    </div>
@endsection