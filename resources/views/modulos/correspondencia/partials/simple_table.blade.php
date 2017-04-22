<table class="table" id="filter_table">
    <thead>
    <tr>
        <th width="60px">
            <div class="btn-group btn-group-sm dropdown" style="min-width: 60px;">
                <label class="btn btn-sm btn-default">
                    <input class="btn tags-checkbox" type="checkbox">
                </label>
                <button class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-left">
                    <li class="dropdown-header">
                        Selección
                    </li>
                    <li>
                        <a class="tags-etiquetar" href="#">
                            <span class="glyphicon glyphicon-tags"></span>
                            Etiquetar Selección
                        </a>
                    </li>
                    <li>
                        <a class="tags-descargar" href="#">
                            <span class="glyphicon glyphicon-download-alt"></span>
                            Descargar Selección
                        </a>
                    </li>
                </ul>
            </div>
        </th>
        <th>codigo</th>
        <th>fecha</th>
        <th>nombre</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($response['data']))
        @foreach($response['data'] as $row)
            @include('modulos.correspondencia.partials.simple_row')
        @endforeach
    @endif
    </tbody>
</table>