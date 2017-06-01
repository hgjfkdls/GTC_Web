<?php

namespace App\Http\Controllers;

use App\Correspondencia;
use Illuminate\Http\Request;

class CorrespondenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('active');
    }

    public function advanced_search(Request $request, $id_obra = 260)
    {
        $patterns = '';
        $data = [];
        $data_form = [];
        $per_page = 50;
        $current_page = $request->exists('page') ? $request['page'] : 1;
        $i = 0;
        do {
            $pattern = 'pattern' . $i;
            $operator = 'operator' . $i;
            $type = 'type' . $i; // PT | RE
            $ignore_case = 'ignore_case' . $i;
            $words = 'words' . $i;
            $count = 'count' . $i;
            $url = 'url' . $i;
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
                        $request[$ignore_case] == 'true' ? true : false,
                        $id_obra

                    );
                } else {
                    $data = Correspondencia::orWhereRegexContent(
                        $s_pattern,
                        substr($patterns, 1),
                        $i == 0 ? null : $data,
                        $request[$ignore_case] == 'true' ? true : false,
                        $id_obra
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
                'max_box' => 11,
            ],
            'request' => $request->getQueryString(),
            'data' => array_slice($data, ($current_page - 1) * $per_page, $per_page),
            'data_form' => $data_form,
            'patterns' => substr($patterns, 1),
            'id_obra' => $id_obra,
            'navbar' => 'search',
        ];
        return view('modulos.correspondencia.advanced_search', ['response' => $response]);
    }

    public function simple_search(Request $request, $id_obra = 260)
    {
        $data_form = [];
        $per_page = 50;
        $current_page = $request->exists('page') ? $request['page'] : 1;
        $i = 0;
        unset($data);
        do {
            $column = 'column' . $i;
            $operator = 'operator' . $i;
            $pattern = 'pattern' . $i;
            $count = 'count' . $i;
            $url = 'url' . $i;
            if (
                $request->exists($column) &&
                $request->exists($operator) &&
                $request->exists($pattern) &&
                $request->exists($url)
            ) {
                $aux = [
                    $column => $request[$column],
                    $operator => $request[$operator],
                    $pattern => $request[$pattern],
                    $count => $request[$count],
                    $url => (strcmp($request[$url], '#') == 0 ? $request->getQueryString() : $request[$url]),
                ];
                if ($i === 0) {
                    $data = Correspondencia::where(
                        'id_obra',
                        '=',
                        $id_obra
                    )->where(
                        $request[$column],
                        'LIKE',
                        '%' . $request[$pattern] . '%'
                    );
                } else {
                    if ($request[$operator] == 'AND') {
                        $data = $data->where(
                            $request[$column],
                            'LIKE',
                            '%' . $request[$pattern] . '%'
                        );
                    } else {
                        $data = $data->orWhere(
                            $request[$column],
                            'LIKE',
                            '%' . $request[$pattern] . '%'
                        )->where('id_obra', '=', $id_obra);
                    }
                }
                $aux[$count] = $request->exists($count) ? $request[$count] : count($data->get());
                $data_form[] = $aux;
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
                'max_box' => 11,
            ],
            'request' => $request->getQueryString(),
            'data' => isset($data) ? $data : null,
            'data_form' => $data_form,
            'id_obra' => $id_obra,
            'navbar' => 'search',
        ];
        return view('modulos.correspondencia.simple_search', ['response' => $response]);
    }

    public function temas(Request $request, $id_obra = 260)
    {
        return view('modulos.correspondencia.temas', ['response' => ['id_obra' => $id_obra, 'navbar' => 'temas']]);
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
