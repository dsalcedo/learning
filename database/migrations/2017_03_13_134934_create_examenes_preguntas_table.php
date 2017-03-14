<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamenesPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes_preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('examen_id')->unsigned();
            $table->integer('curso_id')->unsigned();
            $table->text('pregunta');
            $table->text('adicional')->nullable();
            $table->timestamps();

            $table->foreign('examen_id')->references('id')->on('examenes_carreras') ->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examenes_preguntas');
    }
}
