@foreach($tags as $tag)
    <table class="tag-table" data-id="{{ $tag->id }}" data-id_padre="{{ $tag->id_padre }}">
        <tbody>
        <tr>
            <td style="width: {{ isset($level) ? ($level * 20) : 0 }}px;"></td>
            <td width="20px" valign="center">
                <label class="glyphicon-btn"><input class="cursor-hand" type="checkbox"></label>
                {{--<div class="cursor-link glyphicon glyphicon-unchecked glyphicon-btn checkeable-glyphicon"></div>--}}
            </td>
            <td width="20px">
                <div class="dropdown">
                    <div class="glyphicon glyphicon-menu-hamburger glyphicon-btn"
                         data-toggle="dropdown"></div>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li class="dropdown-header"><b>Nombre</b></li>
                        <li>
                            <input class="tag-name" style="margin: 0px 20px 0px 20px;" type="text"
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
                    @if(isset($tag->hasChildrens))
                        @if($tag->hasChildrens)
                            <span style="float: right" class="glyphicon glyphicon-plus-sign"></span>
                        @else
                            <span style="float: right" class="glyphicon"></span>
                        @endif
                    @else
                        <span style="float: right" class="glyphicon"></span>
                    @endif
                </div>
            </td>
        </tr>
        </tbody>
    </table>
@endforeach