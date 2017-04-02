@php($route = preg_match('/simple_search/', url()->current()) ? 'simple_search' : 'advanced_search')
<ul class="nav nav-tabs">
    <li class="{{ $response['id_obra'] == 260 ? 'active' : '' }}">
        <a href="{{ url()->route('correspondencia.' . $route, ['id_obra' => 260]) }}">
            260. Mejoramiento y Conservación de la Ruta 43
        </a>
    </li>
    <li class="{{ $response['id_obra'] == 230 ? 'active' : '' }}">
        <a href="{{ url()->route('correspondencia.' . $route, ['id_obra' => 230]) }}">
            230. Ruta 5, La Serena - Vallenar
        </a>
    </li>
    <li class="{{ $response['id_obra'] == 190 ? 'active' : '' }} disabled">
        <a href="{{ /*url()->route('correspondencia.' . $route, ['id_obra' => 190])*/'#' }}">
            190. Alternativas de Acceso a Iquique
        </a>
    </li>
    <li class="{{ Route::currentRouteName() == 'login' ? 'active' : '' }} navbar-right disabled">
        <a href="#">
            <span class="glyphicon glyphicon-log-in"></span> Login
        </a>
    </li>
</ul>