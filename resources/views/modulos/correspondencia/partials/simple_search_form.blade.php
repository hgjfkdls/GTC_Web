@php($i = count($response['data_form']))
<div class="well">
    @include('modulos.correspondencia.partials.simple_search_path')
    {!! Form::open(['route' => 'correspondencia.simple_search', 'method' => 'GET'], ['class'=>'form-horizontal']) !!}
    @foreach(array_keys($response['data_form']) as $id)
        @foreach(array_keys($response['data_form'][$id]) as $key)
            <div>{!! Form::hidden($key, $response['data_form'][$id][$key]) !!}</div>
        @endforeach
    @endforeach
    <div>{!! Form::hidden('u'.$i, '#') !!}</div>
    <div class='form-group'>
        {!! Form::label('p'.$i,'Busqueda') !!}
        {!! Form::text('p'.$i, null, [
        'class'=>'form-control',
        'placeholder'=>'Ingrese el patrón de busqueda',
        'required',
        'autofocus']) !!}
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('c'.$i, 'Columna') !!}
            {!! Form::select(
            'c'.$i, [
                'id_obra'=>'Obra',
                'codigo' => 'Codigo',
                'fecha_emisor' => 'Fecha',
                'nombre' => 'Nombre'
                ],
                'nombre',
                ['class' => 'form-control']
                ) !!}
        </div>
        <div class="form-group col-lg-6">
            {!! Form::label('o'.$i, 'Operador') !!}
            {!! Form::select(
            'o'.$i, [
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