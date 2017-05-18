<?php

use Illuminate\Database\Seeder;
use App\Clasificacion;

class ClasificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Schema::hasTable('clasificacion')) {
            Clasificacion::truncate();
            Clasificacion::create([
                'id_obra' => 260,
                'id_usuario' => 1,
                'nombre' => "Etiqueta 1",
            ]);
            Clasificacion::create([
                'id_obra' => 260,
                'id_usuario' => 1,
                'nombre' => "Etiqueta 2",
            ]);
            Clasificacion::create([
                'id_obra' => 260,
                'id_usuario' => 1,
                'nombre' => "Etiqueta 3",
            ]);
            Clasificacion::create([
                'id_padre' => 1,
                'id_obra' => 260,
                'id_usuario' => 1,
                'nombre' => "Etiqueta 1.1",
            ]);
            Clasificacion::create([
                'id_padre' => 1,
                'id_obra' => 260,
                'id_usuario' => 1,
                'nombre' => "Etiqueta 1.2",
            ]);
            Clasificacion::create([
                'id_padre' => 4,
                'id_obra' => 260,
                'id_usuario' => 1,
                'nombre' => "Etiqueta 1.1.1",
            ]);
        }
    }
}
