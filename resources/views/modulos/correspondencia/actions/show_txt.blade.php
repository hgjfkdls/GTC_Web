@extends('master')
@section('modulo')
    <?php
    try {
    $rutaOrigen = DB::table('correspondencia')->where('id', '=', $id)->get()[0]->ruta_txt;
    $rutaDestino = '/home/alvaro/GTC_Web/public/temp/' . basename($rutaOrigen);
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
    <div class="alert alert-danger">
        <h3>Error</h3>
        <hr>
        <p>El documento <strong>[{{ basename($rutaOrigen) }}]</strong> no puede ser cargado, contactese con el administrador.</p>
    </div>
    <?php
    }
    ?>
@endsection