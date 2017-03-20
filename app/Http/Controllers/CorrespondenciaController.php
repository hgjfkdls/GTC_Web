<?php

namespace App\Http\Controllers;

use App\Correspondencia;
use Illuminate\Http\Request;

class CorrespondenciaController extends Controller
{
    public function buscar(Request $request)
    {
        $patterns = [];
        unset($correspondencia);
        $i = 0;
        do {
            $column = 'c' . $i;
            $operator = 'o' . $i;
            $pattern = 'p' . $i;
            $url = 'u' . $i;
            if ($request->exists($column) && $request->exists($operator) && $request->exists($pattern) && $request->exists($url)) {
                $patterns[] = [
                    $column => $request[$column],
                    $operator => $request[$operator],
                    $pattern => $request[$pattern],
                    $url => (strcmp($request[$url], '#') == 0 ? $request->getQueryString() : $request[$url]),
                ];
                if ($i === 0) {
                    $correspondencia = Correspondencia::where($request[$column], 'LIKE', '%' . $request[$pattern] . '%');
                } else {
                    if ($request[$operator] === 'AND') {
                        $correspondencia = $correspondencia->where($request[$column], 'LIKE', '%' . $request[$pattern] . '%');
                    } else {
                        $correspondencia = $correspondencia->orWhere($request[$column], 'LIKE', '%' . $request[$pattern] . '%');
                    }
                }
            }
            $i++;
        } while ($request->exists($pattern));

        return view('modulos.correspondencia.view', [
            'correspondencia' => isset($correspondencia) ? $correspondencia->get() : null,
            'patterns' => $patterns,
        ]);
    }

    public function show_doc($id)
    {
        return view('modulos.correspondencia.actions.show_doc', ['id' => $id]);
    }

    public function show_txt($id)
    {
        return view('modulos.correspondencia.actions.show_txt', ['id' => $id]);
    }

    public function index()
    {
        return $this->buscar();
    }
}
