@php($i = count($response['data_form']))
<div class="well">
    {{-- Ruta de Busqueda --}}
    @include('modulos.correspondencia.partials.advanced_search_path')
    {{-- Inicia el Formulario --}}
    {!! Form::open(['route' => 'correspondencia.advanced_search', 'method' => 'GET'], ['class'=>'form']) !!}
    {{-- Sector oculto del formulario --}}
    @foreach(array_keys($response['data_form']) as $id)
        @foreach(array_keys($response['data_form'][$id]) as $key)
            <div>{!! Form::hidden($key, $response['data_form'][$id][$key]) !!}</div>
        @endforeach
    @endforeach
    <div>{!! Form::hidden('url' . $i, '#') !!}</div>
    {{-- Sector visible del formulario --}}
    <div class='form-group'>
        {!! Form::label('pattern' . $i,'Busqueda') !!}
        {!! Form::text('pattern' . $i, null, [
        'class'=>'form-control',
        'placeholder'=>'Ingrese el patrón de busqueda',
        'required',
        'autofocus']) !!}
    </div>
    <div class="form-group row">
        <div class="col-sm-4">
            <label class="control-label">Tipo de Búsqueda</label>
            <div class="container-fluid">
                <div class="radio">
                    <label class="control-label"><input class="radio" type="radio" name="type{{ $i }}" checked value="PT">Texto
                        plano</label>
                </div>
                <div class="radio">
                    <label class="control-label"><input class="radio" type="radio" name="type{{ $i }}" value="RE">Expresion
                        regular</label>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <label class="control-label">Operador</label>
            <div class="container-fluid">
                <div class="radio">
                    <label class="control-label"><input class="radio" type="radio" name="operator{{ $i }}" checked value="AND">AND</label>
                </div>
                <div class="radio">
                    <label class="control-label"><input class="radio" type="radio" name="operator{{ $i }}" value="OR">OR</label>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <label class="control-label">Otros</label>
            <div class="container-fluid checkbox">
                <label>
                    <input type="checkbox" name="ignore_case{{ $i }}" value="true" checked>Ignorar mayúsculas y
                    minúsculas
                </label>
                <label>
                    <input type="checkbox" name="words{{ $i }}" value="true" checked>Coincidir Palabras Completas
                </label>
            </div>
        </div>
    </div>

    <div class='form-group'>
        {!! Form::submit('Buscar', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>