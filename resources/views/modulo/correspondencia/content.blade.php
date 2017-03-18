@include('modulo.correspondencia.partials.simple_search', ['patterns' => $patterns])
<div class="container-fluid bg-success">
    coincidenacias: {{ isset($correspondencia) ? $correspondencia->count() : 0 }}</div>
@include('modulo.correspondencia.partials.table', ['correspondencia' => $correspondencia])