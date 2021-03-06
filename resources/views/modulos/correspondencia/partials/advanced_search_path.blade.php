<blockquote>
    <a href="{{ url()->route('correspondencia.advanced_search', ['id_obra' => $response['id_obra']]) }}">Busqueda Avanzada</a>
    @if(count($response['data_form']) > 0)
        <span class="glyphicon glyphicon-menu-right"></span>
    @endif
    @foreach(array_keys($response['data_form']) as $id)
        @if(count($response['data_form']) == 1)
            <a href="#">('{{ $response['data_form'][$id]['pattern'.$id] }}')</a>
            <span class="badge">{{ $response['data_form'][$id]['count'.$id] }}</span>
        @elseif($id === array_first(array_keys($response['data_form'])))
            <a href="{{ url()->current() . '?' . $response['data_form'][$id]['url'.$id] }}">('{{ $response['data_form'][$id]['pattern' . $id] }}')</a>
            <span class="badge">{{ $response['data_form'][$id]['count' . $id] }}</span>
        @elseif($id === array_last(array_keys($response['data_form'])))
            <span>{{ $response['data_form'][$id]['operator' . $id] }}</span>
            <a href="#">('{{ $response['data_form'][$id]['pattern' . $id] }}')</a>
            <span class="badge">{{ $response['data_form'][$id]['count' . $id] }}</span>
        @else
            <span>{{ $response['data_form'][$id]['operator' . $id] }}</span>
            <a href="{{ url()->current() . '?' . $response['data_form'][$id]['url' . $id] }}">('{{ $response['data_form'][$id]['pattern' . $id] }}')</a>
            <span class="badge">{{ $response['data_form'][$id]['count' . $id] }}</span>
        @endif
    @endforeach
</blockquote>