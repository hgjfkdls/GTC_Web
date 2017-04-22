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
                <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>