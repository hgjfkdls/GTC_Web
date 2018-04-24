<tr data-id="{{ $row->id }}">
    <td>
        <div class="btn-group btn-group dropdown">
            <label class="btn btn-sm btn-default">
                <input class="btn doc-checkbox" type="checkbox">
            </label>
            <button class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-left">
                <li class="dropdown-header">
                    <b>Documento</b>
                </li>
                <li>
                    <a href="{{ url()->route('correspondencia.show_doc_id', [$row->id]) }}" target="_blank">
                        <span class="glyphicon glyphicon-file"></span>
                        ver pdf
                    </a>
                </li>
                <li>
                    <a href="{{ url()->route('correspondencia.show_txt', [$row->id]) }}" target="_blank">
                        <span class="glyphicon glyphicon-list-alt"></span>
                        ver texto plano
                    </a>
                </li>
                {{--@if(Auth::check())--}}
                    {{--<li>--}}
                        {{--<a class="tag-etiquetar" href="#">--}}
                            {{--<span class="glyphicon glyphicon-tags"></span>--}}
                            {{--Etiquetar--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--@endif--}}
                {{--<li>--}}
                    {{--<a class="tag-descargar" href="#">--}}
                        {{--<span class="glyphicon glyphicon-download-alt"></span>--}}
                        {{--Descargar--}}
                    {{--</a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </td>
    <td>{{ $row->codigo }}</td>
    <td>{{ date_format(date_create($row->fecha_receptor), 'Y/m/d') }}</td>
    <td>
        {{ $row->nombre }}
        @if(count($row->etiquetas) > 0)
            <div class="mytooltip">
                <span class="btn btn-default btn-xs glyphicon glyphicon-tags"></span>
                <span class="tooltiptext">
                    <div>Etiquetas</div>
                    @foreach($row->etiquetas as $etiqueta)
                        <div class="tag" data-id="{{ $etiqueta->id }}" style="{{ $etiqueta->estilo }}; margin-top: 5px;">{{ $etiqueta->nombre }}</div>
                    @endforeach
                </span>
            </div>
        @endif
    </td>
</tr>