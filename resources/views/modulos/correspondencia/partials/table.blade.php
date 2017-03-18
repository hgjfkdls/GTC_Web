<table class="table" id="filter_table">
    <thead>
    <tr>
        <th>id</th>
        <th>obra</th>
        <th>codigo</th>
        <th>fecha</th>
        <th>nombre</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @if(isset($correspondencia))
        @foreach($correspondencia as $row)
            <a>
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->id_obra }}</td>
                    <td>{{ $row->codigo }}</td>
                    <td>{{ date_format(date_create($row->fecha_receptor), 'Y/m/d') }}</td>
                    <td>{{ $row->nombre }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-menu-hamburger"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="{{ url()->route('correspondencia.show_doc', [$row->id]) }}"
                                       target="_blank">
                                        <span class="glyphicon glyphicon-file"></span> ver pdf
                                    </a>
                                    <a href="{{ url()->route('correspondencia.show_txt', [$row->id]) }}"
                                       target="_blank">
                                        <span class="glyphicon glyphicon-list-alt"></span> ver texto plano
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </a>
        @endforeach
    @endif
    </tbody>
</table>