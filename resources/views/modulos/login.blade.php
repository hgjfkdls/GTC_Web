@extends('modulos.base')
@section('modulo_navbar')
@endsection
@section('modulo_content')
    <div class="container-fluid well well-lg" style="width: 300px;">
        {!! Form::open(['route' => 'login', 'method' => 'POST'], ['class'=>'form-signin']) !!}
            <h5 class="form-signin-heading text-center">Iniciar Sesión</h5>
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        {!! Form::close() !!}
    </div>
@endsection