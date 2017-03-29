<div class="panel-group">
    @foreach($response['data'] as $row)
        <div class="panel panel-default">
            <div class="panel-heading">
                <table style="width: 100%">
                    <tbody>
                    <tr>
                        <td style="width: 60px" valign="top">
                            <div class="btn-group btn-group dropdown" style="min-width: 60px;">
                                <label class="btn btn-sm btn-default">
                                    <input class="btn" type="checkbox">
                                </label>
                                <button class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-left">
                                    <li>
                                        <a href="{{ url()->route('correspondencia.show_doc', [$row['data']->id]) }}"
                                           target="_blank">
                                            <span class="glyphicon glyphicon-file"></span> ver pdf
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url()->route('correspondencia.show_txt', [$row['data']->id]) }}"
                                           target="_blank">
                                            <span class="glyphicon glyphicon-list-alt"></span> ver texto plano
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td style="padding-left: 10px;">
                            <a style="cursor: pointer; cursor: hand" data-toggle="collapse" data-target="#row{{ $row['data']->id }}">
                                [{{ date('Y-m-d', strtotime($row['data']->fecha_receptor)) }}]
                                <b>
                                    {{ $row['data']->codigo }}
                                </b>
                                /
                                <span>{{ $row['data']->nombre }}</span>
                            </a>
                            <span class="badge" style="margin-left: 10px;">{{ count($row['matches'][0]) }}</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel-body collapse" id="row{{ $row['data']->id }}">
                @foreach($row['matches'][0] as $content)
                    <blockquote class="bg-success" style="font-size: medium;">
                        <p>
                            ...
                            {!! preg_replace( '/' . $response['patterns'] . '/im', '<b style="color: #F00">$0</b>', $content) !!}
                            ...
                        </p>
                    </blockquote>
                @endforeach
            </div>
        </div>
    @endforeach
</div>