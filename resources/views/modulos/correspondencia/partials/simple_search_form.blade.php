<div class="well">
    @include('modulos.correspondencia.partials.simple_search_path')
    {!! Form::open(['route' => 'correspondencia.simple_search', 'method' => 'GET'], ['class'=>'form-horizontal']) !!}
    @foreach(array_keys($patterns) as $id)
        @foreach(array_keys($patterns[$id]) as $key)
            <div>{!! Form::hidden($key, $patterns[$id][$key]) !!}</div>
        @endforeach
    @endforeach
    <div>{!! Form::hidden('u'.count($patterns), '#') !!}</div>
    @if(isset($patterns['arr']))
        <div>{!! Form::hidden('arr', $patterns['arr']) !!}</div>
    @endif
    <div class='form-group'>
        {!! Form::label('p'.count($patterns),'Busqueda') !!}
        {!! Form::text('p'.count($patterns), null, [
        'class'=>'form-control',
        'placeholder'=>'Ingrese el patrón de busqueda',
        'required',
        'autofocus']) !!}
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            {!! Form::label('c'.count($patterns), 'Columna') !!}
            {!! Form::select(
            'c'.count($patterns), [
                'id'=>'id',
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
            {!! Form::label('o'.count($patterns), 'Operador') !!}
            {!! Form::select(
            'o'.count($patterns), [
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