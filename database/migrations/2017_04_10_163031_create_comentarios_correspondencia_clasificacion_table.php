<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosCorrespondenciaClasificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('comentarios_correspondencia_clasificacion')) {
            Schema::create('comentarios_correspondencia_clasificacion', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_correspondencia_clasificacion')->nullable();
                $table->integer('id_usuario')->nullable();
                $table->string('contenido', 600)->nullable();
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
        Schema::dropIfExists('comentarios_correspondencia_clasificacion');
    }
}
