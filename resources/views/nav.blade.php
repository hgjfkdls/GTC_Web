<ul class="nav nav-tabs">
    <li class="{{ Route::currentRouteName() == 'correspondencia.buscar' ? 'active' : '' }}"><a href="{{ url()->route('correspondencia.buscar') }}"><span class="glyphicon glyphicon-search"></span> Correspondencia</a></li>
    <li class="{{ Route::currentRouteName() == 'login' ? 'active' : '' }} navbar-right disabled"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
</ul>