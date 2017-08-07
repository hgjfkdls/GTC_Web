<div class="row">
    <div class="col-md-12">
        <select class="form-control input-sm" style="background-color: #777; color: #fff; margin-bottom: 10px;">
            <option>190. Alternativas de Acceso a Iquique</option>
            <option>230. La Serena - Vallenar</option>
            <option>260. La Serena - Ovalle</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <ul class="gtc-menu">
            @foreach(isset($menu) ? $menu : [] as $item)
                @include('menu_item', ['item' => $item])
            @endforeach
        </ul>
    </div>
</div>