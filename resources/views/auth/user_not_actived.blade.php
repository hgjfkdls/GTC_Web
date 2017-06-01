@extends('master1')
@section('modulo')
    <div class="alert alert-danger">
        <h3>Error</h3>
        <hr>
        <p>Antes de <b>Iniciar Sesión</b> debe de <b>activar su cuenta</b>, un link de activación se ha enviado a su correo electrónico.</p>
        <br>
        <a class="btn btn-primary" href="{{ route('home') }}">Inicio de Sesión</a>
    </div>
@endsection