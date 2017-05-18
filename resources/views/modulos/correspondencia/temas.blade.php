@extends('modulos.base')
@section('modulo_navbar')
    @include('modulos.correspondencia.partials.navbar')
@endsection
@section('modulo_content')
    <div class="row">
        <div class="col-sm-4">
            @include('modulos.correspondencia.partials.tag_edit_select_list')
        </div>
        <div class="col-sm-8">
            <div class="well" id="docs-container">
            </div>
        </div>
    </div>

    {{ Form::open(['route' => ['etiquetador.index'], 'method' => 'GET', 'id' => 'form-etiquetador-index']) }}
    {{ method_field('GET') }}
    {{ Form::close() }}

@endsection
@section('script')
    <script>
        $(document).ready(function () {

            var container = $('div#docs-container');
            var form = $('#form-etiquetador-index');
            var url = form.attr('action');
            var obj = {
                'etiquetas': get_tags_checked()
            };
            form.serializeArray().forEach(function (item) {
                obj[item.name] = item.value;
            });
            $.ajax({
                'type': 'GET',
                'url': url,
                'data': obj,
                'dataType': 'json',
                'method': 'GET',
                'success': function (result) {
                    container.empty();
                    container.append(result.view);
                },
                'error': function () {
                }
            });

            $(document).on('change', 'input.tag-checkbox[type="checkbox"]', function (e) {
                e.preventDefault();
                var container = $('div#docs-container');
                var form = $('#form-etiquetador-index');
                var url = form.attr('action');
                var obj = {
                    'etiquetas': get_tags_checked()
                };
                form.serializeArray().forEach(function (item) {
                    obj[item.name] = item.value;
                });
                $.ajax({
                    'type': 'GET',
                    'url': url,
                    'data': obj,
                    'dataType': 'json',
                    'method': 'GET',
                    'success': function (result) {
                        container.empty();
                        container.append(result.view);
                    },
                    'error': function () {
                    }
                });
            });
        });
    </script>
@endsection