@if($response['pagination']['last_page'] > 1)
    <div class="text-center">
        <ul class="pagination pagination-sm">
            <li class="{{ $response['pagination']['current_page'] == 1 ? 'disabled' : '' }}">
                <a href="{{ preg_replace('/&page=\d+/', '', url()->current() . '?' . $request) . '&page=1' }}">«</a>
            </li>
            @for($i = 1; $i <= $response['pagination']['last_page']; $i++)
                <li class="{{ $i == $response['pagination']['current_page'] ? 'active' : '' }}">
                    <a href="{{ preg_replace('/&page=\d+/', '', url()->current() . '?' . $request) . '&page=' . $i }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="{{ $response['pagination']['current_page'] == $response['pagination']['last_page'] ? 'disabled' : '' }}">
                <a href="{{ preg_replace('/&page=\d+/', '', url()->current() . '?' . $request) . '&page=' . $response['pagination']['last_page'] }}">»</a>
            </li>
        </ul>
    </div>
@endif


