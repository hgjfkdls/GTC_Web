<?php

namespace App\Http\Controllers;

use App\Correspondencia;
use Illuminate\Http\Request;

class CorrespondenciaController extends Controller
{
    public function advanced_search(Request $request)
    {
        $patterns = '';
        $per_page = 20;
        $current_page = $request->exists('page') ? $request['page'] : 1;
        $data = [];
        $data_form = [];
        $i = 0;
        do {
            $pattern = 'pattern' . $i;
            $operator = 'operator' . $i;
            $type = 'type' . $i; // PT | RE
            $ignore_case = 'ignore_case' . $i;
            $words = 'words' . $i;
            $url = 'url' . $i;
            $count = 'count' . $i;
            if ($request->exists($pattern) && $request->exists($operator) && $request->exists($type) && $request->exists($url)) {
                $s_pattern = $request[$type] == 'PT' ? preg_quote($request[$pattern]) : $request[$pattern];
                $s_pattern = $request[$words] == 'true' ? '\b' . $s_pattern . '\b' : $s_pattern;
                $patterns .= '|' . $s_pattern;
                $aux = [
                    $pattern => $request[$pattern],
                    $operator => $request[$operator],
                    $type => $request[$type],
                    $ignore_case => $request[$ignore_case],
                    $url => (strcmp($request[$url], '#') == 0 ? $request->getQueryString() : $request[$url]),
                    $count => 0,
                ];
                if ($request[$operator] == 'AND') {
                    $data = Correspondencia::whereRegexContent(
                        $s_pattern,
                        substr($patterns, 1),
                        $i == 0 ? null : $data,
                        $request[$ignore_case] == 'true' ? true : false
                    );
                } else {
                    $data = Correspondencia::orWhereRegexContent(
                        $s_pattern,
                        substr($patterns, 1),
                        $i == 0 ? null : $data,
                        $request[$ignore_case] == 'true' ? true : false
                    );
                }
                $aux[$count] = $request->exists($count) ? $request[$count] : count($data);
                $data_form[] = $aux;
            }
            $i++;
        } while ($request->exists($pattern));
        $data_count = count($data);
        $response = [
            'pagination' => [
                'per_page' => $per_page,
                'current_page' => $current_page,
                'last_page' => ceil($data_count / $per_page),
                'max_box' => 5,
            ],
            'request' => $request->getQueryString(),
            'data_count' => $data_count,
            'data' => array_slice($data, ($current_page - 1) * $per_page, $per_page),
            'data_form' => $data_form,
            'patterns' => substr($patterns, 1),
        ];
        return view('modulos.correspondencia.advanced_search', ['response' => $response]);
    }

    public function simple_search(Request $request)
    {
        $per_page = 20;
        $current_page = $request->exists('page') ? $request['page'] : 1;
        $data_form = [];
        unset($data);
        $i = 0;
        do {
            $column = 'c' . $i;
            $operator = 'o' . $i;
            $pattern = 'p' . $i;
            $url = 'u' . $i;
            if ($request->exists($column) && $request->exists($operator) && $request->exists($pattern) && $request->exists($url)) {
                $data_form[] = [
                    $column => $request[$column],
                    $operator => $request[$operator],
                    $pattern => $request[$pattern],
                    $url => (strcmp($request[$url], '#') == 0 ? $request->getQueryString() : $request[$url]),
                ];
                if ($i === 0) {
                    $data = Correspondencia::where($request[$column], 'LIKE', '%' . $request[$pattern] . '%');
                } else {
                    if ($request[$operator] == 'AND') {
                        $data = $data->where($request[$column], 'LIKE', '%' . $request[$pattern] . '%');
                    } else {
                        $data = $data->orWhere($request[$column], 'LIKE', '%' . $request[$pattern] . '%');
                    }
                }
            }
            $i++;
        } while ($request->exists($pattern));
        $data_count = isset($data) ? $data->count() : 0;
        if (isset($data)) $data = $data->paginate($per_page);
        $response = [
            'pagination' => [
                'per_page' => $per_page,
                'current_page' => $current_page,
                'last_page' => ceil($data_count / $per_page),
                'max_box' => 5,
            ],
            'request' => $request->getQueryString(),
            'data_count' => $data_count,
            'data' => isset($data) ? $data : null,
            'data_form' => $data_form,
        ];
        return view('modulos.correspondencia.simple_search', ['response' => $response]);
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
