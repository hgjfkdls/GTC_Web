@extends('modulos.base')
@section('modulo_navbar')
    @include('modulos.correspondencia.partials.navbar')
@endsection
@section('modulo_content')
    <div class="row">
        <div class="col-sm-3">
            <div class="well">
                <div class="tag-container" data-id_padre="">
                    @if(isset($response['data']))
                        @include('modulos.correspondencia.partials.tag_row', ['tags' => $response['data']])
                    @endif
                </div>
                <div class="btn-group btn-group-sm">
                    <div class="btn btn-success glyphicon glyphicon-plus" id="tag-store"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="well">
                Lista de Documentos Etiquetados
            </div>
        </div>
    </div>

    {{ Form::open(['route' => ['etiqueta.show', ':TAG_ID'], 'method' => 'GET', 'id' => 'form-show']) }}
    {{ method_field('GET') }}
    {{ Form::close() }}

    {{ Form::open(['route' => ['etiqueta.update', ':TAG_ID'], 'method' => 'PUT', 'id' => 'form-update']) }}
    {{ method_field('PUT') }}
    {{ Form::close() }}

    {{ Form::open(['route' => ['etiqueta.store'], 'method' => 'POST', 'id' => 'form-store']) }}
    {{ method_field('POST') }}
    {{ Form::close() }}

    {{ Form::open(['route' => ['etiqueta.destroy', ':TAG_ID'], 'method' => 'DELETE', 'id' => 'form-destroy']) }}
    {{ method_field('DELETE') }}
    {{ Form::close() }}

@endsection
@section('script')
    <script>
        $(document).ready(function () {

            // se ejecuta cuando se presiona la etiqueta, pregunta si tiene etiquetas hijas y las carga si existen
            $(document).on('click', 'div.tag', function () {
                var table = $(this).parents('table');
                var id_padre = table.data('id');
                var level = parseInt(table.parents('div.tag-container').data('level'));
                var container = $('div.tag-container[data-id_padre="' + id_padre + '"]');
                if (container.length) {
                    container.remove();
                } else {
                    tag_show(id_padre, function (result) {
                        table.after('<div class="tag-container" data-id_padre="' + id_padre + '"></div>');
                        $('div.tag-container[data-id_padre="' + id_padre + '"]').append(result);
                    });
                }
            });

            // keypress enter en el cuadro de texto para cambiar el nombre de la tag
            $(document).on('keypress', 'input.tag-name', function (e) {
                var input = $(this);
                var nombre = input.val().trim();
                if (e.keyCode == 13 && nombre !== '') {
                    var id = input.parents('table.tag-table').data('id');
                    tag_update(id, {'nombre': nombre}, function (result) {
                        var table = input.parents('table.tag-table');
                        var expandido = table.hasClass('expandido');
                        console.log(expandido);
                        table.replaceWith(result);
                    });
                }
            });

            // añade una sub etiqueta
            $(document).on('click', 'a.tag-addSubtag', function (e) {
                e.preventDefault();
                var table = $(this).parents('table.tag-table');
                var id_padre = table.data('id');
                var level = parseInt(table.parents('div.tag-container').data('level'));
                tag_add(id_padre, function (result) {
                    var container = $('div.tag-container[data-id_padre="' + id_padre + '"]');
                    if (container.length) {
                        container.append(result);
                    } else {
                        tag_show(id_padre, function (result) {
                            table.after('<div class="tag-container" data-id_padre="' + id_padre + '"></div>');
                            $('div.tag-container[data-id_padre="' + id_padre + '"]').append(result);
                        });
                    }
                });
            });

            // eliminar una tag especifico
            $(document).on('click', 'a.tag-destroy', function (e) {
                e.preventDefault();
                var table = $(this).parents('table');
                tag_destroy(table.data('id'), function () {
                    table.remove();
                });
            });

            // crear una nueva tag
            $(document).on('click', 'div#tag-store', function () {
                tag_add(null, function (result) {
                    $('div.tag-container[data-id_padre=""]').append(result)
                });
            });
        });

        function tag_show(id_padre, callBack) {
            var form = $('#form-show');
            var url = form.attr('action').replace(':TAG_ID', id_padre);
            var data = form.serialize();
            $.post(url, data, callBack);
        }

        function tag_add(id_padre, callBack) {
            var form = $('#form-store');
            var url = form.attr('action');
            var obj = {
                'id_obra': {{ $response['id_obra'] }},
                'nombre': 'Nueva Etiqueta',
                'id_padre': id_padre
            };
            var data = form.serialize() + '&' + Object.keys(obj).map(function (key) {
                    return encodeURIComponent(key) + '=' + encodeURIComponent(obj[key]);
                }).join('&');
            $.post(url, data, callBack);
        }

        function tag_update(id, obj, callBack) {
            var form = $('#form-update');
            var url = form.attr('action').replace(':TAG_ID', id);
            var data = form.serialize() + '&' + Object.keys(obj).map(function (key) {
                    return encodeURIComponent(key) + '=' + encodeURIComponent(obj[key]);
                }).join('&');
            $.post(url, data, callBack);
        }

        function tag_destroy(id, callBack) {
            var form = $('#form-destroy');
            var url = form.attr('action').replace(':TAG_ID', id);
            var data = form.serialize();
            $.post(url, data, callBack);
        }

    </script>
@endsection