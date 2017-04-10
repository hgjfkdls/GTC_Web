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
                    'nombre' => 'Primer Tema',
                ]
            );
            DB::table('clasificacion')->insert(
                [
                    'id_usuario' => 0,
                    'nombre' => 'Segundo Tema',
                ]
            );
            DB::table('clasificacion')->insert(
                [
                    'id_usuario' => 0,
                    'nombre' => 'Tercer Tema',
                ]
            );
        }
    }
}
