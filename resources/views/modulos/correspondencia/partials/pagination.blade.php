@if(isset($response['pagination']))
    @if($response['pagination']['last_page'] > 1)
        <div class="text-center">
            <ul class="pagination pagination-sm">
                <?php
                $ceil = ceil($response['pagination']['max_box'] / 2);
                $inicio = $response['pagination']['current_page'] > $ceil ?
                    $response['pagination']['current_page'] - $ceil + 1 :
                    1;
                $fin = $inicio + $response['pagination']['max_box'] - 1;
                $fin = $fin > $response['pagination']['last_page'] ? $response['pagination']['last_page'] : $fin;
                $inicio = $fin - $response['pagination']['max_box'] + 1;
                $inicio = $inicio < 1 ? 1 : $inicio;
                ?>
                <li class="{{ $response['pagination']['current_page'] == 1 ? 'disabled' : '' }}">
                    <a href="{{ preg_replace('/&page=\d+/', '', url()->current() . '?' . $response['request']) . '&page=1' }}">«</a>
                </li>
                @if($inicio > 1)
                    <li>
                        <a href="{{ preg_replace('/&page=\d+/', '', url()->current() . '?' . $response['request']) . '&page=1' }}">
                            1
                        </a>
                    </li>
                    <li class="disabled">
                        <a href="#">...</a>
                    </li>
                @endif
                @for($i = $inicio; $i <= $fin; $i++)
                    <li class="{{ $i == $response['pagination']['current_page'] ? 'active' : '' }}">
                        <a href="{{ preg_replace('/&page=\d+/', '', url()->current() . '?' . $response['request']) . '&page=' . $i }}">{{ $i }}</a>
                    </li>
                @endfor
                @if($fin < $response['pagination']['last_page'])
                    <li class="disabled">
                        <a href="#">...</a>
                    </li>
                    <li>
                        <a href="{{ preg_replace('/&page=\d+/', '', url()->current() . '?' . $response['request']) . '&page=' . $response['pagination']['last_page'] }}">
                            {{ $response['pagination']['last_page']  }}
                        </a>
                    </li>
                @endif
                <li class="{{ $response['pagination']['current_page'] == $response['pagination']['last_page'] ? 'disabled' : '' }}">
                    <a href="{{ preg_replace('/&page=\d+/', '', url()->current() . '?' . $response['request']) . '&page=' . $response['pagination']['last_page'] }}">»</a>
                </li>
            </ul>
        </div>
    @endif
@endif


