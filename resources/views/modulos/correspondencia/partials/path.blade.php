<blockquote>
    {!! link_to_route('correspondencia.buscar', 'Busqueda Simple') !!}
    @if(count($patterns) > 0)
        <span class="glyphicon glyphicon-menu-right"></span>
    @endif
    @foreach(array_keys($patterns) as $key)
        @if(count($patterns) === 1)
            <a href="#">{{ $patterns[$key]['c'.$key] . '(\'' . $patterns[$key]['p'.$key] . '\')' }}</a>
            <span class="badge">{{ $response['data_count'] }}</span>
        @elseif($key === array_first(array_keys($patterns)))
            <a href="{{ url()->current() . '?' . $patterns[$key]['u'.$key] }}">{{ $patterns[$key]['c'.$key] . '(\'' . $patterns[$key]['p'.$key] . '\')' }}</a>
        @elseif($key === array_last(array_keys($patterns)))
            <span>{{ $patterns[$key]['o'.$key] }}</span>
            <a href="#">{{ $patterns[$key]['c'.$key] . '(\'' . $patterns[$key]['p'.$key] . '\')' }}</a>
            <span class="badge">{{ $response['data_count'] }}</span>
        @else
            <span>{{ $patterns[$key]['o'.$key] }}</span>
            <a href="{{ url()->current() . '?' . $patterns[$key]['u'.$key] }}">{{ $patterns[$key]['c'.$key] . '(\'' . $patterns[$key]['p'.$key] . '\')' }}</a>
        @endif
    @endforeach
</blockquote>