<div id="myModal" class="modal fade" role="document">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Etiquetar</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('filtro','Filtro') !!}
                    {!! Form::text('filtro', null, [
                    'class'=>'form-control',
                    'id' => 'modalInput',
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('etiqueta','Seleccion') !!}
                </div>
                @include('modulos.correspondencia.partials.tag_edit_select_list')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="modal-aceptar">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>

            {{ Form::open(['route' => ['etiquetador.store'], 'method' => 'POST', 'id' => 'form-etiquetar']) }}
            {{ method_field('POST') }}
            {{ Form::close() }}

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(document).on('click', '#modal-aceptar', function (e) {
            e.preventDefault();
            var form = $('#form-etiquetar');
            var url = form.attr('action');
            var obj = {
                'correspondencia': get_docs(),
                'etiquetas': get_tags_status()
            };
            form.serializeArray().forEach(function (item) {
                obj[item.name] = item.value;
            });
            $.ajax({
                'type': 'POST',
                'url': url,
                'data': obj,
                'dataType': 'json',
                'method': 'POST',
                'success': function (result) {
                    console.log(result);
                },
                'error': function () {
                    console.log('Failed')
                }
            });
        });

        $(document).on('click', 'table.tag-table input[type="checkbox"]', function () {
            var $this = $(this);
            var status = $this.data('status');
            status = (status ? status + 1 : 1) % 3;
            $this.data('status', status);
            var status = $this.data('status');
            if (status == 0) {
                $this.prop('checked', false);
                $this.prop('indeterminate', false);
            } else if (status == 1) {
                $this.prop('checked', false);
                $this.prop('indeterminate', true);
            } else if (status == 2) {
                $this.prop('checked', true);
                $this.prop('indeterminate', false);
            }
        });
    });
</script>