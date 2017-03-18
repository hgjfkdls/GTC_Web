{!! link_to_route('correspondencia.buscar', 'Buscar') !!}
@if(count($patterns) > 0)
    >
@endif
@foreach(array_keys($patterns) as $key)
    @if($key === array_first(array_keys($patterns)))
        <a href="{{ url()->current() . '?' . $patterns[$key]['u'.$key] }}">{{ $patterns[$key]['c'.$key] . '(\'' . $patterns[$key]['p'.$key] . '\')' }}</a>
    @elseif($key === array_last(array_keys($patterns)))
        <span>{{ $patterns[$key]['o'.$key] }}</span>
        <a href="#">{{ $patterns[$key]['c'.$key] . '(\'' . $patterns[$key]['p'.$key] . '\')' }}</a>
    @else
        <span>{{ $patterns[$key]['o'.$key] }}</span>
        <a href="{{ url()->current() . '?' . $patterns[$key]['u'.$key] }}">{{ $patterns[$key]['c'.$key] . '(\'' . $patterns[$key]['p'.$key] . '\')' }}</a>
    @endif
@endforeach