<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeccionesContenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecciones_contenidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('leccion_id')->unsigned();
            $table->text('contenido');
            $table->timestamps();

            $table->foreign('leccion_id')->references('id')->on('lecciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leccion_contenidos');
    }
}
