<?php

namespace App\Http\Controllers;

use App\Correspondencia;
use Illuminate\Http\Request;

class CorrespondenciaController extends Controller
{
    public function buscar(Request $request)
    {
        $per_page = 20;
        $current_page = $request->exists('page') ? $request['page'] : 1;
        $search_options = [];
        unset($correspondencia);
        $i = 0;
        do {
            $column = 'c' . $i;
            $operator = 'o' . $i;
            $pattern = 'p' . $i;
            $url = 'u' . $i;
            if ($request->exists($column) && $request->exists($operator) && $request->exists($pattern) && $request->exists($url)) {
                $search_options[] = [
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

        $data_count = isset($correspondencia) ? $correspondencia->count() : 0;

        if (isset($correspondencia)) $correspondencia = $correspondencia->paginate($per_page);

        $response = [
            'pagination' => [
                'per_page' => $per_page,
                'current_page' => $current_page,
                'last_page' => ceil($data_count / $per_page),
            ],
            'data_count' => $data_count,
            'data' => isset($correspondencia) ? $correspondencia : null
        ];

        return view('modulos.correspondencia.view', [
            'request' => $request->getQueryString(),
            'response' => $response,
            'patterns' => $search_options,
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
