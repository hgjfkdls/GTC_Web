<?php

namespace App\Http\Controllers;

use App\Clasificacion;
use App\Correspondencia;
use App\Etiquetador;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class EtiquetadorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('active');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $response = ['data' => collect()];
            if ($request->exists('etiquetas')) {
                $data = collect();
                foreach ($request['etiquetas'] as $item) {
                    $data = $data->merge(Clasificacion::find($item['id'])->documentos);
                }
                $response = ['data' => $data->unique('id')->all()];
            }
            return ['view' => view()->make('modulos.correspondencia.partials.simple_table', ['response' => $response])->render()];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->ajax()) {
            $correspondencia = $request['correspondencia'];
            $etiquetas = $request['etiquetas'];
            foreach ($correspondencia as $doc) {
                foreach ($etiquetas as $et) {
                    switch ($et['status']) {
                        case 0:
                            Etiquetador::where(['id_correspondencia' => $doc['id'], 'id_clasificacion' => $et['id']])->delete();
                            break;
                        case 1:
                            break;
                        case 2:
                            Etiquetador::updateOrCreate(['id_correspondencia' => $doc['id'], 'id_clasificacion' => $et['id']]);
                            break;
                        default:
                            break;
                    }
                }
            }
            return response()->json([
                'documentos' => $correspondencia,
                'etiquetas' => $etiquetas,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
