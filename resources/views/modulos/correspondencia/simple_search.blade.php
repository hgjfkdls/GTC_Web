@extends('modulos.base')
@section('modulo_navbar')
    @include('modulos.correspondencia.partials.navbar')
@endsection
@section('modulo_content')
    @include('modulos.correspondencia.partials.simple_search_form')
    @include('modulos.correspondencia.partials.pagination')
    @include('modulos.correspondencia.partials.simple_table')
    @include('modulos.correspondencia.partials.pagination')
    @include('modulos.correspondencia.partials.etiqueta_modal')
@endsection
@section('script')
    <script>
        $(document).ready(function () {

            $(document).on('click', 'a.tags-etiquetar', function (e) {
                e.preventDefault();
                $('#myModal').modal({'keyboard': true});
                console.log('etiquetar seleccion: ' + JSON.stringify(get_idArray()));
            });

            $(document).on('click', 'a.tags-descargar', function (e) {
                e.preventDefault();
                id_arr = [];
                $('input.tag-checkbox:checked').each(function () {
                    id_arr.push($(this).parents('tr').data('id'));
                });
                console.log('descargar seleccion: ' + JSON.stringify(id_arr));
            });

            $(document).on('click', 'a.tag-etiquetar', function (e) {
                e.preventDefault();
                var id = $(this).parents('tr').data('id');
                $('#myModal').modal({'keyboard': true});
                console.log('etiquetar: ' + JSON.stringify([id]));
            });

            $(document).on('click', 'a.tag-descargar', function (e) {
                e.preventDefault();
                var id = $(this).parents('tr').data('id');
                console.log('descargar: ' + id);
            });

            $(document).on('change', 'input.tag-checkbox', function (e) {
                var id = $(this).parents('tr').data('id');
                var checked = $(this).prop('checked');
                var tags_checkbox = $('input.tags-checkbox');
                var countChecked = $('input.tag-checkbox:checked').length;
                if (countChecked == 0) {
                    tags_checkbox.prop('checked', false);
                    tags_checkbox.prop('indeterminate', false);
                } else if (countChecked < 50) {
                    tags_checkbox.prop('checked', false);
                    tags_checkbox.prop('indeterminate', true);
                } else {
                    tags_checkbox.prop('checked', 'true');
                    tags_checkbox.prop('indeterminate', false);
                }
            });

            $(document).on('change', 'input.tags-checkbox', function (e) {
                var checked = $(this).prop('checked');
                $('input.tag-checkbox').prop('checked', checked);
            });

            $('#myModal').on('shown.bs.modal', function () {
                $('#myModalInput').focus()
            })

        });

        function get_idArray() {
            var id_arr = [];
            $('input.tag-checkbox:checked').each(function () {
                id_arr.push($(this).parents('tr').data('id'));
            });
            return id_arr;
        }
    </script>
@endsection