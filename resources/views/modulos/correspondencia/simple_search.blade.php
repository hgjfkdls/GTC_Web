@extends('modulos.base')
@section('modulo_navbar')
    @include('modulos.correspondencia.partials.navbar')
@endsection
@section('modulo_content')
    @include('modulos.correspondencia.partials.simple_search_form')
    @include('modulos.correspondencia.partials.pagination')
    @include('modulos.correspondencia.partials.simple_table')
    @include('modulos.correspondencia.partials.pagination')

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Etiquetar</h4>
                </div>
                <div class="modal-body">
                    <p>Contenido</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

        </div>
    </div>
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