<ul class="nav nav-tabs">
    <li class="{{ preg_match('/^correspondencia\./', Route::currentRouteName()) ? 'active' : '' }}">
        <a href="{{ url()->route('correspondencia.simple_search') }}">
            <span class="glyphicon glyphicon-search"></span> Correspondencia
        </a>
    </li>
    <li class="{{ Route::currentRouteName() == 'login' ? 'active' : '' }} navbar-right disabled">
        <a href="#">
            <span class="glyphicon glyphicon-log-in"></span> Login
        </a>
    </li>
</ul>