@extends('master')
@section('modulo')
    <?php
    try {
    $rutaOrigen = DB::table('correspondencia')->where('id', '=', $id)->get()[0]->ruta_doc;
    $rutaDestino = 'C:/GTC_Web/public/temp/' . basename($rutaOrigen);
    $url = '/temp/' . basename($rutaOrigen);
    if (copy($rutaOrigen, $rutaDestino)) {?>
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
    } catch (Exception $e) {?>
    <blockquote class="alert-danger">Error: El documento no puede ser cargado, contactese con el administrador.</blockquote>
    <?php
    }
    ?>
@endsection