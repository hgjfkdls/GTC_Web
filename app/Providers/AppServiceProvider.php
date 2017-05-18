<?php

namespace App\Providers;

use App\Clasificacion;
use App\Etiquetador;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Clasificacion::deleting(function (Clasificacion $clasificacion) {
            foreach ($clasificacion->hijas()->cursor() as $item){
                $item->delete();
            }
            Etiquetador::where('id_clasificacion', $clasificacion->id)->delete();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
