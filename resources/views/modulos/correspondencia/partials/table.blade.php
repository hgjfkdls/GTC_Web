<table class="table" id="filter_table">
    <thead>
    <tr>
        <th>
            <div class="btn-group btn-group-sm dropdown" style="min-width: 60px;">
                <label class="disabled btn btn-sm btn-default">
                    <input class="disabled btn" type="checkbox">
                </label>
                <button class="disabled btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-left">
                    <li class="disabled">
                        <a>Opcion 1</a>
                    </li>
                    <li class="disabled">
                        <a>Opcion 1</a>
                    </li>
                    <li class="disabled">
                        <a>Opcion 1</a>
                    </li>
                </ul>
            </div>
        </th>
        <th>id</th>
        <th>obra</th>
        <th>codigo</th>
        <th>fecha</th>
        <th>nombre</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($response['data']))
        @foreach($response['data'] as $row)
            <a>
                <tr>
                    <td>
                        <div class="btn-group btn-group dropdown" style="min-width: 60px;">
                            <label class="btn btn-sm btn-default">
                                <input class="btn" type="checkbox">
                            </label>
                            <button class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-left">
                                <li>
                                    <a href="{{ url()->route('correspondencia.show_doc', [$row->id]) }}"
                                       target="_blank">
                                        <span class="glyphicon glyphicon-file"></span> ver pdf
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url()->route('correspondencia.show_txt', [$row->id]) }}"
                                       target="_blank">
                                        <span class="glyphicon glyphicon-list-alt"></span> ver texto plano
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->id_obra }}</td>
                    <td>{{ $row->codigo }}</td>
                    <td>{{ date_format(date_create($row->fecha_receptor), 'Y/m/d') }}</td>
                    <td>{{ $row->nombre }}</td>
                </tr>
            </a>
        @endforeach
    @endif
    </tbody>
</table>