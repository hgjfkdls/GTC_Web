@php($i = count($response['data_form']))
<div class="well">
    @include('modulos.correspondencia.partials.simple_search_path')
    {!! Form::open(['url' => url()->route('correspondencia.simple_search', ['id_obra' => $response['id_obra']]), 'method' => 'GET'], ['class' => 'form-horizontal']) !!}
    @foreach(array_keys($response['data_form']) as $id)
        @foreach(array_keys($response['data_form'][$id]) as $key)
            <div>{!! Form::hidden($key, $response['data_form'][$id][$key]) !!}</div>
        @endforeach
    @endforeach
    <div>{!! Form::hidden('url' . $i, '#') !!}</div>
    <div class='form-group'>
        {!! Form::label('pattern' . $i, 'Busqueda') !!}
        {!! Form::text('pattern' . $i, null, [
        'class'=>'form-control',
        'id' => 'simple-search-pattern-input',
        'placeholder'=>'Ingrese el patrón de busqueda',
        'required',
        'autofocus']
        ) !!}
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('column' . $i, 'Columna') !!}
            {!! Form::select(
            'column' . $i, [
                'codigo' => 'Codigo',
                'fecha_emisor' => 'Fecha',
                'nombre' => 'Nombre'
                ],
                'nombre',
                ['class' => 'form-control']
                ) !!}
        </div>
        <div class="form-group col-lg-6">
            {!! Form::label('operator' . $i, 'Operador') !!}
            {!! Form::select(
            'operator' . $i, [
                'AND'=>'AND',
                'OR'=>'OR',
                ],
                'AND',
                ['class' => 'form-control']
                ) !!}
        </div>
    </div>
    <div class='form-group'>
        {!! Form::submit('Buscar', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>