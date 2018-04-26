@if(isset($item))
    <li class="{{ isset($item['active']) ? ($item['active'] ? 'active' : '') : '' }}">
        <a href="{{ isset($item['href']) ? $item['href'] : '#!' }}">
            <span class="{{ isset($item['icon']) ? $item['icon'] : '' }}"></span>&nbsp;
            {{ isset($item['name']) ? $item['name'] : '' }}
            @if(isset($item['data']) && count($item['data']) > 0 )
                <span class="glyphicon glyphicon-chevron-right pull-right"></span>
            @endif
        </a>
        @if(isset($item['data']))
            <ul>
                @foreach($item['data'] as $subitem)
                    @include('menu_item', ['item' => $subitem])
                @endforeach
            </ul>
        @endif
    </li>
@endif