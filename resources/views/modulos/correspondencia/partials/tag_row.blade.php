@foreach($tags as $tag)
    <table class="tag-table" data-id="{{ $tag->id }}" data-id_padre="{{ $tag->id_padre }}">
        <tbody>
        <tr>
            <td width="{{ isset($level) ? ($level * 20) : 0 }}px"></td>
            <td width="25px">
                <div class="dropdown">
                    <div class="cursor-link glyphicon glyphicon-edit glyphicon-btn"
                         data-toggle="dropdown"></div>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li class="dropdown-header"><b>Nombre</b></li>
                        <li>
                            <input class="tag-name" style="margin: 0px 20px 0px 20px;"
                                   type="text"
                                   value="{{ $tag->nombre }}">
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-header"><b>Opciones</b></li>
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-pencil"></span>
                                Estilo
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tag-addSubtag">
                                <span class="glyphicon glyphicon-plus"></span>
                                Nueva Sub-Etiqueta
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tag-destroy">
                                <span class="glyphicon glyphicon-remove"></span>
                                Eliminar
                            </a>
                        </li>
                    </ul>
                </div>
            </td>
            <td width="10px">
            </td>
            <td>
                <div class="tag">
                    {{ $tag->nombre }}
                </div>
            </td>
        </tr>
        </tbody>
    </table>
@endforeach