@php($route = preg_match('/simple_search/', url()->current()) ? 'simple_search' : 'advanced_search')
<ul class="nav nav-tabs">
    @if(isset($response))
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
    @endif
    @if(Auth::check())
        <li class="dropdown navbar-right">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                {{ Auth::user()->name }} <span class="glyphicon glyphicon-option-vertical"></span>
            </a>
            <ul class="dropdown-menu">
                <li class="disabled"><a href="#"><span class="glyphicon glyphicon-wrench"></span> Configuración</a></li>
                <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a>
                </li>
            </ul>
        </li>
    @else
        <li class="{{ Route::currentRouteName() == 'login' ? 'active' : '' }} navbar-right">
            <a href="{{ route('login') }}">
                <span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión
            </a>
        </li>
    @endif
</ul>