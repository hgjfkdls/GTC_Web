<table class="table" id="filter_table">
    <thead>
    <tr>
        <th>id</th>
        <th>obra</th>
        <th>codigo</th>
        <th>fecha</th>
        <th>nombre</th>
        <th>emisor</th>
        <th>receptor</th>
        <th>ver</th>
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
                    <td>{{ $row->emisor }}</td>
                    <td>{{ $row->receptor }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="small btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>{{ link_to_route('correspondencia.show_doc', 'ver', [$row->id], ['target' => '_blank']) }}</li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </a>
        @endforeach
    @endif
    </tbody>
</table>