<?php

namespace App\Http\Controllers;

use App\Correspondencia;
use Illuminate\Http\Request;

class CorrespondenciaController extends Controller
{
    public function advanced_search(Request $request)
    {
        $data = [];
        $i = 0;
        if ($request->exists('pattern')) {
            foreach (Correspondencia::all() as $row) {
                if (file_exists($row->ruta_txt)) {
                    $file = fopen($row->ruta_txt, 'r');
                    $str_file = fread($file, filesize($row->ruta_txt));
                    $str_file = preg_replace('/[^\w\.\-\n:,; \t]/', '', $str_file);
                    $txt = preg_replace('/[^\w\.\-\n:,; \t' . utf8_encode('áäàâéëèêíïìîóöòôúüùû') . ']/im', '', utf8_encode($str_file));
                    $matches = [];
                    if (preg_match_all('/^.*(' . $request['pattern'] . ').*$/im', $txt, $matches)) {
                        $data[] = ['data' => $row, 'matches' => $matches];
                        $i++;
                    }
                    fclose($file);
                    if ($i > 99) break;
                }
            }
        }

        $response = [
            'data' => $data,
            'pattern' => $request['pattern'],
        ];
        return view('modulos.correspondencia.advanced_search', ['response' => $response]);
    }

    public function simple_search(Request $request)
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

        return view('modulos.correspondencia.simple_search', [
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
        return $this->simple_search();
    }
}
