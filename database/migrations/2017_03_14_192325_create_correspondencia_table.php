<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrespondenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('correspondencia')) {
            Schema::create('correspondencia', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_obra')->default(0);
                $table->string('codigo', 50)->nullable();
                $table->dateTime('fecha_emisor')->nullable();
                $table->dateTime('fecha_receptor')->nullable();
                $table->string('nombre', 400)->nullable();
                $table->string('ruta_doc', 400)->nullable();
                $table->string('ruta_txt', 400)->nullable();
                $table->string('emisor')->nullable();
                $table->string('receptor')->nullable();
                $table->string('materia')->nullable();
                $table->string('referencia')->nullable();
                $table->string('clasificacion')->nullable();
                $table->string('anteriores')->nullable();
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
        Schema::dropIfExists('correspondencia');
    }
}
