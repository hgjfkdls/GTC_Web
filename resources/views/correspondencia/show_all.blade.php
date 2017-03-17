@extends('correspondencia.layout')
@section('path')
    @parent Ver Base de Datos
@endsection
@section('content')
    @include('correspondencia.partials.table', $correspondencia)
@endsection