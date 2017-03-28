<blockquote>
    {!! link_to_route('correspondencia.simple_search', 'Busqueda Simple') !!}
    @if(count($response['data_form']) > 0)
        <span class="glyphicon glyphicon-menu-right"></span>
    @endif
    @foreach(array_keys($response['data_form']) as $key)
        @if(count($response['data_form']) == 1)
            <a href="#">{{ $response['data_form'][$key]['c'.$key] . '(\'' . $response['data_form'][$key]['p'.$key] . '\')' }}</a>
            <span class="badge">{{ $response['data_count'] }}</span>
        @elseif($key === array_first(array_keys($response['data_form'])))
            <a href="{{ url()->current() . '?' . $response['data_form'][$key]['u'.$key] }}">{{ $response['data_form'][$key]['c'.$key] . '(\'' . $response['data_form'][$key]['p'.$key] . '\')' }}</a>
        @elseif($key === array_last(array_keys($response['data_form'])))
            <span>{{ $response['data_form'][$key]['o'.$key] }}</span>
            <a href="#">{{ $response['data_form'][$key]['c'.$key] . '(\'' . $response['data_form'][$key]['p'.$key] . '\')' }}</a>
            <span class="badge">{{ $response['data_count'] }}</span>
        @else
            <span>{{ $response['data_form'][$key]['o'.$key] }}</span>
            <a href="{{ url()->current() . '?' . $response['data_form'][$key]['u'.$key] }}">{{ $response['data_form'][$key]['c'.$key] . '(\'' . $response['data_form'][$key]['p'.$key] . '\')' }}</a>
        @endif
    @endforeach
</blockquote>