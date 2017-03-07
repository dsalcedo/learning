<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carrera_id')->unsigned();
            $table->string('clave');
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('insignia_id')->unsigned();
            $table->string('color')->nullable();
            $table->string('cover')->nullable();
            $table->boolean('gratuito')->default(false);
            $table->boolean('publicado')->default(false);
            $table->timestamps();

            $table->foreign('carrera_id')->references('id')->on('carreras');
            $table->foreign('insignia_id')->references('id')->on('multimedios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
