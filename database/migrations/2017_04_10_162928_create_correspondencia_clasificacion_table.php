<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrespondenciaClasificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('correspondencia_clasificacion')) {
            Schema::create('correspondencia_clasificacion', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_clasificacion')->nullable();
                $table->integer('id_correspondencia')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('correspondencia_clasificacion');
    }
}
