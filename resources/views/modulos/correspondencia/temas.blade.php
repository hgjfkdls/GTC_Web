@extends('modulos.base')
@section('modulo_navbar')
    @include('modulos.correspondencia.partials.navbar')
@endsection
@section('modulo_content')
    <div class="row">
        <div class="col-sm-4">
            @include('modulos.correspondencia.partials.tag_edit_select_list')
        </div>
        <div class="col-sm-8">
            <div class="well">
                Lista de Documentos Etiquetados
            </div>
        </div>
    </div>
@endsection