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
                'name' => 'Proyecto',
                'icon' => 'glyphicon glyphicon-home',
                'data' => [
                    [
                        'name' => 'Información General',
                        'icon' => 'glyphicon glyphicon-info-sign',
                        'active' => true,
                    ],
                ],
            ],
            [
                'name' => 'Control de Documentación',
                'icon' => 'glyphicon glyphicon-file',
                'data' => [
                    [
                        'name' => 'Correspondencia',
                        'icon' => 'glyphicon glyphicon-envelope',
                    ],
                    [
                        'name' => 'Presupuestos',
                        'icon' => 'glyphicon glyphicon-usd'
                    ]
                ],
            ],
            [
                'name' => 'Documentos Contractuales',
                'icon' => 'glyphicon glyphicon-bookmark',
                'data' => [
                    [
                        'name' => 'Proceso de Licitación',
                        'icon' => 'glyphicon glyphicon-folder-open',
                    ],
                    [
                        'name' => 'Proceso de Adjudicación',
                        'icon' => 'glyphicon glyphicon-folder-open',
                    ],
                    [
                        'name' => 'Ejecución',
                        'icon' => 'glyphicon glyphicon-folder-open',
                    ],
                    [
                        'name' => 'Modificación de Obras y Convenios',
                        'icon' => 'glyphicon glyphicon-folder-open',
                    ],
                    [
                        'name' => 'Otros Decretos y Resoluciones',
                        'icon' => 'glyphicon glyphicon-folder-open',
                    ],
                    [
                        'name' => 'Otros Documentos',
                        'icon' => 'glyphicon glyphicon-folder-open',
                    ],
                ],
            ],
            [
                'name' => 'Reclamaciones',
                'icon' => 'glyphicon glyphicon-book',
                'data' => [
                    [
                        'name' => 'Resumen',
                        'data' => [
                            [
                                'name' => 'hola',
                            ]
                        ],
                    ],
                    [
                        'name' => 'Resumen 1',
                        'data' => [
                            [
                                'name' => 'hola1',
                            ]
                        ],
                    ]
                ],
            ],
        ]);
        return view('master_home')->with("menu", $menu);
    }
}
