@extends('master1')
@section('modulo')
    <div class="well">
        <h3>Registro creado satisfactoriamente</h3>
        <hr>
        <p>Se ha enviado una notificación a su Email para activar su cuenta.</p>
        <br>
        <p>Saludos,</p>
        <p>Equipo de Gestión Contractual.</p>
        <a href="{{ route('login') }}">Inicio de Sesión</a>
    </div>
@endsection