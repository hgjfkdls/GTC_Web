<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="{{ $response['navbar'] == 'search' ? 'active' : '' }} dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Buscar <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url()->route('correspondencia.simple_search', ['id_obra' => $response['id_obra']]) }}">Busqueda Simple</a></li>
                    <li><a href="{{ url()->route('correspondencia.advanced_search', ['id_obra' => $response['id_obra']]) }}">Busqueda Avanzada</a></li>
                </ul>
            </li>
            <li class="{{ $response['navbar'] == 'temas' ? 'active' : '' }}" >
                <a href="{{ url()->route('correspondencia.temas') }}">
                    Temas
                </a>
            </li>
        </ul>
    </div>
</nav>