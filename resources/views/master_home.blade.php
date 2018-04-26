@extends('layouts.master_nav')
@section('content')
    @parent
    <div class="row">
        <div class="col-md-3">
            @include('menu')
        </div>
        <div class="col-md-9" style="background-color: white; height: 1000px">
            Contenido
        </div>
    </div>
@endsection