@extends('modulos.base')
@section('modulo_navbar')
    @include('modulos.correspondencia.partials.navbar')
@endsection
@section('modulo_content')
    <div>{{ 'usuario: ' . $response['id_usuario'] }}</div>
    <div class="well">
        @if(isset($response['data']))
            @foreach($response['data'] as $data)
                <blockquote>
                    <div>{{ $data->nombre }}
                        <span class="btn-group btn-group-xs">
                            <span class="btn btn-default glyphicon glyphicon-chevron-left"></span>
                            <span class="btn btn-default glyphicon glyphicon-chevron-right"></span>
                            <span class="btn btn-default glyphicon glyphicon-chevron-up"></span>
                            <span class="btn btn-default glyphicon glyphicon-chevron-down"></span>
                            <span class="btn btn-primary glyphicon glyphicon-menu-hamburger"></span>
                            <span class="btn btn-danger glyphicon glyphicon-remove"></span>
                        </span>
                    </div>
                </blockquote>
            @endforeach
        @endif
    </div>
@endsection