@extends('master')
@section('modulo')
    <?php
    try {
    if ($id != null) {
        $rutaOrigen = DB::table('correspondencia')->where('id', '=', $id)->get()[0]->ruta_doc;
    } elseif ($codigo != null) {
        $rutaOrigen = DB::table('correspondencia')->where('codigo', '=', $codigo)->get()[0]->ruta_doc;
    } else {

    }
    $filename = str_replace("%", "", basename($rutaOrigen));
    //$filename = basename($rutaOrigen);

    $rutaDestino = 'c:/GTC_Web/public/temp/' . $filename;
    $url = '/temp/' . $filename;
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
        <p>El documento <strong>[{{ basename($rutaOrigen) }}]</strong> no puede ser cargado, contactese con el
            administrador.</p>
    </div>
    <?php
    }
    ?>
@endsection