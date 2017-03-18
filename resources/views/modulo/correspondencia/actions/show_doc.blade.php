@extends('modulo.base')
@section('modulo_content')
    <?php
    $rutaOrigen = DB::table('correspondencia')->where('id', '=', $id)->get()[0]->ruta_doc;
    $rutaDestino = 'C:/GTC_Web/public/temp/' . basename($rutaOrigen);
    $url = '/temp/' . basename($rutaOrigen);
    echo $rutaOrigen;
    echo '<br>';
    echo $rutaDestino;
    if (copy($rutaOrigen, $rutaDestino)) {
    ?>
    <script>
        $(document).ready(function () {
            window.location.replace('{{ URL::to($url) }}');
        });
    </script>
    <?php
    }
    else {
        echo 'Error de lectura';
    }
    ?>
@endsection