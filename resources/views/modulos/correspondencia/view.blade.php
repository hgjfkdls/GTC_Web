@extends('modulos.base')
@section('modulo_navbar')
    @include('modulos.correspondencia.partials.navbar')
@endsection
@section('modulo_content')
    @include('modulos.correspondencia.partials.simple_search')
    @include('modulos.correspondencia.partials.table')
@endsection
