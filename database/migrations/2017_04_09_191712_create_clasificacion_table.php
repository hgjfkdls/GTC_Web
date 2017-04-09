<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clasificacion')) {
            Schema::create('clasificacion', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_padre')->nullable();
                $table->integer('id_usuario')->nullable();
                $table->string('nombre', 400)->nullable();
                $table->string('estilo', 400)->nullable();
                $table->string('descripcion', 400)->nullable();
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
        Schema::dropIfExists('clasificacion');
    }
}
