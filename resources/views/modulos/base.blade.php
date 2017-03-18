@extends('master')
@section('nav')
    @include('nav')
@endsection
@section('modulo')
    @yield('modulo_navbar')
    @yield('modulo_content')
@endsection