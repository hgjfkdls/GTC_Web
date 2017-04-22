<?php

namespace App\Http\Controllers;

use App\Clasificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClasificacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request, $id_obra = 260)
    {
        if ($request->ajax()) {
            $tags = Clasificacion::where(
                'id_usuario',
                Auth::id()
            )->where(
                'id_obra',
                $request->exists('id_obra') ? $request['id_obra'] : $id_obra
            )->where(
                'id_padre', null
            );
            if (count($tags->get()) > 0) {
                return $this->getTagRowsView($this->getHasChildrens($tags->get()));
            }
        } else {
            $data = Clasificacion::where(
                'id_usuario',
                Auth::id()
            )->where(
                'id_obra',
                $id_obra
            )->where(
                'id_padre',
                null
            )->get();
            return view(
                'modulos.correspondencia.temas',
                ['response' => [
                    'data' => $data,
                    'id_obra' => $id_obra,
                    'id_usuario' => Auth::id(),
                    'navbar' => 'temas',
                ]]
            );
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
            $id = Clasificacion::insertGetId([
                'id_padre' => $request['id_padre'] == 'null' ? null : intval($request['id_padre']),
                'id_usuario' => Auth::id(),
                'id_obra' => $request['id_obra'],
                'nombre' => $request['nombre'],
                'created_at' => date_create(),
                'updated_at' => date_create(),
            ]);
            return $this->getTagRowView($id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $tags = Clasificacion::where('id_padre', $id);
        if ($request->ajax() && count($tags->get()) > 0) {
            return $this->getTagRowsView($this->getHasChildrens($tags->get()));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
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
        if ($request->ajax()) {
            if ($request->exists('nombre')) {
                $row = Clasificacion::where('id', $id);
                $row->update(['nombre' => $request['nombre']]);
                return $this->getTagRowsView($this->getHasChildrens($row->get()));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        if ($request->ajax()) {
            Clasificacion::where('id', '=', $id)->delete();
        }
    }

    private function getTagRowView($id)
    {
        return view()->make(
            'modulos.correspondencia.partials.tag_row',
            [
                'tags' => Clasificacion::where('id', $id)->get(),
                'level' => $this->getLevel($id, 0),
            ]
        )->render();
    }

    private function getTagRowsView($tags)
    {
        return view()->make(
            'modulos.correspondencia.partials.tag_row',
            [
                'tags' => $tags,
                'level' => $this->getLevel($tags[0]->id, 0),
            ]
        )->render();
    }

    private function getLevel($id, $level)
    {
        $tag = Clasificacion::where('id', $id)->get()[0];
        if (is_null($tag->id_padre)) return $level;
        return $this->getLevel($tag->id_padre, $level + 1);
    }

    private function getHasChildrens($data)
    {
        $tags = [];
        foreach ($data as $tag) {
            $tag['hasChildrens'] = (count(Clasificacion::where('id_padre', $tag['id'])->get()) > 0);
            $tags[] = $tag;
        }
        return $tags;
    }
}
