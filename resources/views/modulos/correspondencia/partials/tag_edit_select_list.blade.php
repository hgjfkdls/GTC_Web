<div class="well">
    <div><b>Etiquetas</b></div>
    <br>
    <div class="tag-container" id="tag-container" data-id_padre="">
    </div>
    <div class="btn-group btn-group-sm">
        <div class="btn btn-success glyphicon glyphicon-plus" id="tag-store"></div>
    </div>
</div>

{{ Form::open(['route' => ['etiqueta.show', ':TAG_ID'], 'method' => 'GET', 'id' => 'form-show']) }}
{{ method_field('GET') }}
{{ Form::close() }}

{{ Form::open(['route' => ['etiqueta.index'], 'method' => 'GET', 'id' => 'form-index']) }}
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

<script>
    $(document).ready(function () {
        $('#tag-container').tagContainer('#form-index', {{ isset($response) ? $response['id_obra'] : 260 }});
    });
</script>