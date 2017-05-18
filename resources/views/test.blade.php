<?php
        $d = \App\Etiquetador::all();
        foreach ($d as $item) {
            print_r($item->tojson());
            echo '<hr>';
        }