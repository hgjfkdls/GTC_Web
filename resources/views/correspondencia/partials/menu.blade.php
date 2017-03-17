<ul class="nav nav-pills nav-stacked">
    <li class="{{
    (Route::currentRouteName() === 'correspondencia.buscar' || Route::currentRouteName() === 'correspondencia.match') ? 'active' : ''
    }}">
        {!! link_to_route('correspondencia.buscar', 'Buscar') !!}
    </li>
    <li class="{{ Route::currentRouteName() === 'correspondencia.show_all' ? 'active' : '' }}">
        {!! link_to_route('correspondencia.show_all', 'Ver Base de Datos') !!}
    </li>
</ul>