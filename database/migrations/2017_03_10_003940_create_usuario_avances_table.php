<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioAvancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_avances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->integer('carrera_id')->unsigned();
            $table->integer('curso_id')->unsigned();
            $table->integer('leccion_id')->unsigned();

            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('carrera_id')->references('id')->on('carreras');
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->foreign('leccion_id')->references('id')->on('lecciones');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_avances');
    }
}
