<ul class="gtc-navbar gtc-fixed">
    <li class="gtc-brand">Gestion Contractual</li>
    <li class="active"><a href="#">Inicio</a></li>
    <li class="gtc-dropdown">
        <a href="#">Noticias</a>
        <ul>
            <li><a>Item1111</a></li>
            <li><a>Item1111</a></li>
        </ul>
    </li>
    <li><a href="#">Contacto</a></li>
    @if(Auth::check())
        <li class="pull-right gtc-dropdown">
            <a href="#">
                <span class="glyphicon glyphicon-user"></span>
                {{ Auth::user()->name }}
                <span class="glyphicon glyphicon-option-vertical"></span>
            </a>
            <ul class="gtc-dropdown-right">
                <li class="disabled">
                    <a href="#">
                        <span class="glyphicon glyphicon-wrench"></span>&nbsp;
                        Configuración
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                        <span class="glyphicon glyphicon-log-out"></span>&nbsp;
                        Cerrar Sessión
                    </a>
                </li>
            </ul>
        </li>
        <li class="pull-right">
            <a href="#">
                <span class="glyphicon glyphicon-bell"></span>&nbsp;
                Notificaciones
                <span class="badge">0</span>
            </a>
        </li>
        <li class="pull-right">
            <a href="#">
                <span class="glyphicon glyphicon-envelope"></span>&nbsp;
                Mensajes
                <span class="badge">0</span>
            </a>
        </li>
    @endif
</ul>