@extends('modulos.base')
@section('modulo_navbar')
    @include('modulos.correspondencia.partials.navbar')
@endsection
@section('modulo_content')
    @include('modulos.correspondencia.partials.adevanced_search_form')
    <div class="panel-group">
        @foreach($response['data'] as $row)
            <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse"
                     data-target="#row{{ $row['data']->id }}">{{ $row['data']->codigo }} <div class="badge">{{ count($row['matches'][0]) }}</div></div>
                <div class="panel-body collapse" id="row{{ $row['data']->id }}">
                    @foreach($row['matches'][0] as $content)
                        <blockquote style="font-size: medium">
                            <p>...{!! preg_replace( '/' . $response['pattern'] . '/im', '<b style="color: #F00">$0</b>', $content) !!}...</p>
                        </blockquote>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
