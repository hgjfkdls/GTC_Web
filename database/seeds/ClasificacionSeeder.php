<?php

use Illuminate\Database\Seeder;

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
            DB::table('clasificacion')->delete();
            DB::table('clasificacion')->insert(
                [
                    'id_usuario' => 0,
                    'nombre' => '1. Primer Tema',
                ]
            );
            DB::table('clasificacion')->insert(
                [
                    'id_usuario' => 0,
                    'nombre' => '2. Segundo Tema',
                ]
            );
            DB::table('clasificacion')->insert(
                [
                    'id_usuario' => 0,
                    'nombre' => '3. Tercer Tema',
                ]
            );
            DB::table('clasificacion')->insert(
                [
                    'id_padre' => 1,
                    'id_usuario' => 0,
                    'nombre' => '1.1. Hola',
                ]
            );
        }
    }
}
