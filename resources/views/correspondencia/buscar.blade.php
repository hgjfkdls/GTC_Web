@extends('correspondencia.layout')
@section('path')
    @include('correspondencia.partials.path', ['patterns' => $patterns])
@endsection
@section('content')
    @include('correspondencia.partials.simple_search', ['patterns' => $patterns])
    <div class="container-fluid bg-success">
        coincidenacias: {{ isset($correspondencia) ? $correspondencia->count() : 0 }}</div>
    @include('correspondencia.partials.table', ['correspondencia' => $correspondencia])
@endsection