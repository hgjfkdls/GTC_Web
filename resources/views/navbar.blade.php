<div class="gtc-control gtc-navbar">
    <ul class="gtc-fixed">
        <li class="gtc-brand">Gestion Contractual</li>
        <li class="active">
            <a href="#!"><span class="glyphicon glyphicon-home"></span>&nbsp; Inicio</a>
        </li>
        <li><a href="#!"><span class="glyphicon glyphicon-sunglasses"></span>&nbsp; Social</a></li>
        <li>
            <a href="#!"><span class="glyphicon glyphicon-info-sign"></span>&nbsp; Noticias</a>
        </li>
        <li><a href="#!"><span class="glyphicon glyphicon-leaf"></span>&nbsp; Contacto</a></li>
        @if(Auth::check())
            <li class="pull-right gtc-dropdown">
                <a href="#!">
                    <span class="glyphicon glyphicon-user"></span>
                    {{ Auth::user()->name }}
                    <span class="glyphicon glyphicon-option-vertical"></span>
                </a>
                <ul class="gtc-dropdown-right">
                    <li class="disabled">
                        <a href="#!">
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
                <a href="#!">
                    <span class="glyphicon glyphicon-bell"></span>&nbsp;
                    Notificaciones
                    <span class="badge">0</span>
                </a>
            </li>
            <li class="pull-right">
                <a href="#!">
                    <span class="glyphicon glyphicon-envelope"></span>&nbsp;
                    Mensajes
                    <span class="badge">0</span>
                </a>
            </li>
        @endif
    </ul>
</div>