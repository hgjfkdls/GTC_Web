<div class="well">
    @include('modulos.correspondencia.partials.advanced_search_path')
    {!! Form::open(['route' => 'correspondencia.advanced_search', 'method' => 'GET'], ['class'=>'form']) !!}
    <div class='form-group'>
        {!! Form::label('pattern','Busqueda') !!}
        {!! Form::text('pattern', null, [
        'class'=>'form-control',
        'placeholder'=>'Ingrese el patrón de busqueda',
        'required',
        'autofocus']) !!}
    </div>
    <div class='form-group'>
        {!! Form::submit('Buscar', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>