<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="active dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Buscar <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url()->route('correspondencia.buscar') }}">Busqueda Simple</a></li>
                    <li class="disabled"><a href="#">Busqueda Avanzada</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>