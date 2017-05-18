@extends('modulos.base')
@section('modulo_navbar')
    @include('modulos.correspondencia.partials.navbar')
@endsection
@section('modulo_content')
    @include('modulos.correspondencia.partials.simple_search_form')
    @include('modulos.correspondencia.partials.pagination')
    @include('modulos.correspondencia.partials.simple_table')
    @include('modulos.correspondencia.partials.pagination')
    @if(Auth::check())
        @include('modulos.correspondencia.partials.etiqueta_modal')
    @endif
@endsection
@section('script')
    <script>
        $(document).ready(function () {

            $('[data-toggle="popover"]').popover();

            $(document).on('click', 'a.tags-etiquetar', function (e) {
                e.preventDefault();
                $('#myModal').data('id', null);
                var arr = get_docs();
                if (arr.length > 0) $('#myModal').modal({'keyboard': true});
                console.log('etiquetar seleccion: ', arr);
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
                $('#myModal').data('id', id);
                $('#myModal').modal({'keyboard': true});
                console.log('etiquetar: ', [id]);
            });

            $(document).on('click', 'a.tag-descargar', function (e) {
                e.preventDefault();
                var id = $(this).parents('tr').data('id');
                console.log('descargar: ' + id);
            });

            $(document).on('change', 'input.doc-checkbox[type="checkbox"]', function (e) {
                e.preventDefault();
                var id = $(this).parents('tr').data('id');
                var checked = $(this).prop('checked');
                var docs_checkbox = $('input.docs-checkbox[type="checkbox"]');
                var countChecked = $('input.doc-checkbox[type="checkbox"]:checked').length;
                if (countChecked == 0) {
                    docs_checkbox.prop('checked', false);
                    docs_checkbox.prop('indeterminate', false);
                } else if (countChecked < 50) {
                    docs_checkbox.prop('checked', false);
                    docs_checkbox.prop('indeterminate', true);
                } else {
                    docs_checkbox.prop('checked', 'true');
                    docs_checkbox.prop('indeterminate', false);
                }
            });

            $(document).on('change', 'input.docs-checkbox[type="checkbox"]', function (e) {
                var checked = $(this).prop('checked');
                $('input.doc-checkbox[type="checkbox"]').prop('checked', checked);
            });

            $('#myModal').on('shown.bs.modal', function () {
                $('#modalInput').focus();
            })
        });
    </script>
@endsection