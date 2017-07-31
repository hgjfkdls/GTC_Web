<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('active');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = collect([
            [
                'name' => 'Control de Documentación',
                'icon' => 'glyphicon glyphicon-file',
                'data' => [
                    [
                        'name' => 'Correspondencia',
                    ],
                    [
                        'name' => 'Presupuestos',
                    ]
                ],
                'active' => true
            ],
            [
                'name' => 'Documentos Contractuales',
                'icon' => 'glyphicon glyphicon-bookmark',
                'data' => [
                    ['name' => 'Bases de Licitación'],
                ],
            ],
            [
                'name' => 'Reclamaciones',
                'icon' => 'glyphicon glyphicon-book',
                'data' => [],
            ],
        ]);
        return view('master_home')->with("menu", $menu);
    }
}
